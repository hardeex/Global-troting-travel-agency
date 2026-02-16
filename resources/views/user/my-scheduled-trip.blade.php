@extends('user.base')
@section('title', 'My Schedule Bookings')
@section('content')

    <div class="min-h-screen font-['Lato',sans-serif]">
        <!-- Hero Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">My Scheduled Bookings</h1>

            @auth
                <p class="text-gray-600">Viewing all inquiries for {{ Auth::user()->email }}</p>
            @else
                @if ($isGuest && $guestEmail)
                    <div class="flex items-center justify-between bg-blue-50 border border-blue-200 rounded-lg px-4 py-3">
                        <p class="text-blue-800">Viewing inquiries for <strong>{{ $guestEmail }}</strong></p>
                        <form action="{{ route('inquiries.clear-session') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-blue-600 hover:text-blue-800 underline">
                                View Different Email
                            </button>
                        </form>
                    </div>
                @else
                    <p class="text-gray-600">Enter your email to view your inquiries</p>
                @endif
            @endauth
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-20 relative z-20">

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 text-green-800 px-6 py-4 rounded-lg mb-6 shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 text-red-800 px-6 py-4 rounded-lg mb-6 shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Guest Email Input Form -->
            @guest
                @if (!$isGuest || !$guestEmail)
                    <div class="rounded-2xl shadow-lg p-8 mb-8">
                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-teal-50 rounded-full mb-4">
                                <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="font-['Playfair_Display',serif] text-2xl font-bold text-gray-900 mb-2">
                                Access Your Bookings
                            </h2>
                            <p class="text-gray-600">
                                Enter the email address you used when making your booking
                            </p>
                        </div>

                        <form action="{{ route('bookings.index') }}" method="GET" class="max-w-md mx-auto">
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email Address
                                </label>
                                <input type="email" name="email" id="email" required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition"
                                    placeholder="your@email.com" value="{{ old('email', session('guest_booking_email')) }}">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full px-6 py-3 bg-gradient-to-r from-teal-600 to-teal-700 text-white font-semibold rounded-lg hover:from-teal-700 hover:to-teal-800 transition transform hover:scale-105 shadow-lg">
                                View My Bookings
                            </button>
                        </form>

                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                Don't have an account?
                                <a href="{{ route('register') }}"
                                    class="text-teal-600 hover:text-teal-700 font-semibold hover:underline">
                                    Create one here
                                </a>
                                to manage all your bookings in one place.
                            </p>
                        </div>
                    </div>
                @endif
            @endguest

            <!-- Bookings List -->
            @if ($bookings->count() > 0)
                <div class="mb-6 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ $bookings->total() }} {{ Str::plural('Booking', $bookings->total()) }} Found
                    </h3>

                    @auth
                        <a href="{{ route('make-a-request') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Booking
                        </a>
                    @endauth
                </div>

                <div class="space-y-6">
                    @foreach ($bookings as $booking)
                        <div
                            class=" rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-gray-100">
                            <!-- Header -->
                            <div class="bg-gradient-to-r from-teal-50 to-cyan-50 px-6 py-4 border-b border-gray-100">
                                <div class="flex flex-wrap items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-gradient-to-br from-teal-700/10 to-teal-500/15">
                                            <svg class="w-5 h-5 text-teal-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900">
                                                {{ $booking->destination }}
                                            </h3>
                                            <p class="text-sm text-gray-600">
                                                Booking #{{ $booking->id }} •
                                                {{ $booking->created_at->format('M d, Y') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        @if ($booking->user_id)
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Registered User
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Guest
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Travel Dates -->
                                    <div>
                                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Travel
                                            Dates</h4>
                                        <div class="space-y-2">
                                            <div class="flex items-center gap-2 text-sm">
                                                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span class="text-gray-700 font-medium">Departure:</span>
                                                <span
                                                    class="text-gray-900">{{ $booking->departure_date ? $booking->departure_date->format('M d, Y') : 'N/A' }}</span>
                                            </div>
                                            @if ($booking->return_date)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <svg class="w-4 h-4 text-teal-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="text-gray-700 font-medium">Return:</span>
                                                    <span
                                                        class="text-gray-900">{{ $booking->return_date->format('M d, Y') }}</span>
                                                </div>
                                                <div
                                                    class="mt-2 inline-flex items-center gap-1 px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-xs font-medium">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $booking->trip_duration }}
                                                    {{ Str::plural('night', $booking->trip_duration) }}
                                                </div>
                                            @endif
                                            @if ($booking->flexible_dates === 'yes')
                                                <div class="mt-2 text-xs text-gray-600 italic">
                                                    ✓ Flexible dates
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Travelers -->
                                    <div>
                                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">
                                            Travelers</h4>
                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <span class="text-gray-700 font-medium">Adults:</span>
                                                <span class="text-gray-900">{{ $booking->adults }}</span>
                                            </div>
                                            @if ($booking->children > 0)
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-teal-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    <span class="text-gray-700 font-medium">Children:</span>
                                                    <span class="text-gray-900">{{ $booking->children }}</span>
                                                </div>
                                            @endif
                                            @if ($booking->infants > 0)
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-teal-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    <span class="text-gray-700 font-medium">Infants:</span>
                                                    <span class="text-gray-900">{{ $booking->infants }}</span>
                                                </div>
                                            @endif
                                            <div
                                                class="mt-2 inline-flex items-center gap-1 px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">
                                                Total: {{ $booking->total_travelers }}
                                                {{ Str::plural('traveler', $booking->total_travelers) }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contact Information -->
                                    <div>
                                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">
                                            Contact Details</h4>
                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-start gap-2">
                                                <svg class="w-4 h-4 text-teal-600 mt-0.5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <div class="flex-1">
                                                    <p class="text-gray-700 font-medium">{{ $booking->full_name }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <svg class="w-4 h-4 text-teal-600 mt-0.5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <div class="flex-1">
                                                    <p class="text-gray-700 break-all">{{ $booking->email }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <svg class="w-4 h-4 text-teal-600 mt-0.5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                <div class="flex-1">
                                                    <p class="text-gray-700">{{ $booking->phone }}</p>
                                                </div>
                                            </div>
                                            @if ($booking->address)
                                                <div class="flex items-start gap-2">
                                                    <svg class="w-4 h-4 text-teal-600 mt-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    <div class="flex-1">
                                                        <p class="text-gray-700 text-xs">{{ $booking->address }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Details -->
                                <div class="mt-6 pt-6 border-t border-gray-100">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <!-- Left Column -->
                                        <div class="space-y-3">
                                            @if ($booking->trip_type)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span class="text-gray-600 font-medium min-w-[120px]">Trip Type:</span>
                                                    <span
                                                        class="text-gray-900">{{ ucwords(str_replace('_', ' ', $booking->trip_type)) }}</span>
                                                </div>
                                            @endif

                                            @if ($booking->budget)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span class="text-gray-600 font-medium min-w-[120px]">Budget:</span>
                                                    <span
                                                        class="text-gray-900">{{ ucwords(str_replace('_', ' ', $booking->budget)) }}</span>
                                                </div>
                                            @endif

                                            @if ($booking->accommodation)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span
                                                        class="text-gray-600 font-medium min-w-[120px]">Accommodation:</span>
                                                    <span
                                                        class="text-gray-900">{{ ucwords(str_replace('_', ' ', $booking->accommodation)) }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Right Column -->
                                        <div class="space-y-3">
                                            @if ($booking->nationality)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span
                                                        class="text-gray-600 font-medium min-w-[120px]">Nationality:</span>
                                                    <span class="text-gray-900">{{ $booking->nationality }}</span>
                                                </div>
                                            @endif

                                            <div class="flex items-center gap-2 text-sm">
                                                <span class="text-gray-600 font-medium min-w-[120px]">Insurance:</span>
                                                <span class="text-gray-900">
                                                    @if ($booking->insurance === 'yes')
                                                        <span class="text-green-600 font-medium">✓ Included</span>
                                                    @else
                                                        <span class="text-gray-500">Declined</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Services -->
                                    @if (!empty($booking->services_list) && count($booking->services_list) > 0)
                                        <div class="mt-4">
                                            <h5 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                                                Additional Services</h5>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($booking->services_list as $service)
                                                    <span
                                                        class="inline-block px-3 py-1 bg-teal-50 text-teal-700 rounded-md text-xs font-medium border border-teal-200">
                                                        {{ ucwords(str_replace('-', ' ', $service)) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Special Requests -->
                                    @if ($booking->special_requests)
                                        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                            <h5 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                                                Special Requests</h5>
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                {{ $booking->special_requests }}</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Footer -->
                                <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                                    <div class="text-xs text-gray-500">
                                        Submitted {{ $booking->created_at->diffForHumans() }}
                                    </div>

                                    <div class="flex items-center gap-3">
                                        @if ($booking->marketing_consent)
                                            <span class="text-xs text-gray-500 flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Subscribed to newsletter
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $bookings->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>

                        @if ($isGuest && $guestEmail)
                            <h3 class="font-['Playfair_Display',serif] text-2xl font-bold text-gray-900 mb-3">
                                No Bookings Found
                            </h3>
                            <p class="text-gray-600 mb-8">
                                We couldn't find any bookings for <strong>{{ $guestEmail }}</strong>
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('book-travel') }}"
                                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-teal-600 to-teal-700 text-white rounded-lg hover:from-teal-700 hover:to-teal-800 transition transform hover:scale-105 shadow-lg font-medium">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Make a Booking
                                </a>
                                <form action="{{ route('bookings.clear-session') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="w-full px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                                        Try Different Email
                                    </button>
                                </form>
                            </div>
                        @else
                            <h3 class="font-['Playfair_Display',serif] text-2xl font-bold text-gray-900 mb-3">
                                No Bookings Yet
                            </h3>
                            <p class="text-gray-600 mb-8">
                                You haven't made any travel bookings yet. Start planning your next adventure!
                            </p>
                            <a href="{{ route('make-a-request') }}"
                                class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-teal-600 to-teal-700 text-white rounded-lg hover:from-teal-700 hover:to-teal-800 transition transform hover:scale-105 shadow-lg font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Create Your First Booking
                            </a>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
