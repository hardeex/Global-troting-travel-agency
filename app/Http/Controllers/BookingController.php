<?php

namespace App\Http\Controllers;

use App\Mail\BookingRequestMail;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\Inquiry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Rules\RecaptchaRule;
use Illuminate\Support\Facades\RateLimiter;


class BookingController extends Controller
{
    // public function submit(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:100',
    //         'email' => 'required|email|max:150',
    //         'phone' => 'nullable|string|max:30',
    //         'preferred_contact' => 'nullable|string|max:20',
    //         'booking_type' => 'required|string|in:contact,car,flight,hotel,activity,custom',
    //         'message' => 'nullable|string|max:2000',

    //         'car_pickup_location' => 'nullable|string|max:150',
    //         'car_dropoff_location' => 'nullable|string|max:150',
    //         'car_pickup_date' => 'nullable|date',
    //         'car_dropoff_date' => 'nullable|date|after_or_equal:car_pickup_date',
    //         'driver_age' => 'nullable|integer|min:18',

    //         'flight_departure' => 'nullable|string|max:150',
    //         'flight_arrival' => 'nullable|string|max:150',
    //         'flight_departure_date' => 'nullable|date',
    //         'flight_return_date' => 'nullable|date|after_or_equal:flight_departure_date',
    //         'flight_adults' => 'nullable|integer|min:1',
    //         'flight_children' => 'nullable|integer|min:0',
    //         'flight_class' => 'nullable|string|max:30',

    //         'hotel_location' => 'nullable|string|max:150',
    //         'hotel_checkin' => 'nullable|date',
    //         'hotel_checkout' => 'nullable|date|after_or_equal:hotel_checkin',
    //         'hotel_rooms' => 'nullable|integer|min:1',
    //         'hotel_guests' => 'nullable|integer|min:1',

    //         'activity_location' => 'nullable|string|max:150',
    //         'activity_type' => 'nullable|string|max:150',
    //         'activity_date' => 'nullable|date',
    //         'activity_people' => 'nullable|integer|min:1',

    //         'custom_destination' => 'nullable|string|max:150',
    //         'custom_start' => 'nullable|date',
    //         'custom_end' => 'nullable|date|after_or_equal:custom_start',
    //         'custom_budget' => 'nullable|string|max:100',
    //         'custom_style' => 'nullable|string|max:50',
    //     ]);

    //     try {
    //         $emailsRaw = env('RECEIVER_EMAILS', '');

    //         // Parse, trim, and validate emails
    //         $emails = array_filter(
    //             array_map(function ($email) {
    //                 $email = trim($email);
    //                 return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
    //             }, explode(',', $emailsRaw)),
    //         );

    //         // Log parsed emails
    //         Log::info('Parsed receiver emails:', $emails);

    //         if (!empty($emails)) {
    //             Mail::to($emails)->send(new BookingRequestMail($validated));
    //             Log::info('Booking request email sent successfully.');
    //         } else {
    //             Log::error('No valid recipient emails found in RECEIVER_EMAILS. Raw value: ' . $emailsRaw);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Mail sending failed: ' . $e->getMessage());
    //     }

    //     // Save to database
    //     DB::table('form_submissions')->insert([
    //         'payload' => json_encode($validated),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     return back()->with('success', 'Your request has been sent! We’ll be in touch soon.');
    // }



