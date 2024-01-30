<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    protected $table = 'news_m';
    use SoftDeletes;

    public function newsCategory()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(UsersAdmin::class, 'admin_id', 'id');
    }
}
