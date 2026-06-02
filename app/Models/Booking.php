<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // Personal Information
        'full_name',
        'email',
        'phone',
        'address',
        
        // Form metadata
        'form_type',
        'flexible_dates',
        'insurance',
        'marketing_consent',
        'is_spam',
        
        // Travel Details
        'destination',
        'destination_other',
        'trip_type',
        'trip_type_other',
        'departure_date',
        'return_date',
        'flexible_dates',
        
        // Travelers & Budget
        'adults',
        'children',
        'infants',
        'accommodation',
        'accommodation_other',
        'budget',
        
        // Insurance & Services
        'insurance',
        'services',
        
        // Special Requests
        'special_requests',
        
        // Marketing & Consent
        'marketing_consent',
        
        // Security & Spam Prevention
        'ip_address',
        'user_agent',
        'is_spam',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'adults' => 'integer',
        'children' => 'integer',
        'infants' => 'integer',
        'services' => 'array',
        'marketing_consent' => 'boolean',
        'is_spam' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


      /* Get the user that made this booking
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if booking is from a guest
     */
    public function isGuest(): bool
    {
        return is_null($this->user_id);
    }

    /**
     * Get formatted departure date
     */
    public function getFormattedDepartureDateAttribute()
    {
        return $this->departure_date?->format('M d, Y');
    }

    /**
     * Get formatted return date
     */
    public function getFormattedReturnDateAttribute()
    {
        return $this->return_date?->format('M d, Y');
    }

    /**
     * Calculate trip duration in nights
     */
    public function getTripDurationAttribute()
    {
        if ($this->departure_date && $this->return_date) {
            return $this->departure_date->diffInDays($this->return_date);
        }
        return null;
    }

    /**
     * Get total travelers count
     */
    public function getTotalTravelersAttribute()
    {
        return ($this->adults ?? 0) + ($this->children ?? 0) + ($this->infants ?? 0);
    }

    /**
     * Get decoded services array
     */
    public function getServicesListAttribute()
    {
        if (is_string($this->services)) {
            return json_decode($this->services, true) ?? [];
        }
        return $this->services ?? [];
    }

    /**
     * Get the total number of travelers
     */
    // public function getTotalTravelersAttribute(): int
    // {
    //     return $this->adults + $this->children + $this->infants;
    // }

    /**
     * Get the trip duration in days
     */
    // public function getTripDurationAttribute(): ?int
    // {
    //     if ($this->departure_date && $this->return_date) {
    //         return $this->departure_date->diffInDays($this->return_date);
    //     }
        
    //     return null;
    // }

    /**
     * Check if the booking needs insurance waiver
     */
    public function needsInsuranceWaiver(): bool
    {
        return $this->insurance === 'no';
    }

    /**
     * Get formatted destination
     */
    public function getFormattedDestinationAttribute(): string
    {
        if ($this->destination === 'other' && $this->destination_other) {
            return $this->destination_other;
        }
        
        return ucwords(str_replace('_', ' ', $this->destination));
    }

    /**
     * Get formatted trip type
     */
    public function getFormattedTripTypeAttribute(): ?string
    {
        if (!$this->trip_type) {
            return null;
        }
        
        if ($this->trip_type === 'other' && $this->trip_type_other) {
            return $this->trip_type_other;
        }
        
        return ucwords(str_replace('_', ' ', $this->trip_type));
    }

    /**
     * Scope to get non-spam bookings
     */
    public function scopeNotSpam($query)
    {
        return $query->where('is_spam', false);
    }

    /**
     * Scope to get spam bookings
     */
    public function scopeSpam($query)
    {
        return $query->where('is_spam', true);
    }

    /**
     * Scope to get bookings with upcoming travel dates
     */
    public function scopeUpcoming($query)
    {
        return $query->where('departure_date', '>=', now())
                     ->orderBy('departure_date', 'asc');
    }

    /**
     * Scope to get bookings within date range
     */
    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('departure_date', [$startDate, $endDate]);
    }

    /**
     * Scope to get bookings by budget range
     */
    public function scopeByBudget($query, $budgetRange)
    {
        return $query->where('budget', $budgetRange);
    }
}