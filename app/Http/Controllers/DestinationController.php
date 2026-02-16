<?php
namespace App\Http\Controllers;

use App\Mail\BookingNotification;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Rules\RecaptchaRule;
use Illuminate\Support\Facades\Log;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
{
    protected Cloudinary $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => [
                'secure' => true,
            ],
        ]);
    }

    public function makeArequest()
    {
        return view('admin.destinations.make-a-request');
    }

 
  


public function bookTravelRequest(Request $request)
{
    try {
        Log::info('Book travel request received', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // 1. Honeypot check - bot trap (reject immediately, don't save)
        if ($request->filled('website')) {
            Log::warning('Bot detected via honeypot in booking form', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            return redirect()
                ->route('index')
                ->with('success', 'Your booking has been submitted successfully! We will contact you shortly.');
        }

        // 2. Rate limiting: max 3 submissions per IP in 15 minutes
        $key = 'booking-submit:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => "Too many booking requests. Please try again in {$minutes} minute(s)."]);
        }

        // 3. Validation rules
        $rules = [
            'g-recaptcha-response' => ['required', new RecaptchaRule()],
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:200',
            'form_type' => 'required|string|max:100',
            'nationality' => 'nullable|string|max:100',
            'nationality_other' => 'nullable|string|max:100',
            'destination' => 'required|string|max:255',
            'destination_other' => 'nullable|string|max:255',
            'trip_type' => 'nullable|string|max:100',
            'trip_type_other' => 'nullable|string|max:100',
            'departure_date' => 'required|date|after_or_equal:today',
            'return_date' => 'nullable|date|after:departure_date',
            'flexible_dates' => 'nullable|string|in:yes',
            'adults' => 'required|integer|min:1|max:50',
            'children' => 'nullable|integer|min:0|max:30',
            'infants' => 'nullable|integer|min:0|max:10',
            'accommodation' => 'nullable|string|max:100',
            'accommodation_other' => 'nullable|string|max:100',
            'budget' => 'required|string|max:50',
            'insurance' => 'required|string|in:yes,no',
            'services' => 'nullable|array',
            'services.*' => 'string|max:100',
            'special_requests' => 'nullable|string|max:1000',
            'marketing_consent' => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Log::warning('Booking validation failed', [
                'ip' => $request->ip(),
                'errors' => $validator->errors()->toArray(),
            ]);

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please check the form and fix the highlighted errors.');
        }

        $validated = $validator->validated();
        
        // 4. Spam detection - REJECT before saving
        if ($this->isSuspiciousBooking($validated)) {
            Log::warning('Spam booking blocked and NOT saved', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'email' => $validated['email'],
                'destination' => $validated['destination'],
            ]);
            
            return redirect()
                ->route('index')
                ->with('success', 'Your booking has been submitted successfully! We will contact you shortly.');
        }

        // Hit the rate limiter
        RateLimiter::hit($key, 900); // 15 minutes

        // 5. Handle "Other" options
        if (($validated['nationality'] ?? '') === 'other') {
            $validated['nationality'] = $validated['nationality_other'] ?? 'Other';
        }
        unset($validated['nationality_other']);

        if (($validated['destination'] ?? '') === 'other') {
            $validated['destination'] = $validated['destination_other'] ?? 'Other';
        }
        unset($validated['destination_other']);

        if (($validated['trip_type'] ?? '') === 'other') {
            $validated['trip_type'] = $validated['trip_type_other'] ?? 'Other';
        }
        unset($validated['trip_type_other']);

        if (($validated['accommodation'] ?? '') === 'other') {
            $validated['accommodation'] = $validated['accommodation_other'] ?? 'Other';
        }
        unset($validated['accommodation_other']);

        // 6. Services array → JSON
        if (isset($validated['services']) && is_array($validated['services'])) {
            $validated['services'] = json_encode($validated['services']);
        } else {
            $validated['services'] = json_encode([]);
        }

        // 7. Add tracking information
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        // 8. Get current authenticated user (null if guest)
        $user = Auth::user();
        $validated['user_id'] = $user?->id;

        // Remove reCAPTCHA response from data
        unset($validated['g-recaptcha-response']);

        // 9. SAVE BOOKING (only legitimate, non-spam bookings reach here)
        try {
            $booking = Booking::create($validated);
            
            Log::info('Legitimate booking saved successfully', [
                'booking_id' => $booking->id,
                'email' => $validated['email'],
                'destination' => $validated['destination'],
                'user_id' => $user?->id,
                'is_authenticated' => $user !== null,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save booking to database', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'email' => $validated['email'],
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while saving your booking. Please try again later.');
        }

        // 10. EMAIL NOTIFICATIONS (non-blocking)
        try {
            $receiverEmails = explode(
                ',',
                env('RECEIVER_EMAILS', 'support@globetrottingtraveluk.com,globetrottingtraveluk@gmail.com')
            );

            $receiverEmails = array_filter(
                array_map('trim', $receiverEmails),
                fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL)
            );

            if (!empty($receiverEmails)) {
                foreach ($receiverEmails as $email) {
                    try {
                        Mail::to($email)->send(new BookingNotification($booking));
                    } catch (\Throwable $e) {
                        Log::error('Failed to send admin notification email', [
                            'booking_id' => $booking->id,
                            'recipient' => $email,
                            'error' => $e->getMessage(),
                        ]);
                    }
                }

                Log::info('Admin notification emails sent', [
                    'booking_id' => $booking->id,
                    'recipients' => $receiverEmails,
                ]);
            } else {
                Log::warning('No valid recipient emails configured', [
                    'booking_id' => $booking->id,
                ]);
            }

            try {
                Mail::to($validated['email'])->send(new BookingNotification($booking, true));
                
                Log::info('Customer confirmation email sent', [
                    'booking_id' => $booking->id,
                    'recipient' => $validated['email'],
                ]);
            } catch (\Throwable $e) {
                Log::error('Failed to send confirmation email to customer', [
                    'booking_id' => $booking->id,
                    'email' => $validated['email'],
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('Mail process failed', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage(),
            ]);
        }

        // 11. Success response
        return redirect()
            ->route('index')
            ->with('success', 'Your booking has been submitted successfully! We will contact you shortly.');

    } catch (\Illuminate\Validation\ValidationException $e) {
        throw $e;
        
    } catch (\Throwable $e) {
        Log::error('Unexpected error in bookTravelRequest', [
            'ip' => $request->ip(),
            'email' => $request->input('email'),
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'An unexpected error occurred. Please try again later.');
    }
}
/**
 * Check if booking contains spam patterns
 */
private function isSuspiciousBooking(array $data): bool
{
    // Common spam keywords
    $spamKeywords = [
        'viagra', 'cialis', 'casino', 'porn', 'sex', 'bitcoin', 'crypto',
        'forex', 'loan', 'seo service', 'buy now', 'click here',
        'limited time', 'earn money', 'work from home', 'make money fast',
        'free money', 'weight loss', 'male enhancement', 'buy followers',
        'investment opportunity', 'get rich', 'online pharmacy'
    ];

    // Combine text fields for checking
    $textFields = array_filter([
        $data['full_name'] ?? '',
        $data['email'] ?? '',
        $data['special_requests'] ?? '',
        $data['address'] ?? '',
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

    // Check for excessive URLs in special requests (more than 2)
    if (isset($data['special_requests'])) {
        $urlCount = preg_match_all('/(http|https|www\.)/i', $data['special_requests']);
        if ($urlCount > 2) {
            return true;
        }
    }

    // Check for gibberish/random text in special requests
    if (isset($data['special_requests']) && strlen($data['special_requests']) > 50) {
        $words = explode(' ', $data['special_requests']);
        $shortWords = array_filter($words, fn($w) => strlen($w) <= 2);
        // If more than 50% of words are 1-2 characters, likely spam
        if (count($shortWords) > count($words) * 0.5) {
            return true;
        }
    }

    // Check for suspicious email patterns
    if (isset($data['email'])) {
        $suspiciousEmailPatterns = [
            '/[0-9]{5,}@/',         // Too many numbers before @
            '/@.*\.ru$/',           // Russian domains
            '/@.*\.cn$/',           // Chinese domains
            '/@.*\.tk$/',           // Free domains often used for spam
            '/@tempmail\./i',       // Temporary email services
            '/@guerrillamail\./i',  // Disposable email
            '/@10minutemail\./i',   // Disposable email
            '/@mailinator\./i',     // Disposable email
        ];

        foreach ($suspiciousEmailPatterns as $pattern) {
            if (preg_match($pattern, $data['email'])) {
                return true;
            }
        }
    }

    // Check for repeated characters (common in spam names)
    if (isset($data['full_name'])) {
        // Check for 4+ consecutive identical characters
        if (preg_match('/(.)\1{3,}/', $data['full_name'])) {
            return true;
        }
    }

    // Check for all caps in name (common spam pattern)
    if (isset($data['full_name'])) {
        if (strlen($data['full_name']) > 5 && $data['full_name'] === strtoupper($data['full_name'])) {
            return true;
        }
    }

    // Check for suspicious phone patterns (all same digits, too short, etc.)
    if (isset($data['phone'])) {
        $cleanPhone = preg_replace('/[^0-9]/', '', $data['phone']);
        
        // Phone too short (less than 8 digits)
        if (strlen($cleanPhone) < 8) {
            return true;
        }
        
        // All same digit (e.g., 11111111, 99999999)
        if (preg_match('/^(\d)\1+$/', $cleanPhone)) {
            return true;
        }
    }

    // Check for unrealistic travel data
    if (isset($data['adults']) && $data['adults'] > 50) {
        return true; // Unrealistic number of adults
    }

    if (isset($data['children']) && $data['children'] > 30) {
        return true; // Unrealistic number of children
    }

    return false;
}



    public function addNewDestination()
    {
        return view('dashboard-components.add-destination');
    }

   


     public function store(Request $request)
    {
        Log::debug('Entering DestinationController@store');

        $validated = $request->validate([
            'price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'required|image|max:5120',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'adults' => 'required|integer|min:1',
            'nights' => 'required|integer|min:1',
        ]);

        $imageUrl = null;
        $retries = 3;
        $attempts = 0;
        $uploadSuccess = false;

        while ($attempts < $retries && !$uploadSuccess) {
            try {
                $attempts++;
                Log::info("Upload attempt #{$attempts} starting");

                $file = $request->file('image');
                if (!$file->isValid()) {
                    throw new Exception('Uploaded file is not valid');
                }

                // Log file info
                Log::debug('File info:', [
                    'originalName' => $file->getClientOriginalName(),
                    'mimeType' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                ]);

                // Upload via Cloudinary API
                $uploadResult = new UploadApi()->upload($file->getRealPath(), [
                    'folder' => 'destinations',
                    'public_id' => uniqid('dest_'),
                    'resource_type' => 'image',
                ]);

                if (!empty($uploadResult['secure_url'])) {
                    $imageUrl = $uploadResult['secure_url'];
                    $uploadSuccess = true;
                    Log::info("Upload successful on attempt #{$attempts}", ['secure_url' => $imageUrl]);
                } else {
                    throw new Exception('Cloudinary upload did not return a secure_url');
                }
            } catch (Exception $e) {
                Log::error("Upload attempt #{$attempts} failed", [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);

                if ($attempts < $retries) {
                    Log::info('Retrying upload — attempt #' . ($attempts + 1));
                    sleep(1);
                }
            }
        }

        if (!$uploadSuccess) {
            Log::warning('All upload attempts failed; returning error to user');
            return back()->withInput()->with('error', 'Image upload failed after multiple attempts.');
        }

        // After upload succeeded, create destination with auto-generated slug
        $destination = null;
        try {
            // Slug will be auto-generated by the model's boot method
            $destination = Destination::create([
                'price' => $validated['price'],
                'country' => $validated['country'],
                'title' => $validated['title'],
                'short_description' => $validated['short_description'],
                'details' => $validated['details'],
                'image_url' => $imageUrl,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'adults' => $validated['adults'],
                'nights' => $validated['nights'],
            ]);
            
            Log::info('Destination record created', [
                'destination_id' => $destination->id,
                'slug' => $destination->slug
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create destination record', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withInput()->with('error', 'Failed to save destination. Please try again.');
        }

        Log::debug('Exiting DestinationController@store successfully');
        return redirect()->back()->with('success', 'Destination added successfully with slug: ' . $destination->slug);
    }

    public function update(Request $request, $id)
    {
        Log::debug('Entering DestinationController@update', ['id' => $id]);

        $destination = Destination::findOrFail($id);

        $validated = $request->validate([
            'price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'adults' => 'required|integer|min:1',
            'nights' => 'required|integer|min:1',
        ]);

        $imageUrl = $destination->image_url;

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            $retries = 3;
            $attempts = 0;
            $uploadSuccess = false;

            while ($attempts < $retries && !$uploadSuccess) {
                try {
                    $attempts++;
                    $file = $request->file('image');

                    if (!$file->isValid()) {
                        throw new Exception('Uploaded file is not valid');
                    }

                    $uploadResult = new UploadApi()->upload($file->getRealPath(), [
                        'folder' => 'destinations',
                        'public_id' => uniqid('dest_'),
                        'resource_type' => 'image',
                    ]);

                    if (!empty($uploadResult['secure_url'])) {
                        $imageUrl = $uploadResult['secure_url'];
                        $uploadSuccess = true;
                        Log::info("Upload successful on attempt #{$attempts}", ['secure_url' => $imageUrl]);
                    } else {
                        throw new Exception('Cloudinary upload did not return a secure_url');
                    }
                } catch (Exception $e) {
                    Log::error("Upload attempt #{$attempts} failed", [
                        'error' => $e->getMessage(),
                    ]);

                    if ($attempts < $retries) {
                        sleep(1);
                    }
                }
            }

            if (!$uploadSuccess) {
                return back()->withInput()->with('error', 'Image upload failed after multiple attempts.');
            }
        }

        try {
            // If title changed, slug will be auto-regenerated by the model
            $destination->update([
                'price' => $validated['price'],
                'country' => $validated['country'],
                'title' => $validated['title'],
                'short_description' => $validated['short_description'],
                'details' => $validated['details'],
                'image_url' => $imageUrl,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'adults' => $validated['adults'],
                'nights' => $validated['nights'],
            ]);

            Log::info('Destination updated', [
                'destination_id' => $destination->id,
                'slug' => $destination->slug
            ]);
        } catch (Exception $e) {
            Log::error('Failed to update destination', [
                'error' => $e->getMessage(),
            ]);
            return back()->withInput()->with('error', 'Failed to update destination. Please try again.');
        }

        return redirect()->back()->with('success', 'Destination updated successfully.');
    }


        
    // List all destinations (paginated, for admin dashboard)
    public function index()
    {
        Log::info('The manage destination method is called');
        $destinations = Destination::orderBy('created_at', 'desc')->paginate(10);
        // dd($destinations);
        // exit();

        return view('admin.destinations.index', compact('destinations'));
    }

    // Recent 4
    public function recent()
    {
        $destinations = Destination::orderBy('created_at', 'desc')->take(4)->get();

        return view('admin.destinations.recent', compact('destinations'));
    }

    // Show the edit form
    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

  
    // Delete
    public function destroy(Destination $destination)
    {
        try {
            $destination->delete();
            Log::info('Destination deleted', ['destination_id' => $destination->id]);
        } catch (Exception $e) {
            Log::error('Failed to delete destination', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Failed to delete destination.');
        }

        return redirect()->route('admin.destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
