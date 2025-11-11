@extends('layouts.admin')

@section('title', 'Edit Destination')
@section('header', 'Edit Destination ')

@section('content')
    <form action="{{ route('admin.destinations.update', $destination->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Price --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" value="{{ old('price', $destination->price) }}"
                       class="w-full mt-1 border rounded-md p-2" required>
            </div>

            {{-- Country --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" name="country" value="{{ old('country', $destination->country) }}"
                       class="w-full mt-1 border rounded-md p-2" required>
            </div>

            {{-- Title --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $destination->title) }}"
                       class="w-full mt-1 border rounded-md p-2" required>
            </div>

            {{-- Short Description --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                <input type="text" name="short_description"
                       value="{{ old('short_description', $destination->short_description) }}"
                       class="w-full mt-1 border rounded-md p-2" required>
            </div>

            {{-- Details --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Details</label>
                <textarea name="details" rows="4" class="w-full mt-1 border rounded-md p-2" required>{{ old('details', $destination->details) }}</textarea>
            </div>

            {{-- Image Preview & Upload --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                       class="w-full mt-1">
                @if($destination->image_url)
                    <div class="mt-4">
                        <img src="{{ $destination->image_url }}" alt="Current Image" class="w-48 h-auto rounded-md shadow-md">
                    </div>
                @endif
                <div id="imagePreview" class="mt-4">
                    <img src="" alt="New Image Preview" id="preview" class="w-48 h-auto rounded-md shadow-md hidden">
                </div>
            </div>

            {{-- Start Date, End Date --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" name="start_date"
                       value="{{ old('start_date', $destination->start_date->toDateString()) }}"
                       class="w-full mt-1 border rounded-md p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" name="end_date"
                       value="{{ old('end_date', $destination->end_date->toDateString()) }}"
                       class="w-full mt-1 border rounded-md p-2" required>
            </div>

            {{-- Adults --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Adults</label>
                <input type="number" name="adults"
                       value="{{ old('adults', $destination->adults) }}"
                       class="w-full mt-1 border rounded-md p-2" min="1" required>
            </div>

            {{-- Nights --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nights</label>
                <input type="number" name="nights"
                       value="{{ old('nights', $destination->nights) }}"
                       class="w-full mt-1 border rounded-md p-2" min="1" required>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.destinations.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">Update</button>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const file = input.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
    </script>
@endsection
