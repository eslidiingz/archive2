<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'surname',
        'tel',
        'address1',
        'address2',
        'county',
        'district',
        'city',
        'zipcode',
        'country',
        'status',
        'is_last_ship',
    ];
}
