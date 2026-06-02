<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destination extends Model
{
    protected $fillable = [
        'price',
        'country',
        'title',
        'slug',
        'status',
        'short_description',
        'details',
        'image_url',
        'start_date',
        'end_date',
        'adults',
        'nights',
    ];

    /**
     * Boot the model and add event listeners
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug when creating
        static::creating(function ($destination) {
            if (empty($destination->slug)) {
                $destination->slug = static::generateUniqueSlug($destination->title);
            }
        });

        // Auto-update slug when title changes
        static::updating(function ($destination) {
            if ($destination->isDirty('title') && empty($destination->slug)) {
                $destination->slug = static::generateUniqueSlug($destination->title);
            }
        });
    }

    /**
     * Generate a unique slug from title
     *
     * @param string $title
     * @param int|null $id - Current destination ID to exclude from uniqueness check
     * @return string
     */
    public static function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        // Check if slug exists and increment if needed
        while (static::slugExists($slug, $id)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Check if slug exists in database
     *
     * @param string $slug
     * @param int|null $excludeId
     * @return bool
     */
    protected static function slugExists($slug, $excludeId = null)
    {
        $query = static::where('slug', $slug);
        
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        
        return $query->exists();
    }

    /**
     * Get route key name for route model binding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the URL for this destination
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('destination.show', $this->slug);
    }

    /**
     * Relationship with inquiries
     */
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}