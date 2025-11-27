<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DigitalCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'job_title',
        'mobile_number',
        'email',
        'public_slug',
        'profile_img_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($card) {
            if (empty($card->public_slug)) {
                // Generate slug from name
                $baseSlug = Str::slug($card->first_name . '-' . $card->last_name);
                $slug = $baseSlug;
                $counter = 1;

                // Ensure uniqueness
                while (static::where('public_slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                $card->public_slug = $slug;
            }
        });

        static::updating(function ($card) {
            // Update slug if name changes
            if ($card->isDirty(['first_name', 'last_name'])) {
                $baseSlug = Str::slug($card->first_name . '-' . $card->last_name);
                $slug = $baseSlug;
                $counter = 1;

                // Ensure uniqueness (exclude current record)
                while (static::where('public_slug', $slug)
                    ->where('id', '!=', $card->id)
                    ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                $card->public_slug = $slug;
            }
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getPublicUrlAttribute()
    {
        return route('card.public', $this->public_slug);
    }
}
