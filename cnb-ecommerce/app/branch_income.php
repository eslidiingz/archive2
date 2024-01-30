<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branch_income extends Model
{
    protected $table = 'branch_income';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'inv_id',
        'total',
        'bird_cost',
        'branch_cost',
        'branch_id',
    ];
}
