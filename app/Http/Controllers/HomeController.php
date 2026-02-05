<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Inquiry;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = $this->getRecentDestinations();
        Log::info('Destinations fetched:', ['count' => $destinations->count(), 'data' => $destinations]);
        return view('welcome', compact('destinations'));
    }

    private function getRecentDestinations()
    {
        return Destination::where('status', 'public')
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($destination) {
                // Add gradient colors for visual appeal
                $gradients = [
                    'from-emerald-400 to-cyan-500',
                    'from-purple-400 to-pink-500',
                    'from-orange-400 to-red-500',
                    'from-blue-400 to-indigo-500',
                    'from-green-400 to-blue-500',
                    'from-pink-400 to-rose-500',
                    'from-yellow-400 to-orange-500',
                    'from-indigo-400 to-purple-500',
                ];

                // Only add gradient if not already set
                if (!$destination->gradient) {
                    $destination->gradient = $gradients[array_rand($gradients)];
                }

                return $destination;
            });
    }

    public function allDestinations(Request $request)
    {
        Log::info('The list all destination method is initiated');
        Log::info('The incoming request', $request->all());

        $destinations = $this->getAllDestinations();
        Log::info('All destinations fetched:', ['count' => $destinations->count(), 'current_page' => $destinations->currentPage()]);

        return view('admin.destinations.all-destinations', compact('destinations'));
    }

    private function getAllDestinations()
    {
        $destinations = Destination::where('status', 'public')
            ->latest()
            ->paginate(8);

        // Transform each destination in the paginated collection
        $destinations->getCollection()->transform(function ($destination) {
            return $this->addDestinationEnhancements($destination);
        });

        return $destinations;
    }

    /**
     * Show a single destination by slug
     */
    public function showDestination($slug)
    {
        try {
            $destination = Destination::where('slug', $slug)
                ->where('status', 'public')
                ->firstOrFail();

            // Add gradient enhancement
            $destination = $this->addDestinationEnhancements($destination);

            // Get related destinations (same country or similar price range)
            $relatedDestinations = Destination::where('status', 'public')
                ->where('id', '!=', $destination->id)
                ->where(function ($query) use ($destination) {
                    $query->where('country', $destination->country)
                        ->orWhereBetween('price', [
                            $destination->price * 0.7,
                            $destination->price * 1.3,
                        ]);
                })
                ->latest()
                ->take(3)
                ->get()
                ->map(function ($dest) {
                    return $this->addDestinationEnhancements($dest);
                });

            return view('pages.destination-details', compact('destination', 'relatedDestinations'));
            
        } catch (ModelNotFoundException $e) {
            abort(404, 'Destination not found');
        }
    }

    private function addDestinationEnhancements($destination)
    {
        // Add gradient colors for visual appeal
        $gradients = [
            'from-emerald-400 to-cyan-500',
            'from-purple-400 to-pink-500',
            'from-orange-400 to-red-500',
            'from-blue-400 to-indigo-500',
            'from-green-400 to-blue-500',
            'from-pink-400 to-rose-500',
            'from-yellow-400 to-orange-500',
            'from-indigo-400 to-purple-500',
        ];

        // Only add gradient if not already set
        if (!$destination->gradient) {
            $destination->gradient = $gradients[array_rand($gradients)];
        }

        return $destination;
    }

    // public function sendInterestEmail(Request $request)
    // {
    //     try {
    //         // Validate the request
    //         $validated = $request->validate([
    //             'destination_id' => 'required|integer|exists:destinations,id',
    //             'first_name' => 'required|string|max:255',
    //             'last_name' => 'required|string|max:255',
    //             'email' => 'required|email|max:255',
    //             'phone' => 'nullable|string|max:20',
    //             'message' => 'nullable|string|max:1000',
    //         ]);

    //         $destination = Destination::findOrFail($validated['destination_id']);

    //         $recipients = config('app.export_recipients', ['webmasterjdd@gmail.com', 'support@globetrottingtraveluk.com']);

    //         $subject = 'New Travel Interest: ' . $destination->title;

    //         // Compose the message
    //         $message = "New Travel Interest Received\n";
    //         $message .= "=================================\n\n";
    //         $message .= "CUSTOMER DETAILS:\n";
    //         $message .= "Name: {$validated['first_name']} {$validated['last_name']}\n";
    //         $message .= "Email: {$validated['email']}\n";
    //         $message .= 'Phone: ' . ($validated['phone'] ?? 'Not provided') . "\n\n";

    //         $message .= "DESTINATION INTEREST:\n";
    //         $message .= "Destination: {$destination->title}\n";
    //         $message .= "Country: {$destination->country}\n";

    //         if ($destination->price) {
    //             $message .= 'Price: £' . number_format($destination->price) . "\n";
    //         }

    //         if ($destination->nights) {
    //             $message .= "Duration: {$destination->nights} nights\n";
    //         }

    //         if ($destination->adults) {
    //             $message .= "Group Size: {$destination->adults} adults\n";
    //         }

    //         if ($destination->start_date && $destination->end_date) {
    //             $message .= 'Travel Dates: ' . date('d/m/Y', strtotime($destination->start_date)) . ' - ' . date('d/m/Y', strtotime($destination->end_date)) . "\n";
    //         }

    //         if ($destination->short_description) {
    //             $message .= "Description: {$destination->short_description}\n";
    //         }

    //         if (!empty($validated['message'])) {
    //             $message .= "\nCUSTOMER MESSAGE:\n{$validated['message']}\n";
    //         }

    //         $message .= "\nADDITIONAL INFO:\n";
    //         $message .= 'Inquiry Date: ' . now()->format('d/m/Y H:i:s') . "\n";
    //         $message .= 'IP Address: ' . $request->ip() . "\n";
    //         $message .= 'User Agent: ' . $request->userAgent() . "\n";

    //         if ($destination->details) {
    //             $message .= "\nFULL DESTINATION DETAILS:\n{$destination->details}\n";
    //         }

    //         $message .= "\n=================================\n";
    //         $message .= "Please follow up with this customer within 24 hours.\n";
    //         $message .= "Customer Email: {$validated['email']}\n";
    //         $message .= 'Customer Phone: ' . ($validated['phone'] ?? 'Not provided') . "\n";

    //         // Save inquiry first (always)
    //         $inquiry = Inquiry::create([
    //             'destination_id' => $destination->id,
    //             'first_name' => $validated['first_name'],
    //             'last_name' => $validated['last_name'],
    //             'email' => $validated['email'],
    //             'phone' => $validated['phone'],
    //             'message' => $validated['message'],
    //             'ip_address' => $request->ip(),
    //             'user_agent' => $request->userAgent(),
    //         ]);

    //         // Attempt to send email (non-blocking)
    //         try {
    //             foreach ($recipients as $recipient) {
    //                 Mail::raw($message, function ($mail) use ($recipient, $subject, $validated) {
    //                     $mail
    //                         ->to(trim($recipient))
    //                         ->subject($subject)
    //                         ->replyTo($validated['email'], $validated['first_name'] . ' ' . $validated['last_name']);
    //                 });
    //             }
    //         } catch (\Throwable $mailException) {
    //             // Log mail failure but do not fail request
    //             Log::error('Interest email failed to send', [
    //                 'destination_id' => $destination->id,
    //                 'email' => $validated['email'],
    //                 'error' => $mailException->getMessage(),
    //             ]);
    //         }

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Interest sent successfully! Our travel experts will contact you soon.',
    //         ]);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json(
    //             [
    //                 'success' => false,
    //                 'message' => 'Please check your information and try again.',
    //                 'errors' => $e->errors(),
    //             ],
    //             422,
    //         );
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(
    //             [
    //                 'success' => false,
    //                 'message' => 'The selected destination was not found.',
    //             ],
    //             404,
    //         );
    //     } catch (\Throwable $e) {
    //         Log::error('Unexpected error in sendInterestEmail', [
    //             'destination_id' => $request->input('destination_id'),
    //             'email' => $request->input('email'),
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString(),
    //         ]);

    //         return response()->json(
    //             [
    //                 'success' => false,
    //                 'message' => 'An unexpected error occurred. Please try again later.',
    //             ],
    //             500,
    //         );
    //     }
    // }



    public function sendInterestEmail(Request $request)
{
    try {
        // 1. Honeypot check - bot trap (reject immediately, don't save)
        if ($request->filled('website')) {
            Log::warning('Bot detected via honeypot in interest form', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            // Fake success to not alert the bot
            return response()->json([
                'success' => true,
                'message' => 'Interest sent successfully! Our travel experts will contact you soon.',
            ]);
        }

        // 2. Rate limiting: max 5 submissions per IP in 10 minutes
        $key = 'interest-submit:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'message' => "Too many requests. Please try again in {$seconds} seconds.",
            ], 429);
        }

        // 3. Validate the request
        $validated = $request->validate([
            'destination_id' => 'required|integer|exists:destinations,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
            //'form_type' => 'nullable|string',
        ]);

        // 4. Spam detection - REJECT before saving
        if ($this->isSuspiciousInquiry($validated)) {
            Log::warning('Spam inquiry blocked and NOT saved', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'email' => $validated['email'],
                'destination_id' => $validated['destination_id'],
            ]);
            
            // Fake success to not alert the spammer
            return response()->json([
                'success' => true,
                'message' => 'Interest sent successfully! Our travel experts will contact you soon.',
            ]);
        }

        // Hit the rate limiter (only for legitimate requests that passed spam check)
        RateLimiter::hit($key, 600); // 10 minutes

        $destination = Destination::findOrFail($validated['destination_id']);

        // Get current authenticated user (null if guest)
        $user = Auth::user();

        // SAVE INQUIRY (only legitimate, non-spam inquiries reach here)
        $inquiry = Inquiry::create([
            'destination_id' => $destination->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'user_id' => $user?->id, // Link to authenticated user if logged in
            //'form_type'=> $validated['form_type'], // Track which form was used
        ]);

        Log::info('Legitimate travel interest inquiry saved', [
            'inquiry_id' => $inquiry->id,
            'destination' => $destination->title,
            'email' => $validated['email'],
            'user_id' => $user?->id,
            'is_authenticated' => $user !== null,
        ]);

        // Prepare email notification (non-blocking)
        try {
            $recipients = config('app.export_recipients', [
                'webmasterjdd@gmail.com',
                'support@globetrottingtraveluk.com'
            ]);

            $subject = 'New Travel Interest: ' . $destination->title;

            // Compose the message
            $message = "New Travel Interest Received\n";
            $message .= "=================================\n\n";
            $message .= "INQUIRY ID: #{$inquiry->id}\n\n";
            $message .= "CUSTOMER DETAILS:\n";
            $message .= "Name: {$validated['first_name']} {$validated['last_name']}\n";
            $message .= "Email: {$validated['email']}\n";
            $message .= 'Phone: ' . ($validated['phone'] ?? 'Not provided') . "\n";
            
            if ($user) {
                $message .= "Account Status: Registered User (ID: {$user->id})\n";
            } else {
                $message .= "Account Status: Guest User\n";
            }
            
            $message .= "\n";

            $message .= "DESTINATION INTEREST:\n";
            $message .= "Destination: {$destination->title}\n";
            $message .= "Country: {$destination->country}\n";

            if ($destination->price) {
                $message .= 'Price: £' . number_format($destination->price) . "\n";
            }

            if ($destination->nights) {
                $message .= "Duration: {$destination->nights} nights\n";
            }

            if ($destination->adults) {
                $message .= "Group Size: {$destination->adults} adults\n";
            }

            if ($destination->start_date && $destination->end_date) {
                $message .= 'Travel Dates: ' . date('d/m/Y', strtotime($destination->start_date)) . ' - ' . date('d/m/Y', strtotime($destination->end_date)) . "\n";
            }

            if ($destination->short_description) {
                $message .= "Description: {$destination->short_description}\n";
            }

            if (!empty($validated['message'])) {
                $message .= "\nCUSTOMER MESSAGE:\n{$validated['message']}\n";
            }

            $message .= "\nADDITIONAL INFO:\n";
            $message .= 'Inquiry Date: ' . now()->format('d/m/Y H:i:s') . "\n";
            $message .= 'IP Address: ' . $request->ip() . "\n";
            $message .= 'User Agent: ' . $request->userAgent() . "\n";

            if ($destination->details) {
                $message .= "\nFULL DESTINATION DETAILS:\n{$destination->details}\n";
            }

            $message .= "\n=================================\n";
            $message .= "Please follow up with this customer within 24 hours.\n";
            $message .= "Customer Email: {$validated['email']}\n";
            $message .= 'Customer Phone: ' . ($validated['phone'] ?? 'Not provided') . "\n";

            // Send email to all recipients
            foreach ($recipients as $recipient) {
                Mail::raw($message, function ($mail) use ($recipient, $subject, $validated) {
                    $mail
                        ->to(trim($recipient))
                        ->subject($subject)
                        ->replyTo($validated['email'], $validated['first_name'] . ' ' . $validated['last_name']);
                });
            }

            Log::info('Interest email sent successfully', [
                'inquiry_id' => $inquiry->id,
                'to' => $recipients,
            ]);

        } catch (\Throwable $mailException) {
            // Log mail failure but do NOT fail the request
            Log::error('Interest email failed to send', [
                'inquiry_id' => $inquiry->id,
                'destination_id' => $destination->id,
                'email' => $validated['email'],
                'error' => $mailException->getMessage(),
                'trace' => $mailException->getTraceAsString(),
            ]);
            // Inquiry is already saved, so we continue
        }

        // Return success
        return response()->json([
            'success' => true,
            'message' => 'Interest sent successfully! Our travel experts will contact you soon.',
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Please check your information and try again.',
            'errors' => $e->errors(),
        ], 422);

    } catch (ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'The selected destination was not found.',
        ], 404);

    } catch (\Throwable $e) {
        Log::error('Unexpected error in sendInterestEmail', [
            'destination_id' => $request->input('destination_id'),
            'email' => $request->input('email'),
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
        ], 500);
    }
}

