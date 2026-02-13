<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class CookieConsentController extends Controller
{
    /**
     * Store cookie consent preferences
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:accepted,rejected,custom',
            'settings' => 'required|array',
            'settings.essential' => 'required|boolean',
            'settings.analytics' => 'required|boolean',
            'settings.marketing' => 'required|boolean',
            'settings.functional' => 'required|boolean',
        ]);

        // Log consent for compliance
        Log::info('Cookie consent recorded', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'consent_type' => $validated['type'],
            'settings' => $validated['settings'],
            'user_id' => auth()->id(),
            'timestamp' => now(),
        ]);

        // Store in session
        session([
            'cookie_consent' => $validated['type'],
            'cookie_settings' => $validated['settings'],
        ]);

        // Optionally store in database for logged-in users
        if (auth()->check()) {
            auth()->user()->update([
                'cookie_consent' => $validated['type'],
                'cookie_settings' => json_encode($validated['settings']),
                'cookie_consent_date' => now(),
            ]);
        }

        // Set a long-lived cookie (1 year)
        $cookie = Cookie::make(
            'cookie_consent',
            json_encode([
                'type' => $validated['type'],
                'settings' => $validated['settings'],
                'timestamp' => now()->timestamp,
            ]),
            525600 // 1 year in minutes
        );

        return response()->json([
            'success' => true,
            'message' => 'Cookie preferences saved successfully'
        ])->cookie($cookie);
    }

    /**
     * Accept all cookies
     */
    public function accept(Request $request)
    {
        return $this->store(new Request([
            'type' => 'accepted',
            'settings' => [
                'essential' => true,
                'analytics' => true,
                'marketing' => true,
                'functional' => true,
            ]
        ]));
    }

    /**
     * Reject all cookies
     */
    public function reject(Request $request)
    {
        return $this->store(new Request([
            'type' => 'rejected',
            'settings' => [
                'essential' => true,
                'analytics' => false,
                'marketing' => false,
                'functional' => false,
            ]
        ]));
    }

    /**
     * Get current cookie consent status
     */
    public function status(Request $request)
    {
        // Check cookie first
        $cookieConsent = $request->cookie('cookie_consent');
        
        if ($cookieConsent) {
            return response()->json(json_decode($cookieConsent, true));
        }

        // Check session
        if (session()->has('cookie_consent')) {
            return response()->json([
                'type' => session('cookie_consent'),
                'settings' => session('cookie_settings'),
            ]);
        }

        // Check database for logged-in users
        if (auth()->check() && auth()->user()->cookie_consent) {
            return response()->json([
                'type' => auth()->user()->cookie_consent,
                'settings' => json_decode(auth()->user()->cookie_settings, true),
            ]);
        }

        return response()->json([
            'type' => null,
            'settings' => null,
        ]);
    }

    /**
     * Show privacy policy page
     */
    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }
}