<div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8 mt-12">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-sky-400 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Booking Dashboard</h1>
                        <p class="text-gray-600">Manage all booking submissions</p>
                    </div>
                </div>

                <form action="{{ route('admin.export.contacts') }}" method="POST">
    @csrf
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 ml-4">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zm4 4h8m-8 4h5m-5 4h3"></path>
        </svg>
        Export Contacts
    </button>
</form>


                @if(session('is_admin'))
                    <form action="{{ route('admin.logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                @endif
            </div>
        </div>