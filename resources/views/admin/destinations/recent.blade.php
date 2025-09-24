@extends('layouts.admin')

@section('title', 'Recent Destinations')
@section('header', 'Recent Destinations')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($destinations as $destination)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ $destination->image_url }}" alt="{{ $destination->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">{{ $destination->title }}</h3>
                    <p class="text-gray-600 mb-2">{{ $destination->short_description }}</p>
                    <a href="{{ route('admin.destinations.show', $destination->id) }}" class="text-blue-600 hover:underline">View Details</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">No recent destinations.</div>
        @endforelse
    </div>
@endsection
