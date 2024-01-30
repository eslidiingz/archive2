<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mobilebanking;
use App\invs;
use App\User;
use App\Shops as shops;
use App\Address;
use App\Product;
use App\Transactions;
use App\invs_wallet;
use App\balance;
use App\PreOrder;
use App\flash;
use App\shipping_details;
use App\twoctwoppayment;
use App\Setting;
use App\Coupon;
use App\CouponInvs;
use App\Creditcard;
use App\Scbcreditcallback;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Image;
use Auth;
use Session;

class TwoCTwoPController extends Controller
{
    public function credit(Request $request, $inv_ref) {
        // dd($request);
        $a_wh_product = explode(',', $request->products);
        $a_wh_inv_no = explode(',', $request->inv_no);
        $shop_array = [];

        DB::beginTransaction();

        try {
            $invs = $basket_all =  invs::where('invs.user_id', Auth::user()->id)->where('invs.inv_ref', $inv_ref)->whereIn('invs.inv_no', $a_wh_inv_no)
                ->join('shops','shops.id','invs.shop_id')
                ->join('users','users.id','shops.user_id')
                ->where(function ($query) use ($a_wh_product) {
                    foreach ($a_wh_product as $key => $val) {
                        $query->orWhere(DB::raw("JSON_CONTAINS( JSON_EXTRACT(inv_products, '$[*].product_id'), '[\"".$val."\"]' )"), '=', '1');
                    }
                    return $query;
                })
                ->select('invs.*','users.phone','users.email')
                ->orderBy('invs.updated_at', 'DESC')->get();
            // echo $invs[0]->phone; exit;
            $gtotal = $basket_all->sum('shipping_cost') + $basket_all->sum('total');
            
            $payment_description = [];
            // $invs = invs::where('inv_ref', $inv_ref)->get();
            foreach ($invs as $inv) {
                $pro_id = [];
                // $total += $inv->total;
                foreach ($inv->inv_products as $keypro => $inv_product) {
                    if ($inv->inv_products[$keypro]['type'] == 'pre_order') {

                        array_push($pro_id, $inv_product['product_id']);
                        $product = PreOrder::whereIn('id', $pro_id)->get();
                        foreach ($product as $pro) {
                            if (!in_array($pro->name, $payment_description)) {
                                array_push($payment_description, $pro->name);
                            }
                        }
                    } else  if ($inv->inv_products[$keypro]['type'] == 'flashsale') {

                        array_push($pro_id, $inv_product['product_id']);
                        $product = flash::whereIn('id', $pro_id)->get();
                        foreach ($product as $pro) {
                            if (!in_array($pro->name, $payment_description)) {
                                array_push($payment_description, $pro->name);
                            }
                        }
                    } else  if ($inv->inv_products[$keypro]['type'] == null) {

                        array_push($pro_id, $inv_product['product_id']);
                        $product = Product::whereIn('id', $pro_id)->get();
                        foreach ($product as $pro) {
                            if (!in_array($pro->name, $payment_description)) {
                                array_push($payment_description, $pro->name);
                            }
                        }
                    }
                }
            }
            // dd($invs);

            //สิ่งที่เพิ่มเข้ามา เพื่ออัพเดทข้อมูล เจมส์ทำเอง
            $address = Address::where('id', $request->address)->get();
            $sort_address = ([
                "name" => $address[0]->name . ' ' . $address[0]->surname,
                "tel" => $address[0]->tel,
                "address" => $address[0]->address1 . ' ' . $address[0]->address2 . ' ' . $address[0]->county . ' ' . $address[0]->district . ' ' . $address[0]->city . ' ' . $address[0]->zipcode . ' ' . $address[0]->country
            ]);

            $invs = invs::where('inv_ref', $inv_ref)->get();
            foreach ($invs as $inv) {
                // dd($inv->shop_id);
                if (!in_array($inv->shop_id, $shop_array)) {
                    array_push($shop_array, $inv->shop_id);
                }
            }
            // dd($shop_array);
            $shipping = explode(',', $request['shipping']);
            // dd($shipping);
            $shop_id = explode(',', $request['shop']);

            foreach ($shipping as $key => $ship) {
                // dd($shipping);
                // if (dd(array_reverse($shop_array[$key])) == $shop_id[$key]) {
                $test = invs::where('inv_ref', $request->inv_ref)->where('shop_id', $shop_array[$key])->update([
                    'shipping_id' => $ship,
                    'address' => [$sort_address],
                    'updated_at' => new DateTime()
                ]);
            }

            $a_inv_no = explode(',', $request->inv_no);

            $o_setting = Setting::where('id', '=', '1')->first();

            $time = new DateTime();
            
            $i_disc_product = $i_disc_ship = $i_total_disc = 0; $s_disc_to = $i_coupon_id = '';

            if( $request->coupon_code != '' ) {
                $o_coupon =  Coupon::where('code', strtoupper($request->coupon_code) )
                        ->where('remain_amt', '>', 0)->where('min_buy', '<', $basket_all->sum('total') )
                        ->whereRaw('(CASE `cust_type` WHEN \'NEW\' THEN (!exists( SELECT * FROM invs WHERE user_id = \''.Auth::user()->id.'\' AND status IN (2,3,4,43,5,52,53,54,7) ) ) ELSE TRUE END) ')
                        ->where('start_dt', '<=', $time->format('Y-m-d H:i:s'))->where('end_dt', '>=', $time->format('Y-m-d H:i:s') )->first();

                if( $o_coupon === null ) {
                    return redirect()->back()->with('messageError', trans('message.warn_coupon_ran_out') );
                }
                $s_disc_to = $o_coupon->disc_to;
                $i_coupon_id = $o_coupon->coupon_id;
                if( $o_coupon->disc_to == 'PRODUCT' ) {
                    if( $o_coupon->disc_type == 'PERCENT' ) {
                        $i_disc_product = ( $basket_all->sum('total') * $o_coupon->disc_percent ) / 100;
                        if( $i_disc_product > $o_coupon->disc_amt ) {
                            $i_disc_product = $o_coupon->disc_amt;
                        }
                    } else {
                        $i_disc_product = $o_coupon->disc_amt;
                    }
                } elseif( $o_coupon->disc_to == 'SHIP' ) {
                    $i_disc_ship = $o_coupon->disc_amt;
                }
                $i_total_disc = $i_disc_product + $i_disc_ship;
            }
            foreach ($a_inv_no as $key => $v_inv_no) {
                $a_invs = invs::where('inv_ref', $request->inv_ref)->where('inv_no', $v_inv_no)->first();
                $i_inv_disc = 0;
                if( $s_disc_to == 'PRODUCT' ) {
                    $i_inv_disc = ($a_invs->total / $basket_all->sum('total')) * $i_disc_product;
                }
                if( $s_disc_to == 'SHIP' ) {
                    $i_inv_disc = ($a_invs->shipping_cost / $basket_all->sum('shipping_cost')) * $i_disc_amt;
                }

                invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)->where('inv_no', $v_inv_no)->update([
                    'payment' => 'credit',
                    'status' => '1',
                    'gp_rate' => $o_setting->gp_rate,
                    'coupon_id' => $i_coupon_id,
                    'coupon_code' => strtoupper($request->coupon_code),
                    'coupon_at' => new DateTime(),
                    'disc_to' => $s_disc_to,
                    'disc_amt' => $i_inv_disc,
                    'updated_at' => new DateTime()
                ]);
            }
            
            if( $request->coupon_code != '' ) {
                $i_chk_coupon_invs = CouponInvs::where('coupon_code', $request->coupon_code)->where('inv_ref', $request->inv_ref)->whereIn('inv_no', $a_inv_no)
                    ->distinct()->count('inv_ref');
                $i_dis = 0;
                if( $i_chk_coupon_invs == 0 ) {
                    $i_dis = 1;
                    CouponInvs::create([
                        'inv_ref' => $request->inv_ref,
                        'inv_no' => $request->inv_no,
                        'coupon_code' => strtoupper( $request->coupon_code ),
                        'created_by' => Auth::user()->id,
                        'created_at' => new DateTime()
                    ]);
                }
                Coupon::where('coupon_id', $o_coupon->coupon_id)->update([
                        'remain_amt'  =>  $o_coupon->remain_amt - $i_dis,
                        'updated_at' => new DateTime()
                ]);
            }

            // dd(env('SCB_APP_REQUEST_TOKEN_URL'));
            $grandtotal = $total = number_format($gtotal - $i_total_disc, 2, '.', '');

            $creditcard = new Creditcard();
            $creditcard->user_id = Auth::user()->id;
            $creditcard->inv_ref = $request->inv_ref;
            $creditcard->inv_no = $request->inv_no;
            $creditcard->status = 0;
            $creditcard->amount = $total;
            $creditcard->note = 'Cannabis payment';
            $creditcard->save();

            $ref_id = "CNBMTP".sprintf("%05d",$creditcard->id);

            // $data["total_price"] = $grandtotal;
            // $data["payment_url"] = $payment_url;
            // $data["version"] = $version;
            // $data["merchant_id"] = $merchant_id;
            // $data["currency"] = $currency;
            // $data["result_url_1"] = $result_url_1;
            // $data["hash_value"] = $hash_data;
            // $data["payment_description"] = $payment_description[0];
            // $data["order_id"] = $order_id;
            // $data["amount"] = $amount;
// dd($data);
            $ref_id = "CNBMTP".sprintf("%05d",$invs[0]->id);
            
            $o_sub_inv_ref = (object) [
                'shop_tel' => $basket_all[0]->phone,
                'sub_inv_ref' => 'A',
                'amt' => $grandtotal+0,
                'system_name' => 'CNB'
                ];
            $o_url = $this->get2C2PCreditLinkMultipay($address[0]->tel,
                $grandtotal+0,
                $payment_description[0],
                'CNB', 
                $ref_id, 
                'CNB',
                'staging.market.siamcannabis@gmail.com',
                $o_sub_inv_ref
            );

            $creditcard = Creditcard::find($creditcard->id);
            $creditcard->invoice = $ref_id;
            $creditcard->save();
            
            DB::commit();
            return redirect()->away($o_url->result->link_data->webPaymentUrl);
// exit;
            // return view('pages.product-payment-credit-2c2p', $data);
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;

            return redirect()->back()->with('messageError', trans('message.warn_something_went_wrong') );
        }
    }
    public function get2C2PCreditLinkMultipay($cust_tel = null, $amt = null, $desc = null, $system_name = null, $inv_ref = null, $name = null, $email = null, $sub_inv_ref_list = null) {
        // dd($amount);
        $headers = [
            'Content-Type' => 'application/json',
            ];
        $sub_inv_ref = [
                'Content-Type' => 'application/json',
                ];
        $a_body = [
            "tel" => $cust_tel,
            "amt" => $amt,
            "description" => $desc,
            "system_name" => $system_name,
            "inv_ref" => $inv_ref,
            "name" => $name,
            "email" => $email,
            "sub_inv_ref_list" => [$sub_inv_ref_list]
        ];
        // dd($a_body);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('MULTIPAY_APP_CREATE_CREDIT_URL'), [
            'headers' => $headers,
            'json' => $a_body
        ]);

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());

        return ($http_status_code == 200)? $contents:'';
    }
    
    public function Response2c2pCredit(Request $request) {
        // $request = 'POST /api/v1/invs/paymentCreditDebitCallback HTTP/1.1 Accept:            */* Accept-Encoding:   gzip,deflate Accept-Language:   EN Content-Length:    729 Content-Type:      application/json Host:              shopteenii.com User-Agent:        node-fetch/1.0 (+https://github.com/bitinn/node-fetch) X-Forwarded-For:   159.89.204.80 X-Forwarded-Host:  shopteenii.com X-Forwarded-Proto: https  {"error":"0","pay_type":"CREDIT","msg":"ชำระสำเร็จแล้ว","data":{"cardNo":"540432XXXXXX8190","cardToken":"","loyaltyPoints":null,"merchantID":"014011000036411","invoiceNo":"STNMTP00886STNV4","amount":1.03,"monthlyPayment":null,"userDefined1":"","userDefined2":"","userDefined3":"","userDefined4":"","userDefined5":"","currencyCode":"THB","recurringUniqueID":"","tranRef":"180392845","referenceNo":"148519061","approvalCode":"796782","eci":"02","transactionDateTime":"20220801172922","agentCode":"SCB","channelCode":"MA","issuerCountry":"TH","issuerBank":"CITIBANK NATIONAL ASSOCIATION","installmentMerchantAbsorbRate":null,"cardType":"CREDIT","idempotencyID":"","paymentScheme":"MA","respCode":"0000"}}';

        $s_header = preg_replace('~\{(?:[^{}]|(?R))*\}~', '', $request);
        $s_body = str_replace($s_header, '', $request);

        $o_body = json_decode($s_body);

        $o_creditcard = new Scbcreditcallback();
        $o_creditcard->data = $request;
        $o_creditcard->save();

        // dd($transectionlog);

        if( $o_body->error == '0' && ( $o_body->msg == 'ชำระสำเร็จแล้ว' || $o_body->msg == 'success' ) ) {
            $s_invoice = substr($o_body->data->invoiceNo, 0, 11);

            $creditcard = Creditcard::where('invoice',$s_invoice)->first();

            $s_invoice = substr($o_body->data->invoiceNo, 0, 11);

            $creditcard = Creditcard::where('invoice',$s_invoice)->first();

            $a_inv_no = explode(',', $creditcard->inv_no);
            $invs = invs::where('inv_ref',$creditcard->inv_ref)->whereIn('inv_no', $a_inv_no)->get();
            
            $grandtotal = 0;
            $ids = [];

            foreach( $invs as $k_inv => $v_inv ) {
                $v_inv->status = 2;
                $v_inv->save();

                array_push($ids, $v_inv->id);

                foreach ($v_inv->inv_products as $value2) {
                    $pd_all[] = $value2;
                    $pd_id[]      = $value2['product_id'];
                    $pd_amoung[]  = $value2['amount'];
                    $pd_option[]  = $value2['option1'];
                    $pd_dis1[]  = $value2['dis1'];
                }
                foreach ($pd_all as $key => $val) {
                    $get_pd = Product::where('id', $pd_id[$key])->first();
                    $arrNew = $get_pd->product_option;
                    $lengthDis2 = count($get_pd->product_option['dis2']);
                    $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                    $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                    $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                    $in_stock = $get_pd->product_option['stock'][$stock_key];

                    $sales = $get_pd->sales + $val['amount'];
                    $arrNew['stock'][$stock_key] =  $in_stock - $val['amount'];
                    Product::where('id', $pd_id[$key])->update([
                        'product_option' => $arrNew,
                        'sales' => $sales
                    ]);
                }
            }
            $grandtotal = $invs->sum('total') + $invs->sum('shipping_cost');

            $transactions = new Transactions();
            $transactions->type = 'credit';
            $transactions->user_id = $invs[0]->user_id;
            $transactions->inv_ref = $invs[0]->inv_ref;
            $transactions->total = $grandtotal;
            $transactions->point = 0;
            $transactions->coin = 0;
            $transactions->status = 2;
            $transactions->payment = 'credit';
            $transactions->inv_id = array("id"=> $ids);
            $transactions->save();

        }
        // return redirect('/profile_my_sale');
        Session::save();
                        header("Location: ".url()->to(route('profile_my_sale')));
                        exit();
    }

    public function buyWallettctp(Request $request){

        // dd($request);
    try {

        // dd($request);
        $inv_ref = 'wallet'.date('YmdHisu').auth()->user()->id;
        $insert = invs_wallet::insertGetId([
            'user_id' => auth()->user()->id,
            'inv_ref' => $inv_ref,
            'payment' => $request->type,
            'total' => $request->wallet,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if($insert){

            $merchant_id = env('2C2P_MERCHANT_ID');			//Get MerchantID when opening account with 2C2P
            $secret_key = env('2C2P_SECRET_KEY');	//Get SecretKey from 2C2P PGW Dashboard
            $order_id  = $inv_ref;
            $currency = "764";


            $gtotal = $request->wallet;
            // dd($gtotal);
            $ntotal = number_format($gtotal, 2, '', '');
            $revertamount = mb_strlen((string)$ntotal);
            if ($revertamount < 12) {
                $amount = str_pad($ntotal, 12, "0", STR_PAD_LEFT);
            }

            // $totalb = str_replace('.', '', $totala);
            // $total = str_replace(',', '', $totalb);
            // dd($total);
            $version = env('2C2P_VERSION');
            $payment_url = env('2C2P_URL');
            $result_url_1 = env('2C2P_RESULT_URL_1');

            $payment_description = "Multi Pay Wallet Payment";
        

            $params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
            $hash_data = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value

            $data['inv'] = invs_wallet::where('id',$insert)->first();
            $data["hash_value"] = $hash_data;
            $data["payment_description"] = $payment_description;
            $data["order_id"] = $order_id;
            $data["amount"] = $amount;


            // $data['inv'] = invs_wallet::where('id',$insert)->first();
            // $total = number_format($request->wallet, 2, '', '');
            // $data['trade_mony'] = $total;
            // $user = user::where('id',auth()->user()->id)->first();
            // $data['order_first_name'] = $user->name;
            // $data['order_email'] =$user->email;
            // $pay_type = 'PACA';
            // $secure_key = env('TREEPAY_SECURE_KEY');
            // $site_cd = env('TREEPAY_SITE_CD');
            // $hash_string  = $pay_type . $inv_ref . $total . $site_cd . $secure_key . $user->id;
            // $hash_data = hash('sha256', $hash_string);
            // $data['pay_type'] = $pay_type;
            // $data['site_cd'] = $site_cd;
            // $data['hash_data'] = $hash_data;
            
            return response()->json($data);
        }
    } catch (\Exception $exception) {
        return response()->json($exception->getMessage());
        // echo 'error insert';
    }
    
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
