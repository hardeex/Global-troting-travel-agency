<section class="relative min-h-screen overflow-hidden">
    <!-- Slider Images -->
    <div class="absolute inset-0">
        <div id="slider" class="relative w-full h-full">
            <!-- Slide 1 -->
            <div class="absolute inset-0 bg-cover bg-center opacity-100 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 2 -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 3 -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=1470&q=80');">
            </div>
        </div>
        <!-- Dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-900/80 to-purple-900/85"></div>
    </div>

   <!-- Main Content -->
<div
    class="relative z-20 container mx-auto px-4 sm:px-6 py-8 sm:py-12 md:py-16 lg:py-20 flex flex-col justify-center min-h-screen pt-20 sm:pt-24">
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <!-- Left Content -->
        <div class="text-center lg:text-left fade-in">
            <!-- Brand Identity -->
            <div class="mb-6 sm:mb-8 stagger-1 fade-in">
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-2 sm:mb-4 leading-tight">
                    <span class="bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent float-animation">
                        Globe Trotting
                    </span>
                </h1>
                <div class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-2">
                    <strong>Nathaniel CC. </strong>
                </div>
                <div class="text-sm sm:text-base text-blue-200 mb-4">
                    Independent Travel Advisor
                </div>
                <!-- Contact Info -->
                    <div
                        class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-6 text-xs sm:text-sm text-blue-200">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Grays | UK
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>                            
                            +44 7368 818431
                        </div>
                    </div>
                </div>

                <!-- Main Message -->
                <div class="mb-6 sm:mb-8 stagger-2 fade-in">
                    <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-4 leading-relaxed">
                        Discover the world with Globe Trotting, your trusted travel partner. From breathtaking
                        landscapes to bustling cities, we bring you closer to the wonders of the world. Let us handle
                        the details while you create unforgettable memories.
                    </p>
                    <p class="text-base sm:text-lg text-blue-200 leading-relaxed">
                        From exotic getaways to cultural explorations, we me handle every detail while you focus on the
                        excitement of your next adventure.
                    </p>
                </div>


                <div
                    class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8 sm:mb-12 stagger-3 fade-in">
                    <a href="mailto:globetrotting@btinternet.com"
                        class="bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full text-base sm:text-lg font-semibold transition-all duration-300 transform hover:scale-105 pulse-glow shadow-lg">
                        Ask for Quote
                    </a>

                    <button id="watchVideoBtn"
                        class="border-2 border-white/30 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full text-base sm:text-lg font-semibold hover:bg-white/10 transition-all duration-300 transform hover:scale-105 glass-effect">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 5v10l7-5-7-5z" />
                        </svg>
                        Watch Video
                    </button>

                    <!-- Book Now-->
                    <button id="bookNowBtn"
                        class="bg-gradient-to-r from-sky-400 to-sky-500 hover:from-sky-500 hover:to-sky-600 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full text-base sm:text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <!-- Icon for booking (calendar/check) -->
                            <path
                                d="M4 3V2h12v1h3a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1h3zM3 7v9h14V7H3z" />
                        </svg>
                        Plan My Trip Now
                    </button>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 sm:gap-8 pt-6 sm:pt-8 border-t border-white/20 stagger-4 fade-in">
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-white" data-count="250">0</div>
                        <div class="text-blue-200 text-xs sm:text-sm">Destinations</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-white" data-count="15000">0</div>
                        <div class="text-blue-200 text-xs sm:text-sm">Happy Travelers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-white" data-count="98">0</div>
                        <div class="text-blue-200 text-xs sm:text-sm">Satisfaction %</div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Search Card -->
            <div class="flex justify-center lg:justify-end fade-in stagger-2">
                <div
                    class="w-full max-w-md p-6 sm:p-8 rounded-3xl search-card transform hover:scale-105 transition-all duration-500">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-4 sm:mb-6 text-center">Plan Your Journey</h3>

                    <form class="space-y-4 sm:space-y-6">
                        <div class="relative">
                            <input type="text" placeholder="Where to?"
                                class="w-full p-3 sm:p-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300">
                            <svg class="absolute right-3 sm:right-4 top-3 sm:top-4 w-5 sm:w-6 h-5 sm:h-6 text-white/60"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <div class="grid grid-cols-2 gap-3 sm:gap-4">
                            <input type="date"
                                class="p-3 sm:p-4 rounded-xl bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300">
                            <input type="date"
                                class="p-3 sm:p-4 rounded-xl bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300">
                        </div>

                        <select
                            class="w-full p-3 sm:p-4 rounded-xl bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300">
                            <option value="" class="text-gray-800">Select Travelers</option>
                            <option value="1" class="text-gray-800">1 Traveler</option>
                            <option value="2" class="text-gray-800">2 Travelers</option>
                            <option value="3" class="text-gray-800">3 Travelers</option>
                            <option value="4" class="text-gray-800">4+ Travelers</option>
                        </select>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-500 to-cyan-400 text-white p-3 sm:p-4 rounded-xl font-semibold hover:from-blue-600 hover:to-cyan-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Search Adventures
                        </button>
                    </form>

                    <div class="mt-4 sm:mt-6 text-center">
                        <p class="text-white/60 text-sm mb-3">Popular Destinations</p>
                        <div class="flex flex-wrap gap-2 justify-center">
                            <span
                                class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">New
                                York</span>
                            <span
                                class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">Jamaica</span>
                            <span
                                class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">Florida</span>
                            <span
                                class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">S-Africa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider Controls -->
    <div class="absolute bottom-6 sm:bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-3 z-30">
        <button class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-cyan-400 opacity-70 hover:opacity-100 transition-opacity"
            data-slide="0"></button>
        <button class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-cyan-400 opacity-40 hover:opacity-100 transition-opacity"
            data-slide="1"></button>
        <button class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-cyan-400 opacity-40 hover:opacity-100 transition-opacity"
            data-slide="2"></button>
    </div>

    <!-- Video Modal -->
    <div id="videoModal"
        class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/80 backdrop-blur-sm">
        <div class="relative w-full max-w-4xl mx-4 bg-black rounded-2xl overflow-hidden transform transition-all duration-300 scale-95 opacity-0"
            id="modalContent">
            <!-- Close Button -->
            <button id="closeModal"
                class="absolute top-4 right-4 z-10 w-10 h-10 bg-black/50 hover:bg-black/70 text-white rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <!-- Video Container -->
            <div class="relative w-full aspect-video">
                <iframe id="videoFrame" class="w-full h-full" src="" title="Travel Video" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Video Info -->
            <div class="p-6 bg-gradient-to-r from-blue-900 to-blue-800">
                <h3 class="text-xl font-bold text-white mb-2">Discover Amazing Destinations</h3>
                <p class="text-blue-200">Experience the world's most beautiful places with Globe Trotting</p>
            </div>
        </div>
    </div>

    <script>
        // Slider functionality
        const slides = document.querySelectorAll('#slider > div');
        const dots = document.querySelectorAll('[data-slide]');
        let current = 0;
        const total = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
            dots.forEach((dot, i) => {
                dot.style.opacity = i === index ? '1' : '0.4';
            });
            current = index;
        }

        function nextSlide() {
            let next = (current + 1) % total;
            showSlide(next);
        }

        // Auto slide every 6 seconds
        let slideInterval = setInterval(nextSlide, 6000);

        // Dot controls
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval);
                showSlide(parseInt(dot.dataset.slide));
                slideInterval = setInterval(nextSlide, 6000);
            });
        });

        // Counter animation
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                element.textContent = Math.floor(current);
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                }
            }, 20);
        }

        // Initialize counters
        document.querySelectorAll('[data-count]').forEach(el => {
            const target = parseInt(el.dataset.count);
            animateCounter(el, target);
        });

        // Video modal functionality
        const videoModal = document.getElementById('videoModal');
        const modalContent = document.getElementById('modalContent');
        const videoFrame = document.getElementById('videoFrame');
        const watchVideoBtn = document.getElementById('watchVideoBtn');
        const closeModal = document.getElementById('closeModal');

        function openModal() {
            videoModal.classList.remove('hidden');
            videoModal.classList.add('flex');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
            // The video URL
            videoFrame.src = 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1';
        }

        function closeModalFunc() {
            modalContent.classList.add('scale-95', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => {
                videoModal.classList.add('hidden');
                videoModal.classList.remove('flex');
                videoFrame.src = '';
            }, 300);
        }

        watchVideoBtn.addEventListener('click', openModal);
        closeModal.addEventListener('click', closeModalFunc);
        videoModal.addEventListener('click', (e) => {
            if (e.target === videoModal) closeModalFunc();
        });

        // Initialize
        showSlide(0);
    </script>
</section>
