<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shops extends Model
{


    protected $table = 'shops';

    protected $primaryKey = 'id';
    public $increamenting = true;
    protected $keyType = 'int';

    public $timestamp = true;

    protected $fillable = [
        'id',
        'user_id',
        'shop_name',
        'shop_pic',
        'description',
        'payment',
        't10_payment_id',
        'bank_code',
        'bank_number',
        'Influencer',
        'bank_name',
        'bank_category',
        'kyc_status',
        'code_open_shop',
        'ated_type',
        'ated_gen_no',
        'ated_province_id',
        'shop_sts'
    ];

    function seller()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    function user()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }
    function UseRs()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    function Province()
    {
        return $this->hasMany('App\Province', 'id', 'ated_province_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'shop_id', 'id');
    }

    public function products_preorder()
    {
        return $this->hasMany('App\PreOrder', 'shop_id', 'id');
    }
}
