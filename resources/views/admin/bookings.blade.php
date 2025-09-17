@extends('components.base')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-sky-50 to-sky-100">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header -->
        @include('dashboard.header')

        <!-- Stats Overview -->
        @include('dashboard.stas')

        <!-- Filters -->
        @include('dashboard.filter')

        <!-- Booking List -->
        @include('dashboard.booking-list')

        <!-- Pagination -->
        @if($submissions->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-4">
                    {{ $submissions->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection