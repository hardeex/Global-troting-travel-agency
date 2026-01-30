<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FormSubmission extends Model
{
    protected $table = 'form_submissions';
    protected $casts = [
        'payload' => 'array',
        'created_at' => 'datetime',
        'marketing_consent' => 'boolean',
        'is_spam' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for current user's submissions (guest + own)
    public function scopeForCurrentUser($query)
    {
        $user = Auth::user();

        if (!$user) {
            // shouldn't happen in dashboard, but...
            return $query->whereNull('id'); // empty
        }

        return $query->where(function ($q) use ($user) {
            $q->where('user_id', $user->id)
              ->orWhere('email', $user->email);                
        })
        ->orderByDesc('created_at');
    }
}