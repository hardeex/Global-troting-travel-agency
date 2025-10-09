<div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8 mt-12">
    {{-- <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="flex items-center justify-center w-12 h-12 bg-sky-400 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Booking Dashboard</h1>
                <p class="text-gray-600">Manage all booking submissions</p>
            </div>
        </div>

        <!-- Add Destination Button -->
        <button type="button" onclick="document.getElementById('addDestinationModal').classList.remove('hidden')"
            class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 ml-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Destination
        </button>

        <form action="{{ route('admin.export.contacts') }}" method="POST">
            @csrf
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 ml-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v16h16V4H4zm4 4h8m-8 4h5m-5 4h3"></path>
                </svg>
                Export Contacts
            </button>
        </form>


        @if (session('is_admin'))
            <form action="{{ route('admin.logout') }}" method="GET">
                @csrf
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Logout
                </button>
            </form>
        @endif
    </div> --}}

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 lg:gap-0">
    <!-- Left Section: Title and Icon -->
    <div class="flex items-center space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-sky-400 rounded-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Booking Dashboard</h1>
            <p class="text-gray-600 text-sm sm:text-base">Manage all booking and destinations</p>
        </div>
    </div>

    <!-- Right Section: Action Buttons -->
    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 lg:gap-4">
        <!-- Manage Destinations Button -->
        <a href="{{ route('admin.destinations.index') }}"
            class="inline-flex items-center justify-center px-3 py-2 sm:px-4 sm:py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 text-sm sm:text-base">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="hidden sm:inline">Manage Destinations</span>
            <span class="sm:hidden">Destinations</span>
        </a>

        <!-- Add Destination Button -->
        <button type="button" onclick="document.getElementById('addDestinationModal').classList.remove('hidden')"
            class="inline-flex items-center justify-center px-3 py-2 sm:px-4 sm:py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 text-sm sm:text-base">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span class="hidden sm:inline">Add Destination</span>
            <span class="sm:hidden">Add</span>
        </button>

        <!-- Export Contacts Button -->
        <form action="{{ route('admin.export.contacts') }}" method="POST" class="inline-block">
            @csrf
            <button type="submit"
                class="inline-flex items-center justify-center w-full px-3 py-2 sm:px-4 sm:py-2 bg-sky-600 hover:bg-sky-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 text-sm sm:text-base">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span class="hidden sm:inline">Export Contacts</span>
                <span class="sm:hidden">Export</span>
            </button>
        </form>

        <!-- Logout Button (Admin Only) -->
        @if (session('is_admin'))
            <form action="{{ route('admin.logout') }}" method="GET" class="inline-block">
                @csrf
                <button type="submit"
                    class="inline-flex items-center justify-center w-full px-3 py-2 sm:px-4 sm:py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-sm sm:text-base">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="hidden sm:inline">Logout</span>
                    <span class="sm:hidden">Exit</span>
                </button>
            </form>
        @endif
    </div>
</div>

<!-- Mobile Menu Toggle (Alternative Layout for Very Small Screens) -->
<div class="block sm:hidden mt-4 p-4 bg-gray-50 rounded-lg">
    <div class="grid grid-cols-2 gap-2">
        <!-- Quick Actions for Mobile -->
        <button type="button" onclick="document.getElementById('addDestinationModal').classList.remove('hidden')"
            class="flex flex-col items-center justify-center p-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition-colors duration-200">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span class="text-xs font-medium">Add</span>
        </button>

        <a href="{{ route('admin.destinations.index') }}"
            class="flex flex-col items-center justify-center p-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors duration-200">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-xs font-medium">Manage</span>
        </a>
    </div>
</div>
</div>


<!-- Add Destination Modal -->
<div id="addDestinationModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden overflow-y-auto">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-2xl rounded-xl p-6 relative shadow-lg">
            <!-- Close Button -->
            <button onclick="document.getElementById('addDestinationModal').classList.add('hidden')"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-4 text-gray-800">Add New Destination</h2>

            <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" class="w-full mt-1 border border-gray-300 rounded-md p-2"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Country</label>
                        <input type="text" name="country" class="w-full mt-1 border border-gray-300 rounded-md p-2"
                            required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" class="w-full mt-1 border border-gray-300 rounded-md p-2"
                            required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Short Description</label>
                        <input type="text" name="short_description"
                            class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Details</label>
                        <textarea name="details" rows="4" class="w-full mt-1 border border-gray-300 rounded-md p-2" required></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="imageInput" class="w-full mt-1" accept="image/*"
                            required onchange="previewImage(event)">

                        <!-- Preview Area -->
                        <div id="imagePreview" class="mt-4">
                            <img src="" alt="Image Preview" class="w-48 h-auto rounded-md shadow-md hidden"
                                id="preview">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="start_date"
                            class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" name="end_date"
                            class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Adults</label>
                        <input type="number" name="adults"
                            class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nights</label>
                        <input type="number" name="nights"
                            class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-md font-medium transition">
                        Save Destination
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

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
