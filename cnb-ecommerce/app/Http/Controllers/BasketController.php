<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invs;
use DateTime;
use App\Product;
use App\Category;
use App\SubCategory;
use App\balance;
use App\Order;
use App\Orderdetail;
use App\Payment;
use App\Paymenttype;
use App\Address;
use App\BoxSize;
use App\Province;
use App\flash;
use App\Mobilebanking;
use App\PreOrder;
use App\shipping;
use App\shipping_details;
use App\Transactions;
use App\shipping_type;
use App\Shops as shops;
use App\T10wallet;
use App\User;
use App\Wishlist;
use App\Setting;
use App\Coupon;
use App\CouponInvs;
use App\Models\Market\Asset;
use App\Models\Market\Project;
use flashSales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Date;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class BasketController extends Controller
{

    public function index(Request $request)
    {
        // $test = invs::where('inv_ref', '20201108093458753556142')->first();
        // dd($test->address);
        // $cookie = Cookie::get('link');
        // dd($cookie);
        $data['product_all_id'] = [];
        $pro = [];
        $product_stock = [];
        $inv_ref_array = [];
        $preOrder_stock = [];
        $stock_pre_order = 0;
        $data['category_all'] = [];
        $category = Category::get();
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id', $value->category_id)->count();
            if ($value->data_subdets != "[]") {
                $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                $value['data_subdets'] = $sub;
            } else {
                $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
            }
            array_push($data['category_all'], json_decode($value));
        }
        $data['basket_all'] =  invs::where('user_id', Auth::user()->id)->where('status', 0)->orderBy('updated_at', 'DESC')->get();

        // dd($data['basket_all']);

        foreach ($data['basket_all'] as $keybasket => $basket) {
            $shop_id = $basket->shop_id;
            $inv_ref = $basket->inv_ref;
            $inv_no = $basket->inv_no;

            // if a total has inv-ref more than 1 row. i need to sum it
            // dd($basket->inv_products);
            foreach ($basket->inv_products as $keybas => $bas) {

                $bas['shop_id'] = $shop_id;
                $bas['inv_ref'] = $inv_ref;
                $bas['inv_no'] = $inv_no;

                if (isset($bas['type']) && $bas['type'] == 'flashsale') {
                    //----------------------------------------------- Flash Sale ---------------------------------------------------\\
                    $data['product_all_flash_sale'] = flash::select('name', 'product_img')->where('id', $bas['product_id'])->first();
                    $product_flash_sale = flash::select('product_option')->where('id', $bas['product_id'])->first();
                    // dd($data['product_all_flash_sale']);


                    if ($data['product_all_id']) {
                        $status = true;

                        foreach ($data['product_all_id'] as  $product_key => $value) {

                            if (($bas['product_id'] == $value['product_id']) &&
                                ($bas['dis1']       == $value['dis1']) &&
                                ($bas['dis2']       == $value['dis2']) &&
                                ($bas['type']       == $value['type'])

                            ) {
                                array_push($data['product_all_id'][$product_key]['index'], $keybas);
                                $data['product_all_id'][$product_key]['amount'] = intval($value['amount']) + intval($bas['amount']);
                                $status = false;
                            }
                        }
                        if ($status) {
                            $bas['product_name'] = @$data['product_all_flash_sale']->name;
                            $bas['product_img'] = @$data['product_all_flash_sale']->product_img[0];
                            $bas['index'] = array($keybas);
                            array_push($pro, $bas['product_id']);
                            array_push($data['product_all_id'], $bas);

                            $product_stock['flashsale'] = $product_flash_sale['product_option']['stock'];
                            // array_push($product_stock, $product_flash_sale['product_option']['stock']);
                        }
                    } else {
                        // $bas['end_date'] = explode(',', str_replace(array('[', ']'), '', $bas['end_date']));
                        $bas['product_name'] = $data['product_all_flash_sale']->name;
                        $bas['product_img'] = $data['product_all_flash_sale']->product_img[0];
                        $bas['index'] = array($keybas);
                        array_push($pro, $bas['product_id']);
                        array_push($data['product_all_id'], $bas);

                        $product_stock['flashsale'] = $product_flash_sale['product_option']['stock'];
                        // array_push($product_stock, $product_flash_sale['product_option']['stock']);
                    }

                    // function ในการ
                    $product_flash = [];
                    foreach ($data['product_all_id'] as $type_sale) {
                        if ($product_flash) {
                            if ($type_sale['type'] == "flashsale") {
                                foreach ($product_flash as $pro_id => $pro_flash) {
                                    if ($type_sale['product_id'] == $pro_id) {
                                        $product_flash[$type_sale['product_id']] += $type_sale['amount'];
                                    } else {
                                        $product_flash[$type_sale['product_id']] = $type_sale['amount'];
                                    }
                                }
                            }
                        } else {
                            if ($type_sale['type'] == "flashsale") {
                                $product_flash[$type_sale['product_id']] = $type_sale['amount'];
                            }
                        }
                    }

                    $data['message_limit'] = [];
                    $array_limit = [];
                    foreach ($product_flash as $flash_key => $flash_value) {
                        $limit = flash::where('id', $flash_key)->first();

                        if ($flash_value > $limit->product_limit) {
                            $data['message_limit']['limit'][$flash_key] = $limit;
                        } else {
                            $data['message_limit']['limit'][$flash_key] = $limit;
                        }
                    }
                    //----------------------------------------------- Flash Sale ---------------------------------------------------\\
                } else if (isset($bas['type']) && $bas['type'] == 'pre_order') {
                    //----------------------------------------------- Pre Order ---------------------------------------------------\\
                    // dd('pre_order');

                    $data['product_pre_order'] = PreOrder::select('name', 'product_img')->where('id', $bas['product_id'])->first();
                    $test = PreOrder::where('id', $bas['product_id'])->first();
                    $preOrder_option = PreOrder::select('preOrder_option')->where('id', $bas['product_id'])->first();
                    // dd($preOrder_option);


                    if ($data['product_all_id'] && $bas['type'] == 'pre_order') {
                        $status = true;
                        $check = '';
                        foreach ($data['product_all_id'] as  $product_key => $value) {
                            if (($bas['product_id'] == $value['product_id']) &&
                                ($bas['dis1'] == $value['dis1']) &&
                                ($bas['dis2'] == $value['dis2']) &&
                                ($bas['type'] == $value['type'])

                            ) {
                                array_push($data['product_all_id'][$product_key]['index'], $keybas);
                                $data['product_all_id'][$product_key]['amount'] = intval($value['amount']) + intval($bas['amount']);
                                $status = false;
                                $check = $value['type'];
                            } else if ($bas['type'] == 'flashsale') {
                                $product_flash_sale = flash::select('product_option')->where('id', $bas['product_id'])->first();
                                $product_stock['flashsale'] = $product_flash_sale['product_option']['stock'];
                                $status = false;
                            } else if ($bas['type'] == null || $bas['type'] == "") {
                                $product = Product::select('product_option')->where('id', $bas['product_id'])->first();
                                $product_stock['product'] = $product['product_option']['stock'];
                                $status = false;
                            }
                        }
                        if ($status) {
                            $bas['product_name'] = @$data['product_pre_order']->name;
                            $bas['product_img'] = @$data['product_pre_order']->product_img[0];
                            $bas['index'] = array($keybas);
                            // $bas['end_date'] = explode(',', str_replace(array('[', ']'), '', $bas['end_date']));
                            foreach ($preOrder_option['preOrder_option'] as $key_range => $date_range) {

                                $lengthDis2 = count($date_range['dis2']);
                                $key_dis1 = array_search($bas['dis1'], $date_range['dis1']);
                                $key_dis2 = array_search($bas['dis2'], $date_range['dis2']);
                                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                                foreach ($date_range['datetime_range'] as $datetime_detials) {
                                    if ($datetime_detials['start_date'] == $bas['start_date'] && $datetime_detials['end_date'] == $bas['end_date']) {
                                        array_push($preOrder_stock, $datetime_detials['stock'][$stock_key]);
                                    }
                                }
                            }
                            array_push($pro, $bas['product_id']);
                            array_push($data['product_all_id'], $bas);
                            array_push($preOrder_stock, @$bas['amount_limit']);
                        }
                    } else {
                        // dd($bas);
                        foreach ($preOrder_option['preOrder_option'] as $key_range => $date_range) {

                            $lengthDis2 = count($date_range['dis2']);
                            $key_dis1 = array_search($bas['dis1'], $date_range['dis1']);
                            $key_dis2 = array_search($bas['dis2'], $date_range['dis2']);
                            $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                            foreach ($date_range['datetime_range'] as $datetime_detials) {
                                if ($datetime_detials['start_date'] == $bas['start_date'] && $datetime_detials['end_date'] == $bas['end_date']) {
                                    array_push($preOrder_stock, $datetime_detials['stock'][$stock_key]);
                                }
                            }
                        }


                        $bas['product_name'] = $data['product_pre_order']->name;
                        $bas['product_img'] = $data['product_pre_order']->product_img[0];
                        $bas['index'] = array($keybas);
                        array_push($pro, $bas['product_id']);
                        array_push($data['product_all_id'], $bas);
                    }
                    // dd($data['product_all_id']);


                    //----------------------------------------------- Pre Order ---------------------------------------------------\\
                } else if (!isset($bas['type']) || $bas['type'] == null) {
                    //----------------------------------------------- Product Regular ---------------------------------------------------\\
                    $data['product_all'] = Product::select('name', 'product_img')->where('id', $bas['product_id'])->first();
                    $product = Product::select('product_option')->where('id', $bas['product_id'])->first();
                    // $data['basket_all'][$keybasket]->image = '1';

                    if ($data['product_all_id']) {
                        $status = true;
                        foreach ($data['product_all_id'] as  $product_key => $value) {

                            if (($bas['product_id'] == $value['product_id']) &&
                                ($bas['dis1'] == $value['dis1']) &&
                                ($bas['dis2'] == $value['dis2']) &&
                                (isset($bas['type']) && $bas['type'] == $value['type'])

                            ) {
                                array_push($data['product_all_id'][$product_key]['index'], $keybas);
                                $data['product_all_id'][$product_key]['amount'] = intval($value['amount']) + intval($bas['amount']);
                                $status = false;
                            }
                        }
                        if ($status) {

                            $bas['product_name'] = $data['product_all']->name;
                            if (!isset($data['product_all']->product_img[0])) {
                                $bas['product_img'] = '../no_image.png';
                            } else {
                                $bas['product_img'] = $data['product_all']->product_img[0];
                            }
                            $bas['index'] = array($keybas);
                            array_push($data['product_all_id'], $bas);
                            array_push($pro, $bas['product_id']);

                            $product_stock['product'] = $product['product_option']['stock'];
                            // array_push($product_stock['product'], $product['product_option']['stock']);
                        }
                    } else {
                        $bas['product_name'] = $data['product_all']->name;
                        if (!isset($data['product_all']->product_img[0])) {
                            $bas['product_img'] = '../no_image.png';
                        } else {
                            $bas['product_img'] = $data['product_all']->product_img[0];
                        }
                        $bas['index'] = array($keybas);
                        array_push($pro, $bas['product_id']);
                        array_push($data['product_all_id'], $bas);

                        $product_stock['product'] = $product['product_option']['stock'];
                        // array_push($product_stock, $product['product_option']['stock']);

                    }
                    if (!in_array($basket->total, $inv_ref_array)) {
                        array_push($inv_ref_array, $basket->total);
                        $data['total'] = array_sum($inv_ref_array);
                    }
                    //----------------------------------------------- Product Regular ---------------------------------------------------\\
                }

            }
        }
        // dd($product_stock);
        // echo '<pre>';
        // print_r($data['product_all_id']);
        // echo '</pre>'; exit;
        // dd($preOrder_stock);
        $data['shop'] = invs::where('user_id', Auth::user()->id)->where('status', 0)->select('shop_id')->distinct()->get();

        $data['notPay'] = invs::where('user_id', Auth::user()->id)->where('status', 1)->limit(2)->get();

        foreach ($data['notPay'] as $keynotpay => $notpay) {
            $arrayNotPay = [];
            foreach ($notpay->inv_products as $key_product => $not) {
                $temp = $not;
                $pro = Product::where('id', $not['product_id'])->first();
                $temp['pro_name'] = $pro->name;
                if (!isset($pro->product_img[0])) {
                    $pro->product_img = array('0' => '../no_image.png');
                }
                $temp['pro_img'] = $pro->product_img[0];
                array_push($arrayNotPay, $temp);
            }
            $data['notPay'][$keynotpay]->inv_products = $arrayNotPay;
            $notpay['countPro'] = count($notpay->inv_products);
        }
        $countAllShop = invs::where('user_id', Auth::user()->id)->where('status', 1)->get();

        $a_shop_not_ready = [];
        foreach ($data['shop'] as $key => $val) {
            $a_shop = Shops::where('id', $val->shop_id)->first();
            $a_shop_addr = Address::where('status_address', '2')
                ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = ' . $val->shop_id . ')')
                ->first();
            if ($a_shop['shop_sts'] == 'close' || $a_shop['bank_number'] == '' || $a_shop_addr == null || $a_shop['kyc_status'] == '' || $a_shop['kyc_status'] == 'unapprove') {
                $a_shop_not_ready[] = $val->shop_id;
            }
        }

        return view('pages.basket', $data, compact('product_stock', 'preOrder_stock', 'countAllShop', 'a_shop_not_ready'));
    }

    public function add(Request $request)
    {
        $time = new DateTime();

        // dd($request->all());

        if ($request->which_btn == '1' || $request->which_btn == '2') {
            //ใส่ตะกร้า add to basket
            $basket_allready =  invs::where('user_id', Auth::user()->id)->where('status', 0);

            // return ($basket_allready->get());
            if (count($basket_allready->get()) <= 0) {

                $inv_ref = $time->format('YmdHis') . Auth::user()->id;


                if ($request['type'] == 'flashsale') {
                    $product_stock = flash::where('id', $request['product_id'])->get();
                } else {
                    $product_stock = Product::where('id', $request['product_id'])->get();
                }


                if ($request['type'] == 'pre_order') {

                    $inv_products = ([
                        "product_id" => $request->product_id,
                        "option1" => $request->option1,
                        "option2" => $request->option2,
                        "dis1" => $request->dis1,
                        "dis2" => $request->dis2,
                        "price" => $request->price,
                        "amount" => intval($request->amount),
                        "type" => $request['type'],
                        "stock_key" => $request->stock_key,
                        'start_date' => $request['start_date'],
                        'end_date' => $request['end_date'],
                    ]);
                } else if ($request['type'] == 'flashsale' || $request['type'] == null) {
                    $inv_products = ([
                        "product_id" => $request->product_id,
                        "option1" => $request->option1,
                        "option2" => $request->option2,
                        "dis1" => $request->dis1,
                        "dis2" => $request->dis2,
                        "price" => $request->price,
                        "margin" => $request->margin,
                        "stock_key" => $request->stock_key,
                        "amount" => intval($request->amount),
                        "type" => $request['type'],
                        'end_date' => $request['end_date'],
                        'time_period' => $request['time_period']
                    ]);
                }


                invs::create([
                    'inv_ref' => $inv_ref,
                    'user_id' => Auth::user()->id,
                    'shop_id' => $request->shop_id,
                    'inv_products' => [$inv_products],
                    // 'shipping_cost'=> null,
                    // 'payment'=> '',
                    // 'campaign_id'=> '',
                    // 'shipping_id'=> '',
                    'total' => $request->price * intval($request->amount),
                    'note' => '',
                    // 'coupon_id'=>1,
                    'status' => 0,
                    // 'shipping_note'=>'',
                    'created_at' => $time,
                    // 'updated_at'=> ''
                ]);
            } else {
                // dd($basket_allready->get());
                $basket_allready_sameshop = $basket_allready->where('shop_id', $request->shop_id);
                // dd($basket_allready_sameshop->get());
                if (count($basket_allready_sameshop->get()) <= 0) {
                    $basket_allready =  invs::where('user_id', Auth::user()->id)->where('status', 0);
                    if ($request['type'] == 'flashsale') {
                        $product_stock = flash::where('id', $request['product_id'])->get();
                    } else {
                        $product_stock = Product::where('id', $request['product_id'])->get();
                    }
                    foreach ($product_stock as $value) {

                        $Dis1 = $value->product_option['dis1'];
                        $Dis2 = $value->product_option['dis2'];
                        $key_dis1 = array_search($request->dis1, $Dis1);
                        $key_dis2 = array_search($request->dis2, $Dis2);
                        $lengthDis2 = count($Dis2);
                        $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                    }

                    if ($request['type'] == 'pre_order') {

                        $inv_products = ([
                            "product_id" => $request->product_id,
                            "option1" => $request->option1,
                            "option2" => $request->option2,
                            "dis1" => $request->dis1,
                            "dis2" => $request->dis2,
                            "price" => $request->price,
                            "amount" => intval($request->amount),
                            "type" => $request['type'],
                            "stock_key" => $request->stock_key,
                            'start_date' => $request['start_date'],
                            'end_date' => $request['end_date'],
                        ]);
                    } else if ($request['type'] == 'flashsale' || $request['type'] == null) {
                        $inv_products = ([
                            "product_id" => $request->product_id,
                            "option1" => $request->option1,
                            "option2" => $request->option2,
                            "dis1" => $request->dis1,
                            "dis2" => $request->dis2,
                            "price" => $request->price,
                            "margin" => $request->margin,
                            "stock_key" => $request->stock_key,
                            "amount" => intval($request->amount),
                            "type" => $request['type'],
                            'end_date' => $request['end_date'],
                            'time_period' => $request['time_period']
                        ]);
                    }

                    // dd(Auth::user()->id);
                    invs::create([
                        'inv_ref' =>  $basket_allready->get()[0]->inv_ref,
                        'user_id' => Auth::user()->id,
                        'shop_id' => $request->shop_id,
                        'inv_products' => [$inv_products],
                        'total' => $request->price * intval($request->amount),
                        'note' => '',
                        // 'coupon_id'=>1,
                        'status' => 0,
                        // 'shipping_note'=>'',
                        'created_at' => $time,
                        // 'updated_at'=> ''
                    ]);
                } else {
                    // dd($request->all());
                    $sum_amount_finish = [];
                    $status_request = true;
                    foreach ($basket_allready_sameshop->get() as $invs_count) {
                        $count_amount_in_invs = 0;
                        foreach ($invs_count->inv_products as $invs) {
                            $temp = [];
                            if (isset($sum_amount_finish[$invs['product_id']])) {
                                $sum_amount_finish[$invs['product_id']]['amount'] += $invs['amount'];
                            } else {
                                $sum_amount_finish[$invs['product_id']] = $invs;
                            }

                            if (
                                $invs['dis1'] == $request->dis1 &&
                                $invs['dis2'] == $request->dis2 &&
                                $invs['product_id'] == $request->product_id &&
                                $invs['type'] == $request->type &&
                                $status_request
                            ) {
                                $sum_amount_finish[$invs['product_id']]['amount'] += $request->amount;
                                $status_request = false;
                            } else {
                                $sum_amount_finish[$request->product_id] = [
                                    'product_id' => $request->product_id,
                                    'option1' => $request->option1,
                                    'option2' => $request->option2,
                                    'dis1' => $request->dis1,
                                    'dis2' => $request->dis2,
                                    'price' => $request->price,
                                    'margin' => $request->margin,
                                    'amount' => $request->amount,
                                    'type' => $request->type,
                                    'stock_key' => $request->stock_key,
                                    'start_date' => $request->start_date,
                                    'end_date' => $request->end_date,
                                    'time_period' => $request->time_period
                                ];
                            }
                        }
                    }

                    // dd($request->all());
                    $inv_products_update = $basket_allready_sameshop->get()[0]->inv_products;
                    $total_update = $basket_allready_sameshop->get()[0]->total + ($request->price * intval($request->amount));
                    $checkId = $basket_allready_sameshop->get();

                    foreach ($sum_amount_finish as $check_amount) {
                        if ($check_amount['type'] == 'pre_order') {
                            $product_stock = PreOrder::where('id', $check_amount['product_id'])->get();
                            $stock = '';
                            $status = true;

                            foreach ($product_stock as $value) {
                                $datetime_range = $value->preOrder_option[0]['datetime_range'];

                                foreach ($sum_amount_finish as $check) {

                                    if ($check_amount['type'] == 'pre_order') {
                                        $Dis1 = $value->preOrder_option[0]['dis1'];
                                        $Dis2 = $value->preOrder_option[0]['dis2'];;
                                        $key_dis1 = array_search($request->dis1, $Dis1);
                                        $key_dis2 = array_search($request->dis2, $Dis2);
                                        $lengthDis2 = count($Dis2);
                                        $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                                        // find positions of start_date & stock
                                        $key_date = array_keys(array_column($datetime_range, 'start_date'), $request->start_date);
                                        $stock = $datetime_range[$key_date[0]]['stock'][$stock_key];
                                        // dd($count_amount_in_invs);
                                        if ($check['product_id'] == $request->product_id) {
                                            if ($check['amount'] > $stock) {
                                                $status = false;
                                                return redirect()->back()->with('msgStock_PreOrder', 'จำนวนสินค้าในชิ้นนี้เกินจำนวนคลังสินค้า');
                                            }
                                        }
                                    }
                                }
                            }
                        } else if ($check_amount['type'] == 'flashsale') {
                            $product_stock = flash::where('id', $check_amount['product_id'])->get();
                            $stock = '';
                            $status = true;
                            foreach ($product_stock as $value) {

                                $Dis1 = $value->product_option['dis1'];
                                $Dis2 = $value->product_option['dis2'];
                                $key_dis1 = array_search($request->dis1, $Dis1);
                                $key_dis2 = array_search($request->dis2, $Dis2);
                                $lengthDis2 = count($Dis2);
                                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                                $stock = $value->product_option['stock'][$stock_key];
                            }

                            if ($check_amount['amount'] > $stock) {
                                $status = false;
                                return redirect()->back()->with('msgStock_PreOrder', 'จำนวนสินค้าในชิ้นนี้เกินจำนวนคลังสินค้า');
                            }
                        } else if ($check_amount['type'] == null) {
                            $product_stock = Product::where('id', $check_amount['product_id'])->get();
                            $stock = '';
                            $status = true;
                            foreach ($product_stock as $value) {
                                $Dis1 = $value->product_option['dis1'];
                                $Dis2 = $value->product_option['dis2'];
                                $lengthDis2 = count($Dis2);
                                $key_dis1 = array_search($request->dis1, $Dis1);
                                $key_dis2 = array_search($request->dis2, $Dis2);
                                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                                $stock = $value->product_option['stock'][$stock_key];

                                if ($check_amount['product_id'] == $request->product_id) {
                                    if ($check_amount['amount'] > $stock) {
                                        $status = false;
                                        return redirect()->back()->with('msgStock_PreOrder', 'จำนวนสินค้าในชิ้นนี้เกินจำนวนคลังสินค้า');
                                    }
                                }
                            }
                        }
                    }



                    if ($status) {

                        if ($request['type'] == 'pre_order') {
                            $inv_products = ([
                                "product_id" => $request->product_id,
                                "option1" => $request->option1,
                                "option2" => $request->option2,
                                "dis1" => $request->dis1,
                                "dis2" => $request->dis2,
                                "price" => $request->price,
                                "amount" => intval($request->amount),
                                "type" => $request['type'],
                                "stock_key" => $request->stock_key,
                                'start_date' => $request['start_date'],
                                'end_date' => $request['end_date'],
                            ]);
                        } else if ($request['type'] == 'flashsale' || $request['type'] == null) {
                            $inv_products = ([
                                "product_id" => $request->product_id,
                                "option1" => $request->option1,
                                "option2" => $request->option2,
                                "dis1" => $request->dis1,
                                "dis2" => $request->dis2,
                                "price" => $request->price,
                                "margin" => $request->margin,
                                "stock_key" => $stock_key,
                                "amount" => intval($request->amount),
                                "type" => $request['type'],
                                'end_date' => $request['end_date'],
                                'time_period' => $request['time_period']
                            ]);
                        }


                        array_push($inv_products_update, $inv_products);
                        $basket_allready_sameshop->update([
                            'inv_products' => $inv_products_update,
                            'total' =>  $total_update,
                            'updated_at' => $time
                        ]);
                    }
                }
            }
            if ($request->which_btn == '2') {
                return redirect('basket');
            }
            return redirect()->back();
        } else if ($request->which_btn == '4') {
            $wishlist = Wishlist::where('id', Auth::user()->id);
            // dd($wish);
            $details_wishlist = ([
                "option1" => $request->option1,
                "option2" => $request->option2,
                "dis1" => $request->dis1,
                "dis2" => $request->dis2,
                "price" => $request->price,
                "margin" => $request->margin,
                "amount" => intval($request->amount),
                "type" => $request['type'],
                'end_date' => $request['end_date'],
                'time_period' => $request['time_period']

            ]);
            $ww =  Wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request['product_id'],
                'shop_id' => $request['shop_id'],
                'details_wishlist' => [$details_wishlist]

            ]);
            // dd($ww);

            return redirect()->back();
        } else if ($request->which_btn == '5') {
            // dd($request->all());
            if ($request->type == 'flashsale' && $request->receive_product == 'receive') {

                // dd($request->inv_ref);
                if ($request['type'] == 'flashsale') {
                    $product_stock = flash::where('id', $request['product_id'])->get();
                } else {
                    $product_stock = Product::where('id', $request['product_id'])->get();
                }

                foreach ($product_stock as $value) {

                    $Dis1 = $value->product_option['dis1'];
                    $Dis2 = $value->product_option['dis2'];
                    $key_dis1 = array_search($request->dis1, $Dis1);
                    $key_dis2 = array_search($request->dis2, $Dis2);
                    $lengthDis2 = count($Dis2);
                    $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                }

                $inv_products = ([
                    "product_id" => $request->product_id,
                    "option1" => $request->option1,
                    "option2" => $request->option2,
                    "dis1" => $request->dis1,
                    "dis2" => $request->dis2,
                    "price" => $request->price,
                    "margin" => $request->margin,
                    "stock_key" => $stock_key,
                    "amount" => intval($request->amount),
                    "type" => $request['type'],
                    'end_date' => $request['end_date'],
                    'time_period' => $request['time_period'],
                    'receive_product' => $request['receive_product']

                ]);

                $invs_check = invs::where('user_id', Auth::user()->id)
                    ->where('shop_id', $request->shop_id)
                    ->where('total', $request->price * intval($request->amount))
                    ->where('status', 21)
                    ->orderBy('created_at', 'desc')
                    ->get();
                $inv_ref = $time->format('YmdHis') . Auth::user()->id;


                if (
                    count($invs_check) <= 0 || $invs_check[0]->inv_products[0]['dis1'] != $request->dis1 ||
                    $invs_check[0]->inv_products[0]['dis2'] != $request->dis2 || $invs_check[0]->inv_products[0]['amount'] != $request->amount
                ) {
                    $invscount = invs::create([
                        'inv_ref' => $inv_ref,
                        'user_id' => Auth::user()->id,
                        'shop_id' => $request->shop_id,
                        'inv_products' => [$inv_products],
                        // 'shipping_cost'=> null,
                        // 'payment'=> '',
                        // 'campaign_id'=> '',
                        // 'shipping_id'=> '',
                        'total' => $request->price * intval($request->amount),
                        'note' => '',
                        // 'coupon_id'=>1,
                        'status' => 21,
                        // 'shipping_note'=>'',
                        'created_at' => $time,
                        // 'updated_at'=> ''
                    ]);
                } else {
                    $data = [];
                    $payment = [];

                    $data['shop'] = shops::where('id', $request->shop_id)->get();
                    $data['product'] = flash::where('id', $request->product_id)->get();
                    $payment_inv = invs::where('inv_ref', $invs_check[0]->inv_ref)->get();
                    foreach ($payment_inv as $pay) {
                        foreach ($pay->inv_products as $key => $inv) {
                            $data['payment'][] = $inv;
                        }
                    }
                    $data['receive_product'] = $request->receive_product;
                    $data['total_price'] = $request->price * $request->amount;
                    $data['type'] = $request->type;
                    $data['inv_ref'] = $invs_check[0]->inv_ref;


                    return view('pages.product-paymentReceive', $data, compact('inv_ref'));
                }




                $data = [];
                $payment = [];

                $data['shop'] = shops::where('id', $request->shop_id)->get();
                $data['product'] = flash::where('id', $request->product_id)->get();
                $payment_inv = invs::where('inv_ref', $inv_ref)->get();
                // dd($payment_inv);
                foreach ($payment_inv as $pay) {
                    foreach ($pay->inv_products as $key => $inv) {
                        $data['payment'][] = $inv;
                    }
                }
                $data['receive_product'] = $request->receive_product;
                $data['total_price'] = $request->price;
                $data['type'] = $request->type;
                $data['inv_ref'] = $inv_ref;


                return view('pages.product-paymentReceive', $data, compact('inv_ref'));
            }
            return redirect('basket');
        }
    }

    public function __delete($inv_ref, $inv_no, $product_id,  $index, $shop_id)
    {

        $data['status'] = 'true';
        // return $data;
        // dd($inv_ref);
        // exit;
        $index = explode(',', $index);
        $basket_allready =  invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)
            ->where('shop_id', $shop_id)->where('status', 0);
        // dd($basket_allready->get());
        // exit;

        $basket_allready_delete = $basket_allready->get()[0]->inv_products;
        $sum = 0;
        // dd($index);
        foreach ($index as $k_index => $v_index) {
            // dd($basket_allready_delete);
            // // exit;
            // echo $v_index;
            $amount_delete = $basket_allready_delete[$v_index]['amount'];
            $price_delete = $basket_allready_delete[$v_index]['price'];
            // return $price;
            // dd($amount_delete);
            $sum += $price_delete * $amount_delete;
            unset($basket_allready_delete[$v_index]);
        }
        // echo gettype($basket_allready_delete); exit;
        $basket_allready_delete = array_values($basket_allready_delete);
        $basket_allready_delete = json_encode($basket_allready_delete);
        // dd($basket_allready_delete);
        $total_delete = $basket_allready->get()[0]->total - $sum;
        $basket_allready->update([
            'inv_products' => $basket_allready_delete,
            'total' =>  $total_delete
        ]);
        $delete = invs::where('inv_products', 'like', '%[]%')->delete();

        $product_basket = invs::where('user_id', Auth::user()->id)->where('status', 0)->get();
        if ($delete) {
            $data['status'] = 'true';
            $data['index'] = count($product_basket);
        }
        return $data;
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        // echo '<pre>'.$request->index.'</pre>'; exit;
        $status = $this->__delete($request->inv_ref, $request->inv_no, $request->product_id, $request->index, $request->shop_id);
        // dd($status);
        if ($request->type == 'ajax') {
            return $status;
        }
        return redirect()->back();
    }


    public function bills(Request $request) {
        // dd($request->all());

        // foreach ($request->products as $key => $value) {
        //     # code...
        // }
        // dd($request->inv_ref);
        $cookie = Cookie::get('link');
        if ($cookie) {
            $cookie_data = json_decode($cookie);
        }
        // dd($cookie);
        // $uid_controller = new uidmpController;
        // $uid_controller->set_uidmp($request->inv_ref);
        $inv_ref = $request->inv_ref;
        $a_inv_ref = explode('-', $request->inv_ref);
        if (sizeof($a_inv_ref) == 1) {
            $a_inv_ref[1] = null;
        }
        // dd($request->products);
        $shop_id = $a_shop = $a_wh_product = $a_product = $a_inv_product = $a_shipty = [];
        foreach ($request->products as $k_product => $v_product) {
            array_push($shop_id, $k_product);
            foreach ($v_product as $k_product2 => $v_product2) {
                array_push($a_wh_product, $v_product2);
            }
        }

        // CHECK BACK BUTTON
        $a_chk_inv = invs::where('inv_ref', $request->inv_ref)
            ->whereIn('shop_id', $shop_id)
            ->where('status', '=', '0')
            ->get();
        if (sizeof($a_chk_inv) == 0) {
            return redirect("/profile_my_sale");
        }

        // print_r($a_wh_product); exit;
        $sum = 0;
        $a_plain_abc_range = range("A", "Z");
        $s_max_abc = 'A';

        $s_new_max_abc = invs::where('inv_ref', $request->inv_ref)
            ->whereNotIn('shop_id', $shop_id)
            ->whereNotIn(DB::raw("JSON_UNQUOTE( JSON_EXTRACT(inv_products, '$[0].product_id') )"), $a_wh_product)
            ->max('inv_no');
        // ->max('inv_no'); // ข้อมูลตะกร้า (where
        // dd($s_new_max_abc);
        if (isset($s_new_max_abc) && $s_new_max_abc != '') {
            $i_pos_abc = array_search($s_new_max_abc, $a_plain_abc_range);
            $s_max_abc = $a_plain_abc_range[$i_pos_abc + 1];
        }

        // เริ่ม **(function index error กรณีไม่มี ข้อมูลในตะกร้า ให่ประกาศ $total = 0; เพิ่ม)
        // $old_invs = invs::where('inv_ref', $request->inv_ref)->whereIn('shop_id', $shop_id)->where('status', 0)->get();
        // END ORIGINAL
        // COMMENT NEW CODE
        $old_invs = invs::where('inv_ref', $request->inv_ref)->whereIn('shop_id', $shop_id)->where('status', 0)
            ->where(function ($query) use ($a_wh_product) {
                foreach ($a_wh_product as $key => $val) {
                    $query->orWhere(DB::raw("JSON_CONTAINS( JSON_EXTRACT(inv_products, '$[*].product_id'), '[\"" . $val . "\"]' )"), '=', '1');
                }
                return $query;
            })
            ->get(); // ข้อมูลตะกร้า (where เฉพาะร้านค้าจากสินค้าที่ลูกค้าเลือก)
        // dd($old_invs); exit;
        foreach ($old_invs as $k_inv => $v_inv) {
            foreach ($v_inv->inv_products as $k_product => $v_product) {
                $a_inv_product[$v_inv['shop_id']][$v_product['product_id']] = $v_product;
                array_push($a_wh_product, $v_product['product_id']);
            }
        }
        $a_wh_product = array_unique($a_wh_product);

        $r_product = Product::whereIn('id', $a_wh_product)->whereNotNull('shipty_id')->get();
        foreach ($r_product as $k_product => $v_product) {
            $a_shipty[$v_product['shop_id']][$v_product['shipty_id']][] = $v_product['id'];
            $a_product[$v_product['id']] = $v_product;
        }

        $q_chk_addr = Address::where('user_id', Auth::user()->id)
            ->where(function ($query) {
                return $query->where('is_last_ship', '=', 'Y')->orWhere('status', '=', '1');
            })->exists();
        if ($q_chk_addr) {
            $o_user_addr = Address::where('user_id', Auth::user()->id)
                ->where(function ($query) {
                    return $query->where('is_last_ship', '=', 'Y')->orWhere('status', '=', '1');
                })
                ->orderBy('is_last_ship', 'desc')
                ->first();
        } else {
            $o_user_addr = Address::where('user_id', Auth::user()->id)
                ->orderBy('status', 'desc')
                ->first();
        }

        $address = Address::where('user_id', Auth::user()->id)->get();

        $a_ship_detail = [];
        $r_ship_detail = shipping_details::whereIn('shop_id', $shop_id)->whereIn('shipty_id', array(4, 5, 6))
            ->orWhere(function ($query) {
                return $query->whereIn('shipty_id', array(1, 2, 3, 7, 8, 9))->where('shop_id', '=', 0);
            })
            ->orderBy('shipde_weight', 'ASC')
            ->orderBy('shipde_dimen', 'ASC')
            ->get();
        foreach ($r_ship_detail as $k_ship_detail => $v_ship_detail) {
            $a_ship_detail[$v_ship_detail['shop_id']][$v_ship_detail['shipty_id']][] = $v_ship_detail;
        }
        // echo '<pre>';
        // print_r($a_ship_detail);
        // echo '</pre>'; exit;
        $ship_detail = json_encode($a_ship_detail);

        // echo '$a_shipty = <pre>';
        // print_r($a_inv_product);
        // print_r($request->amount);
        // print_r($a_shipty);
        // echo '</pre>'; exit;

        $abc_range = range($s_max_abc, "Z");
        $new_data = $weight = $a_dimen = $a_amt = $result = array();
        $k_tmp_shipty = $k_tmp_ship_product1 = '';

        $a_province = $a_central_prov = $a_north_prov = $a_en_prov = $a_south_prov = array();
        $r_province = Province::get();
        if ($r_province) {
            foreach ($r_province as $key => $val) {
                $a_province[$val->name_th] = $val->region_id;
                if ($val->region_id == '1') {
                    $a_central_prov[] = $val->name_th;
                } elseif ($val->region_id == '4') {
                    $a_north_prov[] = $val->name_th;
                } elseif ($val->region_id == '2') {
                    $a_en_prov[] = $val->name_th;
                } elseif ($val->region_id == '3') {
                    $a_south_prov[] = $val->name_th;
                }
            }
        }

        $shippingPriceList = $a_shop_ship_weight = [];
        $i_inv_no = 1;
        // dd($a_shipty);
        // dd($old_invs);
        // Loop 1 : วนลูปตามลิสของ ร้านค้า ทั้งหมด โดยที่ร้านค้ามาจาก สินค้า ที่ลูกค้าสั่งซื้อ
        foreach ($a_shipty as $k_shipty => $v_shipty) {
            // Loop 2 : วนลูปตามลิสของ ประเภทการจัดส่ง ที่ร้านค้านั้นๆมีบริการให้
            foreach ($v_shipty as $k_ship_product1 => $v_ship_shop1) {
                // Loop 3 : วนลูปตามลิสของสินค้า **Value คือ PK ของสินค้า**
                foreach ($v_ship_shop1 as $k_ship_product => $v_ship_shop) {
                    $i_total_ship_cost = 0;
                    // echo $k_ship_product.' - '.$v_ship_shop.'<hr>';
                    // Loop 4 : วนลูปตามลิสของ Invoice ที่ยังไม่ได้ชำระเงิน
                    $sum = 0;
                    foreach ($old_invs as $k_inv => $v_inv) {
                        foreach ($v_inv->inv_products as $k_product => $v_product) {
                            if ($k_shipty == $v_inv['shop_id'] && $v_ship_shop == $v_product['product_id']) {
                                if ($k_tmp_shipty != $k_shipty || $k_tmp_ship_product1 != $k_ship_product1) {
                                    if ($cookie) {
                                        $new_data[$k_shipty . '_' . $k_ship_product1][$k_ship_product1] = [
                                            'inv_ref' => $v_inv->inv_ref,
                                            'shop_id' => $v_inv->shop_id,
                                            'inv_products' => [], // WAIT UPDATE
                                            'user_id' => Auth::user()->id,
                                            'shipping_cost' => 0.00, // WAIT UPDATE
                                            'payment' => 'bank',
                                            'campaign_id' => null,
                                            'shipping_id' => null, // WAIT UPDATE
                                            'total' => 0, // WAIT UPDATE
                                            'note' => '',
                                            'coupon_id' => null,
                                            'status' => 0,
                                            'shipping_note' => null,
                                            'updated_at' => new DateTime,
                                            'uidmp' => $cookie_data->uidmp,
                                        ]; // สร้างข้อมูลใหม่ไป insert
                                    } else {
                                        $new_data[$k_shipty . '_' . $k_ship_product1][$k_ship_product1] = [
                                            'inv_ref' => $v_inv->inv_ref,
                                            'shop_id' => $v_inv->shop_id,
                                            'inv_products' => [],
                                            'user_id' => Auth::user()->id,
                                            'shipping_cost' => 0.00,
                                            'payment' => 'bank',
                                            'campaign_id' => null,
                                            'shipping_id' => null,
                                            'total' => 0,
                                            'note' => '',
                                            'coupon_id' => null,
                                            'status' => 0,
                                            'shipping_note' => null,
                                            'updated_at' => new DateTime,
                                        ]; // สร้างข้อมูลใหม่ไป insert
                                    }
                                }
                                $k_tmp_shipty = $k_shipty;
                                $k_tmp_ship_product1 = $k_ship_product1;
                                
                                if (in_array($v_product['product_id'], $v_ship_shop1)) {
                                    $val =  $a_inv_product[$v_inv['shop_id']][$v_product['product_id']];
                                    $amount = $request->amount[$v_inv['shop_id']][$v_product['product_id']]; // amount [shop id] [index ของ สินค้า]

                                    $lengthDis = count($a_product[$v_product['product_id']]['product_option']['dis2']);
                                    $key_dis1 = array_search(0, $a_product[$v_product['product_id']]['product_option']['dis1']);
                                    $key_dis2 = array_search(0, $a_product[$v_product['product_id']]['product_option']['dis2']);
                                    $stock_key = $key_dis1 * $lengthDis + $key_dis2;
                                    $in_stock = $a_product[$v_product['product_id']]['product_option']['stock'][$stock_key];

                                    if ($amount > $in_stock) {
                                        return redirect()->back()->withErrors(['msg' => 'ขออภัย สินค้าบางรายการมีจำนวนไม่เพียงพอ']);
                                    }

                                    $val['amount'] = $amount;
                                    $val['dimen'] = ( $a_product[$v_product['product_id']]['product_L'] + $a_product[$v_product['product_id']]['product_W'] + $a_product[$v_product['product_id']]['product_H'] );
                                    $val['weight'] = $a_product[$v_product['product_id']]['product_weight'];

                                    // echo '<pre>';
                                    // print_r($address_default);
                                    // echo '</pre>'; exit;

                                    $o_shop_addr = Address::where('status_address', '2')
                                    ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$v_inv->shop_id.')')
                                        ->first();
                                    // echo $v_product['product_id'].' - '.$val['weight'].' - .'.$val['dimen'].' - '.$k_ship_product1; exit;
                                    // dd($a_ship_detail);
                                    list($i_ship_price, $o_ship_de) = $this->calShipPrice( $v_product['product_id'], $amount, $val['weight'], $val['dimen'], $k_ship_product1, $o_shop_addr,  $o_user_addr, $a_ship_detail, $a_central_prov, $a_north_prov, $a_en_prov, $a_south_prov, $v_inv->shop_id);
                                    // echo $i_ship_price; exit;
                                    // $i_ship_price = $this->calShipPrice( $v_product['product_id'], $a_product[$v_product['product_id']]['weight'], $a_product[$v_product['product_id']]['dimen'], $k_ship_product1, $o_shop_addr,  $o_user_addr, $a_ship_detail);

                                    // echo 'product_id= '.$v_product['product_id'].' $i_ship_price = '.$i_ship_price.' - '.$o_ship_de->id.'<hr>';

                                    // print_r($i_ship_price.' --- ');
                                    // $val['ship_price'] = $i_ship_price * $amount; // Old Edition
                                    if(isset($shippingPriceList[$k_shipty][$k_ship_product1])){
                                        $shippingPriceList[$k_shipty][$k_ship_product1] += floatval($i_ship_price);
                                    }else{
                                        $shippingPriceList[$k_shipty][$k_ship_product1] = floatval($i_ship_price);
                                    }

                                    $val['ship_price'] = $i_ship_price;
                                    $i_total_ship_cost += $val['ship_price'];
                                    // echo '1. -> '.$k_inv.' - '.$k_shipty.' == '.$k_ship_product.' - '.$k_product2.' == '.$k_ship_product1.' - '.$v_product['product_id'].' -k_ship_product1 '.$k_ship_product1.' ship_price = '.$val['ship_price'].' - '.$v_ship_shop.' - '.$v_inv->shop_id.'<hr>';

                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['shipty_id'] = $a_product[$v_product['product_id']]['shipty_id'];
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['shipping_cost'] = $i_total_ship_cost;
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['shipping_id'] = $k_ship_product1;

                                    // Group weight by shipty
                                    if( !isset( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'] ) ) {
                                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'] = 0;
                                    }
                                    if( !isset( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'] ) ) {
                                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'] = 0;
                                    }
                                    if( !isset( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'] ) ) {
                                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'] = 0;
                                    }
                                    // echo $k_shipty.'_'.$k_ship_product1.'<hr>';
                                    // echo $v_ship_shop; exit;
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'] +=  $a_product[$v_ship_shop]['product_weight'];
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'] += ( $a_product[$v_ship_shop]['product_L'] + $a_product[$v_ship_shop]['product_W'] + $a_product[$v_ship_shop]['product_H'] );
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'] += $amount;
                                    // Group weight by shipty

                                    $result[$v_inv->shop_id][$k_ship_product1]['shop_city'] = $o_shop_addr->city;
                                    if( isset( $o_user_addr->city ) ) {
                                        $result[$v_inv->shop_id][$k_ship_product1]['cust_city'] = $o_user_addr->city;
                                    }
                                    if( $o_ship_de ) {
                                        $tempShippingDetail = clone $o_ship_de;
                                        $result[$v_inv->shop_id][$k_ship_product1] = $tempShippingDetail;
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_id'] = $o_ship_de->shipde_id;
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_price'] = number_format($i_total_ship_cost, 2, ".", "");
                                    } else {
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_id'] = 1904;
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_price'] = 0;
                                    }
                                    if( !isset( $a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'] ) ) {
                                        $a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'] = 0;
                                    }
                                    $a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'] += $a_product[$v_ship_shop]['product_weight'];
                                    // echo $v_inv->shop_id.' - '.$k_ship_product1.' - '.$a_product[$v_ship_shop]['product_weight'].' - '.$a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'].'<hr>';

                                    //เพิ่มข้อมูล product 1 ชิ้น ลงใน array
                                    array_push($new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['inv_products'], $val);
                                    // รวมราคาสินค้าทั้งหมด
                                    $sum += $val['amount'] * $val['price'];
                                }
                                // END
                            }
                        }
                        $v_inv->delete();
                        
                    }

                    // dd('1212');

                    // echo $k_shipty.'_'.$k_ship_product1.'<hr>';
                    if( !isset($new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['total']) ) {
                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['total'] = 0;
                    }
                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['total'] += $sum; //ใส่ราคาผลรวมของร้านค้า
                }

                $o_shop_addr = Address::where('status_address', '2')
                ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$v_inv->shop_id.')')
                    ->first();

                $a_shop_ship_weight[$k_shipty]['addr'] = $o_shop_addr->address1.' '.$o_shop_addr->address2.' '.$o_shop_addr->district.' '.$o_shop_addr->county.' '.$o_shop_addr->city.' '.$o_shop_addr->zipcode;
                $a_shop_ship_weight[$k_shipty]['tel'] = $o_shop_addr->tel;
                $a_shop_ship_weight[$k_shipty]['id'] = $o_shop_addr->id;

                $s_inv_ref2 = date('YYmmdd').$k_shipty.str_pad($i_inv_no, 2, "0", STR_PAD_LEFT);
                $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['inv_ref2'] = $s_inv_ref2;

                invs::create( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1] );

                if( !isset( $weight[$k_shipty][$k_ship_product1] ) ) {
                    $weight[$k_shipty][$k_ship_product1] = 0;
                }
                if( !isset( $a_dimen[$k_shipty][$k_ship_product1] ) ) {
                    $a_dimen[$k_shipty][$k_ship_product1] = 0;
                }
                if( !isset( $a_amt[$k_shipty][$k_ship_product1] ) ) {
                    $a_amt[$k_shipty][$k_ship_product1] = 0;
                }
                // echo '2. -> $k_shipty = '.$k_shipty.' - $k_ship_product1 = '.$k_ship_product1.' v_ship_shop = '.$v_ship_shop.' product_id = '.$v_product['product_id'].' - '.$new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'].'<hr>';
                $weight[$k_shipty][$k_ship_product1] += $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'];
                $a_dimen[$k_shipty][$k_ship_product1] += $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'];
                $a_amt[$k_shipty][$k_ship_product1] += $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'];

                $i_inv_no++;
            }
        }
        // exit;
        // dd($a_shop_ship_weight);
        // dd($shippingPrice);
        $weight_shop = json_encode( $weight );

        // echo '$result = <pre>';
        // print_r($result);
        // echo '</pre>'; exit;

        $payment = [];
        $sum = 0;
        $inv_shop = [];

        $invs = invs::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->whereIn('shop_id', $shop_id)->where('status', 0)
            ->where(function ($query) use ($a_wh_product) {
                foreach ($a_wh_product as $key => $val) {
                    $query->orWhere(DB::raw("JSON_CONTAINS( JSON_EXTRACT(inv_products, '$[*].product_id'), '[\"".$val."\"]' )"), '=', '1');
                }
                return $query;
            })
            ->get();

        foreach ($invs as $inv) {
            if (!in_array($inv->shop_id, $inv_shop)) {
                array_push($inv_shop, $inv->shop_id);
            }
        }

        $r_shop = shops::whereIn('id', $inv_shop)->get();
        foreach ($r_shop as $k_shop => $v_shop) {
            $a_shop[$v_shop['id']] = $v_shop;
        }
        // dd($shop);
        // $abc_range = range("A","Z");
        $abc_offset = 0;
        foreach ($invs as $pay) {
            $pay->inv_no = $abc_range[$abc_offset];
            $pay->save();
            $abc_offset++;

            $shop_id_pay = $pay->shop_id;
            // $i_loop = 1;
            foreach ($pay->inv_products as $key => $pay1) {
                // dd($pay1);
                $pay1['shop_id'] = $shop_id_pay;
                $pay1['shipty_id'] = $pay->shipty_id;

                // echo print_r($payment).'<hr>';
                if ($payment) {
                    // echo $i_loop.'<hr>';
                    // dd($payment);
                    $status = true;
                    foreach ($payment as  $paymentkey => $value) {
                        // echo $value['product_id'];
                        if (($pay1['product_id'] == $value['product_id']) &&
                            ($pay1['dis1'] == $value['dis1']) &&
                            ($pay1['dis2'] == $value['dis2'])
                        ) {
                            $payment[$paymentkey]['amount'] = intval($value['amount']) + intval($pay1['amount']);
                            $status = false;
                        }
                        // dd($sum);

                    }
                    if ($status) {
                        array_push($payment, $pay1);
                    }
                } else {
                    array_push($payment, $pay1);
                }
            }
        }

        // Loop สำหรับเก็บ Product_id เพื่อจะไปค้นหาว่าเป็นสินค้าอะไร เช่น ชื่อสินค้า รูปภาพสินค้า
        // dd($invs);
        $countAsset = 0;
        if (Session::has('walletAddress') && Session::get('walletAddress')) {
            $countAsset = Asset::where('wallet_address', Session::get('walletAddress'))->count();
        }

        $total_price = 0;
        $product_invs = [];
        $total_array = [];
        $amount = [];
        foreach ($invs as $inv) {
            foreach ($inv->inv_products as $id) {
                if (!in_array($id['product_id'], $product_invs)) {
                    array_push($product_invs, $id['product_id']);
                    // array_push($amount, $id['amount']);
                    $amount[$id['product_id']] = $id['amount'];
                }
            }

            // dd($inv->total);
            if (!in_array($inv->total, $total_array)) {
                array_push($total_array, $inv->total);
            }
            $total_price = array_sum($total_array);
        }
        // dd($amount);

        $product = [];
        $product_id = $r_product;
        $disountNFT = 0;
        // AUI EDIT 20210810
        foreach ($product_id as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $product_id[$key]['product_img'] = array('0' => '../no_image.png');
            }

            if($countAsset > 0){
                $disountNFT += $val['disc_nft'];
            }
        }

        $preOrder = PreOrder::whereIn('id', $product_invs)->select('id', 'name', 'product_img', 'product_weight', 'shop_id')->get();
        $flashsale = flash::whereIn('id', $product_invs)->select('id', 'name', 'product_img', 'type')->get();

        $product['product'] = $product_id;
        $product['flashsale'] = $flashsale;
        $product['preOrder'] = $preOrder;

        // echo '$address_default = <pre>';
        // print_r($address_default);
        // echo '</pre>'; exit;

        foreach ($shop_id as $shop_shippid => $shipp_id) {
            // dd($shipp_id);
            $shipid = shipping::where('shop_id', $shipp_id)->first();
            // dd($shipid);
            if (!$shipid) {
                // dd($shipid);
                shipping::create([
                    'shop_id' => $shipp_id,
                    'ship_default' => 1,
                    'ship_price' => 0.00,
                    'shipde_id' => 0,
                    'shipty_id' => 0,
                ]);
            }elseif($shipid->ship_default == null) {
                shipping::where('ship_id', $shipid->ship_id)->update([
                    'ship_default' => 1,
                ]);
            }
        }

        $ship = shipping::get();
        // dd($ship);
        // echo '<pre>';
        // print_r($ship);
        // echo '</pre>'; exit;
        $shipping = [];
        // dd($ship);
        // if ($ship->count() > 0) {
        foreach ($ship as $key_ship => $shipp) {
            $shop_id1 = $shipp->shop_id;
            if ($shipp) {
                $shipping[$shop_id1] = explode(',', $ship[$key_ship]->ship_default);
            }
            $ship_name = json_decode($shipp->ship_name);
            $shipping[$shop_id1]['ship_name'][4] = $shipping[$shop_id1]['ship_name'][5] = $shipping[$shop_id1]['ship_name'][6] = '';
            if (isset($ship_name[0])) {
                $shipping[$shop_id1]['ship_name'][4] = $ship_name[0];
            }
            if (isset($ship_name[1])) {
                $shipping[$shop_id1]['ship_name'][5] = $ship_name[1];
            }
            if (isset($ship_name[2])) {
                $shipping[$shop_id1]['ship_name'][6] = $ship_name[2];
            }
        }
        // dd($invs);
        // }
        // dd($shipping);
        // dd($weight);
        $ship_type = [];
        $ship_type_db = shipping_type::all();

        foreach ($ship_type_db as $kst => $vst) {
            $ship_type[$vst->shipty_id] = $vst;
        }
        foreach ($ship as $key_ship => $shipp) {
            // dd($shipp);
            // echo $shipp->shipty_id; exit;
            $shipping[$shipp->shop_id]['ship_name'][1] = $ship_type[1]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][2] = $ship_type[2]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][3] = $ship_type[3]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][7] = $ship_type[7]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][8] = $ship_type[8]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][9] = $ship_type[9]->shipty_name;
            // $shipping[$shipp->shop_id]['ship_name'][2] = $ship_type[2]->shipty_name;
            // $shipping[$shipp->shop_id]['ship_name'][3] = $ship_type[3]->shipty_name;
        }

        // ส่วนเพิ่มจากการทำ autofill การจัดส่ง
        $sort_id = sort($inv_shop);
        // dd($weight);

        // echo '$weight = <pre>';
        // print_r($weight);
        // echo '</pre>'; exit;
        // echo '$i_total_ship_cost > '.$i_total_ship_cost; exit;

        // echo '$result = <pre>';
        // print_r($result);
        // echo '</pre>'; exit;


        foreach ($result as $shopId => $detail) {
            foreach ($shippingPriceList[$shopId] as $subShippingTypeId => $shippingPrice) {
                if ($shippingPrice) {
                    $result[$shopId][$subShippingTypeId]->shipde_price = $shippingPrice;
                }
            }
        }

        $category_all = [];
        $category = Category::get();
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id', $value->category_id)->count();
            if ($value->data_subdets != "[]") {
                $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                $value['data_subdets'] = $sub;
            } else {
                $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
            }
            array_push($category_all, json_decode($value));
        }
        $clear = Cookie::forget('link');

        // LALAMOVE
        // $s_url = "https://rest.sandbox.lalamove.com/v3/quotations";
        // $headers = array('Authorization" => "hmac ".TOKEN, "Market": "TH", "Request-ID": "{{$inv_ref}}"')
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $s_url);
        // // SSL important
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output = curl_exec($ch);
        // curl_close($ch);

        // $this - > response['response'] = json_decode($output);

        // dd($invs);
        // return view('pages.product-payment', compact('address', 'address_default', 'shop', 'invs', 'inv_ref', 'payment', 'flashsale', 'product', 'product_id', 'total_price', 'ship', 'shipping', 'ship_type', 'ship_detail', 'ship_detail_weight', 'weight_shop', 'product_flash'));
        return response()->view('pages.product-payment', compact('disountNFT','countAsset', 'address', 'o_user_addr', 'a_shop', 'invs', 'inv_ref', 'a_inv_ref', 'payment', 'flashsale', 'product', 'product_id', 'total_price', 'category_all', 'ship', 'shipping', 'ship_type', 'ship_detail', 'weight', 'result', 'request','o_shop_addr','a_shop_ship_weight'))->withcookie($clear);
    }

    public function mappingBoxSizeByProductId($i_product_id)
    {
        $allBoxSizeOfProduct = 3;
        $mappedProductPackagingSize = [];

        $productPackagesInfo = Product::select(
            'box_size_id1',
            'box_size_id2',
            'box_size_id3',
            'box_pack_amt1',
            'box_pack_amt2',
            'box_pack_amt3'
        )->find($i_product_id);
        // dd($productPackagesInfo);
        if ($productPackagesInfo) {
            for ($i = 1; $i <= $allBoxSizeOfProduct; $i++) {
                if (isset($productPackagesInfo->{"box_size_id" . $i}) && !empty($productPackagesInfo->{"box_size_id" . $i})) {
                    $boxDimension = BoxSize::where('id', $productPackagesInfo->{"box_size_id" . $i})->sum('dimen');
                    $mappedProductPackagingSize[] = [
                        'boxSizeId' => $productPackagesInfo->{"box_size_id" . $i},
                        'dimension' => intval($boxDimension),
                        'amountLimit' => $productPackagesInfo->{"box_pack_amt" . $i},
                        'amount' => 0
                    ];
                }
            }
        }

        return $mappedProductPackagingSize;
    }

    public function getMatchPackaging($i_product_id, $amount = 1)
    {
        $amount = !empty($amount) ? intval($amount) : 1;
        $mappedBoxSize = $this->mappingBoxSizeByProductId($i_product_id);
        $packages = [];
        $limitAmountOrderbyIndex = [];

        if (count($mappedBoxSize) && $amount) {
            $balance = $amount;
            foreach ($mappedBoxSize as $boxSize) {
                if ($boxSize['amountLimit']) {
                    $limitAmountOrderbyIndex[] = $boxSize['amountLimit'];
                }
            }
            // dd($limitAmountOrderbyIndex);
            sort($limitAmountOrderbyIndex);

            if ($balance > 0) {
                while ($balance > 0) {
                    $loopLimit = count($limitAmountOrderbyIndex);
                    foreach ($limitAmountOrderbyIndex as $key => $limit) {
                        // echo '<hr>limit - '.$limit.' <= '.$balance.' - ';
                        if ($limit < $balance) {
                            // echo 'loopLimit: '.$loopLimit.' === '.$key.'<hr>';
                            if ($loopLimit === $key + 1) {
                                $newBalance = $limit - $balance;
                                // echo 'Limit: '.$limit.' <= '.$balance.' - ';
                                $balance = abs($newBalance);
                                // echo $newBalance.'<hr>';
                                $mappedBoxSize[$key]['amount'] = $limit;
                                $packages[] = $mappedBoxSize[$key];
                            } else {
                                continue;
                            }
                        } else {
                            // echo 'Else - '.$limit.' - '.$balance.'<hr>';
                            if ($limit == $balance) {
                                $mappedBoxSize[$key]['amount'] = $limit;
                            } else {
                                $mappedBoxSize[$key]['amount'] = $balance;
                            }

                            $packages[] = $mappedBoxSize[$key];
                            $balance = 0;
                            break;
                        }
                    }
                }
            }
        }

        return $packages;
    }

    public function calShipPrice( $i_product_id, $amount = 1, $i_weight, $i_dimen, $i_shipty_id, $o_shop_addr, $o_user_addr, $a_ship_detail, $a_central_prov, $a_north_prov, $a_en_prov, $a_south_prov, $i_shop_id) {
        $packages = $this->getMatchPackaging($i_product_id, $amount);
        // dd($a_ship_detail);
        $s_price_area = 'shipde_price';
        $a_vicinity_prov = array('กรุงเทพมหานคร','นครปฐม','นนทบุรี','ปทุมธานี','สมุทรปราการ','สมุทรสาคร');
        if( $i_shipty_id == '7' ) { // FLASH
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพฯและปริมณฑล ถึง เหนือ, กลาง, ใต้ และ ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_bkk_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ และ ปริมณฑล ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_bkk_to_bkk';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_shop_addr->city, $a_central_prov) && in_array($o_shop_addr->city, $a_central_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคกลาง ภายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_central_in_province';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_shop_addr->city, $a_central_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) && $o_shop_addr->city != $o_user_addr->city ) {
                    // ภาคกลาง ถึง เหนือ, กลาง, ใต้, ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_central_to_other_region';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_shop_addr->city, $a_central_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคกลาง ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_central_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && in_array($o_user_addr->city, $a_en_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคตะวันออกเฉียงเหนือ ภาายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_en_in_province';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && $o_shop_addr->city != $o_user_addr->city && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคตะวันออกเฉียงเหนือ ถึง เหนือ, กลาง, ใต้, ตะวันตกเฉียงเหนือ
                    $s_price_area = 'shipde_en_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคตะวันออกเฉียงเหนือ ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_en_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_south_prov) && in_array($o_user_addr->city, $a_south_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคใต้ ภายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_south_in_province';
                } elseif( in_array($o_shop_addr->city, $a_south_prov) && $o_shop_addr->city != $o_user_addr->city && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคใต้ ถึง เหนือ, กลาง, ใต้, ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_south_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_south_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคใต้ ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_south_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_north_prov) && in_array($o_user_addr->city, $a_north_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคเหนือ ภายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_north_in_province';
                } elseif( in_array($o_shop_addr->city, $a_north_prov) && $o_shop_addr->city != $o_user_addr->city && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคเหนือ ถึง เหนือ, กลาง, ใต้, ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_north_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_north_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคเหนือ ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_north_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคตะวันออกเฉียงเหนือ ถึง เหนือ, กลาง, ใต้, ตะวันตกเฉียงเหนือ
                    $s_price_area = 'shipde_en_to_other_region';
                }
            }
        } elseif( $i_shipty_id == '8' ) { // J&T
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price';
                } elseif( !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price_cross_area';
                }
            }
        } elseif( $i_shipty_id == '9' ) { // Best Express
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_bkk_to_vicinity';
                } elseif( $o_shop_addr->city == 'กรุงเทพมหานคร' && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ ถึงต่างจังหวัด
                    $s_price_area = 'shipde_bkk_to_other_region';
                } elseif( $o_shop_addr->city == $o_user_addr->city ) {
                    // ภายในจังหวัด
                    $s_price_area = 'shipde_within_province';
                } elseif( $o_shop_addr->city != 'กรุงเทพมหานคร' && $o_user_addr->city == 'กรุงเทพมหานคร' ) {
                    // ต่างจังหวัด ถึง กรุงเทพ
                    $s_price_area = 'shipde_province_to_bkk';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ต่างจังหวัด ถึง ต่างจังหวัด
                    $s_price_area = 'shipde_province_to_province';
                }
            }
        } elseif( $i_shipty_id == '4' || $i_shipty_id == '5' || $i_shipty_id == '6' ) { // Self Shipping
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_price';
                } elseif( in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ ถึงต่างจังหวัด
                    $s_price_area = 'shipde_price_cross_area';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ต่างจังหวัด ถึง กรุงเทพ
                    $s_price_area = 'shipde_price_cross_area';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ต่างจังหวัด ถึง ต่างจังหวัด
                    $s_price_area = 'shipde_price_cross_area';
                } else {
                    $s_price_area = 'shipde_price';
                }
            }
        } else {
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price';
                } elseif( in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) || !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price_cross_area';
                } elseif( $a_province[$o_shop_addr->city] != $a_province[$o_user_addr->city] ) {
                    $s_price_area = 'shipde_price_uptown';
                }
            }
        }
        // echo $s_price_area.' - '.$o_shop_addr->city.' - '.$o_user_addr->city.' - '.(!in_array($o_shop_addr->city, $a_vicinity_prov)).' && '.(in_array($o_shop_addr->city, $a_central_prov)).' && '.(in_array($o_user_addr->city, $a_vicinity_prov)).'<hr>';
        // exit;

        $a_ship_detail_auto = [];
        if( $i_shipty_id < 4 || $i_shipty_id > 6 ) {
            $i_size = sizeof( $a_ship_detail[0][$i_shipty_id] );
            $a_ship_detail_auto = $a_ship_detail[0][$i_shipty_id];
        } else {
            $i_size = sizeof( $a_ship_detail[$i_shop_id][$i_shipty_id] );
            $a_ship_detail_auto = $a_ship_detail[$i_shop_id][$i_shipty_id];
        }

        // dd($a_ship_detail_auto);
        //ฟังก์ชั่น คำนวน น้ำนหัก เมื่อปริมาณน้ำหนักมากกว่า max ของชนส่ง --
        if ($i_weight > $a_ship_detail_auto[$i_size-1]['shipde_weight'] && $i_dimen > $a_ship_detail_auto[$i_size-1]['shipde_dimen']) {

            $round = floor($i_weight / $a_ship_detail_auto[$i_size-1]['shipde_weight']);
            // echo '$round > '.$round; exit;

            $i_total_ship_cost = $round * $a_ship_detail_auto[$i_size-1][$s_price_area];
            $i_weight = $i_weight - ($round * $a_ship_detail_auto[$i_size-1]['shipde_weight']);
        }

        //ฟังก์ชั่นคำนวนค่าส่ง
        $i_price = 0;
        $o_ship_de = null;
        $i_start = 1;
        foreach($packages as $package){
            foreach($a_ship_detail_auto as $ship_de){
                if( $ship_de->shipty_id >=4 && $ship_de->shipty_id <= 6 ) {
                    $ship_de->shipde_dimen = 999;
                }
                // echo $ship_de->shipde_weight.' - '.$i_weight.' - '.$package['amount'].' Dimen= '.$ship_de->shipde_dimen.' - '.$package['dimension'].' == '.$ship_de[$s_price_area].' - '.$s_price_area.'<hr>';
                if( $i_start == 1 ) {
                    if( $ship_de->shipde_dimen > $package['dimension'] ) {
                        $i_price = $ship_de[$s_price_area];
                        $o_ship_de = $ship_de;
                        $i_start++;
                        break;
                    }
                } else {
                    // echo $ship_de->shipde_weight.' - '.$i_weight.' - '.$package['amount'].' - '.$ship_de->shipde_dimen.' - '.$package['dimension'].' == '.$ship_de[$s_price_area].'<hr>';
                    if($ship_de->shipde_weight >= ($i_weight * $package['amount']) && $ship_de->shipde_dimen >= $package['dimension']){
                        $i_price = $ship_de[$s_price_area];
                        $o_ship_de = $ship_de;
                        break;
                    }
                }
            }
        }
