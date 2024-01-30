<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'type',
        'user_id',
        'inv_ref',
        'campaign_id',
        'total',
        'point',
        'coin',
        'status',
        'payment',
        'inv_id',
        'created_at',
        'updated_at',
        'usdc',
    ];

    protected $casts = [
        'inv_id' => 'array'
    ];

    function iNvs() {
        return $this->hasMany('App\invs','id','inv_id');
      }


    function uSers(){
        return $this->hasMany('App\User','id','user_id');
    }
}
