<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class formEdit extends FormRequest
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
            'password' => 'nullable|min:8|max:16',
            'name' => 'required|min:2',
            'type' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'password.min' => 'รหัสผ่านควรมากกว่า 8 ตัวอักษร',
            'password.max' => 'รหัสผ่านไม่ควรเกิน 16 ตัวอักษร',
            
            'name.required' => 'โปรดระบุชื่อ',
            'name.min' => 'ชื่อจริงไม่ถูกต้อง',

            'type.required' => 'โปรดระบุประเภท',
        ];
    }
}
