@extends('components.base')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lato:wght@300;400;500;600&display=swap');
    
    :root {
    --font-display: 'Playfair Display', serif;
    --font-body: 'Lato', sans-serif;
    --color-primary: #0a2540; /* Navy Blue */
    --color-accent: #0f766e;
    --color-accent-light: #14b8a6;
    --color-gold: #d4a574;
    --color-bg: #f8fafc;
    --color-surface: #ffffff;
    --shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
}

    body {
        font-family: var(--font-body);
        background: var(--color-bg);
    }
    
    /* Hero gradient background */
    .hero-gradient {
        background: linear-gradient(135deg, #0f766e 0%, #14b8a6 50%, #0891b2 100%);
        position: relative;
        overflow: hidden;
    }
    
    .hero-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    /* Floating animation */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    
    /* Fade in animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    /* Stagger children */
    .stagger > * {
        opacity: 0;
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .stagger > *:nth-child(1) { animation-delay: 0.1s; }
    .stagger > *:nth-child(2) { animation-delay: 0.2s; }
    .stagger > *:nth-child(3) { animation-delay: 0.3s; }
    .stagger > *:nth-child(4) { animation-delay: 0.4s; }
    .stagger > *:nth-child(5) { animation-delay: 0.5s; }
    .stagger > *:nth-child(6) { animation-delay: 0.6s; }
    .stagger > *:nth-child(7) { animation-delay: 0.7s; }
    .stagger > *:nth-child(8) { animation-delay: 0.8s; }
    
    /* Form input styles */
    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        background: white;
    }
    
    .form-input:focus {
        outline: none;
        border-color: var(--color-accent);
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
    }
    
    .form-input:hover:not(:focus) {
        border-color: #cbd5e1;
    }
    
    /* Section card hover */
    .section-card {
        transition: all 0.3s ease;
    }
    
    .section-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Checkbox styles */
    .custom-checkbox {
        appearance: none;
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid #cbd5e1;
        border-radius: 0.375rem;
        background: white;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
    }
    
    .custom-checkbox:checked {
        background: var(--color-accent);
        border-color: var(--color-accent);
    }
    
    .custom-checkbox:checked::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    
    /* Progress bar */
    .progress-bar {
        height: 4px;
        background: #e2e8f0;
        border-radius: 9999px;
        overflow: hidden;
        position: relative;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
        transition: width 0.3s ease;
    }
    
    /* Submit button pulse */
    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(15, 118, 110, 0.4); }
        50% { box-shadow: 0 0 0 10px rgba(15, 118, 110, 0); }
    }
    
    .btn-submit:hover {
        animation: pulse 2s infinite;
    }
    
    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    /* Service card hover effect */
    .service-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #e2e8f0;
    }
    
    .service-card:hover {
        border-color: var(--color-accent-light);
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.03) 0%, rgba(20, 184, 166, 0.05) 100%);
        transform: translateY(-2px);
    }
    
    .service-card input:checked ~ div {
        border-color: var(--color-accent);
    }
    
    /* Honeypot - hidden from users */
    .honeypot {
        position: absolute !important;
        left: -9999px !important;
        width: 1px !important;
        height: 1px !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }

    /* Loading spinner */
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    .spinner {
        display: inline-block;
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.6s linear infinite;
    }
</style>

