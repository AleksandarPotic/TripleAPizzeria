<?php

namespace App;

use App\Model\Coupon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'phone_number','credit_card_number','expiry_month','expiry_year','cvv', 'birthday', 'address', 'street_number','buzzer','apartment_number', 'postal_code', 'points', 'used_points','email_status', 'status', 'verifyToken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
