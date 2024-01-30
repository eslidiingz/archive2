<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\invs;
use App\Product;
use App\Transactions;
use App\balance;
use App\invs_wallet;
use DB;
use App\Mobilebanking;use App\PreOrder;
use App\shipping_details;
use DateTime;

class T10walletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function callback(Request $data)
    {
        // dd($data->all());
        $mobilebanking = Mobilebanking::where('invoice', $data->invoice);

        if (!$mobilebanking->get()->first()) {
            return response()->json('Not found !', 200);
        }

        $mobilebanking = $mobilebanking->first();
        $mobilebanking->status = 1;
        $mobilebanking->save();

        $ids = [];
        // $time = new DateTime();
        $new_id_invs = [];
        $new_inv_ref = [];

        if (strpos($mobilebanking->inv_ref, 'wallet') !== false) {

            invs_wallet::where('inv_ref', $mobilebanking->inv_ref)->update([
                'status' => 2,
            ]);

            $invswallet =  invs_wallet::where('inv_ref', $mobilebanking->inv_ref)->first();
            // dd($invswallet);
            $getcredit =  balance::where('user_id', $invswallet->user_id)->first();
            // dd($getcredit);

            $newcredit = $getcredit->credit +  $invswallet->total;

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
            $transactions->inv_id = array("id" => $ids);
            $transactions->save();
        } else {

            $basket_all =  invs::where('inv_ref', $mobilebanking->inv_ref)->get();
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
                // dd($pd_all);
                // $get_pd = Product::where('id', $pd_id)->first();
                // $arrNew = $get_pd->product_option;
                // $lengthDis2 = count($get_pd->product_option['dis2']);
                // foreach ($pd_all as $key => $val) {
                //     $key_dis1 = array_search($val['dis1'], $get_pd->product_option['dis1']);
                //     $key_dis2 = array_search($val['dis2'], $get_pd->product_option['dis2']);
                //     $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                //     $in_stock = $get_pd->product_option['stock'][$stock_key];

                //     // dd($in_stock);
                //     if ($in_stock > $val['amount']) {
                //         $arrNew['stock'][$stock_key] =  $in_stock - $val['amount'];
                //         // dd($arrNew['stock']);
                //     }
                // }

                // Product::where('id', $pd_id)->update([
                //     'product_option' => $arrNew
                // ]);


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
                    invs::where('id', $mobilebanking->inv_ref)->delete();
                } else {
                    invs::where('id', $mobilebanking->inv_ref)->update([
                        'status' => 2,
                        'updated_at' => new DateTime()
                    ]);
                }

            }

            foreach ($new_id_invs as $value) {
                array_push($ids, $value);
            }

            foreach ($new_inv_ref as $new_inv) {

                $grandtotal = $new_inv->sum('total') + $new_inv->sum('shipping_cost');


                $transactions = new Transactions();
                $transactions->type = 'mobile banking';
                $transactions->user_id = $new_inv->user_id;
                $transactions->inv_ref = $new_inv->inv_ref;
                $transactions->total = $grandtotal;
                $transactions->point = 0;
                $transactions->coin = 0;
                $transactions->status = 2;
                $transactions->payment = 'mobile banking';
                $transactions->inv_id = array("id" => $ids);
                $transactions->save();
            }



            // $inv = $basket_all->first();
            // $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');


            // $transactions = new Transactions();
            // $transactions->type = 'mobile banking';
            // $transactions->user_id = $inv->user_id;
            // $transactions->inv_ref = $inv->inv_ref;
            // $transactions->total = $grandtotal;
            // $transactions->point = 0;
            // $transactions->coin = 0;
            // $transactions->status = 2;
            // $transactions->payment = 'mobile banking';
            // $transactions->inv_id = array("id" => $ids);
            // $transactions->save();
        }
        return  response()->json('Not found !', 200);
    }
}
