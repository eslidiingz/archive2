<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeOpenShopGen extends Model
{
    protected $table = 'code_open_shop_gen_t';

    protected $fillable = [
        'detail','code_amt','remain_amt', 'used_at','created_by'
    ];
}
