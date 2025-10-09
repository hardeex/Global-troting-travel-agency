<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ExportContacts extends Command
{
    protected $signature = 'contacts:export';
    protected $description = 'Export all contact submissions and email them as a CSV';

    public function handle()
    {
        // Fetch all submissions
        $submissions = DB::table('form_submissions')->get();

        if ($submissions->isEmpty()) {
            $this->info('No submissions found.');
            return;
        }

        $recipients = ['webmasterjdd@gmail.com', 'support@globetrottingtraveluk.com'];

        // === 1. Prepare CSV data in memory ===
        $csvHeaders = ['Name', 'Email', 'Phone', 'Booking Type', 'Message', 'Submitted At'];
        $csvData = [];

        foreach ($submissions as $submission) {
            $payload = json_decode($submission->payload, true);

            $csvData[] = [
                $payload['name'] ?? '',
                $payload['email'] ?? '',
                $payload['phone'] ?? '',
                $payload['booking_type'] ?? '',
                $payload['message'] ?? '',
                $submission->created_at
            ];
        }

        // Convert CSV array to string
        $csvContent = implode(',', $csvHeaders) . "\n";
        foreach ($csvData as $row) {
            $csvContent .= implode(',', array_map(fn($v) => '"' . str_replace('"', '""', $v) . '"', $row)) . "\n";
        }

        // Create filename
        $filename = 'submissions_' . now()->format('Ymd_His') . '.csv';

        // === 2. Prepare HTML content ===
        $html = view('emails.export_summary', ['submissions' => $submissions])->render();

        // === 3. Send the email ===
        // Mail::send([], [], function ($message) use ($recipients, $html, $csvContent, $filename) {
        //     $message->to($recipients)
        //         ->subject('Automated Export: All Form Submissions')
        //         ->html($html)
        //         ->attachData($csvContent, $filename, [
        //             'mime' => 'text/csv',
        //         ]);
        // });

        try {
    Mail::send([], [], function ($message) use ($recipients, $html, $csvContent, $filename) {
        $message->to($recipients)
            ->subject('Automated Export: All Form Submissions')
            ->html($html)
            ->attachData($csvContent, $filename, [
                'mime' => 'text/csv',
            ]);
    });
} catch (Exception $e) {
    // Log the error for developers
    Log::error('Mail sending failed: ' . $e->getMessage());

    return response()->json([
        'status' => 'error',
        'message' => 'The server is unable to send the email at this time. Please try again later.'
    ], 500);
}

        $this->info('Contacts exported and emailed successfully.');
    }
}
