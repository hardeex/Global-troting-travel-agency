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
        // Skip for admin routes and local development
        if ($request->is('admin/*') || app()->environment('local')) {
            return $next($request);
        }

        $ip = $request->ip();
        
        // Cache the country check for 24 hours per IP
        $country = Cache::remember("geo_country_{$ip}", 86400, function () use ($ip) {
            return $this->getCountryFromIP($ip);
        });

        // Allow UK, or if we can't determine (fail open for better UX)
        if ($country === 'GB' || $country === null) {
            return $next($request);
        }

        // Redirect or show message to non-UK users
        return response()->view('errors.geo-restricted', [
            'country' => $country
        ], 403);
    }

    private function getCountryFromIP($ip)
    {
        // Skip private/local IPs
        if ($this->isPrivateIP($ip)) {
            return null;
        }

        try {
            // Option 1: Free ipapi.co (1000 requests/day)
            $response = Http::timeout(3)->get("https://ipapi.co/{$ip}/country/");
            
            if ($response->successful()) {
                return trim($response->body());
            }

            // Option 2: Fallback to ip-api.com (free, no key needed)
            $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}?fields=countryCode");
            
            if ($response->successful()) {
                $data = $response->json();
                return $data['countryCode'] ?? null;
            }

        } catch (\Exception $e) {
            Log::warning("Geolocation check failed for IP {$ip}: " . $e->getMessage());
        }

        return null; // Fail open - allow if we can't determine
    }

    private function isPrivateIP($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false;
    }
}