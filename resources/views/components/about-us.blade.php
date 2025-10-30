{{-- <section class="relative gt-hero-bg py-8 px-4 sm:py-12 sm:px-6 lg:py-16 lg:px-8 overflow-hidden">
    <style>
        @keyframes gt-float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes gt-slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gt-pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        @keyframes gt-drift {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(10px, -10px) rotate(5deg);
            }
            100% {
                transform: translate(0, 0) rotate(0deg);
            }
        }

        .gt-float-animation {
            animation: gt-float 3s ease-in-out infinite;
        }

        .gt-drift-animation {
            animation: gt-drift 8s ease-in-out infinite;
        }

        .gt-slide-in {
            animation: gt-slideIn 0.6s ease-out;
        }

        .gt-gradient-text {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gt-hero-bg {
            background-image: url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .gt-overlay {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.88) 0%, rgba(37, 99, 235, 0.92) 50%, rgba(29, 78, 216, 0.88) 100%);
        }

        .gt-glass-effect {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .gt-service-card {
            transition: all 0.3s ease;
        }

        .gt-service-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3);
        }

        .gt-circle-decor {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: gt-pulse 4s ease-in-out infinite;
        }

        .gt-circle-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
        }

        .gt-circle-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
            animation-delay: 2s;
        }
    </style>

    <!-- Animated background circles -->
    <div class="gt-circle-decor gt-circle-1"></div>
    <div class="gt-circle-decor gt-circle-2"></div>

    <!-- Overlay -->
    <div class="absolute inset-0 gt-overlay"></div>

    <!-- Floating decorative elements -->
    <div class="absolute top-8 right-8 text-white/40 text-2xl sm:text-3xl gt-float-animation z-10">✈️</div>
    <div class="absolute top-1/4 left-8 text-white/30 text-xl sm:text-2xl gt-drift-animation z-10" style="animation-delay: 1.5s;">🗺️</div>
    <div class="absolute bottom-8 left-8 text-white/25 text-lg sm:text-xl gt-float-animation z-10" style="animation-delay: 1s;">🌍</div>
    <div class="absolute bottom-1/3 right-12 text-white/30 text-xl gt-drift-animation z-10" style="animation-delay: 3s;">🧳</div>

    <div class="max-w-4xl mx-auto relative z-10">
        <!-- Header -->
        <div class="text-center mb-8 sm:mb-12">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-3 sm:mb-4 drop-shadow-2xl tracking-tight">
                Globe Trotting
            </h1>
            <p class="text-xl sm:text-2xl text-white/95 italic drop-shadow-lg font-light">
                Explore the World with Confidence
            </p>
        </div>

        <!-- Interactive tabs -->
        <div class="mb-8 sm:mb-12">
            <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-6 sm:mb-8">
                <button onclick="gtShowTab('about')" id="gt-about-tab"
                    class="gt-tab-button px-4 py-2 sm:px-6 sm:py-3 rounded-full text-sm sm:text-base font-medium transition-all duration-300 bg-white text-blue-600 shadow-xl">
                    About Us
                </button>
                <button onclick="gtShowTab('services')" id="gt-services-tab"
                    class="gt-tab-button px-4 py-2 sm:px-6 sm:py-3 rounded-full text-sm sm:text-base font-medium transition-all duration-300 bg-white/20 backdrop-blur-sm text-white hover:bg-white hover:text-blue-600 shadow-lg">
                    Services
                </button>
                <button onclick="gtShowTab('why')" id="gt-why-tab"
                    class="gt-tab-button px-4 py-2 sm:px-6 sm:py-3 rounded-full text-sm sm:text-base font-medium transition-all duration-300 bg-white/20 backdrop-blur-sm text-white hover:bg-white hover:text-blue-600 shadow-lg">
                    Why Travel With Us
                </button>
            </div>

            <!-- Tab content -->
            <div class="gt-glass-effect rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl min-h-[200px] sm:min-h-[250px]">

                <div id="gt-about-content" class="gt-tab-content gt-slide-in">
                    <h2 class="text-2xl sm:text-3xl font-bold gt-gradient-text mb-4 sm:mb-6">About Globe Trotting</h2>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4 sm:mb-6">
                        At Globe Trotting, we're not just about booking flights—we're about crafting experiences that
                        spark joy, open minds, and create lifelong memories. Every journey we plan is backed by local
                        insight, personalized service, and a passion for adventure.
                    </p>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                        From relaxing retreats to adrenaline-filled escapes, we help you travel smarter, deeper, and
                        with confidence. Wherever you're headed, count on us to turn travel dreams into unforgettable
                        realities—minus the hassle, plus the magic.
                    </p>
                </div>

                <!-- Services tab -->
                <div id="gt-services-content" class="gt-tab-content hidden">
                    <h2 class="text-2xl sm:text-3xl font-bold gt-gradient-text mb-4 sm:mb-6">What We Offer</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        <div class="gt-service-card p-4 sm:p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl cursor-pointer shadow-md">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <span class="text-2xl sm:text-3xl">✨</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Personalized itineraries tailored to your interests</span>
                            </div>
                        </div>
                        <div class="gt-service-card p-4 sm:p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl cursor-pointer shadow-md">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <span class="text-2xl sm:text-3xl">💼</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Hassle-free planning and booking</span>
                            </div>
                        </div>
                        <div class="gt-service-card p-4 sm:p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl cursor-pointer shadow-md">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <span class="text-2xl sm:text-3xl">💎</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Exclusive deals and insider access</span>
                            </div>
                        </div>
                        <div class="gt-service-card p-4 sm:p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl cursor-pointer shadow-md">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <span class="text-2xl sm:text-3xl">🌐</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Global destinations with local insights</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why travel with us tab -->
                <div id="gt-why-content" class="gt-tab-content hidden">
                    <h2 class="text-2xl sm:text-3xl font-bold gt-gradient-text mb-4 sm:mb-6">Why Choose Globe Trotting?</h2>
                    <div class="space-y-4 sm:space-y-5">
                        <div class="flex items-start gap-4 sm:gap-5 p-4 rounded-xl hover:bg-blue-50/50 transition-all duration-300">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-lg">
                                <span class="text-white text-base sm:text-lg font-bold">1</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-base sm:text-lg mb-2">Expert Local Knowledge</h3>
                                <p class="text-gray-600 text-sm sm:text-base">Our team provides insider access and authentic local experiences you won't find elsewhere.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 sm:gap-5 p-4 rounded-xl hover:bg-blue-50/50 transition-all duration-300">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-lg">
                                <span class="text-white text-base sm:text-lg font-bold">2</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-base sm:text-lg mb-2">24/7 Support</h3>
                                <p class="text-gray-600 text-sm sm:text-base">We're here for you every step of the way, from planning to your safe return home.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 sm:gap-5 p-4 rounded-xl hover:bg-blue-50/50 transition-all duration-300">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-lg">
                                <span class="text-white text-base sm:text-lg font-bold">3</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-base sm:text-lg mb-2">Sustainable Travel</h3>
                                <p class="text-gray-600 text-sm sm:text-base">We're committed to responsible tourism that benefits local communities and preserves destinations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
    </div>

    <script>
        function gtShowTab(tabName) {
            const contents = document.querySelectorAll('.gt-tab-content');
            contents.forEach(content => content.classList.add('hidden'));

            const tabs = document.querySelectorAll('.gt-tab-button');
            tabs.forEach(tab => {
                tab.classList.remove('bg-white', 'text-blue-600', 'shadow-xl');
                tab.classList.add('bg-white/20', 'backdrop-blur-sm', 'text-white', 'shadow-lg');
            });

            document.getElementById('gt-' + tabName + '-content').classList.remove('hidden');

            const activeTab = document.getElementById('gt-' + tabName + '-tab');
            activeTab.classList.remove('bg-white/20', 'backdrop-blur-sm', 'text-white', 'shadow-lg');
            activeTab.classList.add('bg-white', 'text-blue-600', 'shadow-xl');
        }

        function gtHandleCTA() {
            const bookSection = document.getElementById('book-now-section');
            if (bookSection) {
                bookSection.scrollIntoView({ behavior: 'smooth' });
            } else {
                alert('Ready to plan your adventure! Contact us to get started.');
            }
        }

        gtShowTab('about');
    </script>
