<?php

namespace App\Http\Controllers;

use App\Http\Controllers\tools\PseudoCryptController;
use App\invs;
use App\Shops as shops;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class uidmpController extends Controller
{
    public function set_uidmp($inv_ref){
        // dd($inv_ref);
        $cookie = Cookie::get('link');
        if($cookie){
            $cookie_data = json_decode($cookie);
        }
        invs::whereIn('inv_ref', $inv_ref)->update([
            'uidmp' => $cookie_data->uidmp,
        ]);
        $clear = Cookie::forget('link');
    }

    public function update_ref(){
        $shop = shops::select('user_id')->get();
        foreach($shop as $val){
            $user = User::where('id', $val->user_id)->first();
            if(isset($user)){
                User::where('id', $val->user_id)->update([
                    'ref_code' => PseudoCryptController::hash($val->user_id, 8)
                ]);
            }
        }
    }
}
