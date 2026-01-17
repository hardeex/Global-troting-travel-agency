<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecaptchaRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Log the received token
        Log::info('reCAPTCHA token received', [
            'token_length' => strlen($value),
            'token_preview' => substr($value, 0, 50) . '...',
            'ip' => request()->ip()
        ]);

        if (empty($value)) {
            Log::error('reCAPTCHA token is empty');
            $fail('reCAPTCHA token is missing. Please try again.');
            return;
        }

        try {
            $response = Http::timeout(10)->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]);

            $result = $response->json();

            Log::info('reCAPTCHA API response', [
                'success' => $result['success'] ?? false,
                'score' => $result['score'] ?? 0,
                'action' => $result['action'] ?? null,
                'error_codes' => $result['error-codes'] ?? [],
            ]);

            // Check if verification was successful
            if (!isset($result['success']) || !$result['success']) {
                $errorCodes = $result['error-codes'] ?? ['unknown-error'];
                Log::error('reCAPTCHA verification failed', ['errors' => $errorCodes]);
                $fail('reCAPTCHA verification failed: ' . implode(', ', $errorCodes));
                return;
            }

            // Check score (0.0 = bot, 1.0 = human)
            if (!isset($result['score']) || $result['score'] < 0.5) {
                Log::warning('reCAPTCHA score too low', ['score' => $result['score'] ?? 0]);
                $fail('reCAPTCHA score too low. Please try again.');
                return;
            }

            Log::info('reCAPTCHA validation successful', ['score' => $result['score']]);

        } catch (\Exception $e) {
            Log::error('reCAPTCHA API error: ' . $e->getMessage());
            $fail('reCAPTCHA verification failed. Please try again.');
        }
    }
}