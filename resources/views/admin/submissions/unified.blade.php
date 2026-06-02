@extends('dashboard.base')
@section('title', 'All Submissions')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 py-4 sm:py-8">
        <div class="max-w-9xl mx-auto px-3 sm:px-4 lg:px-8">

            <!-- Header -->
            <div class="mb-4 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-1 sm:mb-2">📬 All Submissions</h1>
                <p class="text-sm sm:text-base text-gray-600">Manage all form submissions, bookings, and inquiries</p>
            </div>

            <!-- Statistics Cards - Mobile Optimized -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-4 sm:mb-8">
                <!-- Total Submissions -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-3 sm:p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm text-gray-600 mb-1 truncate">Total</p>
                            <h3 class="text-xl sm:text-3xl font-bold text-blue-600 truncate">
                                {{ number_format($stats['total']['all']) }}</h3>
                            <p class="text-xs text-gray-500 mt-1 hidden sm:block">All time</p>
                        </div>
                        <div
                            class="w-8 h-8 sm:w-12 sm:h-12 bg-blue-100 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 ml-2">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 sm:mt-4 pt-2 sm:pt-4 border-t border-gray-100 grid grid-cols-3 gap-1 text-xs">
                        <div class="text-center">
                            <span class="text-gray-500 block">Forms</span>
                            <span class="font-semibold text-gray-700">{{ $stats['total']['forms'] }}</span>
                        </div>
                        <div class="text-center">
                            <span class="text-gray-500 block">Books</span>
                            <span class="font-semibold text-gray-700">{{ $stats['total']['bookings'] }}</span>
                        </div>
                        <div class="text-center">
                            <span class="text-gray-500 block">Inq</span>
                            <span class="font-semibold text-gray-700">{{ $stats['total']['inquiries'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Today's Submissions -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-3 sm:p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm text-gray-600 mb-1 truncate">Today</p>
                            <h3 class="text-xl sm:text-3xl font-bold text-green-600">
                                {{ number_format($stats['today']['all']) }}</h3>
                            <p class="text-xs text-gray-500 mt-1 hidden sm:block">{{ now()->format('M d') }}</p>
                        </div>
                        <div
                            class="w-8 h-8 sm:w-12 sm:h-12 bg-green-100 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 ml-2">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- This Week -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-3 sm:p-6 border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm text-gray-600 mb-1 truncate">Week</p>
                            <h3 class="text-xl sm:text-3xl font-bold text-purple-600">
                                {{ number_format($stats['this_week']['all']) }}</h3>
                            <p class="text-xs text-gray-500 mt-1 hidden sm:block">Last 7 days</p>
                        </div>
                        <div
                            class="w-8 h-8 sm:w-12 sm:h-12 bg-purple-100 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 ml-2">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Spam Detected -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-3 sm:p-6 border-l-4 border-red-500">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm text-gray-600 mb-1 truncate">Spam</p>
                            <h3 class="text-xl sm:text-3xl font-bold text-red-600">
                                {{ number_format($stats['spam']['total']) }}</h3>
                            <p class="text-xs text-gray-500 mt-1 hidden sm:block">Blocked</p>
                        </div>
                        <div
                            class="w-8 h-8 sm:w-12 sm:h-12 bg-red-100 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 ml-2">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-red-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Actions - Mobile Optimized -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-3 sm:p-6 mb-4 sm:mb-6">
                <form method="GET" action="{{ route('admin.submissions.index') }}" class="space-y-3 sm:space-y-4">
                    <!-- Search - Full Width on Mobile -->
                    <div class="w-full">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Name, email, phone..."
                            class="w-full px-3 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <!-- Filters Grid - 2 cols on mobile, 4 on desktop -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <!-- Type -->
                        <div>
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Type</label>
                            <select name="type"
                                class="w-full px-2 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>All</option>
                                <option value="form" {{ request('type') == 'form' ? 'selected' : '' }}>Forms</option>
                                <option value="booking" {{ request('type') == 'booking' ? 'selected' : '' }}>Bookings
                                </option>
                                <option value="inquiry" {{ request('type') == 'inquiry' ? 'selected' : '' }}>Inquiries
                                </option>
                            </select>
                        </div>

                        <!-- Spam Filter -->
                        <div>
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Status</label>
                            <select name="spam"
                                class="w-full px-2 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="all" {{ request('spam') == 'all' ? 'selected' : '' }}>All</option>
                                <option value="legitimate" {{ request('spam') == 'legitimate' ? 'selected' : '' }}>
                                    Legitimate</option>
                                <option value="spam" {{ request('spam') == 'spam' ? 'selected' : '' }}>Spam</option>
                            </select>
                        </div>

                        <!-- Date From -->
                        <div>
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">From</label>
                            <input type="date" name="date_from" value="{{ request('date_from') }}"
                                class="w-full px-2 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Date To -->
                        <div>
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">To</label>
                            <input type="date" name="date_to" value="{{ request('date_to') }}"
                                class="w-full px-2 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- Sort Order - Full Width -->
                    <div class="w-full">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Sort By</label>
                        <select name="sort_order"
                            class="w-full px-3 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Newest First
                            </option>
                            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Oldest First
                            </option>
                        </select>
                    </div>

                    <!-- Action Buttons - Stack on Mobile -->
                    <div
                        class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-3 pt-3 sm:pt-4 border-t border-gray-200">
                        <button type="submit"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-2.5 bg-blue-600 text-white text-sm sm:text-base font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                            Apply Filters
                        </button>
                        <a href="{{ route('admin.submissions.index') }}"
                            class="w-full sm:w-auto text-center px-4 sm:px-6 py-2 sm:py-2.5 bg-gray-200 text-gray-700 text-sm sm:text-base font-semibold rounded-lg hover:bg-gray-300 transition-colors">
                            Clear
                        </a>
                        <a href="{{ route('admin.submissions.export', request()->query()) }}"
                            class="w-full sm:w-auto sm:ml-auto px-4 sm:px-6 py-2 sm:py-2.5 bg-green-600 text-white text-sm sm:text-base font-semibold rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="hidden sm:inline">Export CSV</span>
                            <span class="sm:hidden">Export</span>
                        </a>
                        @if ($stats['spam']['total'] > 0)
                            <form method="POST" action="{{ route('admin.submissions.bulk-delete-spam') }}"
                                class="w-full sm:w-auto"
                                onsubmit="return confirm('Delete all {{ $stats['spam']['total'] }} spam submissions? This cannot be undone!');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full px-4 sm:px-6 py-2 sm:py-2.5 bg-red-600 text-white text-sm sm:text-base font-semibold rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span class="hidden sm:inline">Delete Spam ({{ $stats['spam']['total'] }})</span>
                                    <span class="sm:hidden">Del Spam</span>
                                </button>
                            </form>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Submissions Table/Cards - Hybrid Mobile/Desktop View -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-lg overflow-hidden">
                <!-- Desktop Table View (hidden on mobile) -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Details</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($submissions as $submission)
                                <tr class="hover:bg-gray-50 {{ $submission['is_spam'] ? 'bg-red-50' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $submission['id'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full
                                        {{ $submission['type'] === 'form' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $submission['type'] === 'booking' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $submission['type'] === 'inquiry' ? 'bg-purple-100 text-purple-800' : '' }}">
                                            {{ $submission['type_label'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ Str::limit($submission['name'], 20) }}
                                        @if ($submission['user_id'])
                                            <span class="ml-1 text-xs text-blue-600" title="Registered User">👤</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ Str::limit($submission['email'], 25) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $submission['phone'] }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <div class="max-w-xs">
                                            @if (isset($submission['destination']))
                                                <span
                                                    class="font-medium">{{ Str::limit($submission['destination'], 30) }}</span>
                                            @else
                                                <span
                                                    class="text-gray-400">{{ Str::limit($submission['booking_type'], 30) }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($submission['is_spam'])
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">🚫
                                                Spam</span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">✓
                                                OK</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $submission['created_at']->format('M d, Y') }}<br>
                                        <span
                                            class="text-xs text-gray-400">{{ $submission['created_at']->format('H:i A') }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.submissions.show', [$submission['type'], $submission['id']]) }}"
                                                class="text-blue-600 hover:text-blue-900" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>
                                            @if ($submission['type'] !== 'inquiry')
                                                <form method="POST"
                                                    action="{{ route('admin.submissions.toggle-spam', [$submission['type'], $submission['id']]) }}"
                                                    class="inline">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="text-yellow-600 hover:text-yellow-900"
                                                        title="Toggle Spam">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                            <form method="POST"
                                                action="{{ route('admin.submissions.destroy', [$submission['type'], $submission['id']]) }}"
                                                class="inline" onsubmit="return confirm('Delete?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    title="Delete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-12 text-center text-gray-500">
                                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <p class="text-lg font-medium">No submissions found</p>
                                        <p class="text-sm mt-1">Try adjusting your filters</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View (shown only on mobile/tablet) -->
                <div class="lg:hidden divide-y divide-gray-200">
                    @forelse($submissions as $submission)
                        <div class="p-4 {{ $submission['is_spam'] ? 'bg-red-50' : 'hover:bg-gray-50' }}">
                            <!-- Header -->
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-sm font-bold text-gray-900">#{{ $submission['id'] }}</span>
                                        <span
                                            class="px-2 py-0.5 text-xs font-semibold rounded-full
                                        {{ $submission['type'] === 'form' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $submission['type'] === 'booking' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $submission['type'] === 'inquiry' ? 'bg-purple-100 text-purple-800' : '' }}">
                                            {{ $submission['type'] === 'form' ? 'Form' : ($submission['type'] === 'booking' ? 'Book' : 'Inq') }}
                                        </span>
                                        @if ($submission['is_spam'])
                                            <span
                                                class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-800">Spam</span>
                                        @endif
                                    </div>
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $submission['name'] }}
                                        @if ($submission['user_id'])
                                            <span class="text-xs text-blue-600">👤</span>
                                        @endif
                                    </p>
                                </div>
                                <span
                                    class="text-xs text-gray-500 ml-2">{{ $submission['created_at']->format('M d') }}</span>
                            </div>

                            <!-- Details -->
                            <div class="space-y-1 mb-3 text-sm">
                                <p class="text-gray-600 truncate">📧 {{ $submission['email'] }}</p>
                                <p class="text-gray-600 truncate">📱 {{ $submission['phone'] }}</p>
                                @if (isset($submission['destination']))
                                    <p class="text-gray-600 truncate">📍 {{ $submission['destination'] }}</p>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.submissions.show', [$submission['type'], $submission['id']]) }}"
                                    class="flex-1 px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded text-center">
                                    View Details
                                </a>
                                @if ($submission['type'] !== 'inquiry')
                                    <form method="POST"
                                        action="{{ route('admin.submissions.toggle-spam', [$submission['type'], $submission['id']]) }}"
                                        class="inline">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-xs font-medium rounded hover:bg-yellow-200">
                                            ⚠️
                                        </button>
                                    </form>
                                @endif
                                <form method="POST"
                                    action="{{ route('admin.submissions.destroy', [$submission['type'], $submission['id']]) }}"
                                    class="inline" onsubmit="return confirm('Delete?');">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 bg-red-100 text-red-700 text-xs font-medium rounded hover:bg-red-200">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <p class="font-medium">No submissions found</p>
                            <p class="text-xs mt-1">Try adjusting filters</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="px-3 sm:px-6 py-3 sm:py-4 bg-gray-50 border-t border-gray-200">
                    {{ $submissions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
