{{-- @extends('components.base')

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
@endsection --}}


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

        // Auto-calculate trip duration
        document.addEventListener('DOMContentLoaded', function() {
            const departureInput = document.getElementById('departure-date');
            const returnInput = document.getElementById('return-date');
            const durationDisplay = document.getElementById('trip-duration');

            function calculateDuration() {
                if (departureInput.value && returnInput.value) {
                    const departure = new Date(departureInput.value);
                    const returnDate = new Date(returnInput.value);
                    const diffTime = Math.abs(returnDate - departure);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    
                    if (diffDays > 0) {
                        durationDisplay.textContent = `${diffDays} night${diffDays > 1 ? 's' : ''}`;
                        durationDisplay.classList.remove('hidden');
                    }
                }
            }

            departureInput?.addEventListener('change', calculateDuration);
            returnInput?.addEventListener('change', calculateDuration);
        });
    </script>

    <style>
        .form-step {
            transition: all 0.3s ease;
        }
        
        .form-step:hover {
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.1);
        }

        .floating-image {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            
            <!-- Hero Header with Vector Image -->
            <div class="text-center mb-12 mt-16 relative">
                <div class="flex justify-center items-center gap-8 mb-8">
                    <!-- Left decorative image -->
                    <div class="hidden lg:block floating-image" style="animation-delay: 0s;">
                        <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="60" cy="60" r="60" fill="#EFF6FF"/>
                            <path d="M60 20C38.9 20 22 36.9 22 58C22 79.1 38.9 96 60 96C81.1 96 98 79.1 98 58C98 36.9 81.1 20 60 20ZM60 88C43.4 88 30 74.6 30 58C30 41.4 43.4 28 60 28C76.6 28 90 41.4 90 58C90 74.6 76.6 88 60 88Z" fill="#3B82F6"/>
                            <path d="M60 35L65 50H80L68 59L73 74L60 65L47 74L52 59L40 50H55L60 35Z" fill="#60A5FA"/>
                        </svg>
                    </div>

                    <!-- Center content -->
                    <div>
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl mb-4 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-3">Plan Your Perfect Trip</h1>
                        <p class="text-lg text-slate-600 max-w-2xl mx-auto">Tell us about your dream trip and we'll create a tailored experience just for you</p>
                    </div>

                    <!-- Right decorative image -->
                    <div class="hidden lg:block floating-image" style="animation-delay: 1s;">
                        <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="60" cy="60" r="60" fill="#F0FDFA"/>
                            <path d="M80 40L60 30L40 40V80L60 90L80 80V40Z" fill="#06B6D4" opacity="0.3"/>
                            <path d="M60 35L45 42V78L60 85L75 78V42L60 35Z" fill="#14B8A6"/>
                            <circle cx="60" cy="60" r="8" fill="#F0FDFA"/>
                        </svg>
                    </div>
                </div>

                <!-- Progress indicator -->
                <div class="max-w-2xl mx-auto mb-8">
                    <div class="flex items-center justify-center gap-2">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">1</div>
                            <span class="ml-2 text-sm font-medium text-slate-700 hidden sm:inline">Details</span>
                        </div>
                        <div class="w-12 sm:w-16 h-1 bg-blue-200"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center text-blue-600 text-sm font-semibold">2</div>
                            <span class="ml-2 text-sm font-medium text-slate-500 hidden sm:inline">Review</span>
                        </div>
                        <div class="w-12 sm:w-16 h-1 bg-slate-200"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-slate-200 rounded-full flex items-center justify-center text-slate-400 text-sm font-semibold">3</div>
                            <span class="ml-2 text-sm font-medium text-slate-400 hidden sm:inline">Confirm</span>
                        </div>
                    </div>
                </div>
            </div>

            @include('feedback')

            <!-- Main Form -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                <form action="{{route('book-travel-agency')}}" method="post">
                    @csrf
                    
                    <!-- Personal Information -->
                    <div class="p-6 md:p-8 border-b border-slate-100 form-step">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">Your Information</h2>
                                <p class="text-sm text-slate-500">Let us know who's traveling</p>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="full-name" class="block text-sm font-semibold text-slate-700 mb-2">Full Name *</label>
                                <input type="text" id="full-name" name="full_name" placeholder="John Doe" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" placeholder="john@example.com" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" placeholder="+44 7700 900000" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                            </div>
                            {{-- <div>
                                <label for="nationality" class="block text-sm font-semibold text-slate-700 mb-2">Nationality *</label>
                                <select id="nationality" name="nationality" onchange="toggleOtherField(this, 'nationality-other-wrapper')" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                                    <option value="">Select nationality</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="us">United States</option>
                                    <option value="ca">Canada</option>
                                    <option value="au">Australia</option>
                                    <option value="ng">Nigeria</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="nationality-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="nationality_other" placeholder="Please specify your nationality" 
                                        class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50">
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Trip Details -->
                    <div class="p-6 md:p-8 border-b border-slate-100 bg-slate-50/50 form-step">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">Trip Details</h2>
                                <p class="text-sm text-slate-500">Where and when do you want to go?</p>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label for="destination" class="block text-sm font-semibold text-slate-700 mb-2">Destination *</label>
                                <select id="destination" name="destination" onchange="toggleOtherField(this, 'destination-other-wrapper')" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white hover:bg-slate-50" required>
                                    <option value="">Choose your destination</option>
                                    <option value="paris">🇫🇷 Paris, France</option>
                                    <option value="rome">🇮🇹 Rome, Italy</option>
                                    <option value="barcelona">🇪🇸 Barcelona, Spain</option>
                                    <option value="amsterdam">🇳🇱 Amsterdam, Netherlands</option>
                                    <option value="london">🇬🇧 London, UK</option>
                                    <option value="santorini">🇬🇷 Santorini, Greece</option>
                                    <option value="iceland">🇮🇸 Iceland</option>
                                    <option value="croatia">🇭🇷 Croatia</option>
                                    <option value="other">🌍 Other Destination</option>
                                </select>
                                <div id="destination-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="destination_other" placeholder="Please specify your destination" 
                                        class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                                </div>
                            </div>
                            <div>
                                <label for="departure-date" class="block text-sm font-semibold text-slate-700 mb-2">Departure Date *</label>
                                <input type="date" id="departure-date" name="departure_date" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white hover:bg-slate-50" required>
                            </div>
                            <div>
                                <label for="return-date" class="block text-sm font-semibold text-slate-700 mb-2">Return Date *</label>
                                <input type="date" id="return-date" name="return_date" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white hover:bg-slate-50" required>
                                <p id="trip-duration" class="text-sm text-blue-600 font-medium mt-2 hidden"></p>
                            </div>
                            <div class="md:col-span-2">
                                <label for="trip-type" class="block text-sm font-semibold text-slate-700 mb-2">Trip Type *</label>
                                <select id="trip-type" name="trip_type" onchange="toggleOtherField(this, 'trip-type-other-wrapper')" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white hover:bg-slate-50" required>
                                    <option value="">Select trip type</option>
                                    <option value="adventure">🏔️ Adventure & Hiking</option>
                                    <option value="beach">🏖️ Beach & Relaxation</option>
                                    <option value="cultural">🏛️ Cultural & Historical</option>
                                    <option value="luxury">💎 Luxury Getaway</option>
                                    <option value="family">👨‍👩‍👧 Family Vacation</option>
                                    <option value="honeymoon">💑 Honeymoon</option>
                                    <option value="other">✨ Other</option>
                                </select>
                                <div id="trip-type-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="trip_type_other" placeholder="Please specify trip type" 
                                        class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Travelers & Budget -->
                    <div class="p-6 md:p-8 border-b border-slate-100 form-step">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">Travelers & Budget</h2>
                                <p class="text-sm text-slate-500">How many people and what's your budget?</p>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-3 gap-5 mb-6">
                            <div>
                                <label for="adults" class="block text-sm font-semibold text-slate-700 mb-2">Adults (18+) *</label>
                                <input type="number" id="adults" name="adults" min="1" value="1" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                            </div>
                            <div>
                                <label for="children" class="block text-sm font-semibold text-slate-700 mb-2">Children (2-17)</label>
                                <input type="number" id="children" name="children" min="0" value="0" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white">
                            </div>
                            <div>
                                <label for="infants" class="block text-sm font-semibold text-slate-700 mb-2">Infants (0-2)</label>
                                <input type="number" id="infants" name="infants" min="0" value="0" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="accommodation" class="block text-sm font-semibold text-slate-700 mb-2">Accommodation *</label>
                                <select id="accommodation" name="accommodation" onchange="toggleOtherField(this, 'accommodation-other-wrapper')" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                                    <option value="">Select accommodation</option>
                                    <option value="hotel-3">⭐⭐⭐ 3-Star Hotel</option>
                                    <option value="hotel-4">⭐⭐⭐⭐ 4-Star Hotel</option>
                                    <option value="hotel-5">⭐⭐⭐⭐⭐ 5-Star Luxury</option>
                                    <option value="resort">🏝️ Resort</option>
                                    <option value="villa">🏡 Private Villa</option>
                                    <option value="apartment">🏢 Apartment</option>
                                    <option value="other">🏨 Other</option>
                                </select>
                                <div id="accommodation-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="accommodation_other" placeholder="Please specify accommodation type" 
                                        class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                                </div>
                            </div>
                            <div>
                                <label for="budget" class="block text-sm font-semibold text-slate-700 mb-2">Budget per Person (GBP) *</label>
                                <select id="budget" name="budget" 
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white" required>
                                    <option value="">Select budget range</option>
                                    <option value="budget">£500 - £1,500</option>
                                    <option value="moderate">£1,500 - £3,000</option>
                                    <option value="premium">£3,000 - £5,000</option>
                                    <option value="luxury">£5,000+</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Services -->
                    <div class="p-6 md:p-8 border-b border-slate-100 bg-slate-50/50 form-step">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">Enhance Your Trip</h2>
                                <p class="text-sm text-slate-500">Optional services to make your journey smoother</p>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <label class="relative flex items-center p-5 border-2 border-slate-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50/50 transition group">
                                <input type="checkbox" name="services[]" value="airport-transfer" class="w-5 h-5 text-blue-500 border-slate-300 rounded focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center gap-2">
                                        {{-- <span class="text-2xl">🚗</span> --}}
                                        <span class="font-semibold text-slate-800">Airport Transfer</span>
                                    </div>
                                    <p class="text-sm text-slate-500 mt-1">Door-to-door service</p>
                                </div>
                            </label>

                            <label class="relative flex items-center p-5 border-2 border-slate-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50/50 transition group">
                                <input type="checkbox" name="services[]" value="travel-insurance" class="w-5 h-5 text-blue-500 border-slate-300 rounded focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center gap-2">
                                        {{-- <span class="text-2xl">🛡️</span> --}}
                                        <span class="font-semibold text-slate-800">Travel Insurance</span>
                                    </div>
                                    <p class="text-sm text-slate-500 mt-1">Peace of mind coverage</p>
                                </div>
                            </label>

                            <label class="relative flex items-center p-5 border-2 border-slate-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50/50 transition group">
                                <input type="checkbox" name="services[]" value="guided-tours" class="w-5 h-5 text-blue-500 border-slate-300 rounded focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center gap-2">
                                        {{-- <span class="text-2xl">🗺️</span> --}}
                                        <span class="font-semibold text-slate-800">Guided Tours</span>
                                    </div>
                                    <p class="text-sm text-slate-500 mt-1">Expert local guides</p>
                                </div>
                            </label>

                            <label class="relative flex items-center p-5 border-2 border-slate-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50/50 transition group">
                                <input type="checkbox" name="services[]" value="car-rental" class="w-5 h-5 text-blue-500 border-slate-300 rounded focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center gap-2">
                                        {{-- <span class="text-2xl">🚘</span> --}}
                                        <span class="font-semibold text-slate-800">Car Rental</span>
                                    </div>
                                    <p class="text-sm text-slate-500 mt-1">Explore at your pace</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Special Requests -->
                    <div class="p-6 md:p-8 border-b border-slate-100 form-step">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-50 to-green-100 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">Special Requests</h2>
                                <p class="text-sm text-slate-500">Anything else we should know?</p>
                            </div>
                        </div>
                        <textarea id="special-requests" name="special_requests" rows="5" 
                            placeholder="Tell us about dietary requirements, accessibility needs, special celebrations, or any other preferences..." 
                            class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-slate-50 hover:bg-white resize-none"></textarea>
                    </div>

                    <!-- Submit Section -->
                    <div class="p-6 md:p-8 bg-gradient-to-br from-blue-50 to-cyan-50">
                        <div class="max-w-2xl mx-auto text-center mb-6">
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Ready to Start Your Adventure?</h3>
                            <p class="text-sm text-slate-600">We'll review your request and get back to you within 24 hours with a personalized quote</p>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-5 px-8 rounded-xl transition-all transform hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-blue-500/30 flex items-center justify-center text-lg group">
                            <span>Submit Booking Request</span>
                            <svg class="w-6 h-6 ml-3 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                        
                        {{-- <p class="text-center text-sm text-slate-500 mt-4">
                            🔒 Secure booking • By submitting, you agree to our 
                            <a href="#" class="text-blue-600 hover:underline">Terms & Conditions</a> --}}
                        </p>
                    </div>
                </form>
            </div>

            <!-- Trust Badges -->
            {{-- <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="text-3xl mb-2">⚡</div>
                    <div class="text-sm font-semibold text-slate-800">Quick Response</div>
                    <div class="text-xs text-slate-500">Within 24 hours</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="text-3xl mb-2">🛡️</div>
                    <div class="text-sm font-semibold text-slate-800">Secure Booking</div>
                    <div class="text-xs text-slate-500">Protected payments</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="text-3xl mb-2">💯</div>
                    <div class="text-sm font-semibold text-slate-800">Best Price</div>
                    <div class="text-xs text-slate-500">Guaranteed value</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="text-3xl mb-2">⭐</div>
                    <div class="text-sm font-semibold text-slate-800">Expert Support</div>
                    <div class="text-xs text-slate-500">24/7 assistance</div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection