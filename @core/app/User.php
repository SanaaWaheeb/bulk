<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','password','phone','address','state','city','district','zipcode','country_id','username','image','facebook_id','google_id',
        'monthly_income','annual_income','income_source','nid_image','driving_license_image','passport_image','tax_verify_status',
        "apple_id","deactivate"
        // 'email','email_verified','email_verify_token'
    ];


    protected $hidden = [
        'password', 'remember_token',
        'deactivate' => 'integer',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
