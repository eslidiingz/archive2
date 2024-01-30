<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';

    function detail()
    {
        return $this->belongsTo('App\NotificationDetail', 'detail_id', 'id');
    }
}