    public function submit(Request $request)
{
    // Honeypot check - if filled, it's a bot
    if ($request->filled('website')) {
        Log::warning('Bot detected via honeypot', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
        
        // Fake success response to confuse bot
        return back()->with('success', 'Your request has been sent! We\'ll be in touch soon.');
    }

    // Rate limiting - max 3 submissions per IP every 5 minutes
    $key = 'form-submit:' . $request->ip();
    if (RateLimiter::tooManyAttempts($key, 3)) {
        $seconds = RateLimiter::availableIn($key);
        
        return back()->withErrors([
            'error' => "Too many submissions. Please try again in {$seconds} seconds."
        ]);
    }

    // Validate form data including reCAPTCHA
    $validated = $request->validate([
        'g-recaptcha-response' => ['required', new RecaptchaRule],
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'phone' => 'nullable|string|max:30',
        'preferred_contact' => 'nullable|string|max:20',
        'booking_type' => 'required|string|in:contact,car,flight,hotel,activity,custom',
        'message' => 'nullable|string|max:2000',

        // Car rental fields
        'car_pickup_location' => 'nullable|string|max:150',
        'car_dropoff_location' => 'nullable|string|max:150',
        'car_pickup_date' => 'nullable|date',
        'car_dropoff_date' => 'nullable|date|after_or_equal:car_pickup_date',
        'driver_age' => 'nullable|integer|min:18',

        // Flight fields
        'flight_departure' => 'nullable|string|max:150',
        'flight_arrival' => 'nullable|string|max:150',
        'flight_departure_date' => 'nullable|date',
        'flight_return_date' => 'nullable|date|after_or_equal:flight_departure_date',
        'flight_adults' => 'nullable|integer|min:1',
        'flight_children' => 'nullable|integer|min:0',
        'flight_class' => 'nullable|string|max:30',

        // Hotel fields
        'hotel_location' => 'nullable|string|max:150',
        'hotel_checkin' => 'nullable|date',
        'hotel_checkout' => 'nullable|date|after_or_equal:hotel_checkin',
        'hotel_rooms' => 'nullable|integer|min:1',
        'hotel_guests' => 'nullable|integer|min:1',

        // Activity fields
        'activity_location' => 'nullable|string|max:150',
        'activity_type' => 'nullable|string|max:150',
        'activity_date' => 'nullable|date',
        'activity_people' => 'nullable|integer|min:1',

        // Custom package fields
        'custom_destination' => 'nullable|string|max:150',
        'custom_start' => 'nullable|date',
        'custom_end' => 'nullable|date|after_or_equal:custom_start',
        'custom_budget' => 'nullable|string|max:100',
        'custom_style' => 'nullable|string|max:50',
    ]);

    // Hit rate limiter
    RateLimiter::hit($key, 300); // 5 minutes

    // Check for spam patterns
    $isSpam = $this->isSuspiciousSubmission($validated);

    if ($isSpam) {
        Log::warning('Suspicious form submission detected', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'data' => $validated
        ]);
        
        // Save as spam but don't send email
        DB::table('form_submissions')->insert([
            'payload' => json_encode($validated),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'is_spam' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Fake success to confuse bot
        return back()->with('success', 'Your request has been sent! We\'ll be in touch soon.');
    }

    // Send email to recipients
    try {
        $emailsRaw = env('RECEIVER_EMAILS', '');

        // Parse, trim, and validate emails
        $emails = array_filter(
            array_map(function ($email) {
                $email = trim($email);
                return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
            }, explode(',', $emailsRaw)),
        );

        // Log parsed emails
        Log::info('Parsed receiver emails:', $emails);

        if (!empty($emails)) {
            Mail::to($emails)->send(new BookingRequestMail($validated));
            Log::info('Booking request email sent successfully.');
        } else {
            Log::error('No valid recipient emails found in RECEIVER_EMAILS. Raw value: ' . $emailsRaw);
        }
    } catch (\Exception $e) {
        Log::error('Mail sending failed: ' . $e->getMessage());
    }

    // Save legitimate submission to database
    DB::table('form_submissions')->insert([
        'payload' => json_encode($validated),
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'is_spam' => false,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'Your request has been sent! We\'ll be in touch soon.');
}

/**
 * Check if submission contains spam patterns
 */
private function isSuspiciousSubmission(array $data): bool
{
    // Common spam keywords
    $spamKeywords = [
        'viagra', 'cialis', 'casino', 'porn', 'sex', 'bitcoin', 
        'crypto', 'forex', 'loan', 'seo service', 'buy now',
        'click here', 'limited time', 'earn money', 'work from home',
        'make money fast', 'free money', 'weight loss', 'male enhancement'
    ];
    
    // Combine text fields for checking
    $textFields = array_filter([
        $data['name'] ?? '',
        $data['email'] ?? '',
        $data['message'] ?? '',
    ]);
    
    $allText = strtolower(implode(' ', $textFields));
    
    // Check for spam keywords
    foreach ($spamKeywords as $keyword) {
        if (str_contains($allText, strtolower($keyword))) {
            return true;
        }
    }

    // Check for URLs in name field (common bot pattern)
    if (isset($data['name']) && preg_match('/(http|https|www\.|\.com|\.net|\.org|\.ru|\.cn)/i', $data['name'])) {
        return true;
    }

    // Check for excessive URLs in message (more than 2)
    if (isset($data['message'])) {
        $urlCount = preg_match_all('/(http|https|www\.)/i', $data['message']);
        if ($urlCount > 2) {
            return true;
        }
    }

    // Check for gibberish/random text (very short words repeatedly)
    if (isset($data['message']) && strlen($data['message']) > 50) {
        $words = explode(' ', $data['message']);
        $shortWords = array_filter($words, fn($w) => strlen($w) <= 2);
        
        // If more than 50% of words are 1-2 characters, likely spam
        if (count($shortWords) > count($words) * 0.5) {
            return true;
        }
    }

    // Check for suspicious email patterns
    if (isset($data['email'])) {
        $suspiciousEmailPatterns = [
            '/[0-9]{5,}@/',  // Too many numbers before @
            '/@.*\.ru$/',     // Russian domains (common for spam)
            '/@.*\.cn$/',     // Chinese domains
        ];
        
        foreach ($suspiciousEmailPatterns as $pattern) {
            if (preg_match($pattern, $data['email'])) {
                return true;
            }
        }
    }

    return false;
}

    public function adminContact()
    {
        return view('dashboard-components.contacts-data');
    }

public function analytics()
{
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
    $bookingGrowth = $previousMonthBookings > 0 
        ? round((($currentMonthBookings - $previousMonthBookings) / $previousMonthBookings) * 100, 1)
        : ($currentMonthBookings > 0 ? 100 : 0);
    
    // Top destinations by inquiries
    $topDestinations = Destination::withCount('inquiries')
        ->orderBy('inquiries_count', 'desc')
        ->take(5)
        ->get();
    
    // Popular trip types
    $tripTypes = Booking::select('trip_type', DB::raw('count(*) as count'))
        ->whereNotNull('trip_type')
        ->groupBy('trip_type')
        ->orderBy('count', 'desc')
        ->get();
    
    // Popular nationalities
    $nationalities = Booking::select('nationality', DB::raw('count(*) as count'))
        ->whereNotNull('nationality')
        ->groupBy('nationality')
        ->orderBy('count', 'desc')
        ->take(5)
        ->get();
    
    // Accommodation preferences
    $accommodations = Booking::select('accommodation', DB::raw('count(*) as count'))
        ->whereNotNull('accommodation')
        ->groupBy('accommodation')
        ->orderBy('count', 'desc')
        ->get();
    
    // Budget distribution
    $budgets = Booking::select('budget', DB::raw('count(*) as count'))
        ->whereNotNull('budget')
        ->groupBy('budget')
        ->orderBy('count', 'desc')
        ->get();
    
    // Monthly bookings trend (last 6 months)
    $monthlyTrend = [];
    for ($i = 5; $i >= 0; $i--) {
        $date = now()->subMonths($i);
        $count = Booking::whereYear('created_at', $date->year)
            ->whereMonth('created_at', $date->month)
            ->count();
        $monthlyTrend[] = [
            'month' => $date->format('M Y'),
            'count' => $count
        ];
    }
    
    // Recent bookings
    $latestBookings = Booking::orderBy('created_at', 'desc')
        ->take(10)
        ->get();
    
    // Recent inquiries with destinations
    $latestInquiries = Inquiry::with('destination')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
    
    // Average metrics
    $avgAdults = Booking::whereNotNull('adults')->avg('adults');
    $avgChildren = Booking::whereNotNull('children')->avg('children');
    
    // Conversion rate (inquiries to bookings)
    $conversionRate = $totalInquiries > 0 
        ? round(($totalBookings / $totalInquiries) * 100, 1)
        : 0;
    
    // Services requested
    $servicesData = Booking::whereNotNull('services')
        ->get()
        ->flatMap(function ($booking) {
            return json_decode($booking->services, true) ?: [];
        })
        ->countBy()
        ->sortDesc()
        ->take(10);
    
    return view('admin.analytics', compact(
        'totalBookings',
        'totalDestinations',
        'totalInquiries',
        'recentBookings',
        'recentInquiries',
        'bookingGrowth',
        'topDestinations',
        'tripTypes',
        'nationalities',
        'accommodations',
        'budgets',
        'monthlyTrend',
        'latestBookings',
        'latestInquiries',
        'avgAdults',
        'avgChildren',
        'conversionRate',
        'servicesData'
    ));
}

public function manageInquiries(Request $request)
{
    $query = Inquiry::with('destination');
    
    // Search functionality
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%");
        });
    }
    
    // Filter by destination
    if ($request->filled('destination_id')) {
        $query->where('destination_id', $request->destination_id);
    }
    
    // Filter by date range
    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->date_from);
    }
    
    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->date_to);
    }
    
    // Sort options
    $sortBy = $request->get('sort_by', 'created_at');
    $sortOrder = $request->get('sort_order', 'desc');
    $query->orderBy($sortBy, $sortOrder);
    
    // Paginate results
    $inquiries = $query->paginate(15)->appends($request->all());
    
    // Get all destinations for filter dropdown
    $destinations = Destination::orderBy('title')->get();
    
    // Statistics
    $stats = [
        'total' => Inquiry::count(),
        'today' => Inquiry::whereDate('created_at', today())->count(),
        'this_week' => Inquiry::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
        'this_month' => Inquiry::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count(),
    ];
    
    return view('admin.inquiries.manage', compact('inquiries', 'destinations', 'stats'));
}

