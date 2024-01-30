<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponInvs extends Model
{
    protected $table = 'coupon_invs_t';

    protected $fillable = [
        'inv_ref', 'inv_no', 'coupon_code', 'created_by', 'created_at', 'updated_at'
    ];
}
