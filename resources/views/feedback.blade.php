{{-- Flash Messages Component with Auto-dismiss --}}
@if(session('success') || session('error') || session('warning') || session('info') || session('booking_confirmed'))
    <div id="flash-messages" class="fixed top-4 right-4 z-50 space-y-3 max-w-sm">
        
        @if (session('success'))
            <div class="flash-message bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg flex items-center shadow-md transform transition-all duration-300 ease-in-out">
                {{-- Success Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="flex-1">{{ session('success') }}</span>
                <button onclick="dismissAlert(this)" class="ml-2 text-green-500 hover:text-green-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="flash-message bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg flex items-center shadow-md transform transition-all duration-300 ease-in-out">
                {{-- Error Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 10-18 0 9 9 0 0018 0z" />
                </svg>
                <span class="flex-1">{{ session('error') }}</span>
                <button onclick="dismissAlert(this)" class="ml-2 text-red-500 hover:text-red-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('warning'))
            <div class="flash-message bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-lg flex items-center shadow-md transform transition-all duration-300 ease-in-out">
                {{-- Warning Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.863-.833-2.633 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
                <span class="flex-1">{{ session('warning') }}</span>
                <button onclick="dismissAlert(this)" class="ml-2 text-yellow-500 hover:text-yellow-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('info'))
            <div class="flash-message bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-lg flex items-center shadow-md transform transition-all duration-300 ease-in-out">
                {{-- Info Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="flex-1">{{ session('info') }}</span>
                <button onclick="dismissAlert(this)" class="ml-2 text-blue-500 hover:text-blue-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('booking_confirmed'))
            <div class="flash-message bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-lg flex items-center shadow-md transform transition-all duration-300 ease-in-out">
                {{-- Booking/Travel Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <span class="flex-1">{{ session('booking_confirmed') }}</span>
                <button onclick="dismissAlert(this)" class="ml-2 text-blue-500 hover:text-blue-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif
    </div>

    <script>
        // Auto-dismiss flash messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.flash-message');
            
            flashMessages.forEach(function(message) {
                // Auto-dismiss after 5 seconds
                setTimeout(function() {
                    dismissAlert(message);
                }, 5000);
            });
        });

        // Function to manually dismiss alerts
        function dismissAlert(element) {
            const message = element.classList ? element : element.closest('.flash-message');
            if (message) {
                message.style.transform = 'translateX(100%)';
                message.style.opacity = '0';
                
                setTimeout(function() {
                    message.remove();
                    
                    // Remove the container if no messages left
                    const container = document.getElementById('flash-messages');
                    if (container && container.children.length === 0) {
                        container.remove();
                    }
                }, 300);
            }
        }

        // Add slide-in animation when messages appear
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.flash-message');
            
            flashMessages.forEach(function(message, index) {
                message.style.transform = 'translateX(100%)';
                message.style.opacity = '0';
                
                setTimeout(function() {
                    message.style.transform = 'translateX(0)';
                    message.style.opacity = '1';
                }, 100 + (index * 100)); // Stagger the animations
            });
        });
    </script>
@endif