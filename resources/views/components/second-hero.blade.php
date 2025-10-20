<section class="relative bg-gradient-to-br from-sky-50 via-white to-sky-100 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-sky-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse delay-700"></div>
    
    <div class="container mx-auto px-6 py-20 lg:py-28">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div class="space-y-6 lg:order-1">
                <div class="inline-block">
                    <span class="bg-sky-100 text-sky-600 px-4 py-2 rounded-full text-sm font-medium">
                        ✨ Your Adventure Starts Here
                    </span>
                </div>
                
                <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                    Explore The
                    <span class="text-sky-500 relative">
                        Great Outdoors
                        <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 300 8" fill="none">
                            <path d="M1 5.5C50 2.5 250 2.5 299 5.5" stroke="#0ea5e9" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </span>
                </h1>
                
                <p class="text-lg text-gray-600 leading-relaxed">
                    Let's explore new horizons, break free from ordinary routines, and embark on unforgettable journeys with effortless travel, limitless possibilities, and unforgettable memories at every turn.
                </p>
                
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{route('make-a-request')}}" class="bg-sky-500 hover:bg-sky-600 text-white px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg shadow-sky-500/30">
                       Make a Request
                    </a>
                    {{-- <a href="#" class="bg-white hover:bg-gray-50 text-gray-800 px-8 py-4 rounded-lg font-semibold border-2 border-gray-200 transition-all">
                        View Gear
                    </a> --}}
                </div>
                
               
            </div>
            
            <!-- Image -->
            <div class="lg:order-2 relative">
                <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                    <img src="{{ asset('/images/travel-icon.png') }}" 
                         alt="Adventure Ready" 
                         class="w-full h-auto rounded-3xl shadow-2xl shadow-sky-500/20">
                </div>
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-6 z-20 animate-bounce">
                    <div class="flex items-center gap-3">
                        <div class="bg-sky-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Ready to Go!</div>
                            <div class="text-sm text-gray-600">Fully Equipped</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>