</section> --}}



<section class="relative py-16 px-4 sm:py-20 sm:px-6 lg:py-24 lg:px-8 overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">
    <style>
        @keyframes gt-float-subtle {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes gt-fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gt-float {
            animation: gt-float-subtle 4s ease-in-out infinite;
        }

        .gt-fade-in {
            animation: gt-fade-in-up 0.8s ease-out forwards;
        }

        .gt-icon-float {
            transition: transform 0.3s ease;
        }

        .gt-icon-float:hover {
            transform: translateY(-5px);
        }

        .gt-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gt-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }

        .gt-gradient-border {
            position: relative;
            background: white;
            border-radius: 1.5rem;
        }

        .gt-gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 1.5rem;
            padding: 2px;
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }
    </style>

    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-72 h-72 bg-blue-200/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-cyan-200/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-16 gt-fade-in">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-4">
                Why Choose 
                <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Globe Trotting</span>
            </h2>
            <p class="text-lg sm:text-xl text-slate-600 max-w-2xl mx-auto">
                Your journey begins with trust, expertise, and unforgettable experiences
            </p>
        </div>

        <!-- Feature Cards -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            
            <!-- Card 1 -->
            <div class="gt-card gt-gradient-border p-8 bg-white rounded-3xl" style="animation-delay: 0.1s">
                <div class="gt-icon-float mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-3">Expert Planning</h3>
