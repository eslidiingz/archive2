<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class resetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tel' => 'required|regex:/(0)[0-9]{9}/|max:10',
            'password' => 'required|min:4|max:16',
            'password_confirmation' => 'same:password|required|min:4|max:16',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'โปรดระบุเบอร์โทรศัพท์',
            'phone.regex' => 'กรุณาตรวจสอบเบอร์โทรศัพท์',
            'phone.max' => 'กรุณาตรวจสอบเบอร์โทรศัพท์',

            'password.required' => 'โปรดระบุรหัสผ่าน',
            'password.min' => 'รหัสผ่านควรมากกว่า 4 ตัวอักษร',
            'password.max' => 'รหัสผ่านไม่ควรเกิน 16 ตัวอักษร',

            'password_confirmation.required' => 'โปรดยืนยันรหัสผ่าน',
            'password_confirmation.min' => 'รหัสผ่านควรมากกว่า 4 ตัวอักษร',
            'password_confirmation.max' => 'รหัสผ่านไม่ควรเกิน 16 ตัวอักษร',
            'password_confirmation.same' => 'รหัสผ่านไม่ตรงกัน',
        ];
    }
}
