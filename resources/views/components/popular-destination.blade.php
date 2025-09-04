@php
    $destinations = [
        [
            'name' => 'Montego Bay, Jamaica',
            'description' => 'Stunning beaches, vibrant culture, and tropical paradise adventures',
            'price' => 'From  £  1,199',
            'duration' => '6 Days • Beach Resort',
            'image' =>
                'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'rating' => 4.8,
            'reviews' => 342,
            'gradient' => 'from-emerald-400 to-cyan-500',
        ],
        [
            'name' => 'Disneyworld, Florida',
            'description' => 'Magical experiences, thrilling rides, and unforgettable family memories',
            'price' => 'From £   1,899',
            'duration' => '5 Days • Family Fun',
            'image' =>
                'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'rating' => 4.9,
            'reviews' => 567,
            'gradient' => 'from-purple-400 to-pink-500',
        ],
        [
            'name' => 'Gosheni Safari, South Africa',
            'description' => 'Wildlife adventures, breathtaking landscapes, and authentic safari experiences',
            'price' => 'From  £  2,299',
            'duration' => '8 Days • Wildlife Safari',
            'image' =>
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'rating' => 4.7,
            'reviews' => 189,
            'gradient' => 'from-orange-400 to-red-500',
        ],
        [
            'name' => 'New York, USA',
            'description' => 'Iconic skyline, world-class shows, and the city that never sleeps',
            'price' => 'From  £   1,799',
            'duration' => '4 Days • City Explorer',
            'image' =>
                'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'rating' => 4.8,
            'reviews' => 423,
            'gradient' => 'from-blue-400 to-indigo-500',
        ],
    ];
@endphp

<!-- Popular Destinations Section -->
<section id='popular-destination'
    class="relative py-12 md:py-20 bg-gradient-to-br from-slate-50 to-blue-50 overflow-hidden">
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
                Where will your passport take you next? From beach bliss to city buzz, these handpicked hotspots deliver
                unforgettable vibes:
            </p>

            <div
                class="text-left text-gray-700 max-w-2xl mx-auto space-y-4 px-6 md:px-0 text-base md:text-lg leading-relaxed">
                <p><strong>• Florida</strong> – Sunshine and rollercoasters. Whether it’s Miami’s nightlife or Orlando’s
                    thrills, Florida brings the fun.</p>
                <p><strong>• Jamaica</strong> – Feel the rhythm, taste the spice, and soak in the soul of the Caribbean.
                    Irie vibes guaranteed.</p>
                <p><strong>• South Africa</strong> – Safari at sunrise, vineyards by noon, and ocean views by sunset.
                    Adventure meets elegance.</p>
                <p><strong>• New York</strong> – Bold, brilliant, and buzzing 24/7. From skyline strolls to underground
                    eats, NYC never sleeps—and neither will your itinerary.</p>
            </div>

            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4 mt-8">
                Ready to roam? Let’s make it happen.
            </p>

        </div>

        <!-- Destinations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8 md:mb-12">
            @foreach ($destinations as $destination)
                <!-- Destination Card -->
                <div class="group relative overflow-hidden rounded-2xl md:rounded-3xl destination-card cursor-pointer">
                    <div class="aspect-[4/5] bg-gradient-to-br {{ $destination['gradient'] }} destination-image relative"
                        style="background-image: url('{{ $destination['image'] }}');">
                        <!-- Price Tag -->
                        <div
                            class="absolute top-3 right-3 md:top-4 md:right-4 px-2 py-1 md:px-3 md:py-1 bg-white/90 backdrop-blur-sm rounded-full text-sky-600 font-bold text-xs md:text-sm price-tag">
                            {{ $destination['price'] }}
                        </div>

                        <!-- Heart Icon -->
                        {{-- <button
                            class="absolute top-3 left-3 md:top-4 md:left-4 w-8 h-8 md:w-10 md:h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 heart-btn">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button> --}}

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 text-white">
                        <div class="flex items-center mb-2">
                            {{-- <div class="rating-stars flex space-x-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($destination['rating']))
                                        <svg class="w-3 h-3 md:w-4 md:h-4 fill-current text-yellow-400"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @else
                                        <svg class="w-3 h-3 md:w-4 md:h-4 fill-current text-white/30"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endif
                                @endfor
                            </div> --}}
                            {{-- <span class="ml-2 text-xs md:text-sm text-white/90">{{ $destination['rating'] }}
                                ({{ $destination['reviews'] }} reviews)</span> --}}
                        </div>
                        <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-2">{{ $destination['name'] }}</h3>
                        <p class="text-white/80 text-xs md:text-sm mb-3 line-clamp-2">{{ $destination['description'] }}
                        </p>
                        {{-- <div class="flex items-center justify-between">
                            <span class="text-xs md:text-sm text-white/70">{{ $destination['duration'] }}</span>
                            <button
                                class="px-3 py-1 md:px-4 md:py-2 bg-sky-500 hover:bg-sky-400 rounded-full text-xs md:text-sm font-semibold transition-all duration-300 transform hover:scale-105">
                                Book Now
                            </button>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center">
           
        </div>
    </div>
</section>

<style>
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px)
        }

        50% {
            transform: translateY(-15px)
        }
    }

    .float-animation {
        animation: float 6s ease-in-out infinite;
    }

    .destination-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        overflow: hidden;
    }

    .destination-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border-color: rgba(14, 165, 233, 0.3);
    }

    .destination-image {
        background-size: cover;
        background-position: center;
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .destination-card:hover .destination-image {
        transform: scale(1.1);
    }

    .price-tag {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .destination-card:hover .price-tag {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .heart-btn:hover {
        transform: scale(1.1);
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Mobile optimizations */
    @media (max-width: 768px) {
        .destination-card {
            margin-bottom: 1rem;
        }

        .destination-card:hover {
            transform: translateY(-5px) scale(1.01);
        }

        .float-animation {
            animation: none;
            /* Disable floating animation on mobile for better performance */
        }
    }
</style>
