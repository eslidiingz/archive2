<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referal_users extends Model
{
    protected $table = 'referal_users';

    protected $fillable = [
        'user_id', 'ref_code'
    ];
}
