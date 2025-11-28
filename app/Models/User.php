<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'user_role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function digitalCard()
    {
        return $this->hasOne(DigitalCard::class);
    }

    public function isSuperAdmin()
    {
        return $this->user_role === 'super_admin';
    }

    public function isAdmin()
    {
        return $this->user_role === 'admin';
    }

    public function isStandard()
    {
        return $this->user_role === 'standard';
    }

    // Ensure we always have a username for slug generation
    public function getUsernameAttribute($value)
    {
        if (empty($value)) {
            // Generate username from email if not set
            $username = str_replace('@', '.', $this->email);
            $username = preg_replace('/[^a-zA-Z0-9._]/', '', $username);
            return $username;
        }
        return $value;
    }
}
