<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function subcategorys()
    {
        return $this->hasMany('App\SubCategory', 'category', 'category_id');
    }
}
