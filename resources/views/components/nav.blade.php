<nav class="bg-slate-900/80 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo - Left Side -->
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('index') }}" class="transition-transform duration-200 hover:scale-105">
                    <img src="/images/global-throthlelogo-new.png" alt="Globe Trotting Logo"
                        class="h-10 sm:h-12 lg:h-14 w-auto object-contain">
                </a>
            </div>

            <!-- Desktop Navigation - Center -->
            <div class="hidden md:flex flex-1 justify-center">
                <div class="flex items-center space-x-6">
                    <a href="{{route('about')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">About</a>
                    <a href="{{ route('contact') }}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                    <a href="{{route('destinations')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Destinations</a>
                    <a href="{{route('make-a-request')}}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Schedule With Us</a>
                </div>
            </div>

            <!-- Auth & Book Now - Right Side -->
            <div class="hidden md:flex items-center space-x-4 flex-shrink-0">
                {{-- Desktop Navigation --}}
                @auth
                    <!-- Authenticated User Menu -->
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Admin Dashboard</a>
                    @else
                        <a href="{{ route('user.dashboard') }}"
                            class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Dashboard</a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- Guest User Menu -->
                    <a href="{{ route('login') }}"
                        class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Sign In</a>
                    <a href="{{ route('register') }}"
                        class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-600 hover:to-cyan-500 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Sign Up
                    </a>
                @endauth
                
                <a href="https://nathanielcopelandcampbell.inteletravel.uk/" target="_blank"
                    class="bg-gradient-to-r from-emerald-500 to-teal-400 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-emerald-600 hover:to-teal-500 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Book Now
                </a>
            </div>

            <!-- Mobile Menu Button - Right Side -->
            <div class="md:hidden flex items-center">
                <button id="mobileMenuButton" class="text-blue-200 hover:text-white focus:outline-none p-2 rounded-md hover:bg-slate-800/50 transition-colors">
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
    <div class="md:hidden hidden bg-slate-900/95 backdrop-blur-lg border-t border-blue-900/50" id="mobileMenu">
        <div class="px-2 pt-2 pb-4 space-y-1">
            <a href="{{route('index')}}"
                class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Home
            </a>
            <a href="{{route('about')}}"
                class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                About
            </a>
            <a href="{{route('contact')}}"
                class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Contact
            </a>
            <a href="{{route('destinations')}}"
                class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Destinations
            </a>
            <a href="{{route('make-a-request')}}"
                class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Schedule With Us
            </a>

            {{-- Mobile Navigation --}}
            @auth
                <!-- Authenticated User Mobile Menu -->
                <div class="border-t border-blue-900/50 mt-3 pt-3">
                    <div class="px-3 py-1 text-xs font-semibold text-blue-300 uppercase tracking-wider">
                        Account
                    </div>
                    
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors mt-1">
                            Admin Dashboard
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}"
                            class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors mt-1">
                            Dashboard
                        </a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="mt-1">
                        @csrf
                        <button type="submit"
                            class="text-blue-200 hover:text-white hover:bg-slate-800/50 w-full text-left block px-3 py-2 rounded-md text-base font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <!-- Guest User Mobile Menu -->
                <div class="border-t border-blue-900/50 mt-3 pt-3 space-y-2">
                    <div class="px-3 py-1 text-xs font-semibold text-blue-300 uppercase tracking-wider">
                        Get Started
                    </div>
                    <a href="{{ route('login') }}"
                        class="text-blue-200 hover:text-white hover:bg-slate-800/50 block px-3 py-2 rounded-md text-base font-medium transition-colors text-center border border-blue-700/50">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white block px-3 py-2.5 rounded-md text-base font-medium text-center hover:from-blue-600 hover:to-cyan-500 transition-all duration-200 shadow-lg">
                        Sign Up
                    </a>
                </div>
            @endauth

            <a href="https://nathanielcopelandcampbell.inteletravel.uk/" target="_blank"
                class="bg-gradient-to-r from-emerald-500 to-teal-400 text-white block px-3 py-2.5 rounded-md text-base font-medium text-center mt-3 hover:from-emerald-600 hover:to-teal-500 transition-all duration-200 shadow-lg">
                Book Now
            </a>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle functionality
    document.getElementById('mobileMenuButton').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Close mobile menu on window resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            document.getElementById('mobileMenu').classList.add('hidden');
        }
    });

    // Close mobile menu when navigating
    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.add('hidden');
        });
    });
</script>