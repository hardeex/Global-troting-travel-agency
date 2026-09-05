<?php

namespace App\Services;

use Cloudinary\Api\Upload\UploadApi;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CloudinaryUploader
{
    /**
     * Upload a file to Cloudinary, retrying a few times on transient failures.
     *
     * @throws Exception if all attempts fail
     */
    public function upload(UploadedFile $file, string $folder, string $prefix, int $retries = 3): string
    {
        $attempts = 0;
        $lastError = null;

        while ($attempts < $retries) {
            try {
                $attempts++;

                if (!$file->isValid()) {
                    throw new Exception('Uploaded file is not valid');
                }

                $uploadResult = (new UploadApi())->upload($file->getRealPath(), [
                    'folder' => $folder,
                    'public_id' => uniqid($prefix),
                    'resource_type' => 'image',
                ]);

                if (!empty($uploadResult['secure_url'])) {
                    return $uploadResult['secure_url'];
                }

                throw new Exception('Cloudinary upload did not return a secure_url');
            } catch (Exception $e) {
                $lastError = $e;
                Log::error("Cloudinary upload attempt #{$attempts} failed", [
                    'error' => $e->getMessage(),
                    'folder' => $folder,
                ]);

                if ($attempts < $retries) {
                    sleep(1);
                }
            }
        }

        throw new Exception('Image upload failed after multiple attempts.', 0, $lastError);
    }
}
