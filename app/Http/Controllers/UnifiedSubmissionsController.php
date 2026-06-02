<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/**
 * Unified Submissions Management Controller
 * Manages ALL form submissions (form_submissions, bookings, inquiries) in one place
 */
class UnifiedSubmissionsController extends Controller
{
    /**
     * Display unified submissions dashboard with all types
     */
    public function index(Request $request)
    {
        // Check admin authorization
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        Log::info('Admin accessed unified submissions dashboard', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'filters' => $request->all(),
        ]);

        // Get filter parameters
        $search = $request->input('search');
        $submissionType = $request->input('type'); // 'form', 'booking', 'inquiry', or 'all'
        $spamFilter = $request->input('spam'); // 'all', 'spam', 'legitimate'
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');

        // Collect all submissions from different tables
        $allSubmissions = collect();

        // 1. Get form_submissions
        if (!$submissionType || $submissionType === 'all' || $submissionType === 'form') {
            $formSubmissions = DB::table('form_submissions')
                ->select([
                    'id',
                    'email',
                    'payload',
                    'ip_address',
                    'user_agent',
                    'is_spam',
                    'marketing_consent',
                    'user_id',
                    'created_at',
                    DB::raw("'form' as submission_type")
                ])
                ->when($spamFilter === 'spam', fn($q) => $q->where('is_spam', true))
                ->when($spamFilter === 'legitimate', fn($q) => $q->where('is_spam', false))
                ->when($dateFrom, fn($q) => $q->whereDate('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->whereDate('created_at', '<=', $dateTo))
                ->when($search, function ($q) use ($search) {
                    $searchLower = strtolower($search);
                    $q->where(function ($query) use ($search, $searchLower) {
                        $query->whereRaw('LOWER(email) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(payload) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(ip_address) LIKE ?', ["%{$searchLower}%"]);
                    });
                })
                ->get()
                ->map(function ($item) {
                    $payload = json_decode($item->payload, true) ?? [];
                    return [
                        'id' => $item->id,
                        'type' => 'form',
                        'type_label' => 'Form Submission',
                        'name' => $payload['name'] ?? 'N/A',
                        'email' => $item->email,
                        'phone' => $payload['phone'] ?? 'N/A',
                        'booking_type' => $payload['booking_type'] ?? 'N/A',
                        'message' => $payload['message'] ?? 'N/A',
                        'is_spam' => (bool) $item->is_spam,
                        'marketing_consent' => (bool) $item->marketing_consent,
                        'ip_address' => $item->ip_address,
                        'user_agent' => $item->user_agent,
                        'user_id' => $item->user_id,
                        'created_at' => Carbon::parse($item->created_at),
                        'payload' => $payload,
                    ];
                });

            $allSubmissions = $allSubmissions->merge($formSubmissions);
        }

        // 2. Get bookings
        if (!$submissionType || $submissionType === 'all' || $submissionType === 'booking') {
            $bookings = Booking::query()
                ->select([
                    'id',
                    'full_name',
                    'email',
                    'phone',
                    'destination',
                    'departure_date',
                    'return_date',
                    'adults',
                    'children',
                    'budget',
                    'special_requests',
                    'is_spam',
                    'marketing_consent',
                    'ip_address',
                    'user_agent',
                    'user_id',
                    'created_at',
                ])
                ->when($spamFilter === 'spam', fn($q) => $q->where('is_spam', true))
                ->when($spamFilter === 'legitimate', fn($q) => $q->where('is_spam', false))
                ->when($dateFrom, fn($q) => $q->whereDate('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->whereDate('created_at', '<=', $dateTo))
                ->when($search, function ($q) use ($search) {
                    $searchLower = strtolower($search);
                    $q->where(function ($query) use ($search, $searchLower) {
                        $query->whereRaw('LOWER(full_name) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(email) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(phone) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(destination) LIKE ?', ["%{$searchLower}%"]);
                    });
                })
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'type' => 'booking',
                        'type_label' => 'Travel Booking',
                        'name' => $booking->full_name,
                        'email' => $booking->email,
                        'phone' => $booking->phone,
                        'booking_type' => 'Travel Package',
                        'message' => $booking->special_requests ?? 'N/A',
                        'destination' => $booking->destination,
                        'departure_date' => $booking->departure_date,
                        'return_date' => $booking->return_date,
                        'travelers' => $booking->adults + ($booking->children ?? 0),
                        'budget' => $booking->budget,
                        'is_spam' => (bool) $booking->is_spam,
                        'marketing_consent' => (bool) $booking->marketing_consent,
                        'ip_address' => $booking->ip_address,
                        'user_agent' => $booking->user_agent,
                        'user_id' => $booking->user_id,
                        'created_at' => $booking->created_at,
                        'payload' => $booking->toArray(),
                    ];
                });

            $allSubmissions = $allSubmissions->merge($bookings);
        }

        // 3. Get inquiries
        if (!$submissionType || $submissionType === 'all' || $submissionType === 'inquiry') {
            $inquiries = Inquiry::with('destination')
                ->select([
                    'id',
                    'destination_id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone',
                    'message',
                    'ip_address',
                    'user_agent',
                    'user_id',
                    'created_at',
                ])
                ->when($dateFrom, fn($q) => $q->whereDate('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->whereDate('created_at', '<=', $dateTo))
                ->when($search, function ($q) use ($search) {
                    $searchLower = strtolower($search);
                    $q->where(function ($query) use ($search, $searchLower) {
                        $query->whereRaw('LOWER(first_name) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(email) LIKE ?', ["%{$searchLower}%"])
                              ->orWhereRaw('LOWER(phone) LIKE ?', ["%{$searchLower}%"]);
                    });
                })
                ->get()
                ->map(function ($inquiry) {
                    return [
                        'id' => $inquiry->id,
                        'type' => 'inquiry',
                        'type_label' => 'Destination Inquiry',
                        'name' => $inquiry->first_name . ' ' . $inquiry->last_name,
                        'email' => $inquiry->email,
                        'phone' => $inquiry->phone ?? 'N/A',
                        'booking_type' => 'Destination Interest',
                        'message' => $inquiry->message ?? 'N/A',
                        'destination' => $inquiry->destination->title ?? 'N/A',
                        'destination_country' => $inquiry->destination->country ?? 'N/A',
                        'is_spam' => false, // Inquiries don't have spam field (filtered before saving)
                        'marketing_consent' => null,
                        'ip_address' => $inquiry->ip_address,
                        'user_agent' => $inquiry->user_agent,
                        'user_id' => $inquiry->user_id,
                        'created_at' => $inquiry->created_at,
                        'payload' => $inquiry->toArray(),
                    ];
                });

            $allSubmissions = $allSubmissions->merge($inquiries);
        }

        // Sort the combined collection
        $allSubmissions = $sortOrder === 'desc'
            ? $allSubmissions->sortByDesc($sortBy)
            : $allSubmissions->sortBy($sortBy);

        // Paginate manually
        $perPage = 25;
        $currentPage = $request->input('page', 1);
        $submissions = new \Illuminate\Pagination\LengthAwarePaginator(
            $allSubmissions->forPage($currentPage, $perPage),
            $allSubmissions->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Calculate statistics
        $stats = [
            'total' => [
                'all' => DB::table('form_submissions')->count() + 
                         Booking::count() + 
                         Inquiry::count(),
                'forms' => DB::table('form_submissions')->count(),
                'bookings' => Booking::count(),
                'inquiries' => Inquiry::count(),
            ],
            'today' => [
                'all' => DB::table('form_submissions')->whereDate('created_at', today())->count() +
                         Booking::whereDate('created_at', today())->count() +
                         Inquiry::whereDate('created_at', today())->count(),
                'forms' => DB::table('form_submissions')->whereDate('created_at', today())->count(),
                'bookings' => Booking::whereDate('created_at', today())->count(),
                'inquiries' => Inquiry::whereDate('created_at', today())->count(),
            ],
            'this_week' => [
                'all' => DB::table('form_submissions')
                            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                            ->count() +
                         Booking::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() +
                         Inquiry::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            ],
            'this_month' => [
                'all' => DB::table('form_submissions')
                            ->whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year)
                            ->count() +
                         Booking::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count() +
                         Inquiry::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count(),
            ],
            'spam' => [
                'forms' => DB::table('form_submissions')->where('is_spam', true)->count(),
                'bookings' => Booking::where('is_spam', true)->count(),
                'total' => DB::table('form_submissions')->where('is_spam', true)->count() +
                          Booking::where('is_spam', true)->count(),
            ],
        ];

        return view('admin.submissions.unified', compact('submissions', 'stats'));
    }

    /**
     * View detailed submission information
     */
    public function show(Request $request, $type, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $submission = null;

        switch ($type) {
            case 'form':
                $record = DB::table('form_submissions')->where('id', $id)->first();
                if ($record) {
                    $payload = json_decode($record->payload, true) ?? [];
                    $submission = [
                        'id' => $record->id,
                        'type' => 'Form Submission',
                        'data' => $payload,
                        'email' => $record->email,
                        'is_spam' => $record->is_spam,
                        'marketing_consent' => $record->marketing_consent,
                        'ip_address' => $record->ip_address,
                        'user_agent' => $record->user_agent,
                        'user_id' => $record->user_id,
                        'created_at' => Carbon::parse($record->created_at),
                    ];
                }
                break;

            case 'booking':
                $booking = Booking::find($id);
                if ($booking) {
                    $submission = [
                        'id' => $booking->id,
                        'type' => 'Travel Booking',
                        'data' => $booking->toArray(),
                        'email' => $booking->email,
                        'is_spam' => $booking->is_spam,
                        'marketing_consent' => $booking->marketing_consent,
                        'ip_address' => $booking->ip_address,
                        'user_agent' => $booking->user_agent,
                        'user_id' => $booking->user_id,
                        'created_at' => $booking->created_at,
                    ];
                }
                break;

            case 'inquiry':
                $inquiry = Inquiry::with('destination')->find($id);
                if ($inquiry) {
                    $submission = [
                        'id' => $inquiry->id,
                        'type' => 'Destination Inquiry',
                        'data' => $inquiry->toArray(),
                        'email' => $inquiry->email,
                        'is_spam' => false,
                        'marketing_consent' => null,
                        'ip_address' => $inquiry->ip_address,
                        'user_agent' => $inquiry->user_agent,
                        'user_id' => $inquiry->user_id,
                        'created_at' => $inquiry->created_at,
                    ];
                }
                break;
        }

        if (!$submission) {
            abort(404, 'Submission not found.');
        }

        return view('admin.submissions.show', compact('submission', 'type'));
    }

    /**
     * Mark submission as spam/not spam
     */
    public function toggleSpam(Request $request, $type, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $updated = false;

        switch ($type) {
            case 'form':
                $record = DB::table('form_submissions')->where('id', $id)->first();
                if ($record) {
                    DB::table('form_submissions')
                        ->where('id', $id)
                        ->update(['is_spam' => !$record->is_spam, 'updated_at' => now()]);
                    $updated = true;
                }
                break;

            case 'booking':
                $booking = Booking::find($id);
                if ($booking) {
                    $booking->update(['is_spam' => !$booking->is_spam]);
                    $updated = true;
                }
                break;
        }

        Log::info('Spam status toggled', [
            'admin_id' => Auth::id(),
            'type' => $type,
            'submission_id' => $id,
        ]);

        if ($updated) {
            return back()->with('success', 'Spam status updated successfully.');
        }

        return back()->with('error', 'Failed to update spam status.');
    }

    /**
     * Delete submission
     */
    public function destroy(Request $request, $type, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $deleted = false;

        switch ($type) {
            case 'form':
                $deleted = DB::table('form_submissions')->where('id', $id)->delete() > 0;
                break;

            case 'booking':
                $booking = Booking::find($id);
                if ($booking) {
                    $booking->delete();
                    $deleted = true;
                }
                break;

            case 'inquiry':
                $inquiry = Inquiry::find($id);
                if ($inquiry) {
                    $inquiry->delete();
                    $deleted = true;
                }
                break;
        }

        Log::info('Submission deleted', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'type' => $type,
            'submission_id' => $id,
        ]);

        if ($deleted) {
            return back()->with('success', 'Submission deleted successfully.');
        }

        return back()->with('error', 'Failed to delete submission.');
    }

    /**
     * Export all submissions to CSV
     */
    public function export(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        Log::info('Unified submissions export initiated', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'filters' => $request->all(),
        ]);

        // Apply same filters as index method
        $search = $request->input('search');
        $submissionType = $request->input('type');
        $spamFilter = $request->input('spam');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $allSubmissions = collect();

        // Get form submissions
        if (!$submissionType || $submissionType === 'all' || $submissionType === 'form') {
            $formSubmissions = DB::table('form_submissions')
                ->when($spamFilter === 'spam', fn($q) => $q->where('is_spam', true))
                ->when($spamFilter === 'legitimate', fn($q) => $q->where('is_spam', false))
                ->when($dateFrom, fn($q) => $q->whereDate('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->whereDate('created_at', '<=', $dateTo))
                ->when($search, function ($q) use ($search) {
                    $searchLower = strtolower($search);
                    $q->whereRaw('LOWER(email) LIKE ?', ["%{$searchLower}%"])
                      ->orWhereRaw('LOWER(payload) LIKE ?', ["%{$searchLower}%"]);
                })
                ->get()
                ->map(function ($item) {
                    $payload = json_decode($item->payload, true) ?? [];
                    return [
                        'ID' => $item->id,
                        'Type' => 'Form Submission',
                        'Name' => $payload['name'] ?? 'N/A',
                        'Email' => $item->email,
                        'Phone' => $payload['phone'] ?? 'N/A',
                        'Booking Type' => $payload['booking_type'] ?? 'N/A',
                        'Message' => $payload['message'] ?? 'N/A',
                        'Is Spam' => $item->is_spam ? 'Yes' : 'No',
                        'Marketing Consent' => $item->marketing_consent ? 'Yes' : 'No',
                        'IP Address' => $item->ip_address,
                        'User ID' => $item->user_id ?? 'Guest',
                        'Submitted At' => Carbon::parse($item->created_at)->format('Y-m-d H:i:s'),
                    ];
                });

            $allSubmissions = $allSubmissions->merge($formSubmissions);
        }

        // Get bookings
        if (!$submissionType || $submissionType === 'all' || $submissionType === 'booking') {
            $bookings = Booking::query()
                ->when($spamFilter === 'spam', fn($q) => $q->where('is_spam', true))
                ->when($spamFilter === 'legitimate', fn($q) => $q->where('is_spam', false))
                ->when($dateFrom, fn($q) => $q->whereDate('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->whereDate('created_at', '<=', $dateTo))
                ->when($search, function ($q) use ($search) {
                    $searchLower = strtolower($search);
                    $q->whereRaw('LOWER(full_name) LIKE ?', ["%{$searchLower}%"])
                      ->orWhereRaw('LOWER(email) LIKE ?', ["%{$searchLower}%"]);
                })
                ->get()
                ->map(function ($booking) {
                    return [
                        'ID' => $booking->id,
                        'Type' => 'Travel Booking',
                        'Name' => $booking->full_name,
                        'Email' => $booking->email,
                        'Phone' => $booking->phone,
                        'Booking Type' => 'Travel Package',
                        'Destination' => $booking->destination,
                        'Departure Date' => $booking->departure_date,
                        'Return Date' => $booking->return_date ?? 'N/A',
                        'Travelers' => $booking->adults + ($booking->children ?? 0),
                        'Budget' => $booking->budget,
                        'Message' => $booking->special_requests ?? 'N/A',
                        'Is Spam' => $booking->is_spam ? 'Yes' : 'No',
                        'Marketing Consent' => $booking->marketing_consent ? 'Yes' : 'No',
                        'IP Address' => $booking->ip_address,
                        'User ID' => $booking->user_id ?? 'Guest',
                        'Submitted At' => $booking->created_at->format('Y-m-d H:i:s'),
                    ];
                });

            $allSubmissions = $allSubmissions->merge($bookings);
        }

        // Get inquiries
        if (!$submissionType || $submissionType === 'all' || $submissionType === 'inquiry') {
            $inquiries = Inquiry::with('destination')
                ->when($dateFrom, fn($q) => $q->whereDate('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->whereDate('created_at', '<=', $dateTo))
                ->when($search, function ($q) use ($search) {
                    $searchLower = strtolower($search);
                    $q->whereRaw('LOWER(first_name) LIKE ?', ["%{$searchLower}%"])
                      ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$searchLower}%"])
                      ->orWhereRaw('LOWER(email) LIKE ?', ["%{$searchLower}%"]);
                })
                ->get()
                ->map(function ($inquiry) {
                    return [
                        'ID' => $inquiry->id,
                        'Type' => 'Destination Inquiry',
                        'Name' => $inquiry->first_name . ' ' . $inquiry->last_name,
                        'Email' => $inquiry->email,
                        'Phone' => $inquiry->phone ?? 'N/A',
                        'Booking Type' => 'Destination Interest',
                        'Destination' => $inquiry->destination->title ?? 'N/A',
                        'Country' => $inquiry->destination->country ?? 'N/A',
                        'Message' => $inquiry->message ?? 'N/A',
                        'Is Spam' => 'No',
                        'Marketing Consent' => 'N/A',
                        'IP Address' => $inquiry->ip_address,
                        'User ID' => $inquiry->user_id ?? 'Guest',
                        'Submitted At' => $inquiry->created_at->format('Y-m-d H:i:s'),
                    ];
                });

            $allSubmissions = $allSubmissions->merge($inquiries);
        }

        // Sort by date
        $allSubmissions = $allSubmissions->sortByDesc(function ($item) {
            return $item['Submitted At'];
        });

        // Generate CSV
        $filename = 'all_submissions_export_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://temp', 'r+');

        // Write headers (use first row keys)
        if ($allSubmissions->isNotEmpty()) {
            fputcsv($handle, array_keys($allSubmissions->first()));

            // Write data
            foreach ($allSubmissions as $row) {
                fputcsv($handle, $row);
            }
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        Log::info('Unified submissions exported successfully', [
            'admin_id' => Auth::id(),
            'total_records' => $allSubmissions->count(),
        ]);

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    /**
     * Bulk delete spam submissions
     */
    public function bulkDeleteSpam(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        try {
            $deletedForms = DB::table('form_submissions')->where('is_spam', true)->delete();
            $deletedBookings = Booking::where('is_spam', true)->delete();

            $totalDeleted = $deletedForms + $deletedBookings;

            Log::info('Bulk spam deletion completed', [
                'admin_id' => Auth::id(),
                'admin_name' => Auth::user()->name,
                'deleted_forms' => $deletedForms,
                'deleted_bookings' => $deletedBookings,
                'total_deleted' => $totalDeleted,
            ]);

            return back()->with('success', "Successfully deleted {$totalDeleted} spam submissions.");

        } catch (\Exception $e) {
            Log::error('Bulk spam deletion failed', [
                'admin_id' => Auth::id(),
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Failed to delete spam submissions.');
        }
    }
}