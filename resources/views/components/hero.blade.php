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

    /* Circular Images - Scattered Design */
    .circle-gallery {
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        pointer-events: none;
        z-index: 15;
    }

    .circle-img {
        position: absolute;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        animation: floatGentle 8s ease-in-out infinite;
        pointer-events: all;
        cursor: pointer;
    }

    .circle-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .circle-img:hover {
        transform: scale(1.15) !important;
        border-color: rgba(34, 211, 238, 0.7);
        box-shadow: 0 20px 60px rgba(34, 211, 238, 0.5);
        z-index: 20;
    }

    .circle-img:hover img {
        transform: scale(1.1);
    }

    @keyframes floatGentle {
        0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
        25% { transform: translateY(-20px) translateX(10px) rotate(2deg); }
        50% { transform: translateY(-10px) translateX(-10px) rotate(-2deg); }
        75% { transform: translateY(-15px) translateX(5px) rotate(1deg); }
    }

    /* Individual Circle Positioning */
    .circle-1 {
        width: 200px;
        height: 200px;
        top: 10%;
        right: 15%;
        animation-delay: 0s;
    }

    .circle-2 {
        width: 140px;
        height: 140px;
        top: 35%;
        right: 8%;
        animation-delay: 1.5s;
    }

    .circle-3 {
        width: 160px;
        height: 160px;
        top: 55%;
        right: 25%;
        animation-delay: 3s;
    }

    .circle-4 {
        width: 120px;
        height: 120px;
        top: 20%;
        right: 40%;
        animation-delay: 2s;
    }

    .circle-5 {
        width: 180px;
        height: 180px;
        top: 68%;
        right: 10%;
        animation-delay: 0.5s;
    }

    /* Hide circles on smaller screens */
    @media (max-width: 1024px) {
        .circle-gallery {
            display: none;
        }
    }
</style>

<section class="relative min-h-screen overflow-hidden">
    <!-- Background Slider -->
    <div class="absolute inset-0">
        <div id="slider" class="relative w-full h-full">
            <!-- Slide 1 - Tropical Beach -->
            <div class="absolute inset-0 bg-cover bg-center opacity-100 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=1920&q=80');">
            </div>
            <!-- Slide 2 - Mountain Adventure -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=1920&q=80');">
            </div>
            <!-- Slide 3 - City Skyline -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?auto=format&fit=crop&w=1920&q=80');">
            </div>
            <!-- Slide 4 - Safari Wildlife -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1920&q=80');">
            </div>
            <!-- Slide 5 - Island Paradise -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1920&q=80');">
            </div>
            <!-- Slide 6 - Caribbean Beach -->
            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1920&q=80');">
            </div>
        </div>
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/85 via-blue-900/75 to-slate-800/85"></div>
    </div>

    <!-- Scattered Circular Images -->
    <div class="circle-gallery">
        <!-- Circle 1 - Beach Paradise -->
        <div class="circle-img circle-1">
            <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=400&q=80" 
                 alt="Beach Paradise">
        </div>

        <!-- Circle 2 - Mountain Views -->
        <div class="circle-img circle-2">
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=400&q=80" 
                 alt="Mountain Adventure">
        </div>

        <!-- Circle 3 - City Exploration -->
        <div class="circle-img circle-3">
            <img src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?auto=format&fit=crop&w=400&q=80" 
                 alt="New York City">
        </div>

        <!-- Circle 4 - Safari Adventure -->
        <div class="circle-img circle-4">
            <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=400&q=80" 
                 alt="Safari Wildlife">
        </div>

        <!-- Circle 5 - Tropical Resort -->
        <div class="circle-img circle-5">
            <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=400&q=80" 
                 alt="Tropical Island">
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative z-20 container mx-auto px-4 sm:px-6 py-8 sm:py-12 md:py-16 lg:py-20 flex flex-col justify-center min-h-screen pt-20 sm:pt-24">
        <div class="max-w-4xl mx-auto lg:mx-0">
            <!-- Logo and Header -->
            <div class="text-center lg:text-left fade-in mb-8 lg:mb-12">
                <a href="/">
                    <div class="flex flex-col items-center lg:items-start">
                        <img src="/images/global-throthlelogo-new.png" alt="Globe Trotting Logo"
                            class="h-24 sm:h-28 md:h-32 lg:h-36 w-auto object-contain mx-auto lg:mx-0 float-animation">
                        <div class="logo-text mt-2">GLOBE TROTTING</div>
                        <div class="logo-tagline">Your Journey, Our Expertise</div>
                    </div>
                </a>
            </div>

            <!-- Main Message -->
          <div class="mb-8 sm:mb-10 stagger-2 fade-in max-w-3xl">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
        Create Memories That Last a Lifetime
    </h1>
    
    <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-4 leading-relaxed">
        At Globe Trotting, we're all about genuine experiences. Whether you're chasing sunsets on a quiet
        beach or exploring the bustle of a new city, we'll help you get there.
    </p>

    <p class="text-base sm:text-lg text-blue-200 leading-relaxed">
        From exotic getaways to cultural explorations, we handle every detail while you focus on the
        excitement of your next adventure.
    </p>
</div>


            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start stagger-3 fade-in">
                <a href="{{route('make-a-request')}}"
                    class="inline-flex items-center justify-center bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 pulse-glow shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" />
                    </svg>
                    Plan My Trip Now
                </a>

                <a href="{{route('destinations')}}"
                    class="inline-flex items-center justify-center border-2 border-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-all duration-300 transform hover:scale-105 glass-effect">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    Explore Destinations
                </a>
            </div>

        </div>
    </div>

    <!-- Slider Controls -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-30">
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

    <!-- Scroll Indicator -->
    <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-30 fade-in stagger-3 hidden sm:flex">
        <div class="flex flex-col items-center text-white/60 hover:text-white transition-colors cursor-pointer">
            <span class="text-sm mb-2">Scroll to explore</span>
            <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
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
            dot.style.opacity = i === index ? '0.7' : '0.4';
        });
        current = index;
    }

    function nextSlide() {
        let next = (current + 1) % total;
        showSlide(next);
    }

    // Auto-advance slides every 5 seconds
    let slideInterval = setInterval(nextSlide, 5000);

    // Manual slide control
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            clearInterval(slideInterval);
            showSlide(parseInt(dot.dataset.slide));
            slideInterval = setInterval(nextSlide, 5000);
        });
    });

    // Smooth scroll for destination link
    document.querySelector('a[href="#destinations"]')?.addEventListener('click', function(e) {
        e.preventDefault();
        const destination = document.querySelector('#destinations');
        if (destination) {
            destination.scrollIntoView({ behavior: 'smooth' });
        }
    });

    // Parallax effect for circular images on scroll
    if (window.innerWidth > 1024) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const circles = document.querySelectorAll('.circle-img');
            
            circles.forEach((circle, index) => {
                const speed = 0.15 + (index * 0.05);
                const yPos = -(scrolled * speed);
                const currentTransform = circle.style.transform || '';
                
                // Preserve the hover and animation transforms
                if (!circle.matches(':hover')) {
                    circle.style.transform = `translateY(${yPos}px)`;
                }
            });
        });
    }

    // Initialize first slide
    showSlide(0);
</script>