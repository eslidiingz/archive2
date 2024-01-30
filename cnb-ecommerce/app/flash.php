<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flash extends Model
{
  protected $table = 'flash_sales';

  protected $casts = [
    'product_option' => 'array',
    'product_img' => 'array',
  ];

  public function shops()
  {
    return $this->hasMany('App\Shops', 'id', 'shop_id');
  }

  public function shops1()
  {
    return $this->belongsTo(\App\Shops::class);
  }

  public function product()
  {
    return $this->hasMany('App\Product', 'id', 'product_old_id');
  }
}
