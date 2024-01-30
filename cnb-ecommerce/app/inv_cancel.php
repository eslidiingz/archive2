<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inv_cancel extends Model
{
  //
  protected $table = 'inv_cancels';
  protected $primaryKey = 'id';

  protected $fillable = [
    'inv_id',
    'type',
    'user_id',
    'shop_id',
    'status',
    'cancel_pic',
    'description',
    'user_approve',
    'shop_approve',
    'admin_approve',
    'admin_note'

  ];

  function shops()
  {
    return $this->hasMany('App\Shops', 'id', 'shop_id');
  }

  function user()
  {
    return $this->hasMany('App\User', 'id', 'user_id');
  }

  function invs()
  {
    return $this->hasMany('App\invs', 'id', 'inv_id');
  }

  function logs_OrderCancel()
  {
    return $this->hasMany('App\log', 'parent_id', 'inv_id')->where('logs.type', '=', 'admin_OrderCancel')->orderBy('id', 'desc');
  }

  function logs_OrderCancel_Case()
  {
    return $this->hasMany('App\log', 'parent_id', 'id')->where('logs.type', '=', 'admin_OrderCancel_Case')->orderBy('id', 'desc');
  }
}
