@extends('components.base')
@section('title', 'All Destinations')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Header Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-br from-slate-50 to-blue-50 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-20 h-20 md:w-32 md:h-32 bg-sky-400/10 rounded-full float-animation" style="animation-delay: 0s;"></div>
            <div class="absolute top-40 right-20 w-16 h-16 md:w-24 md:h-24 bg-sky-300/10 rounded-full float-animation" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-32 left-32 w-12 h-12 md:w-20 md:h-20 bg-sky-500/10 rounded-full float-animation" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative mt-12 z-10 container mx-auto px-4 md:px-6 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-gray-900 mb-6">
                All
                <span class="bg-gradient-to-r from-sky-600 to-sky-500 bg-clip-text text-transparent">
                    Destinations
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Explore our complete collection of handpicked destinations for your next unforgettable adventure.
            </p>
        </div>
    </section>

    <!-- Main Destinations Section -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto px-4 md:px-6">
            @if($destinations && $destinations->count() > 0)
                <!-- Destinations Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8 md:mb-12">
                    @foreach ($destinations as $destination)
                        <!-- Destination Card -->
                        <a href="{{ route('destination.show', $destination->slug) }}" 
                           class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 block">
                            
                            <!-- Image Section -->
                            <div class="relative aspect-[4/3] overflow-hidden">
                                @if($destination->image_url)
                                    <img src="{{ $destination->image_url }}" 
                                         alt="{{ $destination->title }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
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
                                    <div class="absolute top-4 right-4 bg-white px-3 py-2 rounded-full shadow-lg">
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

                <!-- Enhanced Pagination -->
                @if($destinations->hasPages())
                    <div class="flex flex-col items-center space-y-4">
                        <!-- Pagination Info -->
                        <div class="text-center">
                            <p class="text-gray-600 text-sm">
                                Showing {{ $destinations->firstItem() }} to {{ $destinations->lastItem() }} 
                                of {{ $destinations->total() }} destinations
                            </p>
                        </div>

                        <!-- Pagination Links -->
                        <div class="flex items-center justify-center">
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                {{-- Previous Page Link --}}
                                @if ($destinations->onFirstPage())
                                    <span class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-1 hidden sm:inline">Previous</span>
                                    </span>
                                @else
                                    <a href="{{ $destinations->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-sky-50 hover:text-sky-600 transition-colors duration-200">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-1 hidden sm:inline">Previous</span>
                                    </a>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($destinations->getUrlRange(1, $destinations->lastPage()) as $page => $url)
                                    @if ($page == $destinations->currentPage())
                                        <span class="relative inline-flex items-center px-4 py-2 border border-sky-500 bg-sky-600 text-white font-semibold">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-sky-50 hover:text-sky-600 transition-colors duration-200">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($destinations->hasMorePages())
                                    <a href="{{ $destinations->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-sky-50 hover:text-sky-600 transition-colors duration-200">
                                        <span class="mr-1 hidden sm:inline">Next</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                        <span class="mr-1 hidden sm:inline">Next</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </nav>
                        </div>
                    </div>
                @endif

            @else
                <!-- Empty State -->
                <div class="text-center py-24">
                    <div class="mx-auto w-32 h-32 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center mb-8">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">No Destinations Available</h3>
                    <p class="text-xl text-gray-600 mb-8">Start exploring the world by adding amazing destinations!</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>
            @endif
        </div>
    </section>

    <style>
        @keyframes float-animation {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float-animation 6s ease-in-out infinite;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

@endsection