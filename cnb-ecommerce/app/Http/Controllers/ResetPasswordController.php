<?php

namespace App\Http\Controllers;

use App\Http\Requests\resetPassword;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    public function sendMail(Request $request){
        dd('mail');
    }

    public function getOtp(Request $request){
        $user = User::where('phone', $request->phone)->first();
        if(!$user){
            $data['error'] = 'ไม่มีเบอร์โทรศัพท์อยู่ในระบบ';
            return $data;
        }

        $data_array = array(
            "key" => "1736777465016376",
            "secret" => "fe70b0f91b7508573c7529cc492e6e74",
            "msisdn" => $request->phone,
        );
        $make_call = ResetPasswordController::callAPI('POST', 'https://otp.thaibulksms.com/v1/otp/request', json_encode($data_array));
        $response = json_decode($make_call, true);
        // dd($response);
        if (isset($response['data'])) {

            $status = $response['data']['status'];
            $token = $response['data']['token'];
            $phone = $request->phone;

            $data['status'] = $status;
            $data['token'] = $token;
            $data['phone'] = $phone;
            // dd($data);
            return $data;

            // return redirect('/password/reset/reset_password')->with('data', ['status' => $status, 'message' => $message, 'phone' => $phone]);
        } else {
            $error = $response['error'];
            return $error;
        }
    }

    public function verifyOtp(Request $request){

        // dd($request->all());
        $otp = $request->otp;
        // $otp = $request->otp_1.$request->otp_2.$request->otp_3.$request->otp_4.$request->otp_5.$request->otp_6;
        // dd($otp);

        $data_array = array(
            "token" => $request->token,
            "key" => "1736777465016376",
            "secret" => "fe70b0f91b7508573c7529cc492e6e74",
            "pin" => $otp,
        );
        $make_call = ResetPasswordController::callAPI('POST', 'https://otp.thaibulksms.com/v1/otp/verify', json_encode($data_array));
        $response = json_decode($make_call, true);
        // dd($response);
        if (isset($response['data'])) {

            $status = $response['data']['status'];
            $message = $response['data']['message'];
            $phone = $request->phone;

            $data['status'] = $status;
            $data['message'] = $message;
            $data['phone'] = $phone;
            // dd($data);
            session(['phone_reset' => $phone]);
            session(['phone_created_at' => new DateTime()]);
            session()->save();

            return $data;

            // return redirect('/password/reset/reset_password')->with('data', ['status' => $status, 'message' => $message, 'phone' => $phone]);
        } else {
            $error = $response['error'];
            return $error;
        }
    }

    public function reset_password(){
        // dd(session('phone_created_at'));
        if(session('phone_reset') == null || session('phone_reset') == '' || session('phone_created_at') == null || session('phone_created_at') == ''){
            return redirect()->route('password.request' );
        }

        $now = new DateTime();
        $compare = $now->modify('-15 minutes');
        if($compare > session('phone_created_at')){
            Session::forget('phone_reset');
            Session::forget('phone_created_at');
            return redirect()->route('password.request' );
        }


        $data['phone'] = session('phone_reset');
        $data['created_at'] = session('phone_created_at');

        return view('pages.reset_otp', $data);

    }

    public function update_password(resetPassword $request){
        $now = new DateTime();
        $compare = $now->modify('-15 minutes');
        if($compare > session('phone_created_at')){
            Session::forget('phone_reset');
            Session::forget('phone_created_at');
            return redirect()->route('password.request' );
        }

        $update = User::where('phone', $request->tel)->update([
            'password' => bcrypt($request->password),
        ]);

        if($update){
            Session::forget('phone_reset');
            Session::forget('phone_created_at');

            return redirect('/');
        }
    }

    public static function callAPI($method, $url, $data){
        // dd($data);
        $curl = curl_init();
        switch ($method) {
            case "POST":
                // dd('post', $data);
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }
}
