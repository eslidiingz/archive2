<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'product_s';
  protected $casts = [
    'product_option' => 'array',
    'product_img' => 'array',
    'product_vdo' => 'array',
  ];

  public function shops()
  {
    return $this->hasMany('App\Shops', 'id', 'shop_id');
  }

  public function shops1()
  {
    return $this->belongsTo(\App\Shops::class);
  }
  public function shopsName()
  {
    return $this->belongsTo(\App\Shops::class, 'shop_id', 'id');
  }

  public function shipType()
    {
        return $this->belongsTo(shipping_type::class, 'shipty_id', 'shipty_id');
    }

  // function users() {
  //     return $this->hasMany('App\User','id','shop_id');
  // }
}
