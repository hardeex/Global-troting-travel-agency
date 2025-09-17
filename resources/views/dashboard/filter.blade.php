<div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filters</h3>
            <form method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Booking Type</label>
                    <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400 bg-white">
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
                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Name or Email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">From Date</label>
                    <input type="date" name="from" value="{{ request('from') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">To Date</label>
                    <input type="date" name="to" value="{{ request('to') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:border-sky-400">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">&nbsp;</label>
                    <div class="flex space-x-2">
                        <button type="submit" class="flex-1 bg-sky-400 hover:bg-sky-500 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('admin.bookings') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                            Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>