<div class="min-h-screen">
    <!-- Hero Section -->
    <div class="hero-gradient relative py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto text-center relative z-10">
            <!-- Floating decorative elements -->
            <div class="absolute top-10 left-10 w-20 h-20 opacity-20 floating" style="animation-delay: 0s;">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="50" r="40" stroke="white" stroke-width="2"/>
                    <path d="M50 20L60 40L80 45L65 60L68 80L50 70L32 80L35 60L20 45L40 40L50 20Z" fill="white"/>
                </svg>
            </div>
            <div class="absolute bottom-10 right-10 w-16 h-16 opacity-20 floating" style="animation-delay: 1.5s;">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="20" y="20" width="60" height="60" stroke="white" stroke-width="2" rx="8"/>
                    <circle cx="50" cy="50" r="15" fill="white"/>
                </svg>
            </div>
            
            <div class="animate-fade-in">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h1 style="font-family: var(--font-display); font-size: 3rem; font-weight: 700; color: white; line-height: 1.1; margin-bottom: 1rem;">
                    Your Journey Begins Here
                </h1>
                <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.9); max-width: 42rem; margin: 0 auto;">
                    Share your travel dreams with us and we'll craft the perfect itinerary tailored to your preferences
                </p>
            </div>
        </div>
    </div>

    @include('feedback')

    <!-- Main Form Container -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 pb-20 relative z-20">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden" style="border: 1px solid #e2e8f0;">
            
            <form action="{{ route('book-travel-agency') }}" method="POST" id="booking-form">
                @csrf
                
                <!-- Honeypot field for bot detection -->
                <div class="honeypot" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>
                
                <input type="hidden" name="form_type" value="scheduled_trip">
                
                <!-- Progress Bar -->
                <div class="progress-bar">
                    <div class="progress-fill" id="progress" style="width: 0%;"></div>
                </div>
                
                <div class="stagger">
                    <!-- Section 1: Personal Information -->
                    <div class="section-card p-6 sm:p-8 border-b border-gray-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, rgba(15, 118, 110, 0.1) 0%, rgba(20, 184, 166, 0.1) 100%);">
                                <svg class="w-6 h-6" style="color: var(--color-accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: var(--color-primary); margin-bottom: 0.25rem;">
                                    Personal Information
                                </h2>
                                <p style="color: #64748b; font-size: 0.9375rem;">
                                    Let us know who we'll be helping plan this amazing journey
                                </p>
                            </div>
                        </div>
                        
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label for="full_name" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Full Name <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="text" id="full_name" name="full_name" 
                                       value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                       class="form-input" 
                                       placeholder="Enter your full name" 
                                       required>
                                @error('full_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Email Address <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="email" id="email" name="email" 
                                        value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                       class="form-input" 
                                       placeholder="your@email.com" 
                                       required>
                                @error('email')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Phone Number <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone" 
                                       value="{{ old('phone', auth()->check() ? auth()->user()->phone : '') }}"
                                       class="form-input" 
                                       placeholder="+44 7700 900000" 
                                       required>
                                @error('phone')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="address" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Address
                                </label>
                                <input type="text" id="address" name="address" 
                                       value="{{ old('address', auth()->check() ? auth()->user()->address : '') }}"
                                       class="form-input" 
                                       placeholder="Your full address">
                                @error('address')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Travel Destination & Dates -->
                    <div class="section-card p-6 sm:p-8 border-b border-gray-100" style="background: linear-gradient(135deg, rgba(15, 118, 110, 0.02) 0%, rgba(20, 184, 166, 0.03) 100%);">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, rgba(15, 118, 110, 0.1) 0%, rgba(20, 184, 166, 0.1) 100%);">
                                <svg class="w-6 h-6" style="color: var(--color-accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: var(--color-primary); margin-bottom: 0.25rem;">
                                    Travel Destination & Dates
                                </h2>
                                <p style="color: #64748b; font-size: 0.9375rem;">
                                    Where would you like to explore and when?
                                </p>
                            </div>
                        </div>
                        
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div class="sm:col-span-2">
                                <label for="destination" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Destination of Interest <span style="color: #ef4444;">*</span>
                                </label>
                                <select id="destination" name="destination" 
                                        class="form-input" 
                                        onchange="toggleOtherField(this, 'destination-other-wrapper')" 
                                        required>
                                    <option value="">Select your dream destination</option>
                                    <option value="paris">Paris, France</option>
                                    <option value="rome">Rome, Italy</option>
                                    <option value="barcelona">Barcelona, Spain</option>
                                    <option value="amsterdam">Amsterdam, Netherlands</option>
                                    <option value="london">London, UK</option>
                                    <option value="santorini">Santorini, Greece</option>
                                    <option value="iceland">Iceland</option>
                                    <option value="dubai">Dubai, UAE</option>
                                    <option value="maldives">Maldives</option>
                                    <option value="bali">Bali, Indonesia</option>
                                    <option value="tokyo">Tokyo, Japan</option>
                                    <option value="new_york">New York, USA</option>
                                    <option value="other">Other Destination</option>
                                </select>
                                <div id="destination-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="destination_other" 
                                           class="form-input" 
                                           placeholder="Please specify your destination">
                                </div>
                                @error('destination')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="departure_date" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Departure Date <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="date" id="departure_date" name="departure_date" 
                                       value="{{ old('departure_date') }}" 
                                       class="form-input" 
                                       min="{{ date('Y-m-d') }}"
                                       required>
                                @error('departure_date')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="return_date" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Return Date
                                </label>
                                <input type="date" id="return_date" name="return_date" 
                                       value="{{ old('return_date') }}" 
                                       class="form-input"
                                       min="{{ date('Y-m-d') }}">
                                <p id="trip-duration" class="text-sm mt-2 font-medium" style="color: var(--color-accent);"></p>
                                @error('return_date')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="sm:col-span-2">
                                <label for="trip_type" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Trip Type
                                </label>
                                <select id="trip_type" name="trip_type" 
                                        class="form-input" 
                                        onchange="toggleOtherField(this, 'trip-type-other-wrapper')">
                                    <option value="">Select your trip style</option>
                                    <option value="adventure">Adventure & Hiking</option>
                                    <option value="beach">Beach & Relaxation</option>
                                    <option value="cultural">Cultural & Historical</option>
                                    <option value="luxury">Luxury Getaway</option>
                                    <option value="family">Family Vacation</option>
                                    <option value="honeymoon">Honeymoon / Romantic</option>
                                    <option value="business">Business Travel</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="trip-type-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="trip_type_other" 
                                           class="form-input" 
                                           placeholder="Please specify trip type">
                                </div>
                                @error('trip_type')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="sm:col-span-2">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" name="flexible_dates" value="yes" class="custom-checkbox">
                                    <span class="text-sm font-medium group-hover:text-teal-700 transition" style="color: var(--color-primary);">
                                        My travel dates are flexible
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Travelers & Budget -->
                    <div class="section-card p-6 sm:p-8 border-b border-gray-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1) 0%, rgba(212, 165, 116, 0.2) 100%);">
                                <svg class="w-6 h-6" style="color: var(--color-gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: var(--color-primary); margin-bottom: 0.25rem;">
                                    Travelers & Budget
                                </h2>
                                <p style="color: #64748b; font-size: 0.9375rem;">
                                    Tell us about your travel party and budget expectations
                                </p>
                            </div>
                        </div>
                        
                        <div class="grid sm:grid-cols-3 gap-5 mb-6">
                            <div>
                                <label for="adults" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Adults (18+) <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="number" id="adults" name="adults" 
                                       value="{{ old('adults', 1) }}" 
                                       min="1" 
                                       class="form-input" 
                                       required>
                                @error('adults')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="children" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Children (2-17)
                                </label>
                                <input type="number" id="children" name="children" 
                                       value="{{ old('children', 0) }}" 
                                       min="0" 
                                       class="form-input">
                                @error('children')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="infants" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Infants (0-2)
                                </label>
                                <input type="number" id="infants" name="infants" 
                                       value="{{ old('infants', 0) }}" 
                                       min="0" 
                                       class="form-input">
                                @error('infants')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label for="budget" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Vacation Budget Per Person (GBP) <span style="color: #ef4444;">*</span>
                                </label>
                                <select id="budget" name="budget" class="form-input" required>
                                    <option value="">Select your budget range</option>
                                    <option value="budget">£500 - £1,500 (Budget-Friendly)</option>
                                    <option value="moderate">£1,500 - £3,000 (Moderate)</option>
                                    <option value="premium">£3,000 - £5,000 (Premium)</option>
                                    <option value="luxury">£5,000+ (Luxury)</option>
                                </select>
                                @error('budget')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="accommodation" class="block text-sm font-semibold mb-2" style="color: var(--color-primary);">
                                    Preferred Accommodation
                                </label>
                                <select id="accommodation" name="accommodation" 
                                        class="form-input" 
                                        onchange="toggleOtherField(this, 'accommodation-other-wrapper')">
                                    <option value="">Select accommodation type</option>
                                    <option value="hotel-3">3-Star Hotel</option>
                                    <option value="hotel-4">4-Star Hotel</option>
                                    <option value="hotel-5">5-Star Luxury Hotel</option>
                                    <option value="resort">Resort</option>
                                    <option value="villa">Private Villa</option>
                                    <option value="apartment">Apartment / Airbnb</option>
                                    <option value="boutique">Boutique Hotel</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="accommodation-other-wrapper" class="mt-3 hidden">
                                    <input type="text" name="accommodation_other" 
                                           class="form-input" 
                                           placeholder="Please specify accommodation type">
                                </div>
                                @error('accommodation')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Travel Insurance & Services -->
                    <div class="section-card p-6 sm:p-8 border-b border-gray-100" style="background: linear-gradient(135deg, rgba(15, 118, 110, 0.02) 0%, rgba(20, 184, 166, 0.03) 100%);">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, rgba(15, 118, 110, 0.1) 0%, rgba(20, 184, 166, 0.1) 100%);">
                                <svg class="w-6 h-6" style="color: var(--color-accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: var(--color-primary); margin-bottom: 0.25rem;">
                                    Insurance & Additional Services
                                </h2>
                                <p style="color: #64748b; font-size: 0.9375rem;">
                                    Protect your trip and enhance your experience
                                </p>
                            </div>
                        </div>
                        
                        <!-- Travel Insurance -->
                        <div class="mb-6 p-5 rounded-xl" style="background: white; border: 2px solid #e2e8f0;">
                            <label class="block text-sm font-semibold mb-3" style="color: var(--color-primary);">
                                Travel Insurance <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="insurance" value="yes" class="w-4 h-4 text-teal-600" required>
                                    <span class="text-sm font-medium" style="color: var(--color-primary);">Yes, I want insurance</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="insurance" value="no" class="w-4 h-4 text-teal-600" required>
                                    <span class="text-sm font-medium" style="color: var(--color-primary);">No, I'll waive insurance</span>
                                </label>
                            </div>
                            <p class="text-xs mt-2" style="color: #64748b;">
                                Note: If you decline insurance, a signed waiver will be required before travel.
                            </p>
                        </div>
                        
                        <!-- Additional Services -->
                        <div>
                            <label class="block text-sm font-semibold mb-4" style="color: var(--color-primary);">
                                Select Additional Services (Optional)
                            </label>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <label class="service-card relative flex items-start p-4 rounded-xl cursor-pointer">
                                    <input type="checkbox" name="services[]" value="airport-transfer" class="custom-checkbox mt-0.5">
                                    <div class="ml-3">
                                        <div class="font-semibold text-sm" style="color: var(--color-primary);">Airport Transfer</div>
                                        <p class="text-xs mt-0.5" style="color: #64748b;">Private door-to-door service</p>
                                    </div>
                                </label>
                                
                                <label class="service-card relative flex items-start p-4 rounded-xl cursor-pointer">
                                    <input type="checkbox" name="services[]" value="guided-tours" class="custom-checkbox mt-0.5">
                                    <div class="ml-3">
                                        <div class="font-semibold text-sm" style="color: var(--color-primary);">Guided Tours</div>
                                        <p class="text-xs mt-0.5" style="color: #64748b;">Expert local guides & experiences</p>
                                    </div>
                                </label>
                                
                                <label class="service-card relative flex items-start p-4 rounded-xl cursor-pointer">
                                    <input type="checkbox" name="services[]" value="car-rental" class="custom-checkbox mt-0.5">
                                    <div class="ml-3">
                                        <div class="font-semibold text-sm" style="color: var(--color-primary);">Car Rental</div>
                                        <p class="text-xs mt-0.5" style="color: #64748b;">Explore at your own pace</p>
                                    </div>
                                </label>
                                
                                <label class="service-card relative flex items-start p-4 rounded-xl cursor-pointer">
                                    <input type="checkbox" name="services[]" value="visa-assistance" class="custom-checkbox mt-0.5">
                                    <div class="ml-3">
                                        <div class="font-semibold text-sm" style="color: var(--color-primary);">Visa Assistance</div>
                                        <p class="text-xs mt-0.5" style="color: #64748b;">Help with visa applications</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Special Requests -->
                    <div class="section-card p-6 sm:p-8 border-b border-gray-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(167, 139, 250, 0.1) 100%);">
                                <svg class="w-6 h-6" style="color: #8b5cf6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: var(--color-primary); margin-bottom: 0.25rem;">
                                    Special Requests & Preferences
                                </h2>
                                <p style="color: #64748b; font-size: 0.9375rem;">
                                    Share any special requirements or preferences to personalize your trip
                                </p>
                            </div>
                        </div>
                        
                        <textarea id="special_requests" name="special_requests" rows="6" 
                                  class="form-input resize-none" 
                                  placeholder="Please tell us about:
