<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        Log::info('🔐 Role middleware check', [
            'required_role' => $role,
            'user_role' => Auth::user()?->role,
        ]);

        if (!Auth::check() || Auth::user()->role !== $role) {
            Log::warning('⛔ Role access denied', [
                'required' => $role,
                'actual' => Auth::user()?->role,
            ]);
            abort(403);
        }

        return $next($request);
    }
}
