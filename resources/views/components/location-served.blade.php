<section class="py-16 px-4 sm:py-20 sm:px-6 lg:py-24 lg:px-8 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 relative overflow-hidden">
    <style>
        @keyframes pulse-dot {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }
        }

        @keyframes float-location {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .location-dot {
            animation: pulse-dot 2s ease-in-out infinite;
        }

        .location-card {
            transition: all 0.3s ease;
        }

        .location-card:hover {
            transform: translateY(-5px);
        }

        .map-marker {
            animation: float-location 3s ease-in-out infinite;
        }
    </style>

    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-12 lg:mb-16">
            <div class="inline-block mb-4">
                <span class="bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm border border-blue-400/30">
                    Our Coverage
                </span>
            </div>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                Explore All of 
                <span class="bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">Europe</span>
            </h2>
            <p class="text-lg sm:text-xl text-blue-100 max-w-2xl mx-auto">
                From bustling cities to serene countryside, we cover every corner of Europe for your perfect getaway
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side - Map Visual -->
            <div class="relative">
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 shadow-2xl">
                    <!-- Map Container -->
                    <div class="relative aspect-square bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-2xl p-6 overflow-hidden">
                        <!-- Simplified Europe Map SVG -->
                        <svg viewBox="0 0 800 800" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                            <!-- Europe Outline (Simplified) -->
                            <path d="M 200 150 L 250 120 L 320 110 L 380 130 L 420 120 L 480 140 L 520 160 L 550 180 L 580 220 L 600 280 L 610 340 L 600 400 L 580 460 L 550 520 L 500 560 L 440 580 L 380 590 L 320 580 L 260 560 L 210 520 L 180 460 L 170 400 L 160 340 L 150 280 L 160 220 L 180 180 Z" 
                                  fill="rgba(59, 130, 246, 0.2)" 
                                  stroke="rgba(96, 165, 250, 0.5)" 
                                  stroke-width="2"/>
                            
                            <!-- Location Dots -->
                            <!-- London (UK) -->
                            <circle cx="240" cy="200" r="8" fill="#ef4444" class="location-dot" style="animation-delay: 0s">
                                <title>London, UK</title>
                            </circle>
                            
                            <!-- Paris (France) -->
                            <circle cx="280" cy="260" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 0.2s">
                                <title>Paris, France</title>
                            </circle>
                            
                            <!-- Madrid (Spain) -->
                            <circle cx="250" cy="360" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 0.4s">
                                <title>Madrid, Spain</title>
                            </circle>
                            
                            <!-- Rome (Italy) -->
                            <circle cx="380" cy="340" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 0.6s">
                                <title>Rome, Italy</title>
                            </circle>
                            
                            <!-- Berlin (Germany) -->
                            <circle cx="380" cy="220" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 0.8s">
                                <title>Berlin, Germany</title>
                            </circle>
                            
                            <!-- Amsterdam (Netherlands) -->
                            <circle cx="300" cy="210" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 1s">
                                <title>Amsterdam, Netherlands</title>
                            </circle>
                            
                            <!-- Vienna (Austria) -->
                            <circle cx="420" cy="260" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 1.2s">
                                <title>Vienna, Austria</title>
                            </circle>
                            
                            <!-- Athens (Greece) -->
                            <circle cx="500" cy="380" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 1.4s">
                                <title>Athens, Greece</title>
                            </circle>
                            
                            <!-- Stockholm (Sweden) -->
                            <circle cx="420" cy="140" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 1.6s">
                                <title>Stockholm, Sweden</title>
                            </circle>
                            
                            <!-- Prague (Czech) -->
                            <circle cx="400" cy="240" r="6" fill="#3b82f6" class="location-dot" style="animation-delay: 1.8s">
                                <title>Prague, Czech Republic</title>
                            </circle>
                        </svg>

                        <!-- Legend -->
                        <div class="absolute bottom-4 left-4 bg-white/10 backdrop-blur-md rounded-xl p-3 border border-white/20">
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-white text-xs font-medium">Our Office</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-white text-xs font-medium">We Serve</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Below Map -->
                    <div class="grid grid-cols-3 gap-4 mt-6">
                        <div class="text-center p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-2xl sm:text-3xl font-bold text-blue-400 mb-1">45+</div>
                            <div class="text-xs text-blue-200">Countries</div>
                        </div>
                        <div class="text-center p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-2xl sm:text-3xl font-bold text-cyan-400 mb-1">200+</div>
                            <div class="text-xs text-cyan-200">Cities</div>
                        </div>
                        <div class="text-center p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-2xl sm:text-3xl font-bold text-blue-400 mb-1">1000+</div>
                            <div class="text-xs text-blue-200">Destinations</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Regional Coverage & Office Info -->
            <div class="space-y-6">
                
                <!-- Office Location Card -->
                <div class="bg-gradient-to-br from-blue-500/20 to-cyan-500/20 backdrop-blur-sm rounded-2xl p-6 border border-blue-400/30 location-card">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg map-marker">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white mb-2">Our London Office</h3>
                            <p class="text-blue-100 mb-3">5 Brayford Square, London E1 0SG, United Kingdom</p>
                            <div class="flex flex-wrap gap-2">
                                <a href="https://maps.google.com/?q=5+Brayford+Square+London+E1+0SG" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-white text-sm transition-all duration-300 border border-white/20">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                    </svg>
                                    Get Directions
                                </a>
                                <a href="{{ route('make-a-request') }}"
                                   class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg text-white text-sm transition-all duration-300 shadow-lg">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Regional Coverage -->
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                    <h3 class="text-2xl font-bold text-white mb-6">European Regions We Cover</h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        
                        <!-- Western Europe -->
                        <div class="location-card p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">🏰</span>
                                </div>
                                <h4 class="font-semibold text-white">Western Europe</h4>
                            </div>
                            <p class="text-sm text-blue-200">UK, France, Spain, Portugal, Belgium, Netherlands</p>
                        </div>

                        <!-- Central Europe -->
                        <div class="location-card p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">🏔️</span>
                                </div>
                                <h4 class="font-semibold text-white">Central Europe</h4>
                            </div>
                            <p class="text-sm text-blue-200">Germany, Austria, Switzerland, Czech Republic, Poland</p>
                        </div>

                        <!-- Southern Europe -->
                        <div class="location-card p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">🌊</span>
                                </div>
                                <h4 class="font-semibold text-white">Southern Europe</h4>
                            </div>
                            <p class="text-sm text-blue-200">Italy, Greece, Croatia, Malta, Cyprus</p>
                        </div>

                        <!-- Northern Europe -->
                        <div class="location-card p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">❄️</span>
                                </div>
                                <h4 class="font-semibold text-white">Northern Europe</h4>
                            </div>
                            <p class="text-sm text-blue-200">Scandinavia, Baltics, Iceland, Ireland</p>
                        </div>

                        <!-- Eastern Europe -->
                        <div class="location-card p-4 bg-white/5 rounded-xl border border-white/10 sm:col-span-2">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">🏛️</span>
                                </div>
                                <h4 class="font-semibold text-white">Eastern Europe</h4>
                            </div>
                            <p class="text-sm text-blue-200">Romania, Bulgaria, Hungary, Slovakia, and more</p>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl p-6 text-center">
                    <h3 class="text-xl font-bold text-white mb-2">Ready to Explore Europe?</h3>
                    <p class="text-blue-50 mb-4">Let us plan your perfect European adventure</p>
                    <a href="{{ route('make-a-request') }}" 
                       class="inline-flex items-center px-6 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Start Planning
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>