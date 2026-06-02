<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\FormSubmission;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserDashboardController extends Controller
{
      /**
     * User dashboard with aggregated data
     */
    public function userDashboard()
    {
        $user = Auth::user();

        if ($user->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        // Get all user data (including guest submissions via email)
        $userBookings = Booking::where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })->get();

        $userInquiries = Inquiry::where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
        })->with('destination')->get();

        $userSubmissions = FormSubmission::forCurrentUser()->get();

        // Summary Statistics
        $stats = [
            'total_bookings' => $userBookings->count(),
            'total_inquiries' => $userInquiries->count(),
            'total_submissions' => $userSubmissions->count(),
            'upcoming_trips' => $userBookings->where('departure_date', '>=', now())->count(),
            'past_trips' => $userBookings->where('departure_date', '<', now())->count(),
            'total_travelers' => $userBookings->sum('total_travelers'),
        ];

        // Recent Activity (last 5 items)
        $recentBookings = $userBookings->sortByDesc('created_at')->take(5);
        $recentInquiries = $userInquiries->sortByDesc('created_at')->take(5);

        // Chart Data - Bookings by Month (last 6 months)
        $bookingsByMonth = $userBookings->groupBy(function($booking) {
            return $booking->created_at->format('M Y');
        })->map(function($group) {
            return $group->count();
        })->take(6);

        // Chart Data - Popular Destinations
        $destinationStats = $userBookings->groupBy('destination')
            ->map(function($group) {
                return $group->count();
            })
            ->sortDesc()
            ->take(5);

        // Chart Data - Trip Types
        $tripTypeStats = $userBookings->whereNotNull('trip_type')
            ->groupBy('trip_type')
            ->map(function($group) {
                return $group->count();
            });

        // Chart Data - Budget Distribution
        $budgetStats = $userBookings->whereNotNull('budget')
            ->groupBy('budget')
            ->map(function($group) {
                return $group->count();
            });

        // Chart Data - Travelers Distribution
        $travelerStats = [
            'adults' => $userBookings->sum('adults'),
            'children' => $userBookings->sum('children'),
            'infants' => $userBookings->sum('infants'),
        ];

        // Monthly Activity Timeline (last 12 months)
        $monthlyActivity = collect();
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthKey = $month->format('M Y');
            
            $monthlyActivity->push([
                'month' => $monthKey,
                'bookings' => $userBookings->filter(function($booking) use ($month) {
                    return $booking->created_at->format('Y-m') === $month->format('Y-m');
                })->count(),
                'inquiries' => $userInquiries->filter(function($inquiry) use ($month) {
                    return $inquiry->created_at->format('Y-m') === $month->format('Y-m');
                })->count(),
            ]);
        }

        return view('user.user-dashboard', compact(
            'user',
            'stats',
            'recentBookings',
            'recentInquiries',
            'bookingsByMonth',
            'destinationStats',
            'tripTypeStats',
            'budgetStats',
            'travelerStats',
            'monthlyActivity'
        ));
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



    /**
     * Show inquiries for both authenticated and guest users
     */
    public function myInquiries(Request $request)
    {
        $user = Auth::user();
        $inquiries = collect();
        $isGuest = false;
        $guestEmail = null;

        if ($user) {
            // Authenticated user - get all inquiries linked to user OR matching email
            // This covers inquiries made before and after registration
            $inquiries = Inquiry::where(function($query) use ($user) {
                    $query->where('user_id', $user->id)
                          ->orWhere('email', $user->email);
                })
                ->with('destination')
                ->orderBy('created_at', 'desc')
                ->paginate(20);

        } else {
            // Guest user - need email verification
            if ($request->has('email')) {
                $validated = $request->validate([
                    'email' => 'required|email',
                ]);

                $guestEmail = $validated['email'];
                $isGuest = true;

                // Get inquiries by email
                $inquiries = Inquiry::where('email', $guestEmail)
                    ->with('destination')
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);

                // Store email in session for convenience
                session(['guest_inquiry_email' => $guestEmail]);

            } elseif (session('guest_inquiry_email')) {
                // Use email from session if available
                $guestEmail = session('guest_inquiry_email');
                $isGuest = true;

                $inquiries = Inquiry::where('email', $guestEmail)
                    ->with('destination')
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);
            }
        }

        return view('user.my-inquiries', compact('inquiries', 'isGuest', 'guestEmail'));
    }

    /**
     * Clear guest inquiry session (logout from inquiry view)
     */
    public function clearGuestSession()
    {
        session()->forget('guest_inquiry_email');
        return redirect()->route('inquiries.index')->with('success', 'Session cleared successfully.');
    }

    /**
     * Link guest inquiries when user registers or logs in
     * 
     */
    public function linkGuestInquiries($user)
    {
        // When a user registers/logs in, link all their previous guest inquiries
        $updatedCount = Inquiry::where('email', $user->email)
            ->whereNull('user_id')
            ->update(['user_id' => $user->id]);

        if ($updatedCount > 0) {
            Log::info("Linked {$updatedCount} guest inquiries to user", [
                'user_id' => $user->id,
                'email' => $user->email,
            ]);
        }

        return $updatedCount;
    }



     /**
     * Show bookings for both authenticated and guest users
     */
    public function myScheduledTrips(Request $request)
    {
        $user = Auth::user();
        $bookings = collect();
        $isGuest = false;
        $guestEmail = null;

        if ($user) {
            // Authenticated user - get all bookings linked to user OR matching email
            $bookings = Booking::where(function($query) use ($user) {
                    $query->where('user_id', $user->id)
                          ->orWhere('email', $user->email);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(20);

        } else {
            // Guest user - need email verification
            if ($request->has('email')) {
                $validated = $request->validate([
                    'email' => 'required|email',
                ]);

                $guestEmail = $validated['email'];
                $isGuest = true;

                $bookings = Booking::where('email', $guestEmail)
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);

                session(['guest_booking_email' => $guestEmail]);

            } elseif (session('guest_booking_email')) {
                $guestEmail = session('guest_booking_email');
                $isGuest = true;

                $bookings = Booking::where('email', $guestEmail)
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);
            }
        }

        return view('user.my-scheduled-trip', compact('bookings', 'isGuest', 'guestEmail'));
    }

   

    /**
     * Link guest bookings when user registers or logs in
     */
    public function linkGuestBookings($user)
    {
        $updatedCount = Booking::where('email', $user->email)
            ->whereNull('user_id')
            ->update(['user_id' => $user->id]);

        if ($updatedCount > 0) {
            Log::info("Linked {$updatedCount} guest bookings to user", [
                'user_id' => $user->id,
                'email' => $user->email,
            ]);
        }

        return $updatedCount;
    }


    
    
}