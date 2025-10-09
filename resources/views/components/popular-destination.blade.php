<meta name="csrf-token" content="{{ csrf_token() }}">
  @if($destinations && $destinations->count() > 0)
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
                Discover our latest handpicked destinations for your next unforgettable adventure.
            </p>
        </div>

      
            <!-- Destinations Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8 md:mb-12">
                @foreach ($destinations as $destination)
                    <!-- Destination Card -->
                    <div class="group relative overflow-hidden rounded-2xl md:rounded-3xl destination-card cursor-pointer" 
                         onclick="openInterestModal(
                             {{ $destination->id }}, 
                             {{ json_encode($destination->title ?? '') }}, 
                             {{ json_encode($destination->country ?? '') }}, 
                             {{ $destination->price ?? 'null' }}, 
                             {{ json_encode($destination->short_description ?? '') }},
                             {{ json_encode($destination->details ?? '') }},
                             {{ json_encode($destination->image_url ?? '') }},
                             {{ json_encode($destination->start_date ?? '') }},
                             {{ json_encode($destination->end_date ?? '') }},
                             {{ $destination->adults ?? 'null' }},
                             {{ $destination->nights ?? 'null' }}
                         )">
                        <div class="aspect-[4/5] bg-gradient-to-br {{ $destination->gradient ?? 'from-blue-400 to-indigo-500' }} destination-image relative"
                            @if($destination->image_url)
                                style="background-image: url('{{ $destination->image_url }}'); background-size: cover; background-position: center;"
                            @endif>
                            
                            <!-- Enhanced Overlays for Better Text Readability -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            @if($destination->image_url)
                                <div class="absolute inset-0 bg-black/20"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-2/3 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                            @endif
                            
                            <!-- Price Tag -->
                            @if($destination->price)
                                <div class="absolute top-3 right-3 md:top-4 md:right-4 px-2 py-1 md:px-3 md:py-1 bg-white/95 backdrop-blur-md rounded-full text-sky-600 font-bold text-xs md:text-sm price-tag shadow-lg border border-white/20">
                                    From £{{ number_format($destination->price) }}
                                </div>
                            @endif

                            <!-- If no image, show destination initial -->
                            @if(!$destination->image_url)
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-white text-6xl font-bold opacity-30">
                                        {{ substr($destination->title, 0, 1) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 text-white">
                            <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-2 text-white drop-shadow-lg" 
                                style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                {{ $destination->title }}
                            </h3>
                            
                            @if($destination->short_description)
                                <p class="text-white/90 text-xs md:text-sm mb-3 line-clamp-2 drop-shadow-md" 
                                   style="text-shadow: 1px 1px 3px rgba(0,0,0,0.7);">
                                    {{ $destination->short_description }}
                                </p>
                            @endif

                            @if($destination->country)
                                <div class="flex items-center text-white/80 text-xs md:text-sm mb-2 drop-shadow-md" 
                                     style="text-shadow: 1px 1px 2px rgba(0,0,0,0.6);">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $destination->country }}
                                </div>
                            @endif

                            @if($destination->nights)
                                <div class="flex items-center justify-between">
                                    <span class="text-xs md:text-sm text-white/80 drop-shadow-md" 
                                          style="text-shadow: 1px 1px 2px rgba(0,0,0,0.6);">
                                        {{ $destination->nights }} Nights
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
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
                <a href="{{route('destinations')}}" class="inline-flex items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                    View All Destinations
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Interest Modal -->
<div id="interestModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen px-4 py-8">
        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl transform transition-all modal-enter">
            <!-- Modal Header -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Express Interest</h2>
                    <button onclick="closeInterestModal()" class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center text-gray-500 hover:text-gray-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="max-h-[70vh] overflow-y-auto scrollbar-thin">
                <!-- Destination Image -->
                <div id="modalImageContainer" class="relative h-48 bg-gradient-to-br from-sky-400 to-sky-600 hidden">
                    <img id="modalImage" class="w-full h-full object-cover" alt="" />
                    <div class="absolute inset-0 bg-black/20"></div>
                    <div id="modalPriceBadge" class="absolute top-4 right-4 px-3 py-2 bg-white/95 backdrop-blur-md rounded-full text-sky-600 font-bold text-sm shadow-lg border border-white/20 hidden">
                    </div>
                </div>

                <div class="p-6">
                    <!-- Destination Header Info -->
                    <div class="mb-6">
                        <h3 id="interestDestinationTitle" class="text-2xl font-bold text-gray-900 mb-2"></h3>
                        <div class="flex items-center text-gray-600 mb-3">
                            <svg class="w-5 h-5 mr-2 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span id="interestDestinationCountry"></span>
                        </div>
                        <p id="interestShortDescription" class="text-gray-700 mb-4"></p>
                    </div>

                    <!-- Trip Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <!-- Price -->
                        <div id="priceSection" class="bg-sky-50 p-4 rounded-lg border border-sky-100 hidden">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-sky-600 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-sky-600">Starting Price</p>
                                    <p id="modalPrice" class="text-lg font-bold text-gray-900"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div id="nightsSection" class="bg-gray-50 p-4 rounded-lg border border-gray-100 hidden">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Duration</p>
                                    <p id="modalNights" class="text-lg font-bold text-gray-900"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Adults -->
                        <div id="adultsSection" class="bg-green-50 p-4 rounded-lg border border-green-100 hidden">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-green-600">Group Size</p>
                                    <p id="modalAdults" class="text-lg font-bold text-gray-900"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Dates -->
                        <div id="datesSection" class="bg-purple-50 p-4 rounded-lg border border-purple-100 hidden">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-purple-600">Travel Dates</p>
                                    <p id="modalDates" class="text-sm font-semibold text-gray-900"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Full Description -->
                    <div id="detailsSection" class="mb-6 hidden">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Trip Details
                        </h4>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p id="interestDetails" class="text-gray-700 leading-relaxed"></p>
                        </div>
                    </div>

                    <!-- User Information Form -->
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-200 mb-6">
                        <h4 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Your Information
                        </h4>
                        <form id="interestForm" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                                    <input type="text" id="firstName" name="firstName" required 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Enter your first name">
                                </div>
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                                    <input type="text" id="lastName" name="lastName" required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Enter your last name">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Enter your email address">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Enter your phone number">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Additional Message</label>
                                <textarea id="message" name="message" rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                          placeholder="Tell us more about your travel preferences or any questions you have..."></textarea>
                            </div>
                        </form>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-sky-50 p-4 rounded-lg border border-sky-200 mb-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-sky-100 rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sky-900 mb-1">Get Expert Assistance</h4>
                                <p class="text-sky-700 text-sm">
                                    Fill in your details and we'll send you personalized information about this destination. Our travel experts will contact you with detailed itineraries, pricing, and help you plan the perfect trip!
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <button onclick="sendInterest()" class="flex-1 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Send Interest
                        </button>
                        <button onclick="closeInterestModal()" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors duration-200">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentDestinationId = null;

    function openInterestModal(destinationId, title, country, price, shortDescription, details, imageUrl, startDate, endDate, adults, nights) {
        currentDestinationId = destinationId;
        
        // Set basic info
        document.getElementById('interestDestinationTitle').textContent = title || 'Unknown Destination';
        document.getElementById('interestDestinationCountry').textContent = country || 'Unknown Location';
        
        // Handle image
        const imageContainer = document.getElementById('modalImageContainer');
        const modalImage = document.getElementById('modalImage');
        if (imageUrl && imageUrl.trim() !== '') {
            modalImage.src = imageUrl;
            modalImage.alt = title || 'Destination Image';
            imageContainer.classList.remove('hidden');
        } else {
            imageContainer.classList.add('hidden');
        }
        
        // Handle short description
        const shortDescElement = document.getElementById('interestShortDescription');
        if (shortDescription && shortDescription.trim() !== '') {
            shortDescElement.textContent = shortDescription;
            shortDescElement.classList.remove('hidden');
        } else {
            shortDescElement.classList.add('hidden');
        }
        
        // Handle price
        const priceSection = document.getElementById('priceSection');
        const modalPrice = document.getElementById('modalPrice');
        const modalPriceBadge = document.getElementById('modalPriceBadge');
        if (price && price !== null) {
            const formattedPrice = `From £${parseInt(price).toLocaleString()}`;
            modalPrice.textContent = formattedPrice;
            modalPriceBadge.textContent = formattedPrice;
            priceSection.classList.remove('hidden');
            if (imageUrl && imageUrl.trim() !== '') {
                modalPriceBadge.classList.remove('hidden');
            }
        } else {
            priceSection.classList.add('hidden');
            modalPriceBadge.classList.add('hidden');
        }
        
        // Handle nights/duration
        const nightsSection = document.getElementById('nightsSection');
        const modalNights = document.getElementById('modalNights');
        if (nights && nights !== null) {
            modalNights.textContent = `${nights} Night${nights > 1 ? 's' : ''}`;
            nightsSection.classList.remove('hidden');
        } else {
            nightsSection.classList.add('hidden');
        }
        
        // Handle adults
        const adultsSection = document.getElementById('adultsSection');
        const modalAdults = document.getElementById('modalAdults');
        if (adults && adults !== null) {
            modalAdults.textContent = `${adults} Adult${adults > 1 ? 's' : ''}`;
            adultsSection.classList.remove('hidden');
        } else {
            adultsSection.classList.add('hidden');
        }
        
        // Handle dates
        const datesSection = document.getElementById('datesSection');
        const modalDates = document.getElementById('modalDates');
        if (startDate && endDate && startDate.trim() !== '' && endDate.trim() !== '') {
            try {
                const start = new Date(startDate).toLocaleDateString('en-GB', { 
                    day: 'numeric', 
                    month: 'short', 
                    year: 'numeric' 
                });
                const end = new Date(endDate).toLocaleDateString('en-GB', { 
                    day: 'numeric', 
                    month: 'short', 
                    year: 'numeric' 
                });
                modalDates.textContent = `${start} - ${end}`;
                datesSection.classList.remove('hidden');
            } catch (error) {
                console.warn('Error parsing dates:', error);
                datesSection.classList.add('hidden');
            }
        } else {
            datesSection.classList.add('hidden');
        }
        
        // Handle detailed description
        const detailsSection = document.getElementById('detailsSection');
        const interestDetails = document.getElementById('interestDetails');
        if (details && details.trim() !== '') {
            interestDetails.textContent = details;
            detailsSection.classList.remove('hidden');
        } else {
            detailsSection.classList.add('hidden');
        }
        
        // Reset form
        const form = document.getElementById('interestForm');
        if (form) {
            form.reset();
        }
        
        // Show modal
        document.getElementById('interestModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeInterestModal() {
        document.getElementById('interestModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        currentDestinationId = null;
    }

    async function sendInterest() {
        if (!currentDestinationId) {
            alert('Please select a destination first.');
            return;
        }
        
        // Validate form
        const form = document.getElementById('interestForm');
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const message = document.getElementById('message').value.trim();
        
        if (!firstName || !lastName || !email) {
            alert('Please fill in all required fields (First Name, Last Name, and Email).');
            return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }
        
        const button = event.target;
        const originalText = button.innerHTML;
        
        // Show loading state
        button.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Sending...
        `;
        button.disabled = true;
        
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                throw new Error('CSRF token not found. Please refresh the page.');
            }
            
            const response = await fetch('/send-interest', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify({
                    destination_id: currentDestinationId,
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    phone: phone,
                    message: message
                })
            });
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            if (data.success) {
                // Success state
                button.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Interest Sent!
                `;
                button.classList.remove('bg-sky-600', 'hover:bg-sky-700');
                button.classList.add('bg-green-600');
                
                // Show success message
                const successMsg = document.createElement('div');
                successMsg.className = 'mt-4 p-3 bg-green-100 border border-green-300 rounded-lg text-green-700 text-sm text-center';
                successMsg.textContent = 'Thank you! Our travel experts will contact you soon with more details.';
                button.parentNode.insertBefore(successMsg, button.nextSibling);
                
                setTimeout(() => {
                    closeInterestModal();
                }, 3000);
            } else {
                throw new Error(data.message || 'Failed to send interest');
            }
        } catch (error) {
            console.error('Error sending interest:', error);
            button.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Failed - Try Again
            `;
            button.classList.remove('bg-sky-600', 'hover:bg-sky-700');
            button.classList.add('bg-red-600', 'hover:bg-red-700');
            
            // Show error message
            const errorMsg = document.createElement('div');
            errorMsg.className = 'mt-4 p-3 bg-red-100 border border-red-300 rounded-lg text-red-700 text-sm text-center';
            errorMsg.textContent = error.message || 'Failed to send interest. Please try again.';
            button.parentNode.insertBefore(errorMsg, button.nextSibling);
            
            // Reset button after 5 seconds
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600', 'bg-red-600', 'hover:bg-red-700');
                button.classList.add('bg-sky-600', 'hover:bg-sky-700');
                
                // Remove error message
                const existingError = button.parentNode.querySelector('.bg-red-100');
                if (existingError) {
                    existingError.remove();
                }
            }, 5000);
        }
        
        button.disabled = false;
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('interestModal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeInterestModal();
                }
            });
        }
        
        // Additional safety check for form elements
        const form = document.getElementById('interestForm');
        if (form) {
            // Form is ready
            console.log('Interest form loaded successfully');
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeInterestModal();
        }
    });
</script>

<style>
    .modal-enter {
        animation: modalEnter 0.3s ease-out;
    }
    
    @keyframes modalEnter {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 3px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>