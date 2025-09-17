<div class="space-y-4">
    @forelse($submissions as $submission)
        @php
            $data = json_decode($submission->payload, true);
            $uid = uniqid(); // unique identifier for Alpine instance
        @endphp

        <div x-data="{ open_{{ $uid }}: false }" class="bg-white rounded-xl shadow-sm border border-sky-100 overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="flex-shrink-0">
                                @php
                                    $typeColors = [
                                        'car' => 'bg-blue-100 text-blue-800',
                                        'flight' => 'bg-purple-100 text-purple-800',
                                        'stay' => 'bg-green-100 text-green-800',
                                        'activity' => 'bg-yellow-100 text-yellow-800',
                                        'hotel' => 'bg-red-100 text-red-800',
                                        'custom' => 'bg-gray-100 text-gray-800',
                                        'contact' => 'bg-pink-100 text-pink-800'
                                    ];
                                    $type = $data['booking_type'] ?? 'N/A';
                                    $colorClass = $typeColors[$type] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colorClass }}">
                                    {{ ucfirst($type) }}
                                </span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($submission->created_at)->format('M j, Y \a\t g:i A') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ e($data['name'] ?? 'N/A') }}</p>
                                    <p class="text-xs text-gray-500">Customer Name</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ e($data['email'] ?? 'N/A') }}</p>
                                    <p class="text-xs text-gray-500">Email Address</p>
                                </div>
                            </div>
                        </div>

                        @if(isset($data['phone']))
                            <div class="flex items-center mb-4">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ e($data['phone']) }}</p>
                                    <p class="text-xs text-gray-500">Phone Number</p>
                                </div>
                            </div>
                        @endif

                        @if(isset($data['message']))
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 font-medium mb-1">Message:</p>
                                <p class="text-sm text-gray-800">{{ e($data['message']) }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- View Details Button -->
                    <div class="flex-shrink-0 ml-6">
                        <button @click="open_{{ $uid }} = true"
                                class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="open_{{ $uid }}" x-cloak
                 class="fixed inset-0 bg-black bg-opacity-40 z-40 flex items-center justify-center p-4"
                 @click.self="open_{{ $uid }} = false">
                <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-auto z-50 overflow-hidden">
                    <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                        <h4 class="text-lg font-medium text-gray-900">Submission Details</h4>
                        <button @click="open_{{ $uid }} = false" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5 max-h-[70vh] overflow-y-auto text-sm text-gray-800">
                        @php
                            $readableFields = [
                                'name' => 'Customer Name',
                                'email' => 'Email Address',
                                'phone' => 'Phone Number',
                                'message' => 'Message',
                                'preferred_contact' => 'Preferred Contact Method',
                                'booking_type' => 'Booking Type',
                                'custom_destination' => 'Custom Destination',
                                'custom_style' => 'Custom Style',
                                'custom_budget' => 'Custom Budget',
                                'custom_start' => 'Custom Start Date',
                                'custom_end' => 'Custom End Date',
                                'flight_departure' => 'Flight Departure',
                                'flight_arrival' => 'Flight Arrival',
                                'flight_departure_date' => 'Flight Departure Date',
                                'flight_return_date' => 'Flight Return Date',
                                'flight_adults' => 'Flight Adults',
                                'flight_children' => 'Flight Children',
                                'flight_class' => 'Flight Class',
                                'hotel_location' => 'Hotel Location',
                                'hotel_checkin' => 'Hotel Check-in',
                                'hotel_checkout' => 'Hotel Check-out',
                                'hotel_guests' => 'Hotel Guests',
                                'hotel_rooms' => 'Hotel Rooms',
                                'activity_location' => 'Activity Location',
                                'activity_date' => 'Activity Date',
                                'activity_people' => 'Activity People',
                                'activity_type' => 'Activity Type',
                                'car_pickup_location' => 'Car Pickup Location',
                                'car_dropoff_location' => 'Car Dropoff Location',
                                'car_pickup_date' => 'Car Pickup Date',
                                'car_dropoff_date' => 'Car Dropoff Date',
                                'driver_age' => 'Driver Age'
                            ];
                        @endphp

                        <ul class="divide-y divide-gray-200">
                            @foreach($readableFields as $field => $label)
                                @if(!empty($data[$field]))
                                    <li class="py-2">
                                        <span class="font-medium text-gray-700">{{ $label }}:</span>
                                        <span class="ml-1">{{ e($data[$field]) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-12 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings found</h3>
            <p class="text-gray-600">No submissions match your current filters. Try adjusting your search criteria.</p>
        </div>
    @endforelse
</div>