/**
 * Check if inquiry contains spam patterns
 */
private function isSuspiciousInquiry(array $data): bool
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
        $data['first_name'] ?? '',
        $data['last_name'] ?? '',
        $data['email'] ?? '',
        $data['message'] ?? ''
    ]);
    $allText = strtolower(implode(' ', $textFields));

    // Check for spam keywords
    foreach ($spamKeywords as $keyword) {
        if (str_contains($allText, strtolower($keyword))) {
            return true;
        }
    }

    // Check for URLs in name fields (common bot pattern)
    $nameFields = ($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? '');
    if (preg_match('/(http|https|www\.|\.com|\.net|\.org|\.ru|\.cn|\.tk)/i', $nameFields)) {
        return true;
    }

    // Check for excessive URLs in message (more than 2)
    if (isset($data['message'])) {
        $urlCount = preg_match_all('/(http|https|www\.)/i', $data['message']);
        if ($urlCount > 2) {
            return true;
        }
    }

    // Check for gibberish/random text in message
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
            '/[0-9]{5,}@/',         // Too many numbers before @
            '/@.*\.ru$/',           // Russian domains (common for spam)
            '/@.*\.cn$/',           // Chinese domains
            '/@.*\.tk$/',           // Free domains often used for spam
            '/@tempmail\./i',       // Temporary email services
            '/@guerrillamail\./i',  // Disposable email
            '/@10minutemail\./i',   // Disposable email
        ];

        foreach ($suspiciousEmailPatterns as $pattern) {
            if (preg_match($pattern, $data['email'])) {
                return true;
            }
        }
    }

    // Check for repeated characters (common in spam names)
    if (isset($data['first_name']) || isset($data['last_name'])) {
        $fullName = ($data['first_name'] ?? '') . ($data['last_name'] ?? '');
        // Check for 4+ consecutive identical characters
        if (preg_match('/(.)\1{3,}/', $fullName)) {
            return true;
        }
    }

    // Check for all caps in name (common spam pattern)
    if (isset($data['first_name']) && isset($data['last_name'])) {
        $fullName = $data['first_name'] . ' ' . $data['last_name'];
        if (strlen($fullName) > 5 && $fullName === strtoupper($fullName)) {
            return true;
        }
    }

    return false;
}

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }
}