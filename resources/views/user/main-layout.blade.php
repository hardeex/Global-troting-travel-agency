   <!-- Header -->
        <div class="mb-8 mt-16 lg:mt-0">
            <h1 class="font-display text-4xl lg:text-5xl font-bold text-slate-900 mb-2">Welcome back, {{ explode(' ', Auth::user()->name)[0] }}!</h1>
            <p class="text-slate-600 text-lg">Here's what's happening with your travel plans</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-orange-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">+12%</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-1">12</h3>
                <p class="text-slate-600 text-sm">Total Bookings</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-orange-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Active</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-1">3</h3>
                <p class="text-slate-600 text-sm">Upcoming Trips</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-orange-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">8 Cities</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-1">15</h3>
                <p class="text-slate-600 text-sm">Destinations Visited</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-orange-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1 rounded-full">GBP</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-1">£8,450</h3>
                <p class="text-slate-600 text-sm">Total Spent</p>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Upcoming Bookings -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-md border border-orange-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-display text-2xl font-bold text-slate-900">Upcoming Bookings</h2>
                    <a href="#" class="text-orange-500 hover:text-orange-600 font-medium text-sm transition-colors">View All →</a>
                </div>

                <div class="space-y-4">
                    <!-- Booking Item 1 -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 rounded-xl bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-100 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start space-x-4 mb-3 sm:mb-0">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=200" alt="Paris" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900 mb-1">Paris Getaway</h3>
                                <p class="text-sm text-slate-600 mb-2">5 Days, 4 Nights • Hotel + Flights</p>
                                <div class="flex items-center space-x-2 text-xs text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Feb 14 - Feb 19, 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 w-full sm:w-auto">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">Confirmed</span>
                        </div>
                    </div>

                    <!-- Booking Item 2 -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 rounded-xl bg-gradient-to-r from-amber-50 to-orange-50 border border-orange-100 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start space-x-4 mb-3 sm:mb-0">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=200" alt="London" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900 mb-1">London Business Trip</h3>
                                <p class="text-sm text-slate-600 mb-2">3 Days, 2 Nights • Hotel Only</p>
                                <div class="flex items-center space-x-2 text-xs text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Mar 5 - Mar 8, 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 w-full sm:w-auto">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">Pending</span>
                        </div>
                    </div>

                    <!-- Booking Item 3 -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 rounded-xl bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-100 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start space-x-4 mb-3 sm:mb-0">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=200" alt="Barcelona" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900 mb-1">Barcelona Summer Holiday</h3>
                                <p class="text-sm text-slate-600 mb-2">7 Days, 6 Nights • Full Package</p>
                                <div class="flex items-center space-x-2 text-xs text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Jul 12 - Jul 19, 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 w-full sm:w-auto">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">Confirmed</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="space-y-6">
                <!-- Profile Card -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">{{ Auth::user()->name }}</h3>
                            <p class="text-slate-400 text-sm">Member since 2024</p>
                        </div>
                    </div>
                    <div class="space-y-3 pt-4 border-t border-slate-700">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400 text-sm">Loyalty Points</span>
                            <span class="font-semibold text-amber-400">2,450 pts</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400 text-sm">Member Tier</span>
                            <span class="font-semibold text-orange-400">Gold</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl p-6 shadow-md border border-orange-100">
                    <h3 class="font-display text-xl font-bold text-slate-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-50 transition-all duration-200 group">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 group-hover:bg-blue-200 flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <span class="font-medium text-slate-700 group-hover:text-slate-900">New Booking</span>
                        </a>

                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-50 transition-all duration-200 group">
                            <div class="w-10 h-10 rounded-lg bg-purple-100 group-hover:bg-purple-200 flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-slate-700 group-hover:text-slate-900">Contact Support</span>
                        </a>

                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-50 transition-all duration-200 group">
                            <div class="w-10 h-10 rounded-lg bg-emerald-100 group-hover:bg-emerald-200 flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-slate-700 group-hover:text-slate-900">View Invoices</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>