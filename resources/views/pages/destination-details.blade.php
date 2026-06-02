@extends('components.base')
@section('title', $destination->title . ' - ' . $destination->country)

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Hero Section with Image -->
<section class="relative h-[60vh] md:h-[70vh] overflow-hidden">
    @if($destination->image_url)
        <img src="{{ $destination->image_url }}" 
             alt="{{ $destination->title }}" 
             class="w-full h-full object-cover">
    @else
        <div class="w-full h-full bg-gradient-to-br {{ $destination->gradient ?? 'from-blue-400 to-indigo-500' }}"></div>
    @endif
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
    
    <!-- Content -->
    <div class="absolute inset-0 flex items-end">
        <div class="container mx-auto px-4 md:px-6 pb-12 md:pb-16">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-white/80">
                    <li><a href="{{ route('index') }}" class="hover:text-white transition">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('destinations') }}" class="hover:text-white transition">Destinations</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-white font-semibold">{{ $destination->title }}</li>
                </ol>
            </nav>

            <!-- Title and Country -->
            <div class="max-w-4xl">
                <div class="flex items-center text-sky-400 text-lg mb-3">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $destination->country }}
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
                    {{ $destination->title }}
                </h1>
                @if($destination->short_description)
                    <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
                        {{ $destination->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-12 md:py-20">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Left Column - Details -->
            <div class="lg:col-span-2">
                <!-- Key Information Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    @if($destination->price)
                        <div class="bg-sky-50 p-4 rounded-xl border border-sky-100 text-center">
                            <div class="w-12 h-12 bg-sky-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-sky-600 font-medium mb-1">From</p>
                            <p class="text-lg font-bold text-gray-900">£{{ number_format($destination->price) }}</p>
                        </div>
                    @endif

                    @if($destination->nights)
                        <div class="bg-purple-50 p-4 rounded-xl border border-purple-100 text-center">
                            <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-purple-600 font-medium mb-1">Duration</p>
                            <p class="text-lg font-bold text-gray-900">{{ $destination->nights }} Nights</p>
                        </div>
                    @endif

                    @if($destination->adults)
                        <div class="bg-green-50 p-4 rounded-xl border border-green-100 text-center">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-green-600 font-medium mb-1">Group</p>
                            <p class="text-lg font-bold text-gray-900">{{ $destination->adults }} Adults</p>
                        </div>
                    @endif

                    @if($destination->start_date && $destination->end_date)
                        <div class="bg-orange-50 p-4 rounded-xl border border-orange-100 text-center">
                            <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-orange-600 font-medium mb-1">Dates</p>
                            <p class="text-sm font-bold text-gray-900">
                                {{ \Carbon\Carbon::parse($destination->start_date)->format('M d') }} - 
                                {{ \Carbon\Carbon::parse($destination->end_date)->format('M d, Y') }}
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Full Description -->
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-7 h-7 mr-3 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        About This Destination
                    </h2>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $destination->details }}
                    </div>
                </div>
            </div>

            <!-- Right Column - Inquiry Form -->
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border-2 border-sky-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Interested?</h3>
                        <p class="text-gray-600 mb-6">Fill in your details and we'll get back to you with personalized information.</p>
                        
                        <form id="interestForm" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                                    <input type="text" id="firstName" name="firstName" required value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                                           placeholder="John">
                                </div>
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                                    <input type="text" id="lastName" name="lastName" required value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                                           placeholder="Doe">
                                </div>
                            </div>


                            {{-- <input type="hidden" id="form_type" name="form_type" value="destination_package"> --}}
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" id="email" name="email" required value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                                       placeholder="john@example.com">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', auth()->check() ? auth()->user()->phone : '') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                                       placeholder="+44 123 456 7890">
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea id="message" name="message" rows="4"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent resize-none"
                                          placeholder="Tell us about your travel preferences..."></textarea>
                            </div>

                            <button type="submit" id="submitBtn" 
                                    class="w-full bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Send Inquiry
                            </button>
                        </form>

                        <!-- Info Box -->
                        {{-- <div class="mt-6 bg-sky-50 p-4 rounded-lg border border-sky-200">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-sky-100 rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-sky-900 text-sm mb-1">Quick Response</h4>
                                    <p class="text-sky-700 text-xs">
                                        Our travel experts will contact you within 24 hours with detailed information.
                                    </p>
                                </div>
                            </div>
                        </div> --}}

                        <div class="mt-6 bg-sky-50 p-4 rounded-lg border border-sky-200">
    <div class="flex items-start">
        <div class="w-10 h-10 bg-sky-100 rounded-full flex items-center justify-center mr-3 mt-1">
            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="w-full">
            <h4 class="font-semibold text-sky-900 text-sm mb-1">Quick Response</h4>

            <p class="text-sky-700 text-xs mb-3">
                Our travel experts will contact you within 24 hours with detailed information.
            </p>

            <p class="text-sky-700 text-xs mb-3">
                Have another budget in mind or want to negotiate your travel plan?
                Choose an option below:
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('make-a-request') }}"
                   class="inline-flex items-center px-3 py-2 rounded-md bg-sky-600 text-white text-xs font-semibold
                          hover:bg-sky-700 transition">
                    📅 Schedule a Request
                </a>

                <a href="{{ route('contact') }}"
                   class="inline-flex items-center px-3 py-2 rounded-md border border-sky-300
                          text-sky-700 text-xs font-semibold hover:bg-sky-100 transition">
                    💬 Contact Us
                </a>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Related Destinations -->
        @if($relatedDestinations && $relatedDestinations->count() > 0)
            <div class="mt-16 md:mt-24">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                    You Might Also Like
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    @foreach($relatedDestinations as $related)
                        <a href="{{ route('destination.show', $related->slug) }}" 
                           class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                @if($related->image_url)
                                    <img src="{{ $related->image_url }}" 
                                         alt="{{ $related->title }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br {{ $related->gradient ?? 'from-blue-400 to-indigo-500' }}"></div>
                                @endif
                                
                                @if($related->price)
                                    <div class="absolute top-4 right-4 bg-white px-3 py-2 rounded-full shadow-lg">
                                        <span class="text-sky-600 font-bold text-sm">From £{{ number_format($related->price) }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-5">
                                <div class="flex items-center text-blue-500 text-sm mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $related->country }}
                                </div>
                                
                                <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-sky-600 transition-colors">
                                    {{ $related->title }}
                                </h3>
                                
                                @if($related->nights || $related->adults)
                                    <div class="flex items-center justify-between text-slate-500 text-sm">
                                        @if($related->nights)
                                            <span>{{ $related->nights }} Nights</span>
                                        @endif
                                        @if($related->adults)
                                            <span>{{ $related->adults }} Adults</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('interestForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const message = document.getElementById('message').value.trim();
        
        if (!firstName || !lastName || !email) {
            alert('Please fill in all required fields.');
            return;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }
        
        const originalBtnHTML = submitBtn.innerHTML;
        submitBtn.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Sending...
        `;
        submitBtn.disabled = true;
        
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
                    destination_id: {{ $destination->id }},
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
                submitBtn.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Inquiry Sent!
                `;
                submitBtn.classList.remove('bg-sky-600', 'hover:bg-sky-700');
                submitBtn.classList.add('bg-green-600');
                
                form.reset();
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalBtnHTML;
                    submitBtn.classList.remove('bg-green-600');
                    submitBtn.classList.add('bg-sky-600', 'hover:bg-sky-700');
                    submitBtn.disabled = false;
                }, 5000);
            } else {
                throw new Error(data.message || 'Failed to send inquiry');
            }
        } catch (error) {
            console.error('Error:', error);
            submitBtn.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Failed - Try Again
            `;
            submitBtn.classList.remove('bg-sky-600', 'hover:bg-sky-700');
            submitBtn.classList.add('bg-red-600', 'hover:bg-red-700');
            
            alert(error.message || 'Failed to send inquiry. Please try again.');
            
            setTimeout(() => {
                submitBtn.innerHTML = originalBtnHTML;
                submitBtn.classList.remove('bg-red-600', 'hover:bg-red-700');
                submitBtn.classList.add('bg-sky-600', 'hover:bg-sky-700');
                submitBtn.disabled = false;
            }, 5000);
        }
    });
});
</script>

@endsection