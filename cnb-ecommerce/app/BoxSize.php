<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoxSize extends Model
{
    protected $table = 'box_size_m';
    use SoftDeletes;
}