• Dietary requirements or food allergies
• Accessibility needs or mobility considerations
• Special celebrations (birthday, anniversary, honeymoon)
• Activities or experiences you'd like to include
• Any other preferences or concerns we should know about">{{ old('special_requests') }}</textarea>
                        @error('special_requests')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 6: Marketing Consent & reCAPTCHA -->
                    <div class="section-card p-6 sm:p-8" style="background: linear-gradient(135deg, rgba(15, 118, 110, 0.02) 0%, rgba(20, 184, 166, 0.03) 100%);">
                        <div class="space-y-5">
                            <!-- Marketing Consent -->
                            <div class="p-5 rounded-xl" style="background: white; border: 2px solid #e2e8f0;">
                                <div class="flex items-start gap-3">
                                    <input type="checkbox" name="marketing_consent" value="1" class="custom-checkbox mt-1" id="marketing_consent" required>
                                    <label for="marketing_consent" class="flex-1 cursor-pointer">
                                        <span class="block text-sm font-semibold mb-1" style="color: var(--color-primary);">
                                            Stay Inspired: Subscribe to Our Travel Newsletter
                                        </span>
                                        <p class="text-xs leading-relaxed" style="color: #64748b;">
                                            Receive exclusive travel deals, destination guides, and insider tips delivered to your inbox. 
                                            You can unsubscribe at any time. We respect your privacy and will never share your information with third parties.
                                        </p>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- reCAPTCHA v3 Notice -->
                            <div class="flex justify-center items-center gap-2 p-4 rounded-xl" style="background: rgba(15, 118, 110, 0.05); border: 1px solid rgba(15, 118, 110, 0.1);">
                                <svg class="w-5 h-5 flex-shrink-0" style="color: var(--color-accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <p class="text-xs" style="color: #64748b;">
                                    This site is protected by reCAPTCHA and the Google 
                                    <a href="https://policies.google.com/privacy" target="_blank" class="underline hover:no-underline" style="color: var(--color-accent);">Privacy Policy</a> and 
                                    <a href="https://policies.google.com/terms" target="_blank" class="underline hover:no-underline" style="color: var(--color-accent);">Terms of Service</a> apply.
                                </p>
                            </div>
                            @error('g-recaptcha-response')
                                <p class="text-red-600 text-sm text-center">{{ $message }}</p>
                            @enderror
                            
                            <!-- Terms Notice -->
                            <div class="text-center">
                                <p class="text-xs leading-relaxed" style="color: #64748b;">
                                    By submitting this form, you agree to our 
                                    <a href="#" class="font-medium hover:underline" style="color: var(--color-accent);">Terms of Service</a> 
                                    and 
                                    <a href="#" class="font-medium hover:underline" style="color: var(--color-accent);">Privacy Policy</a>.
                                    Your information is secure and will only be used to process your booking request.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Section -->
                    <div class="p-6 sm:p-8" style="background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);">
                        <div class="max-w-2xl mx-auto text-center mb-6">
                            <h3 style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 0.5rem;">
                                Ready to Embark on Your Adventure?
                            </h3>
                            <p style="font-size: 0.9375rem; color: rgba(255, 255, 255, 0.95);">
                                We'll review your request and contact you within 24 hours with a personalized quote and itinerary
                            </p>
                        </div>
                        
                        <button type="submit" 
                                id="submit-button"
                                class="btn-submit w-full sm:w-auto mx-auto flex items-center justify-center gap-3 px-10 py-4 rounded-xl font-semibold text-lg transition-all transform hover:scale-105 active:scale-95" 
                                style="background: white; color: var(--color-accent); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);">
                            <span id="button-text">Submit Booking Request</span>
                            <svg id="button-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                            <span id="button-spinner" class="spinner hidden"></span>
                        </button>
                        
                        <div class="mt-6 flex items-center justify-center gap-6 text-sm" style="color: rgba(255, 255, 255, 0.9);">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Secure & Encrypted
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                No Payment Required
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- reCAPTCHA v3 Script -->
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}" async defer></script>

