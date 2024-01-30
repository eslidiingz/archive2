<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invs_wallet extends Model
{
    protected $table = 'invs_wallet';


    function users()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    function logs_admin_wallet()
    {
        return $this->hasMany('App\log', 'parent_id', 'id')->where('logs.type', '=', 'admin_wallet')->orderBy('id', 'desc');
    }
}
