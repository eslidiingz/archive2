<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'credit',
        'point',
        'coin',
        'seller_credit'
    ];
}
