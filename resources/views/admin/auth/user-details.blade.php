@extends('dashboard.base')
@section('title', 'User Details | Admin Dashboard')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900 text-white py-8">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold mb-2">User Details</h1>
                        <p class="text-blue-100">Viewing profile for {{ $user->name }}</p>
                    </div>
                    <a href="{{ route('admin.users') }}"
                        class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 backdrop-blur-lg px-6 py-3 rounded-xl border border-white/20 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Users
                    </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- User Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <!-- Avatar -->
                        <div class="text-center mb-6">
                            <div
                                class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full text-white font-bold text-4xl mb-4">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                            <p class="text-gray-600">{{ $user->email }}</p>
                        </div>

                        <!-- Role Badge -->
                        <div class="flex justify-center mb-6">
                            @if ($user->role === 'admin')
                                <span
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-bold bg-purple-100 text-purple-800">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Administrator
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Regular User
                                </span>
                            @endif
                        </div>

                        <!-- User Info -->
                        <div class="space-y-4">
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="text-xs text-gray-500">Phone</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $user->phone ?? 'Not provided' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="text-xs text-gray-500">Member Since</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $user->created_at->format('M d, Y') }}
                                    </p>
                                    <p class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <div>
                                    <p class="text-xs text-gray-500">User ID</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $user->id }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        @if ($user->id !== Auth::id())
                            <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                                <button
                                    onclick="openRoleModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->role }}')"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-purple-100 hover:bg-purple-200 text-purple-700 rounded-xl font-semibold transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    Change Role
                                </button>

                                <button onclick="openDeleteModal({{ $user->id }}, '{{ $user->name }}')"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-red-100 hover:bg-red-200 text-red-700 rounded-xl font-semibold transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Delete User
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Activity & Statistics -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Total Bookings</p>
                                    <h3 class="text-3xl font-bold text-blue-600">{{ $bookings->count() }}</h3>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Total Inquiries</p>
                                    <h3 class="text-3xl font-bold text-green-600">{{ $inquiries->count() }}</h3>
                                </div>
                                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Account Age</p>
                                    <h3 class="text-3xl font-bold text-purple-600">
                                        {{ $user->created_at->diffInDays(now()) }}</h3>
                                    <p class="text-xs text-gray-500 mt-1">days</p>
                                </div>
                                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Bookings -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-cyan-600">
                            <h3 class="text-lg font-bold text-white">Recent Bookings</h3>
                        </div>
                        <div class="p-6">
                            @if ($bookings->count() > 0)
                                <div class="space-y-4">
                                    @foreach ($bookings as $booking)
                                        <div
                                            class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-semibold text-gray-900">
                                                    {{ $booking->destination ?? 'N/A' }}</p>
                                                <p class="text-xs text-gray-500">{{ $booking->trip_type ?? 'Trip' }} •
                                                    {{ $booking->created_at->format('M d, Y') }}</p>
                                            </div>
                                            <span
                                                class="text-xs font-medium text-gray-500">{{ $booking->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                    <p class="text-gray-500">No bookings yet</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Recent Inquiries -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gradient-to-r from-green-600 to-emerald-600">
                            <h3 class="text-lg font-bold text-white">Recent Inquiries</h3>
                        </div>
                        <div class="p-6">
                            @if ($inquiries->count() > 0)
                                <div class="space-y-4">
                                    @foreach ($inquiries as $inquiry)
                                        <div
                                            class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg hover:bg-green-50 transition-colors">
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-semibold text-gray-900">
                                                    {{ $inquiry->destination->name ?? 'General Inquiry' }}</p>
                                                <p class="text-xs text-gray-500">{{ Str::limit($inquiry->message, 60) }}
                                                </p>
                                                <p class="text-xs text-gray-400 mt-1">
                                                    {{ $inquiry->created_at->format('M d, Y') }}</p>
                                            </div>
                                            <span
                                                class="text-xs font-medium text-gray-500">{{ $inquiry->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                        </path>
                                    </svg>
                                    <p class="text-gray-500">No inquiries yet</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Role Modal -->
    <div id="roleModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeRoleModal()"></div>
        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Change User Role</h3>
                <p class="text-gray-600 mb-6">Change the role for <strong id="roleUserName"></strong>?</p>

                <form id="roleForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Select New Role</label>
                        <div class="space-y-3">
                            <label
                                class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-500 transition-colors">
                                <input type="radio" name="role" value="user" class="w-4 h-4 text-blue-600">
                                <div class="ml-3">
                                    <span class="font-semibold text-gray-900">Regular User</span>
                                    <p class="text-xs text-gray-500">Standard user access</p>
                                </div>
                            </label>
                            <label
                                class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-purple-500 transition-colors">
                                <input type="radio" name="role" value="admin" class="w-4 h-4 text-purple-600">
                                <div class="ml-3">
                                    <span class="font-semibold text-gray-900">Administrator</span>
                                    <p class="text-xs text-gray-500">Full system access</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="closeRoleModal()"
                            class="flex-1 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold rounded-xl transition-all">
                            Update Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Delete User</h3>
                </div>

                <p class="text-gray-600 mb-6">Are you sure you want to delete <strong id="deleteUserName"></strong>? This
                    action cannot be undone.</p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex gap-3">
                        <button type="button" onclick="closeDeleteModal()"
                            class="flex-1 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold rounded-xl transition-all">
                            Delete User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Role Modal Functions
        function openRoleModal(userId, userName, currentRole) {
            document.getElementById('roleUserName').textContent = userName;
            document.getElementById('roleForm').action = `/admin/users/${userId}/role`;

            const radios = document.querySelectorAll('input[name="role"]');
            radios.forEach(radio => {
                if (radio.value === currentRole) {
                    radio.checked = true;
                }
            });

            document.getElementById('roleModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeRoleModal() {
            document.getElementById('roleModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Delete Modal Functions
        function openDeleteModal(userId, userName) {
            document.getElementById('deleteUserName').textContent = userName;
            document.getElementById('deleteForm').action = `/admin/users/${userId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close modals on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeRoleModal();
                closeDeleteModal();
            }
        });
    </script>

@endsection
