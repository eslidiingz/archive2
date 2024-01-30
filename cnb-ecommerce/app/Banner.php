<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    protected $table = 'banner_m';
    use SoftDeletes;

    public function admin()
    {
        return $this->belongsTo(UsersAdmin::class, 'admin_id', 'id');
    }
}
