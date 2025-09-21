<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\TwoFactorAuthenticationStatus;
use App\Enum\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
            'two_factor_authentication' => TwoFactorAuthenticationStatus::class
        ];
    }

    public function hasPendingKYC(): bool
    {
        if ($this->document_type && $this->front_side && $this->back_side && $this->kyc === 'Pending') {
            return true;
        }
        return false;
    }

    public function hasApprovedKYC(): bool
    {
        if ($this->document_type && $this->front_side && $this->back_side && $this->kyc === 'Approved') {
            return true;
        }
        return false;
    }
}
