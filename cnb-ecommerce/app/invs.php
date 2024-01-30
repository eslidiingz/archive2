<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invs extends Model
{
    protected $table = 'invs';

    protected $fillable = [
        'inv_ref', 'user_id', 'shop_id', 'inv_products', 'shipping_cost', 'payment', 'uidmp',
        'campaign_id', 'shipping_id', 'total', 'note', 'coupon_id', 'status', 'shipping_note', 'address', 'transfer_img', 'transfer_slip', 'shipty_id', 'total_weight',
        'created_at', 'updated_at', 'usdc', 'inv_ref2'
    ];

    protected $casts = [
        'inv_products' => 'array',
        // 'payment' => 'array',
        'address' => 'array',
    ];


    function address()
    {
        return $this->hasOne('App\Address', 'id', 'shipping_id');
    }

    function shops()
    {
        return $this->hasMany('App\Shops', 'id', 'shop_id');
    }

    function shop()
    {
        return $this->hasOne('App\Shops', 'id', 'shop_id');
    }

    function users()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }

    function UserAdmin()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }

    function shipping_details()
    {
        return $this->hasMany('App\shipping_details', 'shipde_id', 'shipping_id');
    }

    function shops_user()
    {
        return $this->hasMany('App\User', 'id', 'shops.user_id');
    }

    function logs()
    {
        return $this->hasMany('App\log', 'parent_id', 'id')->where('logs.type', '=', 'admin_order')->orderBy('id', 'desc');
    }

    function logs_withdraws()
    {
        return $this->hasMany('App\log', 'parent_id', 'id')->where('logs.type', '=', 'admin_approve_withdraws')->orderBy('id', 'desc');
    }

    function logs_payment()
    {
        return $this->hasMany('App\log', 'parent_id', 'id')->where('logs.type', '=', 'admin_approve_payment')->orderBy('id', 'desc');
    }
}
