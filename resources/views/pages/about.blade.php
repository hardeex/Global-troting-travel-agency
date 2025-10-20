@extends('components.base')
@section('title', 'About Nathaniel CC.')

@section('content')
<style>
    * {
        font-family: 'Inter', sans-serif;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes gradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .float-animation { 
        animation: float 4s ease-in-out infinite; 
    }
    
    .slide-in { 
        animation: slideIn 0.8s ease-out; 
    }
    
    .fade-in { 
        animation: fadeIn 1s ease-out; 
    }
    
    .gradient-animate { 
        animation: gradient 6s ease infinite; 
    }

    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }

    .gradient-text {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-gradient {
        background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .blob {
        border-radius: 50% 40% 60% 30%;
        background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        animation: float 8s ease-in-out infinite;
    }

    .destination-card {
        background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.2);
    }

    .glass-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .service-icon {
        transition: transform 0.3s ease;
    }

    .service-icon:hover {
        transform: rotate(10deg) scale(1.1);
    }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease;
    }

    .scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }

    html {
        scroll-behavior: smooth;
    }
</style>

<!-- Hero Section -->
<section class="relative  flex items-center justify-center overflow-hidden pt-16" style="background: linear-gradient(135deg, rgba(30, 64, 175, 0.9) 0%, rgba(124, 58, 237, 0.9) 100%), url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat; animation: gradient 15s ease infinite; background-size: 400% 400%, cover;">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="blob absolute -top-20 -left-20 w-72 h-72 opacity-30"></div>
        <div class="blob absolute top-1/3 -right-32 w-96 h-96 opacity-20" style="animation-delay: 2s;"></div>
        <div class="blob absolute -bottom-20 left-1/4 w-80 h-80 opacity-25" style="animation-delay: 4s;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 right-10 text-white/30 text-4xl float-animation">✈️</div>
    <div class="absolute bottom-32 left-10 text-white/20 text-3xl float-animation" style="animation-delay: 1s;">🌍</div>
    <div class="absolute top-1/3 left-20 text-white/25 text-2xl float-animation" style="animation-delay: 2s;">🗺️</div>

    <div class="relative z-10 text-center px-4 max-w-6xl mx-auto">
        <div class="mb-12 mt-12">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 fade-in stagger-1">
                About Globe Trotting
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 fade-in stagger-2 font-light">
                Explore the World with Confidence
            </p>
            <p class="text-lg md:text-xl text-white/80 max-w-4xl mx-auto mb-12 fade-in stagger-3 leading-relaxed">
                We're not just about booking flights—we're about crafting experiences that spark joy, open minds, and create lifelong memories.
            </p>
        </div>

        <!-- Travel Advisor Info -->
        <div class="glass-card rounded-2xl p-6 md:p-8 max-w-2xl mx-auto fade-in stagger-4">
            <div class="flex flex-col lg:flex-row items-center gap-6">
                <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                    NC
                </div>
                <div class="text-center lg:text-left">
                    <div class="text-2xl font-bold text-gray-800 mb-2">
                        Nathaniel CC.
                    </div>
                    <div class="text-lg text-gray-600 mb-4">
                        Independent Travel Advisor
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            London, UK
                        </div>
                        <a href="tel:+447368818431" class="flex items-center gap-2 hover:text-blue-600 transition-colors">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                           +44 1375 481962
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
            <div class="scroll-reveal">
                <div class="bg-gradient-to-br from-blue-600 to-purple-700 rounded-2xl p-8 text-white">
                    <h3 class="text-3xl font-bold mb-6">Our Mission</h3>
                    <p class="text-lg leading-relaxed mb-6">
                        Every journey we plan is backed by local insight, personalized service, and a passion for adventure. From relaxing retreats to adrenaline-filled escapes, we help you travel smarter, deeper, and with confidence.
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <span class="font-semibold">Wherever you're headed, count on us to turn travel dreams into unforgettable realities—minus the hassle, plus the magic.</span>
                    </div>
                </div>
            </div>

            <div class="scroll-reveal">
                <h2 class="text-4xl font-bold gradient-text mb-6">About Globe Trotting</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    At Globe Trotting, we're not just about booking flights—we're about crafting experiences that spark joy, open minds, and create lifelong memories. Every journey we plan is backed by local insight, personalized service, and a passion for adventure.
                </p>
                <p class="text-lg text-gray-700 leading-relaxed">
                    From relaxing retreats to adrenaline-filled escapes, we help you travel smarter, deeper, and with confidence. Wherever you're headed, count on us to turn travel dreams into unforgettable realities—minus the hassle, plus the magic.
                </p>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <div class="scroll-reveal">
            <div class="bg-gradient-to-r from-blue-600 to-purple-700 rounded-2xl p-8 md:p-12 text-white">
                <h3 class="text-3xl md:text-4xl font-bold mb-8 text-center">Why Choose Globe Trotting?</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">Expert Local Knowledge</h4>
                        <p class="text-white/90">Our team provides insider access and authentic local experiences you won't find elsewhere.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🛟</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">24/7 Support</h4>
                        <p class="text-white/90">We're here for you every step of the way, from planning to your safe return home.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🌱</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">Sustainable Travel</h4>
                        <p class="text-white/90">We're committed to responsible tourism that benefits local communities and preserves destinations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16 scroll-reveal">
            <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-6">Our Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive travel solutions tailored to your unique needs and desires.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-gray-50 rounded-xl p-6 shadow-lg card-hover text-center scroll-reveal">
                <div class="service-icon w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">✨</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Personalized Itineraries</h3>
                <p class="text-gray-600">Custom travel plans tailored to your interests, budget, and timeline.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 shadow-lg card-hover text-center scroll-reveal">
                <div class="service-icon w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">💼</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Hassle-Free Planning</h3>
                <p class="text-gray-600">Complete booking management from flights to accommodations.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 shadow-lg card-hover text-center scroll-reveal">
                <div class="service-icon w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">💎</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Exclusive Access</h3>
                <p class="text-gray-600">Special deals and insider access to unique experiences.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 shadow-lg card-hover text-center scroll-reveal">
                <div class="service-icon w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🌐</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Global Destinations</h3>
                <p class="text-gray-600">Authentic experiences with deep local knowledge and insights.</p>
            </div>
        </div>
    </div>
</section>

<script>
    // Scroll reveal animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-reveal').forEach(el => {
        observer.observe(el);
    });

    // Add hover effects to destination cards
    document.querySelectorAll('.destination-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.03)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Initialize animations on load
    window.addEventListener('load', () => {
        document.querySelectorAll('.fade-in').forEach(el => {
            el.style.opacity = '1';
        });
    });
</script>

@endsection