public function showInquiry(Inquiry $inquiry)
{
    $inquiry->load('destination');
    
    // Mark as read if you have a status column
    // $inquiry->update(['status' => 'read']);
    
    return view('admin.inquiries.show', compact('inquiry'));
}

public function deleteInquiry(Inquiry $inquiry)
{
    try {
        $inquiry->delete();
        return redirect()->back()
            ->with('success', 'Inquiry deleted successfully.');
    } catch (Exception $e) {
        Log::error('Failed to delete inquiry', [
            'inquiry_id' => $inquiry->id,
            'error' => $e->getMessage(),
        ]);
        return back()->with('error', 'Failed to delete inquiry.');
    }
}

public function bulkDeleteInquiries(Request $request)
{
    $request->validate([
        'inquiry_ids' => 'required|array',
        'inquiry_ids.*' => 'exists:inquiries,id',
    ]);
    
    try {
        Inquiry::whereIn('id', $request->inquiry_ids)->delete();
        return response()->json([
            'success' => true,
            'message' => count($request->inquiry_ids) . ' inquiries deleted successfully.',
        ]);
    } catch (Exception $e) {
        Log::error('Bulk delete failed', ['error' => $e->getMessage()]);
        return response()->json([
            'success' => false,
            'message' => 'Failed to delete inquiries.',
        ], 500);
    }
}

