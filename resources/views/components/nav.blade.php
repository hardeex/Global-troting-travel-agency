<nav class="bg-slate-900/80 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo/Brand -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold">
                        <span class="bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">
                            Globe Trotting
                        </span>
                    </h1>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-6">
                    <a href="#home" class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#destinations" class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Destinations</a>
                    <a href="#services" class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Services</a>
                    <a href="#about" class="text-blue-200 hover:text-white px-3 py-2 text-sm font-medium transition-colors">About</a>
                    <a href="#contact" class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-600 hover:to-cyan-500 transition-colors">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobileMenuButton" class="text-blue-200 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div class="md:hidden hidden bg-slate-900/95 backdrop-blur-lg" id="mobileMenu">
        <div class="px-2 pt-2 pb-4 space-y-1">
            <a href="#home" class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="#destinations" class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Destinations</a>
            <a href="#services" class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Services</a>
            <a href="#about" class="text-blue-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>
            <a href="#contact" class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white block px-3 py-2 rounded-md text-base font-medium text-center mt-2">
                Contact
            </a>
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