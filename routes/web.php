<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

Route::get('/db-debug', function () {
    return config('database.connections.mysql');
});

Route::get('/clear-config', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Config and cache cleared!';
});

// email server test
Route::get('test-email', function () {
    try {
        Mail::raw('This is a test email.', function ($message) {
            $message->to('globetrottingtraveluk@gmail.com')->subject('Test Email');
        });

        return 'Test email sent successfully.';
    } catch (\Exception $e) {
        return 'Failed to send test email: ' . $e->getMessage();
    }
});

Route::get('/sitemap', function () {
    return response()->file(resource_path('views/sitemap.xml'), [
        'Content-Type' => 'application/xml',
    ]);
});

// Public routes
// Route::get('/', fn() => view('welcome'))->name('index');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/submit-form', [BookingController::class, 'submit'])->name('form.submit');
Route::post('/send-interest', [HomeController::class, 'sendInterestEmail'])->name('send.interest');

Route::match(['get', 'post'], '/admin/bookings', function (Request $request) {
    if (!$request->session()->has('is_admin')) {
        if ($request->isMethod('post')) {
            $password = $request->input('password');
            $hash = config('app.booking_admin_password_hash');

            if (Hash::check($password, $hash)) {
                $request->session()->put('is_admin', true);
                return redirect('/admin/bookings');
            } else {
                return back()->withErrors(['password' => 'Incorrect password']);
            }
        }

        return view('admin.login');
    }

    $query = DB::table('form_submissions');

    if ($request->filled('type')) {
        $query->whereJsonContains('payload->booking_type', $request->type);
    }

    if ($request->filled('keyword')) {
        $query->where('payload', 'like', '%' . $request->keyword . '%');
    }

    if ($request->filled('from') && $request->filled('to')) {
        $query->whereBetween('created_at', [$request->from, $request->to]);
    }

    $submissions = $query->orderByDesc('created_at')->paginate(10);

    return view('admin.bookings', compact('submissions'));
})->name('admin.bookings');

// method to handle email export...
Route::get('/admin/export-all-contacts', function () {
    $submissions = DB::table('form_submissions')->orderByDesc('created_at')->get();

    if ($submissions->isEmpty()) {
        return 'No form submissions found.';
    }

    $exportData = $submissions->map(function ($item) {
        $payload = json_decode($item->payload, true);

        return [
            'Name' => $payload['name'] ?? '',
            'Email' => $payload['email'] ?? '',
            'Phone' => $payload['phone'] ?? '',
            'Submitted At' => \Carbon\Carbon::parse($item->created_at)->toDateTimeString(),
        ];
    });

    $html = view('emails.contact-export', ['contacts' => $exportData])->render();

    Mail::raw(strip_tags($html), function ($message) use ($html) {
        $emails = config('app.export_recipients', ['webmasterjdd@gmail.com', 'support@globetrottingtraveluk.com']);

        $message->to($emails)->subject('All Form Submissions Export')->setBody($html, 'text/html');
    });

    return 'Export email for all submissions sent successfully.';
});

Route::post('/admin/export-contacts', function () {
    Artisan::call('contacts:export');
    return redirect()->back()->with('success', 'Contacts exported and emailed successfully.');
})
    ->name('admin.export.contacts')
    ->middleware('web');

Route::get('/admin/export-contacts', function () {
    Artisan::call('contacts:export');
    return 'Exported and sent!';
})->middleware('web');

// destinations routes
Route::post('/admin/destinations', [DestinationController::class, 'store'])->name('admin.destinations.store');
Route::get('/admin/destinations', [DestinationController::class, 'index'])->name('admin.destinations.index');
Route::get('/admin/destinations/recent', [DestinationController::class, 'recent'])->name('admin.destinations.recent');
Route::get('/admin/destinations/{destination}/edit', [DestinationController::class, 'edit'])->name('admin.destinations.edit');
Route::put('/admin/destinations/{destination}', [DestinationController::class, 'update'])->name('admin.destinations.update');

Route::delete('/admin/destinations/{destination}', [DestinationController::class, 'destroy'])->name('admin.destinations.destroy');

// Admin logout
Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect('/admin/bookings');
})->name('admin.logout');
