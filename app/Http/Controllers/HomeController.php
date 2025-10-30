<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Inquiry;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        return Destination::latest()
            ->take(4)
            ->get()
            ->map(function ($destination) {
                // Add gradient colors for visual appeal
                $gradients = ['from-emerald-400 to-cyan-500', 'from-purple-400 to-pink-500', 'from-orange-400 to-red-500', 'from-blue-400 to-indigo-500', 'from-green-400 to-blue-500', 'from-pink-400 to-rose-500', 'from-yellow-400 to-orange-500', 'from-indigo-400 to-purple-500'];

                // Only add gradient if not already set
                if (!$destination->gradient) {
                    $destination->gradient = $gradients[array_rand($gradients)];
                }

                return $destination;
            });
    }

    public function allDestinations(Request $request)
    {
        Log::info('The list all destination method is iniitated');
        Log::info('The incoming request', $request->all());

        $destinations = $this->getAllDestinations();
        Log::info('All destinations fetched:', ['count' => $destinations->count(), 'current_page' => $destinations->currentPage()]);

        // dd($destinations);
        // exit();


        return view('admin.destinations.all-destinations', compact('destinations'));
    }

    private function getAllDestinations()
    {
        $destinations = Destination::latest()->paginate(8); 

        // Transform each destination in the paginated collection
        $destinations->getCollection()->transform(function ($destination) {
            return $this->addDestinationEnhancements($destination);
        });

        return $destinations;
    }

    private function addDestinationEnhancements($destination)
    {
        // Add gradient colors for visual appeal
        $gradients = ['from-emerald-400 to-cyan-500', 'from-purple-400 to-pink-500', 'from-orange-400 to-red-500', 'from-blue-400 to-indigo-500', 'from-green-400 to-blue-500', 'from-pink-400 to-rose-500', 'from-yellow-400 to-orange-500', 'from-indigo-400 to-purple-500'];

        // Only add gradient if not already set
        if (!$destination->gradient) {
            $destination->gradient = $gradients[array_rand($gradients)];
        }

        return $destination;
    }

    public function sendInterestEmail2(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'destination_id' => 'required|integer|exists:destinations,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'message' => 'nullable|string|max:1000',
            ]);

            $destinationId = $request->input('destination_id');
            $destination = Destination::findOrFail($destinationId);

            // Get user information
            $firstName = $request->input('first_name');
            $lastName = $request->input('last_name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $userMessage = $request->input('message');

            $recipients = config('app.export_recipients', ['webmasterjdd@gmail.com', 'support@globetrottingtraveluk.com']);

            $subject = 'New Travel Interest: ' . $destination->title;

            // Build comprehensive message
            $message = "New Travel Interest Received\n";
            $message .= "=================================\n\n";

            // Customer Information
            $message .= "CUSTOMER DETAILS:\n";
            $message .= 'Name: ' . $firstName . ' ' . $lastName . "\n";
            $message .= 'Email: ' . $email . "\n";
            $message .= 'Phone: ' . ($phone ? $phone : 'Not provided') . "\n\n";

            // Destination Information
            $message .= "DESTINATION INTEREST:\n";
            $message .= 'Destination: ' . $destination->title . "\n";
            $message .= 'Country: ' . ($destination->country ? $destination->country : 'Not specified') . "\n";

            if ($destination->price) {
                $message .= 'Price: £' . number_format($destination->price) . "\n";
            }

            if ($destination->nights) {
                $message .= 'Duration: ' . $destination->nights . " nights\n";
            }

            if ($destination->adults) {
                $message .= 'Group Size: ' . $destination->adults . " adults\n";
            }

            if ($destination->start_date && $destination->end_date) {
                $message .= 'Travel Dates: ' . date('d/m/Y', strtotime($destination->start_date)) . ' - ' . date('d/m/Y', strtotime($destination->end_date)) . "\n";
            }

            if ($destination->short_description) {
                $message .= 'Description: ' . $destination->short_description . "\n";
            }

            // Customer Message
            if ($userMessage) {
                $message .= "\nCUSTOMER MESSAGE:\n";
                $message .= $userMessage . "\n";
            }

            // Additional Details
            $message .= "\nADDITIONAL INFO:\n";
            $message .= 'Inquiry Date: ' . now()->format('d/m/Y H:i:s') . "\n";
            $message .= 'IP Address: ' . $request->ip() . "\n";
            $message .= 'User Agent: ' . $request->userAgent() . "\n";

            if ($destination->details) {
                $message .= "\nFULL DESTINATION DETAILS:\n";
                $message .= $destination->details . "\n";
            }

            $message .= "\n=================================\n";
            $message .= "Please follow up with this customer within 24 hours.\n";
            $message .= 'Customer Email: ' . $email . "\n";
            $message .= 'Customer Phone: ' . ($phone ? $phone : 'Not provided') . "\n";

            // Use Laravel's Mail facade for better error handling
            foreach ($recipients as $recipient) {
                Mail::raw($message, function ($mail) use ($recipient, $subject, $email, $firstName, $lastName) {
                    $mail
                        ->to(trim($recipient))
                        ->subject($subject)
                        ->replyTo($email, $firstName . ' ' . $lastName);
                });
            }

            // DB::table('inquiries')->insert([
            //     'destination_id' => $destinationId,
            //     'first_name' => $firstName,
            //     'last_name' => $lastName,
            //     'email' => $email,
            //     'phone' => $phone,
            //     'message' => $userMessage,
            //     'ip_address' => $request->ip(),
            //     'user_agent' => $request->userAgent(),
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ]);

            Inquiry::create([
                'destination_id' => $destinationId,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => $phone,
                'message' => $userMessage,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Interest sent successfully! Our travel experts will contact you soon.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Please check your information and try again.',
                    'errors' => $e->errors(),
                ],
                422,
            );
        } catch (\Exception $e) {
            Log::error('Error sending interest email: ' . $e->getMessage(), [
                'destination_id' => $request->input('destination_id'),
                'email' => $request->input('email'),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to send interest. Please try again later.',
                ],
                500,
            );
        }
    }

    public function sendInterestEmail(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'destination_id' => 'required|integer|exists:destinations,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'message' => 'nullable|string|max:1000',
            ]);

            $destination = Destination::findOrFail($validated['destination_id']);

            $recipients = config('app.export_recipients', ['webmasterjdd@gmail.com', 'support@globetrottingtraveluk.com']);

            $subject = 'New Travel Interest: ' . $destination->title;

            // Compose the message
            $message = "New Travel Interest Received\n";
            $message .= "=================================\n\n";
            $message .= "CUSTOMER DETAILS:\n";
            $message .= "Name: {$validated['first_name']} {$validated['last_name']}\n";
            $message .= "Email: {$validated['email']}\n";
            $message .= 'Phone: ' . ($validated['phone'] ?? 'Not provided') . "\n\n";

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
                $message .= "\nCUSTOMER MESSAGE:\n" . $validated['message'] . "\n";
            }

            $message .= "\nADDITIONAL INFO:\n";
            $message .= 'Inquiry Date: ' . now()->format('d/m/Y H:i:s') . "\n";
            $message .= 'IP Address: ' . $request->ip() . "\n";
            $message .= 'User Agent: ' . $request->userAgent() . "\n";

            if ($destination->details) {
                $message .= "\nFULL DESTINATION DETAILS:\n" . $destination->details . "\n";
            }

            $message .= "\n=================================\n";
            $message .= "Please follow up with this customer within 24 hours.\n";
            $message .= "Customer Email: {$validated['email']}\n";
            $message .= 'Customer Phone: ' . ($validated['phone'] ?? 'Not provided') . "\n";

            // Send email
            foreach ($recipients as $recipient) {
                Mail::raw($message, function ($mail) use ($recipient, $subject, $validated) {
                    $mail
                        ->to(trim($recipient))
                        ->subject($subject)
                        ->replyTo($validated['email'], $validated['first_name'] . ' ' . $validated['last_name']);
                });
            }

            // Save inquiry to DB using Eloquent
            Inquiry::create([
                'destination_id' => $destination->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Interest sent successfully! Our travel experts will contact you soon.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Please check your information and try again.',
                    'errors' => $e->errors(),
                ],
                422,
            );
        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'The selected destination was not found.',
                ],
                404,
            );
        } catch (\Exception $e) {
            Log::error('Error sending interest email: ' . $e->getMessage(), [
                'destination_id' => $request->input('destination_id'),
                'email' => $request->input('email'),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to send interest. Please try again later.',
                ],
                500,
            );
        }
    }

    public function about()
    {
        return view('pages.about');
    }


    public function contact()
    {
        return view('pages.contact');
    }
}
