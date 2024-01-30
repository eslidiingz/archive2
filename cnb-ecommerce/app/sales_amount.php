<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_amount extends Model
{
    protected $table = 'sales_amounts';

    protected $fillable = [
        'id',
        'shop_id',
        'invs_id',
        'type',
        'amount',
        'status',
        'created_at',
        'updated_at',

    ];
}
