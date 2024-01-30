<?php

namespace App;

use App\Http\Controllers\shop\ShopController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kyc extends Model
{
    protected $table = 'kyc_m';

    protected $fillable = [
        'type_kyc',
        'status_first',
        'status_second',
        'status_third',
        'status_fourth',
        'status_fifth',
        'shop_id',
        'user_id'
    ];

    use SoftDeletes;

    public function admin()
    {
        return $this->belongsTo(UsersAdmin::class, 'admin_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function shop()
    {
        return $this->belongsTo(shops::class, 'shop_id', 'id');
    }
}
