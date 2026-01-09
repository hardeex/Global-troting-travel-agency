
@extends('dashboard.base')

@section('title', 'Manage Destinations')

@section('content')
<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
       <div class="mb-8">
    <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">

        <!-- Title -->
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                Manage Destinations
            </h1>
            <p class="mt-1 sm:mt-2 text-sm text-gray-600">
                View, edit, and manage all destinations
            </p>
        </div>

        <!-- Action Button -->
        <a href="{{ route('admin.bookings') }}"
           class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white
                  px-4 py-2 rounded-lg font-medium transition-colors duration-200
                  flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"></path>
            </svg>
            Back to Dashboard
        </a>

    </div>
</div>


@include('feedback')
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg" role="alert">
                <div class="flex">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg" role="alert">
                <div class="flex">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- Destinations Grid -->
        @if($destinations->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                @foreach($destinations as $destination)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <!-- Image -->
                        <div class="relative h-48 bg-gray-200">
                            @if($destination->image_url)
                                <img src="{{ $destination->image_url }}" 
                                     alt="{{ $destination->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <!-- Price Badge -->
                            <div class="absolute top-3 right-3 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ number_format($destination->price) }}
                            </div>
                            <!-- Status Badge -->
                            <div class="absolute top-3 left-3 {{ $destination->status === 'private' ? 'bg-amber-600' : 'bg-green-600' }} text-white px-3 py-1 rounded-full text-xs font-semibold capitalize">
                                {{ $destination->status }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $destination->title }}</h3>
                                    <p class="text-sm text-blue-600 font-medium">{{ $destination->country }}</p>
                                </div>
                            </div>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $destination->short_description }}</p>

                            <!-- Trip Details -->
                            <div class="flex justify-between text-xs text-gray-500 mb-4 bg-gray-50 p-3 rounded-lg">
                                <div class="text-center">
                                    <div class="font-medium text-gray-700">{{ $destination->nights }}</div>
                                    <div>Nights</div>
                                </div>
                                <div class="text-center">
                                    <div class="font-medium text-gray-700">{{ $destination->adults }}</div>
                                    <div>Adults</div>
                                </div>
                                <div class="text-center">
                                    <div class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($destination->start_date)->format('M d') }}</div>
                                    <div>Start</div>
                                </div>
                                <div class="text-center">
                                    <div class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($destination->end_date)->format('M d') }}</div>
                                    <div>End</div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <!-- View Details Button -->
                                <button onclick="showDestinationModal({{ $destination->id }})" 
                                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </button>

                                <!-- Edit Button -->
                                <button onclick="showEditModal({{ $destination }})" 
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <button onclick="confirmDelete({{ $destination->id }}, '{{ addslashes($destination->title) }}')" 
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                {{ $destinations->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-200">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No destinations found</h3>
                <p class="text-gray-500 mb-6">Get started by adding your first destination.</p>
                <button onclick="window.location.href='{{ route('admin.destinations.store') }}'" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                    Add First Destination
                </button>
            </div>
        @endif
    </div>
</div>

<!-- View Details Modal -->
<div id="viewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-screen overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Destination Details</h3>
                <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="viewModalContent">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>



<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl max-w-4xl w-full mx-4 max-h-screen overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Edit Destination </h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="edit_title" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                        <input type="text" name="country" id="edit_country" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="edit_status" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                        <input type="number" name="price" id="edit_price" required step="0.01"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Adults</label>
                        <input type="number" name="adults" id="edit_adults" required min="1"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nights</label>
                        <input type="number" name="nights" id="edit_nights" required min="1"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
    <div id="edit_image_preview_container" class="mb-3">
        <img id="edit_image_preview" src="" alt="Current destination image" 
             class="w-full h-48 object-cover rounded-lg border border-gray-300">
    </div>

    <label class="block text-sm font-medium text-gray-700 mb-2">New Image (Optional)</label>
    <input type="file" name="image" accept="image/*"
           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image</p>
</div>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                        <input type="date" name="start_date" id="edit_start_date" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                        <input type="date" name="end_date" id="edit_end_date" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
    <label class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status"
            class="w-full mt-1 border rounded-md p-2"
            required>
        <option value="public"
            {{ old('status', $destination->status) === 'public' ? 'selected' : '' }}>
            Public
        </option>
        <option value="private"
            {{ old('status', $destination->status) === 'private' ? 'selected' : '' }}>
            Private
        </option>
    </select>
</div>

                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                    <textarea name="short_description" id="edit_short_description" required rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Details</label>
                    <textarea name="details" id="edit_details" required rows="6"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeEditModal()" 
                            class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
                        Update Destination
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Delete Destination</h3>
                    <p class="text-sm text-gray-500">This action cannot be undone.</p>
                </div>
            </div>
            
            <div class="mb-6">
                <p class="text-sm text-gray-700">Are you sure you want to delete "<span id="deleteDestinationName" class="font-medium"></span>"?</p>
            </div>
            
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Store destinations data for JavaScript access
const destinations = @json($destinations->items());

// View Modal Functions
function showDestinationModal(destinationId) {
    const destination = destinations.find(d => d.id === destinationId);
    if (!destination) return;
    
    const content = `
        <div class="space-y-4">
            ${destination.image_url ? `<img src="${destination.image_url}" alt="${destination.title}" class="w-full h-64 object-cover rounded-lg">` : ''}
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Title</label>
                    <p class="text-gray-900">${destination.title}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Country</label>
                    <p class="text-gray-900">${destination.country}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Status</label>
                    <p class="text-gray-900 capitalize">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${destination.status === 'private' ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800'}">
                            ${destination.status || 'public'}
                        </span>
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Price</label>
                    <p class="text-gray-900">$${Number(destination.price).toLocaleString()}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Adults</label>
                    <p class="text-gray-900">${destination.adults}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Nights</label>
                    <p class="text-gray-900">${destination.nights}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Dates</label>
                    <p class="text-gray-900">${new Date(destination.start_date).toLocaleDateString()} - ${new Date(destination.end_date).toLocaleDateString()}</p>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500">Short Description</label>
                <p class="text-gray-900">${destination.short_description}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500">Details</label>
                <div class="text-gray-900 whitespace-pre-wrap">${destination.details}</div>
            </div>
        </div>
    `;
    
    document.getElementById('viewModalContent').innerHTML = content;
    document.getElementById('viewModal').classList.remove('hidden');
    document.getElementById('viewModal').classList.add('flex');
}

function closeViewModal() {
    document.getElementById('viewModal').classList.add('hidden');
    document.getElementById('viewModal').classList.remove('flex');
}

// Edit Modal Functions
function showEditModal(destination) {
    // Populate form fields
    document.getElementById('edit_title').value = destination.title;
    document.getElementById('edit_country').value = destination.country;
    document.getElementById('edit_status').value = destination.status || 'public';
    document.getElementById('edit_price').value = destination.price;
    document.getElementById('edit_adults').value = destination.adults;
    document.getElementById('edit_nights').value = destination.nights;
    document.getElementById('edit_start_date').value = destination.start_date;
    document.getElementById('edit_end_date').value = destination.end_date;
    document.getElementById('edit_short_description').value = destination.short_description;
    document.getElementById('edit_details').value = destination.details;

    //  Set current image preview
    const imageElement = document.getElementById('edit_image_preview');
    imageElement.src = destination.image_url 
        ? destination.image_url 
        : '/images/placeholder.jpg'; // fallback placeholder if no image

    // Set form action
    document.getElementById('editForm').action = `/admin/destinations/${destination.id}`;

    // Show modal
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}


function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

// Delete Modal Functions
function confirmDelete(destinationId, destinationName) {
    document.getElementById('deleteDestinationName').textContent = destinationName;
    document.getElementById('deleteForm').action = `/admin/destinations/${destinationId}`;
    
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
}

// Close modals when clicking outside
document.addEventListener('click', function(event) {
    const modals = ['viewModal', 'editModal', 'deleteModal'];
    modals.forEach(modalId => {
        const modal = document.getElementById(modalId);
        if (event.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });
});

// Handle form submission loading states
document.getElementById('editForm').addEventListener('submit', function() {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Updating...
    `;
});

document.getElementById('deleteForm').addEventListener('submit', function() {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Deleting...
    `;
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection