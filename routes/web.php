<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CookieConsentController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnifiedSubmissionsController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Public Routes (No Authentication Required)
|--------------------------------------------------------------------------
*/

// Home & General Pages
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/destinations', [HomeController::class, 'allDestinations'])->name('destinations');
Route::get('/destination/{slug}', [HomeController::class, 'showDestination'])->name('destination.show');
//Route::get('/privacy/policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms/conditions', [HomeController::class, 'termsConditions'])->name('terms.conditions');

// Booking & Inquiries
Route::get('/booking-inquiry', [DestinationController::class, 'makeArequest'])->name('make-a-request');
Route::post('/book-travel-agency', [DestinationController::class, 'bookTravelRequest'])->name('book-travel-agency');
Route::post('/submit-form', [BookingController::class, 'submit'])->name('form.submit');
Route::post('/send-interest', [HomeController::class, 'sendInterestEmail'])->name('send.interest');

// Sitemap
Route::get('/sitemap', function () {
    return response()->file(resource_path('views/sitemap.xml'), [
        'Content-Type' => 'application/xml',
    ]);
});




// Cookie Consent Routes
Route::post('/cookie-consent', [CookieConsentController::class, 'store'])->name('cookie.consent.store');
Route::post('/cookie-consent/accept', [CookieConsentController::class, 'accept'])->name('cookie.consent.accept');
Route::post('/cookie-consent/reject', [CookieConsentController::class, 'reject'])->name('cookie.consent.reject');
Route::get('/cookie-consent/status', [CookieConsentController::class, 'status'])->name('cookie.consent.status');
Route::get('/privacy-policy', [CookieConsentController::class, 'privacyPolicy'])->name('privacy.policy');


/*
|--------------------------------------------------------------------------
| Guest Routes (Only Accessible When NOT Logged In)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Registration
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
   
    
    // Google OAuth
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');



    // Forgot password form
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
        ->name('password.request');

    // Send reset email
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
        ->name('password.email');

    // Show reset form
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])
        ->name('password.reset');

    // Handle reset submission
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.update');

});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Requires Login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Profile Management
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    
    /*
    |----------------------------------------------------------------------
    | Admin Routes
    |----------------------------------------------------------------------
    */
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
        
        // Destinations Management
        Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
        Route::get('/destinations/recent', [DestinationController::class, 'recent'])->name('destinations.recent');
        Route::get('/add/new/destination', [DestinationController::class, 'addNewDestination'])->name('destinations.create');
        Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store');
        Route::get('/destinations/{destination}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
        Route::put('/destinations/{destination}', [DestinationController::class, 'update'])->name('destinations.update');
        Route::delete('/destinations/{destination}', [DestinationController::class, 'destroy'])->name('destinations.destroy');
        
        // Bookings & Inquiries Management
        Route::get('/bookings', [AdminController::class, 'adminBookings'])->name('bookings');
        Route::delete('/bookings/{id}', [AdminController::class, 'deleteBooking'])->name('bookings.delete');
        Route::get('/contacts', [BookingController::class, 'adminContact'])->name('contact');
        //Route::get('/analytics', [BookingController::class, 'analytics'])->name('analytics');
        
        // Inquiries Management
        Route::get('/inquiries', [BookingController::class, 'manageInquiries'])->name('inquiries.manage');
        Route::get('/inquiries/{inquiry}', [BookingController::class, 'showInquiry'])->name('inquiries.show');
        Route::delete('/inquiries/{inquiry}', [BookingController::class, 'deleteInquiry'])->name('inquiries.delete');
        Route::post('/inquiries/bulk-delete', [BookingController::class, 'bulkDeleteInquiries'])->name('inquiries.bulk-delete');
        Route::get('/inquiries/export', [BookingController::class, 'exportInquiries'])->name('inquiries.export');
        
        // Contact Export
        Route::get('/export-contacts', [AdminController::class, 'showExportPage'])->name('export.contacts.page');
        Route::post('/export-contacts', [AdminController::class, 'exportContacts'])->name('export.contacts');
        Route::get('/export-all-contacts', [AdminController::class, 'exportAllContacts'])->name('export.all.contacts');
        
        // Logout
        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('logout');


         // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}', [AdminController::class, 'viewUser'])->name('user.view');
    Route::patch('/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('user.role');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('user.delete');
    Route::post('/users/bulk-delete', [AdminController::class, 'bulkDeleteUsers'])->name('users.bulk-delete');


      
    // Unified submissions dashboard
    Route::get('/submissions', [UnifiedSubmissionsController::class, 'index'])->name('submissions.index');
    
    // View individual submission details
    Route::get('/submissions/{type}/{id}', [UnifiedSubmissionsController::class, 'show'])->name('submissions.show');
    
    // Toggle spam status
    Route::patch('/submissions/{type}/{id}/toggle-spam', [UnifiedSubmissionsController::class, 'toggleSpam'])->name('submissions.toggle-spam');
    
    // Delete individual submission
    Route::delete('/submissions/{type}/{id}', [UnifiedSubmissionsController::class, 'destroy'])->name('submissions.destroy');
    
    // Export submissions to CSV
    Route::get('/submissions/export', [UnifiedSubmissionsController::class, 'export'])->name('submissions.export');
    
    // Bulk delete all spam
    Route::delete('/submissions/bulk/delete-spam', [UnifiedSubmissionsController::class, 'bulkDeleteSpam'])->name('submissions.bulk-delete-spam');
    
    });
    
    /*
    |----------------------------------------------------------------------
    | User Routes
    |----------------------------------------------------------------------
    */
    Route::middleware('user')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'userDashboard'])->name('user.dashboard');
        Route::get('/my-bookings-contacts', [UserDashboardController::class, 'myBookingsAndContacts'])->name('user.bookings.contacts');          
        Route::get('/my-inquiries', [UserDashboardController::class, 'myInquiries'])->name('inquiries.index');
        Route::post('/inquiries/clear-session', [UserDashboardController::class, 'clearGuestSession'])->name('inquiries.clear-session');
        Route::get('/my-scheduled-trips', [UserDashboardController::class, 'myScheduledTrips'])->name('user.scheduled-trips');
    });
});


