<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RestrictToUK
{
   public function handle(Request $request, Closure $next)
    {
        Log::info('🌍 Geo middleware triggered', [
            'path' => $request->path(),
            'ip_detected' => $request->ip(),
            'env' => app()->environment(),
        ]);

        if ($request->is('admin/*') || app()->environment('local')) {
            Log::info('⏭ Geo check skipped (admin route or local env)');
            return $next($request);
        }

        $ip = $request->ip();

        $country = Cache::remember("geo_country_{$ip}", 86400, function () use ($ip) {
            Log::info("📡 Fetching country from APIs for IP: {$ip}");
            return $this->getCountryFromIP($ip);
        });

        Log::info('🌎 Country detection result', [
            'ip' => $ip,
            'country' => $country,
        ]);

        if ($country === 'GB' || $country === null) {
            Log::info('✅ Access allowed by geo middleware');
            return $next($request);
        }

        Log::warning('⛔ Access BLOCKED by geo middleware', [
            'ip' => $ip,
            'country' => $country,
            'path' => $request->path(),
        ]);

        return response()->view('errors.geo-restricted', [
            'country' => $country
        ], 403);
    }


   private function getCountryFromIP($ip)
{
    if ($this->isPrivateIP($ip)) {
        Log::info("🏠 Private IP detected: {$ip}");
        return null;
    }

    try {
        Log::info("🌐 Calling ipapi.co for {$ip}");
        $response = Http::timeout(3)->get("https://ipapi.co/{$ip}/country/");

        Log::info('ipapi response', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            return trim($response->body());
        }

        Log::info("🌐 Falling back to ip-api.com for {$ip}");
        $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}?fields=countryCode");

        Log::info('ip-api response', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['countryCode'] ?? null;
        }

    } catch (\Exception $e) {
        Log::error("❌ Geo API exception", [
            'ip' => $ip,
            'error' => $e->getMessage(),
        ]);
    }

    Log::warning("⚠️ Could not determine country for {$ip}");
    return null;
}



   private function isPrivateIP($ip)
{
    $isPrivate = filter_var(
        $ip,
        FILTER_VALIDATE_IP,
        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
    ) === false;

    Log::info('🔍 Private IP check', [
        'ip' => $ip,
        'is_private' => $isPrivate,
    ]);

    return $isPrivate;
}

}