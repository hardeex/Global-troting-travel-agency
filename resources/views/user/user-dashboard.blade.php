@extends('user.base')
@section('title', 'My Dashboard')
@section('content')

    <div class="min-h-screen font-['Lato',sans-serif] bg-gray-50">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-br from-teal-700 via-teal-500 to-cyan-600 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-['Playfair_Display',serif] text-4xl font-bold text-white mb-2">
                            Welcome back, {{ $user->name }}!
                        </h1>
                        <p class="text-lg text-white/90">
                            Here's your travel overview and activity summary
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-20 relative z-20">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Bookings -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-teal-600 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Bookings</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_bookings'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <a href="{{ route('user.bookings.contacts') }}"
                            class="text-teal-600 hover:text-teal-700 font-medium hover:underline">
                            View all bookings →
                        </a>
                    </div>
                </div>

                <!-- Upcoming Trips -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-blue-600 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Upcoming Trips</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['upcoming_trips'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-sm text-gray-500">{{ $stats['past_trips'] }} completed trips</span>
                    </div>
                </div>

                <!-- Total Inquiries -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-purple-600 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Inquiries</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_inquiries'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <a href="{{ route('inquiries.index') }}"
                            class="text-purple-600 hover:text-purple-700 font-medium hover:underline">
                            View all inquiries →
                        </a>
                    </div>
                </div>

                <!-- Total Travelers -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-orange-600 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Travelers</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_travelers'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-sm text-gray-500">Across all bookings</span>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Monthly Activity Chart -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900 mb-6">Activity Over Time</h3>
                    <div class="relative h-64 md:h-72">
                        <canvas id="monthlyActivityChart"></canvas>
                    </div>
                </div>

                <!-- Destinations Chart -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900 mb-6">Top Destinations</h3>
                    @if ($destinationStats->count() > 0)
                        <div class="relative h-64 md:h-72">
                            <canvas id="destinationsChart"></canvas>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-64 text-gray-400">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <p class="text-sm">No destination data yet</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Charts Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Trip Types -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900 mb-6">Trip Types</h3>
                    @if ($tripTypeStats->count() > 0)
                        <div class="relative h-56">
                            <canvas id="tripTypesChart"></canvas>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-56 text-gray-400 text-sm">
                            No trip type data
                        </div>
                    @endif
                </div>

                <!-- Budget Distribution -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900 mb-6">Budget Range</h3>
                    @if ($budgetStats->count() > 0)
                        <div class="relative h-56">
                            <canvas id="budgetChart"></canvas>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-56 text-gray-400 text-sm">
                            No budget data
                        </div>
                    @endif
                </div>

                <!-- Travelers Breakdown -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900 mb-6">Travelers Type</h3>
                    @if ($travelerStats['adults'] > 0 || $travelerStats['children'] > 0 || $travelerStats['infants'] > 0)
                        <div class="relative h-56">
                            <canvas id="travelersChart"></canvas>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-56 text-gray-400 text-sm">
                            No traveler data
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Bookings -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900">Recent Bookings</h3>
                        <a href="{{ route('user.bookings.contacts') }}"
                            class="text-sm text-teal-600 hover:text-teal-700 font-medium hover:underline">
                            View All
                        </a>
                    </div>

                    @if ($recentBookings->count() > 0)
                        <div class="space-y-4">
                            @foreach ($recentBookings as $booking)
                                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                    <div
                                        class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $booking->destination }}
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $booking->departure_date ? $booking->departure_date->format('M d, Y') : 'Date pending' }}
                                            @if ($booking->total_travelers)
                                                • {{ $booking->total_travelers }}
                                                {{ Str::plural('traveler', $booking->total_travelers) }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $booking->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-gray-500 text-sm mb-4">No bookings yet</p>
                            <a href="{{ route('make-a-request') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-teal-600 text-white text-sm rounded-lg hover:bg-teal-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Create Booking
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Recent Inquiries -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-['Playfair_Display',serif] text-xl font-bold text-gray-900">Recent Inquiries</h3>
                        <a href="{{ route('inquiries.index') }}"
                            class="text-sm text-purple-600 hover:text-purple-700 font-medium hover:underline">
                            View All
                        </a>
                    </div>

                    @if ($recentInquiries->count() > 0)
                        <div class="space-y-4">
                            @foreach ($recentInquiries as $inquiry)
                                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                    <div
                                        class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate">
                                            {{ $inquiry->destination->name ?? 'General Inquiry' }}
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                            {{ Str::limit($inquiry->message, 80) }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $inquiry->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <p class="text-gray-500 text-sm mb-4">No inquiries yet</p>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 text-white text-sm rounded-lg hover:bg-purple-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Submit Inquiry
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        // Chart Colors
        const colors = {
            teal: {
                primary: 'rgba(15, 118, 110, 1)',
                light: 'rgba(15, 118, 110, 0.2)',
                gradient: ['rgba(15, 118, 110, 0.8)', 'rgba(20, 184, 166, 0.6)']
            },
            purple: {
                primary: 'rgba(147, 51, 234, 1)',
                light: 'rgba(147, 51, 234, 0.2)',
            },
            blue: {
                primary: 'rgba(37, 99, 235, 1)',
                light: 'rgba(37, 99, 235, 0.2)',
            },
            multi: [
                'rgba(15, 118, 110, 0.8)',
                'rgba(147, 51, 234, 0.8)',
                'rgba(37, 99, 235, 0.8)',
                'rgba(234, 88, 12, 0.8)',
                'rgba(239, 68, 68, 0.8)',
            ]
        };

        // Common chart options for responsiveness
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: true,
        };

        // Monthly Activity Chart
        const monthlyActivityCtx = document.getElementById('monthlyActivityChart');
        if (monthlyActivityCtx) {
            const monthlyData = @json($monthlyActivity);

            new Chart(monthlyActivityCtx, {
                type: 'line',
                data: {
                    labels: monthlyData.map(item => item.month),
                    datasets: [{
                            label: 'Bookings',
                            data: monthlyData.map(item => item.bookings),
                            borderColor: colors.teal.primary,
                            backgroundColor: colors.teal.light,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: colors.teal.primary,
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Inquiries',
                            data: monthlyData.map(item => item.inquiries),
                            borderColor: colors.purple.primary,
                            backgroundColor: colors.purple.light,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: colors.purple.primary,
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    ...commonOptions,
                    aspectRatio: 2,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                display: true,
                                drawBorder: false
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 11
                                },
                                maxRotation: 45,
                                minRotation: 0
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Destinations Chart
        const destinationsCtx = document.getElementById('destinationsChart');
        @if ($destinationStats->count() > 0)
            if (destinationsCtx) {
                const destinationData = @json($destinationStats);

                new Chart(destinationsCtx, {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(destinationData),
                        datasets: [{
                            data: Object.values(destinationData),
                            backgroundColor: colors.multi,
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        ...commonOptions,
                        aspectRatio: 2,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    padding: 12,
                                    font: {
                                        size: 11
                                    },
                                    boxWidth: 12
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.parsed + ' booking' + (context.parsed !== 1 ? 's' :
                                        '');
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        @endif

        // Trip Types Chart
        const tripTypesCtx = document.getElementById('tripTypesChart');
        @if ($tripTypeStats->count() > 0)
            if (tripTypesCtx) {
                const tripTypeData = @json($tripTypeStats);

                new Chart(tripTypesCtx, {
                    type: 'pie',
                    data: {
                        labels: Object.keys(tripTypeData).map(type => type.replace(/_/g, ' ').replace(/\b\w/g, l =>
                            l.toUpperCase())),
                        datasets: [{
                            data: Object.values(tripTypeData),
                            backgroundColor: colors.multi,
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        ...commonOptions,
                        aspectRatio: 1.5,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    padding: 10,
                                    font: {
                                        size: 10
                                    },
                                    boxWidth: 12
                                }
                            }
                        }
                    }
                });
            }
        @endif

        // Budget Chart
        const budgetCtx = document.getElementById('budgetChart');
        @if ($budgetStats->count() > 0)
            if (budgetCtx) {
                const budgetData = @json($budgetStats);

                new Chart(budgetCtx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(budgetData).map(budget => budget.replace(/_/g, ' ').replace(/\b\w/g,
                            l => l.toUpperCase())),
                        datasets: [{
                            label: 'Bookings',
                            data: Object.values(budgetData),
                            backgroundColor: colors.teal.primary,
                            borderRadius: 8
                        }]
                    },
                    options: {
                        ...commonOptions,
                        aspectRatio: 1.5,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: {
                                        size: 11
                                    }
                                },
                                grid: {
                                    display: true,
                                    drawBorder: false
                                }
                            },
                            x: {
                                ticks: {
                                    font: {
                                        size: 10
                                    },
                                    maxRotation: 45,
                                    minRotation: 0
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        @endif

        // Travelers Chart
        const travelersCtx = document.getElementById('travelersChart');
        @if ($travelerStats['adults'] > 0 || $travelerStats['children'] > 0 || $travelerStats['infants'] > 0)
            if (travelersCtx) {
                const travelerData = @json($travelerStats);

                new Chart(travelersCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Adults', 'Children', 'Infants'],
                        datasets: [{
                            data: [travelerData.adults, travelerData.children, travelerData.infants],
                            backgroundColor: [
                                'rgba(15, 118, 110, 0.8)',
                                'rgba(37, 99, 235, 0.8)',
                                'rgba(234, 88, 12, 0.8)'
                            ],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        ...commonOptions,
                        aspectRatio: 1.5,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    padding: 10,
                                    font: {
                                        size: 10
                                    },
                                    boxWidth: 12
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.parsed + ' traveler' + (context.parsed !== 1 ? 's' :
                                            '');
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        @endif
    </script>

@endsection
