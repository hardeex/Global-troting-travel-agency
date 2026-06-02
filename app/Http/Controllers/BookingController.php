<?php

namespace App\Http\Controllers;

use App\Mail\BookingNotification;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
  

public function submit(Request $request)
{
    try {
        // 1. Honeypot check - bot trap
        if ($request->filled('website')) {
            Log::warning('Bot detected via honeypot', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            // Fake success to not alert the bot
            return back()->with('success', 'Your request has been sent! We\'ll be in touch soon.');
        }

        // 2. Rate limiting: max 3 submissions per IP in 5 minutes
        $key = 'form-submit:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'error' => "Too many submissions. Please try again in {$seconds} seconds.",
            ]);
        }

        // 3. Validation
        $validated = $request->validate([
            'g-recaptcha-response' => ['required', new RecaptchaRule()],
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'preferred_contact' => 'nullable|string|max:20',
            'booking_type' => 'required|string|in:contact,car,flight,hotel,activity,custom,cruise,package_tour',
            'message' => 'nullable|string|max:2000',
            // Car rental fields
            'car_pickup_location' => 'nullable|string|max:150',
            'car_dropoff_location' => 'nullable|string|max:150',
            'car_pickup_date' => 'nullable|date',
            'car_dropoff_date' => 'nullable|date|after_or_equal:car_pickup_date',
            'driver_age' => 'nullable|integer|min:18',
            'car_preferences' => 'nullable|string|max:150',
            'car_addons' => 'nullable|string|max:200',
            'car_category' => 'nullable|string|max:50',
            // Flight fields
            'flight_departure' => 'nullable|string|max:150',
            'flight_arrival' => 'nullable|string|max:150',
            'flight_departure_date' => 'nullable|date',
            'flight_return_date' => 'nullable|date|after_or_equal:flight_departure_date',
            'flight_adults' => 'nullable|integer|min:1',
            'flight_children' => 'nullable|integer|min:0',
            'cabin_preference' => 'nullable|string|max:50',
            'airline_preference' => 'nullable|string|max:100',
            'frequent_flyer_number' => 'nullable|string|max:50',
            // Hotel fields
            'hotel_location' => 'nullable|string|max:150',
            'hotel_checkin' => 'nullable|date',
            'hotel_checkout' => 'nullable|date|after_or_equal:hotel_checkin',
            'hotel_rooms' => 'nullable|integer|min:1',
            'hotel_guests' => 'nullable|integer|min:1',
            'hotel_preferences' => 'nullable|string|max:150',
            'hotel_room_features' => 'nullable|string|max:200',
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
            // Cruise fields
            'cruise_preferences' => 'nullable|string|max:150',
            'cruise_itinerary' => 'nullable|string|max:150',
            'cruise_length' => 'nullable|integer|min:1',
            'cruise_departure_date' => 'nullable|date',
            'cruise_pre_post_nights' => 'nullable|string|in:yes,no',
            'cruise_cabin_class' => 'nullable|string|max:50',
            'cruise_beverage_plan' => 'nullable|string|in:yes,no',
            'cruise_beverage_plan_type' => 'nullable|string|max:100',
            // Package tour fields
            'package_countries' => 'nullable|string|max:200',
            'package_tour_type' => 'nullable|string|in:escorted,independent',
            'package_activity_level' => 'nullable|string|in:low,moderate,high',
            'package_start_date' => 'nullable|date',
            'package_duration' => 'nullable|integer|min:1',
            // Additional travel info
            'hotels_enjoyed' => 'nullable|string|max:1000',
            'cruises_resorts_enjoyed' => 'nullable|string|max:1000',
            'travel_activities' => 'nullable|string|max:1000',
            // Marketing consent
            'marketing_consent' => 'required|boolean',
        ]);

        // Hit the rate limiter
        RateLimiter::hit($key, 300); // 5 minutes

        // Spam detection
        $isSpam = $this->isSuspiciousSubmission($validated);

        // Get current authenticated user (null if guest)
        $user = Auth::user();

        // Prepare data for insertion
        $submissionData = [
            'payload' => json_encode($validated),
            'email' => $validated['email'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'is_spam' => $isSpam,
            'marketing_consent' => $request->boolean('marketing_consent'),
            'user_id' => $user?->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Log suspicious submissions
        if ($isSpam) {
            Log::warning('Suspicious form submission detected', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'email' => $validated['email'],
                'booking_type' => $validated['booking_type'] ?? 'unknown',
            ]);
        }

        // CRITICAL: Save the submission FIRST (always, regardless of email success)
        $submissionId = DB::table('form_submissions')->insertGetId($submissionData);

        Log::info('Form submission saved', [
            'submission_id' => $submissionId,
            'email' => $validated['email'],
            'booking_type' => $validated['booking_type'],
            'is_spam' => $isSpam,
        ]);

        // Send notification email (only for non-spam) - NON-BLOCKING
        if (!$isSpam) {
            try {
                $emailsRaw = env('RECEIVER_EMAILS', '');
                $emails = array_filter(
                    array_map('trim', explode(',', $emailsRaw)),
                    fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL)
                );

                if (!empty($emails)) {
                    Mail::to($emails)->send(new BookingRequestMail($validated));
                    Log::info('Booking request email sent successfully', [
                        'submission_id' => $submissionId,
                        'to' => $emails,
                    ]);
                } else {
                    Log::warning('No valid recipient emails configured', [
                        'submission_id' => $submissionId,
                        'RECEIVER_EMAILS' => $emailsRaw,
                    ]);
                }
            } catch (\Throwable $mailException) {
                // Log mail failure but do NOT fail the request
                Log::error('Failed to send booking email', [
                    'submission_id' => $submissionId,
                    'email' => $validated['email'],
                    'error' => $mailException->getMessage(),
                    'trace' => $mailException->getTraceAsString(),
                ]);
                // Note: Submission is already saved, so we continue
            }
        }

        // Always return success to user
        return back()->with('success', 'Your request has been sent! We\'ll be in touch soon.');

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Validation failed - return errors to user
        return back()
            ->withErrors($e->errors())
            ->withInput();

    } catch (\Throwable $e) {
        // Unexpected error - log and show generic message
        Log::error('Unexpected error in form submission', [
            'ip' => $request->ip(),
            'email' => $request->input('email'),
            'booking_type' => $request->input('booking_type'),
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()
            ->withErrors(['error' => 'An unexpected error occurred. Please try again later.'])
            ->withInput();
    }
}


    /**
     * Check if submission contains spam patterns
     */
    private function isSuspiciousSubmission(array $data): bool
    {
        // Common spam keywords
        $spamKeywords = ['viagra', 'cialis', 'casino', 'porn', 'sex', 'bitcoin', 'crypto', 'forex', 'loan', 'seo service', 'buy now', 'click here', 'limited time', 'earn money', 'work from home', 'make money fast', 'free money', 'weight loss', 'male enhancement'];

        // Combine text fields for checking
        $textFields = array_filter([$data['name'] ?? '', $data['email'] ?? '', $data['message'] ?? '']);

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
                '/[0-9]{5,}@/', // Too many numbers before @
                '/@.*\.ru$/', // Russian domains (common for spam)
                '/@.*\.cn$/', // Chinese domains
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

   

    public function manageInquiries(Request $request)
    {
        $query = Inquiry::with('destination');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
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



      public function bookTravelRequest(Request $request)
    {
        Log::info('Book travel request received...', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'incoming request' => $request->all(),
        ]);

        // ========================================
        // 1. HONEYPOT CHECK - BOT TRAP
        // ========================================
        if ($request->filled('website')) {
            Log::warning('Bot detected via honeypot', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Fake success to not alert the bot
            return redirect()
                ->route('index')
                ->with('success', 'Your booking has been submitted successfully! We will contact you shortly.');
        }

        // ========================================
        // 2. RATE LIMITING: MAX 3 SUBMISSIONS PER IP IN 10 MINUTES
        // ========================================
        $rateLimitKey = 'booking-form:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);
            $minutes = ceil($seconds / 60);

            Log::warning('Rate limit exceeded for booking form', [
                'ip' => $request->ip(),
                'available_in' => $seconds,
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Too many submissions. Please try again in {$minutes} minute(s).");
        }

        // ========================================
        // 3. VALIDATION WITH RECAPTCHA
        // ========================================
        $rules = [
            'g-recaptcha-response' => ['required', new RecaptchaRule()],
            
            // Personal Information
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:200',
            
            // Form type
            'form_type' => 'required|string|max:100',
            
            // Travel Details
            'destination' => 'required|string|max:255',
            'destination_other' => 'nullable|string|max:255',
            'trip_type' => 'nullable|string|max:100',
            'trip_type_other' => 'nullable|string|max:100',
            'departure_date' => 'nullable|date|after_or_equal:today',
            'return_date' => 'nullable|date|after:departure_date',
            'flexible_dates' => 'nullable|string|in:yes',
            
            // Travelers & Budget
            'adults' => 'required|integer|min:1|max:50',
            'children' => 'nullable|integer|min:0|max:50',
            'infants' => 'nullable|integer|min:0|max:20',
            'accommodation' => 'nullable|string|max:100',
            'accommodation_other' => 'nullable|string|max:100',
            'budget' => 'required|string|max:50',
            
            // Insurance & Services
            'insurance' => 'required|string|in:yes,no',
            'services' => 'nullable|array',
            'services.*' => 'string|max:100',
            
            // Special Requests
            'special_requests' => 'nullable|string|max:2000',
            
            // Marketing Consent
            'marketing_consent' => 'nullable|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Log::error('Validation failed', [
                'errors' => $validator->errors()->toArray(),
                'ip' => $request->ip(),
            ]);

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please check the form and fix the highlighted errors.');
        }

        $validated = $validator->validated();
        Log::info('Validation passed successfully');

        // Hit the rate limiter (600 seconds = 10 minutes)
        RateLimiter::hit($rateLimitKey, 600);

        // ========================================
        // 4. SPAM DETECTION
        // ========================================
        $isSpam = $this->isSuspiciousScheduleSubmission($validated, $request);

        if ($isSpam) {
            Log::warning('Suspicious booking submission detected', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'email' => $validated['email'],
                'full_name' => $validated['full_name'],
            ]);
        }

        // ========================================
        // 5. HANDLE "OTHER" OPTIONS
        // ========================================
        if (($validated['destination'] ?? '') === 'other') {
            $validated['destination'] = $validated['destination_other'] ?? 'Other';
        }

        if (($validated['trip_type'] ?? '') === 'other') {
            $validated['trip_type'] = $validated['trip_type_other'] ?? 'Other';
        }

        if (($validated['accommodation'] ?? '') === 'other') {
            $validated['accommodation'] = $validated['accommodation_other'] ?? 'Other';
        }

        // ========================================
        // 6. SERVICES ARRAY → JSON
        // ========================================
        if (isset($validated['services'])) {
            $validated['services'] = json_encode($validated['services']);
        }

        // ========================================
        // 7. ADD METADATA
        // ========================================
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();
        $validated['is_spam'] = $isSpam;
        $validated['marketing_consent'] = $request->boolean('marketing_consent');

        // ========================================
        // 8. SAVE BOOKING (SPAM OR NOT)
        // ========================================
        try {
            $booking = Booking::create($validated);
            Log::info('Booking created successfully', ['id' => $booking->id]);
        } catch (\Exception $e) {
            Log::error('Failed to save booking to database', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while saving your booking. Please try again later.');
        }

        // ========================================
        // 9. SEND EMAIL NOTIFICATIONS (ONLY FOR NON-SPAM)
        // ========================================
        if (!$isSpam) {
            try {
                $receiverEmailsRaw = env('RECEIVER_EMAILS', 'support@globetrottingtraveluk.com');
                $receiverEmails = array_filter(
                    array_map('trim', explode(',', $receiverEmailsRaw)),
                    fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL)
                );

                // Send to admin emails
                if (!empty($receiverEmails)) {
                    foreach ($receiverEmails as $email) {
                        try {
                            Mail::to($email)->send(new BookingNotification($booking, false));
                            Log::info('Admin notification sent', ['to' => $email]);
                        } catch (\Exception $e) {
                            Log::error('Failed to send admin notification', [
                                'email' => $email,
                                'error' => $e->getMessage(),
                            ]);
                        }
                    }
                } else {
                    Log::warning('No valid recipient emails configured in RECEIVER_EMAILS');
                }

                // Send confirmation to customer
                try {
                    Mail::to($validated['email'])->send(new BookingNotification($booking, true));
                    Log::info('Customer confirmation sent', ['to' => $validated['email']]);
                } catch (\Exception $e) {
                    Log::error('Failed to send customer confirmation', [
                        'email' => $validated['email'],
                        'error' => $e->getMessage(),
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Mail process failed', ['error' => $e->getMessage()]);
                // Continue even if email fails
            }
        }

        // ========================================
        // 10. FINAL RESPONSE
        // ========================================
        return redirect()
            ->route('index')
            ->with('success', 'Your booking has been submitted successfully! We will contact you shortly.');
    }

    /**
     * Check if submission contains spam patterns
     */
    private function isSuspiciousScheduleSubmission(array $data, Request $request): bool
    {
        // Common spam keywords
        $spamKeywords = [
            'viagra', 'cialis', 'casino', 'porn', 'sex', 'bitcoin', 'crypto', 
            'forex', 'loan', 'seo service', 'buy now', 'click here', 
            'limited time', 'earn money', 'work from home', 'make money fast', 
            'free money', 'weight loss', 'male enhancement', 'payday', 
            'refinance', 'rolex', 'replica'
        ];

        // Combine text fields for checking
        $textFields = array_filter([
            $data['full_name'] ?? '',
            $data['email'] ?? '',
            $data['special_requests'] ?? '',
            $data['destination_other'] ?? '',
            $data['trip_type_other'] ?? '',
        ]);

        $allText = strtolower(implode(' ', $textFields));

        // Check for spam keywords
        foreach ($spamKeywords as $keyword) {
            if (str_contains($allText, strtolower($keyword))) {
                return true;
            }
        }

        // Check for URLs in name field (common bot pattern)
        if (isset($data['full_name']) && preg_match('/(http|https|www\.|\.com|\.net|\.org|\.ru|\.cn|\.tk)/i', $data['full_name'])) {
            return true;
        }

        // Check for excessive URLs in special requests (more than 3)
        if (isset($data['special_requests'])) {
            $urlCount = preg_match_all('/(http|https|www\.)/i', $data['special_requests']);
            if ($urlCount > 3) {
                return true;
            }
        }

        // Check for gibberish/random text (very short words repeatedly)
        if (isset($data['special_requests']) && strlen($data['special_requests']) > 50) {
            $words = preg_split('/\s+/', $data['special_requests']);
            $shortWords = array_filter($words, fn($w) => strlen($w) <= 2);

            // If more than 50% of words are 1-2 characters, likely spam
            if (count($words) > 0 && count($shortWords) > count($words) * 0.5) {
                return true;
            }
        }

        // Check for suspicious email patterns
        if (isset($data['email'])) {
            $suspiciousEmailPatterns = [
                '/[0-9]{6,}@/',           // Too many numbers before @
                '/@.*\.ru$/',             // Russian domains (common for spam)
                '/@.*\.cn$/',             // Chinese domains
                '/@.*\.(tk|ml|ga|cf)$/', // Free/suspicious TLDs
                '/^[a-z]{20,}@/',        // Very long random lowercase string
            ];

            foreach ($suspiciousEmailPatterns as $pattern) {
                if (preg_match($pattern, strtolower($data['email']))) {
                    return true;
                }
            }
        }

        // Check for suspicious name patterns
        if (isset($data['full_name'])) {
            // Single character or very short names
            if (strlen(trim($data['full_name'])) < 3) {
                return true;
            }

            // All numbers
            if (preg_match('/^[0-9]+$/', $data['full_name'])) {
                return true;
            }

            // Too many repeated characters
            if (preg_match('/(.)\1{5,}/', $data['full_name'])) {
                return true;
            }
        }

        // Check for impossible travel dates (e.g., more than 2 years in the future)
        if (isset($data['departure_date'])) {
            $departureDate = strtotime($data['departure_date']);
            $twoYearsFromNow = strtotime('+2 years');
            
            if ($departureDate > $twoYearsFromNow) {
                return true;
            }
        }

        // Check for unrealistic number of travelers
        $totalTravelers = ($data['adults'] ?? 0) + ($data['children'] ?? 0) + ($data['infants'] ?? 0);
        if ($totalTravelers > 20) {
            return true;
        }

        return false;
    }

    public function showInquiry(Inquiry $inquiry)
    {
        $inquiry->load('destination');

       
        $inquiry->update(['status' => 'read']);

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function deleteInquiry(Inquiry $inquiry)
    {
        try {
            $inquiry->delete();
            return redirect()->back()->with('success', 'Inquiry deleted successfully.');
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
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to delete inquiries.',
                ],
                500,
            );
        }
    }

    public function exportInquiries(Request $request)
    {
        $query = Inquiry::with('destination');

        // Apply same filters as manageInquiries
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
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
        $csvData[] = ['ID', 'First Name', 'Last Name', 'Email', 'Phone', 'Destination', 'Country', 'Message', 'IP Address', 'User Agent', 'Inquiry Date'];

        foreach ($inquiries as $inquiry) {
            $csvData[] = [$inquiry->id, $inquiry->first_name, $inquiry->last_name, $inquiry->email, $inquiry->phone ?? 'N/A', $inquiry->destination->title ?? 'N/A', $inquiry->destination->country ?? 'N/A', $inquiry->message ?? 'N/A', $inquiry->ip_address, $inquiry->user_agent, $inquiry->created_at->format('Y-m-d H:i:s')];
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
