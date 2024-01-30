<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';

    protected $fillable = [
        'id',
        'region_id',
        'code',
        'name_th',
        'name_en',
    ];
}
