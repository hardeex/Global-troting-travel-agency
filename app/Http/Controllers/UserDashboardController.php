<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
      /**
     * User dashboard
     */
    public function userDashboard()
    {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        return view('user.user-dashboard');
    }


    public function myBookingsAndContacts()
    {
       $user = Auth::user();

        if ($user->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        // Fetch submissions using the scope (guest + logged-in ones via email)
        $submissions = FormSubmission::forCurrentUser()
            ->latest()                    // newest first
            ->paginate(30);             

        return view('user.my-booking-contact', compact('user', 'submissions'));
    }


    
    
}
