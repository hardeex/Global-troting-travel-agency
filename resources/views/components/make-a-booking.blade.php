<section class="py-12 sm:py-16 lg:py-20 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg overflow-hidden">
            <div class="grid lg:grid-cols-2 gap-0">
                
                <!-- Left Side - Image -->
                <div class="relative h-56 sm:h-64 lg:h-auto lg:min-h-[500px] order-2 lg:order-1">
                    <img src="https://images.unsplash.com/photo-1488085061387-422e29b40080?auto=format&fit=crop&w=800&q=80" 
                         alt="Traveler exploring" 
                         class="w-full h-full object-cover">
                </div>

                <!-- Right Side - Content -->
                <div class="p-6 sm:p-8 lg:p-12 xl:p-16 flex flex-col justify-center order-1 lg:order-2">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 mb-4 sm:mb-6 leading-tight">
                        Your Journey, Our Passion Always!
                    </h2>
                    
                    <p class="text-base sm:text-lg text-slate-600 mb-6 sm:mb-8 leading-relaxed space-y-4">
                        <span class="block">
                            At Global Trotting, we are passionate about making every journey seamless, stress-free, and memorable.
                        </span>
                        <span class="block">
                            Our mission is to provide travelers with effortless booking, reliable support, and affordable travel solutions.
                        </span>
                        <span class="block">
                            Whether you're planning an adventure, a business trip, or a spontaneous getaway, we are dedicated to ensuring smooth travel experiences with convenience, trust, and exceptional service.
                        </span>
                    </p>

                    <div class="mt-2">
                        <a href="{{ route('make-a-request') }}" 
                           class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 sm:px-8 py-3 sm:py-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg hover:scale-105 w-full sm:w-auto text-center group">
                            <span>Book Now</span>
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>