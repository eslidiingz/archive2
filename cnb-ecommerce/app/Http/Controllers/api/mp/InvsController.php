<?php

namespace App\Http\Controllers\api\mp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Http\Controllers\api\mp\InvsController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\HomeController as UserHC;

class InvsController extends Controller
{
    public function updateInvs(Request $request){
        $data['status'] = 200;
        // dd($request->all());
        try {
            if ($request->inv_ref && $request->status) {
                DB::table('invs')->where('inv_no', $request->inv_ref)->update([
                    'status' => $request->status,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                // $invs = DB::table('invs')->where('inv_no','=',$request->inv_ref);

                // if( $invs ) {
                //     DB::table('withdraws')->insert([
                //         'user_id' => $invs[0]->user_id,
                //         'invs_id' => $invs[0]->invs_id,
                //         'credit' => $invs[0]->mp_cost,
                //         'status' => '0'
                //     ]);
                // }

                // CALL MP TO UPDATE SELL SUCCESS
                if( $request->status == '5' || $request->status == '52' ){
                    $data_array = array(
                        "APPKEY" => 'tFxfsv0Kt@5Y!#VuW96cketOgsMUVfTcAVj1pdg2zds0NOHszcH$ggvNi@bm',
                        "inv_no" => $inv_no,
                        "status" => $status
                    );
                    $make_call = $this->callAPI('POST', 'http://127.0.0.1:8000/api/v1/update_order_success', json_encode($data_array));
                    $response = json_decode($make_call, true);
                    // dd($response);
                    if (isset($response['data'])) {
                    } else {
                        $error = $response['error'];
                        return back()->with('error',[
                            'errors' => $error['errors'],
                            'code' => $error['code'],
                            'message' => $error['message'],
                        ]);
                    }
                }


                log::insert([
                    'user_id' => $invs[0]->user_id,
                    'parent_id' => '',
                    'type' => 'add_income_mp',
                    'note' => 'ขายสำเร็จ บันทึกรายรับ MP',
                    'status' => '99',
                    'ip' => UserHC::getUserIP(),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        } catch (\Exception $e) {
            $data['status'] = 403;
            $data['message'] = $e->getMessage();
        }
        return response()->json($data);
    }

    public static function callAPI($method, $url, $data)
    {
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
