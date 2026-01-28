<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* CRITICAL: Force maximum image sharpness */
    .destination-image {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
        image-rendering: high-quality;
        -ms-interpolation-mode: nearest-neighbor;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        transform: translateZ(0) scale(1.0001);
        -webkit-transform: translateZ(0) scale(1.0001);
        will-change: auto;
    }
    
    /* Remove ALL blur effects */
    .no-blur {
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
        filter: none !important;
        -webkit-filter: none !important;
    }
    
    /* Ensure crisp backgrounds */
    .destination-card {
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }
    
    /* Sharp text rendering */
    .destination-card h3,
    .destination-card p,
    .destination-card span,
    .price-tag {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
        transform: translateZ(0);
    }
    
    /* Solid price tag - NO blur */
    .price-tag {
        background: rgba(255, 255, 255, 0.98) !important;
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
    }
    
    /* Smooth hover without blur */
    .destination-card:hover .destination-image {
        transform: scale(1.05) translateZ(0);
        transition: transform 0.5s ease;
        image-rendering: -webkit-optimize-contrast;
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

@if($destinations && $destinations->count() > 0)
<!-- Popular Destinations Section -->
<section id='popular-destination'
    class="relative py-12 md:py-20 bg-gradient-to-br from-blue-50 to-blue-50 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <!-- Floating Background Shapes -->
        <div class="absolute top-20 left-10 w-20 h-20 md:w-32 md:h-32 bg-sky-400/10 rounded-full float-animation"
            style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-20 w-16 h-16 md:w-24 md:h-24 bg-sky-300/10 rounded-full float-animation"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-32 left-32 w-12 h-12 md:w-20 md:h-20 bg-sky-500/10 rounded-full float-animation"
            style="animation-delay: 2s;"></div>

        <!-- Wave Pattern -->
        <svg class="absolute top-0 w-full h-16 md:h-24 opacity-30" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,60 C300,20 600,100 900,60 C1050,40 1150,80 1200,60 L1200,0 L0,0 Z" fill="url(#waveGradient)">
            </path>
            <defs>
                <linearGradient id="waveGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#0EA5E9;stop-opacity:0.1" />
                    <stop offset="50%" style="stop-color:#0284C7;stop-opacity:0.2" />
                    <stop offset="100%" style="stop-color:#0EA5E9;stop-opacity:0.1" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="relative z-10 container mx-auto px-4 md:px-6">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16">
            <div class="inline-block mb-4">
                <span
                    class="px-3 py-1 md:px-4 md:py-2 bg-sky-100 text-sky-600 rounded-full text-xs md:text-sm font-semibold tracking-wide uppercase">
                    Explore The World With Confidence
                </span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-6xl font-bold text-gray-900 mb-4 md:mb-6">
                Featured
                <span class="bg-gradient-to-r from-sky-600 to-sky-500 bg-clip-text text-transparent">
                    Destinations
                </span>
            </h2>
            
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4 mb-8">
                Discover our latest handpicked destinations for your next unforgettable adventure.
            </p>
        </div>

        <!-- Destinations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8 md:mb-12">
            @foreach ($destinations as $destination)
                <!-- Destination Card - Redesigned with Slug Link -->
                <a href="{{ route('destination.show', $destination->slug) }}" 
                   class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 destination-card block">
                    
                    <!-- Image Section -->
                    <div class="relative aspect-[4/3] overflow-hidden">
                        @if($destination->image_url)
                            <img src="{{ $destination->image_url }}" 
                                 alt="{{ $destination->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 destination-image">
                        @else
                            <!-- Fallback gradient if no image -->
                            <div class="w-full h-full bg-gradient-to-br {{ $destination->gradient ?? 'from-blue-400 to-indigo-500' }} flex items-center justify-center">
                                <span class="text-white text-6xl font-bold opacity-30">
                                    {{ substr($destination->title, 0, 1) }}
                                </span>
                            </div>
                        @endif
                        
                        <!-- Price Tag - Positioned on Image -->
                        @if($destination->price)
                            <div class="absolute top-4 right-4 px-3 py-2 rounded-full shadow-lg price-tag no-blur">
                                <span class="text-sky-600 font-bold text-sm">From £{{ number_format($destination->price) }}</span>
                            </div>
                        @endif

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-5">
                        <!-- Country Location -->
                        @if($destination->country)
                            <div class="flex items-center text-blue-500 text-sm mb-2">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $destination->country }}
                            </div>
                        @endif

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-slate-800 mb-2 line-clamp-2 group-hover:text-sky-600 transition-colors">
                            {{ $destination->title }}
                        </h3>
                        
                        <!-- Description -->
                        @if($destination->short_description)
                            <p class="text-slate-600 text-sm mb-4 line-clamp-2">
                                {{ $destination->short_description }}
                            </p>
                        @endif

                        <!-- Footer Info -->
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                            @if($destination->nights)
                                <div class="flex items-center text-slate-500 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $destination->nights }} Nights
                                </div>
                            @endif

                            @if($destination->adults)
                                <div class="flex items-center text-slate-500 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    {{ $destination->adults }} Adults
                                </div>
                            @endif
                        </div>

                        <!-- View Details Button -->
                        <div class="mt-4 w-full bg-blue-800 hover:bg-sky-600 text-white py-3 rounded-lg font-semibold transition-all duration-300 flex items-center justify-center group-hover:bg-sky-600">
                            <span>View Details</span>
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <div class="mx-auto w-24 h-24 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">No Destinations Available</h3>
            <p class="text-gray-600 mb-6">Add some amazing destinations to showcase here!</p>
        </div>
    @endif

    <!-- View All Button -->
    @if($destinations && $destinations->count() > 0)
        <div class="text-center">
            <a href="{{ route('destinations') }}" class="inline-flex items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                View All Destinations
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    @endif
    </div>
</section>