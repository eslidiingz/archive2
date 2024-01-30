<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class formAdd extends FormRequest
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
            'username' => 'required|min:4|max:50|unique:users_admin,username',
            'password' => 'required|min:8|max:16',
            'name' => 'required|min:2',
            'type' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'โปรดระบุชื่อผู้ใช้งาน',
            'username.unique' => 'มีชื่อผู้ใช้งานนี้แล้ว',
            'username.min' => 'ชื่อผู้ใช้งานควรมากกว่า 4 ตัวอักษร',
            'username.max' => 'ชื่อผู้ใช้งานไม่ควรเกิน 50 ตัวอักษร',

            'password.required' => 'โปรดระบุรหัสผ่าน',
            'password.min' => 'รหัสผ่านควรมากกว่า 8s ตัวอักษร',
            'password.max' => 'รหัสผ่านไม่ควรเกิน 16 ตัวอักษร',
            
            'name.required' => 'โปรดระบุชื่อ',
            'name.min' => 'ชื่อจริงไม่ถูกต้อง',

            'type.required' => 'โปรดระบุประเภท',
        ];
    }
}
