<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Auth;

use App\Http\Controllers\admin\HomeController as AdminHC;
use App\log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Login2Controller extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function login2(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => trans('message.warn_input_username'),
            'password.required' => trans('message.warn_input_password')
        ]);

        log::insert([
            'user_id' => 0,
            'parent_id' => 0,
            'type' => 'user_auth',
            'note' => 'login2 attempt ' . $request->username,
            'ip' => AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $checkuser = User::where($fieldType, $request->username)->first();
        $message = "ล็อคอินไม่สำเร็จ\n(สาเหตุ) : ";
        // check user
        if ($checkuser) {
            $existingUser = User::leftJoin('shops', 'shops.user_id', '=', 'users.id')->select('users.*', 'shops.shop_name')
                ->where($fieldType, $request->username)->first();
            $hashedPassword = $existingUser->password;

            //check password
            if (Hash::check($request->password, $hashedPassword)) {
                auth()->login($existingUser, true);
                if (auth()->check()) {
                    $user = User::select('id', 'wallet_address')->withCount('ShopS')->find(auth()->user()->id);
                    Session::put('isSeller', isset($user->shop_s_count) && $user->shop_s_count ? true : false);
                    log::insert([
                        'user_id' => 0,
                        'parent_id' => 0,
                        'type' => 'user_auth',
                        'note' => 'login2 passed ' . $request->username,
                        'ip' => AdminHC::getUserIP(),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                    $message = trans('message.warn_login_success') . " : " . auth()->user()->name;
                    Login2Controller::line_notification($message);
                    return Redirect::to('/product_all');
                } else {
                    $message .= trans('message.warn_authen_fail') . "\nUsername : " . $request->username;
                }
            } else {
                $message .= trans('message.warn_wrong_password') . "\nUsername : " . $request->username . "\nPassword : " . $request->password;
            }
        } else {
            $message .= trans('message.warn_username_not_found') . "\nUsername : " . $request->username;
        }

        log::insert([
            'user_id' => 0,
            'parent_id' => 0,
            'type' => 'user_auth',
            'note' => 'login2 failed ' . $request->username,
            'ip' => AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Login2Controller::line_notification($message);

        Session::put('isSeller', false);

        return 'false';
    }
    public function line_notification($message)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");

        $url        = 'https://notify-api.line.me/api/notify';
        $token      = 'aj6935XYP56EAnmCyGaWAxEYW69TvOTyml7B1ftN12Q';
        $headers    = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $token
        ];
        $fields     = "message=" . date("d/M H:i:s") . "\nWebsite : " . env('APP_URL') . "\nIP : " . AdminHC::getUserIP() . "\n" . $message;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        // var_dump($result);
        // $result = json_decode($result,TRUE);
    }
}
