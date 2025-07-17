@include('feedback')
<section class="min-h-screen py-16 px-4 bg-gradient-to-br from-sky-50 via-white to-sky-100" x-data="{ type: 'contact', isLoading: false, showSuccess: false }">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side - Image & Content -->
            <div class="space-y-8">
                <div class="text-center lg:text-left">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
                        Let's Plan Your 
                        <span class="text-sky-600">Perfect Trip</span>
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Whether you're looking for adventure, relaxation, or something in between, we're here to make your travel dreams come true.
                    </p>
                </div>
                
                <!-- Image Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="bg-gradient-to-br from-sky-200 to-sky-300 rounded-2xl h-48 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="text-center text-sky-800">
                                <div class="text-4xl mb-2">✈️</div>
                                <div class="font-semibold">Flights</div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-emerald-200 to-emerald-300 rounded-2xl h-32 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="text-center text-emerald-800">
                                <div class="text-3xl mb-1">🏨</div>
                                <div class="font-semibold">Hotels</div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="bg-gradient-to-br from-orange-200 to-orange-300 rounded-2xl h-32 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="text-center text-orange-800">
                                <div class="text-3xl mb-1">🚗</div>
                                <div class="font-semibold">Car Rentals</div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-200 to-purple-300 rounded-2xl h-48 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="text-center text-purple-800">
                                <div class="text-4xl mb-2">🗺️</div>
                                <div class="font-semibold">Adventures</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg p-4 shadow-md">
                        <div class="text-2xl font-bold text-sky-600">10K+</div>
                        <div class="text-sm text-gray-600">Happy Travelers</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg p-4 shadow-md">
                        <div class="text-2xl font-bold text-sky-600">50+</div>
                        <div class="text-sm text-gray-600">Destinations</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg p-4 shadow-md">
                        <div class="text-2xl font-bold text-sky-600">24/7</div>
                        <div class="text-sm text-gray-600">Support</div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="bg-white/90 backdrop-blur-sm shadow-2xl rounded-3xl p-8 border border-sky-100">
                
                <!-- Success Message -->
                <div x-show="showSuccess" x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 transform translate-y-2" 
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="mb-6 text-emerald-700 bg-emerald-50 p-4 rounded-xl border border-emerald-200 flex items-center">
                    <div class="text-emerald-500 mr-3">✅</div>
                    <div>Your request has been sent successfully! We'll get back to you soon.</div>
                </div>

                @if(session('success'))
                    <div class="mb-6 text-emerald-700 bg-emerald-50 p-4 rounded-xl border border-emerald-200 flex items-center">
                        <div class="text-emerald-500 mr-3">✅</div>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('form.submit') }}" method="POST" class="space-y-6" 
                      x-on:submit="isLoading = true">
                    @csrf

                    <!-- Header -->
                    <div class="text-center pb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Get Started</h3>
                        <p class="text-gray-600 mt-2">Tell us about your travel needs</p>
                    </div>

                    <!-- Basic Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="relative">
                            <input type="text" name="name" placeholder="Full Name" required 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sky-400">
                                👤
                            </div>
                        </div>
                        <div class="relative">
                            <input type="email" name="email" placeholder="Email Address" required 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sky-400">
                                📧
                            </div>
                        </div>
                        <div class="relative">
                            <input type="tel" name="phone" placeholder="Phone Number" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sky-400">
                                📞
                            </div>
                        </div>
                        <select name="preferred_contact" 
                                class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <option value="">Preferred Contact Method</option>
                            <option value="email">📧 Email</option>
                            <option value="phone">📞 Phone</option>
                            <option value="whatsapp">💬 WhatsApp</option>
                        </select>
                    </div>

                    <!-- Booking Type with Visual Cards -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-3">What can we help you with?</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                            <div class="cursor-pointer p-3 rounded-xl border-2 transition-all duration-200 text-center" 
                                 :class="type === 'contact' ? 'border-sky-400 bg-sky-50' : 'border-gray-200 hover:border-sky-300'"
                                 @click="type = 'contact'">
                                <div class="text-2xl mb-1">💬</div>
                                <div class="text-sm font-medium">Contact</div>
                            </div>
                            <div class="cursor-pointer p-3 rounded-xl border-2 transition-all duration-200 text-center" 
                                 :class="type === 'car' ? 'border-sky-400 bg-sky-50' : 'border-gray-200 hover:border-sky-300'"
                                 @click="type = 'car'">
                                <div class="text-2xl mb-1">🚗</div>
                                <div class="text-sm font-medium">Car Rental</div>
                            </div>
                            <div class="cursor-pointer p-3 rounded-xl border-2 transition-all duration-200 text-center" 
                                 :class="type === 'flight' ? 'border-sky-400 bg-sky-50' : 'border-gray-200 hover:border-sky-300'"
                                 @click="type = 'flight'">
                                <div class="text-2xl mb-1">✈️</div>
                                <div class="text-sm font-medium">Flight</div>
                            </div>
                            <div class="cursor-pointer p-3 rounded-xl border-2 transition-all duration-200 text-center" 
                                 :class="type === 'hotel' ? 'border-sky-400 bg-sky-50' : 'border-gray-200 hover:border-sky-300'"
                                 @click="type = 'hotel'">
                                <div class="text-2xl mb-1">🏨</div>
                                <div class="text-sm font-medium">Hotel</div>
                            </div>
                            <div class="cursor-pointer p-3 rounded-xl border-2 transition-all duration-200 text-center" 
                                 :class="type === 'activity' ? 'border-sky-400 bg-sky-50' : 'border-gray-200 hover:border-sky-300'"
                                 @click="type = 'activity'">
                                <div class="text-2xl mb-1">🗺️</div>
                                <div class="text-sm font-medium">Activity</div>
                            </div>
                            <div class="cursor-pointer p-3 rounded-xl border-2 transition-all duration-200 text-center" 
                                 :class="type === 'custom' ? 'border-sky-400 bg-sky-50' : 'border-gray-200 hover:border-sky-300'"
                                 @click="type = 'custom'">
                                <div class="text-2xl mb-1">✨</div>
                                <div class="text-sm font-medium">Custom</div>
                            </div>
                        </div>
                        <input type="hidden" name="booking_type" x-model="type">
                    </div>

                    <!-- Dynamic Fields with Smooth Transitions -->
                    <div class="space-y-4">
                        
                        <!-- Car Rental -->
                        <div x-show="type === 'car'" x-transition:enter="transition ease-out duration-300" 
                             x-transition:enter-start="opacity-0 transform translate-y-4" 
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="car_pickup_location" placeholder="📍 Pick-up Location" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="text" name="car_dropoff_location" placeholder="📍 Drop-off Location" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="car_pickup_date" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="car_dropoff_date" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="number" name="driver_age" placeholder="👤 Driver Age" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                        </div>

                        <!-- Flight -->
                        <div x-show="type === 'flight'" x-transition:enter="transition ease-out duration-300" 
                             x-transition:enter-start="opacity-0 transform translate-y-4" 
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="flight_departure" placeholder="🛫 Departure Airport/City" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="text" name="flight_arrival" placeholder="🛬 Arrival Airport/City" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="flight_departure_date" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="flight_return_date" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="number" name="flight_adults" placeholder="👥 Adults" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="number" name="flight_children" placeholder="👶 Children" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <select name="flight_class" 
                                    class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50 md:col-span-2">
                                <option value="">✈️ Cabin Class</option>
                                <option value="economy">Economy</option>
                                <option value="business">Business</option>
                                <option value="first">First Class</option>
                            </select>
                        </div>

                        <!-- Hotel -->
                        <div x-show="type === 'hotel'" x-transition:enter="transition ease-out duration-300" 
                             x-transition:enter-start="opacity-0 transform translate-y-4" 
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="hotel_location" placeholder="📍 Location (City or Area)" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="hotel_checkin" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="hotel_checkout" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="number" name="hotel_rooms" placeholder="🏨 Rooms" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="number" name="hotel_guests" placeholder="👥 Total Guests" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                        </div>

                        <!-- Activity / Tour -->
                        <div x-show="type === 'activity'" x-transition:enter="transition ease-out duration-300" 
                             x-transition:enter-start="opacity-0 transform translate-y-4" 
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="activity_location" placeholder="📍 Activity Location" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="text" name="activity_type" placeholder="🎯 Activity Type (e.g., Hiking, Safari)" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="date" name="activity_date" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <input type="number" name="activity_people" placeholder="👥 Number of Participants" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                        </div>

                        <!-- Custom Trip -->
                        <div x-show="type === 'custom'" x-transition:enter="transition ease-out duration-300" 
                             x-transition:enter-start="opacity-0 transform translate-y-4" 
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="grid grid-cols-1 gap-4">
                            <input type="text" name="custom_destination" placeholder="🌍 Destination(s)" 
                                   class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="date" name="custom_start" 
                                       class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                                <input type="date" name="custom_end" 
                                       class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="custom_budget" placeholder="💰 Estimated Budget" 
                                       class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                                <select name="custom_style" 
                                        class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50">
                                    <option value="">🎨 Travel Style</option>
                                    <option value="adventure">🏔️ Adventure</option>
                                    <option value="relax">🏖️ Relaxation</option>
                                    <option value="luxury">💎 Luxury</option>
                                    <option value="budget">💰 Budget</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <textarea name="message" rows="4" placeholder="💭 Additional Notes or Questions" 
                                  class="w-full px-4 py-3 border border-sky-200 rounded-xl focus:ring-2 focus:ring-sky-300 focus:border-sky-400 transition-all duration-200 bg-sky-50/50 resize-none"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" :disabled="isLoading"
                                class="w-full bg-gradient-to-r from-sky-500 to-sky-600 text-white py-4 px-6 rounded-xl hover:from-sky-600 hover:to-sky-700 font-semibold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex items-center justify-center">
                            <span x-show="!isLoading">Send Request ✨</span>
                            <span x-show="isLoading" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>