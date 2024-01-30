<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use DateTime;
use Laravel\Ui\Presets\React;

class AddressController extends Controller
{

    public function Index()
    {
        if (!isset(Auth::user()->id)) {
            return redirect(route('welcome'));
        }
        $user = Auth::user();

        //-----------Query data when get in this site--------\\


        $address = Address::where('user_id', Auth::user()->id)->orderBy('status', 'DESC')->get();
        // dd($address);
        return view('pages.profile.address')->with(["address" => $address, "user" => $user]);
    }

    public function Index_2()
    {
        //  $address_user = $this->Index()['address_user'];
        $address_user = Address::where('user_id', Auth::user()->id)->orderBy('status', 'DESC')->get();
        return view('new_ui.profile_user_address')->with(['address_user' => $address_user]);
    }





    public function addAddress(Request $request)
    {
        //--------- This function for just a create new Address --------------\\
        // dd($request->all());
        {
            $validator = Validator::make($request->all(), [
                'user_id' => ['required', 'string', 'max:255'],
                'name'    => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'tel'     => ['required', 'regex:/(0)[0-9]{9}/'],
                'address1' => ['required', 'string', 'max:255'],
                // 'address2' => ['required', 'string', 'max:255'],
                'county'  => ['required', 'string', 'max:255'],
                'district' => ['required', 'string', 'max:255'],
                'city'    => ['required', 'string', 'max:255'],
                'zipcode' => ['required', 'integer', 'digits:5'],
                // 'country' => ['required', 'string', 'max:255'],
                // 'status'  => ['required', 'integer', 'max:3'],

            ],[
                'name.required' => 'กรุณากรอกชื่อ',
                'name.max' => 'จำนวนตัวอักษรยาวเกินไป',

                'surname.required' => 'กรุณากรอกนามสกุล',
                'surname.max' => 'จำนวนตัวอักษรยาวเกินไป',

                'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
                'tel.regex' => 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง( 012-345-6789)',

                'address1.required' => 'กรุณากรอกที่อยู่',
                'address1.max' => 'จำนวนตัวอักษรยาวเกินไป',

                'county.required' => 'กรุณากรอกอำเภอ',
                'county.max' => 'จำนวนตัวอักษรยาวเกินไป',

                'district.required' => 'กรุณากรอกตำบล',
                'district.max' => 'จำนวนตัวอักษรยาวเกินไป',

                'city.required' => 'กรุณากรอกชื่อจังหวัด',
                'city.max' => 'จำนวนตัวอักษรยาวเกินไป',

                'zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
                'zipcode.digits' => 'จำนวนรหัสไปรษณีย์ไม่ครบ',



            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
        }

        // dd($request->all());
        $data['status'] = 'false';
        // $address = Address::Where('user_id', Auth::user()->id)->get();
        // dd($address);
        Address::where('user_id', Auth::user()->id)->update([
            'is_last_ship' => 'N',
        ]);
        $address = Address::create([
            'user_id' => Auth::user()->id,
            'name' => $request['name'],
            'surname' => $request['surname'],
            'tel' => $request['tel'],
            'address1' => $request['address1'],
            'address2' => $request['address2'],
            'county' => $request['county'],
            'district' => $request['district'],
            'city' => $request['city'],
            'zipcode' => $request['zipcode'],
            'country' => $request['country'],
            'status' => $request['status'],
            'is_last_ship' => 'Y',
        ]);
        if($address){
            $data['status'] =  'true';
            $data['id'] = $address->id;
            if ($request['status'] == 1) {
                Address::where('id', '!=',$address->id)->where('user_id', Auth::user()->id)->update([
                    'status' => 0,
                ]);
            }
        }
        return $data;


        //     Address::where('id', '!=', $get_add_id)->where('user_id', Auth::user()->id)->update([
        //         'status' => 0,
        //         'updated_at' => new DateTime(),
        //     ]);
        //     $address = Address::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
        //     // dd($address);
        //     return $address;
        // } else {
        //     $add = Address::where('user_id', Auth::user()->id)->where('status', null);
        //     $add->update([
        //         'status' => 0
        //     ]);
        //     $address = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        //     // dd($address);
        //     return $address;
        // }


        // return redirect()->back();

        //not validate because validate from =====address.blade.php====\\

    }
    public function changeAddress(Request $request)
    {
        $data['status'] = 'false';
        // $address = Address::Where('user_id', Auth::user()->id)->get();
        // dd($address);
        Address::where('user_id', Auth::user()->id)->update([
            'is_last_ship' => 'N',
        ]);
        Address::where('user_id', Auth::user()->id)
                ->where('id', $request->addr_id)
                ->update([
            'is_last_ship' => 'Y'
        ]);
        $data['status'] =  'true';

        return $data;
    }





    public function editAddress(Request $request)
    {
        // dd($request);
        $address = Address::where('id', $request['id'])->update([
            'user_id' => Auth::user()->id,
            'name' => $request['name'],
            'surname' => $request['surname'],
            'tel' => $request['tel'],
            'address1' => $request['address1'],
            'address2' => $request['address2'],
            'county' => $request['county'],
            'district' => $request['district'],
            'city' => $request['city'],
            'zipcode' => $request['zipcode'],
            'country' => $request['country'],
            //'status' => $request['status'],
        ]);


        return redirect()->back();
    }

    public function setDefault(Request $request)
    {
        $address = Address::where('id', $request['id'])->update([
            'status' => '1',
            'updated_at' => new DateTime(),
        ]);



        Address::where('id', '!=', $request['id'])->where('user_id', Auth::user()->id)->update([
            'status' => '0',
            'updated_at' => new DateTime(),
        ]);
        // dd($request);
        return redirect()->back();
    }




    public function delete(Request $request)
    {

        //-------------------This function is for Delete Address a Row----------------------\\
        // dd($request);
        Address::where('id', $request['id'])->delete();
        return redirect()->back();
    }
}
