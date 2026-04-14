@extends('components.base')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lato:wght@300;400;500;600&display=swap');

        :root {
            --font-display: 'Playfair Display', serif;
            --font-body: 'Lato', sans-serif;
            --color-primary: #0a2540;
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

        /* ── Hero ─────────────────────────────────────────── */
        .hero-gradient {
            background: linear-gradient(135deg, #0f766e 0%, #14b8a6 50%, #0891b2 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-gradient::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

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

        /* ── Step indicators ──────────────────────────────── */
        .step-indicators {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem 1.5rem;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            flex: 1;
            max-width: 160px;
        }

        .step-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 20px;
            left: calc(50% + 22px);
            right: calc(-50% + 22px);
            height: 2px;
            background: #e2e8f0;
            transition: background 0.4s ease;
            z-index: 0;
        }

        .step-item.completed:not(:last-child)::after {
            background: var(--color-accent);
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            border: 2px solid #e2e8f0;
            background: white;
            color: #94a3b8;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
        }

        .step-circle.active {
            border-color: var(--color-accent);
            background: var(--color-accent);
            color: white;
            box-shadow: 0 0 0 4px rgba(15, 118, 110, .15);
        }

        .step-circle.completed {
            border-color: var(--color-accent);
            background: var(--color-accent);
            color: white;
        }

        .step-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #94a3b8;
            text-align: center;
            transition: color .3s;
            white-space: nowrap;
        }

        .step-item.active .step-label,
        .step-item.completed .step-label {
            color: var(--color-accent);
        }

        /* ── Progress bar ─────────────────────────────────── */
        .progress-bar {
            height: 4px;
            background: #e2e8f0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
            transition: width 0.5s ease;
        }

        /* ── Form steps ───────────────────────────────────── */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(24px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInBack {
            from {
                opacity: 0;
                transform: translateX(-24px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-step.active {
            animation: slideIn 0.35s ease forwards;
        }

        .form-step.active.going-back {
            animation: slideInBack 0.35s ease forwards;
        }

        /* ── Inputs ───────────────────────────────────────── */
        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            font-family: var(--font-body);
            transition: all 0.2s ease;
            background: white;
            color: var(--color-primary);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-accent);
            box-shadow: 0 0 0 3px rgba(15, 118, 110, .1);
        }

        .form-input:hover:not(:focus) {
            border-color: #cbd5e1;
        }

        /* ── Custom checkbox ──────────────────────────────── */
        .custom-checkbox {
            appearance: none;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #cbd5e1;
            border-radius: 0.375rem;
            background: white;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
            flex-shrink: 0;
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

        /* ── Service / option cards ───────────────────────── */
        .service-card {
            transition: all 0.3s cubic-bezier(.4, 0, .2, 1);
            border: 2px solid #e2e8f0;
            cursor: pointer;
        }

        .service-card:hover {
            border-color: var(--color-accent-light);
            background: linear-gradient(135deg, rgba(15, 118, 110, .03) 0%, rgba(20, 184, 166, .05) 100%);
            transform: translateY(-2px);
        }

        .service-card:has(input:checked) {
            border-color: var(--color-accent);
            background: linear-gradient(135deg, rgba(15, 118, 110, .05) 0%, rgba(20, 184, 166, .08) 100%);
        }

        /* Section icon backgrounds */
        .si-teal {
            background: linear-gradient(135deg, rgba(15, 118, 110, .1) 0%, rgba(20, 184, 166, .1) 100%);
        }

        .si-gold {
            background: linear-gradient(135deg, rgba(212, 165, 116, .1) 0%, rgba(212, 165, 116, .2) 100%);
        }

        .si-purple {
            background: linear-gradient(135deg, rgba(139, 92, 246, .1) 0%, rgba(167, 139, 250, .1) 100%);
        }

        /* ── Nav buttons ──────────────────────────────────── */
        .btn-next,
        .btn-prev {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .875rem 2rem;
            border-radius: .75rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all .2s;
            cursor: pointer;
            border: none;
        }

        .btn-next {
            background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(15, 118, 110, .3);
        }

        .btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 118, 110, .4);
        }

        .btn-prev {
            background: white;
            color: var(--color-primary);
            border: 2px solid #e2e8f0;
        }

        .btn-prev:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        /* ── Submit button ────────────────────────────────── */
        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(15, 118, 110, .4);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(15, 118, 110, 0);
            }
        }

        .btn-submit {
            background: white;
            color: var(--color-accent);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            padding: 1rem 2.5rem;
            border-radius: .75rem;
            font-weight: 700;
            font-size: 1.125rem;
            border: none;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-submit:hover {
            animation: pulse 2s infinite;
            transform: scale(1.02);
        }

        .btn-submit:disabled {
            opacity: .6;
            cursor: not-allowed;
            transform: none;
            animation: none;
        }

        /* ── Trust sidebar elements ───────────────────────── */
        .trust-card {
            background: linear-gradient(135deg, #fffbf5 0%, #fff9f0 100%);
            border: 1px solid rgba(212, 165, 116, .3);
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
        }

        .trust-card blockquote {
            font-style: italic;
            color: #475569;
            font-size: .9375rem;
            line-height: 1.7;
            margin: 0 0 .75rem;
        }

        .trust-card .reviewer {
            font-size: .8125rem;
            font-weight: 600;
            color: var(--color-gold);
        }

        .consultant-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .consultant-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            font-weight: 700;
            font-family: var(--font-display);
            flex-shrink: 0;
        }

        .promise-badge {
            display: inline-flex;
            align-items: center;
            gap: .375rem;
            background: rgba(15, 118, 110, .08);
            border: 1px solid rgba(15, 118, 110, .2);
            color: var(--color-accent);
            font-size: .8125rem;
            font-weight: 600;
            padding: .375rem .75rem;
            border-radius: 9999px;
            margin-top: .5rem;
        }

        /* ── Conditional honeymoon field ─────────────────── */
        #honeymoon-extra {
            display: none;
        }

        #honeymoon-extra.visible {
            display: block;
        }

        /* ── Honeypot ─────────────────────────────────────── */
        .honeypot {
            position: absolute !important;
            left: -9999px !important;
            width: 1px !important;
            height: 1px !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* ── Spinner ──────────────────────────────────────── */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .spinner {
            display: inline-block;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid rgba(255, 255, 255, .3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin .6s linear infinite;
        }

        /* ── Responsive grid helpers ──────────────────────── */
        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .three-col {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1.25rem;
        }

        @media (max-width: 640px) {

            .two-col,
            .three-col {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="min-h-screen">

        {{-- ════ HERO ════ --}}
        <div class="hero-gradient relative py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto text-center relative z-10">
                <div class="absolute top-10 left-10 w-20 h-20 opacity-20 floating" style="animation-delay:0s">
                    <svg viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="40" stroke="white" stroke-width="2" />
                        <path d="M50 20L60 40L80 45L65 60L68 80L50 70L32 80L35 60L20 45L40 40L50 20Z" fill="white" />
                    </svg>
                </div>
                <div class="absolute bottom-10 right-10 w-16 h-16 opacity-20 floating" style="animation-delay:1.5s">
                    <svg viewBox="0 0 100 100" fill="none">
                        <rect x="20" y="20" width="60" height="60" stroke="white" stroke-width="2" rx="8" />
                        <circle cx="50" cy="50" r="15" fill="white" />
                    </svg>
                </div>
                <div class="animate-fade-in">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    {{-- ✦ UPDATED header copy --}}
                    <h1
                        style="font-family:var(--font-display);font-size:3rem;font-weight:700;color:white;line-height:1.1;margin-bottom:1rem;">
                        Let's Start Designing Your Perfect Escape
                    </h1>
                    <p style="font-size:1.125rem;color:rgba(255,255,255,.9);max-width:42rem;margin:0 auto;">
                        Share your travel dreams with us and we'll craft the perfect itinerary tailored to your preferences
                    </p>
                </div>
            </div>
        </div>

        @include('feedback')

        {{-- ════ MAIN CARD ════ --}}
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 pb-20 relative z-20">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden" style="border:1px solid #e2e8f0;">

                <form action="{{ route('book-travel-agency') }}" method="POST" id="booking-form">
                    @csrf

                    {{-- Honeypot --}}
                    <div class="honeypot" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="form_type" value="scheduled_trip">

                    {{-- Progress bar --}}
                    <div class="progress-bar">
                        <div class="progress-fill" id="progress" style="width:33.33%"></div>
                    </div>

                    {{-- ── Step indicators ── --}}
                    <div class="step-indicators">
                        <div class="step-item active" id="step-indicator-1">
                            <div class="step-circle active" id="step-circle-1">1</div>
                            <span class="step-label">The Vision</span>
                        </div>
                        <div class="step-item" id="step-indicator-2">
                            <div class="step-circle" id="step-circle-2">2</div>
                            <span class="step-label">The Details</span>
                        </div>
                        <div class="step-item" id="step-indicator-3">
                            <div class="step-circle" id="step-circle-3">3</div>
                            <span class="step-label">The Connection</span>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════
                     STEP 1 — The Vision  (destination, dates, trip type, budget)
                ══════════════════════════════════════════ --}}
                    <div class="form-step active" id="step-1">
                        <div class="p-6 sm:p-8 space-y-8">

                            {{-- Section header --}}
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 si-teal">
                                    <svg class="w-6 h-6" style="color:var(--color-accent)" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2
                                        style="font-family:var(--font-display);font-size:1.75rem;font-weight:700;color:var(--color-primary);margin-bottom:.25rem;">
                                        Travel Destination & Dates</h2>
                                    <p style="color:#64748b;font-size:.9375rem;">Where would you like to explore and when?
                                    </p>
                                </div>
                            </div>

                            {{-- Destination --}}
                            <div>
                                <label for="destination" class="block text-sm font-semibold mb-2"
                                    style="color:var(--color-primary);">
                                    Destination of Interest <span style="color:#ef4444">*</span>
                                </label>
                                <select id="destination" name="destination" class="form-input"
                                    onchange="toggleOtherField(this,'destination-other-wrapper'); handleHoneymoon();"
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
                                    <input type="text" name="destination_other" class="form-input"
                                        placeholder="Please specify your destination">
                                </div>
                                @error('destination')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Dates --}}
                            <div class="two-col">
                                <div>
                                    <label for="departure_date" class="block text-sm font-semibold mb-2"
                                        style="color:var(--color-primary);">
                                        Departure Date <span style="color:#ef4444">*</span>
                                    </label>
                                    <input type="date" id="departure_date" name="departure_date"
                                        value="{{ old('departure_date') }}" class="form-input" min="{{ date('Y-m-d') }}"
                                        required>
                                    @error('departure_date')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="return_date" class="block text-sm font-semibold mb-2"
                                        style="color:var(--color-primary);">Return Date</label>
                                    <input type="date" id="return_date" name="return_date"
                                        value="{{ old('return_date') }}" class="form-input" min="{{ date('Y-m-d') }}">
                                    <p id="trip-duration" class="text-sm mt-2 font-medium"
                                        style="color:var(--color-accent)"></p>
                                    @error('return_date')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Trip type + Budget --}}
                            <div class="two-col">
                                <div>
                                    <label for="trip_type" class="block text-sm font-semibold mb-2"
                                        style="color:var(--color-primary);">Trip Type</label>
                                    <select id="trip_type" name="trip_type" class="form-input"
                                        onchange="toggleOtherField(this,'trip-type-other-wrapper'); handleHoneymoon();">
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
                                        <input type="text" name="trip_type_other" class="form-input"
                                            placeholder="Please specify trip type">
                                    </div>
                                    @error('trip_type')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="budget" class="block text-sm font-semibold mb-2"
                                        style="color:var(--color-primary);">
                                        Approximate Budget Per Person (GBP) <span style="color:#ef4444">*</span>
                                    </label>
                                    <select id="budget" name="budget" class="form-input" required>
                                        <option value="">Select your budget range</option>
                                        <option value="budget">£500 – £1,500 (Budget-Friendly)</option>
                                        <option value="moderate">£1,500 – £3,000 (Moderate)</option>
                                        <option value="premium">£3,000 – £5,000 (Premium)</option>
                                        <option value="luxury">£5,000+ (Luxury)</option>
                                    </select>
                                    @error('budget')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Flexible dates --}}
                            <div>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" name="flexible_dates" value="yes" class="custom-checkbox">
                                    <span class="text-sm font-medium group-hover:text-teal-700 transition"
                                        style="color:var(--color-primary);">My travel dates are flexible</span>
                                </label>
                            </div>

                            {{-- ✦ NEW: Conditional honeymoon / romantic field --}}
                            <div id="honeymoon-extra" class="p-5 rounded-xl"
                                style="background:linear-gradient(135deg,rgba(212,165,116,.06) 0%,rgba(212,165,116,.12) 100%);border:1px solid rgba(212,165,116,.35);">
                                <label for="honeymoon_details" class="block text-sm font-semibold mb-2"
                                    style="color:var(--color-primary);">
                                    🥂 Any special surprises or anniversary details we should know?
                                </label>
                                <textarea id="honeymoon_details" name="honeymoon_details" rows="3" class="form-input resize-none"
                                    placeholder="e.g. Surprise proposal setup, anniversary decorations, private dining, petal turndown service…">{{ old('honeymoon_details') }}</textarea>
                            </div>

                            {{-- Step 1 nav --}}
                            <div class="flex justify-end pt-2">
                                <button type="button" class="btn-next" onclick="goToStep(2)">
                                    Next: The Details
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════
                     STEP 2 — The Details  (travelers, accommodation, insurance, services, special requests)
                ══════════════════════════════════════════ --}}
                    <div class="form-step" id="step-2">
                        <div class="p-6 sm:p-8 space-y-8">

                            {{-- Travelers --}}
                            <div>
                                <div class="flex items-start gap-4 mb-5">
                                    <div
                                        class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 si-gold">
                                        <svg class="w-6 h-6" style="color:var(--color-gold)" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2
                                            style="font-family:var(--font-display);font-size:1.75rem;font-weight:700;color:var(--color-primary);margin-bottom:.25rem;">
                                            Travelers & Accommodation</h2>
                                        <p style="color:#64748b;font-size:.9375rem;">Tell us about your travel party and
                                            stay preferences</p>
                                    </div>
                                </div>

                                <div class="three-col mb-5">
                                    <div>
                                        <label for="adults" class="block text-sm font-semibold mb-2"
                                            style="color:var(--color-primary);">Adults (18+) <span
                                                style="color:#ef4444">*</span></label>
                                        <input type="number" id="adults" name="adults"
                                            value="{{ old('adults', 1) }}" min="1" class="form-input" required>
                                        @error('adults')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="children" class="block text-sm font-semibold mb-2"
                                            style="color:var(--color-primary);">Children (2–17)</label>
                                        <input type="number" id="children" name="children"
                                            value="{{ old('children', 0) }}" min="0" class="form-input">
                                        @error('children')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="infants" class="block text-sm font-semibold mb-2"
                                            style="color:var(--color-primary);">Infants (0–2)</label>
                                        <input type="number" id="infants" name="infants"
                                            value="{{ old('infants', 0) }}" min="0" class="form-input">
                                        @error('infants')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="accommodation" class="block text-sm font-semibold mb-2"
                                        style="color:var(--color-primary);">Preferred Accommodation</label>
                                    <select id="accommodation" name="accommodation" class="form-input"
                                        onchange="toggleOtherField(this,'accommodation-other-wrapper')">
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
                                        <input type="text" name="accommodation_other" class="form-input"
                                            placeholder="Please specify accommodation type">
                                    </div>
                                    @error('accommodation')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Insurance --}}
                            <div>
                                <div class="flex items-start gap-4 mb-5">
                                    <div
                                        class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 si-teal">
                                        <svg class="w-6 h-6" style="color:var(--color-accent)" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2
                                            style="font-family:var(--font-display);font-size:1.75rem;font-weight:700;color:var(--color-primary);margin-bottom:.25rem;">
                                            Insurance & Additional Services</h2>
                                        <p style="color:#64748b;font-size:.9375rem;">Protect your trip and enhance your
                                            experience</p>
                                    </div>
                                </div>

                                <div class="p-5 rounded-xl mb-5" style="background:white;border:2px solid #e2e8f0;">
                                    <label class="block text-sm font-semibold mb-3"
                                        style="color:var(--color-primary);">Travel Insurance <span
                                            style="color:#ef4444">*</span></label>
                                    <div class="flex gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="insurance" value="yes"
                                                class="w-4 h-4 text-teal-600" required>
                                            <span class="text-sm font-medium" style="color:var(--color-primary);">Yes, I
                                                want insurance</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="insurance" value="no"
                                                class="w-4 h-4 text-teal-600">
                                            <span class="text-sm font-medium" style="color:var(--color-primary);">No, I'll
                                                waive insurance</span>
                                        </label>
                                    </div>
                                    <p class="text-xs mt-2" style="color:#64748b;">Note: If you decline insurance, a
                                        signed waiver will be required before travel.</p>
                                </div>

                                <label class="block text-sm font-semibold mb-3" style="color:var(--color-primary);">Select
                                    Additional Services (Optional)</label>
                                <div class="grid sm:grid-cols-2 gap-3">
                                    <label class="service-card flex items-start p-4 rounded-xl">
                                        <input type="checkbox" name="services[]" value="airport-transfer"
                                            class="custom-checkbox mt-0.5">
                                        <div class="ml-3">
                                            <div class="font-semibold text-sm" style="color:var(--color-primary);">Airport
                                                Transfer</div>
                                            <p class="text-xs mt-0.5" style="color:#64748b;">Private door-to-door service
                                            </p>
                                        </div>
                                    </label>
                                    <label class="service-card flex items-start p-4 rounded-xl">
                                        <input type="checkbox" name="services[]" value="guided-tours"
                                            class="custom-checkbox mt-0.5">
                                        <div class="ml-3">
                                            <div class="font-semibold text-sm" style="color:var(--color-primary);">Guided
                                                Tours</div>
                                            <p class="text-xs mt-0.5" style="color:#64748b;">Expert local guides &
                                                experiences</p>
                                        </div>
                                    </label>
                                    <label class="service-card flex items-start p-4 rounded-xl">
                                        <input type="checkbox" name="services[]" value="car-rental"
                                            class="custom-checkbox mt-0.5">
                                        <div class="ml-3">
                                            <div class="font-semibold text-sm" style="color:var(--color-primary);">Car
                                                Rental</div>
                                            <p class="text-xs mt-0.5" style="color:#64748b;">Explore at your own pace</p>
                                        </div>
                                    </label>
                                    <label class="service-card flex items-start p-4 rounded-xl">
                                        <input type="checkbox" name="services[]" value="visa-assistance"
                                            class="custom-checkbox mt-0.5">
                                        <div class="ml-3">
                                            <div class="font-semibold text-sm" style="color:var(--color-primary);">Visa
                                                Assistance</div>
                                            <p class="text-xs mt-0.5" style="color:#64748b;">Help with visa applications
                                            </p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- Special Requests --}}
                            <div>
                                <div class="flex items-start gap-4 mb-5">
                                    <div
                                        class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 si-purple">
                                        <svg class="w-6 h-6" style="color:#8b5cf6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2
                                            style="font-family:var(--font-display);font-size:1.75rem;font-weight:700;color:var(--color-primary);margin-bottom:.25rem;">
                                            Special Requests & Preferences</h2>
                                        <p style="color:#64748b;font-size:.9375rem;">Share any special requirements or
                                            preferences to personalise your trip</p>
                                    </div>
                                </div>
                                <textarea id="special_requests" name="special_requests" rows="5" class="form-input resize-none"
                                    placeholder="Please tell us about:&#10;• Dietary requirements or food allergies&#10;• Accessibility needs or mobility considerations&#10;• Special celebrations (birthday, anniversary, honeymoon)&#10;• Activities or experiences you'd like to include&#10;• Any other preferences or concerns we should know about">{{ old('special_requests') }}</textarea>
                                @error('special_requests')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Step 2 nav --}}
                            <div class="flex justify-between pt-2">
                                <button type="button" class="btn-prev" onclick="goToStep(1, true)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn-next" onclick="goToStep(3)">
                                    Next: Your Details
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════
                     STEP 3 — The Connection  (personal info + trust sidebar)
                ══════════════════════════════════════════ --}}
                    <div class="form-step" id="step-3">
                        <div class="p-6 sm:p-8 space-y-8">

                            {{-- Two-column: form left, trust right --}}
                            <div class="grid lg:grid-cols-5 gap-8">

                                {{-- LEFT: personal info --}}
                                <div class="lg:col-span-3 space-y-5">
                                    <div class="flex items-start gap-4 mb-5">
                                        <div
                                            class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 si-teal">
                                            <svg class="w-6 h-6" style="color:var(--color-accent)" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h2
                                                style="font-family:var(--font-display);font-size:1.75rem;font-weight:700;color:var(--color-primary);margin-bottom:.25rem;">
                                                Personal Information</h2>
                                            <p style="color:#64748b;font-size:.9375rem;">Let us know who we'll be helping
                                                plan this amazing journey</p>
                                        </div>
                                    </div>

                                    <div class="two-col">
                                        <div>
                                            <label for="full_name" class="block text-sm font-semibold mb-2"
                                                style="color:var(--color-primary);">Full Name <span
                                                    style="color:#ef4444">*</span></label>
                                            <input type="text" id="full_name" name="full_name"
                                                value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                                class="form-input" placeholder="Enter your full name" required>
                                            @error('full_name')
                                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-semibold mb-2"
                                                style="color:var(--color-primary);">Email Address <span
                                                    style="color:#ef4444">*</span></label>
                                            <input type="email" id="email" name="email"
                                                value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                                class="form-input" placeholder="your@email.com" required>
                                            @error('email')
                                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="two-col">
                                        <div>
                                            <label for="phone" class="block text-sm font-semibold mb-2"
                                                style="color:var(--color-primary);">Phone Number <span
                                                    style="color:#ef4444">*</span></label>
                                            <input type="tel" id="phone" name="phone"
                                                value="{{ old('phone', auth()->check() ? auth()->user()->phone : '') }}"
                                                class="form-input" placeholder="+44 7700 900000" required>
                                            @error('phone')
                                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="address" class="block text-sm font-semibold mb-2"
                                                style="color:var(--color-primary);">Address</label>
                                            <input type="text" id="address" name="address"
                                                value="{{ old('address', auth()->check() ? auth()->user()->address : '') }}"
                                                class="form-input" placeholder="Your full address">
                                            @error('address')
                                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- ✦ NEW: Preferred contact method --}}
                                    <div>
                                        <label class="block text-sm font-semibold mb-2"
                                            style="color:var(--color-primary);">Preferred Contact Method</label>
                                        <div class="grid grid-cols-3 gap-3">
                                            <label
                                                class="service-card flex flex-col items-center justify-center gap-1 p-3 rounded-xl text-center"
                                                id="contact-whatsapp">
                                                <input type="radio" name="contact_method" value="whatsapp"
                                                    class="sr-only">
                                                <span style="font-size:1.375rem">💬</span>
                                                <span class="text-xs font-semibold"
                                                    style="color:var(--color-primary)">WhatsApp</span>
                                            </label>
                                            <label
                                                class="service-card flex flex-col items-center justify-center gap-1 p-3 rounded-xl text-center"
                                                id="contact-phone">
                                                <input type="radio" name="contact_method" value="phone"
                                                    class="sr-only">
                                                <span style="font-size:1.375rem">📞</span>
                                                <span class="text-xs font-semibold"
                                                    style="color:var(--color-primary)">Phone Call</span>
                                            </label>
                                            <label
                                                class="service-card flex flex-col items-center justify-center gap-1 p-3 rounded-xl text-center"
                                                id="contact-email">
                                                <input type="radio" name="contact_method" value="email"
                                                    class="sr-only">
                                                <span style="font-size:1.375rem">✉️</span>
                                                <span class="text-xs font-semibold"
                                                    style="color:var(--color-primary)">Email</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- RIGHT: trust sidebar --}}
                                <div class="lg:col-span-2 space-y-4">

                                    {{-- ✦ NEW: Consultant bio --}}
                                    <div class="consultant-card">
                                        <div class="consultant-avatar">S</div>
                                        <div>
                                            <p class="text-xs font-semibold uppercase tracking-wider mb-0.5"
                                                style="color:var(--color-accent)">Meet Your Travel Consultant</p>
                                            <p class="font-semibold text-sm" style="color:var(--color-primary)">Nathaniel
                                            </p>
                                            <p class="text-xs" style="color:#64748b">Passionate travel consultant creating
                                                memorable, tailored trips with care, creativity, and attention to detail.
                                            </p>
                                            <span class="promise-badge">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Responds within 24 hours
                                            </span>
                                        </div>
                                    </div>

                                    {{-- ✦ NEW: Testimonial --}}
                                    <div class="trust-card">
                                        <div class="flex gap-0.5 mb-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg class="w-4 h-4" style="color:var(--color-gold)" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <blockquote>"Globe Trotting planned our Maldives honeymoon flawlessly. Every detail
                                            was taken care of — we just had to show up and enjoy ourselves."</blockquote>
                                        <p class="reviewer">— James & Emma T., London</p>
                                    </div>


                                    {{-- <div class="p-4 rounded-xl flex items-start gap-3"
                                        style="background:rgba(15,118,110,.06);border:1px solid rgba(15,118,110,.15);">
                                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:var(--color-accent)"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="text-sm font-semibold" style="color:var(--color-primary)">The
                                                24-Hour Promise</p>
                                            <p class="text-xs mt-0.5" style="color:#64748b">We usually respond with a
                                                personalised quote and itinerary outline within 24 hours of receiving your
                                                request.</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            {{-- Marketing consent (optional — no required attribute) --}}
                            <div class="p-5 rounded-xl" style="background:white;border:2px solid #e2e8f0;">
                                <div class="flex items-start gap-3">
                                    <input type="checkbox" name="marketing_consent" value="1"
                                        class="custom-checkbox mt-1" id="marketing_consent">
                                    <label for="marketing_consent" class="flex-1 cursor-pointer">
                                        <span class="block text-sm font-semibold mb-1"
                                            style="color:var(--color-primary);">Stay Inspired: Subscribe to Our Travel
                                            Newsletter</span>
                                        <p class="text-xs leading-relaxed" style="color:#64748b;">
                                            Receive exclusive travel deals, destination guides, and insider tips delivered
                                            to your inbox.
                                            You can unsubscribe at any time. We respect your privacy and will never share
                                            your information with third parties.
                                        </p>
                                    </label>
                                </div>
                            </div>

                            {{-- reCAPTCHA notice --}}
                            <div class="flex justify-center items-center gap-2 p-4 rounded-xl"
                                style="background:rgba(15,118,110,.05);border:1px solid rgba(15,118,110,.1);">
                                <svg class="w-5 h-5 flex-shrink-0" style="color:var(--color-accent)" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <p class="text-xs" style="color:#64748b;">
                                    This site is protected by reCAPTCHA and the Google
                                    <a href="https://policies.google.com/privacy" target="_blank" class="underline"
                                        style="color:var(--color-accent)">Privacy Policy</a> and
                                    <a href="https://policies.google.com/terms" target="_blank" class="underline"
                                        style="color:var(--color-accent)">Terms of Service</a> apply.
                                </p>
                            </div>
                            @error('g-recaptcha-response')
                                <p class="text-red-600 text-sm text-center">{{ $message }}</p>
                            @enderror

                            <p class="text-xs text-center" style="color:#64748b;">
                                By submitting this form, you agree to our
                                <a href="#" class="font-medium hover:underline"
                                    style="color:var(--color-accent)">Terms of Service</a> and
                                <a href="#" class="font-medium hover:underline"
                                    style="color:var(--color-accent)">Privacy Policy</a>.
                                Your information is secure and will only be used to process your booking request.
                            </p>

                            {{-- Step 3 back button --}}
                            <div class="flex justify-start pt-2">
                                <button type="button" class="btn-prev" onclick="goToStep(2, true)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                    </svg>
                                    Back
                                </button>
                            </div>
                        </div>

                        {{-- Submit footer --}}
                        <div class="p-6 sm:p-8"
                            style="background:linear-gradient(135deg,var(--color-accent) 0%,var(--color-accent-light) 100%);">
                            <div class="max-w-2xl mx-auto text-center mb-6">
                                <h3
                                    style="font-family:var(--font-display);font-size:1.5rem;font-weight:700;color:white;margin-bottom:.5rem;">
                                    Ready to Embark on Your Adventure?
                                </h3>
                                <p style="font-size:.9375rem;color:rgba(255,255,255,.95);">
                                    We'll review your request and contact you within 24 hours with a personalised quote and
                                    itinerary
                                </p>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" id="submit-button" class="btn-submit">
                                    {{-- ✦ UPDATED button copy --}}
                                    <span id="button-text">Get My Personalised Itinerary</span>
                                    <svg id="button-icon" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    <span id="button-spinner" class="spinner hidden"></span>
                                </button>
                            </div>
                            <div class="mt-6 flex items-center justify-center gap-6 text-sm"
                                style="color:rgba(255,255,255,.9);">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Secure & Encrypted
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
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

    {{-- reCAPTCHA v3 --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}" async defer></script>

    <script>
        // ── Step navigation ────────────────────────────────────────────────────────────
        let currentStep = 1;
        const totalSteps = 3;

        function goToStep(step, goingBack = false) {
            const current = document.getElementById('step-' + currentStep);
            current.classList.remove('active', 'going-back');
            current.style.display = 'none';

            const target = document.getElementById('step-' + step);
            target.style.display = 'block';
            void target.offsetWidth; // force reflow for animation restart
            if (goingBack) target.classList.add('going-back');
            target.classList.add('active');

            currentStep = step;
            updateIndicators();
            updateProgress();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function updateIndicators() {
            for (let i = 1; i <= totalSteps; i++) {
                const indicator = document.getElementById('step-indicator-' + i);
                const circle = document.getElementById('step-circle-' + i);
                indicator.classList.remove('active', 'completed');
                circle.classList.remove('active', 'completed');

                if (i < currentStep) {
                    indicator.classList.add('completed');
                    circle.classList.add('completed');
                    circle.innerHTML = '✓';
                } else if (i === currentStep) {
                    indicator.classList.add('active');
                    circle.classList.add('active');
                    circle.innerHTML = i;
                } else {
                    circle.innerHTML = i;
                }
            }
        }

        function updateProgress() {
            document.getElementById('progress').style.width = ((currentStep / totalSteps) * 100) + '%';
        }

        // ── Toggle "other" text inputs ──────────────────────────────────────────────
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

        // ── Conditional honeymoon / romantic field ──────────────────────────────────
        function handleHoneymoon() {
            const tripType = document.getElementById('trip_type').value;
            const destination = document.getElementById('destination').value;
            const extra = document.getElementById('honeymoon-extra');
            const isRomantic = tripType === 'honeymoon' || destination === 'maldives' || destination === 'santorini';
            extra.classList.toggle('visible', isRomantic);
        }

        // ── DOMContentLoaded ─────────────────────────────────────────────────────────
        document.addEventListener('DOMContentLoaded', function() {

            // Trip duration display
            const dep = document.getElementById('departure_date');
            const ret = document.getElementById('return_date');
            const dur = document.getElementById('trip-duration');

            function calcDuration() {
                if (dep.value && ret.value) {
                    const nights = Math.ceil(Math.abs(new Date(ret.value) - new Date(dep.value)) / 86400000);
                    dur.textContent = nights > 0 ? '✓ ' + nights + ' night' + (nights > 1 ? 's' : '') : '';
                }
            }
            dep.addEventListener('change', calcDuration);
            ret.addEventListener('change', calcDuration);

            // Contact method radio visual highlight
            document.querySelectorAll('input[name="contact_method"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    document.querySelectorAll('input[name="contact_method"]').forEach(function(r) {
                        r.closest('label').style.borderColor = '';
                        r.closest('label').style.background = '';
                    });
                    this.closest('label').style.borderColor = 'var(--color-accent)';
                    this.closest('label').style.background = 'rgba(15,118,110,0.07)';
                });
            });

            // reCAPTCHA v3 + form submit
            const form = document.getElementById('booking-form');
            const submitBtn = document.getElementById('submit-button');
            const btnText = document.getElementById('button-text');
            const btnIcon = document.getElementById('button-icon');
            const btnSpin = document.getElementById('button-spinner');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    submitBtn.disabled = true;
                    btnText.textContent = 'Processing…';
                    btnIcon.classList.add('hidden');
                    btnSpin.classList.remove('hidden');

                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                            action: 'booking_submit'
                        }).then(function(token) {
                            let inp = form.querySelector(
                                'input[name="g-recaptcha-response"]');
                            if (!inp) {
                                inp = document.createElement('input');
                                inp.type = 'hidden';
                                inp.name = 'g-recaptcha-response';
                                form.appendChild(inp);
                            }
                            inp.value = token;
                            form.submit();
                        }).catch(function(err) {
                            submitBtn.disabled = false;
                            btnText.textContent = 'Get My Personalised Itinerary';
                            btnIcon.classList.remove('hidden');
                            btnSpin.classList.add('hidden');
                            alert('reCAPTCHA verification failed. Please try again.');
                            console.error('reCAPTCHA error:', err);
                        });
                    });
                });
            }

            // Scroll to first validation error on load
            const firstErr = document.querySelector('.text-red-600');
            if (firstErr) setTimeout(function() {
                firstErr.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 100);
        });
    </script>
@endsection
