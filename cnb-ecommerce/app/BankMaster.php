<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankMaster extends Model
{
    protected $table = 'bank_master';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'logo'
    ];
}
