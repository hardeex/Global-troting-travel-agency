@extends('components.base')

@section('content')
    <script>
        function toggleOtherField(selectElement, wrapperId) {
            const wrapper = document.getElementById(wrapperId);
            const input = wrapper.querySelector('input');
            
            if (selectElement.value === 'other') {
                wrapper.classList.remove('hidden');
                input.setAttribute('required', 'required');
            } else {
                wrapper.classList.add('hidden');
                input.removeAttribute('required');
                input.value = '';
            }
        }
    </script>
    <div class="min-h-screen  bg-gradient-to-br from-sky-50 via-white to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12 mt-20">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-sky-500 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Book Your Dream Adventure</h1>
                <p class="text-gray-600">Fill in your details and let's start planning your perfect getaway</p>
            </div>

            @include('feedback')
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <form action="{{route('book-travel-agency')}}" method="post">
                    @csrf
                    
                    <!-- Personal Information -->
                    <div class="p-8 border-b border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="bg-sky-100 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="full-name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" id="full-name" name="full_name" placeholder="John Doe" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" placeholder="john@example.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" placeholder="+1 (555) 000-0000" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label for="nationality" class="block text-sm font-medium text-gray-700 mb-2">Nationality *</label>
                                <select id="nationality" name="nationality" onchange="toggleOtherField(this, 'nationality-other-wrapper')" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                                    <option value="">Select nationality</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="us">United States</option>
                                    <option value="ca">Canada</option>
                                    <option value="au">Australia</option>
                                    <option value="ng">Nigeria</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="nationality-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="nationality_other" placeholder="Please specify your nationality" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trip Details -->
                    <div class="p-8 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center mb-6">
                            <div class="bg-sky-100 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Trip Details</h2>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="destination" class="block text-sm font-medium text-gray-700 mb-2">Destination *</label>
                                <select id="destination" name="destination" onchange="toggleOtherField(this, 'destination-other-wrapper')" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                                    <option value="">Choose your destination</option>
                                    <option value="paris">Paris, France</option>
                                    <option value="tokyo">Tokyo, Japan</option>
                                    <option value="bali">Bali, Indonesia</option>
                                    <option value="dubai">Dubai, UAE</option>
                                    <option value="maldives">Maldives</option>
                                    <option value="santorini">Santorini, Greece</option>
                                    <option value="iceland">Iceland</option>
                                    <option value="other">Other Destination</option>
                                </select>
                                <div id="destination-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="destination_other" placeholder="Please specify your destination" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                                </div>
                            </div>
                            <div>
                                <label for="trip-type" class="block text-sm font-medium text-gray-700 mb-2">Trip Type *</label>
                                <select id="trip-type" name="trip_type" onchange="toggleOtherField(this, 'trip-type-other-wrapper')" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                                    <option value="">Select trip type</option>
                                    <option value="adventure">Adventure & Hiking</option>
                                    <option value="beach">Beach & Relaxation</option>
                                    <option value="cultural">Cultural & Historical</option>
                                    <option value="luxury">Luxury Getaway</option>
                                    <option value="family">Family Vacation</option>
                                    <option value="honeymoon">Honeymoon</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="trip-type-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="trip_type_other" placeholder="Please specify trip type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                                </div>
                            </div>
                            <div>
                                <label for="departure-date" class="block text-sm font-medium text-gray-700 mb-2">Departure Date *</label>
                                <input type="date" id="departure-date" name="departure_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label for="return-date" class="block text-sm font-medium text-gray-700 mb-2">Return Date *</label>
                                <input type="date" id="return-date" name="return_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Travelers & Accommodation -->
                    <div class="p-8 border-b border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="bg-sky-100 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Travelers & Accommodation</h2>
                        </div>

                        <div class="grid md:grid-cols-3 gap-6">
                            <div>
                                <label for="adults" class="block text-sm font-medium text-gray-700 mb-2">Adults (18+) *</label>
                                <input type="number" id="adults" name="adults" min="1" value="1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label for="children" class="block text-sm font-medium text-gray-700 mb-2">Children (2-17)</label>
                                <input type="number" id="children" name="children" min="0" value="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label for="infants" class="block text-sm font-medium text-gray-700 mb-2">Infants (0-2)</label>
                                <input type="number" id="infants" name="infants" min="0" value="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label for="accommodation" class="block text-sm font-medium text-gray-700 mb-2">Accommodation Preference *</label>
                                <select id="accommodation" name="accommodation" onchange="toggleOtherField(this, 'accommodation-other-wrapper')" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                                    <option value="">Select accommodation</option>
                                    <option value="hotel-3">3-Star Hotel</option>
                                    <option value="hotel-4">4-Star Hotel</option>
                                    <option value="hotel-5">5-Star Hotel</option>
                                    <option value="resort">Resort</option>
                                    <option value="villa">Private Villa</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="hostel">Hostel</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="accommodation-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="accommodation_other" placeholder="Please specify accommodation type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                                </div>
                            </div>
                            <div>
                                <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">Budget Range (USD) *</label>
                                <select id="budget" name="budget" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition" required>
                                    <option value="">Select budget</option>
                                    <option value="budget">$500 - $1,500</option>
                                    <option value="moderate">$1,500 - $3,000</option>
                                    <option value="premium">$3,000 - $5,000</option>
                                    <option value="luxury">$5,000+</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Services -->
                    <div class="p-8 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center mb-6">
                            <div class="bg-sky-100 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Additional Services</h2>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-white transition">
                                <input type="checkbox" name="services[]" value="airport-transfer" class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                                <span class="ml-3 text-gray-700">Airport Transfer</span>
                            </label>
                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-white transition">
                                <input type="checkbox" name="services[]" value="travel-insurance" class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                                <span class="ml-3 text-gray-700">Travel Insurance</span>
                            </label>
                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-white transition">
                                <input type="checkbox" name="services[]" value="guided-tours" class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                                <span class="ml-3 text-gray-700">Guided Tours</span>
                            </label>
                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-white transition">
                                <input type="checkbox" name="services[]" value="car-rental" class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                                <span class="ml-3 text-gray-700">Car Rental</span>
                            </label>
                        </div>
                    </div>

                    <!-- Special Requests -->
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <div class="bg-sky-100 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Special Requests</h2>
                        </div>
                        <textarea id="special-requests" name="special_requests" rows="4" placeholder="Any dietary requirements, accessibility needs, or special celebrations?" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="px-8 pb-8">
                        <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-4 px-6 rounded-lg transition-all transform hover:scale-[1.02] shadow-lg shadow-sky-500/30 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Complete Booking
                        </button>
                        <p class="text-center text-sm text-gray-500 mt-4">By submitting, you agree to our Terms & Conditions</p>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection