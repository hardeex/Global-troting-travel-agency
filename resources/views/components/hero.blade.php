<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Playfair+Display:wght@700;800&display=swap');
    
    body {
        font-family: 'Montserrat', sans-serif;
    }
    
    .logo-text {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        letter-spacing: 0.05em;
        background: linear-gradient(135deg, #ffffff 0%, #60a5fa 50%, #22d3ee 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        line-height: 1.2;
    }
    
    .logo-tagline {
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        font-size: clamp(0.65rem, 1.5vw, 0.85rem);
        color: #93c5fd;
        margin-top: 0.25rem;
    }

    .float-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .fade-in {
        animation: fadeIn 1s ease-out forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        to { opacity: 1; }
    }

    .stagger-1 { animation-delay: 0.2s; }
    .stagger-2 { animation-delay: 0.4s; }
    .stagger-3 { animation-delay: 0.6s; }

    .pulse-glow {
        box-shadow: 0 0 20px rgba(34, 211, 238, 0.4);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 20px rgba(34, 211, 238, 0.4); }
        50% { box-shadow: 0 0 30px rgba(34, 211, 238, 0.6); }
    }

    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
    }

    .search-card {
        backdrop-filter: blur(20px);
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(34, 211, 238, 0.15) 100%);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }
</style>

