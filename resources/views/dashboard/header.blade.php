<div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8 mt-12">
    <div class="flex items-center justify-between">
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
<button 
    type="button" 
    onclick="document.getElementById('addDestinationModal').classList.remove('hidden')" 
    class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 ml-4">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 4v16m8-8H4" />
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
    </div>
</div>


<!-- Add Destination Modal -->
<div id="addDestinationModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden overflow-y-auto">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-2xl rounded-xl p-6 relative shadow-lg">
        <!-- Close Button -->
        <button 
            onclick="document.getElementById('addDestinationModal').classList.add('hidden')" 
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            ✕
        </button>

        <h2 class="text-xl font-bold mb-4 text-gray-800">Add New Destination</h2>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" name="country" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Short Description</label>
                    <input type="text" name="short_description" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Details</label>
                    <textarea name="details" rows="4" class="w-full mt-1 border border-gray-300 rounded-md p-2" required></textarea>
                </div>
               <div class="col-span-2">
    <label class="block text-sm font-medium text-gray-700">Image</label>
    <input type="file" name="image" id="imageInput" class="w-full mt-1" accept="image/*" required onchange="previewImage(event)">
    
    <!-- Preview Area -->
    <div id="imagePreview" class="mt-4">
        <img src="" alt="Image Preview" class="w-48 h-auto rounded-md shadow-md hidden" id="preview">
    </div>
</div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Adults</label>
                    <input type="number" name="adults" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nights</label>
                    <input type="number" name="nights" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
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
