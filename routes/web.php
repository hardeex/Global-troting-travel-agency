<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingController;

// Public routes
Route::get('/', fn () => view('welcome'));
Route::view('/contact-booking', 'contact-booking');
Route::post('/submit-form', [BookingController::class, 'submit'])->name('form.submit');

// Admin Login & Authentication
Route::match(['get', 'post'], '/admin/bookings', function (Request $request) {
    if (!$request->session()->has('is_admin')) {
        if ($request->isMethod('post')) {
            $password = $request->input('password');
            $hash = env('BOOKING_ADMIN_PASSWORD_HASH');

            if (Hash::check($password, $hash)) {
                $request->session()->put('is_admin', true);
                return redirect('/admin/bookings');
            } else {
                return back()->withErrors(['password' => 'Incorrect password']);
            }
        }

        return view('admin.login');
    }

    // Admin dashboard view with filters
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

// Admin logout
Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect('/admin/bookings');
})->name('admin.logout');