<script>
    // Toggle "Other" input fields
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
    
    // Calculate trip duration
    document.addEventListener('DOMContentLoaded', function() {
        const departureInput = document.getElementById('departure_date');
        const returnInput = document.getElementById('return_date');
        const durationDisplay = document.getElementById('trip-duration');
        
        function calculateDuration() {
            if (departureInput.value && returnInput.value) {
                const departure = new Date(departureInput.value);
                const returnDate = new Date(returnInput.value);
                const diffTime = Math.abs(returnDate - departure);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                if (diffDays > 0) {
                    durationDisplay.textContent = `✓ ${diffDays} night${diffDays > 1 ? 's' : ''}`;
                    durationDisplay.classList.remove('hidden');
                } else {
                    durationDisplay.classList.add('hidden');
                }
            }
        }
        
        departureInput?.addEventListener('change', calculateDuration);
        returnInput?.addEventListener('change', calculateDuration);
        
        // Progress bar animation
        const form = document.getElementById('booking-form');
        const progress = document.getElementById('progress');
        
        // Calculate progress based on filled inputs
        function updateProgress() {
            const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
            let filled = 0;
            
            inputs.forEach(input => {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    const name = input.name;
                    const checked = form.querySelector(`input[name="${name}"]:checked`);
                    if (checked) filled++;
                } else if (input.value.trim() !== '') {
                    filled++;
                }
            });
            
            const percentage = (filled / inputs.length) * 100;
            progress.style.width = percentage + '%';
        }
        
        // Update progress on input
        form.addEventListener('input', updateProgress);
        form.addEventListener('change', updateProgress);
        
        // Initial progress check
        updateProgress();
        
        // reCAPTCHA v3 Form Submission
        const bookingForm = document.getElementById('booking-form');
        const submitButton = document.getElementById('submit-button');
        const buttonText = document.getElementById('button-text');
        const buttonIcon = document.getElementById('button-icon');
        const buttonSpinner = document.getElementById('button-spinner');
        
        if (bookingForm) {
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Disable button and show loading state
                submitButton.disabled = true;
                buttonText.textContent = 'Processing...';
                buttonIcon.classList.add('hidden');
                buttonSpinner.classList.remove('hidden');
                
                // Execute reCAPTCHA v3
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                        action: 'booking_submit'
                    }).then(function(token) {
                        // Check if token input already exists
                        let tokenInput = bookingForm.querySelector('input[name="g-recaptcha-response"]');
                        
                        if (!tokenInput) {
                            // Create and add token to form
                            tokenInput = document.createElement('input');
                            tokenInput.type = 'hidden';
                            tokenInput.name = 'g-recaptcha-response';
                            bookingForm.appendChild(tokenInput);
                        }
                        
                        tokenInput.value = token;
                        
                        // Submit the form
                        bookingForm.submit();
                    }).catch(function(error) {
                        // Re-enable button on error
                        submitButton.disabled = false;
                        buttonText.textContent = 'Submit Booking Request';
                        buttonIcon.classList.remove('hidden');
                        buttonSpinner.classList.add('hidden');
                        
                        alert('reCAPTCHA verification failed. Please try again.');
                        console.error('reCAPTCHA error:', error);
                    });
                });
            });
        }
        
        // Smooth scroll to first error on page load (if validation errors exist)
        const firstError = document.querySelector('.text-red-600');
        if (firstError) {
            setTimeout(() => {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
        }
    });
</script>

@endsection