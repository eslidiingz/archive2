<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrow extends Model
{


    //
    function Shops()
    {
        return $this->hasMany('App\Shops', 'id', 'shop_id');
    }

    function ShopsWhereName($data)
    {
        return $this->belongsToMany('App\Withdrow', 'shops', 'shop_id')->where('shop_name', $data);
    }
    function invs()
    {
        return $this->hasMany('App\invs', 'id', 'inv_id');
    }

    function User()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }

    function logs_withdraws()
    {
        return $this->hasMany('App\log', 'parent_id', 'inv_id')->where('logs.type', '=', 'admin_approve_withdraws')->orderBy('id', 'desc');
    }

    protected $fillable = [
        'user_id', 'shop_id', 'inv_id', 'amount', 'type', 'status', 'bank_code', 'bank_name', 'bank_category', 'bank_number', 'income_type', 'usdc'
    ];

    protected $casts = [
        'bank_number' => 'array',
    ];
}
