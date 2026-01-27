<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Inquiry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Admin dashboard
     */
    // public function adminDashboard()
    // {
    //     if (Auth::user()->role !== 'admin') {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     $users = User::where('role', 'user')->latest()->paginate(20);
    //     $stats = [
    //         'total_users' => User::where('role', 'user')->count(),
    //         'total_admins' => User::where('role', 'admin')->count(),
    //         'recent_users' => User::where('role', 'user')->where('created_at', '>=', now()->subDays(7))->count(),
    //     ];

    //     return view('admin.dashboard', compact('users', 'stats'));
    // }

    public function adminDashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Date ranges
        $today = now();
        $last30Days = now()->subDays(30);
        $last7Days = now()->subDays(7);
        $lastMonth = now()->subMonth();
        $currentMonth = now()->startOfMonth();

        // Total counts
        $totalBookings = Booking::count();
        $totalDestinations = Destination::count();
        $totalInquiries = Inquiry::count();

        // Recent activity (last 30 days)
        $recentBookings = Booking::where('created_at', '>=', $last30Days)->count();
        $recentInquiries = Inquiry::where('created_at', '>=', $last30Days)->count();

        // Growth rates
        $previousMonthBookings = Booking::whereBetween('created_at', [$lastMonth->copy()->startOfMonth(), $lastMonth->copy()->endOfMonth()])->count();
        $currentMonthBookings = Booking::where('created_at', '>=', $currentMonth)->count();
        $bookingGrowth = $previousMonthBookings > 0 ? round((($currentMonthBookings - $previousMonthBookings) / $previousMonthBookings) * 100, 1) : ($currentMonthBookings > 0 ? 100 : 0);

        // Top destinations by inquiries
        $topDestinations = Destination::withCount('inquiries')->orderBy('inquiries_count', 'desc')->take(5)->get();

        // Popular trip types
        $tripTypes = Booking::select('trip_type', DB::raw('count(*) as count'))->whereNotNull('trip_type')->groupBy('trip_type')->orderBy('count', 'desc')->get();

        // Popular nationalities
        $nationalities = Booking::select('nationality', DB::raw('count(*) as count'))->whereNotNull('nationality')->groupBy('nationality')->orderBy('count', 'desc')->take(5)->get();

        // Accommodation preferences
        $accommodations = Booking::select('accommodation', DB::raw('count(*) as count'))->whereNotNull('accommodation')->groupBy('accommodation')->orderBy('count', 'desc')->get();

        // Budget distribution
        $budgets = Booking::select('budget', DB::raw('count(*) as count'))->whereNotNull('budget')->groupBy('budget')->orderBy('count', 'desc')->get();

        // Monthly bookings trend (last 6 months)
        $monthlyTrend = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $count = Booking::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->count();
            $monthlyTrend[] = [
                'month' => $date->format('M Y'),
                'count' => $count,
            ];
        }

        // Recent bookings
        $latestBookings = Booking::orderBy('created_at', 'desc')->take(10)->get();

        // Recent inquiries with destinations
        $latestInquiries = Inquiry::with('destination')->orderBy('created_at', 'desc')->take(10)->get();

        // Average metrics
        $avgAdults = Booking::whereNotNull('adults')->avg('adults');
        $avgChildren = Booking::whereNotNull('children')->avg('children');

        // Conversion rate (inquiries to bookings)
        $conversionRate = $totalInquiries > 0 ? round(($totalBookings / $totalInquiries) * 100, 1) : 0;

        // Services requested
        $servicesData = Booking::whereNotNull('services')
            ->get()
            ->flatMap(function ($booking) {
                return json_decode($booking->services, true) ?: [];
            })
            ->countBy()
            ->sortDesc()
            ->take(10);

        return view('admin.analytics', compact('totalBookings', 'totalDestinations', 'totalInquiries', 'recentBookings', 'recentInquiries', 'bookingGrowth', 'topDestinations', 'tripTypes', 'nationalities', 'accommodations', 'budgets', 'monthlyTrend', 'latestBookings', 'latestInquiries', 'avgAdults', 'avgChildren', 'conversionRate', 'servicesData'));
    }

    /**
     * Handle admin bookings - both GET and POST
     * GET: Display bookings with filters
     * POST: Authenticate with password
     */
   public function adminBookings(Request $request)
    {
        Log::info('Admin bookings page accessed', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'ip' => $request->ip(),
            'filters' => [
                'type' => $request->input('type'),
                'keyword' => $request->input('keyword'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
            ]
        ]);

        // Build query with filters
        $query = DB::table('form_submissions');

        if ($request->filled('type')) {
            $query->whereJsonContains('payload->booking_type', $request->type);
            Log::info('Applied type filter', ['type' => $request->type]);
        }

        if ($request->filled('keyword')) {
            $query->where('payload', 'like', '%' . $request->keyword . '%');
            Log::info('Applied keyword filter', ['keyword' => $request->keyword]);
        }

        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('created_at', [$request->from, $request->to]);
            Log::info('Applied date range filter', [
                'from' => $request->from,
                'to' => $request->to
            ]);
        }

        $submissions = $query->orderByDesc('created_at')->paginate(10);

        Log::info('Bookings retrieved', [
            'total' => $submissions->total(),
            'per_page' => $submissions->perPage(),
            'current_page' => $submissions->currentPage(),
        ]);

        return view('admin.bookings', compact('submissions'));
    }

    /**
     * Delete a specific booking
     * Protected by 'admin' middleware in routes
     */
    public function deleteBooking($id, Request $request)
    {
        Log::info('Booking deletion attempt', [
            'booking_id' => $id,
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'ip' => $request->ip(),
        ]);

        try {
            $deleted = DB::table('form_submissions')->where('id', $id)->delete();

            if (!$deleted) {
                Log::warning('Booking deletion failed - not found', [
                    'booking_id' => $id,
                    'admin_id' => Auth::id(),
                ]);

                return response()->json([
                    'success' => false,
                    'error' => 'Booking not found'
                ], 404);
            }

            Log::info('Booking deleted successfully', [
                'booking_id' => $id,
                'admin_id' => Auth::id(),
                'admin_name' => Auth::user()->name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Booking deleted successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Booking deletion failed - exception', [
                'booking_id' => $id,
                'admin_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'error' => 'Failed to delete booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Export all contacts and send via email
     * Protected by 'admin' middleware in routes
     */
    public function exportAllContacts(Request $request)
    {
        Log::info('Export all contacts initiated', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'ip' => $request->ip(),
        ]);

        try {
            $submissions = DB::table('form_submissions')->orderByDesc('created_at')->get();

            if ($submissions->isEmpty()) {
                Log::warning('Export failed - no submissions found', [
                    'admin_id' => Auth::id(),
                ]);

                return redirect()->back()->with('error', 'No form submissions found.');
            }

            Log::info('Submissions retrieved for export', [
                'count' => $submissions->count(),
                'admin_id' => Auth::id(),
            ]);

            $exportData = $submissions->map(function ($item) {
                $payload = json_decode($item->payload, true);

                return [
                    'Name' => $payload['name'] ?? '',
                    'Email' => $payload['email'] ?? '',
                    'Phone' => $payload['phone'] ?? '',
                    'Submitted At' => Carbon::parse($item->created_at)->toDateTimeString(),
                ];
            });

            $html = view('emails.contact-export', ['contacts' => $exportData])->render();

            $emails = config('app.export_recipients', [
                'webmasterjdd@gmail.com',
                'support@globetrottingtraveluk.com'
            ]);

            Mail::raw(strip_tags($html), function ($message) use ($html, $emails) {
                $message->to($emails)
                    ->subject('All Form Submissions Export - ' . now()->format('Y-m-d H:i:s'))
                    ->setBody($html, 'text/html');
            });

            Log::info('Export email sent successfully', [
                'admin_id' => Auth::id(),
                'admin_name' => Auth::user()->name,
                'recipients' => $emails,
                'submission_count' => $submissions->count(),
            ]);

            return redirect()->back()->with('success', 'Export email for all submissions sent successfully.');

        } catch (\Exception $e) {
            Log::error('Export all contacts failed', [
                'admin_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'Failed to export contacts: ' . $e->getMessage());
        }
    }

    /**
     * Show export contacts loader page
     * Protected by 'admin' middleware in routes
     */
    public function showExportPage(Request $request)
    {
        Log::info('Export contacts page accessed', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'ip' => $request->ip(),
        ]);

        return view('admin.export-contacts');
    }

    /**
     * Export contacts via Artisan command
     * Protected by 'admin' middleware in routes
     */
    public function exportContacts(Request $request)
    {
        Log::info('Export contacts command initiated', [
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'ip' => $request->ip(),
            'is_ajax' => $request->expectsJson(),
        ]);

        try {
            Artisan::call('contacts:export');

            Log::info('Export contacts command executed successfully', [
                'admin_id' => Auth::id(),
                'admin_name' => Auth::user()->name,
                'artisan_output' => Artisan::output(),
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contacts exported and emailed successfully.'
                ]);
            }

            return redirect()->back()->with('success', 'Contacts exported and emailed successfully.');

        } catch (\Exception $e) {
            Log::error('Export contacts command failed', [
                'admin_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error exporting contacts: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Error exporting contacts: ' . $e->getMessage());
        }
    }
}
