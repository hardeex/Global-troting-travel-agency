<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

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
Route::get('/privacy/policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms/conditions', [HomeController::class, 'termsConditions'])->name('terms.conditions');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Booking & Inquiries
Route::get('/booking-inquiry', [DestinationController::class, 'makeArequest'])->name('make-a-request');
Route::post('/book-travel-agency', [DestinationController::class, 'bookTravelRequest'])->name('book-travel-agency');
Route::post('/submit-form', [BookingController::class, 'submit'])->name('form.submit');
Route::post('/send-interest', [HomeController::class, 'sendInterestEmail'])->name('send.interest');

// Sitemap & robots.txt
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', function () {
    return response(
        "User-agent: *\nDisallow:\n\nSitemap: " . url('/sitemap.xml') . "\n",
        200,
        ['Content-Type' => 'text/plain']
    );
});

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
    
    // Password Reset
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    // Google OAuth
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
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
        
        // Blog Management
        Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
        Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
        Route::get('/blog/{post}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{post}', [BlogPostController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{post}', [BlogPostController::class, 'destroy'])->name('blog.destroy');

        // Blog Categories
        Route::get('/blog-categories', [BlogCategoryController::class, 'index'])->name('blog.categories.index');
        Route::post('/blog-categories', [BlogCategoryController::class, 'store'])->name('blog.categories.store');
        Route::put('/blog-categories/{category}', [BlogCategoryController::class, 'update'])->name('blog.categories.update');
        Route::delete('/blog-categories/{category}', [BlogCategoryController::class, 'destroy'])->name('blog.categories.destroy');

        // Bookings & Inquiries Management
        Route::get('/bookings', [AdminController::class, 'adminBookings'])->name('bookings');
        Route::delete('/bookings/{id}', [AdminController::class, 'deleteBooking'])->name('bookings.delete');
        Route::get('/contacts', [BookingController::class, 'adminContact'])->name('contact');

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
    });
    
    /*
    |----------------------------------------------------------------------
    | User Routes
    |----------------------------------------------------------------------
    */
    Route::middleware('user')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
});

