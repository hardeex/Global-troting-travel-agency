@extends('user.base')

@section('title', 'My Bookings')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;600;700&family=DM+Sans:wght@400;500;600&display=swap');
    
    :root {
        --font-display: 'Crimson Pro', serif;
        --font-body: 'DM Sans', sans-serif;
        --color-primary: #1a1a1a;
        --color-accent: #8b7355;
        --color-accent-light: #a89179;
        --color-bg: #fafaf9;
        --color-surface: #ffffff;
        --color-border: #e7e5e4;
        --color-text: #292524;
        --color-text-muted: #78716c;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    }
    
    body {
        font-family: var(--font-body);
        background: var(--color-bg);
    }
    
    .display-font {
        font-family: var(--font-display);
    }
    
    /* Fade in animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    /* Stagger children animations */
    .stagger-children > * {
        opacity: 0;
        animation: fadeInUp 0.5s ease-out forwards;
    }
    
    .stagger-children > *:nth-child(1) { animation-delay: 0.05s; }
    .stagger-children > *:nth-child(2) { animation-delay: 0.1s; }
    .stagger-children > *:nth-child(3) { animation-delay: 0.15s; }
    .stagger-children > *:nth-child(4) { animation-delay: 0.2s; }
    .stagger-children > *:nth-child(5) { animation-delay: 0.25s; }
    .stagger-children > *:nth-child(6) { animation-delay: 0.3s; }
    .stagger-children > *:nth-child(7) { animation-delay: 0.35s; }
    .stagger-children > *:nth-child(8) { animation-delay: 0.4s; }
    .stagger-children > *:nth-child(9) { animation-delay: 0.45s; }
    .stagger-children > *:nth-child(10) { animation-delay: 0.5s; }
    
    /* Modal animations */
    @keyframes modalFadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes modalSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .modal-backdrop {
        animation: modalFadeIn 0.2s ease-out;
    }
    
    .modal-content {
        animation: modalSlideUp 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    
    /* Custom scrollbar for modal */
    .custom-scroll::-webkit-scrollbar {
        width: 8px;
    }
    
    .custom-scroll::-webkit-scrollbar-track {
        background: #f5f5f4;
        border-radius: 4px;
    }
    
    .custom-scroll::-webkit-scrollbar-thumb {
        background: #d6d3d1;
        border-radius: 4px;
    }
    
    .custom-scroll::-webkit-scrollbar-thumb:hover {
        background: #a8a29e;
    }
    
    /* Booking card hover effects */
    .booking-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .booking-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Badge styles */
    .badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.025em;
    }
    
    .badge-spam {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }
    
    .badge-user {
        background: #f0fdf4;
        color: #166534;
        border: 1px solid #bbf7d0;
    }
    
    .badge-guest {
        background: #fef3c7;
        color: #92400e;
        border: 1px solid #fde68a;
    }
    
    /* Type badges */
    .type-badge {
        display: inline-block;
        padding: 0.375rem 0.875rem;
        border-radius: 0.375rem;
        font-size: 0.8125rem;
        font-weight: 500;
        background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
        color: white;
        text-transform: capitalize;
        letter-spacing: 0.025em;
    }
    
    /* Empty state illustration */
    .empty-state-icon {
        background: linear-gradient(135deg, #fafaf9 0%, #f5f5f4 100%);
        border: 2px solid var(--color-border);
    }
    
    /* Detail row in modal */
    .detail-row {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: 1rem;
        padding: 0.875rem 0;
        border-bottom: 1px solid #f5f5f4;
    }
    
    .detail-row:last-child {
        border-bottom: none;
    }
    
    .detail-label {
        font-weight: 500;
        color: var(--color-text-muted);
        font-size: 0.875rem;
    }
    
    .detail-value {
        color: var(--color-text);
        font-size: 0.9375rem;
    }
</style>

<div class="min-h-screen py-8 px-4 sm:py-12 sm:px-6 lg:px-8" style="background: linear-gradient(to bottom, #fafaf9 0%, #ffffff 100%);">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <div class="mb-10 animate-fade-in">
            <div class="flex items-end justify-between flex-wrap gap-4">
                <div>
                    <p class="text-sm font-medium tracking-wide uppercase" style="color: var(--color-accent); letter-spacing: 0.1em;">
                        Travel Dashboard
                    </p>
                    <h1 class="display-font text-4xl sm:text-5xl font-bold mt-2" style="color: var(--color-primary); line-height: 1.1;">
                        My Bookings
                    </h1>
                    <p class="mt-3 text-base sm:text-lg" style="color: var(--color-text-muted); max-width: 42rem;">
                        Welcome back, <span class="font-semibold" style="color: var(--color-text);">{{ $user->name ?? 'User' }}</span>. 
                        Track your travel requests and inquiries all in one place.
                    </p>
                </div>
                
                <a href="{{ route('contact') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-lg font-medium text-sm transition-all hover:scale-105 hover:shadow-md"
                   style="background: var(--color-primary); color: white; box-shadow: var(--shadow-sm);">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Request
                </a>
            </div>
            
            <!-- Decorative line -->
            <div class="mt-8 h-px" style="background: linear-gradient(to right, var(--color-accent), transparent);"></div>
        </div>

        @if($submissions->isEmpty())
            <!-- Empty State -->
            <div class="bg-white rounded-2xl p-12 sm:p-16 text-center animate-fade-in" style="box-shadow: var(--shadow-md); border: 1px solid var(--color-border);">
                <div class="empty-state-icon mx-auto w-20 h-20 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10" style="color: var(--color-accent);" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="display-font mt-6 text-2xl font-semibold" style="color: var(--color-primary);">
                    Your Journey Awaits
                </h3>
                <p class="mt-3 text-base max-w-md mx-auto" style="color: var(--color-text-muted);">
                    Start planning your next adventure. Submit a booking request for flights, hotels, car rentals, or custom packages.
                </p>
                <div class="mt-8">
                    <a href="{{ route('index') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-lg font-medium transition-all hover:scale-105"
                       style="background: var(--color-primary); color: white; box-shadow: var(--shadow-md);">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Your First Request
                    </a>
                </div>
            </div>
        @else
            <!-- Bookings Grid -->
            <div class="stagger-children grid gap-5 sm:gap-6">
                @foreach($submissions as $submission)
                    <div class="booking-card bg-white rounded-xl overflow-hidden" 
                         style="box-shadow: var(--shadow-sm); border: 1px solid var(--color-border);">
                        <div class="p-5 sm:p-6">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                
                                <!-- Left Section: Type and Key Info -->
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 flex-wrap">
                                        <span class="type-badge">
                                            {{ str_replace('_', ' ', $submission->payload['booking_type'] ?? 'Inquiry') }}
                                        </span>
                                        
                                        @if($submission->is_spam)
                                            <span class="badge badge-spam">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                </svg>
                                                Flagged
                                            </span>
                                        @elseif($submission->user_id)
                                            <span class="badge badge-user">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                </svg>
                                                Verified
                                            </span>
                                        @else
                                            <span class="badge badge-guest">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                Guest
                                            </span>
                                        @endif
                                        
                                        <span class="text-xs font-medium" style="color: var(--color-text-muted);">
                                            {{ $submission->created_at->format('M d, Y') }} 
                                            <span style="color: var(--color-border);">•</span> 
                                            {{ $submission->created_at->format('g:i A') }}
                                        </span>
                                    </div>
                                    
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-baseline gap-2">
                                            <span class="text-xs font-medium uppercase tracking-wide" style="color: var(--color-text-muted);">Contact:</span>
                                            <span class="font-medium" style="color: var(--color-text);">
                                                {{ $submission->payload['name'] ?? '—' }}
                                            </span>
                                        </div>
                                        <div class="flex items-baseline gap-2">
                                            <span class="text-xs font-medium uppercase tracking-wide" style="color: var(--color-text-muted);">Email:</span>
                                            <span class="text-sm" style="color: var(--color-text-muted);">
                                                {{ $submission->email ?? $submission->payload['email'] ?? '—' }}
                                            </span>
                                        </div>
                                        
                                        @if(!empty($submission->payload['message']))
                                            <div class="mt-3 pt-3" style="border-top: 1px solid var(--color-border);">
                                                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">
                                                    {{ Str::limit($submission->payload['message'], 140) }}
                                                </p>
                                            </div>
                                        @endif
                                        
                                        <!-- Quick Preview for specific types -->
                                        @if($submission->payload['booking_type'] === 'car' && !empty($submission->payload['car_pickup_location']))
                                            <div class="mt-3 flex items-center gap-2 text-sm" style="color: var(--color-accent);">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span class="font-medium">
                                                    {{ $submission->payload['car_pickup_location'] }} 
                                                    → 
                                                    {{ $submission->payload['car_dropoff_location'] ?? 'Not specified' }}
                                                </span>
                                            </div>
                                        @elseif($submission->payload['booking_type'] === 'flight' && !empty($submission->payload['flight_departure']))
                                            <div class="mt-3 flex items-center gap-2 text-sm" style="color: var(--color-accent);">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z" />
                                                </svg>
                                                <span class="font-medium">
                                                    {{ $submission->payload['flight_departure'] }} 
                                                    → 
                                                    {{ $submission->payload['flight_arrival'] ?? 'Not specified' }}
                                                </span>
                                            </div>
                                        @elseif($submission->payload['booking_type'] === 'hotel' && !empty($submission->payload['hotel_location']))
                                            <div class="mt-3 flex items-center gap-2 text-sm" style="color: var(--color-accent);">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                                <span class="font-medium">{{ $submission->payload['hotel_location'] }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Right Section: Action Button -->
                                <div class="flex sm:flex-col gap-2">
                                    <button onclick="openModal({{ $submission->id }})" 
                                            class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-medium text-sm transition-all hover:scale-105"
                                            style="background: white; color: var(--color-primary); border: 1.5px solid var(--color-border); box-shadow: var(--shadow-sm);">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View Details
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($submissions->hasPages())
                <div class="mt-10 animate-fade-in">
                    {{ $submissions->links('pagination::tailwind') }}
                </div>
            @endif
        @endif

    </div>
</div>

<!-- Modal Container -->
<div id="modal-backdrop" class="hidden fixed inset-0 z-50 overflow-y-auto" style="background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(4px);" onclick="closeModalOnBackdrop(event)">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div id="modal-content" class="modal-content relative bg-white rounded-2xl w-full max-w-3xl" style="box-shadow: var(--shadow-xl);" onclick="event.stopPropagation()">
            <!-- Modal Header -->
            <div class="sticky top-0 z-10 bg-white rounded-t-2xl px-6 sm:px-8 py-6 flex items-center justify-between" style="border-bottom: 1px solid var(--color-border);">
                <div>
                    <h2 class="display-font text-2xl sm:text-3xl font-bold" style="color: var(--color-primary);">
                        Booking Details
                    </h2>
                    <p class="text-sm mt-1" style="color: var(--color-text-muted);">
                        Complete information about this request
                    </p>
                </div>
                <button onclick="closeModal()" class="p-2 rounded-lg transition-all hover:bg-gray-100">
                    <svg class="w-6 h-6" style="color: var(--color-text-muted);" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div id="modal-body" class="px-6 sm:px-8 py-6 custom-scroll" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                <!-- Content loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<script>
    const submissions = @json($submissions->items());
    
    function openModal(id) {
        const submission = submissions.find(s => s.id === id);
        if (!submission) return;
        
        const payload = submission.payload;
        const modalBody = document.getElementById('modal-body');
        const backdrop = document.getElementById('modal-backdrop');
        
        // Build the details HTML
        let detailsHtml = `
            <!-- Header Info -->
            <div class="mb-6 p-5 rounded-lg" style="background: linear-gradient(135deg, #fafaf9 0%, #f5f5f4 100%); border: 1px solid var(--color-border);">
                <div class="flex items-center gap-3 flex-wrap mb-4">
                    <span class="type-badge">${payload.booking_type ? payload.booking_type.replace(/_/g, ' ') : 'Inquiry'}</span>
                    ${submission.is_spam ? '<span class="badge badge-spam">Flagged as Spam</span>' : ''}
                    ${submission.user_id ? '<span class="badge badge-user">Verified User</span>' : '<span class="badge badge-guest">Guest Submission</span>'}
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                    <div>
                        <span class="font-medium" style="color: var(--color-text-muted);">Submitted:</span>
                        <span style="color: var(--color-text);">${new Date(submission.created_at).toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'})}</span>
                    </div>
                    <div>
                        <span class="font-medium" style="color: var(--color-text-muted);">IP Address:</span>
                        <span style="color: var(--color-text);">${submission.ip_address || '—'}</span>
                    </div>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="mb-6">
                <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Contact Information</h3>
                <div class="space-y-0">
                    ${createDetailRow('Name', payload.name)}
                    ${createDetailRow('Email', submission.email || payload.email)}
                    ${payload.phone ? createDetailRow('Phone', payload.phone) : ''}
                    ${payload.preferred_contact ? createDetailRow('Preferred Contact', payload.preferred_contact) : ''}
                    ${payload.message ? createDetailRow('Message', payload.message, true) : ''}
                </div>
            </div>
        `;
        
        // Type-specific details
        if (payload.booking_type === 'car') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Car Rental Details</h3>
                    <div class="space-y-0">
                        ${createDetailRow('Pickup Location', payload.car_pickup_location)}
                        ${createDetailRow('Dropoff Location', payload.car_dropoff_location)}
                        ${createDetailRow('Pickup Date', payload.car_pickup_date)}
                        ${createDetailRow('Dropoff Date', payload.car_dropoff_date)}
                        ${payload.driver_age ? createDetailRow('Driver Age', payload.driver_age) : ''}
                        ${payload.car_category ? createDetailRow('Car Category', payload.car_category) : ''}
                        ${payload.car_preferences ? createDetailRow('Preferences', payload.car_preferences, true) : ''}
                        ${payload.car_addons ? createDetailRow('Add-ons', payload.car_addons, true) : ''}
                    </div>
                </div>
            `;
        } else if (payload.booking_type === 'flight') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Flight Details</h3>
                    <div class="space-y-0">
                        ${createDetailRow('Departure', payload.flight_departure)}
                        ${createDetailRow('Arrival', payload.flight_arrival)}
                        ${createDetailRow('Departure Date', payload.flight_departure_date)}
                        ${payload.flight_return_date ? createDetailRow('Return Date', payload.flight_return_date) : ''}
                        ${createDetailRow('Adults', payload.flight_adults || '1')}
                        ${payload.flight_children ? createDetailRow('Children', payload.flight_children) : ''}
                        ${payload.cabin_preference ? createDetailRow('Cabin Preference', payload.cabin_preference) : ''}
                        ${payload.airline_preference ? createDetailRow('Airline Preference', payload.airline_preference) : ''}
                        ${payload.frequent_flyer_number ? createDetailRow('Frequent Flyer Number', payload.frequent_flyer_number) : ''}
                    </div>
                </div>
            `;
        } else if (payload.booking_type === 'hotel') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Hotel Details</h3>
                    <div class="space-y-0">
                        ${createDetailRow('Location', payload.hotel_location)}
                        ${createDetailRow('Check-in', payload.hotel_checkin)}
                        ${createDetailRow('Check-out', payload.hotel_checkout)}
                        ${createDetailRow('Rooms', payload.hotel_rooms || '1')}
                        ${createDetailRow('Guests', payload.hotel_guests || '1')}
                        ${payload.hotel_preferences ? createDetailRow('Preferences', payload.hotel_preferences, true) : ''}
                        ${payload.hotel_room_features ? createDetailRow('Room Features', payload.hotel_room_features, true) : ''}
                    </div>
                </div>
            `;
        } else if (payload.booking_type === 'activity') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Activity Details</h3>
                    <div class="space-y-0">
                        ${createDetailRow('Location', payload.activity_location)}
                        ${createDetailRow('Activity Type', payload.activity_type)}
                        ${createDetailRow('Date', payload.activity_date)}
                        ${createDetailRow('Number of People', payload.activity_people || '1')}
                    </div>
                </div>
            `;
        } else if (payload.booking_type === 'custom') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Custom Package Details</h3>
                    <div class="space-y-0">
                        ${createDetailRow('Destination', payload.custom_destination)}
                        ${createDetailRow('Start Date', payload.custom_start)}
                        ${createDetailRow('End Date', payload.custom_end)}
                        ${payload.custom_budget ? createDetailRow('Budget', payload.custom_budget) : ''}
                        ${payload.custom_style ? createDetailRow('Travel Style', payload.custom_style) : ''}
                    </div>
                </div>
            `;
        } else if (payload.booking_type === 'cruise') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Cruise Details</h3>
                    <div class="space-y-0">
                        ${payload.cruise_itinerary ? createDetailRow('Itinerary', payload.cruise_itinerary) : ''}
                        ${payload.cruise_length ? createDetailRow('Length (nights)', payload.cruise_length) : ''}
                        ${payload.cruise_departure_date ? createDetailRow('Departure Date', payload.cruise_departure_date) : ''}
                        ${payload.cruise_cabin_class ? createDetailRow('Cabin Class', payload.cruise_cabin_class) : ''}
                        ${payload.cruise_pre_post_nights ? createDetailRow('Pre/Post Nights', payload.cruise_pre_post_nights) : ''}
                        ${payload.cruise_beverage_plan ? createDetailRow('Beverage Plan', payload.cruise_beverage_plan) : ''}
                        ${payload.cruise_beverage_plan_type ? createDetailRow('Beverage Plan Type', payload.cruise_beverage_plan_type) : ''}
                        ${payload.cruise_preferences ? createDetailRow('Preferences', payload.cruise_preferences, true) : ''}
                    </div>
                </div>
            `;
        } else if (payload.booking_type === 'package_tour') {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Package Tour Details</h3>
                    <div class="space-y-0">
                        ${payload.package_countries ? createDetailRow('Countries', payload.package_countries) : ''}
                        ${payload.package_tour_type ? createDetailRow('Tour Type', payload.package_tour_type) : ''}
                        ${payload.package_activity_level ? createDetailRow('Activity Level', payload.package_activity_level) : ''}
                        ${payload.package_start_date ? createDetailRow('Start Date', payload.package_start_date) : ''}
                        ${payload.package_duration ? createDetailRow('Duration (days)', payload.package_duration) : ''}
                    </div>
                </div>
            `;
        }
        
        // Additional travel info
        if (payload.hotels_enjoyed || payload.cruises_resorts_enjoyed || payload.travel_activities) {
            detailsHtml += `
                <div class="mb-6">
                    <h3 class="display-font text-xl font-semibold mb-4" style="color: var(--color-primary);">Additional Travel Information</h3>
                    <div class="space-y-0">
                        ${payload.hotels_enjoyed ? createDetailRow('Hotels Enjoyed', payload.hotels_enjoyed, true) : ''}
                        ${payload.cruises_resorts_enjoyed ? createDetailRow('Cruises/Resorts Enjoyed', payload.cruises_resorts_enjoyed, true) : ''}
                        ${payload.travel_activities ? createDetailRow('Travel Activities', payload.travel_activities, true) : ''}
                    </div>
                </div>
            `;
        }
        
        // Marketing consent
        detailsHtml += `
            <div class="pt-4" style="border-top: 1px solid var(--color-border);">
                <div class="flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" style="color: ${submission.marketing_consent ? '#166534' : '#78716c'};" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span style="color: var(--color-text-muted);">
                        Marketing consent: <strong style="color: var(--color-text);">${submission.marketing_consent ? 'Yes' : 'No'}</strong>
                    </span>
                </div>
            </div>
        `;
        
        modalBody.innerHTML = detailsHtml;
        backdrop.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function createDetailRow(label, value, multiline = false) {
        if (!value) return '';
        
        return `
            <div class="detail-row">
                <div class="detail-label">${label}</div>
                <div class="detail-value ${multiline ? 'whitespace-pre-wrap' : ''}">${value}</div>
            </div>
        `;
    }
    
    function closeModal() {
        const backdrop = document.getElementById('modal-backdrop');
        backdrop.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    function closeModalOnBackdrop(event) {
        if (event.target.id === 'modal-backdrop') {
            closeModal();
        }
    }
    
    // Close on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>
@endsection