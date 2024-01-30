<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shops;

class HomeController extends Controller
{
    public function index(Request $request){
        $a_month_list = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $o_shop = shops::whereRaw('exists(select id from invs where shop_id = shops.id)')->get();

        $i_mth = date('m');

    	return view('admin/dashboard', compact('a_month_list','o_shop','i_mth'));
    }
    public static function getUserIP(){
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }
        else{
            $ip = $remote;
        }
        return $ip;
    }
}
