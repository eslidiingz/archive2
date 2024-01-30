<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    public function blogCategories()
    {
        return $this->hasMany('App\BlogCategory', 'blog', 'blog_category');
    }
}
