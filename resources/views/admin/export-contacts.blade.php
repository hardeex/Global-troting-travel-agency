@extends('dashboard.base')
@section('title', 'Exporting Contacts')
@section('content')

    <div class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-blue-50 flex items-center justify-center p-4">
        <div class="max-w-md w-full">

            <!-- Main Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center">

                <!-- Animated Icon -->
                <div class="mb-6 relative inline-block">
                    <!-- Spinning Circle -->
                    <div class="w-24 h-24 rounded-full border-4 border-sky-100 border-t-sky-600 animate-spin"></div>

                    <!-- Center Icon -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="bg-white rounded-full p-2">
                            <svg class="w-10 h-10 text-sky-600 animate-pulse" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Exporting Contacts</h2>

                <!-- Description -->
                <p class="text-gray-600 mb-6">
                    Please wait while we process and export your contacts. This may take a few moments...
                </p>

                <!-- Progress Bar -->
                <div class="w-full bg-gray-200 rounded-full h-2 mb-6 overflow-hidden">
                    <div class="bg-gradient-to-r from-sky-500 to-blue-600 h-full rounded-full animate-progress"></div>
                </div>

                <!-- Status Messages -->
                <div class="space-y-2 text-sm text-gray-500">
                    <div class="flex items-center justify-center gap-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span>Gathering contact data...</span>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse delay-100"></div>
                        <span>Formatting CSV file...</span>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse delay-200"></div>
                        <span>Preparing email...</span>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm text-blue-700 text-left">
                            The exported file will be sent to your registered email address.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom Text -->
            <p class="text-center text-gray-500 text-sm mt-6">
                Do not close this window or navigate away
            </p>
        </div>
    </div>

    <style>
        @keyframes progress {
            0% {
                width: 0%;
            }

            50% {
                width: 70%;
            }

            100% {
                width: 100%;
            }
        }

        .animate-progress {
            animation: progress 3s ease-in-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }
    </style>

    <script>
        // Auto-submit form after page loads
        window.addEventListener('DOMContentLoaded', function() {
            // Simulate the export process
            setTimeout(function() {
                // Actually trigger the export
                fetch('{{ route('admin.export.contacts') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        // Check if response is ok
                        if (!response.ok) {
                            throw new Error('Export failed with status ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Check if the export was successful
                        if (data.success) {
                            // Redirect with success parameter
                            window.location.href = '{{ route('admin.bookings') }}?export=success';
                        } else {
                            throw new Error(data.message || 'Export failed');
                        }
                    })
                    .catch(error => {
                        console.error('Export Error:', error);
                        alert('An error occurred while exporting contacts: ' + error.message);
                        window.location.href = '{{ route('admin.bookings') }}';
                    });
            }, 1000);
        });
    </script>

@endsection
