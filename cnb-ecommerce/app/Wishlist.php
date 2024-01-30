<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $fillable = ['user_id','product_id','shop_id','details_wishlist'];
    protected $casts = [
        'details_wishlist' => 'array',
    ];

    function shoP(){
        return $this->hasMany('App\Shops','id','shop_id');

    }
    
    function proDuc(){
        return $this->hasMany('App\Product','id','product_id');
    }

    
}