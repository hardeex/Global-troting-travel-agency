@extends('user.base')

@section('title', 'My Bookings')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        
        {{-- Header Section --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">My Travel Inquiries</h1>
            
            @auth
                <p class="text-gray-600">Viewing all inquiries for {{ Auth::user()->email }}</p>
            @else
                @if($isGuest && $guestEmail)
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

        {{-- Guest Email Input Form --}}
        @guest
            @if(!$isGuest || !$guestEmail)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-xl font-semibold mb-4">Access Your Inquiries</h2>
                    <form action="{{ route('inquiries.index') }}" method="GET" class="flex gap-4">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="your@email.com"
                                value="{{ old('email', session('guest_inquiry_email')) }}"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-end">
                            <button 
                                type="submit"
                                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition"
                            >
                                View Inquiries
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-4 text-sm text-gray-600">
                        <p>Don't have an account? 
                            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a> 
                            to save all your inquiries in one place.
                        </p>
                    </div>
                </div>
            @endif
        @endguest

        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        {{-- Inquiries List --}}
        @if($inquiries->count() > 0)
            <div class="space-y-4">
                @foreach($inquiries as $inquiry)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-1">
                                        {{ $inquiry->destination->title }}
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        {{ $inquiry->destination->country }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span class="inline-block px-3 py-1 text-xs font-medium rounded-full
                                        {{ $inquiry->user_id ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $inquiry->user_id ? 'Registered' : 'Guest' }}
                                    </span>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ $inquiry->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-600">
                                        <strong>Name:</strong> {{ $inquiry->first_name }} {{ $inquiry->last_name }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <strong>Email:</strong> {{ $inquiry->email }}
                                    </p>
                                    @if($inquiry->phone)
                                        <p class="text-sm text-gray-600">
                                            <strong>Phone:</strong> {{ $inquiry->phone }}
                                        </p>
                                    @endif
                                </div>
                                
                                <div>
                                    @if($inquiry->destination->price)
                                        <p class="text-sm text-gray-600">
                                            <strong>Price:</strong> £{{ number_format($inquiry->destination->price, 2) }}
                                        </p>
                                    @endif
                                    @if($inquiry->destination->nights)
                                        <p class="text-sm text-gray-600">
                                            <strong>Duration:</strong> {{ $inquiry->destination->nights }} nights
                                        </p>
                                    @endif
                                    @if($inquiry->destination->start_date && $inquiry->destination->end_date)
                                        <p class="text-sm text-gray-600">
                                            <strong>Travel Dates:</strong> 
                                            {{ \Carbon\Carbon::parse($inquiry->destination->start_date)->format('M d') }} - 
                                            {{ \Carbon\Carbon::parse($inquiry->destination->end_date)->format('M d, Y') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            @if($inquiry->message)
                                <div class="border-t pt-4">
                                    <p class="text-sm font-medium text-gray-700 mb-1">Your Message:</p>
                                    <p class="text-sm text-gray-600">{{ $inquiry->message }}</p>
                                </div>
                            @endif

                            <div class="border-t pt-4 mt-4">
                                <a 
                                    href="{{ route('destination.show', $inquiry->destination->slug ?? $inquiry->destination->id) }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                >
                                    View Destination Details →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $inquiries->links() }}
            </div>

        @else
            {{-- Empty State --}}
            @if($isGuest && $guestEmail)
                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Inquiries Found</h3>
                    <p class="text-gray-600 mb-6">
                        We couldn't find any inquiries for <strong>{{ $guestEmail }}</strong>
                    </p>
                    <div class="flex gap-4 justify-center">
                        <a 
                            href="{{ route('destinations.index') }}" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                        >
                            Browse Destinations
                        </a>
                        <form action="{{ route('inquiries.clear-session') }}" method="POST" class="inline">
                            @csrf
                            <button 
                                type="submit"
                                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition"
                            >
                                Try Different Email
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endif

    </div>
</div>
@endsection