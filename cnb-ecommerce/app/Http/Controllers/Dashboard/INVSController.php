<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\invs;
use App\inv_cancel;
use App\Product;
use App\flash;
use App\shops;
use App\User;
use App\UsersAdmin;
use App\log;
use App\balance;
use App\branch_income;
use Auth;
use App\sales_amount;
use http\Exception;
use DateTime;
use App\Transactions;
use App\withdrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\HomeController as UserHC;
use Excel;
use App\Exports\invs_withdraw_Export;
use App\Exports\invs_approvepayment_Export;
use App\Http\Controllers\tools\PseudoCryptController;

class INVSController extends Controller
{
    public function paymentData(Request $request)
    {

        if (isset($request->search)) {
            // dd($request);
            // $transaction = Transactions::whereIn('payment', ['wallet cancel', 'withdraw']);
            // $invs_all = invs::select('invs.*', 'transactions.status as tran_status', 'transactions.payment as tran_payment')
            $invs_all = invs::select('invs.*')
                ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
                ->leftJoin('users', 'invs.user_id', '=', 'users.id')
                // ->Join('transactions', function ($invs_all) {
                //     $invs_all->on('invs.inv_ref', '=', 'transactions.inv_ref')
                //         ->whereIn('transactions.payment', ['wallet cancel', 'withdraw']);
                // })
                ->orderBy('invs.updated_at', 'desc');

            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $invs_all = $invs_all->where('invs.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $invs_all = $invs_all->where('invs.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                        $invs_all = $invs_all->whereNotIn('invs.status', ['1', '0', '12', '13', '21', '99']);
                    } elseif ($val == '1') {
                        $invs_all = $invs_all->where('invs.status', '2');
                    } elseif ($val == '2') {
                        $invs_all = $invs_all->whereIn('invs.status', ['3', '4', '43']);
                    } elseif ($val == '3') {
                        $invs_all = $invs_all->whereIn('invs.status', ['5', '52', '53']);
                    } elseif ($val == '99') {
                        $invs_all = $invs_all->whereIn('invs.status', ['6', '99',]);
                    } else {
                        $invs_all = $invs_all->where('invs.status', $val);
                    }
                } elseif ($key == 'shop_name' and $val != '') {
                    $invs_all = $invs_all->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'invs' and $val != '') {
                    $invs_all = $invs_all->where('invs.inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $invs_all = $invs_all->where(DB::raw("CONCAT(name , ' ' , surname)"), 'like', '%' . $val . '%');
                } elseif ($key == 'wallet_address' and $val != '') {
                    $invs_all = $invs_all->where('users.wallet_address', 'like', '%' . $val . '%');
                }
            }
            // $invs_all = $invs_all->paginate(50)->appends(request()->query());;
            $invs_all = $invs_all->paginate(50)->appends(request()->query());;
            // dd($invs_all);
        } else {
            $invs_all = invs::whereNotIn('status', ['1', '0', '12', '13', '21', '99'])->orderByRaw('updated_at desc')->orderBy('shop_id', 'desc')->paginate(50);
            // dd($invs_all);
        }
        // dd($invs_all);
        $paymenttt = [];
        $payment = invs::orderBy('created_at', 'desc')->get();
        $invs_now = invs::whereIn('status', ['43', '53'])->orderByRaw('updated_at desc')->get();
        $invs_success = invs::where('status', '2')->orderByRaw('updated_at desc')->orderBy('shop_id', 'desc')->get();

        foreach ($invs_all as $key => $value) {
            $invs_all[$key]->user = $value->users->first();
            $invs_all[$key]->shop = $value->shops->first();
            $invs_all[$key]->log = $value->logs->first();
            $invs_all[$key]->shipping_details = $value->shipping_details->first();
            $invs_all[$key]->shops_user = User::where('id', $invs_all[$key]->shop->user_id)->first();
            if (isset($invs_all[$key]->log)) {
                $invs_all[$key]->approve_user = UsersAdmin::where('id', $invs_all[$key]->log->user_id)->first();
            }
            // $invs_all[$key]->approve_user = User::where('id', $invs_all[$key]->log->user_id)->first();
            $arr_pd[$value->id] = [];

            foreach ($value->inv_products as $key2 => $value2) {
                if (isset($value2['type']) && $value2['type'] == 'flashsale') {
                    $pussi = flash::where('id', $value2['product_id'])->first();
                    array_push($arr_pd[$value->id], $pussi);
                } else {
                    $pussi = Product::where('id', $value2['product_id'])->first();
                    array_push($arr_pd[$value->id], $pussi);
                }
            }
        }
        // dd($invs_all[0]);

