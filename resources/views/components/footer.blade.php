<!-- Footer Section -->
<footer class="relative bg-gray-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="footerPattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="10" cy="10" r="1" fill="currentColor" opacity="0.3" />
                    <path d="M5,5 L15,15 M15,5 L5,15" stroke="currentColor" stroke-width="0.5" opacity="0.2" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#footerPattern)" />
        </svg>
    </div>

    <!-- Top Wave -->
    <div class="absolute top-0 left-0 w-full overflow-hidden">
        <svg class="relative block w-full h-16" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,60 C300,20 600,100 900,60 C1050,40 1150,80 1200,60 L1200,120 L0,120 Z" fill="currentColor"
                class="text-sky-500"></path>
        </svg>
    </div>

    <div class="relative z-10 pt-20 pb-8">
        <div class="container mx-auto px-4 md:px-6">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div class="lg:col-span-1 text-center">
                    <div class="flex items-center justify-center space-x-3 mb-6">
                        <a href="{{ route('index') }}">
                            <img src="/images/global-throthlelogo-new.png" alt="Globe Trotting Logo"
                                class="w-24 h-auto mx-auto">
                        </a>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Your trusted travel partner for unforgettable adventures worldwide. We create personalized
                        journeys that turn your travel dreams into reality.
                    </p>
                    <div class="flex justify-center space-x-4">

                        <a href="https://www.facebook.com/share/173Y6corbL/"
                            class="w-10 h-10 bg-blue-600 hover:bg-blue-500 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
                            target="_blank" rel="noopener noreferrer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35C.595 0 0 .595 0 1.326v21.348C0 23.405.595 24 1.326
               24H12.82v-9.294H9.692V11.41h3.128V8.797c0-3.1 1.893-4.788
               4.659-4.788 1.325 0 2.464.099 2.797.143v3.24l-1.922.001c-1.506
               0-1.797.716-1.797 1.765v2.316h3.587l-.467 3.296h-3.12V24h6.116c.73
               0 1.325-.595 1.325-1.326V1.326C24 .595 23.405 0 22.675 0z" />
                            </svg>
                        </a>

                        <a href="https://x.com/globetrottin_g"
                            class="w-10 h-10 bg-sky-500 hover:bg-sky-400 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@globetrotting.tra2"
                            class="w-10 h-10 bg-black hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 256 256"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M168,32a8,8,0,0,0-8,8V64a56.06,56.06,0,0,0,56,56h8v-24h-8a32,32,0,0,1-32-32V40a8,8,0,0,0-8-8ZM104,80a56,56,0,1,0,56,56V100.69a87.26,87.26,0,0,0,32,11.31v24a56,56,0,1,1-88-45.9V160a32,32,0,1,0,32-32V80a8,8,0,0,0-8-8Z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/gtt_advisor/"
                            class="w-10 h-10 bg-sky-500 hover:bg-sky-400 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="text-center md:text-left">
                    <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                    <ul class="space-y-3 inline-block md:block text-left">
                        <li>
                            <a href="{{ route('index') }}"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('destinations') }}"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Destinations
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('make-a-request') }}"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Plan a Trip
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="text-center md:text-left">
                    <h4 class="text-lg font-semibold mb-6 text-white">Planning Your Travel</h4>
                    <ul class="space-y-3 inline-block md:block text-left">
                        <li>
                            <a href="https://www.flightview.com/" target="_blank"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Flight Tracker
                            </a>
                        </li>
                        <li>
                            <a href="https://www.worldtravelguide.net/" target="_blank"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Airports
                            </a>
                        </li>
                        {{-- <li>
                            <a href="https://www.farecompare.com/" target="_blank"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Luggage Limit
                            </a>
                        </li> --}}
                        <li>
                            <a href="https://www.worldtimeserver.com/current_time_in_US-NY.aspx" target="_blank"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                World Clock
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="text-center md:text-left">
                    <h4 class="text-lg font-semibold mb-6 text-white">Get in Touch</h4>
                    <div class="space-y-4 inline-block md:block text-left">
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-6 h-6 bg-sky-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300">5 Brayford Square, London E1 0SG</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div
                                class="w-6 h-6 bg-sky-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>

                            <a href="tel:+44 1375 481962"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300">+44 1375 481962
                            </a>
                            <a href="tel: +44 7368 818431"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300"> +44 7368
                                818431
                            </a>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div
                                class="w-6 h-6 bg-sky-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <a href="mailto:support@globetrottingtraveluk.com"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300">support@globetrottingtraveluk.com</a>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div
                                class="w-6 h-6 bg-sky-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-gray-300">Mon - Fri: 9AM - 6PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            {{-- <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                    <div class="text-gray-400 text-sm mb-4 md:mb-0">
                        <p>&copy; {{ date('Y') }} Powered by SM DIGITAL SYSTEM. All rights reserved.</p>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-end space-x-6 text-sm">
                      

                        <button onclick="openProtectionModal()"
                            class="">

                            <img src="/images/atol-abta-removebg-preview.png" alt="ATOL & ABTA Protected" class="w-45 h-32" />

                           
                        </button>

                    </div>
                </div>
            </div> --}}
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-4">
                    <div class="text-gray-400 text-sm">
                        <p>&copy; {{ date('Y') }} Powered by SM DIGITAL SYSTEM. All rights reserved.</p>
                    </div>
                    
                    <div class="flex flex-wrap justify-center md:justify-end items-center gap-4">
                        <!-- ATOL & ABTA Protection Button -->
                        <button onclick="openProtectionModal()"
                            class="group relative bg-white hover:bg-gray-50 rounded-xl p-3 transition-all duration-300 hover:shadow-lg border-2 border-gray-200 hover:border-blue-400 cursor-pointer">
                            
                            <!-- Hover effect overlay -->
                            <div class="absolute inset-0 bg-blue-500 opacity-0 group-hover:opacity-5 rounded-xl transition-opacity duration-300"></div>
                            
                            <div class="relative flex flex-col items-center gap-2">
                                <img src="/images/atol-abta-removebg-preview.png" 
                                     alt="ATOL & ABTA Protected" 
                                     class="w-32 h-auto transform group-hover:scale-105 transition-transform duration-300" />
                                
                                <span class="text-xs font-semibold text-gray-600 group-hover:text-blue-600 transition-colors duration-300 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Click for Details
                                </span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ATOL & ABTA Protection Modal -->
@include('components.abta-atol')


<script>
    // Protection Modal Functions
    function openProtectionModal() {
        document.getElementById('protectionModal').classList.remove('hidden');
        document.getElementById('protectionModal').classList.add('flex');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeProtectionModal() {
        document.getElementById('protectionModal').classList.add('hidden');
        document.getElementById('protectionModal').classList.remove('flex');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        const modal = document.getElementById('protectionModal');
        if (event.target === modal) {
            closeProtectionModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeProtectionModal();
        }
    });
</script>

<style>
    .footer-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .footer-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .footer-scrollbar::-webkit-scrollbar-thumb {
        background: #0EA5E9;
        border-radius: 10px;
    }

    .footer-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #0284C7;
    }

    /* Modal scrollbar styling */
    #protectionModal .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }

    #protectionModal .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 3px;
    }

    #protectionModal .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }

    #protectionModal .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
