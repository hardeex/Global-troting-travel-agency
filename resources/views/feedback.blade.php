{{-- Basic Bootstrap-style alerts --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

{{-- Enhanced Tailwind alerts with Blue Wave branding --}}
@if(session('info'))
    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded relative mb-4" role="alert">
        {{ session('info') }}
    </div>
@endif

@if (session('success'))
    <div class="mt-4 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg flex items-center shadow-md">
        {{-- Blue Wave Travel Agency Logo/Brand --}}
        <span class="text-3xl font-bold text-blue-600 dark:text-blue-400 animate-pulse mr-2">🌊</span>
        <span class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-600 tracking-tight mr-3">
            Blue Wave
            <span class="text-lg font-medium text-blue-700 dark:text-blue-300">Travel</span>
        </span>
        {{-- Success Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span class="flex-1">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="mt-4 bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg flex items-center shadow-md">
        {{-- Blue Wave Travel Agency Logo/Brand --}}
        <span class="text-3xl font-bold text-blue-600 dark:text-blue-400 animate-pulse mr-2">🌊</span>
        <span class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-600 tracking-tight mr-3">
            Blue Wave
            <span class="text-lg font-medium text-blue-700 dark:text-blue-300">Travel</span>
        </span>
        {{-- Error Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 10-18 0 9 9 0 0018 0z" />
        </svg>
        <span class="flex-1">{{ session('error') }}</span>
    </div>
@endif

{{-- Additional Blue Wave branded alert variations --}}
@if (session('warning'))
    <div class="mt-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-lg flex items-center shadow-md">
        {{-- Blue Wave Travel Agency Logo/Brand --}}
        <span class="text-3xl font-bold text-blue-600 dark:text-blue-400 animate-pulse mr-2">🌊</span>
        <span class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-600 tracking-tight mr-3">
            Blue Wave
            <span class="text-lg font-medium text-blue-700 dark:text-blue-300">Travel</span>
        </span>
        {{-- Warning Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.863-.833-2.633 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
        </svg>
        <span class="flex-1">{{ session('warning') }}</span>
    </div>
@endif

@if (session('booking_confirmed'))
    <div class="mt-4 bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-lg flex items-center shadow-md">
        {{-- Blue Wave Travel Agency Logo/Brand --}}
        <span class="text-3xl font-bold text-blue-600 dark:text-blue-400 animate-pulse mr-2">🌊</span>
        <span class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-600 tracking-tight mr-3">
            Blue Wave
            <span class="text-lg font-medium text-blue-700 dark:text-blue-300">Travel</span>
        </span>
        {{-- Booking/Travel Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
        </svg>
        <span class="flex-1">{{ session('booking_confirmed') }}</span>
    </div>
@endif