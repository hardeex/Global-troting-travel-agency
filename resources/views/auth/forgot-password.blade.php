@extends('components.base')
@section('title', 'Forgot Password | Globe Trotting')

@section('content')
<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1920&q=80" 
             alt="Travel Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 via-blue-900/70 to-blue-800/80"></div>
        
        <!-- Floating Elements Animation -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-bounce" style="animation-duration: 6s;"></div>
            <div class="absolute top-40 right-20 w-32 h-32 bg-blue-400/20 rounded-full blur-2xl animate-pulse" style="animation-duration: 8s;"></div>
            <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-blue-400/20 rounded-full blur-xl animate-bounce" style="animation-duration: 10s;"></div>
            <div class="absolute bottom-40 right-1/3 w-28 h-28 bg-white/10 rounded-full blur-2xl animate-pulse" style="animation-duration: 7s;"></div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="relative z-20 container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto w-full">
            
            <!-- Logo and Header -->
            <div class="text-center mb-8 opacity-0 animate-[fadeIn_0.6s_ease-out_forwards]">
                <a href="/" class="inline-block">
                    <div class="flex flex-col items-center">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/20 rounded-full blur-2xl"></div>
                            <img src="/images/global-throthlelogo-new.png" 
                                 alt="Globe Trotting Logo"
                                 class="relative h-24 w-24 rounded-full object-cover border-4 border-white/30 shadow-2xl hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-4xl font-bold text-white tracking-wider">
                            GLOBE TROTTING
                        </div>
                        <div class="text-blue-100 text-sm tracking-widest mt-1">
                            Your Journey, Our Expertise
                        </div>
                    </div>
                </a>
            </div>

            <!-- Forgot Password Card -->
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 opacity-0 animate-[slideUp_0.6s_ease-out_forwards]" style="animation-delay: 0.2s;">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="mx-auto w-16 h-16 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-600 bg-clip-text text-transparent mb-2">
                        Forgot Password?
                    </h2>
                    <p class="text-gray-600">No worries, we'll send you reset instructions</p>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-lg mb-6 opacity-0 animate-[fadeIn_0.4s_ease-out_forwards]">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 px-4 py-3 rounded-lg mb-6 animate-[shake_0.5s_ease-in-out]">
                        <ul class="space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="group">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="you@example.com"
                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 hover:border-blue-300">
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Enter the email associated with your account</p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 via-blue-600 to-blue-700 text-white font-bold py-4 px-6 rounded-xl hover:from-blue-700 hover:via-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-2 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Send Reset Link
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500 font-medium">Or</span>
                    </div>
                </div>

                <!-- Back to Login -->
                <p class="text-center text-gray-600">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold hover:underline transition-all inline-flex items-center gap-2 group">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Login
                    </a>
                </p>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="/" class="text-white/90 hover:text-white font-semibold inline-flex items-center gap-2 hover:gap-3 transition-all group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-10px); }
    75% { transform: translateX(10px); }
}
</style>
@endsection