<p class="text-slate-600 leading-relaxed">
    Experienced travel specialists crafting personalized itineraries that perfectly match your dreams and budget.
</p>

            </div>

            <!-- Card 2 -->
            <div class="gt-card gt-gradient-border p-8 bg-white rounded-3xl" style="animation-delay: 0.2s">
                <div class="gt-icon-float mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-3">24/7 Support</h3>
                <p class="text-slate-600 leading-relaxed">
                    Round-the-clock assistance wherever you are. From booking to landing, we've got your back every step.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="gt-card gt-gradient-border p-8 bg-white rounded-3xl" style="animation-delay: 0.3s">
                <div class="gt-icon-float mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-3">Best Value</h3>
                <p class="text-slate-600 leading-relaxed">
                    Exclusive deals and competitive rates. Get premium experiences without the premium price tag.
                </p>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="grid lg:grid-cols-2 gap-0">
                
                <!-- Image Side -->
                <div class="relative h-64 lg:h-auto">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=800&q=80" 
                         alt="Happy family traveling" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-transparent"></div>
                    
                    <!-- Floating Badge -->
                    {{-- <div class="absolute bottom-8 left-8 bg-white/95 backdrop-blur-sm px-6 py-4 rounded-2xl shadow-xl gt-float">
                        <div class="flex items-center gap-3">
                            <div class="text-3xl">⭐</div>
                            <div>
                                <div class="text-2xl font-bold text-slate-800">10K+</div>
                                <div class="text-sm text-slate-600">Happy Travelers</div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- Content Side -->
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <h3 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-6">
                        More Than Just a Travel Agency
                    </h3>
                    <p class="text-lg text-slate-600 mb-6 leading-relaxed">
                        At Globe Trotting, we're passionate about turning your travel dreams into reality. Whether you're seeking adventure, relaxation, or cultural immersion, we craft experiences that resonate with your soul.
                    </p>
                    <p class="text-base text-slate-600 mb-8 leading-relaxed">
                        From hidden gems to iconic destinations, we bring local insights and global expertise to every journey.
                    </p>

                    <!-- Quick Stats -->
                    {{-- <div class="grid grid-cols-3 gap-6 mb-8 pb-8 border-b border-slate-200">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-1">25+</div>
                            <div class="text-sm text-slate-600">Years Experience</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-1">150+</div>
                            <div class="text-sm text-slate-600">Destinations</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-1">98%</div>
                            <div class="text-sm text-slate-600">Satisfaction</div>
                        </div>
                    </div> --}}

                    <!-- CTA Button -->
                    <a href="{{ route('about') }}" 
                       class="inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl group">
                        <span>Learn More About Us</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Features -->
        {{-- <div class="grid md:grid-cols-4 gap-6 mt-16">
            <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white transition-all duration-300">
                <div class="text-4xl mb-3">🌍</div>
                <h4 class="font-semibold text-slate-800 mb-2">Global Network</h4>
                <p class="text-sm text-slate-600">Connections worldwide</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white transition-all duration-300">
                <div class="text-4xl mb-3">🛡️</div>
                <h4 class="font-semibold text-slate-800 mb-2">Secure Booking</h4>
                <p class="text-sm text-slate-600">Protected payments</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white transition-all duration-300">
                <div class="text-4xl mb-3">✨</div>
                <h4 class="font-semibold text-slate-800 mb-2">Custom Trips</h4>
                <p class="text-sm text-slate-600">Tailored to you</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white transition-all duration-300">
                <div class="text-4xl mb-3">💎</div>
                <h4 class="font-semibold text-slate-800 mb-2">VIP Access</h4>
                <p class="text-sm text-slate-600">Exclusive experiences</p>
            </div>
        </div> --}}
    </div>
</section>