public function exportInquiries(Request $request)
{
    $query = Inquiry::with('destination');
    
    // Apply same filters as manageInquiries
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }
    
    if ($request->filled('destination_id')) {
        $query->where('destination_id', $request->destination_id);
    }
    
    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->date_from);
    }
    
    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->date_to);
    }
    
    $inquiries = $query->get();
    
    $csvData = [];
    $csvData[] = [
        'ID',
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Destination',
        'Country',
        'Message',
        'IP Address',
        'User Agent',
        'Inquiry Date',
    ];
    
    foreach ($inquiries as $inquiry) {
        $csvData[] = [
            $inquiry->id,
            $inquiry->first_name,
            $inquiry->last_name,
            $inquiry->email,
            $inquiry->phone ?? 'N/A',
            $inquiry->destination->title ?? 'N/A',
            $inquiry->destination->country ?? 'N/A',
            $inquiry->message ?? 'N/A',
            $inquiry->ip_address,
            $inquiry->user_agent,
            $inquiry->created_at->format('Y-m-d H:i:s'),
        ];
    }
    
    $filename = 'inquiries_export_' . date('Y-m-d_His') . '.csv';
    
    $handle = fopen('php://temp', 'r+');
    foreach ($csvData as $row) {
        fputcsv($handle, $row);
    }
    rewind($handle);
    $csv = stream_get_contents($handle);
    fclose($handle);
    
    return response($csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"{$filename}\"",
    ]);
}



}