// TODO: REMOVE THE ROUTES BELOW IN PRODUCTION
/*
|--------------------------------------------------------------------------
| Development & Debug Routes (TO be Remove in Production)
|--------------------------------------------------------------------------
*/

if (app()->environment('local')) {
    // Database Debug
    Route::get('/db-debug', function () {
        return config('database.connections.mysql');
    });
    
    // Test View
    Route::get('/test', function() {
        return view('dashboard.base');
    });
    
    // Cloudinary Debug
    Route::get('/debug-cloudinary', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');

        return response()->json([
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
            'api_key'    => env('CLOUDINARY_API_KEY'),
            'api_secret' => env('CLOUDINARY_API_SECRET') ? 'Set' : 'MISSING',
        ]);
    });
    
    // Clear Config
    Route::get('/clear-config', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return 'Config and cache cleared!';
    });
    
    // Email Testing
    Route::get('/test-email', function () {
        try {
            \Illuminate\Support\Facades\Mail::raw('This is a test email to confirm if the mail server is working.', function ($message) {
                $message->to('globetrottingtraveluk@gmail.com')->subject('Test Email');
            });
            return 'Test email sent successfully.';
        } catch (\Exception $e) {
            return 'Failed to send test email: ' . $e->getMessage();
        }
    });
    
    Route::get('/test-brevo', function () {
        try {
            $emails = explode(',', env('RECEIVER_EMAILS', 'globetrottingtraveluk@gmail.com'));
            $emails = array_filter(array_map('trim', $emails));
            
            \Illuminate\Support\Facades\Mail::raw('This is a test email for Brevo with multiple recipients.', function ($message) use ($emails) {
                $message->to($emails)
                        ->subject('Brevo Multi-Recipient Test')
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
            return 'Test email sent to multiple recipients successfully.';
        } catch (\Exception $e) {
            return 'Failed to send test email: ' . $e->getMessage();
        }
    });
    
    // reCAPTCHA Testing
    Route::get('/test-recaptcha', function() {
        return view('test-recaptcha');
    });
    
    Route::post('/test-recaptcha-verify', function(Request $request) {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('token'),
            'remoteip' => $request->ip()
        ]);

        return response()->json([
            'google_response' => $response->json(),
            'token_received' => $request->input('token') ? 'Yes' : 'No',
            'token_length' => strlen($request->input('token') ?? ''),
        ]);
    });
    
    Route::get('/check-recaptcha-config', function() {
        return response()->json([
            'site_key' => config('services.recaptcha.site_key'),
            'secret_key_exists' => !empty(config('services.recaptcha.secret_key')),
            'secret_key_length' => strlen(config('services.recaptcha.secret_key')),
            'secret_key_preview' => substr(config('services.recaptcha.secret_key'), 0, 10) . '...',
        ]);
    });
}