<section class="relative bg-gradient-to-br from-blue-300 to-blue-500 py-8 px-4 sm:py-12 sm:px-6 lg:py-16 lg:px-8">
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .slide-in {
            animation: slideIn 0.6s ease-out;
        }

        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>

    <!-- Floating decorative elements -->
    <div class="absolute top-4 right-4 text-white/30 text-xl sm:text-2xl float-animation">✈️</div>
    <div class="absolute bottom-4 left-4 text-white/20 text-lg sm:text-xl float-animation" style="animation-delay: 1s;">🌍
    </div>

    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8 sm:mb-12">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-2 sm:mb-4">
                Globe Trotting
            </h1>
            <p class="text-lg sm:text-xl text-white/90 italic">
                Explore the World with Confidence
            </p>
        </div>

        <!-- Interactive tabs -->
        <div class="mb-8 sm:mb-12">
            <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-6 sm:mb-8">
                <button onclick="showTab('about')" id="about-tab"
                    class="tab-button px-4 py-2 sm:px-6 sm:py-3 rounded-full text-sm sm:text-base font-medium transition-all duration-300 bg-white text-blue-600 shadow-lg">
                    About Us
                </button>
                <button onclick="showTab('services')" id="services-tab"
                    class="tab-button px-4 py-2 sm:px-6 sm:py-3 rounded-full text-sm sm:text-base font-medium transition-all duration-300 bg-blue-400/50 text-white hover:bg-white hover:text-blue-600">
                    Services
                </button>
                <button onclick="showTab('why')" id="why-tab"
                    class="tab-button px-4 py-2 sm:px-6 sm:py-3 rounded-full text-sm sm:text-base font-medium transition-all duration-300 bg-blue-400/50 text-white hover:bg-white hover:text-blue-600">
                    Why Travel With Us
                </button>
            </div>

            <!-- Tab content -->
            <div
                class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 sm:p-6 lg:p-8 shadow-xl min-h-[200px] sm:min-h-[250px]">
                <!-- About tab -->
                <div id="about-content" class="tab-content slide-in">
                    <h2 class="text-xl sm:text-2xl font-bold gradient-text mb-4 sm:mb-6">About Globe Trotting</h2>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4 sm:mb-6">
                        At Globe Trotting, we believe travel is more than just a destination—it's a journey of
                        discovery, connection, and inspiration. Our mission is to turn your travel dreams into reality
                        with curated experiences that are as unique as you are.
                    </p>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                        Whether you're dreaming of sun-soaked beaches, cultural adventures, or once-in-a-lifetime
                        escapes, Globe Trotting is your trusted partner in travel. We turn your wanderlust into reality
                        with zero stress and all the magic.
                    </p>
                </div>

                <!-- Services tab -->
                <div id="services-content" class="tab-content hidden">
                    <h2 class="text-xl sm:text-2xl font-bold gradient-text mb-4 sm:mb-6">What We Offer</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div
                            class="service-card p-3 sm:p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <span class="text-lg sm:text-xl">✨</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Personalized itineraries
                                    tailored to your interests</span>
                            </div>
                        </div>
                        <div
                            class="service-card p-3 sm:p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <span class="text-lg sm:text-xl">💼</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Hassle-free planning and
                                    booking</span>
                            </div>
                        </div>
                        <div
                            class="service-card p-3 sm:p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <span class="text-lg sm:text-xl">💎</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Exclusive deals and insider
                                    access</span>
                            </div>
                        </div>
                        <div
                            class="service-card p-3 sm:p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <span class="text-lg sm:text-xl">🌐</span>
                                <span class="text-gray-800 text-sm sm:text-base font-medium">Global destinations with
                                    local insights </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why travel with us tab -->
                <div id="why-content" class="tab-content hidden">
                  <h2 class="text-xl sm:text-2xl font-bold gradient-text mb-4 sm:mb-6">Why Choose Globe Trotting?</h2>
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex items-start gap-3 sm:gap-4">
                            <div
                                class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white text-sm sm:text-base">1</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-1">Expert Local Knowledge
                                </h3>
                                <p class="text-gray-600 text-xs sm:text-sm">Our team provides insider access and
                                    authentic local experiences you won't find elsewhere.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:gap-4">
                            <div
                                class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white text-sm sm:text-base">2</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-1">24/7 Support</h3>
                                <p class="text-gray-600 text-xs sm:text-sm">We're here for you every step of the way,
                                    from planning to your safe return home.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:gap-4">
                            <div
                                class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white text-sm sm:text-base">3</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-1">Sustainable Travel
                                </h3>
                                <p class="text-gray-600 text-xs sm:text-sm">We're committed to responsible tourism that
                                    benefits local communities and preserves destinations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center">
            <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">Ready to Start Your Journey?</h3>
            <p class="text-white/90 text-sm sm:text-base mb-4 sm:mb-6">Let's explore the world together and create
                memories that will last a lifetime.</p>

            <!-- "Plan Your Adventure" Button -->
            <button onclick="handleCTA()"
                class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full font-semibold text-sm sm:text-base hover:from-orange-600 hover:to-red-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                Plan Your Adventure
            </button>
        </div>

    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));

            // Remove active styles from all tabs
            const tabs = document.querySelectorAll('.tab-button');
            tabs.forEach(tab => {
                tab.classList.remove('bg-white', 'text-blue-600', 'shadow-lg');
                tab.classList.add('bg-blue-400/50', 'text-white');
            });

            // Show selected tab content
            document.getElementById(tabName + '-content').classList.remove('hidden');

            // Add active styles to selected tab
            const activeTab = document.getElementById(tabName + '-tab');
            activeTab.classList.remove('bg-blue-400/50', 'text-white');
            activeTab.classList.add('bg-white', 'text-blue-600', 'shadow-lg');
        }

        function handleCTA() {
            // Scroll to the booking section
            document.getElementById('book-now-section').scrollIntoView({
                behavior: 'smooth',
            });
        }


        // Add hover effects to service cards
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Initialize with about tab active
        showTab('about');
    </script>
</section>
