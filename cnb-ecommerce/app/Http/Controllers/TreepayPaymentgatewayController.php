<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mobilebanking;
use App\invs;
use App\Product;
use App\Transactions;
use App\invs_wallet;
use App\balance;
use App\PreOrder;
use App\shipping_details;
use DateTime;use Illuminate\Support\Facades\DB;
use Session;


class TreepayPaymentgatewayController extends Controller
{

    public function ResponseTreepayCredit(Request $request){
        
        if ($request->res_cd =='0000'){
            $inv_ref = $request->order_no;
            $ids = [];

            if(strpos($inv_ref,'wallet')!== false){
                invs_wallet::where('inv_ref', $inv_ref)->update([
                    'status' => 2,
                ]);

                $invswallet =  invs_wallet::where('inv_ref', $inv_ref)->first();
                // dd($invswallet->user_id);
                $getcredit =  balance::where('user_id', $invswallet->user_id)->first();

                /////////ยอดเข้า wallet หัก ค่าทธรรมเนียม 3%
                $realcredit=$invswallet->total*100/103;
                // dd($realcredit);

                $newcredit = $getcredit->credit +  $realcredit;

                balance::where('user_id', $invswallet->user_id)->update([
                    'credit' => $newcredit,
                ]);
                array_push($ids, $invswallet->id);

                $transactions = new Transactions();
                $transactions->type = 'wallet Credit';
                $transactions->user_id = $invswallet->user_id;
                $transactions->inv_ref = $invswallet->inv_ref;
                $transactions->total = $invswallet->total;
                $transactions->point = 0;
                $transactions->coin = 0;
                $transactions->status = 2;
                $transactions->payment = 'wallet Credit';
                $transactions->inv_id = array("id"=> $ids);
                $transactions->save();



            } else {

                DB::update('update invs set status = 2 where inv_ref = ?',[$inv_ref]);

                $ids = [];
                // $time = new DateTime();
                $new_id_invs = [];
                $new_inv_ref = [];
                $basket_all =  invs::where('inv_ref', $inv_ref)->get();

                foreach ($basket_all as $value) {

                    array_push($ids, $value->id);

                    $invs = invs::where('id', $value->id)->first();
                    foreach ($invs->inv_products as $value2) {
                        $pd_all[] = $value2;
                        $pd_id[]      = $value2['product_id'];
                        $pd_amoung[]  = $value2['amount'];
                        $pd_option[]  = $value2['option1'];
                        $pd_dis1[]  = $value2['dis1'];

                    }


                    foreach ($pd_all as $key => $val) {
                        if ($val['type'] == 'pre_order') {
                            $get_pd = PreOrder::where('id', $pd_id[$key])->first();
                            $arrNew = $get_pd->preOrder_option;
                            $lengthDis2 = count($arrNew[0]['dis2']);
                            $key_dis1 = array_search($val['dis1'], $arrNew[0]['dis1']);
                            $key_dis2 = array_search($val['dis2'], $arrNew[0]['dis2'] ?? null);
                            $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                            $key_start_date = array_keys(array_column($arrNew[0]['datetime_range'], 'start_date'), $val['start_date']);
                            $in_stock = $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key];


                            $sales = $get_pd->sales + $val['amount'];
                            $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key] =  $in_stock - $val['amount'];
                            PreOrder::where('id', $pd_id[$key])->update([
                                'preOrder_option' => $arrNew,
                                'sales' => $sales
                            ]);


                        } else {

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

                    // $get_pd = Product::where('id', $pd_id)->first();
                    // $arrNew = $get_pd->product_option;
                    // $lengthDis2 = count($get_pd->product_option['dis2']);
                    // foreach ($pd_all as $key => $val) {
                    //     $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                    //     $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                    //     $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                    //     $in_stock = $get_pd->product_option['stock'][$stock_key];

                    // array_push($ids, $value->id);

                    // $invs = invs::where('id', $value->id)->first();
                    // foreach ($invs->inv_products as $value) {
                    //     $pd_all[] = $value;
                    //     $pd_id[]      = $value['product_id'];
                    //     $pd_amoung[]  = $value['amount'];
                    //     $pd_option[]  = $value['option1'];
                    //     $pd_dis1[]  = $value['dis1'];
                    // }

                    $weight = shipping_details::where('shipde_id', $invs->shipping_id)->first();
                    $price_weight = ($weight->shipde_price / count($pd_all));

                    // $inv_ref = $time->format('YmdHis') . $invs->user_id;
                    if (count($pd_all) >= 2) {
                        if ($val['type'] == 'pre_order') {

                            $new_data = invs::create([
                                'inv_ref' => $invs->inv_ref . "_PreOder",
                                'shop_id' => $invs->shop_id,
                                'inv_products' => [$val],
                                'user_id' => $invs->user_id,
                                'shipping_cost' => $price_weight,
                                'payment' => $invs->payment,
                                'campaign_id' => null,
                                'shipping_id' => $invs->shipping_id,
                                'total' => $val['price'],
                                'note' => 'test',
                                'coupon_id' => null,
                                'status' => 2,
                                'shipping_note' => null,
                                'address' => $invs->address,
                                'transfer_img' => $invs->transfer_img,
                                'transfer_slip' => $invs->transfer_slip,
                                'created_at' => new DateTime(),
                                'updated_at' => new DateTime(),
                            ]);
                            array_push($new_id_invs, $new_data->id);
                            array_push($new_inv_ref, $new_data);
                        } else if ($val['type'] == 'flashsale') {
                            $new_data = invs::create([
                                'inv_ref' => $invs->inv_ref . "_FlashSale",
                                'shop_id' => $invs->shop_id,
                                'inv_products' => [$val],
                                'user_id' => $invs->user_id,
                                'shipping_cost' => $price_weight,
                                'payment' => $invs->payment,
                                'campaign_id' => null,
                                'shipping_id' => $invs->shipping_id,
                                'total' => $val['price'],
                                'note' => 'test',
                                'coupon_id' => null,
                                'status' => 2,
                                'shipping_note' => null,
                                'address' => $invs->address,
                                'transfer_img' => $invs->transfer_img,
                                'transfer_slip' => $invs->transfer_slip,
                                'created_at' => new DateTime(),
                                'updated_at' => new DateTime(),
                            ]);
                            array_push($new_id_invs, $new_data->id);
                            array_push($new_inv_ref, $new_data);
                        } else if ($val['type'] == '9baht') {
                            $new_data = invs::create([
                                'inv_ref' => $invs->inv_ref . "_9Baht",
                                'shop_id' => $invs->shop_id,
                                'inv_products' => [$val],
                                'user_id' => $invs->user_id,
                                'shipping_cost' => $price_weight,
                                'payment' => $invs->payment,
                                'campaign_id' => null,
                                'shipping_id' => $invs->shipping_id,
                                'total' => $val['price'],
                                'note' => 'test',
                                'coupon_id' => null,
                                'status' => 2,
                                'shipping_note' => null,
                                'address' => $invs->address,
                                'transfer_img' => $invs->transfer_img,
                                'transfer_slip' => $invs->transfer_slip,
                                'created_at' => new DateTime(),
                                'updated_at' => new DateTime(),
                            ]);
                            array_push($new_id_invs, $new_data->id);
                            array_push($new_inv_ref, $new_data);
                        } else if ($val['type'] == null) {
                            $new_data = invs::create([
                                'inv_ref' => $invs->inv_ref,
                                'shop_id' => $invs->shop_id,
                                'inv_products' => [$val],
                                'user_id' => $invs->user_id,
                                'shipping_cost' => $price_weight,
                                'payment' => $invs->payment,
                                'campaign_id' => null,
                                'shipping_id' => $invs->shipping_id,
                                'total' => $val['price'],
                                'note' => 'test',
                                'coupon_id' => null,
                                'status' => 2,
                                'shipping_note' => null,
                                'address' => $invs->address,
                                'transfer_img' => $invs->transfer_img,
                                'transfer_slip' => $invs->transfer_slip,
                                'created_at' => new DateTime(),
                                'updated_at' => new DateTime(),
                            ]);
                            array_push($new_id_invs, $new_data->id);
                            array_push($new_inv_ref, $new_data);
                        }
                        invs::where('id', $request->order_no)->delete();
                    } else {
                        invs::where('id', $request->order_no)->update([
                            'status' => 2,
                            'updated_at' => new DateTime()
                        ]);

                        

                        $inv = $basket_all->first();
                        $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');
                        /////////////////////////////ยอดชำระ +ค่าธรรมเนียม 3%
                        $caltotal = $grandtotal*103/100;

                        $transactions = new Transactions();
                        $transactions->type = 'credit';
                        $transactions->user_id = $inv->user_id;
                        $transactions->inv_ref = $inv->inv_ref;
                        $transactions->total = $caltotal;
                        $transactions->point = 0;
                        $transactions->coin = 0;
                        $transactions->status = 2;
                        $transactions->payment = 'credit';
                        $transactions->inv_id = array("id"=> $ids);
                        $transactions->save();
                        
                    }



                }

                

                foreach ($new_id_invs as $value) {
                    array_push($ids, $value);
                }

                foreach ($new_inv_ref as $new_inv) {

                    $grandtotal = $new_inv->sum('total') + $new_inv->sum('shipping_cost');
                    /////////////////////////////ยอดชำระ +ค่าธรรมเนียม 3%
                    $caltotal = $grandtotal * 103 / 100;

                    $transactions = new Transactions();
                    $transactions->type = 'credit';
                    $transactions->user_id = $new_inv->user_id;
                    $transactions->inv_ref = $new_inv->inv_ref;
                    $transactions->total = $caltotal;
                    $transactions->point = 0;
                    $transactions->coin = 0;
                    $transactions->status = 2;
                    $transactions->payment = 'credit';
                    $transactions->inv_id = array("id" => $ids);
                    $transactions->save();



                }



                // $inv = $basket_all->first();
                // $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');
                // /////////////////////////////ยอดชำระ +ค่าธรรมเนียม 3%
                // $caltotal = $grandtotal*103/100;

                // $transactions = new Transactions();
                // $transactions->type = 'credit';
                // $transactions->user_id = $inv->user_id;
                // $transactions->inv_ref = $inv->inv_ref;
                // $transactions->total = $caltotal;
                // $transactions->point = 0;
                // $transactions->coin = 0;
                // $transactions->status = 2;
                // $transactions->payment = 'credit';
                // $transactions->inv_id = array("id"=> $ids);
                // $transactions->save();
            }

        }
        // return redirect('/profile_my_sale');
        Session::save();
                        header("Location: ".url()->to(route('profile_my_sale')));
                        exit();
    }

    
}
