<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'bank_account', 'balance',
    ];

    protected $hidden = [
        'password',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function getSponsorshipLevelAttribute()
    {
        $balance = $this->balance;

        if ($balance >= 10000) {
            return 'Diamond Sponsor';
        } elseif ($balance >= 5000) {
            return 'Gold Sponsor';
        } elseif ($balance >= 1000) {
            return 'Silver Sponsor';
        } else {
            return 'Bronze Sponsor';
        }
    }
}
