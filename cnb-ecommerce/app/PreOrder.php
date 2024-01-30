<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    protected $table = 'pre_order';

    // protected $fillable = [
    //     'shop_id', 'ship_default', 'ship_price', 'shipde_id', 'shipty_id'
    // ];


    protected $fillable = ['shop_id	', 'name', 'description', 'category_id', 'sub_category_id',
                             'brand_id', 'warranty_type', 'product_unit', 'product_weight', 'product_L',
                             'product_W', 'product_H', 'preOrder_option', 'product_img', 'status_goods', 'sales', 'created_at', 'updated_at'];
    protected $casts = [
        'preOrder_option' => 'array',
        'product_img' => 'array',
    ];
}