// echo $i_price; exit;
        $i_price = $i_price ? $i_price : 0;

        // dd(array($i_price, $o_ship_de));
        return array($i_price, $o_ship_de);
        // return $i_price;
    }

    public function getShipping(Request $request)
    {
        // dd($request->all());
        $invs = invs::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->where('shop_id', $request->id)->where('status', 1);
        if($request->type_shipping==1){

            $max = shipping_details::where('shipty_id', $request->type_shipping)
                ->where('shipty_id', $request->type_shipping)
                ->orderBy('shipde_weight', 'DESC')
                ->first();
            $min = shipping_details::where('shipty_id', $request->type_shipping)
                ->where('shipty_id', $request->type_shipping)
                ->orderBy('shipde_weight', 'ASC')
                ->first();

            $max_weight = $max->shipde_weight;
            $min_weight = $min->shipde_weight;

            $result = shipping_details::where('shipty_id', $request->type_shipping)
            ->where('shipde_weight', '>=',$request->weight)
                ->orderBy('shipde_weight', 'ASC')
                ->first();
            $tp = 0;
            if($request->weight <= $min_weight){
                $tp = $result->shipde_price;
            }else{
                $divide = ceil($request->weight/1000);
                if($request->weight >= $max_weight){
                    $tp = floatval($max->shipde_price)*$divide;
                    $result = $max;
                }else{
                    $tp = floatval($result->shipde_price)*$divide;
                }

            }
        }else{
            $ship_detail = shipping_details::where('shipty_id', $request->type_shipping)->orderBy('shipde_weight', 'DESC')->get();
            // น้ำหนักสูงสุด
            $maxw = shipping_details::where('shipty_id', $request->type_shipping)->max('shipde_weight');
            // ค่าส่งของน้ำหนักสูงสุด
            $maxp = shipping_details::where('shipty_id', $request->type_shipping)->where('shipde_weight', $maxw)->max('shipde_price');
            $result = '';
            // type_shipping 4 = กำหนดเอง
            if ($request->type_shipping == 4) {
                $ship_detail = shipping_details::where('shipty_id', $request->type_shipping)->where('shop_id', $request->id)->orderBy('shipde_weight', 'DESC')->get();
                // น้ำหนักสูงสุด
                $maxw = shipping_details::where('shipty_id', $request->type_shipping)->where('shop_id', $request->id)->max('shipde_weight');
                // ค่าส่งของน้ำหนักสูงสุด
                $maxp = shipping_details::where('shipty_id', $request->type_shipping)->where('shop_id', $request->id)->where('shipde_weight', $maxw)->max('shipde_price');
            }

            $tw = $request->weight;
            $tp = 0;
            // dd($tw);
            // dd($maxp);
            //ฟังก์ชั่น คำนวน น้ำนหัก เมื่อปริมาณน้ำหนักมากกว่า max ของชนส่ง
            if ($tw > $maxw) {

                $round = floor($request->weight / $maxw);
                // dd($round);
                $tp = $round * $maxp;
                $tw = $tw - ($round * $maxw);
            }
            // dd($tw);
            // dd($ship_detail);
            //ฟังก์ชั่นคำนวนค่าส่ง

            foreach ($ship_detail as $ship_de) {

                if ($tw <= $ship_de->shipde_weight) {
                    $p = $ship_de->shipde_price;
                    $result = $ship_de;
                }
            }

            $tp += $p;
        }
        //add ค่าส่ง to db
        $invs->update([
            'shipping_cost' => $tp,
            'shipping_id' => $result->shipde_id
        ]);

        // เพิีมค่าส่งในฟังก็ชั่น
        $result->shipde_price = number_format($tp, 2, ".", "");


        return $result;
    }


    public function checkout(Request $request)
    {
        // dd($request);
        // dd($request->inv_ref);
        if (isset($request->shop_id) && isset($request->key)) {
            //ถ้ามีที่ต้องลบ
            // dd($request->shop_id[]);
            // $inv_arr = explode(',',$inv_arr);
            $indexs = explode(',', $request->key);
            // $tests = [];
            foreach (explode(',', $request->shop_id) as $key => $value) {
                $inv_ref = $request->inv_ref;
                $index = $indexs[$key];
                $shop_id = $value;
                $this->__delete($inv_ref, $request->inv_no, $request->product_id, $index, $shop_id);
            }
        }
        // invs::where('user_id',Auth::user()->id)->where('status',0)->update([
        //         'status' => 1,
        //         'updated_at'=> new DateTime()
        //     ]);

        $product_all_id = [];
        $basket_all =  invs::all();

        foreach ($basket_all as $value) {
            foreach ($value->inv_products as $value1) {
                if (!in_array($value1['product_id'], $product_all_id)) {
                    array_push($product_all_id, $value1['product_id']);
                }
            }
        }
        $product_all = Product::whereIn('id', $product_all_id)->get();

        $address_all = Address::where('user_id', Auth::user()->id)->get();

        $inv_ref = $request->inv_ref;

        return view('pages.pay', compact('basket_all', 'product_all', 'address_all', 'inv_ref'));


        // $this->__confirm_order();

    }

    public function bank(Request $request)
    {
        // dd($request->all());
        // dd($request);
        $ref_invs = $request->inv_ref;
        $total = $request->total;

        $a_wh_product = explode(',', $request->products);
        $a_wh_inv_no = explode(',', $request->inv_no);

        // dd($request->total);
        DB::beginTransaction();
        try {
            $shop_array = [];
            $invs = $basket_all = invs::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->whereIn('inv_no', $a_wh_inv_no)
                ->where(function ($query) use ($a_wh_product) {
                    foreach ($a_wh_product as $key => $val) {
                        $query->orWhere(DB::raw("JSON_CONTAINS( JSON_EXTRACT(inv_products, '$[*].product_id'), '[\"" . $val . "\"]' )"), '=', '1');
                    }
                    return $query;
                })
                ->orderBy('updated_at', 'DESC')->get();

            $gtotal = $basket_all->sum('shipping_cost') + $basket_all->sum('total');
            $address = Address::where('id', $request->address)->get();
            // dd($address);
            $sort_address = ([
                "name" => $address[0]->name . ' ' . $address[0]->surname,
                "tel" => $address[0]->tel,
                "address" => $address[0]->address1 . ' ' . $address[0]->address2 . ' ' . $address[0]->county . ' ' . $address[0]->district . ' ' . $address[0]->city . ' ' . $address[0]->zipcode . ' ' . $address[0]->country
            ]);

            foreach ($invs as $inv) {
                // if (!in_array($inv->shop_id, $shop_array)) {
                array_push($shop_array, $inv->shop_id);
                // }
            }
            // dd($shop_array);
            $a_inv_no = explode(',', $request->inv_no);
            // dd($shipping);
            $shop_id = explode(',', $request['shop']);
            $a_shipping_id = explode(',', $request['shipping']);

            $o_setting = Setting::where('id', '=', '1')->first();

            $time = new DateTime();

            $i_disc_product = $i_disc_ship = $i_total_disc = 0; $s_disc_to = $i_coupon_id = '';

            if ($request->coupon_code != '') {
                $o_coupon =  Coupon::where('code', strtoupper($request->coupon_code))
                    ->where('remain_amt', '>', 0)->where('min_buy', '<', $basket_all->sum('total'))
                    ->whereRaw('(CASE `cust_type` WHEN \'NEW\' THEN (!exists( SELECT * FROM invs WHERE user_id = \'' . Auth::user()->id . '\' AND status IN (2,3,4,43,5,52,53,54,7) ) ) ELSE TRUE END) ')
                    ->where('start_dt', '<=', $time->format('Y-m-d H:i:s'))->where('end_dt', '>=', $time->format('Y-m-d H:i:s'))->first();

                if ($o_coupon === null) {
                    return redirect()->back()->with('messageError', trans('message.warn_coupon_ran_out'));
                }
                $s_disc_to = $o_coupon->disc_to;
                $i_coupon_id = $o_coupon->coupon_id;
                if ($o_coupon->disc_to == 'PRODUCT') {
                    if ($o_coupon->disc_type == 'PERCENT') {
                        $i_disc_product = ($basket_all->sum('total') * $o_coupon->disc_percent) / 100;
                        if ($i_disc_product > $o_coupon->disc_amt) {
                            $i_disc_product = $o_coupon->disc_amt;
                        }
                    } else {
                        $i_disc_product = $o_coupon->disc_amt;
                    }
                } elseif ($o_coupon->disc_to == 'SHIP') {
                    $i_disc_ship = $o_coupon->disc_amt;
                }
                $i_total_disc = $i_disc_product + $i_disc_ship;
            }
            foreach ($a_inv_no as $key => $v_inv_no) {
                // dd($a_inv_no);
                $a_invs = invs::where('inv_ref', $request->inv_ref)->where('inv_no', $v_inv_no)->first();
                $i_inv_disc = 0;
                if ($s_disc_to == 'PRODUCT') {
                    $i_inv_disc = ($a_invs->total / $basket_all->sum('total')) * $i_disc_product;
                }
                if ($s_disc_to == 'SHIP') {
                    $i_inv_disc = ($a_invs->shipping_cost / $basket_all->sum('shipping_cost')) * $i_disc_ship;
                }

                $test = invs::where('inv_ref', $request->inv_ref)->where('inv_no', $v_inv_no)->update([
                    'payment' => 'bank',
                    'status' => '1',
                    'shipping_id' => $a_shipping_id[$key],
                    'address' => [$sort_address],
                    'gp_rate' => $o_setting->gp_rate,
                    'coupon_id' => $i_coupon_id,
                    'coupon_code' => strtoupper($request->coupon_code),
                    'coupon_at' => new DateTime(),
                    'disc_to' => $s_disc_to,
                    'disc_amt' => $i_inv_disc,
                    'updated_at' => new DateTime()
                ]);
            }

            if ($request->coupon_code != '') {
                $i_chk_coupon_invs = CouponInvs::where('coupon_code', $request->coupon_code)->where('inv_ref', $request->inv_ref)->where('inv_no', $request->inv_no)
                    ->distinct()->count('inv_ref');
                $i_dis = 0;
                if ($i_chk_coupon_invs == 0) {
                    $i_dis = 1;
                    CouponInvs::create([
                        'inv_ref' => $request->inv_ref,
                        'inv_no' => $request->inv_no,
                        'coupon_code' => strtoupper($request->coupon_code),
                        'created_by' => Auth::user()->id,
                        'created_at' => new DateTime()
                    ]);
                }
                Coupon::where('coupon_id', $o_coupon->coupon_id)->update([
                    'remain_amt'  =>  $o_coupon->remain_amt - $i_dis,
                    'updated_at' => new DateTime()
                ]);
            }

            $grandtotal = $total = number_format($gtotal - $i_total_disc, 2, '.', '');

            Address::where('user_id', $a_invs->user_id)->update([
                'is_last_ship'  =>  'N',
                'updated_at' => new DateTime()
            ]);

            // echo '<pre>';
            // print_r($a_invs->user_id);
            // echo '</pre>'; exit;
            // echo $a_invs->user_id; exit;

            $category_all = [];
            $category = Category::get();
            foreach ($category as $key => $value) {
                $categoryCount = Product::where('category_id', $value->category_id)->count();
                if ($value->data_subdets != "[]") {
                    $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                    $value['data_subdets'] = $sub;
                } else {
                    $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
                }
                array_push($category_all, json_decode($value));
            }
            DB::commit();

            return view('pages.bank', compact('ref_invs', 'basket_all', 'sort_address', 'total', 'category_all'));
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;

            return redirect()->back()->with('messageError', trans('message.warn_something_went_wrong'));
        }
    }

    public function bank_update(Request $request)
    {
        // Check Stock ////////////
        // $invs = invs::where('inv_ref', $request->bank_ref)->first();
        // foreach ($invs->inv_products as $value) {

        //     $pd_all[] = $value;
        //     $pd_id[]      = $value['product_id'];
        //     $pd_amoung[]  = $value['amount'];
        //     $pd_option[]  = $value['option1'];
        //     $pd_dis1[]  = $value['dis1'];
        // }

        // $basket_all =  invs::where('inv_ref', $invs->inv_ref)->get();
        // $inv = $basket_all->first();
        // $grandtotal = $basket_all->sum('total') + $basket_all->sum('shipping_cost');
        // $ids = [];

        // dd($invs);
        // dd('ss');
        // echo $request->bank_ref; exit;

        $a_inv_ref = explode('-', $request->bank_ref);
        if (sizeof($a_inv_ref) == 1) {
            $a_inv_ref[1] = null;
        }
        if (isset($request['bank_pic'])) {
            $image = $request->file('bank_pic');
            $extension = $request['bank_pic']->getClientOriginalExtension();
            $bank_script = 'bank_statement' . time() . '.' . $extension;
            $location = public_path('public/img/bank_image/') . $bank_script;
            // echo $location; exit;
            // Image::make($image)->resize(700, 350)->save($location);
            // Image::make($image)->save($location);
            $image->move('img/bank_image/', $bank_script);
            // $in['picture'] = $kyc_name;
        }

        // $image = $request['bank_pic'];
        // $extension = $request['bank_pic']->getClientOriginalExtension();
        // $bank_script = 'bank_statement' . time() . '.' . $extension;
        // $location = public_path('/img/bank_image/') . $bank_script;
        // Image::make($image)->save($location);
        $transfer_slip = [
            // "name" => $request->name,
            // "tel" => $request->tel,
            // "amount_price" => $request->amount,
            "date_tranfer" => date('Y-m-d'),
            "time_tranfer" => date('H:i:s')
        ];

        invs::where('inv_ref', $a_inv_ref[0])->when($a_inv_ref[1], function ($query, $ref_no) {
            return $query->where('inv_no', $ref_no);
        })->update([
            'status' => 12,
            'updated_at' => new DateTime(),
            'transfer_img' => $bank_script,
            'transfer_slip' => $transfer_slip
        ]);

        return redirect("/profile_my_sale");
    }

    public function __confirm_order()
    {
        $order = new Order();
        $order->save();
        $order = Order::find($order->id);
        $order->order_number = "order" . sprintf("%05d", $order->id);
        $order->id = Auth::user()->id;
        $order->save();


        $basket_all =  invs::where('user_id', Auth::user()->id)->where('inv_products', 'not like', '%[]%')->get();
        foreach ($basket_all as $value) {

            $order_detail = new Orderdetail();
            $order_detail->order_id = $order->id;
            $order_detail->inv_ref = $value->inv_ref;
            $order_detail->id = $value->id;
            $order_detail->shop_id = $value->shop_id;
            $order_detail->inv_products = json_encode($value->inv_products);
            $order_detail->shipping_cost = $value->shipping_cost;
            $order_detail->payment = $value->payment;
            $order_detail->campaign_id = $value->campaign_id;
            $order_detail->shipping_id = $value->shipping_id;
            $order_detail->total = $value->total;
            $order_detail->note = $value->note;
            $order_detail->coupon_id = $value->coupon_id;
            $order_detail->status = $value->status;
            $order_detail->shipping_note = $value->shipping_note;
            $order_detail->save();

            invs::find($value->id)->delete();
        }

        $this->__payment($order->id);
    }


    public function __payment($order_id)
    {

        $register_token = $this->getToken();
        if ($register_token->status->code !== 1000) {
            dd('something wrong !');
        }


        $accessToken =  $register_token->data->accessToken;
        $ref_id = Order::find($order_id)->get()->first()->order_number;
        $id = Auth::user()->id;
        $amount = Orderdetail::where('order_id', $order_id)->sum('total');

        $qrType = "PP";
        $partner = env('SCB_PARTNER_NAME');
        $ppType = "BILLERID";
        $ppId = env('SCB_PPID');
        $note = "";
        $blockchain = "###TOPUP-MULTI###";


        $payment = new Payment();
        $payment->payment_type_id = Paymenttype::where('type', 'mobilebanking')->get()->first()->id;
        $payment->ref_id = $ref_id;
        $payment->amount = $amount;
        $payment->id = $id;
        $payment->save();

        $qr_res = $this->getQrcode(
            $accessToken = $accessToken,
            $qrType = $qrType,
            $ppType = $ppType,
            $ppId = $ppId,
            $amount = $amount,
            $ref_id = $ref_id,
            $ref1 = $ref_id,
            $ref2 = "",
            $ref3 = $ref_id
        );

        if ($qr_res->status->code !== 1000) {
            dd('something wrong !');
        }

        $qrcode = $qr_res->data->qrRawData;
        return view('pages.payment-qrcode', compact('qrcode', 'payment'));
    }


    public function getQrcode($amount, $note = null)
    {
        // dd(env('T10_APP_TOKEN'));
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('T10_APP_URL_PAYMENT_QRCODE'), [
            'headers' => $headers,
            'json' => [
                "token" => env('T10_APP_TOKEN'),
                "amount" => $amount,
                "note" => $note,
            ]
        ]);

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());
        // dd($contents);
        return ($http_status_code == 200) ? $contents : '';
    }

    public function getToken()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'requestUId' => 't10assets Api v1',
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

        return ($http_status_code == 200) ? $contents : '';
    }

    public function mobilebanking(Request $request, $inv_ref)
    {
        // dd($request->all());
        $basket_all =  invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)->orderBy('updated_at', 'DESC')->get();
        $total = number_format($request->total, 2, '.', '');
        $grandtotal = $basket_all->sum('shipping_cost') + $basket_all->sum('total');
        // dd($request->total);
        $address = Address::where('id', $request->address)->get();
        $sort_address = ([
            "name" => $address[0]->name . ' ' . $address[0]->surname,
            "tel" => $address[0]->tel,
            "address" => $address[0]->address1 . ' ' . $address[0]->address2 . ' ' . $address[0]->county . ' ' . $address[0]->district . ' ' . $address[0]->city . ' ' . $address[0]->zipcode . ' ' . $address[0]->country
        ]);

        $shop_array = [];
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
                'payment' => 'mobilebanking',
                'shipping_id' => $ship,
                'address' => [$sort_address],
                'updated_at' => new DateTime()
            ]);
        }
        //สิ่งที่เพิ่มเข้ามา เพื่ออัพเดทข้อมูล เจมส์ทำเอง

        invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)->update([
            'payment' => 'mobilebanking',
            'address' => [$sort_address],
            'updated_at' => new DateTime()
        ]);
        $qrcode = $this->getQrcode($grandtotal, 'shopteenii payment');
        // dd($headers);
        $mobilebanking = new Mobilebanking();
        $mobilebanking->rawQrCode = $qrcode->rawQrCode;
        $mobilebanking->invoice = $qrcode->invoice;
        $mobilebanking->inv_ref = $inv_ref;
        $mobilebanking->save();



        return redirect(route('mobilebankingqrcode', ['id' => $mobilebanking->id]));
    }


    public function mobilebankingqrcode($id)
    {

        $mobilebanking = Mobilebanking::where([
            'status' => 0,
            'id' => $id
        ])->get()->first();

        $mobile_inv = $mobilebanking['inv_ref'];
        $total = invs::where(['inv_ref' => $mobile_inv])->sum('total');
        $shipping_cost = invs::where(['inv_ref' => $mobile_inv])->sum('shipping_cost');
        $invs_total = $total + $shipping_cost;

        $qr_time_full = date('d/m/Y H:i', strtotime('+48 hour +543 Year', strtotime($mobilebanking['updated_at'])));

        $qrtime = explode(" ", $qr_time_full);

        return view('pages.mobilebanking-qrcode', compact('mobilebanking', 'invs_total', 'qrtime'));
    }

    public function credit(Request $request, $inv_ref)
    {

        $request_data = DB::select('select invs.user_id, invs.shipping_cost, invs.inv_ref, invs.total, invs.inv_products, users.name, users.email from invs
                                                        join users on invs.user_id = users.id
                                                        where invs.inv_ref = ?', [$inv_ref]);
        // dd($request_data);
        // $product_id = json_decode($request_data[0]->inv_products);
        // dd($product_id);



        $gtotal = ($request_data[0]->total + $request_data[0]->shipping_cost) * 103 / 100;
        // dd($gtotal);

        $total = number_format($gtotal, 2, '', '');

        // $totalb = str_replace('.', '', $totala);
        // $total = str_replace(',', '', $totalb);
        // dd($total);
        $pay_type = 'PACA';
        ///////////test///////////
        // $secure_key = '4ReIqL-vl8e3VtOQqyfFoDUlLxeI.Ojed4y3NiVWVwu7Aa8BVM7BSPjdeYw58wnrwslP6cdGX0673ru-dBuL-pI-fcNOUETfYgnvLW.88AqWryMG023TKHkG5K7S5B5na6oKJhRixnOzk1Wxoe1mmFWdjOlyDyTcqdde4c9fgLsOrr61NcJfUrJH2P8VERI-fsHnCVpYbTpm-1ovhDj-hHeh4gSJ2P1XKMiXuZcDvfVMUDs2EAKPlVAubZBt2sas0FH2Yk7H6PjLiJXTlpdlZruIaGddoPqzW9wEE7LQ76Ga35SZGM6EFJsQq2B9P7A7fiEreAz210NY1QpSzoNmQWY__';
        // $site_cd = 'A0001116P8';
        ///////////production///////////
        // $secure_key = '1QRWqBQehLtUqCQjZP6ceyVdgLb6zThRRBoioJgBpaZou.dIB1EeA3iDNghHfIWI4nlRVfG.T.rT8fY2bjyeO2ni.XTQTwhey0K6z0OvJAjY5otOo1EGZoDS-KtIfHXLgWmE0mG1zTOvqL.gecCuONz5W2DA0egcxhDbjm-uY-KUpavorrnWGfZUICrsrsfL4IxNrFmv2xGvPCjMoVIlQtk8o1VKDlaBmr7XihAARIqJjke1u7Mhh5LtWnPa8bR6OPdf2ndUkfyIxdm9Om3-RZimeV5CU.bgwx6NsO7br6xi0Cx1ZLobLo-frvpqJTWaAgjUvJdl8SwkUcI8G2KHRFL__';
        // $site_cd = 'P000072405';
        $secure_key = env('TREEPAY_SECURE_KEY');
        $site_cd = env('TREEPAY_SITE_CD');

        $hash_string  = $pay_type . $inv_ref . $total . $site_cd . $secure_key . $request_data[0]->user_id;
        $hash_data = hash('sha256', $hash_string);

        //สิ่งที่เพิ่มเข้ามา เพื่ออัพเดทข้อมูล เจมส์ทำเอง
        $address = Address::where('id', $request->address)->get();
        $sort_address = ([
            "name" => $address[0]->name . ' ' . $address[0]->surname,
            "tel" => $address[0]->tel,
            "address" => $address[0]->address1 . ' ' . $address[0]->address2 . ' ' . $address[0]->county . ' ' . $address[0]->district . ' ' . $address[0]->city . ' ' . $address[0]->zipcode . ' ' . $address[0]->country
        ]);

        $shop_array = [];
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
                'payment' => 'credit',
                'shipping_id' => $ship,
                'address' => [$sort_address],
                'updated_at' => new DateTime()
            ]);
        }
        //สิ่งที่เพิ่มเข้ามา เพื่ออัพเดทข้อมูล เจมส์ทำเอง


        // dd($request->all());



        // invs::where('inv_ref', $inv_ref)->update([
        //     'payment' => 'cerdit',
        //     'address' => [$sort_address],
        //     'updated_at' => new DateTime()
        // ]);


        foreach ($request_data as $pro_id) {
            // dd($pro_id);
            foreach (json_decode($pro_id->inv_products) as $id) {
                // dd($id->type);
                if ($id->type == 'pre_order') {
                    // dd('flashsale');
                    // dd($id->product_id);
                    $flash_sale = PreOrder::where('id', $id->product_id)->select('name')->get();
                    // dd($flash_sale);
                    $data["total_price"] = $request_data[0]->total;
                    $data["inv_ref"] = $inv_ref;
                    $data["user_id"] = $request_data[0]->user_id;
                    $data["good_name"] = $flash_sale[0]->name;
                    $data["trade_mony"] = $total;
                    $data["order_first_name"] = $request_data[0]->name;
                    $data["order_email"] = $request_data[0]->email;
                    $data["pay_type"] = $pay_type;
                    $data["site_cd"] = $site_cd;
                    $data["hash_data"] = $hash_data;
                } else if ($id->type == 'flashsale') {
                    // dd('flashsale');
                    // dd($id->product_id);
                    $flash_sale = flash::where('id', $id->product_id)->select('name')->get();
                    // dd($flash_sale);
                    $data["total_price"] = $request_data[0]->total;
                    $data["inv_ref"] = $inv_ref;
                    $data["user_id"] = $request_data[0]->user_id;
                    $data["good_name"] = $flash_sale[0]->name;
                    $data["trade_mony"] = $total;
                    $data["order_first_name"] = $request_data[0]->name;
                    $data["order_email"] = $request_data[0]->email;
                    $data["pay_type"] = $pay_type;
                    $data["site_cd"] = $site_cd;
                    $data["hash_data"] = $hash_data;
                } else if ($id->type != 'flashsale') {
                    // dd('not flashsale');
                    // $product_name = DB::select('select name from product_s where id = ?', $id->product_id);
                    $product_name = Product::where('id', $id->product_id)->select('name')->get();
                    // dd($product_name);
                    $data["total_price"] = $request_data[0]->total;
                    $data["inv_ref"] = $inv_ref;
                    $data["user_id"] = $request_data[0]->user_id;
                    $data["good_name"] = $product_name[0]->name;
                    $data["trade_mony"] = $total;
                    $data["order_first_name"] = $request_data[0]->name;
                    $data["order_email"] = $request_data[0]->email;
                    $data["pay_type"] = $pay_type;
                    $data["site_cd"] = $site_cd;
                    $data["hash_data"] = $hash_data;
                }
            }
        }


        return view('pages.product-payment-credit', $data);
    }


    public function walletpayment(Request $request, $inv_ref)
    {
        // dd($request->all());

        $balance = balance::where('user_id', Auth::user()->id)->first();
        $basket_all =  invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)->orderBy('updated_at', 'DESC')->get();
        $total = number_format($request->total, 2, '.', '');
        $grandtotal = $basket_all->sum('shipping_cost') + $basket_all->sum('total');

        if ($balance->credit >= $grandtotal && $basket_all[0]->status < 2 || $balance->credit >= $grandtotal && $basket_all[0]->status == 21) {
            if ($request->receive == 'receive') {
                $sort_address = ([
                    "name" => Auth::user()->name . " " . Auth::user()->surname,
                    "tel" => Auth::user()->phone,
                    "address" => 'รับสินค้าเลย'
                ]);
                $shop_array = [];
                $invs = invs::where('inv_ref', $inv_ref)->get();
                foreach ($invs as $inv) {
                    // dd($inv->shop_id);
                    if (!in_array($inv->shop_id, $shop_array)) {
                        array_push($shop_array, $inv->shop_id);
                    }
                }
                $shipping = explode(',', $request['shipping']);
                foreach ($shipping as $key => $ship) {
                    invs::where('inv_ref', $request->inv_ref)->where('shop_id', $shop_array[$key])->update([
                        'payment' => 'wallet',
                        'status' => 43,
                        'shipping_id' => $ship,
                        'address' => [$sort_address],
                        'updated_at' => new DateTime()
                    ]);
                }
                return redirect('profile_my_sale');
            }

            $credit = $balance->credit - $grandtotal;
            $updateWallet = $balance->update([
                'credit' => $credit
            ]);
            if ($updateWallet) {
                $address = Address::where('id', $request->address)->get();
                $sort_address = ([
                    "name" => $address[0]->name . ' ' . $address[0]->surname,
                    "tel" => $address[0]->tel,
                    "address" => $address[0]->address1 . ' ' . $address[0]->address2 . ' ' . $address[0]->county . ' ' . $address[0]->district . ' ' . $address[0]->city . ' ' . $address[0]->zipcode . ' ' . $address[0]->country
                ]);



                $shop_array = [];
                $invs = invs::where('inv_ref', $inv_ref)->get();
                foreach ($invs as $inv) {
                    // dd($inv->shop_id);
                    if (!in_array($inv->shop_id, $shop_array)) {
                        array_push($shop_array, $inv->shop_id);
                    }
                }

                // dd($shop_array);

                $shipping = explode(',', $request['shipping']);
                $shop_id = explode(',', $request['shop']);

                foreach ($shipping as $key => $ship) {
                    // dd($shipping);
                    // if (dd(array_reverse($shop_array[$key])) == $shop_id[$key]) {
                    if ($request->receive == 'receive') {
                        $test = invs::where('inv_ref', $request->inv_ref)->where('shop_id', $shop_array[$key])->update([
                            'payment' => 'wallet',
                            'status' => 43,
                            'shipping_id' => $ship,
                            'address' => [$sort_address],
                            'updated_at' => new DateTime()
                        ]);
                    } else if ($request->receive != 'receive') {
                        $test = invs::where('inv_ref', $request->inv_ref)->where('shop_id', $shop_array[$key])->update([
                            'payment' => 'wallet',
                            'status' => 2,
                            'shipping_id' => $ship,
                            'address' => [$sort_address],
                            'updated_at' => new DateTime()
                        ]);
                        
                    }
                }
                //สิ่งที่เพิ่มเข้ามา เพื่ออัพเดทข้อมูล เจมส์ทำเอง


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

                invs::where('user_id', Auth::user()->id)->where('inv_ref', $inv_ref)->update([
                    'payment' => 'wallet',
                    'address' => [$sort_address],
                    'updated_at' => new DateTime()
                ]);

                foreach ($basket_all as $value) {
                    $arr_stock = 0;
                    // dd($ids);
                    $invs = invs::where('id', $value->id)->first();
                    foreach ($invs->inv_products as $value2) {
                        $pd_all[] = $value2;
                        $pd_id[]      = $value2['product_id'];
                        $pd_amoung[]  = $value2['amount'];
                        $pd_option[]  = $value2['option1'];
                        $pd_dis1[]  = $value2['dis1'];
                    }
                    // dd($pd_all);

                    foreach ($pd_all as $key => $val) {
                        $delstock = 0;
                        if (isset($val['type'])) {
                            if ($val['type'] == 'flashsale') {
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
                                $get_pd2 = $get_pd = flash::where('id', $pd_id[$key])->first();
                                $option2 = $get_pd2['product_option'];
                                foreach ($option2['stock'] as $key => $value) {
                                    $delstock += $value;
                                }
                                if ($delstock <= 0) {
                                    flash::where('id', $pd_id[$key])->update([
                                        'status' => 'unenabled',
                                    ]);
                                }
                            } else if ($val['type'] == 'pre_order') {

                                $get_pre_order = PreOrder::where('id', $pd_id[$key])->first();

                                // Get Value \\
                                $arrNew = $get_pre_order->preOrder_option;
                                $datetime = $arrNew[0]['datetime_range'];

                                // Get Value \\


                                $arr_dis1 = $get_pre_order->preOrder_option[0]['dis1'];
                                $arr_dis2 = $get_pre_order->preOrder_option[0]['dis2'];
                                $lengthDis2 = count($arr_dis2);
                                $key_dis1 = array_search($val['dis1'], $arr_dis1);
                                $key_dis2 = array_search($val['dis2'], $arr_dis2);
                                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
                                // dd($stock_key);

                                // can specification posiotion start date
                                $key_start_date = array_keys(array_column($datetime, 'start_date'), $val['start_date']);
                                $key_end_date = array_keys(array_column($datetime, 'end_date'), $val['end_date']);

                                $start_date_db = $arrNew[0]['datetime_range'][$key_start_date[0]]['start_date'];
                                $end_date_db = $arrNew[0]['datetime_range'][$key_end_date[0]]['end_date'];


                                $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key] = $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key] - $val['amount'];
                                // can specification position stock

                                $stock_db = $arrNew[0]['datetime_range'][$key_start_date[0]]['stock'][$stock_key];

                                if ($val['start_date'] == $start_date_db && $val['end_date'] == $end_date_db) {
                                    if ($stock_db < 0) {

                                        return redirect()->back()->with('stockeOver', 'เนื่องจากว่าจำนวนสินค้าในคำสั่งซื้อเกินจำนวนที่กำหนดวไว้');
                                    } else {

                                        PreOrder::where('id', $val['product_id'])->update([
                                            'preOrder_option' => $arrNew,
                                            'updated_at' => new DateTime(),
                                        ]);
                                        // $get_pd2 = PreOrder::where('id', $pd_id[$key])->first();
                                        // $option2 = $get_pd2[0]['preOrder_option'];
                                        // dd($option2);
                                        // foreach ($option2['stock'] as $key => $value) {
                                        //     $delstock += $value;
                                        // }
                                        // if ($delstock <= 0) {
                                        //     flash::where('id', $pd_id[$key])->update([
                                        //         'status' => 'unenabled',
                                        //     ]);
                                        // }
                                    }
                                } else {
                                    return redirect()->back()->with('messageError', 'เนื่องจาก เกินระยะเวลาที่กำหนดในการซื้อสินค้า');
                                }
                            }
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
                            $get_pd2 = Product::where('id', $pd_id[$key])->first();
                            $option2 = $get_pd2['product_option'];
                            foreach ($option2['stock'] as $key => $value) {
                                $delstock += $value;
                            }
                            if ($delstock <= 0) {
                                Product::where('id', $pd_id[$key])->update([
                                    'status_goods' => '2'
                                ]);
                            }
                        }
                    }
                }



                $transactions = new Transactions();
                $transactions->type = 'wallet Pay';
                $transactions->user_id = Auth::user()->id;
                $transactions->inv_ref = $inv_ref;
                $transactions->total = $grandtotal;
                $transactions->point = 0;
                $transactions->coin = 0;
                $transactions->status = 2;
                $transactions->payment = 'wallet Pay';
                $transactions->inv_id = [];
                $transactions->save();
                return redirect('profile_my_sale');
            }
            return redirect()->back()->with('messageError', 'ระบบขัดข้อง');
        }
        return redirect()->back()->with('messageError', 'ยอดเงินของคุณไม่เพียงพอ');
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
    public function chkCoupon(Request $request)
    {
        $time = new DateTime();

        // dd($request->all());
        $data['status'] =  '2';

        if ($request->buy_amt > 0 && strlen($request->code) >= 6) {
            $o_coupon =  Coupon::where('code', strtoupper($request->code))
                ->where('remain_amt', '>', 0)->where('min_buy', '<', $request->buy_amt)
                ->where('start_dt', '<=', $time->format('Y-m-d H:i:s'))->where('end_dt', '>=', $time->format('Y-m-d H:i:s'))->get();

            // dd($o_coupon); exit;
            if (count($o_coupon) > 0) {
                $o_coupon = $o_coupon[0];
                $data['status'] =  '1';
                $data['disc_type'] =  $o_coupon->disc_type;
                $data['disc_amt'] =  $o_coupon->disc_amt;
                $data['disc_to'] =  $o_coupon->disc_to;
                $data['disc_percent'] =  $o_coupon->disc_percent;
            } else {
                $data['status'] =  '3';
            }
        }

        return $data;
    }

    public function updateInvoiceStatus(Request $request)
    {
        try {
            if (!isset($request->status) || !isset($request->orderId) || !isset($request->invRef2)) {
                return response()->json(['success' => false, 'message' => 'Failed to update invoice status']);
            }

            if (isset($request->orderId) && is_array($request->orderId)) {
                foreach ($request->orderId as $key => $orderId) {
                    $usdc = $request->netPrice[$key];
                    invs::where('id', $orderId)->update(['status' => $request->status, 'payment' => 'crypto', 'usdc' => $usdc, 'inv_ref2' => $request->invRef2]);
                }
            }

            return response()->json(['success' => true, 'message' => 'Thank you for your purchase']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update invoice status']);
        }
    }
}
