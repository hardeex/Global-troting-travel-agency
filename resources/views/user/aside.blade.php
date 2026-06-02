<aside id="sidebar"
    class="fixed left-0 top-0 h-full w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40 shadow-2xl">

    <!-- User -->
    <div class="p-6 border-b border-slate-700/50">
        <a href="{{ route('index') }}" class="flex items-center space-x-3">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <h2 class="font-semibold text-lg">{{ Auth::user()->name }}</h2>
                <p class="text-slate-400 text-sm">{{ Auth::user()->email }}</p>
            </div>
        </a>
    </div>

    <!-- Nav -->
    <nav class="p-4 space-y-1">

        <!-- Dashboard -->
        <a href="{{ route('user.dashboard') }}"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition-all duration-200
           {{ Route::currentRouteName() === 'user.dashboard'
                ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md'
                : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- My Bookings -->
        <a href="{{ route('user.bookings.contacts') }}"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200
           {{ Route::currentRouteName() === 'user.bookings.contacts'
                ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md'
                : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>My Bookings / Contacts</span>
        </a>

        <!-- Destinations -->
        <a href="{{ route('inquiries.index') }}"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200
           {{ Route::currentRouteName() === 'inquiries.index'
                ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md'
                : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Destinations</span>
        </a>

        <!-- Scheduled Trips -->
        <a href="{{ route('user.scheduled-trips') }}"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200
           {{ Route::currentRouteName() === 'user.scheduled-trips'
                ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md'
                : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Scheduled Trips</span>
        </a>

    </nav>

    <!-- Logout -->
    <div class="absolute bottom-0 w-full p-4 border-t border-slate-700/50">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center space-x-2 px-4 py-3 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all duration-200 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
