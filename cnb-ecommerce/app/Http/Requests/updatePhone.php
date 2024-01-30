<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class updatePhone extends FormRequest
{
    public function __construct() {
        Validator::extend("check_phone", function($attribute, $value, $parameters) {
            $customer = User::where('id',Auth::user()->id)->first();
            if($customer->phone == $value){
                return true;
            }

            $rules = [
                'phone' => 'unique:users,phone',
            ];
            $data = [
                'phone' => $value
            ];
            $validator = Validator::make($data, $rules);
            if (!$validator->fails()) {
                return true;
            }
            return false;
        });
    }
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
            'p_change' => 'required|regex:/(0)[0-9]{9}/|max:10|check_phone',
        ];
    }

    public function messages()
    {
        return [
            'p_change.required' => 'โปรดระบุเบอร์โทรศัพท์',
            'p_change.regex' => 'กรุณาตรวจสอบเบอร์โทรศัพท์',
            'p_change.max' => 'กรุณาตรวจสอบเบอร์โทรศัพท์',
            'p_change.check_phone' => 'เบอร์โทรศัพท์ถูกใช้งานแล้ว',

        ];
    }
}
