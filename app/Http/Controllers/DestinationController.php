<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Log;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Exception;

class DestinationController extends Controller
{
    protected Cloudinary $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => [
                'secure' => true,
            ],
        ]);
    }

    public function store(Request $request)
    {
        Log::debug('Entering DestinationController@store');

        $validated = $request->validate([
            'price'             => 'required|numeric',
            'country'           => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'details'           => 'required|string',
            'image'             => 'required|image|max:5120',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'adults'            => 'required|integer|min:1',
            'nights'            => 'required|integer|min:1',
        ]);

        Log::debug('Validated data:', [
            'price' => $validated['price'],
            'country' => $validated['country'],
            'title' => $validated['title'],
            // maybe do not log sensitive fields, but here it's okay
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
                    throw new Exception("Uploaded file is not valid");
                }

                // Log file info
                Log::debug('File info:', [
                    'originalName' => $file->getClientOriginalName(),
                    'mimeType'     => $file->getClientMimeType(),
                    'size'         => $file->getSize(),
                ]);

                // Upload via Cloudinary API
                $uploadResult = (new UploadApi())->upload(
                    $file->getRealPath(),
                    [
                        'folder'        => 'destinations',
                        'public_id'     => uniqid('dest_'),
                        'resource_type' => 'image',
                    ]
                );

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
                    Log::info("Retrying upload — attempt #".($attempts + 1));
                    // optional delay
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
                'price'             => $validated['price'],
                'country'           => $validated['country'],
                'title'             => $validated['title'],
                'short_description' => $validated['short_description'],
                'details'           => $validated['details'],
                'image_url'         => $imageUrl,
                'start_date'        => $validated['start_date'],
                'end_date'          => $validated['end_date'],
                'adults'            => $validated['adults'],
                'nights'            => $validated['nights'],
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
        // You can choose pagination
        $destinations = Destination::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.destinations.index', compact('destinations'));
    }

    // Recent 4
    public function recent()
    {
        $destinations = Destination::orderBy('created_at', 'desc')
                                   ->take(4)
                                   ->get();

        return view('admin.destinations.recent', compact('destinations'));
        // or return JSON if part of an API
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
            'price'             => 'required|numeric',
            'country'           => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'details'           => 'required|string',
            'image'             => 'nullable|image|max:5120', // image optional on update
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'adults'            => 'required|integer|min:1',
            'nights'            => 'required|integer|min:1',
        ]);

        // If a new image was uploaded, upload to Cloudinary with retry, else keep old
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
                        throw new Exception("Uploaded file is not valid");
                    }

                    // Log file info
                    Log::debug('Update file info:', [
                        'originalName' => $file->getClientOriginalName(),
                        'mimeType'     => $file->getClientMimeType(),
                        'size'         => $file->getSize(),
                    ]);

                    $uploadResult = (new UploadApi())->upload(
                        $file->getRealPath(),
                        [
                            'folder'        => 'destinations',
                            'public_id'     => uniqid('dest_update_'),
                            'resource_type' => 'image',
                        ]
                    );

                    Log::debug('Cloudinary upload response (update):', $uploadResult);

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

        return redirect()->route('admin.destinations.index')
                         ->with('success', 'Destination updated successfully.');
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

        return redirect()->route('admin.destinations.index')
                         ->with('success', 'Destination deleted successfully.');
    }

    
}
