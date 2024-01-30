<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Login;
use Illuminate\Http\Request;

class TestLoging extends Controller
{
    public function index(Request $request)
    {

        Auth()->attempt(['email' => "asd@live.com", 'password' => "123456789"]);

        if (Auth::check()) {
            Login::insert([
                'type' => 'login_pass',
                'created_at' => date('Y-m-d H:i:s')
            ]);



            Auth::logout();
            if(!Auth::check()){
                Login::insert([
                    'type' => 'logout_pass',
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                return 'logout pass';
            }else{
                Login::insert([
                    'type' => 'logout_fail',
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                return 'logout fail';

            }




        } else {
            Login::insert([
                'type' => 'login_fail',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }



    }
}
