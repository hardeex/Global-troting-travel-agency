@extends('dashboard.base')
@section('title', 'Booking Dashboard')
@section('content')

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <!-- Left Section: Title and Icon -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-sky-400 to-blue-500 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Booking Dashboard </h1>
                        <p class="text-gray-600 text-sm sm:text-base">Manage all bookings and destinations</p>
                    </div>
                </div>

                @include('feedback')

                  @if($errors->any())
                    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 px-4 py-3 rounded-lg mb-6 animate-shake">
                        <ul class="space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Right Section: Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                    <a href="{{ route('admin.destinations.index') }}"
                        class="inline-flex items-center justify-center px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-sm hover:shadow-md text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Destinations
                    </a>

                    <a href="{{ route('admin.export.contacts.page') }}"
                        class="inline-flex items-center justify-center px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 shadow-sm hover:shadow-md text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Export Contacts
                    </a>

                    @if (session('is_admin'))
                        <form action="{{ route('admin.logout') }}" method="GET" class="inline-block">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 shadow-sm hover:shadow-md text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Submissions -->
            <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-sky-100 to-sky-200 rounded-xl">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Submissions</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $submissions->total() }}</p>
                    </div>
                </div>
            </div>

            <!-- Today -->
            <div class="bg-white rounded-xl shadow-sm border border-green-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Today</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $submissions->where('created_at', '>=', today())->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- This Week -->
            <div class="bg-white rounded-xl shadow-sm border border-blue-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">This Week</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $submissions->where('created_at', '>=', now()->startOfWeek())->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- This Month -->
            <div class="bg-white rounded-xl shadow-sm border border-purple-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">This Month</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $submissions->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter Bookings
                </h3>
                @if(request()->hasAny(['type', 'keyword', 'from', 'to']))
                    <a href="{{ route('admin.bookings') }}" 
                        class="text-sm text-gray-600 hover:text-gray-800 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Clear All
                    </a>
                @endif
            </div>
            
            <form method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Booking Type</label>
                    <select name="type" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400 bg-white transition">
                        <option value="">All Types</option>
                        @foreach(['car', 'flight', 'stay', 'activity', 'hotel', 'custom', 'contact'] as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Search</label>
                    <input type="text" name="keyword" value="{{ request('keyword') }}" 
                        placeholder="Name or Email" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition">
                </div>
                
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">From Date</label>
                    <input type="date" name="from" value="{{ request('from') }}" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition">
                </div>
                
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">To Date</label>
                    <input type="date" name="to" value="{{ request('to') }}" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition">
                </div>
                
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">&nbsp;</label>
                    <div class="flex gap-2">
                        <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2 shadow-sm hover:shadow-md flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('admin.bookings') }}" 
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2.5 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Bookings List -->
        <div class="space-y-4">
            @forelse($submissions as $submission)
                @php
                    $data = json_decode($submission->payload, true);
                    $uid = uniqid();
                @endphp

                <div x-data="{ open_{{ $uid }}: false, showDelete_{{ $uid }}: false }" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1 min-w-0">
                                <!-- Type Badge and Date -->
                                <div class="flex flex-wrap items-center gap-3 mb-4">
                                    @php
                                        $typeColors = [
                                            'car' => 'bg-blue-100 text-blue-700 border-blue-200',
                                            'flight' => 'bg-purple-100 text-purple-700 border-purple-200',
                                            'stay' => 'bg-green-100 text-green-700 border-green-200',
                                            'activity' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                            'hotel' => 'bg-red-100 text-red-700 border-red-200',
                                            'custom' => 'bg-gray-100 text-gray-700 border-gray-200',
                                            'contact' => 'bg-pink-100 text-pink-700 border-pink-200'
                                        ];
                                        $type = $data['booking_type'] ?? 'N/A';
                                        $colorClass = $typeColors[$type] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border {{ $colorClass }}">
                                        {{ ucfirst($type) }}
                                    </span>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($submission->created_at)->format('M j, Y \a\t g:i A') }}
                                    </div>
                                </div>

                                <!-- Customer Info Grid -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-sky-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3 flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ e($data['name'] ?? 'N/A') }}</p>
                                            <p class="text-xs text-gray-500">Customer Name</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3 flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ e($data['email'] ?? 'N/A') }}</p>
                                            <p class="text-xs text-gray-500">Email Address</p>
                                        </div>
                                    </div>
                                </div>

                                @if(isset($data['phone']))
                                    <div class="flex items-center bg-gray-50 rounded-lg p-3 mb-4">
                                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-semibold text-gray-900">{{ e($data['phone']) }}</p>
                                            <p class="text-xs text-gray-500">Phone Number</p>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($data['message']))
                                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                                        <p class="text-sm text-gray-600 font-semibold mb-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                            </svg>
                                            Message:
                                        </p>
                                        <p class="text-sm text-gray-800">{{ e($data['message']) }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex-shrink-0 flex gap-2">
                                <button @click="open_{{ $uid }} = true"
                                        class="inline-flex items-center px-4 py-2 border-2 border-sky-200 rounded-lg text-sm font-medium text-sky-700 bg-sky-50 hover:bg-sky-100 hover:border-sky-300 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </button>
                                
                                <button @click="showDelete_{{ $uid }} = true"
                                        class="inline-flex items-center px-4 py-2 border-2 border-red-200 rounded-lg text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- View Details Modal -->
                    <div x-show="open_{{ $uid }}" x-cloak
                         class="fixed inset-0 z-50 flex items-center justify-center p-4"
                         @click.self="open_{{ $uid }} = false">
                        <div class="fixed inset-0 transition-opacity"></div>
                        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-auto overflow-hidden relative z-10" @click.stop>
                            <div class="bg-gradient-to-r from-sky-500 to-blue-600 p-6 flex justify-between items-center">
                                <h4 class="text-xl font-bold text-white">Submission Details</h4>
                                <button @click="open_{{ $uid }} = false" class="text-white hover:text-gray-200 transition">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 max-h-[70vh] overflow-y-auto">
                                @php
                                    $readableFields = [
                                        'name' => 'Customer Name',
                                        'email' => 'Email Address',
                                        'phone' => 'Phone Number',
                                        'message' => 'Message',
                                        'preferred_contact' => 'Preferred Contact Method',
                                        'booking_type' => 'Booking Type',
                                        'custom_destination' => 'Custom Destination',
                                        'custom_style' => 'Custom Style',
                                        'custom_budget' => 'Custom Budget',
                                        'custom_start' => 'Custom Start Date',
                                        'custom_end' => 'Custom End Date',
                                        'flight_departure' => 'Flight Departure',
                                        'flight_arrival' => 'Flight Arrival',
                                        'flight_departure_date' => 'Flight Departure Date',
                                        'flight_return_date' => 'Flight Return Date',
                                        'flight_adults' => 'Flight Adults',
                                        'flight_children' => 'Flight Children',
                                        'flight_class' => 'Flight Class',
                                        'hotel_location' => 'Hotel Location',
                                        'hotel_checkin' => 'Hotel Check-in',
                                        'hotel_checkout' => 'Hotel Check-out',
                                        'hotel_guests' => 'Hotel Guests',
                                        'hotel_rooms' => 'Hotel Rooms',
                                        'activity_location' => 'Activity Location',
                                        'activity_date' => 'Activity Date',
                                        'activity_people' => 'Activity People',
                                        'activity_type' => 'Activity Type',
                                        'car_pickup_location' => 'Car Pickup Location',
                                        'car_dropoff_location' => 'Car Dropoff Location',
                                        'car_pickup_date' => 'Car Pickup Date',
                                        'car_dropoff_date' => 'Car Dropoff Date',
                                        'driver_age' => 'Driver Age'
                                    ];
                                @endphp

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($readableFields as $field => $label)
                                        @if(!empty($data[$field]))
                                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">{{ $label }}</p>
                                                <p class="text-sm text-gray-900 font-medium">{{ e($data[$field]) }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div x-show="showDelete_{{ $uid }}" x-cloak
                         class="fixed inset-0 z-50 flex items-center justify-center p-4"
                         @click.self="showDelete_{{ $uid }} = false">
                        <div class="fixed inset-0  transition-opacity"></div>
                        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md mx-auto overflow-hidden relative z-10" @click.stop>
                            <div class="bg-gradient-to-r from-red-500 to-red-600 p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="ml-4 text-xl font-bold text-white">Confirm Deletion</h4>
                                </div>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-700 mb-6">
                                    Are you sure you want to delete this booking submission? This action cannot be undone.
                                </p>
                                <div class="bg-gray-50 rounded-lg p-4 mb-6 border border-gray-200">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-900">{{ e($data['name'] ?? 'N/A') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ e($data['email'] ?? 'N/A') }}</span>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <button @click="showDelete_{{ $uid }} = false"
                                            class="flex-1 px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button @click="deleteSubmission({{ $submission->id }})"
                                            class="flex-1 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No Bookings Found</h3>
                        <p class="text-gray-600 mb-6 max-w-md">No submissions match your current filters. Try adjusting your search criteria or clear all filters.</p>
                        <a href="{{ route('admin.bookings') }}" 
                            class="inline-flex items-center px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset Filters
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($submissions->hasPages())
            <div class="mt-8">
                <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            Showing <span class="font-semibold text-gray-900">{{ $submissions->firstItem() }}</span> to 
                            <span class="font-semibold text-gray-900">{{ $submissions->lastItem() }}</span> of 
                            <span class="font-semibold text-gray-900">{{ $submissions->total() }}</span> results
                        </div>
                        <div>
                            {{ $submissions->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>

<script>
function deleteSubmission(id) {
    fetch(`/admin/bookings/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            alert('Failed to delete submission');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the submission');
    });
}
</script>

@endsection