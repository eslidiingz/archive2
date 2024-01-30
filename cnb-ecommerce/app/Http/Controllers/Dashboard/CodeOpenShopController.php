<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Invs;
use App\Shops;
use App\CodeOpenShop;
use App\CodeOpenShopGen;
use DateTime;
use App\log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\HomeController as UserHC;
use Excel;
use App\Exports\code_open_shop_export;

class CodeOpenShopController extends Controller
{
    public function codeOpenShopData(Request $request)
    {

        if (isset($request->search)) {
            $code_open_shop_all = CodeOpenShopGen::select('code_open_shop_gen_t.*')
                ->orderBy('code_open_shop_gen_t.created_at', 'desc');

            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $code_open_shop_all = $code_open_shop_all->where('code_open_shop_gen_t.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $code_open_shop_all = $code_open_shop_all->where('code_open_shop_gen_t.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'detail' and $val != '') {
                    $code_open_shop_all = $code_open_shop_all->where('code_open_shop_gen_t.detail', 'like', '%' . $val . '%');
                } elseif ($key == 'remain_amt' and $val != '') {
                    $code_open_shop_all = $code_open_shop_all->where('code_open_shop_gen_t.remain_amt', '>', '' . $val . '');
                } elseif ($key == 'created_by' and $val != '') {
                    $code_open_shop_all = $code_open_shop_all->where('code_open_shop_gen_t.created_by', 'like', '%' . $val . '%');
                }
            }
            $code_open_shop_all = $code_open_shop_all->paginate(50)->appends(request()->query());
        } else {
            $code_open_shop_all = CodeOpenShopGen::select('code_open_shop_gen_t.*')->orderBy('code_open_shop_gen_t.created_at', 'desc')->paginate(50);
        }
        return view('dashboard/codeOpenShop', compact('code_open_shop_all'));
    }
    public function create() {
        return view('dashboard/codeOpenShopCreate');
    }
    public function codeOpenShopDetail(Request $request) {
        $o_code_open_shop_gen = CodeOpenShopGen::where('id', $request->id)->first();
        $o_code_open_shop = CodeOpenShop::where('gen_id', $request->id)->get();

        return view('dashboard/codeOpenShopDetail', compact('o_code_open_shop_gen','o_code_open_shop'));
    }

    public function store(Request $request) {
        // dd($request->all());

        $i_code_open_shop_gen_id = CodeOpenShopGen::create([
            'detail' => $request->detail,
            'code_amt' => $request->code_amt,
            'remain_amt' => $request->code_amt,
            'created_by' => Auth::guard('admin')->user()->name.' '.Auth::guard('admin')->user()->surname,
            'created_at' => date('Y-m-d H:i:s')
        ])->id;
        // echo $i_code_open_shop_gen_id; exit;

        for($i = 1; $i <= $request->code_amt; $i++) {
            $o_code_open_shop_insert = CodeOpenShop::create([
                'gen_id'    =>  $i_code_open_shop_gen_id,
                'code' => $this->generateRandomString(6),
                'code_amt' => 1,
                'remain_amt' => 1,
                'created_by' => Auth::guard('admin')->user()->name.' '.Auth::guard('admin')->user()->surname,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('/dashboard/codeOpenShopDetail/'.$i_code_open_shop_gen_id);
    }
    public function codeOpenShopExport(Request $request) {
        return Excel::download(new code_open_shop_export($request->id), 'Code_เปิดร้านค้า.xlsx');
    }
    function generateRandomString($length = 6) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }


    public static function callAPI($method, $url, $data)
    {
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
            'APIKEY: mZWG43D9ygXnOh3wtIHe6Jmev4xCNVNlezPJZPHhqsokPyUliOhwkzIF3tmQ'
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
    public function invsCancelCustomerExport() {
        return Excel::download(new invs_cancel_customer_export, 'ยกเลิกคำสั่งซื้อโดยลูกค้า.xlsx');
    }
    public function invsCancelShopExport() {
        return Excel::download(new invs_cancel_shop_export, 'ยกเลิกคำสั่งซื้อโดยร้านค้า.xlsx');
    }
}
