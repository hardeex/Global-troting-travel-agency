<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'destination_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'ip_address',
        'user_agent',
    ];

    public function destination()
{
    return $this->belongsTo(Destination::class);
}

}
