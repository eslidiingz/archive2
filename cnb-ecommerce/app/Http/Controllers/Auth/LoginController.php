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
use Intervention\Image\Facades\Image;

use App\Http\Controllers\admin\HomeController as AdminHC;
use App\log;

class LoginController extends Controller
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        if(auth()->user()->isAdmin()) {
            return '/admin/dashboard';
        } else {
            return '/home';
        }
    }

    public function login(Request $request)
    {
        // dd($request);
        $input = $request->all();
        // if(in_array($request->username,[]) == '@'){
        //     dd($request->username);
        // }
        $this->validate($request, [
            'username' => 'required',
            'login_password' => 'required',


        ],[
            'username.required' => 'กรุณากรอกรหัสผู้ใช้งาน',
            'login_password.required' => 'กรุณากรอกรหัสผ่าน'
        ]);

        log::insert([
            'user_id' => 0,
            'parent_id' => 0,
            'type'=>'user_auth',
            'note'=> 'login attempt '.$request->username." ".$request->login_password,
            'ip'=> AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // $fieldType = filter_var($request->username) ? 'phone' : 'name';
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        // dd($fieldType);
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['login_password'])))
        {
            // return '/home';

            log::insert([
                'user_id' => 0,
                'parent_id' => 0,
                'type'=>'user_auth',
                'note'=>'login passed '.$request->username." ".$request->login_password,
                'ip'=> AdminHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->route('login');
        }else{

            log::insert([
                'user_id' => 0,
                'parent_id' => 0,
                'type'=>'user_auth',
                'note'=>'login failed '.$request->username." ".$request->login_password,
                'ip'=> AdminHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return 'false';
            // return redirect()->route('login')
            //     ->with('error','Email-Address And Password Are Wrong.');
        }

    }

    public function GhandleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'company.com'){
        //     return redirect()->to('/');
        // }
        // check if they're an existing user
        $checkuser = User::where('g_id', $user->email)->first();
        if($checkuser){
           $existingUser = User::where('g_id', $user->email)->first();
        } else {
            $existingUser = User::where('email', $user->email)->first();
        }

        if($existingUser){
            // log them in
            auth()->login($existingUser, true);

            log::insert([
                'user_id' => 0,
                'parent_id' => 0,
                'type'=>'user_auth',
                'note'=>'Gmail login passed '.$user->email,
                'ip'=> AdminHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->route('login');
        } else {
            // create a new user

            // $newUser                  = new User;
            // $newUser->name            = $user->name;
            // $newUser->email           = $user->email;
            // $newUser->google_id       = $user->id;
            // $newUser->avatar          = $user->avatar;
            // $newUser->avatar_original = $user->avatar_original;
            // $newUser->save();
            // auth()->login($newUser, true);

            $fullname = $user->name;
            $space = " ";
            if(strstr($fullname,$space)){
            $fname = substr($fullname, 0 ,strpos($fullname, " "));
            $sname = substr($fullname,strpos($fullname, " ")+1);

            } else {
                $fname = $fullname;
                $sname = $space;

            }

            // dd($fname);

            $newUser = User::create([
                'name' => $fname,
                'surname' => $sname,
                'email' => $user->email,
                'phone' => "",
                'g_id' => $user->email,
                'password' => Hash::make($user->email),
                'user_type' => 0,
                'type' => 0,
                'user_pic'=>'user.svg',
                'kyc_status' => 0,
            ]);
            auth()->login($newUser, true);
        }
        $user=User::where('email', $newUser->email)->first();

        log::insert([
            'user_id' => 0,
            'parent_id' => 0,
            'type'=>'user_auth',
            'note'=>'Gmail new login passed '.$user->email,
            'ip'=> AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        // return redirect()->to('/home');
        // return redirect()->route('login');
        return view('auth.final-register', compact('user'));
    }

    public function FhandleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // dd($user);
        // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'company.com'){
        //     return redirect()->to('/');
        // }
        // check if they're an existing user
        $checkuser = User::where('f_id', $user->id)->first();
        if($checkuser){
           $existingUser = User::where('f_id', $user->id)->first();
        } elseif ($user->email != null || $user->email != '') {
            $existingUser = User::where('email', $user->email)->first();
        }
        if (isset($existingUser) && $existingUser){
            // dd($existingUser);
            $check_email = strpos($existingUser->email, '@birdexpress.co.th');
            $check_status = User::where('email', $user->email)->count();

            // 20210830 Aui remove && $existingUser->user_pic == 'user.svg' ออก
            if($user->avatar != null ){
                $image = file_get_contents($user->avatar);
                if($image !== false){
                    // $image = 'data:image/jpg;base64,'.base64_encode($image);
                    // $user_picture = 'profile_' . time() . '.png';
                    // $path = public_path('img/profile/' . $user_picture);
                    // Image::make($image)->save($path);

                    $user_picture = 'user.svg';
                    //ปิดไว้ ไม่ให้อัพเดตรูปภาพ profile
                    // User::where('id', $existingUser->id)->update([
                    //     'user_pic' => $user_picture,
                    // ]);
                }
            }

            if($check_status == 0){
                if($user->email != null && $check_email != false){
                    $update_email = User::where('id', $existingUser->id)->update([
                        'email' => $user->email,
                    ]);
                }
            }

            // log them in
            if ($existingUser->f_id == null){
                $change_f_id = User::where('email', $user->email)->update(['f_id' => $user->id]);
            }

            // UPDATE NAME
            $fullname = $user->name;
            $fname = substr($fullname, 0 ,strpos($fullname, " "));
            $sname = substr($fullname,strpos($fullname, " ")+1);
            User::where('id', $existingUser->id)->update([
                'name' => $fname,
                'surname' => $sname,
            ]);


            auth()->login($existingUser, true);

            log::insert([
                'user_id' => 0,
                'parent_id' => 0,
                'type'=>'user_auth',
                'note'=>'FB login passed '.$user->email,
                'ip'=> AdminHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            // dd(session('fbCallback'));
            return redirect(session('fbCallback'));
        } else {
            // create a new user

            // $newUser                  = new User;
            // $newUser->name            = $user->name;
            // $newUser->email           = $user->email;
            // $newUser->google_id       = $user->id;
            // $newUser->avatar          = $user->avatar;
            // $newUser->avatar_original = $user->avatar_original;
            // $newUser->save();
            // auth()->login($newUser, true);


            $fid = $user->id;
            $check = User::where('email', $user->email)->count();
            if($user->email == null || $check > 0){
                $email = $fid."@birdexpress.co.th";
            }else{
                $email = $user->email;
            }
            $fullname = $user->name;
            $fname = substr($fullname, 0 ,strpos($fullname, " "));
            $sname = substr($fullname,strpos($fullname, " ")+1);

            if($user->avatar != null){
                $image = file_get_contents($user->avatar);
                if($image !== false){
                    // $image = 'data:image/jpg;base64,'.base64_encode($image);
                    // $user_picture = 'profile_' . time() . '.png';
                    // $path = public_path('img/profile/' . $user_picture);
                    // Image::make($image)->save($path);
                    $user_picture = 'user.svg';
                }
            }
            else{
                $user_picture = 'user.svg';
            }

            $newUser = User::create([
                'name' => $fname,
                'surname' => $sname,
                'email' => $email,
                'phone' => "",
                'f_id' => $fid,
                'password' => Hash::make($user->email),
                'user_type' => 0,
                'type' => 0,
                'user_pic' => $user_picture,
                'kyc_status' => 0,
            ]);

            auth()->login($newUser, true);
            $user=User::where('f_id', $fid)->first();
        }
        // return redirect()->to('/home');
        log::insert([
            'user_id' => 0,
            'parent_id' => 0,
            'type'=>'user_auth',
            'note'=>'FB new login passed '.$user->email,
            'ip'=> AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        // return redirect()->route('login');
        return view('auth.final-register', compact('user'));
    }


}
