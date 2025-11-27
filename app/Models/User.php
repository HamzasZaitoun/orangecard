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
        'username',
        'email',
        'password',
        'user_role',
        'is_active',
        'force_pw_reset',
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
            'force_pw_reset' => 'boolean',
        ];
    }

    // Relationships
    public function digitalCard()
    {
        return $this->hasOne(DigitalCard::class);
    }

    // Role Helpers
    public function isSuperAdmin(): bool
    {
        return $this->user_role === 'super_admin';
    }

    public function isAdmin(): bool
    {
        return $this->user_role === 'admin' || $this->isSuperAdmin();
    }

    public function isStandard(): bool
    {
        return $this->user_role === 'standard';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeStandardUsers($query)
    {
        return $query->where('user_role', 'standard');
    }

    public function scopeAdmins($query)
    {
        return $query->where('user_role', 'admin');
    }
}
