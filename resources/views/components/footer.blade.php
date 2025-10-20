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
                            <a href="{{ route('index') }}#book-now-section"
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
                        <li>
                            <a href="https://www.farecompare.com/" target="_blank"
                                class="text-gray-300 hover:text-sky-400 transition-colors duration-300 flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Luggage Limit
                            </a>
                        </li>
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
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                    <div class="text-gray-400 text-sm mb-4 md:mb-0">
                        <p>&copy; {{ date('Y') }} Powered by SM DIGITAL SYSTEM. All rights reserved.</p>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-end space-x-6 text-sm">
                        <!-- Clickable ATOL & ABTA Protected Button -->
                        {{-- <button onclick="openProtectionModal()" 
                                class="text-gray-400 hover:text-sky-400 transition-colors duration-300 border border-gray-600 hover:border-sky-400 px-3 py-1 rounded-lg flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            ATOL & ABTA Protected
                        </button> --}}

                        <button onclick="openProtectionModal()"
                            class="">

                            <img src="/images/atol-abta-removebg-preview.png" alt="ATOL & ABTA Protected" class="w-45 h-32" />

                            {{-- ATOL & ABTA Protected --}}
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ATOL & ABTA Protection Modal -->
<div id="protectionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-screen overflow-y-auto">
        <div class="p-6 md:p-8">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Consumer Protection</h2>
                        <p class="text-gray-600">Your travel bookings are protected</p>
                    </div>
                </div>
                <button onclick="closeProtectionModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div class="space-y-6 text-gray-700">
                <!-- Protection Notice -->
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="font-semibold text-green-800">Your Money is Protected</h3>
                    </div>
                    <p class="text-green-700">Your Globe Trotting Agent protects you by never accepting cash or travel
                        payments to PayPal or other personal accounts. Purchase travel through Globe Trotting with peace
                        of mind - your money and your dream trip are protected and secure.</p>
                </div>

                <!-- Payment Security -->
                <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-blue-800 mb-2">Secure Payment Processing</h4>
                    <p class="text-blue-700 mb-2">Your payments always go directly to the travel supplier (hotel,
                        cruise line, airline, etc.) or Globe Trotting.</p>
                    <p class="text-blue-700"><strong>If you are asked for cash or personal payments, call +44 7368
                            818431.</strong></p>
                </div>

                <!-- ATOL Section -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ATOL – Air Travel Organisers Licence</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <p>All the flight-inclusive holidays on this website are financially protected by the ATOL
                            scheme. When you pay you will be supplied with an <strong>ATOL Certificate</strong>.</p>
                        <p>Please ask for it and check to ensure that everything you booked (flights, hotels and other
                            services) is listed on it. If you do receive an ATOL Certificate but all the parts of your
                            trip are not listed on it, those parts will not be ATOL protected.</p>
                        <p>Some of the flights on this website are also financially protected by the ATOL scheme, but
                            ATOL protection does not apply to all flights. This website will provide you with
                            information on the protection that applies in the case of each flight before you make your
                            booking.</p>
                        <p><strong>If you do not receive an ATOL Certificate then the booking will not be ATOL
                                protected.</strong></p>
                        <div class="bg-gray-50 p-3 rounded-lg mt-3">
                            <p class="text-sm">Find out more at: <a
                                    href="https://abta.com/go-travel/before-you-travel/travel-tips/financial-protection-3"
                                    target="_blank" class="text-blue-600 hover:underline">ABTA Financial
                                    Protection</a></p>
                        </div>
                    </div>
                </div>

                <!-- ABTA Membership -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ABTA Membership</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <p>Globe Trotting.uk is a Member of ABTA. ABTA and ABTA Members help holidaymakers to get the
                            most from their travel and assist them when things do not go according to plan.</p>
                        <p>We are obliged to maintain a high standard of service to you by ABTA's Code of Conduct.</p>
                        <div class="bg-gray-50 p-3 rounded-lg mt-3">
                            <p class="text-sm mb-2">For further information about ABTA, the Code of Conduct and the
                                arbitration scheme available to you if you have a complaint, contact:</p>
                            <div class="text-sm">
                                <p><strong>ABTA</strong></p>
                                <p>30 Park Street, London SE1 9EQ</p>
                                <p>Tel: 020 3117 0500</p>
                                <p><a href="https://abta.com/find-a-member" target="_blank"
                                        class="text-blue-600 hover:underline">Find ABTA Members</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Travel Advice -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-10 h-10 bg-yellow-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Travel and Destination Advice</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <p>For the latest travel advice from the Foreign, Commonwealth and Development Office including
                            security and local laws, plus passport and visa information:</p>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-sm"><a href="https://www.gov.uk/foreign-travel-advice" target="_blank"
                                    class="text-blue-600 hover:underline">UK Government Travel Advice</a></p>
                        </div>
                    </div>
                </div>

                <!-- Complaint Resolution -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Complaint & Dispute Resolution</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <p class="font-semibold text-yellow-800">Important:</p>
                            <p class="text-yellow-700">If you have a problem whilst on holiday, this must be reported
                                to the relevant principal/supplier or their local supplier or agent immediately.</p>
                        </div>
                        <p>If you fail to follow this procedure there will be less opportunity to investigate and
                            rectify your complaint. The amount of compensation you may be entitled to may be reduced or
                            you may not receive any at all depending upon the circumstances.</p>
                        <p>If you wish to complain when you return home, write to the principal/supplier. You will see
                            the name and address plus contact details in any confirmation documents we send you.</p>
                        <p>We will of course assist you with this if you wish - please contact your Globe Trotting agent
                            and copy Customer Services at <a href="mailto:support@globetrotting.co.uk"
                                class="text-blue-600 hover:underline">support@globetrotting.co.uk</a></p>
                        <p>If the matter cannot be resolved and it involves us or another ABTA Member then you have the
                            option to use ABTA's ADR scheme, approved by the Chartered Trading Standards Institute. <a
                                href="http://www.abta.com" target="_blank"
                                class="text-blue-600 hover:underline">Learn more at ABTA.com</a></p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gray-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Additional Information</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <div>
                            <h4 class="font-semibold mb-2">Links to Other Websites</h4>
                            <p class="text-sm">On this site you will find links to other third party websites. These
                                are for your convenience only and Globe Trotting.uk is not responsible for the content
                                of the third party site.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Data Protection & Privacy</h4>
                            <p class="text-sm">Please see our Privacy Policy for information about what data we collect
                                and how personal information will be used, who it will be passed to, etc. You have the
                                right to see the personal data we hold about you, and to request modification or
                                deletion.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Cookies</h4>
                            <p class="text-sm">This site uses cookies as explained in our Privacy Policy. If you use
                                this site without adjusting your cookies settings, you agree to our use of cookies.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <button onclick="closeProtectionModal()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

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
