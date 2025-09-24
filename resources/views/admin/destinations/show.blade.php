@extends('layouts.admin')

@section('title', 'View Destination')
@section('header', 'Destination Details')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="mb-4">
            <img src="{{ $destination->image_url }}" alt="{{ $destination->title }}" class="w-full h-auto rounded-md">
        </div>
        <h2 class="text-2xl font-bold mb-2">{{ $destination->title }}</h2>
        <p class="text-gray-600 mb-4">{{ $destination->short_description }}</p>

        <div class="mb-4">
            <strong>Country:</strong> {{ $destination->country }} <br>
            <strong>Price:</strong> {{ number_format($destination->price, 2) }} <br>
            <strong>Start Date:</strong> {{ $destination->start_date->format('Y-m-d') }} <br>
            <strong>End Date:</strong> {{ $destination->end_date->format('Y-m-d') }} <br>
            <strong>Adults:</strong> {{ $destination->adults }} <br>
            <strong>Nights:</strong> {{ $destination->nights }}
        </div>

        <div class="mb-4">
            <strong>Details:</strong>
            <p class="mt-2 whitespace-pre-line">{{ $destination->details }}</p>
        </div>

        <div>
            <a href="{{ route('admin.destinations.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">Back to List</a>
        </div>
    </div>
@endsection
