<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class preorderUpdateRequest extends FormRequest
{
    public function __construct()
    {
        Validator::extend("ValidatorDate", function ($attribute, $date, $parameters) {
            if (count($date) < 1) {
                return false;
            }
            foreach ($date as $key => $value) {
                $date[$key]['index'] = $key;
                if ($value['end_date'] < $value['start_date']) {
                    return false;
                }
            }
            usort($date, function ($a, $b) {
                return date('Ymd', strtotime($a["start_date"])) - date('Ymd', strtotime($b["start_date"]));
            });
            // dd($date);
            foreach ($date as $key => $value) {
                if ($key > 0) {
                    if (
                        ($date[$key - 1]['start_date'] != $value['start_date'] ||
                            $date[$key - 1]['end_date'] != $value['end_date']) &&
                        (strtotime($date[$key - 1]['end_date']) >= strtotime($value['start_date']))
                    ) {
                        return false;
                    }
                }
            }
            return true;
        });
        Validator::extend("ValidatorInput", function ($attribute, $input, $parameters) {
            foreach ($input as $key => $value) {
                if (
                    ($value['start_date'] != '' ||
                        $value['end_date'] != '' ||
                        $value['stock'] != '' ||
                        $value['price'] != '') &&
                    ($value['start_date'] == '' ||
                        $value['end_date'] == '' ||
                        $value['stock'] == '' ||
                        $value['price'] == '')
                ) {
                    return false;
                }
            }
            return true;
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
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'data' => 'validator_date',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'กรุณกรอกข้อมูลชื่อสินค้า',
            'detail.required' => 'กรุณกรอกข้อมูลหมวดหมู่สินค้า',
            'detail.required' => 'กรุณกรอกข้อมูลรายละเอียดสินค้า',
            'data.validator_input' => 'คุณกรอกข้อมูลไม่ครบ',
            'data.validator_date' => 'รูปแบบวันที่ไม่ถูกต้อง',
        ];
    }
}
