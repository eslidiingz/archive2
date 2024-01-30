<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wallet_address', 'name', 'email', 'password', 'phone', 'user_type', 'surname', 'sex', 'dateofbirth', 'wishlist', 'kyc_pic1', 'kyc_pic2', 'g_id', 'f_id', 'ref_code', 'user_pic', 'type', 'kyc_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function ShopS()
    {
        return $this->hasMany('App\Shops', 'user_id', 'id');
    }
    function Kyc()
    {
        return $this->hasMany('App\Kyc', 'user_id', 'id');
    }



    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;
    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }
}
