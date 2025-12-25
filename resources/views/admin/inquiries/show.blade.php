{{-- Save this as: resources/views/admin/inquiries/show.blade.php --}}

@extends('dashboard.base')
@section('title', 'Inquiry Details')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 p-4 sm:p-6 lg:p-8">
    <!-- Header with Back Button -->
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <a href="{{ route('inquiries.manage') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium mb-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Inquiries
            </a>
            <h1 class="text-3xl font-bold text-slate-900">Inquiry Details</h1>
            <p class="text-sm text-slate-500 mt-1">Inquiry #{{ $inquiry->id }}</p>
        </div>
        <form action="{{ route('inquiries.delete', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry? This action cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Delete Inquiry
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Customer Information -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Customer Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-2">Full Name</label>
                        <p class="text-lg font-semibold text-slate-900">{{ $inquiry->first_name }} {{ $inquiry->last_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-2">Email Address</label>
                        <a href="mailto:{{ $inquiry->email }}" class="inline-flex items-center gap-2 text-lg text-blue-600 hover:text-blue-700 font-medium transition-colors">
                            <span>{{ $inquiry->email }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-2">Phone Number</label>
                        @if($inquiry->phone)
                        <a href="tel:{{ $inquiry->phone }}" class="inline-flex items-center gap-2 text-lg text-blue-600 hover:text-blue-700 font-medium transition-colors">
                            <span>{{ $inquiry->phone }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </a>
                        @else
                        <p class="text-slate-400 italic">Not provided</p>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-2">Inquiry Date</label>
                        <p class="text-lg font-semibold text-slate-900">{{ $inquiry->created_at->format('M d, Y') }}</p>
                        <p class="text-sm text-slate-500">{{ $inquiry->created_at->format('h:i A') }} • {{ $inquiry->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Destination Information -->
            @if($inquiry->destination)
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Destination of Interest
                </h2>
                <div class="flex flex-col sm:flex-row gap-6">
                    @if($inquiry->destination->image_url)
                    <div class="flex-shrink-0">
                        <img src="{{ $inquiry->destination->image_url }}" 
                             alt="{{ $inquiry->destination->title }}" 
                             class="w-full sm:w-48 h-48 rounded-xl object-cover shadow-md">
                    </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $inquiry->destination->title }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500">Location</p>
                                    <p class="font-medium">{{ $inquiry->destination->country }}</p>
                                </div>
                            </div>
                            
                            @if($inquiry->destination->price)
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500">Price</p>
                                    <p class="font-bold text-emerald-600">£{{ number_format($inquiry->destination->price) }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if($inquiry->destination->nights)
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500">Duration</p>
                                    <p class="font-medium">{{ $inquiry->destination->nights }} nights</p>
                                </div>
                            </div>
                            @endif

                            @if($inquiry->destination->adults)
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500">Group Size</p>
                                    <p class="font-medium">{{ $inquiry->destination->adults }} adults</p>
                                </div>
                            </div>
                            @endif

                            @if($inquiry->destination->start_date && $inquiry->destination->end_date)
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500">Travel Dates</p>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($inquiry->destination->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($inquiry->destination->end_date)->format('M d, Y') }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($inquiry->destination->short_description)
                <div class="mt-6 pt-6 border-t border-slate-200">
                    <p class="text-slate-600 leading-relaxed">{{ $inquiry->destination->short_description }}</p>
                </div>
                @endif
            </div>
            @else
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="text-center py-8">
                    <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-slate-600 font-medium">No destination linked to this inquiry</p>
                </div>
            </div>
            @endif

            <!-- Customer Message -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                    Customer Message
                </h2>
                @if($inquiry->message)
                <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-lg p-6 border border-slate-200">
                    <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $inquiry->message }}</p>
                </div>
                @else
                <div class="text-center py-8 bg-slate-50 rounded-lg border border-slate-200">
                    <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <p class="text-slate-400 italic">No message provided by the customer</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-lg font-bold text-slate-900 mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="mailto:{{ $inquiry->email }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Send Email
                    </a>
                    @if($inquiry->phone)
                    <a href="tel:{{ $inquiry->phone }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-all shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Call Customer
                    </a>
                    @endif
                    @if($inquiry->destination)
                    <a href="{{ route('admin.destinations.edit', $inquiry->destination->id) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-all shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        View Destination
                    </a>
                    @endif
                </div>
            </div>

            <!-- Technical Details -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Technical Details
                </h2>
                <div class="space-y-4 text-sm">
                    <div class="pb-3 border-b border-slate-100">
                        <label class="block text-slate-500 font-medium mb-1">Inquiry ID</label>
                        <p class="text-slate-900 font-mono bg-slate-50 px-3 py-1.5 rounded border border-slate-200">{{ $inquiry->id }}</p>
                    </div>
                    <div class="pb-3 border-b border-slate-100">
                        <label class="block text-slate-500 font-medium mb-1">IP Address</label>
                        <p class="text-slate-900 font-mono bg-slate-50 px-3 py-1.5 rounded border border-slate-200">{{ $inquiry->ip_address }}</p>
                    </div>
                    <div class="pb-3 border-b border-slate-100">
                        <label class="block text-slate-500 font-medium mb-1">User Agent</label>
                        <p class="text-slate-900 text-xs break-all bg-slate-50 px-3 py-2 rounded border border-slate-200 leading-relaxed">{{ $inquiry->user_agent }}</p>
                    </div>
                    <div class="pb-3 border-b border-slate-100">
                        <label class="block text-slate-500 font-medium mb-1">Created At</label>
                        <p class="text-slate-900 bg-slate-50 px-3 py-1.5 rounded border border-slate-200">{{ $inquiry->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    @if($inquiry->updated_at != $inquiry->created_at)
                    <div>
                        <label class="block text-slate-500 font-medium mb-1">Last Updated</label>
                        <p class="text-slate-900 bg-slate-50 px-3 py-1.5 rounded border border-slate-200">{{ $inquiry->updated_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection