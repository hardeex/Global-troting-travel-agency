<?php
namespace App\Http\Controllers;

use App\Mail\BookingNotification;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Log;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Exception;
use Illuminate\Support\Facades\Mail;

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
        Log::info('The book travel request is sent...');
        Log::info('The incoming request', $request->all());

        // Validate the form data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'nationality' => 'required|string|max:100',
            'nationality_other' => 'nullable|string|max:100',
            'destination' => 'required|string|max:255',
            'destination_other' => 'nullable|string|max:255',
            'trip_type' => 'required|string|max:100',
            'trip_type_other' => 'nullable|string|max:100',
            'departure_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:departure_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'infants' => 'nullable|integer|min:0',
            'accommodation' => 'required|string|max:100',
            'accommodation_other' => 'nullable|string|max:100',
            'budget' => 'required|string|max:50',
            'services' => 'nullable|array',
            'services.*' => 'string',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        // Handle "other" fields
        if ($validated['nationality'] === 'other') {
            $validated['nationality'] = $validated['nationality_other'] ?? 'Other';
        }

        if ($validated['destination'] === 'other') {
            $validated['destination'] = $validated['destination_other'] ?? 'Other';
        }

        if ($validated['trip_type'] === 'other') {
            $validated['trip_type'] = $validated['trip_type_other'] ?? 'Other';
        }

        if ($validated['accommodation'] === 'other') {
            $validated['accommodation'] = $validated['accommodation_other'] ?? 'Other';
        }

        // Convert services array to JSON or comma-separated string
        if (isset($validated['services'])) {
            $validated['services'] = json_encode($validated['services']);
        }

        // Save to database
        $booking = Booking::create($validated);

        // Send email notifications
        try {
            $receiverEmails = explode(',', env('RECEIVER_EMAILS', 'support@globetrottingtraveluk.com,globetrottingtraveluk@gmail.com'));

            foreach ($receiverEmails as $email) {
                try {
                    Mail::to(trim($email))->send(new BookingNotification($booking));
                } catch (Exception $e) {
                    //throw $th;
                    Log::info('The mail server sends...', $e);
                }
            }

            try {
                // Send confirmation email to customer
                Mail::to($validated['email'])->send(new BookingNotification($booking, true));
            } catch (Exception $exception) {
                //throw $th;
                Log::info('Sending email notification to the customer failed', $exception);
            }
        } catch (\Exception $e) {
            // Log the error but don't fail the booking
            Log::error('Failed to send booking email: ' . $e->getMessage());
        }

        // return redirect()
        //     ->back()
        //     ->with([
        //         'success' => 'Your booking has been submitted successfully! We will contact you shortly.',
        //         'email_warning' => isset($e) ? 'However, we were unable to send a confirmation email. Please check back or contact us if needed.' : null,
        //     ]);

        return redirect()->route('index')->with([
    'success' => 'Your booking has been submitted successfully! We will contact you shortly.',
    'email_warning' => isset($e) ? 'However, we were unable to send a confirmation email. Please check back or contact us if needed.' : null,
]);

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

                //Log::debug('Cloudinary upload response:', $uploadResult);

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

        // After upload succeeded:
        $destination = null;
        try {
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
            Log::info('Destination record created', ['destination_id' => $destination->id]);
        } catch (Exception $e) {
            Log::error('Failed to create destination record', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withInput()->with('error', 'Failed to save destination. Please try again.');
        }

        Log::debug('Exiting DestinationController@store successfully');
        return redirect()->back()->with('success', 'Destination added successfully.');
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

    // Handle update
    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
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

        if ($request->hasFile('image')) {
            $imageUrl = null;
            $retries = 3;
            $attempts = 0;
            $uploadSuccess = false;

            while ($attempts < $retries && !$uploadSuccess) {
                try {
                    $attempts++;
                    Log::info("Destination update: upload attempt #{$attempts}");

                    $file = $request->file('image');
                    if (!$file->isValid()) {
                        throw new Exception('Uploaded file is not valid');
                    }

                    // Log file info
                    Log::debug('Update file info:', [
                        'originalName' => $file->getClientOriginalName(),
                        'mimeType' => $file->getClientMimeType(),
                        'size' => $file->getSize(),
                    ]);

                    $uploadResult = new UploadApi()->upload($file->getRealPath(), [
                        'folder' => 'destinations',
                        'public_id' => uniqid('dest_update_'),
                        'resource_type' => 'image',
                    ]);

                    //Log::debug('Cloudinary upload response (update):', $uploadResult);

                    if (!empty($uploadResult['secure_url'])) {
                        $imageUrl = $uploadResult['secure_url'];
                        $uploadSuccess = true;
                        Log::info("Update upload successful on attempt #{$attempts}", ['secure_url' => $imageUrl]);
                    } else {
                        throw new Exception('Cloudinary upload did not return secure_url');
                    }
                } catch (Exception $e) {
                    Log::error("Destination update upload attempt #{$attempts} failed", [
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                    ]);

                    if ($attempts < $retries) {
                        sleep(1);
                    }
                }
            }

            if (!$uploadSuccess) {
                return back()->withInput()->with('error', 'Image upload on update failed after multiple attempts.');
            }

            $data['image_url'] = $imageUrl;
        }

        try {
            $destination->update($data);
            Log::info('Destination updated', ['destination_id' => $destination->id]);
        } catch (Exception $e) {
            Log::error('Failed to update destination', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withInput()->with('error', 'Failed to update destination.');
        }

        return redirect()->route('admin.destinations.index')->with('success', 'Destination updated successfully.');
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
