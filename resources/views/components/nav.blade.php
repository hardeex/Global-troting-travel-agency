<nav class="bg-slate-900/80 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-900/50">


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">


            <div class="flex items-center h-16 sm:h-20 px-4 sm:px-6">
                <a href="{{ route('index') }}" class="flex-shrink-0 transition-transform duration-200 hover:scale-105">
                    <img src="/images/global-throthlelogo-new.png" alt="Globe Trotting Logo"
                        class="h-10 sm:h-12 lg:h-16 w-auto object-contain">
                </a>
            </div>


            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-6">
                      <a href="{{route('index')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
                      
                    <a href="{{route('about')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">About</a>
                    <a href="{{ route('contact') }}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                    <a href="{{route('destinations')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Destinations</a>

                        <a href="{{route('make-a-request')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Schedule With Us</a>
                    {{-- <a href="{{ route('admin.bookings') }}"
                        class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-600 hover:to-cyan-500 transition-colors">
                        Manage Booking
                    </a> --}}
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobileMenuButton" class="text-blue-200 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @include('feedback')

    <!-- Mobile Menu (hidden by default) -->
    <div class="md:hidden hidden bg-slate-900/95 backdrop-blur-lg" id="mobileMenu">
        <div class="px-2 pt-2 pb-4 space-y-1">

              <a href="{{route('index')}}"
                class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="{{route('about')}}"
                class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>

              <a href="{{route('contact')}}"
                class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>


          
            <a href="{{route('destinations')}}"
                class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Destinations</a>

                  <a href="{{route('make-a-request')}}"
                class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Plan Booking</a>


            {{-- <a href="{{ route('admin.bookings') }}"
                class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white block px-3 py-2 rounded-md text-base font-medium text-center mt-2">
                Manage Booking
            </a> --}}
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle functionality
    document.getElementById('mobileMenuButton').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
        }
    });
</script>
