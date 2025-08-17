@extends('components.base')
@section('title', 'Page Not Found')

@section('content')
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes bounce-gentle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6); }
        }
        .float-animation { animation: float 6s ease-in-out infinite; }
        .bounce-gentle { animation: bounce-gentle 2s ease-in-out infinite; }
        .pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
    </style>

<section class="bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 min-h-screen">

<div class="min-h-screen flex items-center justify-center px-4 py-16 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 float-animation"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 float-animation" style="animation-delay: 2s;"></div>
        <div class="absolute top-40 left-1/2 w-60 h-60 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 float-animation" style="animation-delay: 4s;"></div>
    </div>

    <div class="max-w-2xl mx-auto text-center relative z-10">
        <!-- Main 404 Number -->
        <div class="mb-8 relative">
            <h1 class="text-9xl md:text-[12rem] font-black text-white opacity-10 leading-none select-none float-animation">
                404
            </h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-6xl md:text-8xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent bounce-gentle">
                    404
                </div>
            </div>
        </div>

        <!-- Error Message -->
        <div class="mb-8 space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Oops! Page Not Found
            </h2>
            <p class="text-lg md:text-xl text-gray-300 max-w-md mx-auto leading-relaxed">
                The page you're looking for seems to have vanished into the digital void. Don't worry, it happens to the best of us!
            </p>
        </div>

        <!-- Search Box -->
        {{-- <div class="mb-8 max-w-md mx-auto">
            <div class="relative">
                <input 
                    type="text" 
                    placeholder="Search for what you need..."
                    class="w-full px-6 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                >
                <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white p-3 rounded-full transition-all duration-300 pulse-glow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div> --}}

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
            <a href="/" class="group bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center gap-2">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Go Home
            </a>
            
            <button onclick="history.back()" class="group bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white font-semibold px-8 py-4 rounded-full border border-white/30 hover:border-white/50 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                <svg class="w-5 h-5 group-hover:-rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.333 4z"></path>
                </svg>
                Go Back
            </button>
        </div>

        <!-- Help Links -->
        {{-- <div class="text-gray-400">
            <p class="mb-4">Need help? Try these popular sections:</p>
            <div class="flex flex-wrap justify-center gap-4 text-sm">
                <a href="/about" class="hover:text-blue-400 transition-colors duration-300 underline decoration-dotted underline-offset-4 hover:decoration-solid">About Us</a>
                <a href="/contact" class="hover:text-blue-400 transition-colors duration-300 underline decoration-dotted underline-offset-4 hover:decoration-solid">Contact</a>
                <a href="/blog" class="hover:text-blue-400 transition-colors duration-300 underline decoration-dotted underline-offset-4 hover:decoration-solid">Blog</a>
                <a href="/support" class="hover:text-blue-400 transition-colors duration-300 underline decoration-dotted underline-offset-4 hover:decoration-solid">Support</a>
            </div>
        </div> --}}

        <!-- Decorative Icons -->
        <div class="absolute -z-10 opacity-20">
            <div class="absolute top-10 left-10 text-6xl text-white float-animation" style="animation-delay: 1s;">🚀</div>
            <div class="absolute top-20 right-10 text-4xl text-white float-animation" style="animation-delay: 3s;">⭐</div>
            <div class="absolute bottom-10 left-20 text-5xl text-white float-animation" style="animation-delay: 5s;">🌙</div>
            <div class="absolute bottom-20 right-20 text-3xl text-white float-animation" style="animation-delay: 2s;">✨</div>
        </div>
    </div>
</div>

</section>
