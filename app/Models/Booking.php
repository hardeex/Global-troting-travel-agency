<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'nationality',
        'destination',
        'trip_type',
        'departure_date',
        'return_date',
        'adults',
        'children',
        'infants',
        'accommodation',
        'budget',
        'services',
        'special_requests',
    ];
}
