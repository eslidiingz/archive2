<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'assets';

    protected $primaryKey = 'id';
}
