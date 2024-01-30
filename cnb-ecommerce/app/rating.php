<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = 'rating';

    protected $fillable = [
        'invs_id','product_id','shop_id','user_id','rating','commet','picture','date','status'
    ];

    function invs()
    {
        return $this->hasMany('App\invs', 'id', 'invs_id');
    }


    function shops()
    {
        return $this->hasMany('App\Shops', 'id', 'shop_id');
    }


    function users()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
}
