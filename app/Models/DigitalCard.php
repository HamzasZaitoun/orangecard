<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'job_title',
        'email',
        'mobile_number',
        'profile_img_url',
        'public_slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
