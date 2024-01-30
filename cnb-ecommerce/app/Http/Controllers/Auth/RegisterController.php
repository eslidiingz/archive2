<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+\.[com|co.th]{2,6}$/', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:password', 'min:8'],
            'phone' => ['required', 'string', 'digits:10', 'unique:users'],
            'i_accept' => ['required','accepted']
        ], [
            'name.required' => 'กรุณาระบุชื่อของคุณ',
            'surname.required' => 'กรุณาระบุนามสกุลของคุณ',

            'email.email' => 'โปรดระบุในรูปแบบของอีเมล',
            'email.regex' => 'โปรดระบุในรูปแบบของอีเมล เช่น test@email.com',
            'email.unique' => 'อีเมลนี้ใช้ในการสมัครแล้ว',

            'password.required' => 'กรุณาระบุรหัสผ่านของคุณ',
            'password.min' => 'รหัสผ่านขั้นต่ำ 8 ตัว',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',

            'password_confirmation.required' => 'กรุณาระบุรหัสผ่านของคุณ',
            'password_confirmation.min' => 'รหัสผ่านขั้นต่ำ 8 ตัว',
            'password_confirmation.same' => 'รหัสผ่านไม่ตรงกัน',

            'phone.required' => 'กรุณาระบุเบอร์โทรศัพท์ของคุณ',
            'phone.digits' => 'ระบุเบอร์โทรศัพท์ให้ครบ 10 ตัว',
            'phone.unique' => 'เบอร์โทรศัพท์นี้เคยมีการใช้ในการสมัครแล้ว',

            'i_accept.required' => 'ยินยอมเงื่อนไขและนโยบายความเป็นส่วนตัวก่อน',
            'i_accept.accepted' => 'ยินยอมเงื่อนไขและนโยบายความเป็นส่วนตัวก่อน',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'user_type' => 0,
            'type' => 0,
            'user_pic' => 'user.svg',
            'kyc_status' => 0,
        ]);
    }
}