<section class="relative min-h-screen overflow-hidden">
    <!-- Slider Images -->
    <div class="absolute inset-0">
        <div id="slider" class="relative w-full h-full">
            <!-- Slide 1 - Family Beach Travel -->
            <div class="absolute inset-0 bg-cover bg-center opacity-100 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1567502401034-b947ee46e249?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 2 - Family Walking Together -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 3 - Happy Family Adventure -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 4 - Jamaica Beach -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 5 - New York City -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?auto=format&fit=crop&w=1470&q=80');">
            </div>
            <!-- Slide 6 - South Africa Safari -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1470&q=80');">
            </div>
        </div>
        <!-- Dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-900/80 to-purple-900/85"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-20 container mx-auto px-4 sm:px-6 py-8 sm:py-12 md:py-16 lg:py-20 flex flex-col justify-center min-h-screen pt-20 sm:pt-24">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left fade-in">
                <div class="flex flex-col lg:flex-row items-center lg:items-start justify-center lg:justify-start gap-4 lg:gap-8">
                    <!-- Logo Section -->
                    <div class="mb-4 lg:mb-0">
                        <a href="/">
                            <div class="flex flex-col items-center lg:items-start">
                                <img src="/images/global-throthlelogo-new.png" alt="Globe Trotting Logo"
                                    class="h-24 sm:h-28 md:h-32 lg:h-36 w-auto object-contain mx-auto lg:mx-0 float-animation">
                                <div class="logo-text mt-2">GLOBE TROTTING</div>
                                <div class="logo-tagline">Your Journey, Our Expertise</div>
                            </div>
                        </a>
                    </div>

                    <!-- Info Block -->
                    <div class="text-center lg:text-left">
                        <div class="stagger-1 fade-in">
                            <div class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-2">
                                <strong>Nathaniel CC.</strong>
                            </div>
                            <div class="text-sm sm:text-base text-blue-200 mb-4">
                                Independent Travel Advisor
                            </div>

                            <!-- Contact Info -->
                            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-2 sm:gap-4 text-xs sm:text-sm text-blue-200">
                                {{-- <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    London | UK
                                </div> --}}
                                {{-- <a href="tel:+442012345678" class="flex items-center gap-1 hover:text-cyan-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    +44 20 1234 5678
                                </a> --}}
                                <a href="mailto:info@globetrotting.co.uk" class="flex items-center gap-1 hover:text-cyan-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    info@globetrotting.co.uk
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Message -->
                <div class="mb-6 sm:mb-8 mt-6 sm:mt-8 stagger-2 fade-in">
                    <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-4 leading-relaxed">
                        At Globe Trotting, we're all about real experiences. Whether you're chasing sunsets on a quiet
                        beach or exploring the chaos of a new city, we'll help you get there. You focus on the memories
                        — we'll take care of the planning.
                    </p>

                    <p class="text-base sm:text-lg text-blue-200 leading-relaxed">
                        From exotic getaways to cultural explorations, we handle every detail while you focus on the
                        excitement of your next adventure.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8 sm:mb-12 stagger-3 fade-in">
                    {{-- <a href="mailto:support@globetrotting.co.uk"
                        class="bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full text-base sm:text-lg font-semibold transition-all duration-300 transform hover:scale-105 pulse-glow shadow-lg">
                        Request a Quote
                    </a> --}}

                    <a href="{{route('make-a-request')}}"
                        class="border-2 border-white/30 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full text-base sm:text-lg font-semibold hover:bg-white/10 transition-all duration-300 transform hover:scale-105 glass-effect">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" />
                        </svg>
                        Plan My Trip Now
                    </a>
                </div>
            </div>

            <!-- Right Content - Search Card -->
            <div class="flex justify-center lg:justify-end fade-in stagger-2">
                <div class="w-full max-w-md p-6 sm:p-8 rounded-3xl search-card transform hover:scale-105 transition-all duration-500">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-4 sm:mb-6 text-center cursor-default select-none">
                        Make the World Your Playground
                    </h3>

                    <div class="space-y-4 sm:space-y-6">
                        <!-- Featured Destination Card -->
                        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-blue-500/20 to-cyan-400/20 border border-white/20 p-4 group hover:from-blue-500/30 hover:to-cyan-400/30 transition-all duration-300 cursor-default">
                            <div class="flex items-center space-x-3 mb-3">
                                <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <h4 class="text-white font-semibold">Caribbean Paradise</h4>
                                    <p class="text-white/60 text-sm">Experience Jamaica's vibrant culture, pristine beaches, and warm hospitality in the heart of the Caribbean.</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Destination Grid -->
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">
                            <div class="bg-white/10 border border-white/20 rounded-xl p-4 hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-8 h-8 text-orange-400 mb-3 group-hover:scale-110 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <h4 class="text-white font-semibold text-sm mb-1">Beach Escapes</h4>
                                <p class="text-white/60 text-xs">Tropical paradises</p>
                            </div>

                            <div class="bg-white/10 border border-white/20 rounded-xl p-4 hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-8 h-8 text-green-400 mb-3 group-hover:scale-110 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <h4 class="text-white font-semibold text-sm mb-1">City Adventures</h4>
                                <p class="text-white/60 text-xs">Urban exploration</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-6 text-center">
                        <p class="text-white/60 text-sm mb-3">Popular Destinations</p>
                        <div class="flex flex-wrap gap-2 justify-center">
                            <span class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">New York</span>
                            <span class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">Jamaica</span>
                            <span class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">Florida</span>
                            <span class="px-3 py-1 bg-white/10 rounded-full text-white/80 text-sm hover:bg-white/20 cursor-pointer transition-colors duration-300">South Africa</span>
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
        <button class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-cyan-400 opacity-40 hover:opacity-100 transition-opacity"
            data-slide="3"></button>
        <button class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-cyan-400 opacity-40 hover:opacity-100 transition-opacity"
            data-slide="4"></button>
        <button class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-cyan-400 opacity-40 hover:opacity-100 transition-opacity"
            data-slide="5"></button>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div id="modalContent" class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] transform scale-95 opacity-0 transition-all duration-300 relative overflow-hidden">
            <button id="closeModal"
                class="absolute top-4 right-4 z-10 bg-black/50 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-black/70 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div id="videoContainer" class="w-full h-96 md:h-[500px] bg-gray-100 flex items-center justify-center">
                <iframe id="videoFrame" class="w-full h-full" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>

                <div id="instagramFallback" class="hidden text-center p-8">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">View on Instagram</h3>
                    <p class="text-gray-600 mb-6">Instagram content cannot be embedded directly. Click the button below to view the video on Instagram.</p>
                    <a id="instagramLink" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg font-semibold hover:from-purple-600 hover:to-pink-600 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        Open on Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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

    let slideInterval = setInterval(nextSlide, 6000);

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            clearInterval(slideInterval);
            showSlide(parseInt(dot.dataset.slide));
            slideInterval = setInterval(nextSlide, 6000);
        });
    });

    // Video configuration
    const VIDEO_CONFIG = {
        url: 'https://www.instagram.com/reel/DGdTZbvRY5W/?utm_source=ig_web_copy_link'
    };

    function getYouTubeEmbedUrl(url) {
        const patterns = [
            /(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\n?#]+)/,
            /youtube\.com\/watch\?.*v=([^&\n?#]+)/
        ];
        for (let pattern of patterns) {
            const match = url.match(pattern);
            if (match && match[1]) {
                return `https://www.youtube.com/embed/${match[1]}?autoplay=1&rel=0`;
            }
        }
        return null;
    }

    function getInstagramEmbedUrl(url) {
        const match = url.match(/instagram\.com\/(p|reel)\/([A-Za-z0-9_-]+)/);
        if (match) {
            return `https://www.instagram.com/${match[1]}/${match[2]}/embed/`;
        }
        return null;
    }

    function isInstagramUrl(url) {
        return url.includes('instagram.com');
    }

    function isYouTubeUrl(url) {
        return url.includes('youtube.com') || url.includes('youtu.be');
    }

    const videoModal = document.getElementById('videoModal');
    const modalContent = document.getElementById('modalContent');
    const videoFrame = document.getElementById('videoFrame');
    const bookNowBtn = document.getElementById('bookNowBtn');
    const closeModal = document.getElementById('closeModal');
    const instagramFallback = document.getElementById('instagramFallback');
    const instagramLink = document.getElementById('instagramLink');

    function openModal() {
        const url = VIDEO_CONFIG.url;
        videoModal.classList.remove('hidden');
        videoModal.classList.add('flex');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        if (isYouTubeUrl(url)) {
            const embedUrl = getYouTubeEmbedUrl(url);
            if (embedUrl) {
                videoFrame.src = embedUrl;
                videoFrame.classList.remove('hidden');
                instagramFallback.classList.add('hidden');
            } else {
                showInstagramFallback(url);
            }
        } else if (isInstagramUrl(url)) {
            const embedUrl = getInstagramEmbedUrl(url);
            if (embedUrl) {
                videoFrame.src = embedUrl;
                videoFrame.classList.remove('hidden');
                instagramFallback.classList.add('hidden');
                setTimeout(() => {
                    videoFrame.onload = null;
                    videoFrame.onerror = () => showInstagramFallback(url);
                }, 3000);
            } else {
                showInstagramFallback(url);
            }
        } else {
            videoFrame.src = url;
            videoFrame.classList.remove('hidden');
            instagramFallback.classList.add('hidden');
        }
    }

    function showInstagramFallback(url) {
        videoFrame.classList.add('hidden');
        instagramFallback.classList.remove('hidden');
        instagramLink.href = url;
    }

    function closeModalFunc() {
        modalContent.classList.add('scale-95', 'opacity-0');
        modalContent.classList.remove('scale-100', 'opacity-100');
        setTimeout(() => {
            videoModal.classList.add('hidden');
            videoModal.classList.remove('flex');
            videoFrame.src = '';
            videoFrame.classList.remove('hidden');
            instagramFallback.classList.add('hidden');
        }, 300);
    }

    if (bookNowBtn) bookNowBtn.addEventListener('click', openModal);
    closeModal.addEventListener('click', closeModalFunc);
    videoModal.addEventListener('click', (e) => {
        if (e.target === videoModal) closeModalFunc();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !videoModal.classList.contains('hidden')) {
            closeModalFunc();
        }
    });

    // Initialize first slide
    showSlide(0);
</script>