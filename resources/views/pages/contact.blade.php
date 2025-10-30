@extends('components.base')
@section('title', 'Contact Us - Global Throtting.')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white py-20">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMtOS45NCAwLTE4IDguMDYtMTggMThzOC4wNiAxOCAxOCAxOCA4LjA2IDE4IDE4IiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMSIvPjwvZz48L3N2Zz4=')] opacity-20"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 tracking-tight">Get in Touch</h1>
            <p class="text-xl md:text-2xl text-slate-300 leading-relaxed">
                Let us craft your next unforgettable journey. Our travel experts are ready to assist you.
            </p>
        </div>
    </div>
</section>

<!-- Main Contact Section -->
<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-5 gap-12">
                
                <!-- Contact Information Sidebar -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Contact Cards -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-200">
                        <h3 class="text-2xl font-bold text-slate-800 mb-6">Contact Information</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Email</p>
                                    <a href="mailto:support@globetrottingtraveluk.com" class="text-lg text-slate-800 hover:text-slate-600 transition-colors">support@globetrottingtraveluk.com</a>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Phone</p>
                                    <a href="tel:+44 1375 481962" class="text-lg text-slate-800 hover:text-slate-600 transition-colors">+44 1375 481962</a>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Address</p>
                                    <p class="text-lg text-slate-800">5 Brayford Square, London E1 0SG</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Hours</p>
                                    <p class="text-lg text-slate-800">Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Why Choose Us -->
                    {{-- <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-lg p-8 text-white">
                        <h3 class="text-xl font-bold mb-4">Why Choose Us</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>25+ Years of Travel Expertise</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Personalized Service</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>24/7 Customer Support</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Best Price Guarantee</span>
                            </li>
                        </ul>
                    </div> --}}
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-slate-200">
                        
                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="mb-8 bg-green-50 border border-green-200 text-green-800 rounded-xl p-4 flex items-start">
                                <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <p class="font-semibold">Success!</p>
                                    <p class="text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-slate-800 mb-2">Send Us a Message</h2>
                            <p class="text-slate-600">Fill out the form below and we'll get back to you within 24 hours.</p>
                        </div>

                        <form action="{{ route('form.submit') }}" method="POST" class="space-y-6" 
                              x-data="{ 
                                  bookingType: 'contact', 
                                  isLoading: false,
                                  showTypeFields: false 
                              }"
                              @submit="isLoading = true">
                            @csrf

                            <!-- Personal Information -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Full Name *</label>
                                    <input type="text" id="name" name="name" required 
                                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address *</label>
                                    <input type="email" id="email" name="email" required 
                                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" 
                                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                </div>
                                <div>
                                    <label for="preferred_contact" class="block text-sm font-semibold text-slate-700 mb-2">Preferred Contact Method</label>
                                    <select id="preferred_contact" name="preferred_contact" 
                                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        <option value="">Select preference</option>
                                        <option value="email">Email</option>
                                        <option value="phone">Phone</option>
                                        <option value="whatsapp">WhatsApp</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Inquiry Type -->
                            <div>
                                <label for="booking_type" class="block text-sm font-semibold text-slate-700 mb-2">What can we help you with? *</label>
                                <select id="booking_type" name="booking_type" x-model="bookingType" 
                                        @change="showTypeFields = (bookingType !== 'contact')"
                                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                    <option value="contact">General Inquiry</option>
                                    <option value="flight">Flight Booking</option>
                                    <option value="hotel">Hotel Reservation</option>
                                    <option value="car">Car Rental</option>
                                    <option value="activity">Tours & Activities</option>
                                    <option value="custom">Custom Package</option>
                                </select>
                            </div>

                            <!-- Dynamic Fields Based on Selection -->
                            <div x-show="showTypeFields" 
                                 x-transition:enter="transition ease-out duration-300" 
                                 x-transition:enter-start="opacity-0 transform -translate-y-4" 
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="space-y-6">

                                <!-- Flight Fields -->
                                <div x-show="bookingType === 'flight'" class="bg-slate-50 rounded-xl p-6 space-y-4">
                                    <h4 class="font-semibold text-slate-800 text-lg mb-4">Flight Details</h4>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Departure City/Airport</label>
                                            <input type="text" name="flight_departure" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Arrival City/Airport</label>
                                            <input type="text" name="flight_arrival" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Departure Date</label>
                                            <input type="date" name="flight_departure_date" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Return Date</label>
                                            <input type="date" name="flight_return_date" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Number of Adults</label>
                                            <input type="number" name="flight_adults" min="1" value="1"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Number of Children</label>
                                            <input type="number" name="flight_children" min="0" value="0"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Cabin Class</label>
                                        <select name="flight_class" 
                                                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                            <option value="">Select class</option>
                                            <option value="economy">Economy</option>
                                            <option value="premium_economy">Premium Economy</option>
                                            <option value="business">Business</option>
                                            <option value="first">First Class</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Hotel Fields -->
                                <div x-show="bookingType === 'hotel'" class="bg-slate-50 rounded-xl p-6 space-y-4">
                                    <h4 class="font-semibold text-slate-800 text-lg mb-4">Hotel Details</h4>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Destination</label>
                                            <input type="text" name="hotel_location" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Check-in Date</label>
                                            <input type="date" name="hotel_checkin" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Check-out Date</label>
                                            <input type="date" name="hotel_checkout" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Number of Rooms</label>
                                            <input type="number" name="hotel_rooms" min="1" value="1"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Total Guests</label>
                                            <input type="number" name="hotel_guests" min="1" value="1"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                    </div>
                                </div>

                                <!-- Car Rental Fields -->
                                <div x-show="bookingType === 'car'" class="bg-slate-50 rounded-xl p-6 space-y-4">
                                    <h4 class="font-semibold text-slate-800 text-lg mb-4">Car Rental Details</h4>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Pick-up Location</label>
                                            <input type="text" name="car_pickup_location" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Drop-off Location</label>
                                            <input type="text" name="car_dropoff_location" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Pick-up Date</label>
                                            <input type="date" name="car_pickup_date" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Drop-off Date</label>
                                            <input type="date" name="car_dropoff_date" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Driver Age</label>
                                            <input type="number" name="driver_age" min="18" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                    </div>
                                </div>

                                <!-- Activity Fields -->
                                <div x-show="bookingType === 'activity'" class="bg-slate-50 rounded-xl p-6 space-y-4">
                                    <h4 class="font-semibold text-slate-800 text-lg mb-4">Activity Details</h4>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Activity Location</label>
                                            <input type="text" name="activity_location" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Activity Type</label>
                                            <input type="text" name="activity_type" placeholder="e.g., Safari, Hiking, City Tour"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Preferred Date</label>
                                            <input type="date" name="activity_date" 
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Number of Participants</label>
                                            <input type="number" name="activity_people" min="1" value="1"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                    </div>
                                </div>

                                <!-- Custom Package Fields -->
                                <div x-show="bookingType === 'custom'" class="bg-slate-50 rounded-xl p-6 space-y-4">
                                    <h4 class="font-semibold text-slate-800 text-lg mb-4">Custom Package Details</h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">Destination(s)</label>
                                            <input type="text" name="custom_destination" placeholder="e.g., Paris, Rome, Barcelona"
                                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                        </div>
                                        <div class="grid md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-2">Start Date</label>
                                                <input type="date" name="custom_start" 
                                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-2">End Date</label>
                                                <input type="date" name="custom_end" 
                                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-2">Budget Range</label>
                                                <input type="text" name="custom_budget" placeholder="e.g., $5,000 - $10,000"
                                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-2">Travel Style</label>
                                                <select name="custom_style" 
                                                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white">
                                                    <option value="">Select style</option>
                                                    <option value="adventure">Adventure</option>
                                                    <option value="relax">Relaxation</option>
                                                    <option value="luxury">Luxury</option>
                                                    <option value="budget">Budget-Friendly</option>
                                                    <option value="family">Family</option>
                                                    <option value="romantic">Romantic</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Additional Details</label>
                                <textarea id="message" name="message" rows="5" 
                                          placeholder="Tell us more about your travel plans, special requirements, or any questions you may have..."
                                          class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all duration-200 bg-white resize-none"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit" :disabled="isLoading"
                                        class="w-full bg-blue-800 hover:bg-blue-900 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-200 transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none shadow-lg hover:shadow-xl flex items-center justify-center">
                                    <span x-show="!isLoading" class="flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        Send Message
                                    </span>
                                    <span x-show="isLoading" class="flex items-center justify-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Sending...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Section -->
{{-- <section class="py-16 bg-white border-t border-slate-200">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Secure Booking</h4>
                    <p class="text-slate-600 text-sm">Your information is protected with industry-standard encryption</p>
                </div>
                <div>
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Quick Response</h4>
                    <p class="text-slate-600 text-sm">Get a response within 24 hours on business days</p>
                </div>
                <div>
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Expert Advice</h4>
                    <p class="text-slate-600 text-sm">Get personalized recommendations from travel specialists</p>
                </div>
                <div>
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Worldwide Coverage</h4>
                    <p class="text-slate-600 text-sm">Access to destinations and services around the globe</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Alpine.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>

@endsection