        $arr = [];
        foreach ($payment as $pay) {
            foreach ($pay->inv_products as $pay1) {
                // dd($pay1);
                if ($paymenttt) {
                    $status = true;
                    foreach ($paymenttt as $value) {
                        if (($pay1['product_id'] == $value['product_id']) &&
                            $pay1['dis1'] == $value['dis1'] &&
                            $pay1['dis2'] == $value['dis2']
                        ) {
                            $status = false;
                        }
                    }
                    if ($status) {
                        array_push($paymenttt, $pay1);
                        array_push($arr, $pay1['product_id']);
                    }
                } else {
                    array_push($paymenttt, $pay1);
                    array_push($arr, $pay1['product_id']);
                }
            }
        }
        $product = Product::whereIn('id', $arr)->get();
        $data = ['arr', 'product', 'payment', 'paymenttt'];
        // dd($invs_all);
        if (isset($arr_pd)) {
            return view('dashboard.buy', compact($data, 'payment', 'invs_all', 'arr_pd'));
        } else {
            return view('dashboard.buy', compact($data, 'payment', 'invs_all'));
        }
    }

    public function ApprovePaymenExport(Request $request)
    {
        // dd($request);
        return Excel::download(new invs_approvepayment_Export($request), 'ยืนยันการโอนเงิน.xlsx');
    }

    public function WithdrawExport(Request $request)
    {
        // dd($request);
        return Excel::download(new invs_withdraw_Export($request), 'รายงานคำสั่งซื้อ.xlsx');
    }

    public function buynow_data(Request $request)
    {

        if (isset($request->search)) {
            $invs_now = invs::select('invs.*')
                ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
                ->leftJoin('users', 'invs.user_id', '=', 'users.id')
                ->orderBy('invs.created_at', 'desc');
            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $invs_now = $invs_now->where('invs.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $invs_now = $invs_now->where('invs.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    // dd($val);
                    if ($val == '0') {
                        $invs_now = $invs_now->whereIn('status', ['43', '53']);
                    } else {
                        $invs_now = $invs_now->where('invs.status', $val);
                        // dd($invs_now);
                    }
                } elseif ($key == 'shop_name' and $val != '') {
                    $invs_now = $invs_now->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'inv_ref' and $val != '') {
                    $invs_now = $invs_now->where('inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $invs_now = $invs_now->where(DB::raw("CONCAT(name , ' ' , surname)"), 'like', '%' . $val . '%');
                    // dd($val);
                }
            }
            $invs_now = $invs_now->paginate(50)->appends(request()->query());
            // $invs_now = $invs_now->toSql();
        } else {
            $invs_now = invs::whereIn('status', ['43', '53'])->orderByRaw('DATE(created_at) desc')->paginate(50);
        }

        // dd($invs_now);

        foreach ($invs_now as $key => $value) {
            $invs_now[$key]->user = $value->users->first();
            $invs_now[$key]->shop = $value->shops->first();
            $invs_now[$key]->log = $value->logs->first();
            $invs_now[$key]->shipping_details = $value->shipping_details->first();
            $invs_now[$key]->shops_user = User::where('id', $invs_now[$key]->shop->user_id)->first();
            if (isset($invs_now[$key]->log)) {
                $invs_now[$key]->approve_user = UsersAdmin::where('id', $invs_now[$key]->log->user_id)->first();
            }

            $arr_pd[$value->id] = [];

            foreach ($value->inv_products as $key2 => $value2) {
                if (isset($value2['type']) && $value2['type'] == 'flashsale') {
                    $pussi = flash::where('id', $value2['product_id'])->first();
                    array_push($arr_pd[$value->id], $pussi);
                } else {
                    $pussi = Product::where('id', $value2['product_id'])->first();
                    array_push($arr_pd[$value->id], $pussi);
                }
            }
        }
        if (isset($arr_pd)) {
            return view('dashboard.buy_now', compact('arr_pd', 'invs_now'));
        } else {
            return view('dashboard.buy_now', compact('invs_now'));
        }
    }

    public function Btn_chk_submit(Request $request)
    {
        $ip = UserHC::getUserIP();
        $user_id = Auth::guard('admin')->user()->id;
        $chk_order = log::where('type', 'admin_order')->where('parent_id', $request->inv_id)->get();
        $admin_detail = UsersAdmin::where('id', $user_id)->first();

        if ($request->checking == 1) {
            DB::table('logs')->insert(
                [
                    'type' => 'admin_order',
                    'parent_id' => $request->inv_id,
                    'user_id' => $user_id,
                    'ip' => $ip,
                    'note' => $admin_detail->name . ' แก้ไขรายงานคำสั่งซื้อ ' . $request->inv_id  . ' เป็นเช็คแล้ว',
                    'status' => '2',
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ]
            );
        } elseif ($request->checking == 2) {
            // $chk_order_del = log::where('type', 'admin_order')->where('parent_id', $request->inv_id)->delete();
            DB::table('logs')->insert(
                [
                    'type' => 'admin_order',
                    'parent_id' => $request->inv_id,
                    'user_id' => $user_id,
                    'ip' => $ip,
                    'note' => $admin_detail->name . ' แก้ไขรายงานคำสั่งซื้อ ' . $request->inv_id  . ' เป็นยังไม่เช็ค',
                    'status' => '0',
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ]
            );
        }


        return redirect()->back();
    }

    public function get_pd_now(Request $request)
    {
        $ip = UserHC::getUserIP();
        $user_id = Auth::guard('admin')->user()->id;
        $admin_detail = UsersAdmin::where('id', $user_id)->first();

        $invs = invs::where('id', $request->id)->first();

        $Gtotal = $invs->shipping_cost + $invs->total;
        $user_wallet = balance::where('user_id', $invs->user_id)->first();
        foreach ($invs->inv_products as $value2) {
            $pd_all[] = $value2;
            $pd_id[]      = $value2['product_id'];
            $pd_amoung[]  = $value2['amount'];
            $pd_option[]  = $value2['option1'];
            $pd_dis1[]  = $value2['dis1'];
        }


        foreach ($pd_all as $key => $val) {
            $get_pd = flash::where('id', $pd_id[$key])->first();

            $arrNew = $get_pd->product_option;
            $lengthDis2 = count($get_pd->product_option['dis2']);
            $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
            $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
            $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
            $in_stock = $get_pd->product_option['stock'][$stock_key];

            $sales = $get_pd->sales + $val['amount'];
            $arrNew['stock'][$stock_key] =  $in_stock - $val['amount'];
            flash::where('id', $pd_id[$key])->update([
                'product_option' => $arrNew,
                'sales' => $sales
            ]);
        }


        if ($user_wallet->credit >= $Gtotal) {
            DB::table('invs')->where('id', $request->id)->update(
                [
                    'status' => '53',
                    'updated_at' => new DateTime()
                ]
            );

            DB::table('logs')->insert(
                [
                    'type' => 'admin_order',
                    'parent_id' => $request->id,
                    'user_id' => $user_id,
                    'ip' => $ip,
                    'note' => $admin_detail->name . ' เปลี่ยนสถานะรายการ ' . $request->inv_id  . ' เป็นรับสินค้า',
                    'status' => '2',
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ]
            );

            DB::table('balances')->where('user_id', $invs->user_id)->update(
                [
                    'credit' => $user_wallet->credit - $Gtotal,
                    'updated_at' => new DateTime()
                ]
            );


            if ($invs->payment == "bank") {
                $payment =  "Banking";
            } elseif ($invs->payment == "mobilebanking") {
                $payment =  "QRCode";
            } elseif ($invs->payment == "cerdit") {
                $payment =  "Credit";
            } elseif ($invs->payment == "wallet") {
                $payment =  "MultiPay";
            } else {
                $payment =  "Other";
            }

            $sales_amount = new sales_amount();
            $sales_amount->shop_id = $invs->shop_id;
            $sales_amount->invs_id = $request->id;
            $sales_amount->type = $payment;
            $sales_amount->amount = $Gtotal;
            $sales_amount->status = "Withdrawable";
            $sales_amount->save();


            $transactions = new Transactions();
            $transactions->type = $payment;
            $transactions->user_id = $invs->user_id;
            $transactions->inv_ref = $invs->inv_ref;
            $transactions->total = $Gtotal;
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = $payment;
            $transactions->inv_id = [];
            $transactions->save();
            return redirect()->back();
        }

        return redirect()->back()->with('alert', 'จำนวน credit ไม่เพียงพอ');
    }


    public function get_pd_check(Request $request)
    {
        $ip = UserHC::getUserIP();
        $user_id = Auth::guard('admin')->user()->id;
        $admin_detail = UsersAdmin::where('id', $user_id)->first();

        if (!isset($request->id)) {
            return redirect()->back()->with('alert', 'กรุณาเลือกรายการที่จะทำการ');
        }

        foreach ($request->id as $value) {
            $invs = invs::where('id', $value)->first();
            $Gtotal = $invs->shipping_cost + $invs->total;
            $user_wallet = balance::where('user_id', $invs->user_id)->first();
            foreach ($invs->inv_products as $value2) {
                $pd_all[] = $value2;
                $pd_id[]      = $value2['product_id'];
                $pd_amoung[]  = $value2['amount'];
                $pd_option[]  = $value2['option1'];
                $pd_dis1[]  = $value2['dis1'];
            }


            foreach ($pd_all as $key => $val) {
                $get_pd = flash::where('id', $pd_id[$key])->first();


                $arrNew = $get_pd->product_option;
                $lengthDis2 = count($get_pd->product_option['dis2']);
                $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                $in_stock = $get_pd->product_option['stock'][$stock_key];

                $sales = $get_pd->sales + $val['amount'];
                $arrNew['stock'][$stock_key] =  $in_stock - $val['amount'];
                flash::where('id', $pd_id[$key])->update([
                    'product_option' => $arrNew,
                    'sales' => $sales
                ]);
            }
            // dd($user_wallet->credit >= $Gtotal);
            if ($user_wallet->credit >= $Gtotal) {
                DB::table('invs')->where('id', $value)->update(
                    [
                        'status' => '53',
                        'updated_at' => new DateTime()
                    ]
                );

                DB::table('logs')->insert(
                    [
                        'type' => 'admin_order',
                        'parent_id' => $value,
                        'user_id' => $user_id,
                        'ip' => $ip,
                        'note' => $admin_detail->name . ' เปลี่ยนสถานะรายการเป็นรับสินค้า',
                        'status' => '2',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ]
                );

                DB::table('balances')->where('user_id', $invs->user_id)->update(
                    [
                        'credit' => $user_wallet->credit - $Gtotal,
                        'updated_at' => new DateTime()
                    ]
                );


                if ($invs->payment == "bank") {
                    $payment =  "Banking";
                } elseif ($invs->payment == "mobilebanking") {
                    $payment =  "QRCode";
                } elseif ($invs->payment == "cerdit") {
                    $payment =  "Credit";
                } elseif ($invs->payment == "wallet") {
                    $payment =  "MultiPay";
                } else {
                    $payment =  "Other";
                }

                $sales_amount = new sales_amount();
                $sales_amount->shop_id = $invs->shop_id;
                $sales_amount->invs_id = $value;
                $sales_amount->type = $payment;
                $sales_amount->amount = $Gtotal;
                $sales_amount->status = "Withdrawable";
                $sales_amount->save();


                $transactions = new Transactions();
                $transactions->type = $payment;
                $transactions->user_id = $invs->user_id;
                $transactions->inv_ref = $invs->inv_ref;
                $transactions->total = $Gtotal;
                $transactions->point = 0;
                $transactions->coin = 0;
                $transactions->status = 2;
                $transactions->payment = $payment;
                $transactions->inv_id = [];
                $transactions->save();
            } else {
                return redirect()->back()->with('alert', 'จำนวน credit ไม่เพียงพอ');
            }
            unset($pd_all);
        }
        return redirect()->back();
    }

    // public function buyData()
    // {
    //     $payment = $this->__paymentData()['payment'];
    //     $product = $this->__paymentData()['product'];

    //     // dd($product);
    //     return view('dashboard.buy', compact('payment', 'product'));
    // }

    public function autoPpdateInvsStatus()
    {
        DB::beginTransaction();
        // $invs_status = DB::select('select * from invs WHERE id=369');
        $invs_status = DB::select('select * from invs WHERE status in (3,4) and DATEDIFF(now(), updated_at) >= 7');

        foreach ($invs_status as $update_status) {
            DB::update('update invs set status = 52 where id = ?', [$update_status->id]);

            if ($update_status->payment == "bank") {
                $payment =  " Banking";
            } elseif ($update_status->payment == "mobilebanking") {
                $payment =  "QRCode";
            } elseif ($update_status->payment == "cerdit") {
                $payment =  "Credit";
            } elseif ($update_status->payment == "wallet") {
                $payment =  "MultiPay";
            } elseif ($update_status->payment == "crypto") {
                $payment =  "Crypto";
            } else {
                $payment =  "Other";
            }

            $shop_user = DB::table('shops')
                ->where("id", $update_status->shop_id)
                ->first();

            $balance = DB::table('balances')
                ->where('user_id', $shop_user->user_id)
                ->first();

            $ref_user = DB::table('referal_users')
                ->where('user_id', $update_status->user_id)
                ->first();

            if ($update_status->uidmp != '' || $update_status->uidmp != null) {
                if($ref_user){
                    $branch_id = PseudoCryptController::unhash($ref_user->ref_code, 8);
    
                    $branch_shop = DB::table('shops')
                        ->where('user_id', $branch_id)
                        ->first();
    
                    $Gtotal = 0;
                    $inv_detail = json_decode($update_status->inv_products);
        
                    foreach ($inv_detail as $key => $value) {
                        if ($value->margin != '' || $value->margin != null) {
                            $margin = intval($value->margin);
                            $amount = intval($value->amount);
                            // dd($margin);
                            $Gtotal += ($margin * $amount);
                        } else {
                            $price = intval($value->price);
                            $amount = intval($value->amount);
                            // dd($margin);
                            $Gtotal += ($price * $amount);
                        }
                    }
                    if( $update_status->gp_rate > 0 ) {
                        $Gtotal = $update_status->shipping_cost + ($Gtotal* ((100-$update_status->gp_rate)/100) );
                    } else {
                        $Gtotal = $update_status->shipping_cost + $Gtotal;
                    }
                    
                    // dd($Gtotal);
                    $newCredit = $balance->seller_credit + $Gtotal;
                    // dd($payment);
    
                    $income = new branch_income;
                    $income->inv_id = $update_status->id;
                    $income->total = $Gtotal;
                    $income->bird_cost = $Gtotal*0.07;
                    $income->branch_cost = $Gtotal*0.03;
                    $income->branch_id = $branch_id;
    
                    $income->save();
    
                    $branch_balance = balance::where('user_id', $branch_id)->first();
    
                    DB::table('balances')->where('user_id', $branch_shop->user_id)
                        ->update([
                            'seller_credit' => $branch_balance->seller_credit+($Gtotal*0.03)
                        ]);
    
                    // if (!isset($branch_shop->bank_code) || !isset($branch_shop->bank_name) || !isset($branch_shop->bank_category) || !isset($branch_shop->bank_number)) {
                    //     $withdraw_branch = withdrow::create([
                    //         'user_id' => $branch_shop->user_id,
                    //         'shop_id' => $branch_shop->id,
                    //         'inv_id' => $request->invs_id,
                    //         'amount' => $invs->total*0.03,
                    //         'type' => $payment,
                    //         'status' => 0,
                    //         'bank_code' => $branch_shop->bank_code,
                    //         'bank_name' => $branch_shop->bank_name,
                    //         'bank_category' => $branch_shop->bank_category,
                    //         'bank_number' => strval($branch_shop->bank_number),
                    //         'income_type' => 'partner',
    
                    //     ]);
                    // } else {
                        $withdraw_branch = withdrow::create([
                            'user_id' => $branch_shop->user_id,
                            'shop_id' => $branch_shop->id,
                            'inv_id' => $update_status->id,
                            'amount' => $Gtotal*0.03,
                            'type' => $payment,
                            'status' => 0,
                            'bank_code' => $branch_shop->bank_code,
                            'bank_name' => $branch_shop->bank_name,
                            'bank_category' => $branch_shop->bank_category,
                            'bank_number' => strval($branch_shop->bank_number),
                            'income_type' => 'partner',
    
                        ]);
                    // }
                } else {
                    $Gtotal = 0;
                    $inv_detail = json_decode($update_status->inv_products);
        
                    foreach ($inv_detail as $key => $value) {
                        if ($value->margin != '' || $value->margin != null) {
                            $margin = intval($value->margin);
                            $amount = intval($value->amount);
                            // dd($margin);
                            $Gtotal += ($margin * $amount);
                        } else {
                            $price = intval($value->price);
                            $amount = intval($value->amount);
                            // dd($margin);
                            $Gtotal += ($price * $amount);
                        }
                    }
                    if( $update_status->gp_rate > 0 ) {
                        $Gtotal = $update_status->shipping_cost + ($Gtotal* ((100-$update_status->gp_rate)/100) );
                    } else {
                        $Gtotal = $update_status->shipping_cost + $Gtotal;
                    }
                    
                    // dd($Gtotal);
                    $newCredit = $balance->seller_credit + $Gtotal;
                    // dd($payment);
                    $income = new branch_income;
                    $income->inv_id = $update_status->id;
                    $income->total = $Gtotal;
                    $income->bird_cost = $Gtotal* ($update_status->gp_rate/100);
    
                    $income->save();
                }
            } else {
                if($ref_user){
                    $branch_id = PseudoCryptController::unhash($ref_user->ref_code, 8);
    
                    $branch_shop = DB::table('shops')
                        ->where('user_id', $branch_id)
                        ->first();
    
                    $Gtotal = $update_status->shipping_cost + ($update_status->total* ((100-$update_status->gp_rate)/100) );
    
                    $newCredit = $balance->seller_credit + $Gtotal;
                    // dd($payment);
    
                    $income = new branch_income;
                    $income->inv_id = $update_status->id;
                    $income->total = $update_status->total;
                    $income->bird_cost = $update_status->total*0.07;
                    $income->branch_cost = $update_status->total*0.03;
                    $income->branch_id = $branch_id;
    
                    $income->save();
    
                    $branch_balance = balance::where('user_id', $branch_id)->first();
    
                    DB::table('balances')->where('user_id', $branch_shop->user_id)
                        ->update([
                            'seller_credit' => $branch_balance->seller_credit+($update_status->total*0.03)
                        ]);
    
                    // if (!isset($branch_shop->bank_code) || !isset($branch_shop->bank_name) || !isset($branch_shop->bank_category) || !isset($branch_shop->bank_number)) {
                    //     $withdraw_branch = withdrow::create([
                    //         'user_id' => $branch_shop->user_id,
                    //         'shop_id' => $branch_shop->id,
                    //         'inv_id' => $request->invs_id,
                    //         'amount' => $invs->total*0.03,
                    //         'type' => $payment,
                    //         'status' => 0,
                    //         'bank_code' => $branch_shop->bank_code,
                    //         'bank_name' => $branch_shop->bank_name,
                    //         'bank_category' => $branch_shop->bank_category,
                    //         'bank_number' => strval($branch_shop->bank_number),
                    //         'income_type' => 'partner',
    
                    //     ]);
                    // } else {
                        $withdraw_branch = withdrow::create([
                            'user_id' => $branch_shop->user_id,
                            'shop_id' => $branch_shop->id,
                            'inv_id' => $update_status->id,
                            'amount' => $update_status->total*0.03,
                            'type' => $payment,
                            'status' => 0,
                            'bank_code' => $branch_shop->bank_code,
                            'bank_name' => $branch_shop->bank_name,
                            'bank_category' => $branch_shop->bank_category,
                            'bank_number' => strval($branch_shop->bank_number),
                            'income_type' => 'partner',
    
                        ]);
                    // }
                } else {
                    $Gtotal = $update_status->shipping_cost + ($update_status->total* ((100-$update_status->gp_rate)/100) );
    
                    $newCredit = $balance->seller_credit + $Gtotal;
                    // dd($payment);
                    $income = new branch_income;
                    $income->inv_id = $update_status->id;
                    $income->total = $update_status->total;
                    $income->bird_cost = $update_status->total* ($update_status->gp_rate/100);
    
                    $income->save();
                }
            }

            $findwithdrow = withdrow::where('inv_id',$update_status->id)
                                        ->where('user_id',$shop_user->user_id)
                                        ->where('shop_id',$update_status->shop_id)
                                        ->first();
            // echo '<pre>';
            // print_r($findwithdrow);
            // echo '</pre>'; exit;
            if(!$findwithdrow){
                if ($update_status->payment == "wallet") {
                    // dd($request->invs_id);
                    $withdraw = withdrow::create([
                        'user_id' => $shop_user->user_id,
                        'shop_id' => $update_status->shop_id,
                        'inv_id' => $update_status->id,
                        'amount' => $Gtotal,
                        'type' => $payment,
                        'status' => 0,
                        'bank_code' => $shop_user->bank_code,
                        'bank_name' => $shop_user->bank_name,
                        'bank_category' => $shop_user->bank_category,
                        'bank_number' => '"'.strval($shop_user->bank_number).'"',

                    ]);

                } else {
                    // if (!isset($shop_user->bank_code) || !isset($shop_user->bank_name) || !isset($shop_user->bank_category) || !isset($shop_user->bank_number)) {
                    //     $withdraw = withdrow::create([
                    //         'user_id' => $shop_user->user_id,
                    //         'shop_id' => $update_status->shop_id,
                    //         'inv_id' => $update_status->id,
                    //         'amount' => $Gtotal,
                    //         'type' => $payment,
                    //         'status' => 0,
                    //         'bank_code' => $shop_user->bank_code,
                    //         'bank_name' => $shop_user->bank_name,
                    //         'bank_category' => $shop_user->bank_category,
                    //         'bank_number' => '"'.strval($shop_user->bank_number).'"',

                    //     ]);

                    // } else {
                        $withdraw = withdrow::create([
                            'user_id' => $shop_user->user_id,
                            'shop_id' => $update_status->shop_id,
                            'inv_id' => $update_status->id,
                            'amount' => $Gtotal,
                            'type' => $payment,
                            'status' => 1,
                            'bank_code' => $shop_user->bank_code,
                            'bank_name' => $shop_user->bank_name,
                            'bank_category' => $shop_user->bank_category,
                            'bank_number' => '"'.strval($shop_user->bank_number).'"',

                        ]);
                    // }
                }

                // $sales_amount = new sales_amount();
                // $sales_amount->shop_id = $update_status->shop_id;
                // $sales_amount->invs_id = $update_status->id;
                // $sales_amount->type = $payment;
                // $sales_amount->amount = $Gtotal;
                // $sales_amount->status = "Withdrawable";
                // $sales_amount->save();

                // $check_shopid = DB::select('select user_id from balances where user_id = ?', [$update_status->shop_id]);

                // if (empty($check_shopid)) {

                //     DB::insert('insert into balances (user_id, seller_credit, created_at, updated_at) values (?, ?, now(), now())', [$update_status->shop_id, $update_status->total]);
                // } else {

                //     DB::update('update balances set seller_credit = seller_credit + ? where user_id = ?', [$update_status->total, $update_status->shop_id]);
                // }
                DB::table('balances')->where('user_id', $shop_user->user_id)
                    ->update([
                        'seller_credit' => $newCredit
                    ]);
            }

            if ($update_status->uidmp) {
                $data_array = array(
                    "inv_ref" => $update_status->inv_ref,
                    "inv_id" => $update_status->id,
                    "status" => 2,
                    "domain" => 'birdfresh',
                );
                $make_call = $this->callAPI('POST', 'https://dev.shopteeniimp.com/api/v1/update_order_success', json_encode($data_array));
                $response = json_decode($make_call, true);
            }
        }

        $invs_status = DB::select('select * from invs WHERE status in (1,13) and DATEDIFF(now(), updated_at) >= 7');
        foreach ($invs_status as $update_status) {
            DB::update('update invs set status = 99 where id = ?', [$update_status->id]);
        }
        DB::commit();
        
        return response([
            'update' => 'success'
        ]);
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

    public function test_autoPpdateInvsStatus() {
        DB::beginTransaction();
        $invs_status = DB::select('select * from invs WHERE id in (2933,2929,2874,2873,2872,2871,2870)');

        foreach ($invs_status as $update_status) {

            // DB::update('update invs set status = 52 where id = ?', [$update_status->id]);

            if ($update_status->payment == "bank") {
                $payment =  " Banking";
            } elseif ($update_status->payment == "mobilebanking") {
                $payment =  "QRCode";
            } elseif ($update_status->payment == "cerdit") {
                $payment =  "Credit";
            } elseif ($update_status->payment == "wallet") {
                $payment =  "MultiPay";
            } else {
                $payment =  "Other";
            }

            $shop_user = DB::table('shops')
                ->where("id", $update_status->shop_id)
                ->first();

            $balance = DB::table('balances')
                ->where('user_id', $shop_user->user_id)
                ->first();

            $ref_user = DB::table('referal_users')
                ->where('user_id', $update_status->user_id)
                ->first();
            
            if($ref_user){
                $branch_id = PseudoCryptController::unhash($ref_user->ref_code, 8);

                $branch_shop = DB::table('shops')
                    ->where('user_id', $branch_id)
                    ->first();

                $Gtotal = $update_status->shipping_cost + ($update_status->total*0.9);

                $newCredit = $balance->seller_credit + $Gtotal;
                // dd($payment);
                
                $income = new branch_income;
                $income->inv_id = $update_status->id;
                $income->total = $update_status->total;
                $income->bird_cost = $update_status->total*0.07;
                $income->branch_cost = $update_status->total*0.03;
                $income->branch_id = $branch_id;

                // $income->save();

                $branch_balance = balance::where('user_id', $branch_id)->first();

                // DB::table('balances')->where('user_id', $shop_user->user_id)
                //     ->update([
                //         'seller_credit' => $branch_balance->seller_credit+($update_status->total*0.03)
                //     ]);
                echo 'branch_balance->seller_credit= '.$branch_balance->seller_credit.'<hr>';

                if (!isset($branch_shop->bank_code) || !isset($branch_shop->bank_name) || !isset($branch_shop->bank_category) || !isset($branch_shop->bank_number)) {
                    exit;
                    $withdraw_branch = withdrow::create([
                        'user_id' => $branch_shop->user_id,
                        'shop_id' => $branch_shop->id,
                        'inv_id' => $update_status->id,
                        'amount' => $update_status->total*0.03,
                        'type' => $payment,
                        'status' => 0,
                        'bank_code' => $branch_shop->bank_code,
                        'bank_name' => $branch_shop->bank_name,
                        'bank_category' => $branch_shop->bank_category,
                        'bank_number' => strval($branch_shop->bank_number),
                        'income_type' => 'partner',
    
                    ]);
                } else {
                    echo 'branch_shop->bank_code= '.$branch_shop->bank_code.'<hr>';
                    exit;
                    $withdraw_branch = withdrow::create([
                        'user_id' => $branch_shop->user_id,
                        'shop_id' => $branch_shop->id,
                        'inv_id' => $update_status->id,
                        'amount' => $update_status->total*0.03,
                        'type' => $payment,
                        'status' => 1,
                        'bank_code' => $branch_shop->bank_code,
                        'bank_name' => $branch_shop->bank_name,
                        'bank_category' => $branch_shop->bank_category,
                        'bank_number' => strval($branch_shop->bank_number),
                        'income_type' => 'partner',
    
                    ]);
                }
            } else {
                $Gtotal = $update_status->shipping_cost + ($update_status->total*0.9);

                $newCredit = $balance->seller_credit + $Gtotal;
                // dd($payment);
                $income = new branch_income;
                $income->inv_id = $update_status->id;
                $income->total = $update_status->total;
                $income->bird_cost = $update_status->total*0.1;
                echo 'income->bird_cost= '.$income->bird_cost.'<hr>';
                // $income->save();
            }

            echo 'update_status->payment= '.$update_status->payment.'<hr>';
            if ($update_status->payment == "wallet") {
                // dd($request->invs_id);
                echo 'wallet - withdrow::create <hr>';
                // $withdraw = withdrow::create([
                //     'user_id' => $shop_user->user_id,
                //     'shop_id' => $update_status->shop_id,
                //     'inv_id' => $update_status->id,
                //     'amount' => $Gtotal,
                //     'type' => $payment,
                //     'status' => 0,
                //     'bank_code' => $shop_user->bank_code,
                //     'bank_name' => $shop_user->bank_name,
                //     'bank_category' => $shop_user->bank_category,
                //     'bank_number' => strval($shop_user->bank_number),

                // ]);

                // DB::table('balances')->where('user_id', $shop_user->user_id)
                //     ->update([
                //         'seller_credit' => $newCredit
                //     ]);
            } else {
                if (!isset($shop_user->bank_code) || !isset($shop_user->bank_name) || !isset($shop_user->bank_category) || !isset($shop_user->bank_number)) {
                    echo 'bank_code - withdrow::create <hr>';
                    // $withdraw = withdrow::create([
                    //     'user_id' => $shop_user->user_id,
                    //     'shop_id' => $update_status->shop_id,
                    //     'inv_id' => $update_status->id,
                    //     'amount' => $Gtotal,
                    //     'type' => $payment,
                    //     'status' => 0,
                    //     'bank_code' => $shop_user->bank_code,
                    //     'bank_name' => $shop_user->bank_name,
                    //     'bank_category' => $shop_user->bank_category,
                    //     'bank_number' => strval($shop_user->bank_number),

                    // ]);

                    // DB::table('balances')->where('user_id', $shop_user->user_id)
                    // ->update([
                    //     'seller_credit' => $newCredit
                    // ]);
                } else {
                    echo 'else - withdrow::create <hr>';
                    // $withdraw = withdrow::create([
                    //     'user_id' => $shop_user->user_id,
                    //     'shop_id' => $update_status->shop_id,
                    //     'inv_id' => $update_status->id,
                    //     'amount' => $Gtotal,
                    //     'type' => $payment,
                    //     'status' => 1,
                    //     'bank_code' => $shop_user->bank_code,
                    //     'bank_name' => $shop_user->bank_name,
                    //     'bank_category' => $shop_user->bank_category,
                    //     'bank_number' => strval($shop_user->bank_number),

                    // ]);
                }
            }

            // $sales_amount = new sales_amount();
            // $sales_amount->shop_id = $update_status->shop_id;
            // $sales_amount->invs_id = $update_status->id;
            // $sales_amount->type = $payment;
            // $sales_amount->amount = $Gtotal;
            // $sales_amount->status = "Withdrawable";
            // $sales_amount->save();

            // $check_shopid = DB::select('select user_id from balances where user_id = ?', [$update_status->shop_id]);

            // if (empty($check_shopid)) {

            //     DB::insert('insert into balances (user_id, seller_credit, created_at, updated_at) values (?, ?, now(), now())', [$update_status->shop_id, $update_status->total]);
            // } else {

            //     DB::update('update balances set seller_credit = seller_credit + ? where user_id = ?', [$update_status->total, $update_status->shop_id]);
            // }
            // DB::table('balances')->where('user_id', $shop_user->user_id)
            //     ->update([
            //         'seller_credit' => $newCredit
            //     ]);
        }
        DB::commit();
        
        // return response([

        //     'update' => 'success'
        // ]);
    }
}
