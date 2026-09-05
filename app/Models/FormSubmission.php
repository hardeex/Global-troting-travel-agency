<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    protected $fillable = [
        'payload',
        'ip_address',
        'user_agent',
        'is_spam',
    ];

    protected $casts = [
        'payload' => 'array',
        'is_spam' => 'boolean',
    ];
}
