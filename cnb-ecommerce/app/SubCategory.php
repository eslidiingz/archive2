<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_category';
    protected $primaryKey = 'sub_category_id';


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
