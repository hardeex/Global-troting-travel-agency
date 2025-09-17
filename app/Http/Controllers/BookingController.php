<?php

namespace App\Http\Controllers;

use App\Mail\BookingRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
   



//     public function submit(Request $request)
// {
//     $validated = $request->validate([
//         'name'                => 'required|string|max:100',
//         'email'               => 'required|email|max:150',
//         'phone'               => 'nullable|string|max:30',
//         'preferred_contact'   => 'nullable|string|max:20',
//         'booking_type'        => 'required|string|in:contact,car,flight,hotel,activity,custom',
//         'message'             => 'nullable|string|max:2000',

//         'car_pickup_location' => 'nullable|string|max:150',
//         'car_dropoff_location'=> 'nullable|string|max:150',
//         'car_pickup_date'     => 'nullable|date',
//         'car_dropoff_date'    => 'nullable|date|after_or_equal:car_pickup_date',
//         'driver_age'          => 'nullable|integer|min:18',

//         'flight_departure'        => 'nullable|string|max:150',
//         'flight_arrival'          => 'nullable|string|max:150',
//         'flight_departure_date'   => 'nullable|date',
//         'flight_return_date'      => 'nullable|date|after_or_equal:flight_departure_date',
//         'flight_adults'           => 'nullable|integer|min:1',
//         'flight_children'         => 'nullable|integer|min:0',
//         'flight_class'            => 'nullable|string|max:30',

//         'hotel_location'      => 'nullable|string|max:150',
//         'hotel_checkin'       => 'nullable|date',
//         'hotel_checkout'      => 'nullable|date|after_or_equal:hotel_checkin',
//         'hotel_rooms'         => 'nullable|integer|min:1',
//         'hotel_guests'        => 'nullable|integer|min:1',

//         'activity_location'   => 'nullable|string|max:150',
//         'activity_type'       => 'nullable|string|max:150',
//         'activity_date'       => 'nullable|date',
//         'activity_people'     => 'nullable|integer|min:1',

//         'custom_destination'  => 'nullable|string|max:150',
//         'custom_start'        => 'nullable|date',
//         'custom_end'          => 'nullable|date|after_or_equal:custom_start',
//         'custom_budget'       => 'nullable|string|max:100',
//         'custom_style'        => 'nullable|string|max:50',
//     ]);

//     try {
//         $emails = explode(',', env('RECEIVER_EMAILS'));
//         Mail::to($emails)->send(new BookingRequestMail($validated));
//     } catch (\Exception $e) {
//         // Log or silently fail to avoid breaking the form
//         Log::error('Mail sending failed: ' . $e->getMessage());
//     }

//     DB::table('form_submissions')->insert([
//         'payload' => json_encode($validated),
//         'created_at' => now(),
//         'updated_at' => now(),
//     ]);

//     return back()->with('success', 'Your request has been sent! We’ll be in touch soon.');
// }




public function submit(Request $request)
{
    $validated = $request->validate([
        'name'                => 'required|string|max:100',
        'email'               => 'required|email|max:150',
        'phone'               => 'nullable|string|max:30',
        'preferred_contact'   => 'nullable|string|max:20',
        'booking_type'        => 'required|string|in:contact,car,flight,hotel,activity,custom',
        'message'             => 'nullable|string|max:2000',

        'car_pickup_location' => 'nullable|string|max:150',
        'car_dropoff_location'=> 'nullable|string|max:150',
        'car_pickup_date'     => 'nullable|date',
        'car_dropoff_date'    => 'nullable|date|after_or_equal:car_pickup_date',
        'driver_age'          => 'nullable|integer|min:18',

        'flight_departure'        => 'nullable|string|max:150',
        'flight_arrival'          => 'nullable|string|max:150',
        'flight_departure_date'   => 'nullable|date',
        'flight_return_date'      => 'nullable|date|after_or_equal:flight_departure_date',
        'flight_adults'           => 'nullable|integer|min:1',
        'flight_children'         => 'nullable|integer|min:0',
        'flight_class'            => 'nullable|string|max:30',

        'hotel_location'      => 'nullable|string|max:150',
        'hotel_checkin'       => 'nullable|date',
        'hotel_checkout'      => 'nullable|date|after_or_equal:hotel_checkin',
        'hotel_rooms'         => 'nullable|integer|min:1',
        'hotel_guests'        => 'nullable|integer|min:1',

        'activity_location'   => 'nullable|string|max:150',
        'activity_type'       => 'nullable|string|max:150',
        'activity_date'       => 'nullable|date',
        'activity_people'     => 'nullable|integer|min:1',

        'custom_destination'  => 'nullable|string|max:150',
        'custom_start'        => 'nullable|date',
        'custom_end'          => 'nullable|date|after_or_equal:custom_start',
        'custom_budget'       => 'nullable|string|max:100',
        'custom_style'        => 'nullable|string|max:50',
    ]);

    try {
        $emailsRaw = env('RECEIVER_EMAILS', '');

        // Parse, trim, and validate emails
        $emails = array_filter(array_map(function ($email) {
            $email = trim($email);
            return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
        }, explode(',', $emailsRaw)));

        // Log parsed emails
        Log::info('Parsed receiver emails:', $emails);

        if (!empty($emails)) {
            Mail::to($emails)->send(new BookingRequestMail($validated));
            Log::info('Booking request email sent successfully.');
        } else {
            Log::error('No valid recipient emails found in RECEIVER_EMAILS. Raw value: ' . $emailsRaw);
        }
    } catch (\Exception $e) {
        Log::error('Mail sending failed: ' . $e->getMessage());
    }

    // Save to database
    DB::table('form_submissions')->insert([
        'payload' => json_encode($validated),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'Your request has been sent! We’ll be in touch soon.');
}


}
