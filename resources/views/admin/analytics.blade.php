@extends('dashboard.base')
@section('title', 'Analytics Dashboard')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 p-4 sm:p-6 lg:p-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-2">Analytics Dashboard</h1>
        <p class="text-slate-600">Real-time insights into your travel business performance</p>
    </div>

    <!-- Key Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Bookings -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $bookingGrowth >= 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $bookingGrowth >= 0 ? '+' : '' }}{{ $bookingGrowth }}%
                </span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900">{{ number_format($totalBookings) }}</h3>
            <p class="text-sm text-slate-600 mt-1">Total Bookings</p>
            <p class="text-xs text-slate-500 mt-2">{{ $recentBookings }} in last 30 days</p>
        </div>

        <!-- Total Destinations -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-slate-900">{{ number_format($totalDestinations) }}</h3>
            <p class="text-sm text-slate-600 mt-1">Active Destinations</p>
        </div>

        <!-- Total Inquiries -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-slate-900">{{ number_format($totalInquiries) }}</h3>
            <p class="text-sm text-slate-600 mt-1">Customer Inquiries</p>
            <p class="text-xs text-slate-500 mt-2">{{ $recentInquiries }} in last 30 days</p>
        </div>

        <!-- Conversion Rate -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-slate-900">{{ $conversionRate }}%</h3>
            <p class="text-sm text-slate-600 mt-1">Conversion Rate</p>
            <p class="text-xs text-slate-500 mt-2">Inquiries to bookings</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Monthly Trend Chart -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Booking Trends (6 Months)</h2>
            <div class="space-y-3">
                @php
                    $maxCount = max(array_column($monthlyTrend, 'count')) ?: 1;
                @endphp
                @foreach($monthlyTrend as $data)
                <div class="flex items-center gap-3">
                    <span class="text-xs font-medium text-slate-600 w-16">{{ $data['month'] }}</span>
                    <div class="flex-1 bg-slate-100 rounded-full h-8 relative overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full flex items-center justify-end pr-3 transition-all duration-500" 
                             style="width: {{ $maxCount > 0 ? ($data['count'] / $maxCount * 100) : 0 }}%">
                            <span class="text-xs font-semibold text-white">{{ $data['count'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top Destinations -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Top Destinations by Interest</h2>
            <div class="space-y-4">
                @forelse($topDestinations as $dest)
                <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors">
                    <div class="flex-1">
                        <h3 class="font-medium text-slate-900">{{ $dest->title }}</h3>
                        <p class="text-xs text-slate-500">{{ $dest->country }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xl font-bold text-blue-600">{{ $dest->inquiries_count }}</span>
                        <span class="text-xs text-slate-500">inquiries</span>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500 text-center py-8">No destination data available</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Additional Analytics Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Trip Types -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Popular Trip Types</h2>
            <div class="space-y-2">
                @forelse($tripTypes as $type)
                <div class="flex items-center justify-between py-2 border-b border-slate-100 last:border-0">
                    <span class="text-sm text-slate-700 capitalize">{{ $type->trip_type ?: 'Not specified' }}</span>
                    <span class="text-sm font-semibold text-slate-900">{{ $type->count }}</span>
                </div>
                @empty
                <p class="text-sm text-slate-500 text-center py-4">No data</p>
                @endforelse
            </div>
        </div>

        <!-- Nationalities -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Top Nationalities</h2>
            <div class="space-y-2">
                @forelse($nationalities as $nat)
                <div class="flex items-center justify-between py-2 border-b border-slate-100 last:border-0">
                    <span class="text-sm text-slate-700">{{ $nat->nationality ?: 'Not specified' }}</span>
                    <span class="text-sm font-semibold text-slate-900">{{ $nat->count }}</span>
                </div>
                @empty
                <p class="text-sm text-slate-500 text-center py-4">No data</p>
                @endforelse
            </div>
        </div>

        <!-- Accommodation Preferences -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Accommodation Types</h2>
            <div class="space-y-2">
                @forelse($accommodations as $acc)
                <div class="flex items-center justify-between py-2 border-b border-slate-100 last:border-0">
                    <span class="text-sm text-slate-700 capitalize">{{ $acc->accommodation ?: 'Not specified' }}</span>
                    <span class="text-sm font-semibold text-slate-900">{{ $acc->count }}</span>
                </div>
                @empty
                <p class="text-sm text-slate-500 text-center py-4">No data</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Budget Distribution & Services -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Budget Distribution -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Budget Distribution</h2>
            <div class="space-y-3">
                @php
                    $maxBudget = $budgets->max('count') ?: 1;
                @endphp
                @forelse($budgets as $budget)
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm text-slate-700">{{ $budget->budget ?: 'Not specified' }}</span>
                        <span class="text-sm font-semibold text-slate-900">{{ $budget->count }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2">
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-2 rounded-full transition-all duration-500" 
                             style="width: {{ ($budget->count / $maxBudget * 100) }}%"></div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500 text-center py-4">No budget data</p>
                @endforelse
            </div>
        </div>

        <!-- Services Requested -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Popular Services</h2>
            <div class="space-y-3">
                @php
                    $maxService = $servicesData->max() ?: 1;
                @endphp
                @forelse($servicesData as $service => $count)
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm text-slate-700 capitalize">{{ $service }}</span>
                        <span class="text-sm font-semibold text-slate-900">{{ $count }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2 rounded-full transition-all duration-500" 
                             style="width: {{ ($count / $maxService * 100) }}%"></div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500 text-center py-4">No service data</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Average Metrics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-sm border border-blue-200 p-6">
            <h2 class="text-lg font-semibold text-blue-900 mb-4">Average Group Size</h2>
            <div class="flex items-center gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-700">{{ number_format($avgAdults, 1) }}</div>
                    <div class="text-sm text-blue-600 mt-1">Adults</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-700">{{ number_format($avgChildren, 1) }}</div>
                    <div class="text-sm text-blue-600 mt-1">Children</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Bookings -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Recent Bookings</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Destination</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($latestBookings as $booking)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3 text-slate-900">{{ $booking->full_name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ Str::limit($booking->destination, 20) }}</td>
                            <td class="px-4 py-3 text-slate-500 text-xs">{{ $booking->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-8 text-center text-slate-500">No recent bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Recent Inquiries</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Destination</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($latestInquiries as $inquiry)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3 text-slate-900">{{ $inquiry->first_name }} {{ $inquiry->last_name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $inquiry->destination ? Str::limit($inquiry->destination->title, 20) : 'N/A' }}</td>
                            <td class="px-4 py-3 text-slate-500 text-xs">{{ $inquiry->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-8 text-center text-slate-500">No recent inquiries</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection