<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Propaganistas\LaravelDisposableEmail\Validation\Indisposable;

class AuthController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.register');
    }

    /**
     * Handle registration
     */



     public function register(Request $request)
    {
        // Using $request->validate() instead of Validator::make()
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 
                'string', 
                'email:rfc,dns',
                'max:255', 
                'unique:users',
                'indisposable'  
            ],
            'password' => ['required', Password::min(5)],
            'phone' => ['nullable', 'string', 'max:20'],
        ], [
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'email.indisposable' => 'Please use a valid, non-temporary email address.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('index')->with('success', 'Welcome to Globe Trotting! Your account has been created successfully.');
    }


    


    /**
     * Show the login form
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.login');
    }

    /**
     * Handle login
     */


    public function login(Request $request)
{
    Log::info(' Login attempt started', [
        'ip' => $request->ip(),
        'email' => $request->email,
        'remember' => $request->filled('remember'),
        'user_agent' => $request->userAgent(),
    ]);

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    Log::info('Login validation passed', [
        'email' => $credentials['email'],
    ]);

    $remember = $request->filled('remember');

    if (Auth::attempt($credentials, $remember)) {

        Log::info('Auth::attempt SUCCESS', [
            'user_id' => Auth::id(),
        ]);

        $request->session()->regenerate();

        Log::info('Session regenerated', [
            'session_id' => session()->getId(),
        ]);

        return $this->redirectBasedOnRole();
    }

    Log::warning(' Auth::attempt FAILED', [
        'email' => $credentials['email'],
        'ip' => $request->ip(),
    ]);

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));
}



private function redirectBasedOnRole()
{
    $user = Auth::user();

    if (!$user) {
        Log::error('redirectBasedOnRole called but no authenticated user!');
        return redirect()->route('login');
    }

    Log::info('👤 Redirect decision', [
        'user_id' => $user->id,
        'name' => $user->name,
        'role' => $user->role,
    ]);

    if ($user->role === 'admin') {
        Log::info('Redirecting to ADMIN dashboard');
        return redirect()->route('admin.dashboard')
            ->with('success', 'Welcome back, Admin!');
    }

    Log::info('Redirecting to USER dashboard');

    return redirect()->route('user.dashboard')
        ->with('success', 'Welcome back, ' . $user->name . '!');
}

    /**
     * Show forgot password form
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle forgot password
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        // Here you would typically send a password reset email
        // For now, we'll just return a success message
        
        return back()->with('success', 'Password reset link has been sent to your email address.');
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Show user profile
     */
    public function profile()
    {
        return view('auth.profile');
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'current_password' => ['nullable', 'required_with:new_password'],
            'new_password' => ['nullable', 'confirmed', Password::min(8)],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check current password if changing password
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    

  

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();
            
            // Check if user exists with this email
            $user = User::where('email', $googleUser->email)->first();
            
            if ($user) {
                // Update google_id if not set
                if (!$user->google_id) {
                    $user->google_id = $googleUser->id;
                    $user->save();
                }
            } else {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make(uniqid()), // Random password
                    'role' => 'user',
                ]);
            }
            
            Auth::login($user);
            
            return $this->redirectBasedOnRole();
            
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Failed to authenticate with Google. Please try again.'
            ]);
        }
    }

   
}