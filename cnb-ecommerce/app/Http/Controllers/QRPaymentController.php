<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\Logmobiletopup;
use App\invs;
use DateTime;
use App\Mobilebanking;
use App\Scbqrcallback;
use Auth;
use App\Payment;
use App\Paymenttype;
use App\Address;
use App\invs_wallet;
use App\Setting;
use App\Coupon;
use App\CouponInvs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QRPaymentController extends Controller
{

    public function getQrcode($accessToken = null, $qrType = null, $ppType, $ppId = null, $amount = null, $ref_id = null, $ref1 = null, $ref2 = null, $ref3 = null)
    {
        // dd($amount);
        $headers = [
            'Content-Type' => 'application/json',
            'authorization' => 'Bearer ' . $accessToken,
            'requestUId' => 'Multi Pay Api v1',
            'resourceOwnerId' => env('SCB_APPLICATIONKEY'),
            'accept-language' => 'EN',
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('SCB_APP_CREATE_QR30_URL'), [
            'headers' => $headers,
            'json' => [
                "qrType" => $qrType,
                "ppType" => $ppType,
                "ppId" => $ppId,
                "amount" => $amount,
                "ref1" => $ref1,
                "ref2" => $ref2,
                "ref3" => $ref3,

            ]
        ]);

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());

        return ($http_status_code == 200) ? $contents : '';
    }
    public function getQrcodeMultipay($cust_tel = null, $amt = null, $system_name = null, $inv_ref = null, $name = null, $email = null, $sub_inv_ref_list = null) {
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
            "system_name" => $system_name,
            "inv_ref" => $inv_ref,
            "name" => $name,
            "email" => $email,
            "sub_inv_ref_list" => [$sub_inv_ref_list]
        ];
        // dd($a_body);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('MULTIPAY_APP_CREATE_QR_URL'), [
            'headers' => $headers,
            'json' => $a_body
        ]);

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());

        return ($http_status_code == 200)? $contents:'';
    }

    public function getQrcodeSCB($accessToken = null, $ppType = null, $amount = null, $ref1 = null, $ref2 = null)
    {

        $headers = [
            'Content-Type' => 'application/json',
            'resourceOwnerId' => env('SCB_APPLICATIONKEY'),
            'requestUId' => 'Multi Pay Api v1',
            'authorization' => 'Bearer ' . $accessToken,
            'accept-language' => 'EN',
        ];

        $client = new \GuzzleHttp\Client();
        // echo '<pre>';
        // print_r([
        //     'headers' => $headers,
        //     'json' => [
        //         "qrType" => env('SCB_QRTYPE'),
        //         "ppType" => $ppType,
        //         "ppId" => env('SCB_PPID'),
        //         "amount" => $amount,
        //         "ref1" => $ref1,
        //         "ref2" => $ref2,
        //         "ref3" => env('SCB_REF3'),
        //     ]
        // ]);
        // echo '</pre>';
        $response = $client->request('POST', env('SCB_APP_CREATE_QR30_URL'), [
            'headers' => $headers,
            'json' => [
                "qrType" => env('SCB_QRTYPE'),
                "ppType" => $ppType,
                "ppId" => env('SCB_PPID'),
                "amount" => $amount,
                "ref1" => $ref1,
                "ref2" => $ref2,
                "ref3" => env('SCB_REF3')
            ]
        ]);
        // dd($response); exit;

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());
        // dd($contents); exit;

        return ($http_status_code == 200) ? $contents : '';
    }

    public function getToken()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'requestUId' => 'Multi Pay Api v1',
            'resourceOwnerId' => env('SCB_APPLICATIONKEY'),
            'accept-language' => 'EN',
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('SCB_APP_REQUEST_TOKEN_URL'), [
            'headers' => $headers,
            'json' => [
                "applicationKey" => env('SCB_APPLICATIONKEY'),
                "applicationSecret" => env('SCB_APPLICATIONSECRET'),
            ]
        ]);

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());
        // dd($contents);
        return ($http_status_code == 200) ? $contents : '';
    }

    public function mobilebanking(Request $request, $inv_ref) {
        // dd($request->all());
        $a_wh_product = explode(',', $request->products);
        $a_wh_inv_no = explode(',', $request->inv_no);
        $shop_array = [];

        DB::beginTransaction();
        try {
            $invs = $basket_all = invs::where('invs.user_id', Auth::user()->id)->where('invs.inv_ref', $inv_ref)->whereIn('invs.inv_no', $a_wh_inv_no)
                ->join('shops','shops.id','invs.shop_id')
                ->join('users','users.id','shops.user_id')
                ->where(function ($query) use ($a_wh_product) {
                    foreach ($a_wh_product as $key => $val) {
                        $query->orWhere(DB::raw("JSON_CONTAINS( JSON_EXTRACT(inv_products, '$[*].product_id'), '[\"".$val."\"]' )"), '=', '1');
                    }
                    return $query;
                })
                ->select('invs.*','users.phone','users.email')
                ->orderBy('updated_at', 'DESC')->get();

            // echo $invs; exit;
            $gtotal = $basket_all->sum('shipping_cost') + $basket_all->sum('total');
            $address = Address::where('id', $request->address)->get();

            $sort_address = ([
                "name" => $address[0]->name . ' ' . $address[0]->surname,
                "tel" => $address[0]->tel,
                "address" => $address[0]->address1 . ' ' . $address[0]->address2 . ' ' . $address[0]->county . ' ' . $address[0]->district . ' ' . $address[0]->city . ' ' . $address[0]->zipcode . ' ' . $address[0]->country
            ]);

            // $invs = invs::where('inv_ref', $inv_ref)->get();
            foreach ($invs as $inv) {
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
                $test = invs::where('inv_ref', $request->inv_ref)->whereIn('inv_no', $a_wh_inv_no)->where('shop_id', $shop_array[$key])->update([
                    'payment' => 'mobilebanking',
                    'shipping_id' => $ship,
                    'address' => [$sort_address],
                    'updated_at' => new DateTime()
                ]);
            }
            //สิ่งที่เพิ่มเข้ามา เพื่ออัพเดทข้อมูล เจมส์ทำเอง
            $a_inv_no = explode(',', $request->inv_no);

            $o_setting = Setting::where('id', '=', '1')->first();

            $time = new DateTime();

            $i_disc_product = $i_disc_ship = $i_total_disc = 0; $s_disc_to = $i_coupon_id = '';

            if( $request->coupon_code != '' ) {
                $o_coupon =  Coupon::where('code', strtoupper($request->coupon_code) )
                        ->where('remain_amt', '>', 0)->where('min_buy', '<', $gtotal )
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
                    $i_inv_disc = ($a_invs->shipping_cost / $basket_all->sum('shipping_cost')) * $i_disc_ship;
                }

                invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)->where('inv_no', $v_inv_no)->update([
                    'payment' => 'mobilebanking',
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
                $i_chk_coupon_invs = CouponInvs::where('coupon_code', $request->coupon_code)->where('inv_ref', $request->inv_ref)->where('inv_no', $request->inv_no)
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

            // $register = $this->getToken();
            $mobilebanking = new Mobilebanking();
            $mobilebanking->user_id = Auth::user()->id;
            $mobilebanking->qrType = "PP";
            $mobilebanking->partner = "SCB";
            $mobilebanking->ppType = "BILLERID";
            $mobilebanking->ppId = "";
            $mobilebanking->amount = $total;
            $mobilebanking->note = 'Siam Cannabis payment';
            $mobilebanking->blockchain = "###MULTI-PAY###";
            $mobilebanking->save();
            
            $ref_id = "CNBMTP".sprintf("%05d",$mobilebanking->id);
            $ref1 = $ref_id;
            $ref2 = "REFERENCE2";
            $ref3 = "SPI";
            // $accessToken = ($register->status->code == "1000")? $register->data->accessToken:'';
            $o_sub_inv_ref = (object) [
                'shop_tel' => $invs[0]->phone,
                'sub_inv_ref' => 'A',
                'amt' => $total+0,
                'system_name' => 'CNB'
                ];
            $qrcode = $this->getQrcodeMultipay($address[0]->tel ,
                                                $total+0,
                                                'CNB', 
                                                $ref_id, 
                                                'CNB',
                                                'staging.market.siamcannabis@gmail.com',
                                                $o_sub_inv_ref
                                                );
            // dd($qrcode);
            $a_qr_image = explode(',',$qrcode->result->QR_Image64);
            $mobilebanking = Mobilebanking::find($mobilebanking->id);
            // $mobilebanking->rawQrCode = $qrcode->data->qrRawData;
            $mobilebanking->qrImage = $a_qr_image[1];
            $mobilebanking->invoice = $ref_id;
            $mobilebanking->inv_ref = $request->inv_ref;
            $mobilebanking->inv_no = $request->inv_no;
            $mobilebanking->ref1 = $ref_id;
            $mobilebanking->ref2 = $ref2;
            $mobilebanking->ref3 = $ref3;
            $mobilebanking->save();

            DB::commit();

            return redirect(route('mobilebankingqrcode', ['id' => $mobilebanking->id]));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;

            return redirect()->back()->with('messageError', trans('message.warn_something_went_wrong') );
        }
    }

    public function Walletmobilebanking(Request $request)
    {
        $basket_all =  invs_wallet::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->first();
        $total = number_format($basket_all->total, 2, '.', '');
        // dd($request->all());

        $register = $this->getToken();
        $mobilebanking = new Mobilebanking();
        $mobilebanking->user_id = Auth::user()->id;
        $mobilebanking->qrType = "PP";
        $mobilebanking->partner = env('SCB_PARTNER_NAME');
        $mobilebanking->ppType = "BILLERID";
        $mobilebanking->ppId = env('SCB_PPID');
        $mobilebanking->amount = $total;
        $mobilebanking->note = 'shopteenii payment';
        $mobilebanking->blockchain = "###MULTI-PAY###";
        $mobilebanking->save();

        $ref_id = "MULTIPAY" . sprintf("%05d", $mobilebanking->id);
        $ref1 = $ref_id;
        $ref2 = "REFERENCE2";
        $ref3 = "SPI";
        $accessToken = ($register->status->code == "1000") ? $register->data->accessToken : '';
        $qrcode = ($accessToken != '') ? $this->getQrcode(
            $accessToken,
            $mobilebanking->qrType,
            $mobilebanking->ppType,
            $mobilebanking->ppId,
            $mobilebanking->amount,
            $ref_id,
            $ref1,
            $ref2,
            $ref3
        ) : '';

        $mobilebanking = Mobilebanking::find($mobilebanking->id);
        $mobilebanking->rawQrCode = $qrcode->data->qrRawData;
        $mobilebanking->invoice = $ref_id;
        $mobilebanking->inv_ref = $request->inv_ref;
        $mobilebanking->ref1 = $ref_id;
        $mobilebanking->ref2 = $ref2;
        $mobilebanking->ref3 = $ref3;
        $mobilebanking->save();
        // // dd($request);
        // $basket_all =  invs_wallet::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->first();
        // $total = number_format($basket_all->total, 2, '.', '');



        // $qrcode = $this->getQrcode($basket_all->total, 'shopteenii payment');
        // // dd($headers);
        // $mobilebanking = new Mobilebanking();
        // $mobilebanking->rawQrCode = $qrcode->rawQrCode;
        // $mobilebanking->invoice = $qrcode->invoice;
        // $mobilebanking->inv_ref = $request->inv_ref;
        // $mobilebanking->save();



        return redirect(route('walletqrcode', ['id' => $mobilebanking->id]));
    }


    public function mobilebankingreturn(Request $request)
    {
        // $request = (object) ["error"=>"0",
        //             "pay_type"=>"QR",
        //             "msg"=>"ชำระสำเร็จแล้ว",
        //             "data"=>(object)["payeeProxyId"=>"010556202649901","payeeProxyType"=>"BILLERID","payeeAccountNumber"=>"3023042534","payeeName"=>"SP INVESTEREST CO.,LTD.",
        //             "payerAccountNumber"=>"7722028478","payerAccountName"=>"นาย สุรศักดิ์ สุทธิเมธิกุล","payerName"=>"นาย สุรศักดิ์ สุทธิเมธิกุล","sendingBankCode"=>"004",
        //             "receivingBankCode"=>"014","amount"=>"1.00","transactionId"=>"222131421FI167222B004B092314212604","transactionDateandTime"=>"2022-08-01T14:21:29.260+07:00",
        //             "billPaymentRef1"=>"STNMTP00123STNV4","billPaymentRef2"=>"PAYMENT","billPaymentRef3"=>"YAM","currencyCode"=>"764","channelCode"=>"PMH",
        //             "transactionType"=>"Domestic Transfers"]
        //         ];
        // $request = 'POST /api/v1/invs/paymentQrCodeCallback HTTP/1.1 Accept:            */* Accept-Encoding:   gzip,deflate Accept-Language:   EN Content-Length:    786 Content-Type:      application/json Host:              shopteenii.com User-Agent:        node-fetch/1.0 (+https://github.com/bitinn/node-fetch) X-Forwarded-For:   159.89.204.80 X-Forwarded-Host:  shopteenii.com X-Forwarded-Proto: https  {"error":"0","pay_type":"QR","msg":"ชำระสำเร็จแล้ว","data":{"payeeProxyId":"010556202649901","payeeProxyType":"BILLERID","payeeAccountNumber":"3023042534","payeeName":"SP INVESTEREST CO.,LTD.","payerAccountNumber":"7722028478","payerAccountName":"นาย สุรศักดิ์ สุทธิเมธิกุล","payerName":"นาย สุรศักดิ์ สุทธิเมธิกุล","sendingBankCode":"004","receivingBankCode":"014","amount":"1.00","transactionId":"222131450FI021041B004B092314500504","transactionDateandTime":"2022-08-01T14:50:08.063+07:00","billPaymentRef1":"STNMTP00124STNV4","billPaymentRef2":"PAYMENT","billPaymentRef3":"YAM","currencyCode":"764","channelCode":"PMH","transactionType":"Domestic Transfers"}}';
        $s_header = preg_replace('~\{(?:[^{}]|(?R))*\}~', '', $request);
        $s_body = str_replace($s_header, '', $request);

        $o_body = json_decode($s_body);
        // dd($o_body);
        
        $o_scb_callback = new Scbqrcallback();
        $o_scb_callback->data = $request;
        $o_scb_callback->save();

        if( $o_body->error == '0' && ( $o_body->msg == 'ชำระสำเร็จแล้ว' || $o_body->msg == 'success' ) ) {
            $s_invoice = substr($o_body->data->billPaymentRef1, 0, 11);

            $mobilebanking = Mobilebanking::where('ref1',$s_invoice)->first();

            $a_inv_no = explode(',', $mobilebanking->inv_no);
            $invs = invs::where('inv_ref',$mobilebanking->inv_ref)->whereIn('inv_no', $a_inv_no)->get();
            
            foreach( $invs as $k_inv => $v_inv ) {
                $v_inv->status = 2;
                $v_inv->save();
            }
        }
    }
    public function mobilebankingconfirm(Request $request)
    {
        $o_scb_callback = new Scbqrcallback();
        $o_scb_callback->data = $request;
        $o_scb_callback->save();
    }

    public function mobilebankingqrcode($id)
    {
        $mobilebanking = Mobilebanking::where([
            'status' => 0,
            'id' => $id
        ])->get()->first();

        // $mobile_inv = $mobilebanking['inv_ref'];
        // $total = invs::where(['inv_ref' => $mobile_inv])->sum('total');
        // $shipping_cost = invs::where(['inv_ref' => $mobile_inv])->sum('shipping_cost');
        // $invs_total = $total + $shipping_cost;

        $qr_time_full = date('d/m/Y H:i', strtotime('+48 hour +543 Year', strtotime($mobilebanking['updated_at'])));

        $qrtime = explode(" ", $qr_time_full);

        return view('pages.mobilebanking-qrcode', compact('mobilebanking', 'qrtime'));
    }
    public function mobilebankingpullslip($id)
    {
        $register = $this->getToken();
        $mobilebanking = Mobilebanking::where([
            'id' => $id
        ])->get()->first();

        $accessToken = ($register->status->code == "1000") ? $register->data->accessToken : '';

        $ref_id = "MULTIPAY" . sprintf("%05d", $mobilebanking->id);
        $ref1 = $ref_id;
        $ref2 = "REFERENCE2";
        $ref3 = env('SCB_REF3');
        // $accessToken = ($register->status->code == "1000")? $register->data->accessToken:'';

        $headers = [
            'Content-Type' => 'application/json',
            'resourceOwnerId' => env('SCB_APPLICATIONKEY'),
            'requestUId' => 'Multi Pay Api v1',
            'authorization' => 'Bearer ' . $accessToken,
            'accept-language' => 'EN',
        ];

        $client = new \GuzzleHttp\Client();
        echo '<pre>';
        print_r([
            'headers' => $headers,
            'invoice' => $mobilebanking->invoice
        ]);
        echo '</pre>';
        $response = $client->request('GET', env('SCB_APP_PULL_SLIP_URL') . '/' . $mobilebanking->invoice . '?sendingBank=014', [
            'headers' => $headers
        ]);

        // $response = $client->request('GET', env('SCB_APP_PULL_SLIP_URL').'/transactions/'.$mobilebanking->invoice.'&sendingBank=014', [
        //     'headers' => $headers,
        //     'json' => [
        //         "transRef" => $mobilebanking->invoice,
        //         "sendingBank" => '014'
        //     ]
        // ]);


        dd($response);

        return view('pages.mobilebanking-pullslip', compact('mobilebanking'));
    }
}
