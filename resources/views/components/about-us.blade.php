<section class="relative gt-hero-bg py-8 px-4 sm:py-12 sm:px-6 lg:py-16 lg:px-8 overflow-hidden">
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

        <!-- CTA Section -->
        {{-- <div class="text-center">
            <h3 class="text-2xl sm:text-3xl font-bold text-white mb-3 sm:mb-4 drop-shadow-lg">Ready to Start Your Journey?</h3>
            <p class="text-white/95 text-base sm:text-lg mb-5 sm:mb-7 drop-shadow-md max-w-2xl mx-auto">
                Let's explore the world together and create memories that will last a lifetime.
            </p>

            <!-- "Plan Your Adventure" Button -->
            <button onclick="gtHandleCTA()"
                class="bg-gradient-to-r from-orange-500 via-orange-600 to-red-600 text-white px-8 py-4 sm:px-10 sm:py-5 rounded-full font-bold text-base sm:text-lg hover:from-orange-600 hover:via-red-600 hover:to-red-700 transform hover:scale-110 transition-all duration-300 shadow-2xl hover:shadow-orange-500/50 animate-pulse">
                🚀 Plan Your Adventure
            </button>
        </div> --}}
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
</section>