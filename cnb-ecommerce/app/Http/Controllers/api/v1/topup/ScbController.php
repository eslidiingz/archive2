<?php

namespace App\Http\Controllers\api\v1\topup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logmobiletopup;
use App\Mobiletopup;
use App\Scbqrcallback;
// use App\Transaction;
// use App\Balance;
// use App\Qrpayment;
use App\logpayment;
// use App\Merchant;
use App\Logqrpayment;
use Validator;
use Auth;
use \Milon\Barcode\DNS2D;

use App\invs;
use App\Shops as shops;
use App\Product;
use App\Transactions;
use App\balance;
use App\invs_wallet;
use DB;
use App\Mobilebanking;
use App\User;
use DateTime;

class ScbController extends Controller
{
    public function callback(Request $request)
    {
        $o_scb_callback = new Scbqrcallback();
        $o_scb_callback->data = $request;
        $o_scb_callback->save();

        $logmobiletopup = new Logmobiletopup();
        $logmobiletopup->payeeProxyId = $request->payeeProxyId;
        $logmobiletopup->payeeProxyType = $request->payeeProxyType;
        $logmobiletopup->payeeAccountNumber = $request->payeeAccountNumber;
        $logmobiletopup->payeeName = $request->payeeName;
        $logmobiletopup->payerProxyId = $request->payerProxyId;
        $logmobiletopup->payerProxyType = $request->payerProxyType;
        $logmobiletopup->payerAccountNumber = $request->payerAccountNumber;
        $logmobiletopup->payerName = $request->payerName;
        $logmobiletopup->sendingBankCode = $request->sendingBankCode;
        $logmobiletopup->receivingBankCode = $request->receivingBankCode;
        $logmobiletopup->amount = $request->amount;
        $logmobiletopup->channelCode = $request->channelCode;
        $logmobiletopup->transactionId = $request->transactionId;
        $logmobiletopup->transactionDateandTime = $request->transactionDateandTime;
        $logmobiletopup->billPaymentRef1 = $request->billPaymentRef1;
        $logmobiletopup->billPaymentRef2 = $request->billPaymentRef2;
        $logmobiletopup->billPaymentRef3 = $request->billPaymentRef3;
        $logmobiletopup->currencyCode = $request->currencyCode;
        $logmobiletopup->transactionType = $request->transactionType;
        $logmobiletopup->save();

        $mobilebanking = Mobilebanking::where('invoice', $request->billPaymentRef1);

        if(! $mobilebanking->get()->first()) {
            return response()->json('Not found !', 200);
        }
        
        $mobilebanking = $mobilebanking->first();
        $mobilebanking->status = 1;
        $mobilebanking->save();

        $ids = [];

        if(strpos($mobilebanking->inv_ref,'wallet')!== false){

            invs_wallet::where('inv_ref', $mobilebanking->inv_ref)->update([
                'status' => 2,
            ]);
            
            $invswallet =  invs_wallet::where('inv_ref', $mobilebanking->inv_ref)->first();
            // dd($invswallet);
            $getcredit =  balance::where('user_id', $invswallet->user_id)->first();
            // dd($getcredit);

            $newcredit = $getcredit->credit +  $invswallet->total ;

            balance::where('user_id', $invswallet->user_id)->update([
                'credit' => $newcredit,
            ]);
            array_push($ids, $invswallet->id);
            
            $transactions = new Transactions();
            $transactions->type = 'wallet QR';
            $transactions->user_id = $invswallet->user_id;
            $transactions->inv_ref = $invswallet->inv_ref;
            $transactions->total = $invswallet->total;
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = 'wallet QR';
            $transactions->inv_id = array("id"=> $ids);
            $transactions->save();
        
        } else {

            $basket_all =  invs::where('inv_ref', $mobilebanking->inv_ref)->where('inv_no', $mobilebanking->inv_no)->get();

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

            foreach ($basket_all as $value) {
                $value->status = 2;
                $value->save();
                array_push($ids, $value->id);

                $invs = invs::where('id', $value->id)->first();
                foreach ($invs->inv_products as $value) {
                    $pd_all[] = $value;
                    $pd_id[]      = $value['product_id'];
                    $pd_amoung[]  = $value['amount'];
                    $pd_option[]  = $value['option1'];
                    $pd_dis1[]  = $value['dis1'];
                }

                $inv = $basket_all->first();
                $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');
                foreach ($pd_all as $key => $val) {
                    $get_pd = Product::where('id', $pd_id[$key])->first();
                    $arrNew = $get_pd->product_option;
                    $lengthDis2 = count($get_pd->product_option['dis2']);
                    $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                    $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                    $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                    $in_stock = $get_pd->product_option['stock'][$stock_key];

                    $sales = $get_pd->sales + $val['amount'];
                    // dd($sales);
                    
                    $arrNew['stock'][$stock_key] =  $in_stock - $val['amount'];
                    Product::where('id', $pd_id[$key])->update([
                        'product_option' => $arrNew,
                        'sales' => $sales
                    ]);
                }
            }

            $inv = $basket_all->first();
            $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');
    

            $transactions = new Transactions();
            $transactions->type = 'mobile banking';
            $transactions->user_id = $inv->user_id;
            $transactions->inv_ref = $inv->inv_ref;
            $transactions->inv_no = $inv->inv_no;
            $transactions->total = $grandtotal;
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = 'mobile banking';
            $transactions->inv_id = array("id"=> $ids);
            $transactions->save();
        }
        // return response()->json('Not found !', 200);
        return response()->json([
            'resCode' => '00',
            'resDesc' => 'success',
            'transactionId' => $request->transactionId
            ], 200);
    }


    public function viewmobilebanking($invoice = null)
    {

        $mobiletopup = Mobiletopup::Where('invoice',  $invoice)->get()->first();
        $createtime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mobiletopup->created_at)->format('Y-m-d H:i:s');
        return response()->json([
            'data' => array(
                'ref1' => $mobiletopup->ref1, 
                'rawQrCode' => $mobiletopup->rawQrCode,
                'amount' => $mobiletopup->amount,
                'note' => $mobiletopup->note,
                'created_at' => $createtime,
                ) ,
            'status' => array('code' => 200 ,  "description" => "success") 
        ],200);  
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
}
