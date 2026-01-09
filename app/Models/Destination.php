<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
     protected $fillable = [
        'price',
        'country',
        'title',
        'status',
        'short_description',
        'details',
        'image_url',
        'start_date',
        'end_date',
        'adults',
        'nights',
    ];


    public function inquiries()
{
    return $this->hasMany(Inquiry::class);
}

}
