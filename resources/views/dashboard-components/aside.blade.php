<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <a href="{{ route('index') }}" class="p-6 border-b">
            <h1 class="text-2xl font-bold text-blue-600">Dashboard</h1>
        </a>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

            <!-- Overview -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ Route::currentRouteName() === 'admin.dashboard'
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="font-medium">Overview</span>
            </a>


            <!-- Add New Destination -->
            <a href="{{ route('admin.destinations.create') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ Route::currentRouteName() === 'admin.destinations.create'
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="font-medium">Add New Destination</span>
            </a>


            <!-- Manage Destination -->
            <a href="{{ route('admin.destinations.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ in_array(Route::currentRouteName(), ['admin.destinations.index', 'admin.destinations.edit'])
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="font-medium">Manage Destination</span>
            </a>


            <!-- Export Contacts -->
            <a href="{{ route('admin.export.contacts.page') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ Route::currentRouteName() === 'admin.export.contacts.page'
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                <span class="font-medium">Export Contacts</span>
            </a>

            <!-- Manage Contact & Bookings -->
            <a href="{{ route('admin.bookings') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ Route::currentRouteName() === 'admin.bookings'
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-medium">Manage Contact & Bookings</span>
            </a>


            <!-- Manage Inquiries -->
            <a href="{{ route('admin.inquiries.manage') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ Route::currentRouteName() === 'admin.inquiries.manage'
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">Manage Inquiries</span>
            </a>

            <!-- Manage Users -->
            <a href="{{ route('admin.users') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition
               {{ in_array(Route::currentRouteName(), ['admin.users', 'admin.user.view'])
                   ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white'
                   : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="font-medium">Manage Users</span>
            </a>



            <a href="{{ route('admin.submissions.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors {{ request()->routeIs('admin.submissions.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span>All Submissions</span>
                {{-- @if ($unreadCount > 0)
                    <span class="ml-auto px-2 py-1 text-xs font-bold bg-red-500 text-white rounded-full">
                        {{ $unreadCount }}
                    </span>
                @endif --}}
            </a>

            <!-- Logout Button (Admin Only) -->
            @if (Auth::check() && Auth::user()->role === 'admin')
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full px-4 py-3 text-sm font-medium rounded-lg transition bg-red-500 hover:bg-red-600 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            @endif
        </nav>
    </div>
</aside>
