<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
     protected $fillable = [
        'price',
        'country',
        'title',
        'short_description',
        'details',
        'image_url',
        'start_date',
        'end_date',
        'adults',
        'nights',
    ];
}
