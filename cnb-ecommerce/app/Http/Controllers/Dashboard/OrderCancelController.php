<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\inv_cancel;
use App\invs;
use App\Shops;
use App\balance;
use App\Product;
use App\flash;
use App\BankMaster;
use DateTime;
use App\UsersAdmin;
use App\log;
use App\Transactions;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\HomeController as UserHC;
use Excel;
use App\Exports\invs_cancel_customer_export;
use App\Exports\invs_cancel_shop_export;

class OrderCancelController extends Controller
{
    public function orderCacelData(Request $request)
    {

        if (isset($request->search)) {
            $cancelcase_all = inv_cancel::select('inv_cancels.*')
                ->leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')
                ->leftJoin('shops', 'inv_cancels.shop_id', '=', 'shops.id')
                ->leftJoin('users', 'inv_cancels.user_id', '=', 'users.id')
                ->where('invs.cancel_by','=','SHOP')
                ->orderBy('inv_cancels.created_at', 'desc');

            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('inv_cancels.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('inv_cancels.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                        $cancelcase_all = $cancelcase_all->whereIn('inv_cancels.status', [0, 2, 99]);
                    } elseif ($val == '1') {
                        $cancelcase_all = $cancelcase_all->whereIn('inv_cancels.status', [0, 1]);
                    } else {
                        $cancelcase_all = $cancelcase_all->where('inv_cancels.status', $val);
                    }
                } elseif ($key == 'shop_name' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'invs' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('users.name', 'like', '%' . $val . '%');
                }
            }
            $cancelcase_all = $cancelcase_all->paginate(50)->appends(request()->query());
        } else {
            $cancelcase_all = inv_cancel::select('inv_cancels.*')->leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')->where('invs.cancel_by','=','SHOP')->orderBy('inv_cancels.updated_at', 'desc')->paginate(50);
        }

        foreach ($cancelcase_all as $key => $value) {
            $inv_data = invs::where('id', $value->inv_id)->first();
            $user_data = User::where('id', $value->user_id)->first();
            $shop_data = Shops::where('id', $value->shop_id)->first();
            $cancelcase_all[$key]->logs = $value->logs_OrderCancel_Case->first();
            if ($inv_data) {
                $cancelcase_all[$key]->inv_ref = $inv_data->inv_ref;
                $cancelcase_all[$key]->sum_total = $inv_data->total + $inv_data->shipping_cost;
                $cancelcase_all[$key]->total = $inv_data->total;
                $cancelcase_all[$key]->shipping_cost = $inv_data->shipping_cost;
                $cancelcase_all[$key]->shop_id = $inv_data->shop_id;
            }
            if ($user_data) {
                $cancelcase_all[$key]->user_name = $user_data->name;
                $cancelcase_all[$key]->user_phone = $user_data->phone;
                if($user_data->bank_id){
                    $bank = BankMaster::where('id',$user_data->bank_id)->first();
                    $cancelcase_all[$key]->user_bank = $bank->name;
                    $cancelcase_all[$key]->user_bankLogo = $bank->logo;
                    $cancelcase_all[$key]->user_bankName = $user_data->bank_name;
                    $cancelcase_all[$key]->user_bankNumber = $user_data->bank_number;
                    $cancelcase_all[$key]->user_bankCategory = $user_data->bank_category;
                }
            }
            if ($shop_data) {
                $cancelcase_all[$key]->shop_name = $shop_data->shop_name;
            }
            if (isset($cancelcase_all[$key]->logs)) {
                $cancelcase_all[$key]->approve_user = UsersAdmin::where('id', $cancelcase_all[$key]->logs->user_id)->first();
            }

            if($value->user_approve == 1){
                $value->approve_by = $user_data->name;
            }
            // else if($value->shop_approve == 1){
            //     $value->approve_by = $shop_data->shop_name;
            // }
            // dd($canc elcase_all);
        }
        return view('dashboard/orderCancel', compact('cancelcase_all'));
    }
    public function orderCacelDataCustomer(Request $request)
    {
        if (isset($request->search)) {
            $cancelcase_all = inv_cancel::select('inv_cancels.*')
                ->leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')
                ->leftJoin('shops', 'inv_cancels.shop_id', '=', 'shops.id')
                ->leftJoin('users', 'inv_cancels.user_id', '=', 'users.id')
                ->where('invs.cancel_by','=','CUSTOMER')
                ->orderBy('inv_cancels.created_at', 'desc');

            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('inv_cancels.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('inv_cancels.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                        $cancelcase_all = $cancelcase_all->whereIn('inv_cancels.status', [0, 2, 99]);
                    } elseif ($val == '1') {
                        $cancelcase_all = $cancelcase_all->whereIn('inv_cancels.status', [0, 1]);
                    } else {
                        $cancelcase_all = $cancelcase_all->where('inv_cancels.status', $val);
                    }
                } elseif ($key == 'shop_name' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'invs' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $cancelcase_all = $cancelcase_all->where('users.name', 'like', '%' . $val . '%');
                }
            }
            $cancelcase_all = $cancelcase_all->paginate(50)->appends(request()->query());
        } else {
            $cancelcase_all = inv_cancel::select('inv_cancels.*')->leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')->where('invs.cancel_by','=','CUSTOMER')->orderBy('inv_cancels.updated_at', 'desc')->paginate(50);
        }

        foreach ($cancelcase_all as $key => $value) {
            $inv_data = invs::where('id', $value->inv_id)->first();
            $user_data = User::where('id', $value->user_id)->first();
            $shop_data = Shops::where('id', $value->shop_id)->first();
            $cancelcase_all[$key]->logs = $value->logs_OrderCancel_Case->first();
            if ($inv_data) {
                $cancelcase_all[$key]->inv_ref = $inv_data->inv_ref;
                $cancelcase_all[$key]->sum_total = $inv_data->total + $inv_data->shipping_cost;
                $cancelcase_all[$key]->total = $inv_data->total;
                $cancelcase_all[$key]->shipping_cost = $inv_data->shipping_cost;
                $cancelcase_all[$key]->shop_id = $inv_data->shop_id;
            }
            if ($user_data) {
                $cancelcase_all[$key]->user_name = $user_data->name;
                $cancelcase_all[$key]->user_phone = $user_data->phone;
                if($user_data->bank_id){
                    $bank = BankMaster::where('id',$user_data->bank_id)->first();
                    $cancelcase_all[$key]->user_bank = $bank->name;
                    $cancelcase_all[$key]->user_bankLogo = $bank->logo;
                    $cancelcase_all[$key]->user_bankName = $user_data->bank_name;
                    $cancelcase_all[$key]->user_bankNumber = $user_data->bank_number;
                    $cancelcase_all[$key]->user_bankCategory = $user_data->bank_category;
                }
            }
            if ($shop_data) {
                $cancelcase_all[$key]->shop_name = $shop_data->shop_name;
            }
            if (isset($cancelcase_all[$key]->logs)) {
                $cancelcase_all[$key]->approve_user = UsersAdmin::where('id', $cancelcase_all[$key]->logs->user_id)->first();
            }

            if($value->user_approve == 1){
                $value->approve_by = $user_data->name;
            }
            // else if($value->shop_approve == 1){
            //     $value->approve_by = $shop_data->shop_name;
            // }
            // dd($canc elcase_all);
        }
        return view('dashboard/orderCancelCustomer', compact('cancelcase_all'));
    }

    public function Btn_submit(Request $request)
    {
        // dd($request->all());
        // dd($request->case);

        if (isset($request->case)) {
            if ($request->case == 1) {
                // $balance = balance::where('user_id', $request->user_id)->first();
                // $total = $balance->credit + $request->total;

                // $inv = invs::where('inv_ref', $request->inv_ref)->first();

                // foreach ($inv->inv_products as $key => $value) {
                //     $stock_key = $value['stock_key'];

                //     if (!isset($value['type'])) {
                //         $product = Product::where('id', $value['product_id'])->first();
                //         $arrNew = $product->product_option;
                //         $amount = $product->product_option['stock'][$stock_key] + $value['amount'];
                //         $arrNew['stock'][$stock_key] = $amount;

                //         Product::where('id', $value['product_id'])->update([
                //             'product_option' => $arrNew
                //         ]);
                //     }
                //     if ($value['type'] == 'flashsale') {
                //         $product = flash::where('id', $value['product_id'])->first();
                //         $arrNew = $product->product_option;
                //         $amount = $product->product_option['stock'][$stock_key] + $value['amount'];
                //         $arrNew['stock'][$stock_key] = $amount;

                //         flash::where('id', $value['product_id'])->update([
                //             'product_option' => $arrNew
                //         ]);
                //     }
                // }

                // invs::where('inv_ref', $request->inv_ref)->update([
                //     'status' => 99,
                // ]);

                $inv_c = inv_cancel::where('id', $request->id)->first();
                $invs = invs::where('id', $inv_c->inv_id)->first();

                inv_cancel::where('id', $request->id)->update([
                    'admin_approve' => 1,
                    'status' => 2,
                    'admin_note' => $request->remark,
                    'updated_at' => new DateTime(),
                ]);

                log::insert([
                    'user_id' => Auth::guard('admin')->user()->id,
                    'parent_id' => $request->id,
                    'type' => 'admin_OrderCancel_Case',
                    'note' => 'ปิดเคส',
                    'ip' => UserHC::getUserIP(),
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                invs::where('id', $inv_c->inv_id)->update([
                        'status' => 99,
                        'note' => $request->note_note,
                        'updated_at' => new DateTime(),
                    ]);

                if ($invs->uidmp) {
                    $data_array = array(
                        "inv_ref" => $invs->inv_ref,
                        "inv_id" => $invs->id,
                        "status" => 3,
                        "domain" => 'birdfresh',
                    );
                    $make_call = $this->callAPI('POST', 'https://dev.shopteeniimp.com/api/v1/update_order_success', json_encode($data_array));
                    $response = json_decode($make_call, true);
                }
                // balance::where('user_id', $request->user_id)->update([
                //     'credit' => $total,
                // ]);

                // $transactions = new Transactions();
                // $transactions->type = 'wallet cancel';
                // $transactions->user_id = $request->user_id;
                // $transactions->inv_ref = $request->inv_ref;
                // $transactions->total = $request->total;
                // $transactions->point = 0;
                // $transactions->coin = 0;
                // $transactions->status = 2;
                // $transactions->payment = 'wallet cancel';
                // $transactions->inv_id = array("id" => $inv->id);
                // $transactions->save();
                // } else if ($request->case == 2) {
                //     $shop_data = Shops::where('id', $request->shop_id)->first();

                //     $balance = balance::where('user_id', $request->user_id)->first();
                //     $total = $balance->seller_credit + $request->total;

                //     $inv = invs::where('inv_ref', $request->inv_ref)->first();
                //     foreach ($inv->inv_products as $key => $value) {
                //         $stock_key = $value['stock_key'];
                //         if (!isset($value['type'])) {
                //             $product = Product::where('id', $value['product_id'])->first();
                //             $arrNew = $product->product_option;
                //             $amount = $product->product_option['stock'][$stock_key] + $value['amount'];
                //             $arrNew['stock'][$stock_key] = $amount;

                //             Product::where('id', $value['product_id'])->update([
                //                 'product_option' => $arrNew
                //             ]);
                //         }
                //         if ($value['type'] == 'flashsale') {
                //             $product = flash::where('id', $value['product_id'])->first();
                //             $arrNew = $product->product_option;
                //             $amount = $product->product_option['stock'][$stock_key] + $value['amount'];
                //             $arrNew['stock'][$stock_key] = $amount;

                //             flash::where('id', $value['product_id'])->update([
                //                 'product_option' => $arrNew
                //             ]);
                //         }
                //     }

                //     invs::where('inv_ref', $request->inv_ref)->update([
                //         'status' => 99,
                //     ]);

                //     inv_cancel::where('id', $request->id)->update([
                //         'admin_approve' => 1,
                //         'status' => 99,
                //         'admin_note' => $request->remark,
                //         'updated_at' => new DateTime(),
                //     ]);
                //     balance::where('user_id', $shop_data->user_id)->update([
                //         'seller_credit' => $total,
                //     ]);

                //     $transactions = new Transactions();
                //     $transactions->type = 'sales cancel approve';
                //     $transactions->user_id = $shop_data->user_id;
                //     $transactions->inv_ref = $request->inv_ref;
                //     $transactions->total = $request->total;
                //     $transactions->point = 0;
                //     $transactions->coin = 0;
                //     $transactions->status = 2;
                //     $transactions->payment = 'sales cancel approve';
                //     $transactions->inv_id = array("id" => $inv->id);
                //     $transactions->save();
                // }
            }


        } else {
            inv_cancel::where('id', $request->id)->update([
                'status' => 1,
                'admin_note' => $request->remark,
                'updated_at' => new DateTime(),
            ]);

            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $request->id,
                'type' => 'admin_OrderCancel_Case',
                'note' => 'รอตรวจสอบเคส',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->back();
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
