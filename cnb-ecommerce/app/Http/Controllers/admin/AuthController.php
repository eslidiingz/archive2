<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\admin\HomeController as AdminHC;
use App\log;


class AuthController extends Controller
{
    public function index(Request $request){
    	if(Auth::guard('admin')->check()){
            return redirect("/dashboard");
        }
        return view('admin.login');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $data['data'] = Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=>$request->password]);
        // dd($data);
        if (Auth::guard('admin')->check()) {
            // DB::table('users')->where('id',Auth::guard('admin')->user()->id)->update([
            //     'ip' => \BaseHelpers::getUserIP(),
            //     'login_at' => date('Y-m-d H:i:s')
            // ]);
            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => 0,
                'type'=>'admin_auth',
                'note'=>'login'.$request->username,
                'ip'=> AdminHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return 'true';
        }
        Auth::guard('admin')->logout();
        return 'false';
    }

    public function logout(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        if(!Auth::guard('admin')->logout()){

        }
        log::insert([
            'user_id' => $id,
            'parent_id' => 0,
            'type'=>'admin_auth',
            'note'=>'logout',
            'ip'=> AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect("dashboard/login");
    }
    public function loginas(Request $request){
        if(isset($request->id)){
            $check = Auth::loginUsingId($request->id);
            auth()->login($check, true);
        }
    }
}
