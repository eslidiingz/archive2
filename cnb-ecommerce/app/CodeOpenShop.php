<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeOpenShop extends Model
{
    protected $table = 'code_open_shop_t';

    protected $fillable = [
        'gen_id','used_shop_id','used_shop_name','code','code_amt','remain_amt', 'used_at','created_by'
    ];
}
