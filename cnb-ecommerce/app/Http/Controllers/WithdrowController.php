<?php

namespace App\Http\Controllers;

use App\withdrow;
use App\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class WithdrowController extends Controller
{
    public function withDraw(Request $request)
    {
        try{
            $sale_id = explode(',', $request->sale_id);
            $invs = explode(',', $request->inv);
            $price = explode(',', $request->price);
            // dd($sale_id);
            $checkCredit = DB::table('balances')
                ->select('seller_credit','credit')->where('user_id', Auth::user()->id)->first();
            $checkInvs = DB::table('invs')
                ->whereIn('inv_ref', $invs)
                ->where('shop_id', $request->shop)
                ->orderBy('id', 'desc')->get();

            // dd($checkInvs);
            if ($checkCredit->seller_credit < $request->balance) {
                return redirect()->back()->with('error', 'ยอดเงินคงเหลือไม่พอ');
            }
            // echo '<pre>';
            // print_r($invs);
            // echo '</pre>'; exit;
            foreach ($checkInvs as $value) {
                if($value->uidmp != null || $value->uidmp != ''){
                    foreach ($invs as $key => $item) {
                        if ($value->inv_ref == $item) {
                            $margin_sum = 0;
                            foreach(json_decode($value->inv_products) as $inv_val){
                                if(isset($inv_val->margin) || $inv_val->margin != ''){
                                    $margin_sum += ( ( $inv_val->margin * 0.9) * $inv_val->amount);
                                }
                                else{
                                    $margin_sum += ($inv_val->price * $inv_val->amount);
                                }
                            }
                            $total_margin = $margin_sum + $value->shipping_cost;
                            if ( bccomp( $total_margin , $price[$key] ,2 ) != 0 ) {
                                return redirect()->back()->with('error', 'การถอนเงินมีข้อผิดพลาด');
                            }
                        }
                    }
                } else {
                    foreach ($invs as $key => $item) {
                        if ($value->inv_ref == $item) {
                            $total_check = 0;
                            $total_check = ($value->total* ((100-$value->gp_rate)/100) ) + $value->shipping_cost;
                            
                            if ( bccomp( $total_check , $price[$key] ,2 ) != 0 ) {
                                return redirect()->back()->with('error', 'การถอนเงินมีข้อผิดพลาด');
                            }
                        }
                    }
                }
            }
            $datas = DB::table('shops')
                ->select('id AS shop_id', 'bank_code', 'bank_name', 'bank_category', 'bank_number')
                ->where('user_id', Auth::user()->id)
                ->first();
            if ($request->type_withdraw == 1) {
                $i_today_day = date('d');
                // echo $i_today_day; exit;
                $o_setting = Setting::first();
                // $o_setting->account_day = 25;
                // echo $o_setting->account_day; exit;
                if( $o_setting->account_day > $i_today_day ) {
                    $s_account_date = date('Y-m-d', strtotime('this month', strtotime(date('Y-m-').$o_setting->account_day)));
                } else {
                    $s_account_date = date('Y-m-d', strtotime('next month', strtotime(date('Y-m-').$o_setting->account_day)));
                }
                // echo $s_account_date; exit;

                foreach($sale_id as $value){
                    $data_update = withdrow::where('id', $value)->first();
                    
                    $results = Withdrow::where('id', $value)->update([
                        'status' => 1,
                        'bank_code' => $datas->bank_code,
                        'bank_name' => $datas->bank_name,
                        'bank_category' => $datas->bank_category,
                        'bank_number' => '"'.strval($datas->bank_number).'"',
                        'account_date' => $s_account_date,
                    ]);
                    
                }
                // $new_seller_credit = $checkCredit->seller_credit - $request->balance;
                // $seller_credit_update = DB::table('balances')
                //     ->where('user_id', Auth::user()->id)
                //     ->update(['seller_credit' => $new_seller_credit]);
            } else if ($request->type_withdraw == 2) {
                $results = Withdrow::whereIn('id', $sale_id)->update([
                    'status' => 2
                ]);

                $new_seller_credit = $checkCredit->seller_credit - $request->balance;
                $new_credit = $checkCredit->credit + $request->balance;
                $seller_credit_update = DB::table('balances')
                    ->where('user_id', Auth::user()->id)
                    ->update([
                        'seller_credit' => $new_seller_credit,
                        'credit'        => $new_credit
                    ]);
            }

            return redirect(route('seller-wallet'))->with('success', 'สำเร็จ');
        }catch(Exception $e){
            dd($e->getMessage());
            // return redirect()->back()->with('error', 'การถอนเงินมีข้อผิดพลาด');
        }
    }

    public function getUserBank()
    {

        $datas = DB::table('shops')
            ->select('id AS shop_id', 'bank_code', 'bank_name', 'bank_category', 'bank_number')
            ->where('user_id', Auth::user()->id)
            ->get();
        if ($datas[0]->bank_code != null && $datas[0]->bank_number != null) {
            $status = 1;
        } else {
            $status = 2;
        }

        return $status;
    }

    public function withdraw_recommend(Request $request){
        // dd($request->all());

        try{
            $checkCredit = DB::table('balances')
                ->select('seller_credit','credit')->where('user_id', Auth::user()->id)->first();

            // dd($checkCredit);
            if ($checkCredit->seller_credit < $request->balance) {
                return redirect()->back()->with('error', 'ยอดเงินคงเหลือไม่พอ');
            }

            $withdraw = withdrow::where('user_id', Auth::user()->id)->where('status', 0)->get();
            $total_withdraw = 0;
            foreach($withdraw as $val){
                $total_withdraw += $val->amount;
            }

            if($total_withdraw != $request->balance){
                return redirect()->back()->with('error', 'ยอดเงินไม่ถูกต้อง');
            }
            else{
                $datas = DB::table('shops')
                ->select('id AS shop_id', 'bank_code', 'bank_name', 'bank_category', 'bank_number')
                ->where('user_id', Auth::user()->id)
                ->first();

                $withdraw = withdrow::where('user_id', Auth::user()->id)->where('status', 0)->update([
                    'status' => 1,
                    'bank_code' => $datas->bank_code,
                    'bank_name' => $datas->bank_name,
                    'bank_category' => $datas->bank_category,
                    'bank_number' => strval($datas->bank_number),
                ]);
            }

            return redirect()->back()->with('success', 'สำเร็จ');
        }catch(Exception $e){
            dd($e->getMessage());
            // return redirect()->back()->with('error', 'การถอนเงินมีข้อผิดพลาด');
        }
    }
}
