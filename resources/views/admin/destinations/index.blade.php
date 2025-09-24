@extends('layouts.admin')

@section('title', 'Destinations List')
@section('header', 'All Destinations')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.destinations.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
            Add Destination
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Country</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">End Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($destinations as $destination)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $destination->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $destination->country }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $destination->start_date->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $destination->end_date->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <a href="{{ route('admin.destinations.edit', $destination->id) }}"
                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.destinations.destroy', $destination->id) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No destinations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-4">
            {{ $destinations->links() }} {{-- pagination links --}}
        </div>
    </div>
@endsection
