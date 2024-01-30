<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\ExportTransaction;
use App\Exports\invs_wallet_Export;
use App\Exports\invs_wallet_wait_Export;
use App\Exports\invs_inprocess_Export;
use App\Exports\invs_detail_Export;
use App\Exports\multi_inprocess_Export;
use App\Exports\transaction_Export;
use App\Http\Controllers\Controller;
use App\invs;
use App\Shops as shops;
use App\invs_wallet;
use App\withdrow;
use App\Product;
use App\balance;
use App\UsersAdmin;
use App\flash;
use App\log;
use Illuminate\Http\Request;
use DateTime;
use App\Transactions;
use Illuminate\Pagination\Factory;
use App\Http\Controllers\admin\HomeController as UserHC;
use App\PreOrder;
use App\shipping_details;
use App\User;
// use Maatwebsite\Excel\Excel;
use DB;
use Illuminate\Support\Facades\Auth;
use Excel;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function transactionData()
    {

        $transac = [];
        $trans = Transactions::orderBy('updated_at', 'desc')->get();

        foreach ($trans as $tra) {
            // dd($tra->inv_id);
            foreach ($tra->inv_id as $trr) {

                if (!in_array($trr, $transac)) {
                    array_push($transac, $trr);
                }
            }
            // dd($transac);
        }


        // dd($transac);
        $invs = invs::whereIn('id', $transac)->get();
        // dd($invs);
        // return ['trans'=>$trans,'invs'=>$invs];
        return view('dashboard.payment', compact('trans', 'invs'));
    }



    public function Btn_ApproveTransfer(Request $request)
    {
        // dd($request->all());
        $invs = invs::where('id', $request->id)->first();
        foreach ($invs->inv_products as $value) {

            $pd_all[] = $value;
            $pd_id[]      = $value['product_id'];
            $pd_amoung[]  = $value['amount'];
            $pd_option[]  = $value['option1'];
            $pd_dis1[]  = $value['dis1'];
        }

        $basket_all =  invs::where('inv_ref', $invs->inv_ref)->get();
        $inv = $basket_all->first();
        $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');
        $ids = [];
        // dd($pd_all);
        foreach ($pd_all as $key => $val) {
            if ($val['type'] == 'flashsale') {
                $get_pd = flash::where('id', $pd_id[$key])->first();
            } else if ($val['type'] == 'pre_order') {
                $get_pd = PreOrder::where('id', $pd_id[$key])->first();
            } else if ($val['type'] == null) {
                $get_pd = Product::where('id', $pd_id[$key])->first();  
            }
            if ($val['type'] == 'pre_order') {
                $arrNew = $get_pd->preOrder_option;
                $lengthDis2 = count($arrNew[0]['dis2']);
                $key_dis1 = array_search($val['dis1'], $arrNew[0]['dis1']);
                $key_dis2 = array_search($val['dis2'], $arrNew[0]['dis2'] ?? null);
                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                $key_start_date = array_keys(array_column($get_pd->preOrder_option[0]['datetime_range'], 'start_date'), $val['start_date']);
                $in_stock = $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key];

                if (intval($in_stock) < $val['amount']) {
                    return redirect()->back()->with('notEnoughStock', 'เนื่องจากจำนวนสินค้าไม่เพียงพอ');
                }
            } else {
                $arrNew = $get_pd->product_option;
                $lengthDis2 = count($get_pd->product_option['dis2']);
                $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                $in_stock = $get_pd->product_option['stock'][$stock_key];
                if ($in_stock < $val['amount']) {
                    return redirect()->back()->with('notEnoughStock', 'เนื่องจากจำนวนสินค้าไม่เพียงพอ');
                }
            }
        }
        $time = new DateTime();
        $check_type = [];
        $new_id_invs = [];
        $new_inv_ref = [];

        foreach ($pd_all as $key => $val) {
            $arr_stock = 0;

            if ($val['type'] == 'flashsale') {
                $get_pd = flash::where('id', $pd_id[$key])->first();
            } else if ($val['type'] == 'pre_order') {
                $get_pd = PreOrder::where('id', $pd_id[$key])->first();
            } else {
                $get_pd = Product::where('id', $pd_id[$key])->first();
            }

            if ($val['type'] == 'pre_order') {
                $arrNew = $get_pd->preOrder_option;
                $lengthDis2 = count($arrNew[0]['dis2']);
                $key_dis1 = array_search($val['dis1'], $arrNew[0]['dis1']);
                $key_dis2 = array_search($val['dis2'], $arrNew[0]['dis2'] ?? null);
                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                $key_start_date = array_keys(array_column($get_pd->preOrder_option[0]['datetime_range'], 'start_date'), $val['start_date']);
                $in_stock = $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key];
            } else {
                $arrNew = $get_pd->product_option;
                $lengthDis2 = count($get_pd->product_option['dis2']);
                $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                $in_stock = $get_pd->product_option['stock'][$stock_key];
            }


            if ($val['type'] == 'pre_order') {
                $sales = $get_pd->sales + $val['amount'];
                $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key] =  $in_stock - $val['amount'];
            } else if ($val['type'] != 'flashsale') {
                $sales = $get_pd->sales + $val['amount'];
                $arrNew['stock'][$stock_key] =  $in_stock - $val['amount'];
            }

            foreach ($arrNew['stock'] as $arrval) {
                $arr_stock += $arrval;
            }



            if ($val['type'] == 'flashsale') {
                flash::where('id', $pd_id[$key])->update([
                    'product_option' => $arrNew,
                ]);
                if ($arr_stock <= 0) {
                    flash::where('id', $pd_id[$key])->update([
                        'status' => 'unenabled',
                    ]);
                }
            } else if ($val['type'] == 'pre_order') {
                PreOrder::where('id', $pd_id[$key])->update([
                    'preOrder_option' => $arrNew,
                    'sales' => $sales
                ]);
                if ($arr_stock <= 0) {
                    PreOrder::where('id', $pd_id[$key])->update([
                        'status_goods' => '2'
                    ]);
                }
            } else {
                Product::where('id', $pd_id[$key])->update([
                    'product_option' => $arrNew,
                    'sales' => $sales
                ]);
                if ($arr_stock <= 0) {
                    Product::where('id', $pd_id[$key])->update([
                        'status_goods' => '2'
                    ]);
                }
            }

            $weight = shipping_details::where('shipde_id', $invs->shipping_id)->first();
            // $price_weight = ($weight->shipde_price / count($pd_all));

            //แยก invs เอาออกก่อน เพราะฟังก์ชั่นผิด----------------------------------------------------------

            // $inv_ref = $time->format('YmdHis') . $invs->user_id;
            //     if (count($pd_all) >= 2) {
            //         if ($val['type'] == 'pre_order') {

            //             $new_data = invs::create([
            //                 'inv_ref' => $invs->inv_ref . "_PreOder",
            //                 'shop_id' => $invs->shop_id,
            //                 'inv_products' => [$val],
            //                 'user_id' => $invs->user_id,
            //                 'shipping_cost' => $price_weight,
            //                 'payment' => $invs->payment,
            //                 'campaign_id' => null,
            //                 'shipping_id' => $invs->shipping_id,
            //                 'total' => $val['price'],
            //                 'note' => '',
            //                 'coupon_id' => null,
            //                 'status' => 2,
            //                 'shipping_note' => null,
            //                 'address' => $invs->address,
            //                 'transfer_img' => $invs->transfer_img,
            //                 'transfer_slip' => $invs->transfer_slip,
            //                 'created_at' => new DateTime,
            //                 'updated_at' => new DateTime,
            //             ]);
            //             array_push($new_id_invs, $new_data->id);
            //             array_push($new_inv_ref, $new_data);
            //         } else if ($val['type'] == 'flashsale') {
            //             $new_data = invs::create([
            //                 'inv_ref' => $invs->inv_ref . "_FlashSale",
            //                 'shop_id' => $invs->shop_id,
            //                 'inv_products' => [$val],
            //                 'user_id' => $invs->user_id,
            //                 'shipping_cost' => $price_weight,
            //                 'payment' => $invs->payment,
            //                 'campaign_id' => null,
            //                 'shipping_id' => $invs->shipping_id,
            //                 'total' => $val['price'],
            //                 'note' => '',
            //                 'coupon_id' => null,
            //                 'status' => 2,
            //                 'shipping_note' => null,
            //                 'address' => $invs->address,
            //                 'transfer_img' => $invs->transfer_img,
            //                 'transfer_slip' => $invs->transfer_slip,
            //                 'created_at' => new DateTime,
            //                 'updated_at' => new DateTime,
            //             ]);
            //             array_push($new_id_invs, $new_data->id);
            //             array_push($new_inv_ref, $new_data);
            //         } else if ($val['type'] == '9baht') {
            //             $new_data = invs::create([
            //                 'inv_ref' => $invs->inv_ref . "_9Baht",
            //                 'shop_id' => $invs->shop_id,
            //                 'inv_products' => [$val],
            //                 'user_id' => $invs->user_id,
            //                 'shipping_cost' => $price_weight,
            //                 'payment' => $invs->payment,
            //                 'campaign_id' => null,
            //                 'shipping_id' => $invs->shipping_id,
            //                 'total' => $val['price'],
            //                 'note' => '',
            //                 'coupon_id' => null,
            //                 'status' => 2,
            //                 'shipping_note' => null,
            //                 'address' => $invs->address,
            //                 'transfer_img' => $invs->transfer_img,
            //                 'transfer_slip' => $invs->transfer_slip,
            //                 'created_at' => new DateTime,
            //                 'updated_at' => new DateTime,
            //             ]);
            //             array_push($new_id_invs, $new_data->id);
            //             array_push($new_inv_ref, $new_data);
            //         } else if ($val['type'] == null) {
            //             $new_data = invs::create([
            //                 'inv_ref' => $invs->inv_ref,
            //                 'shop_id' => $invs->shop_id,
            //                 'inv_products' => [$val],
            //                 'user_id' => $invs->user_id,
            //                 'shipping_cost' => $price_weight,
            //                 'payment' => $invs->payment,
            //                 'campaign_id' => null,
            //                 'shipping_id' => $invs->shipping_id,
            //                 'total' => $val['price'],
            //                 'note' => '',
            //                 'coupon_id' => null,
            //                 'status' => 2,
            //                 'shipping_note' => null,
            //                 'address' => $invs->address,
            //                 'transfer_img' => $invs->transfer_img,
            //                 'transfer_slip' => $invs->transfer_slip,
            //                 'created_at' => new DateTime,
            //                 'updated_at' => new DateTime,
            //             ]);
            //             array_push($new_id_invs, $new_data->id);
            //             array_push($new_inv_ref, $new_data);
            //         }
            //         invs::where('id', $request['id'])->delete();
            //     } else {
            //         invs::where('id', $request['id'])->update([
            //             'status' => 2,
            //             'updated_at' => new DateTime()
            //         ]);
            //     }
            // }


            // foreach ($new_id_invs as $value) {
            //     array_push($ids, $value);
            // }

            // foreach ($new_inv_ref as $new_inv) {

            //     $transactions = new Transactions();
            //     $transactions->type = 'banking';
            //     $transactions->user_id = $new_inv->user_id;
            //     $transactions->inv_ref = $new_inv->inv_ref;
            //     $transactions->total = $new_inv->total;
            //     $transactions->point = 0;
            //     $transactions->coin = 0;
            //     $transactions->status = 2;
            //     $transactions->payment = 'banking';
            //     $transactions->inv_id = $new_inv->id;
            //     // $transactions->inv_id = array("id" => $new_inv->id);
            //     $transactions->save();


            //     log::insert([
            //         'user_id' => Auth::guard('admin')->user()->id,
            //         'parent_id' => $new_inv->id,
            //         'type' => 'admin_approve_payment',
            //         'note' => 'อนุมัติการโอนเงิน',
            //         'ip' => UserHC::getUserIP(),
            //         'created_at' => date('Y-m-d H:i:s')
            //     ]);

            //แยก invs เอาออกก่อน เพราะฟังก์ชั่นผิด----------------------------------------------------------

            //อัพเดท สถานะ invs

            invs::where('id', $request['id'])->update([
                'status' => 2,
                'updated_at' => new DateTime()
            ]);


            $data = [];
            foreach ($basket_all as $key_cost => $val_cost) {
                if ($val_cost->uidmp != null || $val_cost->uidmp != '') {
                    $sale_cost = 0;
                    $inv_mp = [];
                    $inv_mp['inv_id'] = $val_cost->id;
                    foreach ($val_cost->inv_products as $key_pro => $val_pro) {
                        if (isset($val_pro['margin']) && $val_pro['margin'] != null && $val_pro['margin'] != '') {
                            $inv_mp['products'][$key_pro] = $val_pro;
                            $sale_cost += (($val_pro['price'] - $val_pro['margin']) * $val_pro['amount']);
                        }
                    }
                    $inv_mp['sale_cost'] = $sale_cost;
                    $inv_mp['mp_cost'] = $sale_cost * 0.85;
                    $inv_mp['stn_cost'] = $sale_cost * 0.15;
                    $inv_mp['status'] = 1;

                    // array_push($data, $inv_mp);
                    $data['data_mp'][$key_cost] = $inv_mp;
                }

                $val_shop = shops::where('id', $val_cost->shop_id)->first();
                // dd($val_cost);
                if (isset($val_shop->Influencer) && $val_shop->Influencer != '') {
                    if (isset($val_shop->influence_date) && $val_shop->influence_date != '') {
                        $now = new DateTime();
                        $now = date_format($now, "Y-m-d");
                        $now = date_create($now);
                        date_sub($now, date_interval_create_from_date_string("3 month"));
                        $now = date_format($now, "Y-m-d");

                        // $date = date_format($val_shop->influence_date, "Y-m-d");

                        if ($now <= $val_shop->influence_date) {
                            $data['data_influ'][$key_cost]['inv_id'] = $val_cost->id;
                            $data['data_influ'][$key_cost]['influ_id'] = $val_shop->Influencer;
                            $data['data_influ'][$key_cost]['influ_cost'] = $val_cost->total * 0.01;
                        }
                    }
                }
            }
            // dd($data);
            foreach ($basket_all as $invs_mp) {
                if (isset($data['data_mp']) || isset($data['data_influ'])) {
                    if (isset($data['data_mp'])) {
                        $data_array = array(
                            "inv_no" => $invs_mp->inv_ref,
                            "uidmp" => $invs_mp->uidmp,
                            "data" => $data,
                            "domain" => 'birdfresh',
                        );
                    } else {
                        $data_array = array(
                            "inv_no" => $invs_mp->inv_ref,
                            "data" => $data,
                            "domain" => 'birdfresh',
                        );
                    }
                    $make_call = $this->callAPI('POST', 'https://dev.shopteeniimp.com/api/v1/insert_invs', json_encode($data_array));
                    $response = json_decode($make_call, true);
                }
            }

            $transactions = new Transactions();
            $transactions->type = 'banking';
            $transactions->user_id = $invs->user_id;
            $transactions->inv_ref = $invs->inv_ref;
            $transactions->total = $invs->total + $invs->shipping_cost;
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = 'banking';
            $transactions->inv_id = $invs->id;
            // $transactions->inv_id = array("id" => $new_inv->id);
            $transactions->save();


            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $invs->id,
                'type' => 'admin_approve_payment',
                'note' => 'อนุมัติการโอนเงิน',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->back();
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

    public function Btn_wallet_Approvewithdrows(Request $request)
    {

        if ($request->chk_method == 'confirm') {
            $invs_wallet = invs_wallet::where('id', $request->id)->first();
            $user_balance = balance::where('user_id', $invs_wallet->user_id)->first();

            $grandtotal = $invs_wallet->total + $user_balance->credit;
            // dd($invs_wallet->status);
            // if ($invs_wallet->status == '2') {
            //     return redirect()->back();
            // }

            balance::where('user_id', $invs_wallet->user_id)->update([
                'credit' => $grandtotal,
            ]);

            invs_wallet::where('id', $request->id)->update([
                'status' => '2',
            ]);
            $ids = [];
            array_push($ids, $invs_wallet->id);

            $transactions = new Transactions();
            $transactions->type = 'wallet bank';
            $transactions->user_id = $invs_wallet->user_id;
            $transactions->inv_ref = $invs_wallet->inv_ref;
            $transactions->total = $invs_wallet->total;
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = 'wallet bank';
            $transactions->inv_id = array("id" => $ids);
            $transactions->save();

            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $request->id,
                'type' => 'admin_wallet',
                'note' => 'อนุมัติการโอนเงินWallet',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->back();
        } else {
            $invs_wallet = invs_wallet::where('id', $request->id)->first();
            $user_balance = balance::where('user_id', $invs_wallet->user_id)->first();

            if ($invs_wallet->status == '2' && $user_balance->credit >= $invs_wallet->total) {
                dd($invs_wallet);
                $grandtotal = $user_balance->credit - $invs_wallet->total;
                balance::where('user_id', $invs_wallet->user_id)->update([
                    'credit' => $grandtotal,
                ]);
            }

            invs_wallet::where('id', $request->id)->update([
                'status' => '99',
                'note' => $request->remark,
            ]);

            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $request->id,
                'type' => 'admin_wallet',
                'note' => 'ปฏิเสธการโอนเงินWallet',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back();
        }
    }

    public function Btn_Wallet_Cancel(Request $request)
    {
        $invs_wallet = invs_wallet::where('id', $request->id)->first();
        $user_balance = balance::where('user_id', $invs_wallet->user_id)->first();

        if ($invs_wallet->status == '2' && $user_balance->credit >= $invs_wallet->total) {
            dd($invs_wallet);
            $grandtotal = $user_balance->credit - $invs_wallet->total;
            balance::where('user_id', $invs_wallet->user_id)->update([
                'credit' => $grandtotal,
            ]);
        }

        invs_wallet::where('id', $request->id)->update([
            'status' => '99',
        ]);
        return redirect()->back();
    }

    public function deletetransfer_img(Request $request)
    {

        // echo $request['id']; exit;

        invs::where('id', $request['id'])->update([
            'status' => 13,
            'note' => $request->note_note,
            'transfer_img' => '',
            'updated_at' => new DateTime(),
        ]);

        log::insert([
            'user_id' => Auth::guard('admin')->user()->id,
            'parent_id' => $request->id,
            'type' => 'admin_approve_payment',
            'note' => 'ปฏิเสธการโอนเงิน',
            'ip' => UserHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        // return response()->json($request['content'], 200);
        return redirect()->back();
    }

    // Button---------------------------------------------




    public function approveTransfer(Request $request)
    {
        $invs = invs::whereIn('invs.payment', ['bank', 'mobilebanking', 'credit'])
            ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
            ->leftJoin('users as shop_user', 'shops.user_id', '=', 'shop_user.id')
            ->select('invs.*', 'users.name', 'users.surname', 'users.phone as user_phone', 'shops.shop_name', 'shops.shop_name', 'shop_user.phone as shop_user_phone')
            ->orderBy('invs.created_at', 'desc');
        if (isset($request->search)) {
            foreach ($_GET as $key => $val) {
                if ($key == 'u_name' and $val != '') {
                    $invs = $invs
                        ->where(function ($q) use ($val) {
                            $q->where('users.name', 'like', '%' . $val . '%')
                                ->orwhere('users.surname', 'like', '%' . $val . '%');
                        });
                } elseif ($key == 'amount' and $val != '') {
                    $invs = $invs->where(\DB::raw('invs.total + shipping_cost'), 'like', '%' . $val . '%');
                } elseif ($key == 'date_start' and $val != '') {
                    $invs = $invs->where('invs.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $invs = $invs->where('invs.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                        $invs = $invs->whereIn('invs.status', [12, 2, 13, 3, 4, 5, 43, 52, 53, 54]);
                    } elseif ($val == '33') {
                        $invs = $invs->whereIn('invs.status', [3, 4, 43]);
                    } elseif ($val == '55') {
                        $invs = $invs->whereIn('invs.status', [5, 52, 53, 54]);
                    } else {
                        $invs = $invs->where('invs.status', $val);
                    }
                } elseif ($key == 'inv_ref' and $val != '') {
                    $invs = $invs->where('invs.inv_ref', 'like', '%' . $val . '%');
                }
            }
        } else {
            $invs = $invs->whereIn('status', [12, 2, 13, 3, 4, 5, 43, 52, 53, 54]);
        }

        $invs = $invs->paginate(50)
            ->appends(request()->query());
        foreach ($invs as $key => $value) {
            $invs[$key]->logs = $value->logs_payment->first();
            if (isset($invs[$key]->logs)) {
                $invs[$key]->approve_user = UsersAdmin::where('id', $invs[$key]->logs->user_id)->first();
            }
            if (isset($value->transfer_slip)) {
                foreach (json_decode($value->transfer_slip) as $key2 => $val2) {
                    $invs[$key]->$key2 = $val2;
                }
            }
        }
        return view('dashboard.approvePayment', compact('invs'));
    }

    public function Transacion(Request $request)
    {
        if (isset($request->search)) {
            // dd($request);
            $transacion = Transactions::leftJoin('users', 'transactions.user_id', '=', 'users.id')
                ->select('transactions.*', 'users.name', 'users.surname')
                ->orderBy('transactions.created_at', 'desc');
            $transacion = $transacion->whereIn('transactions.status', [2, 99]);
            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $transacion = $transacion->where('transactions.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $transacion = $transacion->where('transactions.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                    } elseif (($val == 'wallet')) {
                        $transacion = $transacion->where('transactions.inv_ref', 'like', '%' . 'wallet' . '%');
                    } elseif (($val == 'withdraw')) {
                        $transacion = $transacion->where('transactions.payment', 'withdraw');
                    } elseif (($val == 'shopteenii')) {
                        $transacion = $transacion->where('transactions.payment', '!=', 'withdraw')->where('transactions.inv_ref', 'not like', '%' . 'wallet' . '%');
                    }
                } elseif ($key == 'shop_name' and $val != '') {
                    $transacion = $transacion->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'inv_ref' and $val != '') {
                    $transacion = $transacion->where('inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $transacion = $transacion->where('users.name', 'like', '%' . $val . '%');
                } elseif ($key == 'amount' and $val != '') {
                    $transacion = $transacion->where('transactions.total', 'like', '%' . $val . '%');
                }
            }
            $transacion = $transacion->paginate(50)->appends(request()->query());
        } else {
            $transacion = Transactions::leftJoin('users', 'transactions.user_id', '=', 'users.id')
                ->select('transactions.*', 'users.name', 'users.surname')
                ->orderBy('transactions.created_at', 'desc')
                ->paginate(50);
        }
        // dd($transacion);
        // dd($invs);
        return view('dashboard.transacion', compact('transacion'));
    }

    public function WalletTransfer(Request $request)
    {
        $invs_wallet = invs_wallet::leftJoin('users', 'invs_wallet.user_id', '=', 'users.id')
            ->select('invs_wallet.*')
            ->orderBy('invs_wallet.created_at', 'desc');
        if (isset($request->search)) {
            foreach ($_GET as $key => $val) {
                if ($key == 'u_name' and $val != '') {
                    $invs_wallet = $invs_wallet
                        ->where(function ($q) use ($val) {
                            $q->where('users.name', 'like', '%' . $val . '%')
                                ->orwhere('users.surname', 'like', '%' . $val . '%');
                        });
                } elseif ($key == 'amount' and $val != '') {
                    $invs_wallet = $invs_wallet->where('invs_wallet.total', 'like', '%' . $val . '%');
                } elseif ($key == 'date_start' and $val != '') {
                    $invs_wallet = $invs_wallet->where('invs_wallet.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $invs_wallet = $invs_wallet->where('invs_wallet.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                        $invs_wallet = $invs_wallet->whereIn('invs_wallet.status', [12, 2, 99]);
                    } else {
                        $invs_wallet = $invs_wallet->where('invs_wallet.status', $val);
                    }
                } elseif ($key == 'inv_ref' and $val != '') {
                    $invs_wallet = $invs_wallet->where('invs_wallet.inv_ref', 'like', '%' . $val . '%');
                }
            }
        } else {
            $invs_wallet = $invs_wallet->whereIn('status', [12, 2, 99]);
        }
        $invs_wallet = $invs_wallet->paginate(50)
            ->appends(request()->query());
        foreach ($invs_wallet as $key => $value) {
            $invs_wallet[$key]->user = $value->users->first();
            $invs_wallet[$key]->logs = $value->logs_admin_wallet->first();
            if (isset($invs_wallet[$key]->logs)) {
                $invs_wallet[$key]->approve_user = UsersAdmin::where('id', $invs_wallet[$key]->logs->user_id)->first();
            }
            if (isset($value->transfer_slip)) {
                foreach (json_decode($value->transfer_slip) as $key2 => $val2) {
                    $invs_wallet[$key]->$key2 = $val2;
                }
            }
        }

        // $invs_wallet_wait = invs_wallet::where('status', 12)->where('payment', 'bank')->orderBy('invs_wallet.created_at', 'desc')->get();
        // foreach ($invs_wallet_wait as $key => $value) {
        //     $invs_wallet_wait[$key]->user = $value->users->first();
        // }

        // $invs_wallet_success = invs_wallet::where('status', 2)->orderBy('invs_wallet.created_at', 'desc')->get();
        // foreach ($invs_wallet_success as $key => $value) {
        //     $invs_wallet_success[$key]->user = $value->users->first();
        // }
        // $invs_wallet_cancel = invs_wallet::where('status', 99)->orderBy('invs_wallet.created_at', 'desc')->get();
        // foreach ($invs_wallet_cancel as $key => $value) {
        //     $invs_wallet_cancel[$key]->user = $value->users->first();
        // }


        // dd($invs_wallet);

        return view('dashboard.walletPayment', compact('invs_wallet'));
    }

    public function inprogessExport()
    {
        return Excel::download(new multi_inprocess_Export, 'โอนเงิน.xlsx');
    }

    public function WalletAppExport(Request $request)
    {
        return Excel::download(new invs_wallet_Export($request), 'ยืนยันการโอนเงินWallet(อนุมัติสำเร็จ).xlsx');
    }

    public function transactionExport(Request $request)
    {
        return Excel::download(new transaction_Export($request), 'รายงานการเงิน.xlsx');
    }

    public function WalletAppExportWait()
    {
        return Excel::download(new invs_wallet_wait_Export, 'ยืนยันการโอนเงินWallet(รอการอนุมัติ).xlsx');
    }

    public function cancelTransfer()
    {
        $cancels6 = invs::where('status', '6')->orderBy('updated_at', 'desc')->get();
        $cancels99 = invs::where('status', '99')->orderBy('updated_at', 'desc')->get();


        $invscancel = DB::table('invs')
            ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
            // ->leftJoin('', '', '=', '')
            // ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            ->where('invs.status', '=', 6)
            ->orderBy('invs.updated_at', 'desc')
            ->get();

        // $product_all_id = [];
        // $invscancel =  invs::where('inv_ref', $request->inv_ref)->get();


        // dd($invscancel);
        // dd($product_invs2);
        // $res_productId = [];
        // array_push($res_productId, $request->product_id);
        // $res_productId = [];
        // $invs_id = intval($request->invs_id);
        // $invs_product_id = intval($request->product_id);
        // dd($res_productId);
        // $rating_peview_data = DB::table('invs')
        //     ->select('rating_peview')
        //     ->where('id', $invs_id)->first();

        // if (empty($rating_peview_data->rating_peview)) {

        //     $rating_peview = DB::table('invs')
        //         ->where('id', $invs_id)->first();

        //     $product_all = DB::table('product_s')
        //         ->where('id', $invs_product_id)->first();

        //     $rating_product = json_decode($rating_peview->inv_products);

        //     foreach ($rating_product as $value) {
        //         if ($product_all->id == $value->product_id) {
        //             array_push($res_productId, $request->product_id);
        //         }
        //     };


        //     DB::insert(
        //         'insert into rating (invs_id, product_id, shop_id, user_id, rating, comment, picture, date, status) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
        //         [$request->invs_id, $request->product_id, $request->shop_id, $request->user_id, $request->rating, $request->comment, $request->picture, $request->date, $request->status]
        //     );

        //     DB::table('invs')
        //         ->where('id', $invs_id)
        //         ->update(['rating_peview' => $res_productId[0]]);
        // } else {

        //     $rating_peview = DB::table('invs')
        //         ->where('id', $invs_id)->first();

        //     $product_all = DB::table('product_s')
        //         ->where('id', $invs_product_id)->first();

        //     $rating_product = json_decode($rating_peview->inv_products);

        //     array_push($res_productId, $rating_peview_data->rating_peview);
        //     $res_productId = explode(",", $res_productId[0]);

        //     foreach ($rating_product as $key => $value) {
        //         if ($product_all->id == $value->product_id) {
        //             array_push($res_productId, $request->product_id);
        //         }
        //     };

        //     $res_productId = array_unique($res_productId);
        //     $res_peview = implode(',', $res_productId);

        //     DB::table('invs')
        //         ->where('id', $invs_id)
        //         ->update(['rating_peview' => $res_peview]);

        //     DB::table('rating')
        //         ->where('invs_id', $request->invs_id)
        //         ->where('product_id', $request->product_id)
        //         ->delete();

        //     DB::insert(
        //         'insert into rating (invs_id, product_id, shop_id, user_id, rating, comment, picture, date, status) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
        //         [$request->invs_id, $request->product_id, $request->shop_id, $request->user_id, $request->rating, $request->comment, $request->picture, $request->date, $request->status]
        //     );
        // }


        // $product_id = json_decode($request->product_id)->product_id;
        // DB::insert(
        //     'insert into rating (invs_id, product_id, shop_id, user_id, rating, comment, picture, date, status) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
        //     [$request->invs_id, $request->product_id, $request->shop_id, $request->user_id, $request->rating, $request->comment, $request->picture, $request->date, $request->status]
        // );

        // DB::update('update invs set status = 7 where id = ?', [$request->invs_id]);
        // DB::update('update invs set rating_peview = 7 where id = ?', [$request->invs_id]);
        // end

        //     foreach ($invscancel as $value) {
        //         array_push($product_invs,json_decode($value->inv_products));
        //     }
        //     $product_invs2 = [];
        //     foreach ($product_invs as $value2){
        //     }

        // dd($product_invs2);
        // $product_invs = json_decode($invscancel->inv_products)
        // dd($invscancel);

        return view('dashboard.cancelApprove', compact('cancels6', 'cancels99', 'invscancel'));
    }


    public function cancelproduct()
    {
        $cancels6 = invs::where('status', '6')->orderBy('updated_at', 'desc')->get();
        $cancels99 = invs::where('status', '99')->orderBy('updated_at', 'desc')->get();

        $invscancel = DB::table('invs')
            ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
            // ->leftJoin('', '', '=', '')
            // ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            ->where('invs.status', '=', 6)
            ->orderBy('invs.updated_at', 'desc')
            ->get();

        return view('dashboard.cancelproduct', compact('cancels6', 'cancels99', 'invscancel'));
    }

    public function withdraw(Request $request)
    {
        $bank_logo = array(
            'ธนาคารกสิกรไทย' => 'kbank.svg',
            'ธนาคารไทยพาณิชย์' => 'scb.svg',
            'ธนาคารกรุงเทพ' => 'bbl.svg',
            'ธนาคารกรุงไทย' => 'ktb.svg',
            'ธนาคารทหารไทย' => 'tmb.svg',
            'ธนาคารกรุงศรีอยุธยา' => 'bay.svg',
            'ธนาคารเกียรตินาคิน' => 'kk.svg',
            'ธนาคารซีไอเอ็มบีไทย' => 'cimb.svg',
            'ธนาคารทิสโก้' => 'tisco.svg',
            'ธนาคารธนชาต' => 'tbank.svg',
            'ธนาคารยูโอบี' => 'uob.svg',
            'ธนาคารไทยเครดิตเพื่อรายย่อย' => 'tcrb.svg',
            'ธนาคารแลนด์แอนด์ เฮ้าส์' => 'lhb.svg',
            'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร' => 'baac.svg',
            'ธนาคารออมสิน' => 'gsb.svg',
            'ธนาคารอาคารสงเคราะห์' => 'ghb.svg',
            'ธนาคารอิสลามแห่งประเทศไทย' => 'ibank.svg',
        );
        if (isset($request->search)) {

            // dd($request->all());
            $user_withdraw = withdrow::select('withdrows.id','withdrows.account_date','withdrows.shop_id','shops.shop_name','withdrows.type', 'withdrows.status', 'withdrows.bank_code', 'withdrows.bank_name', 'withdrows.bank_number', 'withdrows.user_id', 'withdrows.note', DB::raw('SUM(withdrows.amount) AS amount'), DB::raw('SUM(withdrows.usdc) AS usdc'))
                ->leftJoin('shops', 'withdrows.shop_id', '=', 'shops.id')
                ->leftJoin('invs', 'withdrows.inv_id', '=', 'invs.id')
                ->whereNotIn('withdrows.status', ['0'])
                ->groupBy('withdrows.account_date','withdrows.shop_id','shops.shop_name','withdrows.type','withdrows.note')
                ->orderBy('withdrows.updated_at', 'desc');
            

            foreach ($_GET as $key => $val) {
                if ($key == 'shop_name' and $val != '') {
                    $user_withdraw = $user_withdraw->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'amount' and $val != '') {
                    $user_withdraw = $user_withdraw->where('amount', 'like', '%' . $val . '%');
                } elseif ($key == 'date_start' and $val != '') {
                    $user_withdraw = $user_withdraw->where('withdrows.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $user_withdraw = $user_withdraw->where('withdrows.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '' and $val != '0') {
                    $user_withdraw = $user_withdraw->where('withdrows.status', $val);
                }
            }
            $user_withdraw = $user_withdraw->paginate(50)
                ->appends(request()->query());
        } else {
            $user_withdraw = withdrow::select('withdrows.id','withdrows.account_date','withdrows.shop_id','shops.shop_name','withdrows.type', 'withdrows.status', 'withdrows.bank_code', 'withdrows.bank_name', 'withdrows.bank_number', 'withdrows.user_id', 'withdrows.note', DB::raw('SUM(withdrows.amount) AS amount'), DB::raw('SUM(withdrows.usdc) AS usdc'))
                ->leftJoin('shops', 'withdrows.shop_id', '=', 'shops.id')
                ->leftJoin('invs', 'withdrows.inv_id', '=', 'invs.id')
                ->whereNotIn('withdrows.status', ['0'])->orderBy('withdrows.updated_at', 'desc')
                ->groupBy('withdrows.account_date','withdrows.shop_id','shops.shop_name','withdrows.type','withdrows.note')
                ->paginate(50);
                // echo $user_withdraw; exit;
        }
        $a_tmp_invs = [];
        foreach ($user_withdraw as $key => $value) {
            $user_withdraw[$key]->shop = $value->Shops->first();
            $user_withdraw[$key]->user = User::where('id',$user_withdraw[$key]->shop->user_id)->first();
            $s_type = $value->type;
            $o_tmp_invs = invs::join('withdrows','withdrows.inv_id','invs.id')
                        ->join('users','users.id','withdrows.user_id')
                        // ->leftJoin('users as user_shop','users.id','=',$user_withdraw[$key]->shop->user_id)
                        // ->where('withdrows.id',$value->id)
                        ->where('withdrows.shop_id',$value->shop_id)->where('withdrows.status','!=','0')
                        ->where(function ($q) use ($s_type) {
                            if( $s_type == 'Crypto' ) {
                                $q->where('invs.payment', '=', 'crypto');
                            } else {
                                $q->where('invs.payment', '!=', 'crypto');
                            }
                        })
                        ->select('invs.inv_ref','invs.inv_no','users.name','users.surname','withdrows.id','withdrows.created_at','withdrows.type','withdrows.amount','withdrows.usdc','withdrows.status')
                        ->get();
            $user_withdraw[$key]->inv = $o_tmp_invs;
            
            foreach ($user_withdraw[$key]->inv as $k_inv => $v_inv) {
                $o_tmp_logs = $v_inv->logs_withdraws->first();
                if (isset($o_tmp_logs)) {
                    $user_withdraw[$key]->inv[$k_inv]->approve_user = UsersAdmin::where('id', $o_tmp_logs->user_id)->first();
                }
                array_push($a_tmp_invs, $v_inv->id);
            }
            $user_withdraw[$key]->inv_ids = $a_tmp_invs;
            $user_withdraw[$key]->logs = $value->logs_withdraws->first();
            if ($value->bank_code != '') {
                $user_withdraw[$key]->logo = $bank_logo[$value->bank_code];
            }
            if (isset($user_withdraw[$key]->logs)) {
                $user_withdraw[$key]->approve_user = UsersAdmin::where('id', $user_withdraw[$key]->logs->user_id)->first();
            }
        }
        // dd($user_withdraw[$key]->inv_ids);

        return view('dashboard.WithdrawPayment', compact('user_withdraw'));
    }

    public function check_inprocess(Request $request)
    {
        $a_inv_ids = explode(',', $request->hdWithdrawID);
        $user_withdraw = withdrow::orderBy('created_at', 'desc');
        $user_withdraw = $user_withdraw->whereIn('id', $a_inv_ids);
        $user_withdraw = $user_withdraw->get();
        $time_setting = Carbon::now()->format('Y-m-d 12:00');

        // $user_withdraw = withdrow::where('status', '1')->where('created_at', '<', $time_setting)->orderBy('created_at', 'desc')->get();
        // $user_withdraw = withdrow::where('status', '1')->whereIn('id', $time_setting)->orderBy('created_at', 'desc')->get();
        
        foreach ($user_withdraw as $key => $value) {
            if ($value->status == 1) {
                $user_withdraw[$key]->invs = $value->invs->first();
                withdrow::where('id', $value->id)->update([
                    'status' => 3,
                    'note' => $request->hdRemark,
                    'updated_at' => new DateTime(),
                ]);

                $balance = balance::where('user_id', $value->user_id)->first();
                $new_seller_credit = $balance->seller_credit - $value->amount;
                $seller_credit_update = DB::table('balances')
                    ->where('user_id', $value->user_id)
                    ->update(['seller_credit' => $new_seller_credit]);

                $transactions = new Transactions();
                $transactions->type = 'withdraw';
                $transactions->user_id = $value->user_id;
                $transactions->inv_ref = $value->invs->inv_ref;
                $transactions->total = $value->amount;
                $transactions->usdc = $value->usdc;
                $transactions->point = 0;
                $transactions->coin = 0;
                $transactions->status = 2;
                $transactions->payment = 'withdraw';
                $transactions->inv_id = array("id" => $value->inv_id);
                $transactions->save();

                log::insert([
                    'user_id' => Auth::guard('admin')->user()->id,
                    'parent_id' => $value->inv_id,
                    'type' => 'admin_approve_withdraws',
                    'note' => 'อนุมัติการถอนเงิน',
                    'status' => '2',
                    'ip' => UserHC::getUserIP(),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
        return redirect()->back();
    }


    public function Btn_Approvewithdrows(Request $request)
    {

        $withdrows_detail = withdrow::where('id', $request['id'])->first();

        withdrow::where('id', $request['id'])->update([
            'status' => 1,
            'updated_at' => new DateTime(),
        ]);

        $transactions = new Transactions();
        $transactions->type = 'withdraw';
        $transactions->user_id = $withdrows_detail['user_id'];
        $transactions->inv_ref = '';
        $transactions->total = $withdrows_detail['amount'];
        $transactions->point = 0;
        $transactions->coin = 0;
        $transactions->status = 2;
        $transactions->payment = 'withdraw';
        $transactions->inv_id = [];
        $transactions->save();
        return redirect()->back();
    }

    public function Btn_Cancelwithdrows(Request $request)
    {
        $withdrows_total = withdrow::where('id', $request['id'])->first();
        $checkCredit = DB::table('balances')
            ->select('seller_credit')->where('user_id', $withdrows_total['user_id'])->first();
        $new_amount = $withdrows_total['amount'];

        $new_seller_credit = ($checkCredit->seller_credit + $new_amount);

        $seller_credit_update = DB::table('balances')
            ->where('user_id', $withdrows_total['user_id'])
            ->update(['seller_credit' => $new_seller_credit]);


        withdrow::where('id', $request['id'])->update([
            'status' => 99,
            'note' => $request['remark'],
            'updated_at' => new DateTime(),
        ]);
        return redirect()->back();
    }


    public function Btn_Checkwithdrows(Request $request)
    {
        if ($request['chk_method'] == 'confirm') {
            $withdrows_detail = withdrow::where('id', $request['id'])->first();

            withdrow::where('id', $request['id'])->update([
                'status' => 1,
                'updated_at' => new DateTime(),
            ]);

            $transactions = new Transactions();
            $transactions->type = 'withdraw';
            $transactions->user_id = $withdrows_detail['user_id'];
            $transactions->inv_ref = '';
            $transactions->total = $withdrows_detail['amount'];
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = 'withdraw';
            $transactions->inv_id = [];
            $transactions->save();
            return redirect()->back();
        } else {
            $withdrows_total = withdrow::where('id', $request['id'])->first();
            $checkCredit = DB::table('balances')
                ->select('seller_credit')->where('user_id', $withdrows_total['user_id'])->first();
            $new_amount = $withdrows_total['amount'];

            $new_seller_credit = ($checkCredit->seller_credit + $new_amount);

            $seller_credit_update = DB::table('balances')
                ->where('user_id', $withdrows_total['user_id'])
                ->update(['seller_credit' => $new_seller_credit]);


            withdrow::where('id', $request['id'])->update([
                'status' => 99,
                'note' => $request['remark'],
                'updated_at' => new DateTime(),
            ]);
            return redirect()->back();
        }
    }



    //---------------------------- Function for export file Excel ----------------------------\\
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    public function excel()
    {
        return $this->excel->download(new ExportTransaction, 'Transaction_Main.xlsx');
    }
    //---------------------------- Function for export file Excel ----------------------------\\
}
