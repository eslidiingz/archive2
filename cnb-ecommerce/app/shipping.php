<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = [
        'shop_id','ship_default','ship_price','shipde_id','shipty_id'
    ];

}
