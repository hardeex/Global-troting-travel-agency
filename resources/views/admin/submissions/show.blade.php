@extends('dashboard.base')
@section('title', 'Submission Details')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 py-4 sm:py-8">
        <div class="max-w-4xl mx-auto px-3 sm:px-4 lg:px-8">

            <!-- Header with Back Button -->
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="flex-1 min-w-0">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 truncate">
                        {{ $submission['type'] }} #{{ $submission['id'] }}
                    </h1>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1">
                        Submitted {{ $submission['created_at']->format('M d, Y \a\t H:i A') }}
                    </p>
                </div>
                <a href="{{ route('admin.submissions.index') }}"
                    class="ml-3 px-3 sm:px-4 py-2 text-xs sm:text-sm text-blue-600 hover:text-blue-800 font-medium border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors flex-shrink-0">
                    ← Back
                </a>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-lg overflow-hidden">

                <!-- Status Banner -->
                @if ($submission['is_spam'])
                    <div class="bg-red-100 border-l-4 border-red-500 p-3 sm:p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-red-500 mr-2 sm:mr-3 flex-shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm sm:text-base font-semibold text-red-800">Spam Detected</p>
                                <p class="text-xs sm:text-sm text-red-700 mt-1">This submission has been marked as spam</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-green-100 border-l-4 border-green-500 p-3 sm:p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-500 mr-2 sm:mr-3 flex-shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm sm:text-base font-semibold text-green-800">Legitimate Submission</p>
                                <p class="text-xs sm:text-sm text-green-700 mt-1">This submission appears to be genuine</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Content -->
                <div class="p-4 sm:p-8">

                    <!-- Contact Information -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4 pb-2 border-b">Contact
                            Information</h3>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                            <div>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 mb-1">Email</dt>
                                <dd class="text-sm sm:text-base text-gray-900 break-all">
                                    <a href="mailto:{{ $submission['email'] }}"
                                        class="text-blue-600 hover:text-blue-800 hover:underline">
                                        {{ $submission['email'] }}
                                    </a>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 mb-1">User Type</dt>
                                <dd class="text-sm sm:text-base text-gray-900">
                                    @if ($submission['user_id'])
                                        <span
                                            class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                                            👤 Registered User (ID: {{ $submission['user_id'] }})
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 bg-gray-100 text-gray-800 text-xs font-semibold rounded-full">
                                            Guest User
                                        </span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Technical Information -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4 pb-2 border-b">Technical
                            Details</h3>
                        <dl class="grid grid-cols-1 gap-3 sm:gap-4">
                            <div>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 mb-1">IP Address</dt>
                                <dd class="text-sm sm:text-base text-gray-900 font-mono">{{ $submission['ip_address'] }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 mb-1">User Agent</dt>
                                <dd class="text-xs sm:text-sm text-gray-900 break-all">{{ $submission['user_agent'] }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 mb-1">Submission Time</dt>
                                <dd class="text-sm sm:text-base text-gray-900">
                                    {{ $submission['created_at']->format('l, F j, Y \a\t g:i A') }}
                                    <span
                                        class="text-xs text-gray-500">({{ $submission['created_at']->diffForHumans() }})</span>
                                </dd>
                            </div>
                            @if ($submission['marketing_consent'] !== null)
                                <div>
                                    <dt class="text-xs sm:text-sm font-medium text-gray-500 mb-1">Marketing Consent</dt>
                                    <dd class="text-sm sm:text-base text-gray-900">
                                        @if ($submission['marketing_consent'])
                                            <span
                                                class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">✓
                                                Opted In</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-gray-100 text-gray-800 text-xs font-semibold rounded-full">✗
                                                Opted Out</span>
                                        @endif
                                    </dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    <!-- Complete Submission Data -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4 pb-2 border-b">Complete
                            Data</h3>

                        <!-- Key-Value Display for Better Mobile Readability -->
                        <div class="space-y-3">
                            @foreach ($submission['data'] as $key => $value)
                                @if (
                                    !in_array($key, [
                                        'id',
                                        'created_at',
                                        'updated_at',
                                        'ip_address',
                                        'user_agent',
                                        'is_spam',
                                        'marketing_consent',
                                        'user_id',
                                        'payload',
                                    ]))
                                    <div class="bg-gray-50 rounded-lg p-3 sm:p-4">
                                        <dt
                                            class="text-xs sm:text-sm font-medium text-gray-600 mb-1 uppercase tracking-wide">
                                            {{ Str::headline($key) }}
                                        </dt>
                                        <dd class="text-sm sm:text-base text-gray-900">
                                            @if (is_array($value))
                                                <div class="bg-white rounded p-2 mt-1 overflow-x-auto">
                                                    <pre class="text-xs sm:text-sm">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                                                </div>
                                            @elseif(is_bool($value))
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold rounded-full {{ $value ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $value ? 'Yes' : 'No' }}
                                                </span>
                                            @elseif(empty($value))
                                                <span class="text-gray-400 italic text-sm">Not provided</span>
                                            @else
                                                <span class="break-words">{{ $value }}</span>
                                            @endif
                                        </dd>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Raw JSON (Collapsible on Mobile) -->
                        <details class="mt-4 sm:mt-6">
                            <summary
                                class="cursor-pointer text-sm sm:text-base font-medium text-blue-600 hover:text-blue-800 mb-2">
                                Show Raw JSON Data
                            </summary>
                            <div class="bg-gray-900 text-gray-100 rounded-lg p-3 sm:p-4 overflow-x-auto">
                                <pre class="text-xs sm:text-sm">{{ json_encode($submission['data'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                            </div>
                        </details>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                        @if ($type !== 'inquiry')
                            <form method="POST"
                                action="{{ route('admin.submissions.toggle-spam', [$type, $submission['id']]) }}"
                                class="flex-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="w-full px-4 sm:px-6 py-2.5 sm:py-3 bg-yellow-600 text-white text-sm sm:text-base font-semibold rounded-lg hover:bg-yellow-700 transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                    {{ $submission['is_spam'] ? 'Mark as Legitimate' : 'Mark as Spam' }}
                                </button>
                            </form>
                        @endif

                        <form method="POST" action="{{ route('admin.submissions.destroy', [$type, $submission['id']]) }}"
                            onsubmit="return confirm('Are you sure you want to delete this submission? This action cannot be undone.');"
                            class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full px-4 sm:px-6 py-2.5 sm:py-3 bg-red-600 text-white text-sm sm:text-base font-semibold rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Delete Submission
                            </button>
                        </form>
                    </div>

                    <!-- Additional Quick Actions -->
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <a href="mailto:{{ $submission['email'] }}"
                            class="block w-full px-4 py-2 text-center text-sm sm:text-base text-blue-600 hover:text-blue-800 font-medium border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                            📧 Send Email to {{ Str::limit($submission['email'], 30) }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card (Mobile Friendly) -->
            <div class="mt-4 sm:mt-6 bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4">
                <div class="flex items-start gap-2 sm:gap-3">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm text-blue-800 font-medium mb-1">Submission Information</p>
                        <ul class="text-xs sm:text-sm text-blue-700 space-y-1">
                            <li>• This is a <strong>{{ $submission['type'] }}</strong> submission</li>
                            <li>• Received {{ $submission['created_at']->diffForHumans() }}</li>
                            @if ($submission['is_spam'])
                                <li>• Currently marked as <strong class="text-red-600">SPAM</strong></li>
                            @else
                                <li>• Currently marked as <strong class="text-green-600">LEGITIMATE</strong></li>
                            @endif
                            @if ($submission['user_id'])
                                <li>• Submitted by a <strong>registered user</strong></li>
                            @else
                                <li>• Submitted by a <strong>guest visitor</strong></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
