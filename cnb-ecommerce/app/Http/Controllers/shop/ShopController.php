<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Shops;
use App\Product;
use App\flash;
use Image;
use Hash;
use App\invs;
use App\BankMaster;
use App\Category;
use App\withdrow;
use App\SubCategory;
use App\Address;
use App\rating;
use App\shipping;
use App\shipping_type;
use App\balance;
use App\branch_income;
use App\Http\Controllers\tools\PseudoCryptController;
use App\PreOrder;
use App\Referal_users;
use App\sales_amount;
use App\Country;
use App\BoxSize;
use App\Setting;
use App\Province;
use App\Kyc;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\shipping_details;
use flashSales;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Concerns\ToArray;

use function GuzzleHttp\json_decode;

class ShopController extends Controller
{
    public function user_shop()
    {
        $user_shops = shops::Where('user_id', Auth::user()->id)->first();
        return $user_shops;
    }

    public function check_shop()
    {
        $user_shops = $this->user_shop();

        if (!isset($user_shops)) {
            return redirect('welcome');
        }
    }

    public function Index()
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $user_shops = $this->user_shop();

        $partner = Referal_users::where('user_id', $user_shops->user_id)->first();
        if (isset($partner)) {
            $user_shops->partner = $partner->ref_code;
        }
        // dd($this->user_shop());
        // $user_shops = shops::Where('user_id',Auth::user()->id)->first();
        // $this->check_shop();
        $o_province = Province::orderBy('name_th', 'asc')->get();

        // return $category_all;
        // $category_all=(object)$category_all;
        return view('shop.index', compact('user_shops', 'o_province'));
    }


    public function myproduct()
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        $products =  Product::where('shop_id', $user_shops->id)->whereIn('status_goods', [1, 2, 99])->orderByRaw('updated_at DESC')->get();
        $flash_product = flash::where('shop_id', $user_shops->id)->orderByRaw('updated_at DESC')->get();
        $products_all = flash::where('shop_id', $user_shops->id)->orderByRaw('updated_at DESC')->get();

        // dd($flash_product);

        foreach ($products as $key => $value) {
            $value['type'] = 'regular';
            $products_all[] = $value;
        }

        // AUI EDIT 20210810
        foreach ($products_all as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $products_all[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }

        // dd($flash_product);

        // if (isset($products[0])) {
        //     dd('notem');
        // } else {
        //     dd('Em');
        // }
        // $test = count($products);
        // dd($test);
        //dd($user_shops->id);
        // return view('shop.myproduct',  compact('user_shops', 'products'));
        // return view('new_ui.mylist-seller.my-product-all',  compact('user_shops', 'products'));
        // dd($user_shops);
        if ($user_shops->approve_shop == 'decline') {
            return redirect('/shop/seller-shop-user-detail');
        } else {
            return view('shop.seller-product', compact('user_shops', 'products', 'flash_product', 'products_all'));
        }
        // return (['user_shops'=>$user_shops,'products'=>$products]);
    }


    public function salesList()
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        // dd($user_shops);

        $product_all_id = [];
        $product_flash_id = [];
        $product_pre_id = [];
        // $basket_group = invs::where('id',Auth::user()->id)->select('inv_ref','shop_id')->groupBy('inv_ref','shop_id')->get();
        $basket_all =  invs::leftJoin('shipping_details', 'shipping_id', 'shipping_details.shipde_id')
            ->leftJoin('shipping_type', 'invs.shipty_id', 'shipping_type.shipty_id')
            ->leftJoin('shops', 'invs.shop_id', 'shops.id')
            ->leftJoin('addresses', function ($join) {
                $join->on('addresses.user_id', '=', 'shops.user_id');
                $join->on('addresses.status_address', '=', DB::raw('2'));
            })
            ->where('invs.shop_id', $user_shops->id)
            ->orderByRaw('invs.updated_at DESC')
            ->select('invs.*', 'shipping_details.*', 'shipping_type.*', 'shops.shop_name', 'addresses.address1', 'addresses.address2', 'addresses.county', 'addresses.district', 'addresses.city', 'addresses.zipcode', 'addresses.tel')
            ->get();
        // dd($basket_all);
        // echo '<pre>';
        // print_r( $basket_all );
        // echo '</pre>'; exit;
        foreach ($basket_all as $value) {
            $s_product1 = '';
            $s_product2 = '';
            foreach ($value->inv_products as $value1) {
                if (isset($value1['type'])) {
                    if ($value1['type'] == 'flashsale') {
                        if (!in_array($value1['product_id'], $product_flash_id)) {
                            array_push($product_flash_id, $value1['product_id']);
                        }
                    } else if ($value1['type'] == 'pre_order') {
                        if (!in_array($value1['product_id'], $product_pre_id)) {
                            array_push($product_pre_id, $value1['product_id']);
                        }
                    }
                } else {
                    if (!in_array($value1['product_id'], $product_all_id)) {
                        array_push($product_all_id, $value1['product_id']);
                    }
                }
                $a_product = Product::where('id', '=', $value1['product_id'])->first();
                $s_product1 .= '<p>' . $a_product->name . '</p>';
                $s_product2 .= '<p>x' . $value1['amount'] . '</p>';
            }
            if ($value->address) {
                // print_r($value->address); exit;
                $a_tmp_address = $value->address[0];
                $a_tmp_addr = explode(' ', $value->address[0]['address']);

                if (trim($a_tmp_addr[sizeof($a_tmp_addr) - 1]) != '') {
                    $a_tmp_address['zipcode'] = $a_tmp_addr[sizeof($a_tmp_addr) - 1];
                } else {
                    $a_tmp_address['zipcode'] = $a_tmp_addr[sizeof($a_tmp_addr) - 2];
                }
                $value->address = $a_tmp_address;
            }
            $value->s_products = '<div class="col"><h5>Product name</h5>' . $s_product1 . '</div><div class="col-4"><h5>Quality</h5>' . $s_product2 . '</div>';
        }
        $product_all = Product::whereIn('id', $product_all_id)->get();
        // AUI EDIT 20210810
        foreach ($product_all as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $product_all[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }
        $product_flash = flash::whereIn('id', $product_flash_id)->get();
        $product_pre = PreOrder::whereIn('id', $product_pre_id)->get();


        // dd($basket_all);
        return view('shop.sales-list', compact('user_shops', 'basket_all', 'product_all', 'product_flash', 'product_pre'));
    }

    public function salesListDetail($inv_ref)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }

        $a_inv_ref = explode('-', $inv_ref);
        if (sizeof($a_inv_ref) == 1) {
            $a_inv_ref[1] = null;
        }

        $this->check_shop();
        $user_shops = $this->user_shop();
        // dd($inv_ref);
        $basket_all =  invs::leftJoin('inv_cancels', 'inv_cancels.inv_id', '=', 'invs.id')
            ->where('invs.shop_id', $user_shops->id)->where('inv_ref', $a_inv_ref[0])->when($a_inv_ref[1], function ($query, $ref_no) {
                return $query->where('inv_no', $ref_no);
            })
            ->select('invs.*', 'inv_cancels.description')
            ->get();
        $invref = invs::where('shop_id', $user_shops->id)->get();
        $shipping_details = shipping_details::where('shipde_id', $basket_all[0]->shipping_id)->select('shipde_price', 'shipty_id')->get();

        if (!isset($basket_all[0]->shipping_id) && $basket_all[0]->shipping_id == null) {
            $shipping = "";
        } else {
            $shipping = shipping_type::where('shipty_id', $shipping_details[0]->shipty_id)->get();
        }
        // dd($shipping);


        $product_product_id = [];
        $product_flash_id = [];
        $basket = [];
        $address = [];
        foreach ($basket_all as $bas) {
            // dd($bas->address);
            foreach ($bas->inv_products as $inv_product) {
                if ($basket) {
                    $status = true;
                    foreach ($basket as  $paymentkey => $value) {
                        if (($bas['product_id'] == $value['product_id']) &&
                            ($bas['dis1'] == $value['dis1']) &&
                            ($bas['dis2'] == $value['dis2'])
                        ) {
                            $basket[$paymentkey]['amount'] = intval($value['amount']) + intval($bas['amount']);
                            $status = false;
                        }
                    }
                    if ($status) {
                        array_push($basket, $inv_product);
                    }
                } else {
                    array_push($basket, $inv_product);
                }
            }
            //Loop for get Address like JSON
            if ($bas->address != null) {
                foreach ($bas->address as $address_inv) {
                    array_push($address, $address_inv);
                }
            } else {
                array_push($address, 'ไม่มีที่อยู่');
            }
        }
        // dd($address);


        // Get email from buyer
        $emailUser = User::where('id', $basket_all[0]->user_id)->first();
        // $str = preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/', $emailUser->email);


        //Loop for Product_id for search in Product Table
        foreach ($basket_all as $value) {
            foreach ($value->inv_products as $value1) {
                if (isset($value1['type'])) {
                    if ($value1['type'] == 'flashsale') {
                        if (!in_array($value1['product_id'], $product_flash_id)) {
                            array_push($product_flash_id, $value1['product_id']);
                        }
                    }
                } else {
                    if (!in_array($value1['product_id'], $product_product_id)) {
                        array_push($product_product_id, $value1['product_id']);
                    }
                }
            }
        }
        $product = Product::whereIn('id', $product_product_id)->get();
        // AUI EDIT 20210810
        foreach ($product as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $product[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }
        $product_flash = flash::whereIn('id', $product_flash_id)->get();

        $track = invs::where('inv_ref', $basket_all[0]['inv_ref'])->where('shop_id', $basket_all[0]['shop_id'])->first();
        // dd($track);

        return view('shop.sales-list-detail', compact('basket', 'basket_all', 'user_shops', 'invref', 'shipping', 'shipping_details', 'product', 'product_flash', 'emailUser', 'address', 'track'));
    }
    public function searchList(Request $request)
    {
        // dd($request->all());
        if (!isset($request->search) && !isset($request->date_start) && !isset($request->date_end)) {
            return redirect('shop/sales-list');
        }

        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        $basket_id = [];
        $product_all_id = [];
        $product_flash_id = [];
        // $basket_group = invs::where('id',Auth::user()->id)->select('inv_ref','shop_id')->groupBy('inv_ref','shop_id')->get();

        if (isset($request->search) || $request->search == null) {

            if (isset($request->date_start) && isset($request->date_end)) {
                $basket =  invs::where('invs.shop_id', $user_shops->id)
                    ->where('invs.created_at', '>=', $request->date_start)
                    ->where('invs.created_at', '<=', $request->date_end)
                    ->get();

                foreach ($basket as $key_inv => $value_inv) {
                    if ($request->search != '' && strpos(' ' . $value_inv->inv_ref, $request->search)) {
                        array_push($basket_id, $value_inv->id);
                        continue;
                    }
                    foreach ($value_inv->inv_products as $key_pro => $value_pro) {
                        $product = Product::where('id', $value_pro['product_id'])
                            ->where('name', 'LIKE', "%$request->search%")
                            ->first();
                        // AUI EDIT 20210810
                        if ($product) {
                            if (!isset($product->product_img[0])) {
                                $product->product_img = array('0' => '../no_image.png');
                            }
                            array_push($basket_id, $value_inv->id);
                            break;
                        }
                    }
                }
            }
            if (isset($request->date_start) && !isset($request->date_end)) {
                $basket =  invs::where('invs.shop_id', $user_shops->id)
                    ->where('invs.created_at', '>=', $request->date_start)
                    ->get();

                foreach ($basket as $key_inv => $value_inv) {
                    // dd($value_inv->inv_products);
                    if ($request->search != '' && strpos(' ' . $value_inv->inv_ref, $request->search)) {
                        array_push($basket_id, $value_inv->id);
                        continue;
                    }
                    foreach ($value_inv->inv_products as $key_pro => $value_pro) {
                        $product = Product::where('id', $value_pro['product_id'])
                            ->where('name', 'LIKE', "%$request->search%")
                            ->first();
                        // AUI EDIT 20210810
                        if ($product) {
                            if (!isset($product->product_img[0])) {
                                $product->product_img = array('0' => '../no_image.png');
                            }
                            array_push($basket_id, $value_inv->id);
                            break;
                        }
                    }
                }
            }
            if (!isset($request->date_start) && isset($request->date_end)) {
                $basket =  invs::where('invs.shop_id', $user_shops->id)
                    ->where('invs.created_at', '<=', $request->date_end)
                    ->get();

                foreach ($basket as $key_inv => $value_inv) {
                    // dd(strpos($value_inv->inv_ref, $request->search);
                    if ($request->search != '' && strpos(' ' . $value_inv->inv_ref, $request->search)) {
                        array_push($basket_id, $value_inv->id);
                        continue;
                    }
                    foreach ($value_inv->inv_products as $key_pro => $value_pro) {
                        $product = Product::where('id', $value_pro['product_id'])
                            ->where('name', 'LIKE', "%$request->search%")
                            ->first();
                        // AUI EDIT 20210810
                        if ($product) {
                            if (!isset($product->product_img[0])) {
                                $product->product_img = array('0' => '../no_image.png');
                            }
                            array_push($basket_id, $value_inv->id);
                            break;
                        }
                    }
                }
            }
            if (!isset($request->date_start) && !isset($request->date_end)) {
                $basket =  invs::where('invs.shop_id', $user_shops->id)
                    ->get();

                foreach ($basket as $key_inv => $value_inv) {
                    if ($request->search != '' && strpos(' ' . $value_inv->inv_ref, $request->search)) {
                        array_push($basket_id, $value_inv->id);
                        continue;
                    }
                    foreach ($value_inv->inv_products as $key_pro => $value_pro) {
                        $product = Product::where('id', $value_pro['product_id'])
                            ->where('name', 'LIKE', "%$request->search%")
                            ->first();
                        // AUI EDIT 20210810
                        if ($product) {
                            if (!isset($product->product_img[0])) {
                                $product->product_img = array('0' => '../no_image.png');
                            }
                            array_push($basket_id, $value_inv->id);
                            break;
                        }
                    }
                }
            }
            $basket_all = invs::leftJoin('shipping_details', 'shipping_id', 'shipping_details.shipde_id')
                ->leftJoin('shipping_type', 'shipping_details.shipty_id', 'shipping_type.shipty_id')
                ->leftJoin('shops', 'invs.shop_id', 'shops.id')
                ->leftJoin('addresses', function ($join) {
                    $join->on('addresses.user_id', '=', 'shops.user_id');
                    $join->on('addresses.status_address', '=', DB::raw('2'));
                })
                ->orderByRaw('invs.updated_at DESC')
                ->select('invs.*', 'shipping_details.*', 'shipping_type.*', 'shops.shop_name', 'addresses.address1', 'addresses.address2', 'addresses.county', 'addresses.district', 'addresses.city', 'addresses.zipcode', 'addresses.tel')
                ->whereIn('invs.id', $basket_id)->get();
            // print_r($basket_id); exit;
            // echo $basket_all; exit;
        } else {
            if (isset($request->date_start) && isset($request->date_end)) {
                $basket_all =  invs::leftJoin('shipping_details', 'shipping_id', 'shipping_details.shipde_id')
                    ->leftJoin('shipping_type', 'shipping_details.shipty_id', 'shipping_type.shipty_id')
                    ->leftJoin('shops', 'invs.shop_id', 'shops.id')
                    ->leftJoin('addresses', function ($join) {
                        $join->on('addresses.user_id', '=', 'shops.user_id');
                        $join->on('addresses.status_address', '=', DB::raw('2'));
                    })
                    ->orderByRaw('invs.updated_at DESC')
                    ->where('invs.shop_id', $user_shops->id)
                    ->where('invs.created_at', '>=', $request->date_start)
                    ->where('invs.created_at', '<=', $request->date_end)
                    ->select('invs.*', 'shipping_details.*', 'shipping_type.*', 'shops.shop_name', 'addresses.address1', 'addresses.address2', 'addresses.county', 'addresses.district', 'addresses.city', 'addresses.zipcode', 'addresses.tel')->get();
            }
            if (isset($request->date_start) && !isset($request->date_end)) {
                $basket_all =  invs::leftJoin('shipping_details', 'shipping_id', 'shipping_details.shipde_id')
                    ->leftJoin('shipping_type', 'shipping_details.shipty_id', 'shipping_type.shipty_id')
                    ->leftJoin('shops', 'invs.shop_id', 'shops.id')
                    ->leftJoin('addresses', function ($join) {
                        $join->on('addresses.user_id', '=', 'shops.user_id');
                        $join->on('addresses.status_address', '=', DB::raw('2'));
                    })
                    ->orderByRaw('invs.updated_at DESC')
                    ->where('invs.shop_id', $user_shops->id)
                    ->where('invs.created_at', '>=', $request->date_start)
                    ->select('invs.*', 'shipping_details.*', 'shipping_type.*', 'shops.shop_name', 'addresses.address1', 'addresses.address2', 'addresses.county', 'addresses.district', 'addresses.city', 'addresses.zipcode', 'addresses.tel')->get();
            }
            if (!isset($request->date_start) && isset($request->date_end)) {
                $basket_all =  invs::leftJoin('shipping_details', 'shipping_id', 'shipping_details.shipde_id')
                    ->leftJoin('shipping_type', 'shipping_details.shipty_id', 'shipping_type.shipty_id')
                    ->leftJoin('shops', 'invs.shop_id', 'shops.id')
                    ->leftJoin('addresses', function ($join) {
                        $join->on('addresses.user_id', '=', 'shops.user_id');
                        $join->on('addresses.status_address', '=', DB::raw('2'));
                    })
                    ->orderByRaw('invs.updated_at DESC')
                    ->where('invs.shop_id', $user_shops->id)
                    ->where('invs.created_at', '<=', $request->date_end)
                    ->select('invs.*', 'shipping_details.*', 'shipping_type.*', 'shops.shop_name', 'addresses.address1', 'addresses.address2', 'addresses.county', 'addresses.district', 'addresses.city', 'addresses.zipcode', 'addresses.tel')->get();
            }
        }

        foreach ($basket_all as $value) {
            foreach ($value->inv_products as $value1) {
                if (isset($value1['type'])) {
                    if ($value1['type'] == 'flashsale') {
                        if (!in_array($value1['product_id'], $product_flash_id)) {
                            array_push($product_flash_id, $value1['product_id']);
                        }
                    }
                } else {
                    if (!in_array($value1['product_id'], $product_all_id)) {
                        array_push($product_all_id, $value1['product_id']);
                    }
                }
            }
            if ($value->address) {
                // print_r($value->address); exit;
                $a_tmp_address = $value->address[0];
                $a_tmp_addr = explode(' ', $value->address[0]['address']);

                if (trim($a_tmp_addr[sizeof($a_tmp_addr) - 1]) != '') {
                    $a_tmp_address['zipcode'] = $a_tmp_addr[sizeof($a_tmp_addr) - 1];
                } else {
                    $a_tmp_address['zipcode'] = $a_tmp_addr[sizeof($a_tmp_addr) - 2];
                }
                $value->address = $a_tmp_address;
            } else {
                $value->address = array('name' => '', 'address' => '', 'zipcode' => '', 'tel' => '');
            }
        }
        // exit;
        $product_all = Product::whereIn('id', $product_all_id)->get();
        // AUI EDIT 20210810
        foreach ($product_all as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $product_all[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }
        $product_flash = flash::whereIn('id', $product_flash_id)->get();

        return view('shop.sales-list', compact('user_shops', 'basket_all', 'product_all', 'product_flash'));
    }

    public function searchProduct(Request $request)
    {
        // dd($request->all());
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        $products =  Product::where('shop_id', $user_shops->id)
            ->where('name', 'like', "%$request->search%")
            ->orderByRaw('updated_at DESC')->get();

        $flash_product =  flash::where('shop_id', $user_shops->id)
            ->where('name', 'like', "%$request->search%")
            ->orderByRaw('updated_at DESC')->get();

        $products_all = flash::where('shop_id', $user_shops->id)
            ->where('name', 'like', "%$request->search%")
            ->orderByRaw('updated_at DESC')->get();

        // dd($flash_product);

        foreach ($products as $key => $value) {
            $value['type'] = 'regular';
            $products_all[] = $value;
        }

        return view('shop.seller-product', compact('user_shops', 'products', 'flash_product', 'products_all'));
    }

    public function editmyproduct($id)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $product =  Product::findorfail($id);
        $user_shops = Shops::where('user_id', Auth::user()->id)->first();

        // ------------------------------
        $catogorys = Category::with('subcategorys')->get();

        $shipping_detail = [];
        $shipping_type = DB::table('shipping_type')
            ->whereRaw("find_in_set( shipping_type.shipty_id, (select ship_default from shippings where shippings.shop_id = " . $user_shops->id . ") )")
            ->whereRaw("(case when ( shipping_type.shipty_id=4 OR shipping_type.shipty_id=5 OR shipping_type.shipty_id=6 ) then exists(select shipde_id from shipping_details where shipping_details.shop_id = " . $user_shops->id . " AND shipde_price >0 AND shipping_details.shipty_id = shipping_type.shipty_id) else true end)")
            ->get();

        $shipping = shipping::where('shop_id', $user_shops->id)->first();
        if (isset($shipping) && $shipping->ship_name != null && $shipping->ship_name != '') {
            $ship_name = json_decode($shipping->ship_name);
        }

        foreach ($shipping_type as $key => $val) {
            if($val->shipty_id == 4 || $val->shipty_id == 5 || $val->shipty_id == 6){
                $detail = shipping_details::where('shipty_id', $val->shipty_id)->where('shipde_weight', '>', 0)
                                        ->where('shop_id', $user_shops->id)
                                        ->get();
                if(isset($ship_name) && $ship_name[$val->shipty_id-4] != ''){
                    $val->ship_name = $ship_name[$val->shipty_id-4];
                }
            } else {
                $detail = shipping_details::where('shipty_id', $val->shipty_id)->where('shipde_weight', '>', 0)
                                        ->where('shop_id', 0)
                                        ->get();
            }

            // array_push($shipping_detail, $detail);
            $shipping_detail[$val->shipty_id] = $detail;
            // if($val->shipty_id >= 4){
            //     $shipping_type[$key]->ship_name = 'ผู้ขายจัดส่งเอง';
            //     if(isset($ship_name) && $ship_name[$val->shipty_id-4] != ''){
            //         $shipping_type[$key]->ship_name = $ship_name[$val->shipty_id-4];
            //     }
            // } else {
            $shipping_type[$key]->ship_name = $val->shipty_name;
            // }
        }

        $a_box_size = BoxSize::where('is_active', 'Y')->orderBy('size_name', 'ASC')->get();

        // $product_catogorys = DB::table('category')->where("category_id", "=", $product->category_id)->get()->toArray();
        // $product_sub = DB::table('sub_category')->where("sub_category_id", "=", $product->sub_category_id)->get()->toArray();
        $category = Category::where("category_id", "=", $product->category_id)->get();
        $sub_category = SubCategory::where("sub_category_id", "=", $product->sub_category_id)->get();

        // dd($category[0]->category_name);
        return view('shop.editmyproduct',  compact('product', 'user_shops', 'catogorys', 'category', 'sub_category', 'shipping_type', 'shipping_detail', 'a_box_size'));
    }

    public function updateShopInfo(Request $data)
    {
        // dd($data->all());
        // $data = $req->all();

        $validator = Validator::make($data->all(), [
            'shop_name' => 'required|string|max:255',
            'ship_period' => ['nullable', 'string', 'max:100'],
            'shop_pic' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10240'],
            'description' => ['nullable', 'string'],
        ]);
        // dd($data->shop_name);

        if ($validator->fails()) {
            // dd($validator);
            return redirect(route('shop'));
        }

        $shops = shops::Where('user_id', Auth::user()->id)->first();
        // dd($shops);
        // PROFILE IMAGE WRITER
        if (isset($data['shop_pic'])) {
            if ($shops->shop_pic != "default_shop.svg") {
                @unlink(public_path('/img/shop_profiles/') . $shops->shop_pic);
            }
            $image = $data->file('shop_pic');
            $extension = $data['shop_pic']->getClientOriginalExtension();
            $shop_profile_name = 'profile_' . time() . '.' . $extension;
            $location = public_path('public/img/shop_profiles/') . $shop_profile_name;
            // echo $location; exit;
            // Image::make($image)->resize(700, 350)->save($location);
            // Image::make($image)->save($location);
            $image->move('img/shop_profiles/', $shop_profile_name);
            // $in['picture'] = $kyc_name;
        } else {
            $shop_profile_name = $shops->shop_pic;
        }

        // dd($data);
        $shops->shop_name = $data['shop_name'];
        $shops->ship_period = $data['ship_period'];
        $shops->shop_pic = $shop_profile_name;
        $shops->description = $data['description'];
        $shops->ated_province_id = $data['ated_province_id'];
        // $shops->Influencer = $data['Influencer'];

        // dd($user);
        $shops->save();

        // if($data['partner'] != null && $data['partner'] != ''){
        //     $partner = Referal_users::where('user_id', Auth::user()->id)->first();
        //     if(isset($partner)){
        //         $partner->ref_code = $data['partner'];

        //         $partner->save();
        //     }
        //     else{
        //         $model = new Referal_users;

        //         $model->user_id = Auth::user()->id;
        //         $model->ref_code = $data['partner'];

        //         $model->save();
        //     }
        // }

        return redirect(route('shop'));
    }


    public function updatemyproduct(Request $data, $id)
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>'; exit;

        $sum_stock = 0;
        $price_chk = false;
        $product =  Product::find($id);
        // dd($product->barcode);
        // dd($data->category);
        $category = SubCategory::find($data->category);
        // if(isset($data->sku)){
        //     $data->sku=;
        //     } else {
        //     $data->sku='-';
        //     }
        // dd($data->sku);
        // dd($data->price);
        $product_option = array(
            'sku' =>  $data->sku,
            'dis1' =>  $data->dis1,
            'dis2' =>  $data->dis2,
            'price' =>  $data->price,
            'price_special' =>  $data->price_special,
            'margin' =>  $data->margin,
            'stock' =>  $data->stock,
            'option1' =>  $data->option1,
            'option2' =>  $data->option2,
        );
        foreach ($data->stock as $stockvalue) {
            $sum_stock += $stockvalue;
        }
        foreach ($data->price as $pricevalue) {
            if ($pricevalue == 0) {
                $price_chk = true;
            }
        }

        $product->category_id = $category->category;
        $product->sub_category_id = $category->sub_category_id;
        $product->product_option = $product_option;
        $product->name = $data->name;
        $product->description = $data->description;
        $product->product_img = $data->img_upload;
        $product->product_weight = $data->product_weight;
        $product->shipty_id = $data->shipty_id;

        $product->box_size_id1 = $data->box_size_id1;
        $product->box_size_id2 = $data->box_size_id2;
        $product->box_size_id3 = $data->box_size_id3;
        $product->box_pack_amt1 = $data->product_box_pack_amt1;
        $product->box_pack_amt2 = $data->product_box_pack_amt2;
        $product->box_pack_amt3 = $data->product_box_pack_amt3;

        //barcode
        $product->barcode = $data->barcode;
        $flash_sale = flash::where('product_old_id', $id)->first();
        if ($flash_sale) {
            $flash_sale->barcode = $data->barcode;
            $flash_sale->save();
        }
        //barcode


        if ($price_chk || $sum_stock <= 0) {
            $product->status_goods = '2';
        }
        if (isset($data->product_L)) {
            $product->product_L = $data->product_L;
        } else {
            $product->product_L = 0;
        }

        if (isset($data->product_W)) {
            $product->product_W = $data->product_W;
        } else {
            $product->product_W = 0;
        }

        if (isset($data->product_H)) {
            $product->product_H = $data->product_H;
        } else {
            $product->product_H = 0;
        }


        $product->save();
        return redirect()->route('shop.myproduct');
    }


    // public function addoptionupdatemyproduct(Request $data, $id)
    // {
    //     $product =  Product::find($id);

    //     $arr_sku = [];
    //     $arr_dis1 = [];
    //     $arr_dis2 = [];
    //     $arr_price = [];
    //     $arr_stock = [];
    //     $arr_option1 = [];
    //     $arr_option2 = [];
    //     // dd("cccc");
    //     if ($data->dis === 'dis1') {
    //         foreach ($product->product_option['dis1'] as $value) {
    //             array_push($arr_dis1, $value);
    //         }
    //         array_push($arr_dis1, "");
    //         $arr_dis2 = $product->product_option['dis2'];
    //     } else {
    //         foreach ($product->product_option['dis2'] as $value) {
    //             array_push($arr_dis2, $value);
    //         }
    //         array_push($arr_dis2, "");
    //         $arr_dis1 = $product->product_option['dis1'];
    //     }

    //     $i = 0;
    //     $max = count($product->product_option["dis1"]) * count($product->product_option["dis2"]);

    //     // return count($arr_dis1);
    //     foreach ($arr_dis1 as $value) {
    //         foreach ($arr_dis2 as $value2) {
    //             if ($i < $max) {
    //                 array_push($arr_sku, $product->product_option["sku"][$i]);
    //                 array_push($arr_price, $product->product_option["price"][$i]);
    //                 array_push($arr_stock, $product->product_option["stock"][$i]);
    //             } else {
    //                 array_push($arr_sku, "");
    //                 array_push($arr_price, "");
    //                 array_push($arr_stock, "");
    //             }

    //             $i++;
    //         }
    //     }

    //     $product_option = array(
    //         'sku' =>  $arr_sku,
    //         'dis1' =>  $arr_dis1,
    //         'dis2' =>  $arr_dis2,
    //         'price' =>  $arr_price,
    //         'stock' =>   $arr_stock,
    //         'option1' =>  $product->product_option['option1'],
    //         'option2' =>  $product->product_option['option2'],
    //     );


    //     $product->product_option = $product_option;
    //     $product->product_img = $data->img_upload;

    //     if ($product->save()) {
    //         echo json_encode('success');
    //     }
    // }


    public function newmyproduct()
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $user_shops = $this->user_shop();
        // $other = Category::with('subcategorys')->where('category_name', '=', 'อาหาร')->orderBy('category_name', 'ASC')->get();
        $catogorys = Category::with('subcategorys')->where('category_name', '!=', 'อาหาร')->orderBy('category_name', 'ASC')->get();
        // $catogorys = $category1->push($other[0]);
        // $catogorys = Category::with('subcategorys')->get();

        $shipping_detail = [];
        $shipping_type = DB::table('shipping_type')
            ->whereRaw("find_in_set( shipping_type.shipty_id, (select ship_default from shippings where shippings.shop_id = " . $user_shops->id . ") )")
            ->whereRaw("(case when ( shipping_type.shipty_id=4 OR shipping_type.shipty_id=5 OR shipping_type.shipty_id=6 ) then exists(select shipde_id from shipping_details where shipping_details.shop_id = " . $user_shops->id . " AND shipde_price >0 AND shipping_details.shipty_id = shipping_type.shipty_id) else true end)")
            ->get();
        $shipping = shipping::where('shop_id', $user_shops->id)->first();
        if (isset($shipping->ship_name) && $shipping->ship_name != null && $shipping->ship_name != '') {
            $ship_name = json_decode($shipping->ship_name);
        }
        foreach ($shipping_type as $key => $val) {
            if($val->shipty_id == 4 || $val->shipty_id == 5 || $val->shipty_id == 6){
                $detail = shipping_details::where('shipty_id', $val->shipty_id)->where('shipde_weight', '>', 0)
                                        ->where('shop_id', $user_shops->id)
                                        ->get();
                if(isset($ship_name) && $ship_name[$val->shipty_id-4] != ''){
                    $val->ship_name = $ship_name[$val->shipty_id-4];
                }
            } else {
                $detail = shipping_details::where('shipty_id', $val->shipty_id)->where('shipde_weight', '>', 0)
                                        ->where('shop_id', 0)
                                        ->get();
            }

            // array_push($shipping_detail, $detail);
            $shipping_detail[$val->shipty_id] = $detail;
            if ($val->shipty_id >= 4 && $val->shipty_id <= 6) {
                $shipping_type[$key]->ship_name = 'ผู้ขายจัดส่งเอง';
                if (isset($ship_name) && $ship_name[$val->shipty_id - 4] != '') {
                    $shipping_type[$key]->ship_name = $ship_name[$val->shipty_id - 4];
                }
            } else {
                $shipping_type[$key]->ship_name = $val->shipty_name;
            }
        }

        $a_box_size = BoxSize::where('is_active', 'Y')->orderBy('size_name', 'ASC')->get();

        // dd($shipping_type);
        if ($user_shops->approve_shop == 'decline') {
            return redirect('/shop/seller-shop-user-detail');
        } else {
            return view('shop.newmyproduct', compact('catogorys', 'user_shops', 'shipping_type', 'shipping_detail', 'a_box_size'));
        }
    }

    public function addmyproduct(Request $data)
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>'; exit;

        // dd($data->all());
        // dd($data->img_upload);
        $sum_stock = 0;
        $price_chk = false;
        $this->check_shop();
        $user_shops = $this->user_shop();

        $category = SubCategory::find($data->category);
        // dd($category);
        foreach ($data->stock as $stockvalue) {
            $sum_stock += $stockvalue;
        }
        foreach ($data->price as $pricevalue) {
            if ($pricevalue == 0) {
                $price_chk = true;
            }
        }

        $product = new Product();
        $product->name = $data->name;
        $product->description = $data->description;
        $product->category_id = $category->category;
        $product->sub_category_id = $category->sub_category_id;
        $product->shop_id = $user_shops->id;
        $product->product_weight = $data->product_weight;
        $product->barcode = $data->barcode;
        $product->shipty_id = $data->shipty_id;

        $product->box_size_id1 = $data->box_size_id1;
        $product->box_size_id2 = $data->box_size_id2;
        $product->box_size_id3 = $data->box_size_id3;
        $product->box_pack_amt1 = $data->product_box_pack_amt1;
        $product->box_pack_amt2 = $data->product_box_pack_amt2;
        $product->box_pack_amt3 = $data->product_box_pack_amt3;

        if ($price_chk || $sum_stock <= 0) {
            $product->status_goods = '2';
        }
        if (isset($data->product_L)) {
            $product->product_L = $data->product_L;
        } else {
            $product->product_L = 0;
        }

        if (isset($data->product_W)) {
            $product->product_W = $data->product_W;
        } else {
            $product->product_W = 0;
        }

        if (isset($data->product_H)) {
            $product->product_H = $data->product_H;
        } else {
            $product->product_H = 0;
        }
        if ($data['price'] == "" || $data['stock'] == "") {
            // $message = "ขออภัย!! กรอกข้อมูลไม่ถูกต้อง";
            // echo "
            // <script type='text/javascript'>

            //         alert('$message');
            $data->price = array(
                0 => "0"
            );
            $data->stock = array(
                0 => "0"
            );
        }
        if ($data['price_special'] == "") {
            $data->price_special = array(
                0 => "0"
            );
        }

        $margin = array();
        foreach ($data->margin as $key => $value) {
            if ($value == null || $value == '') {
                $value = "0";
                // $value = $data->price[$key]*0.9;
            }
            array_push($margin, $value);
        }

        $product_option = array(
            'sku' => $data->sku,
            'dis1' => $data->dis1,
            'dis2' => $data->dis2,
            'price' => $data->price,
            'price_special' => $data->price_special,
            'margin' => $margin,
            'stock' => $data->stock,
            'option1' => $data->option1,
            'option2' => $data->option2,

        );

        // dd($product_option);
        // $product->product_option = $product_option;
        // $product->product_img = $data->img_upload;

        // $product->save();

        // return redirect()->route('shop.myproduct');
        // return redirect()->route('shop.myproduct');
        // } else {

        $product->product_option = $product_option;


        if ($data->img_upload == null) {
            $product_img = array(
                0 => "no_image.png"
            );
        } else {
            $product_img = $data->img_upload;
        }
        $product->product_img = $product_img;

        if ($data->img_upload2 == null) {
            $product_vdo = array(
                0 => "no_image.png"
            );
        } else {
            $product_vdo = $data->img_upload2;
        }
        $product->product_vdo = $product_vdo;

        $product->save();

        return redirect()->route('shop.myproduct');
    }

    public function addmyproduct_imgupload(Request $request)
    {
        //dd($request);
        $user_shops = shops::Where('user_id', Auth::user()->id)->first();
        $file = request()->file('file');
        // $filename = str_replace(" ", "", microtime()) . $file->getClientOriginalName();
        $filename = str_replace(" ", "", microtime()) . "_" . $user_shops->id . "." . $file->getClientOriginalExtension();
        $path     = $request->file('file')->move(public_path('img/product/'), $filename);
        $photoURL = url('img/product/' . $filename);
        return response()->json(['uploaded' => $filename]);
    }


    public function addmyproduct_imgupload_delete(Request $request, $img)
    {
        if ($request->key != 'no_image.png') {
            $image_path = "img/product/" . $request->key;  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        return response()->json(['uploaded' => $request->all()]);
    }

    public function deletemyproduct(Request $data, $id)
    {
        $user_shops = $this->user_shop();

        $product = Product::where('id', $id)->update(['status_goods' => 3]);

        $o_inv = invs::where('shop_id', $user_shops->id)->where('status', '=', 0)->get();
        foreach ($o_inv as $k_inv => $v_inv) {
            $i_total = 0;
            $a_new_inv_product = array();
            foreach ($v_inv->inv_products as $k_product => $v_product) {
                if ($v_product['product_id'] == $id) {
                    // unset($a_inv[$k_inv]->inv_products[$k_product]);
                    // echo $v_product['product_id'].' == '.$id.'<hr>';
                } else {
                    array_push($a_new_inv_product, $v_product);
                    $i_total += $v_product['price'] * $v_product['amount'];
                }
            }
            $o_inv[$k_inv]->inv_products = $a_new_inv_product;
            $o_inv[$k_inv]->total = $i_total;
            $o_inv[$k_inv]->save();
            // echo print_r($o_inv[$k_inv]->inv_products).'<hr>';
        }
        // $o_inv->save();

        return redirect()->route('shop.myproduct');
    }

    ///shipping
    public function shipping()
    {
        // Auth::loginUsingId(30);
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $shipping_type = DB::table('shipping_type')->where('shipty_id', '!=', '1')->get();
        $this->check_shop();
        $user_shops = $this->user_shop();
        $this->check_shop();
        // dd($user_shops);

        $shipping_detail = [];
        $shipping = shipping::where('shop_id', $user_shops->id)->first();
        if (isset($shipping->ship_name) || $shipping->ship_name != null || $shipping->ship_name != '') {
            $ship_name = json_decode($shipping->ship_name);
        }
        foreach ($shipping_type as $val) {
            if($val->shipty_id == 4 || $val->shipty_id == 5 || $val->shipty_id == 6){
                $detail = shipping_details::where('shipty_id', $val->shipty_id)->where('shipde_weight', '>', 0)
                                        ->where('shop_id', $user_shops->id)
                                        ->get();
                if(isset($ship_name) && $ship_name[$val->shipty_id-4] != ''){
                    $val->ship_name = $ship_name[$val->shipty_id-4];
                }
            } else {
                $detail = shipping_details::where('shipty_id', $val->shipty_id)->where('shipde_weight', '>', 0)
                                        ->where('shop_id', 0)
                                        ->get();
            }
            $shipping_detail[$val->shipty_id] = $detail;
            if ($val->shipty_id == 4 || $val->shipty_id == 5 || $val->shipty_id == 6) {
                if (isset($ship_name) && $ship_name[$val->shipty_id - 4] != '') {
                    $val->ship_name = $ship_name[$val->shipty_id - 4];
                }
            }
        }
        // echo '<pre>';
        // print_r($shipping_detail[4]);
        // echo '</pre>'; exit;
        // dd($shipping_detail);

        // dd($user_shops);
        return view('shipping.shipping',  compact('user_shops', 'shipping_type', 'shipping_detail'));
    }

    public function update_selfShipping(Request $request)
    {
        // dd($request->all());
        $user_shops = $this->user_shop();

        $check_name = shipping::where('shop_id', $user_shops->id)->first();
        // dd($check_name);
        if ($request->ship_name == null) {
            $request->ship_name = '';
        }

        if (isset($check_name->ship_name) || $check_name->ship_name != null || $check_name->ship_name != '') {
            $name_arr = json_decode($check_name->ship_name);
            $name_arr[$request->shipty_id - 4] = $request->ship_name;
            $update_name = shipping::where('shop_id', $user_shops->id)->update([
                'ship_name' => $name_arr,
            ]);
        } else {
            $name_arr = [];
            if ($request->shipty_id == 4) {
                $name_arr[0] = $request->ship_name;
                $name_arr[1] = '';
                $name_arr[2] = '';
            } else if ($request->shipty_id == 5) {
                $name_arr[0] = '';
                $name_arr[1] = $request->ship_name;
                $name_arr[2] = '';
            } else if ($request->shipty_id == 6) {
                $name_arr[0] = '';
                $name_arr[1] = '';
                $name_arr[2] = $request->ship_name;
            }

            $update_name = shipping::where('shop_id', $user_shops->id)->update([
                'ship_name' => $name_arr,
            ]);
        }

        $ship_weight = [1000, 3000, 5000, 10000, 15000, 20000, 25000, 30000, 35000];

        foreach ($request->price as $price_key => $price_val) {
            $check_price = shipping_details::where('shop_id', $user_shops->id)->where('shipty_id', $request->shipty_id)
                ->where('shipde_weight', $ship_weight[$price_key])->first();

            if (!isset($check_price)) {
                $model_price = new shipping_details;
                $model_price->shipde_price = $request->price[$price_key];
                $model_price->shipde_price_cross_area = $request->price_cross[$price_key];
                $model_price->shipde_weight = $ship_weight[$price_key];
                $model_price->shipty_id = $request->shipty_id;
                $model_price->shop_id = $user_shops->id;

                $model_price->save();
            } else {
                $update_price = shipping_details::where('shop_id', $user_shops->id)->where('shipty_id', $request->shipty_id)
                    ->where('shipde_weight', $ship_weight[$price_key])->update([
                        'shipde_price' => intval($request->price[$price_key]),
                        'shipde_price_cross_area' => intval($request->price_cross[$price_key]),
                    ]);
            }
        }


        return redirect()->back();
    }

    public function getShoppingType(Request $params)
    {
        $this->check_shop();
        $user_shops = $this->user_shop();

        $results = DB::table('shipping_details')->where("shipty_id", $params->shipty_id)
            ->where(function ($query) use ($params) {
                // $params->shop_id
                $query->orWhere("shop_id", 0);
                $query->orWhere("shop_id", $params->shop_id);
            })->get();

        // $check_id = DB::table('shipping_details')
        //     ->join('shippings', 'shippings.shipde_id', '=', 'shipping_details.shipde_id')
        //     ->where('shipping_details.shipty_id', $params->shipty_id)
        //     ->select('shipping_details.shipde_id')
        //     ->get();
        // dd($check_id);

        return $results;
    }

    public function fixedNewShipping()
    {

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 10000)
            ->update([
                'shipde_weight' => 35000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 6000)
            ->update([
                'shipde_weight' => 30000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 4000)
            ->update([
                'shipde_weight' => 25000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 2000)
            ->update([
                'shipde_weight' => 20000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 1000)
            ->update([
                'shipde_weight' => 15000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 500)
            ->update([
                'shipde_weight' => 10000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 250)
            ->update([
                'shipde_weight' => 5000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 100)
            ->update([
                'shipde_weight' => 3000
            ]);

        DB::table('shipping_details')->where("shipty_id", 4)
            ->where("shipde_weight", 20)
            ->update([
                'shipde_weight' => 1000
            ]);

        return 'success';
    }

    public function fixedNewShipping1()
    {
        try {
            $delete = DB::table('shipping_details')->where("shipty_id", 1)->delete();
            if ($delete) {
                $price = [80, 50, 40, 35, 30, 28, 27, 25, 24, 22, 18, 16, 14, 12];
                $weight = [1000, 3000, 5000, 7000, 9000, 12000, 15000, 17000, 20000, 50000, 100000, 250000, 500000, 1000000];
                foreach ($price as $key => $value) {
                    DB::table('shipping_details')
                        ->insert([
                            'shipty_id' => 1,
                            'shipde_weight' => $weight[$key],
                            'shipde_price' => $price[$key],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'shop_id' => 0,
                        ]);
                }
                return 'success';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addShippingPrice(Request $request)
    {
        // dd($request->shipde_price);
        // dd($request->shipde_id);
        $now = new DateTime();

        for ($x = 0; $x <= 8; $x++) {
            DB::table('shipping_details')->where('shipde_id', $request->shipde_id[$x])
                ->update([
                    'shipde_price' => $request->shipde_price[$x],
                    'shipty_id' => 4,
                    'updated_at' => $now,
                    'shop_id' => $request->shop_id
                ]);
        }
    }


    // public function addShippingDetail(Request $dataAdd)
    // {
    //     $this->check_shop();
    //     $user_shops = $this->user_shop();
    //     $now = new DateTime();

    //     // dd($dataAdd->check_shipid);
    //     // echo '<pre>'; print_r($user_shops); echo '</pre>'; exit();
    //     DB::table('shippings')
    //         ->where('shop_id', $user_shops->id)
    //         ->where('shipty_id', $dataAdd->shipty_id)
    //         ->delete();
    //     $wordCount = count($dataAdd->check_shipid);


    //     for ($i = 0; $i < $wordCount; $i++) {
    //         // echo '<pre>'; print_r($dataAdd->price_shipping[$dataAdd->check_shipid[$i]]); echo '</pre>';
    //         DB::table('shippings')->insert(
    //             [
    //                 'shop_id' => $user_shops->id,
    //                 'ship_default' => 0,
    //                 'ship_price' => $dataAdd->price_shipping[$dataAdd->check_shipid[$i]],
    //                 'shipde_id' => $dataAdd->check_shipid[$i],
    //                 'shipty_id' => $dataAdd->shipty_id,
    //                 'created_at' => $now,
    //                 'updated_at' => $now
    //             ]
    //         );
    //     }
    //     $shipping_type = DB::table('shipping_type')->get();
    //     return redirect(route('shipping'));
    // }
    public function checkShippingType(Request $request)
    {
        // dd($request->shop_id);
        $results = [];
        $results = DB::table('shipping_details')
            ->where("shop_id", $request->shop_id)
            ->get()->ToArray();
        if (empty($results)) {
            // dd("GG");
            $now = new DateTime();
            $weight = [1000, 3000, 5000, 10000, 15000, 20000, 25000, 30000, 35000];
            for ($x = 0; $x <= 8; $x++) {
                DB::table('shipping_details')->insert([
                    'shipde_price' => 0,
                    'shipde_wide' =>  0,
                    'shipde_high' => 0,
                    'shipde_long' => 0,
                    'shipde_weight' => $weight[$x],
                    'shipty_id' => 4,
                    'created_at' => $now,
                    'updated_at' => $now,
                    'shop_id' => $request->shop_id
                ]);
            }
        }
    }

    public function getShoppingDetail(Request $request)
    {
        // $user_shops = $this->user_shop();
        // dd($request->shop_id);
        $results = [];
        $results = DB::table('shippings')
            ->where("shop_id", $request->shop_id)
            ->get()->ToArray();

        return $results;
    }

    public function checkShippingDetail(Request $request)
    {
        // dd($request->shipty_id);
        $res_array = [];
        foreach ($request->shipty_id as $key) {
            $data = substr($key, 6);
            array_push($res_array, $data);
        }
        sort($res_array);
        // dd($ship_option);
        $shipty = implode(',', $res_array);
        // dd($shipty);

        $user_shops = $this->user_shop();
        $now = new DateTime();
        // echo json_encode($arraydata);
        $a_shipping = DB::table('shippings')
            ->where('shop_id', $user_shops->id)->first();
        $s_ship_name = $a_shipping->ship_name;

        shipping::where('shop_id', $user_shops->id)->delete();
        // DB::table('shippings')
        //     ->where('shop_id', $user_shops->id)
        //     ->delete();

        shipping::insert([
            'shop_id' => $user_shops->id,
            'ship_default' =>  $shipty,
            'ship_price' => 0,
            'shipde_id' => 0,
            'shipty_id' => 0,
            'ship_name' => $s_ship_name,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        return response()->json('success', 200);
    }


    // Shipping




    public function goodsAllShops()
    {
        $shop = Shops::orderBy('updated_at', 'desc')->where('approve_shop', '!=', 'decline')
            ->where(function ($query) {
                $query->where('shop_sts', '!=', 'close')
                    ->orWhereNull('shop_sts');
            })
            ->paginate(30);

        // $shop2 = Shops::where('approve_shop', '!=', 'decline')->leftJoin('product_s', 'product_s.shop_id', '=', 'shops.id')->get();
        foreach ($shop as $key => $value) {
            $product = Product::where('shop_id', $value->id)->get();
            if (isset($product)) {
                $shop[$key]['product'] = count($product);
            } else {
                $shop[$key]['product'] = 0;
            }
        }
        $shop->setCollection($shop->sortByDesc('product'));
        // $sorted = $shop->sortByDesc('product');
        // $shop = Shops::orderBy('updated_at', 'desc')->where('approve_shop', '!=', 'decline')->paginate(30);

        $rating_group = rating::all();
        // dd($shop);
        return view('shop.shop-user', compact('shop', 'rating_group'));
    }
    public function detailsGoodsAllShops(Request $request)
    {
        // dd($request);
        $shop = Shops::where('id', $request['id'])->get();
        // dd($shop);
        if ($shop[0]->approve_shop == 'decline') {
            return view('pages.error404');
        }
        $product_all_Shop = Product::join('shops', 'shops.id', 'shop_id')->where('shop_id', $request['id'])
            ->where('status_goods', '=', '1')
            ->where('shops.shop_sts', 'open')->where('shops.kyc_status', 'approve')->whereNotNull('shops.bank_number')
            ->whereRaw('exists(select id from addresses where addresses.user_id = shops.user_id and status_address=2)')
            ->where(DB::raw("TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) "), '>', 0);
        if ($request->sortBy != 'undefined' && $request->sortBy != null) {
            if ($request->sortBy == 'ctime') {
                $product_all_Shop = $product_all_Shop->orderBy('product_s.created_at', 'DESC');
            } elseif ($request->sortBy == 'sales') {
                $product_all_Shop = $product_all_Shop->orderBy('product_s.sold_amt', 'DESC');
            } elseif ($request->sortBy == 'priceMore') {
                // $product_all_Shop = $product_all_Shop->orderByRaw("getMin(JSON_EXTRACT(product_s.product_option,'$.price','$'))+0 DESC");
                $product_all_Shop = $product_all_Shop->orderByRaw("(CASE WHEN TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) != 'null' AND TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') )>0 THEN CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) AS SIGNED ) ELSE CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) AS SIGNED ) END) DESC");
                // dd($product_all_Shop->toSql());
            } elseif ($request->sortBy == 'priceLess') {
                // $product_all_Shop = $product_all_Shop->orderByRaw("getMin(JSON_EXTRACT(product_s.product_option->'$.price','$'))+0 ASC");
                $product_all_Shop = $product_all_Shop->orderByRaw("(CASE WHEN TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) != 'null' AND TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') )>0 THEN CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) AS SIGNED ) ELSE CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) AS SIGNED ) END) ASC");
            } else { // POP
                $product_all_Shop = $product_all_Shop->orderBy('product_s.view_cnt', 'DESC');
            }
        }
        // echo $product_all_Shop->toSql(); exit;
        $product_all_Shop = $product_all_Shop->select('product_s.*')->get();

        // AUI EDIT 20210810
        foreach ($product_all_Shop as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $product_all_Shop[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }

        $flash_all_Shop = flash::where('shop_id', $request['id'])
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->orderBy('product_pin', 'desc')
            ->get();
        $rating_group = rating::where('shop_id', $request['id'])->get();
        // dd($rating);

        // dd($product_all_Shop);
        return view('shop.shop-user-detail', compact('product_all_Shop', 'flash_all_Shop', 'shop', 'rating_group'));
    }
    public function ShopSeller()
    {
        $shop = Shops::where('user_id', Auth::user()->id)->get();
        $products = Product::where('shop_id', $shop)->get();
        dd($products);


        return view('shop.product-new', compact('shop', 'products'));
    }

    public function sellerShopUserDetail()
    {
        $user_shops = $this->user_shop();
        $rating_group = rating::where('shop_id', $user_shops->id)->get();

        if (!isset(Auth::user()->id)) {
            echo "<script language=\"JavaScript\">";
            echo "alert('กรุณาล็อกอินเพื่อเข้าใช้งาน')";
            echo "</script>";
            return redirect('/');
        }
        $shop = Shops::where('user_id', Auth::user()->id)->get();
        // dd($shop);
        $products = Product::where('shop_id', $shop[0]->id)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->get();
        // AUI EDIT 20210810
        foreach ($products as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $products[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }
        $address = Address::where('user_id', Auth::user()->id)->where('status_address', '=',  '2')->orderBy('updated_at', 'DESC')->get();
        $kyc = Kyc::where('shop_id', '=', $user_shops->id)->get();

        $monthList = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        // dd($address);
        return view('shop.seller-shop-user-detail', compact('monthList', 'shop', 'products', 'user_shops', 'rating_group', 'address', 'kyc'));
    }






    // Address ShopSeller \\

    public function ShopAddress()
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        $address = Address::where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->get();
        // dd($address);
        return view('shop.seller-address')->with(["address" => $address, 'user_shops' => $user_shops]);
    }

    public function addShopAddress(Request $request)
    {
        //--------- This function for just a create new Address --------------\\\
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'string', 'max:255'],
            'name'    => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'tel'     => ['required', 'regex:/(0)[0-9]{9}/'],
            'address1' => ['required', 'string', 'max:255'],
            // 'address2' => ['required', 'string', 'max:255'],
            'county'  => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'city'    => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'integer', 'digits:5'],
            // 'country' => ['required', 'string', 'max:255'],
            // 'status'  => ['required', 'integer', 'max:3'],

        ], [
            'name.required' => 'กรุณากรอกชื่อ',
            'name.max' => 'จำนวนตัวอักษรยาวเกินไป',

            'surname.required' => 'กรุณากรอกนามสกุล',
            'surname.max' => 'จำนวนตัวอักษรยาวเกินไป',

            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'tel.regex' => 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง',

            'address1.required' => 'กรุณากรอกที่อยู่',
            'address1.max' => 'จำนวนตัวอักษรยาวเกินไป',

            'county.required' => 'กรุณากรอกอำเภอ',
            'county.max' => 'จำนวนตัวอักษรยาวเกินไป',

            'district.required' => 'กรุณากรอกตำบล',
            'district.max' => 'จำนวนตัวอักษรยาวเกินไป',

            'city.required' => 'กรุณากรอกชื่อจังหวัด',
            'city.max' => 'จำนวนตัวอักษรยาวเกินไป',

            'zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'zipcode.digits' => 'จำนวนรหัสไปรษณีย์ไม่ครบ',



        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        // dd($request->all());
        $data['status'] = 'false';
        $address = Address::Where('user_id', Auth::user()->id)->get();
        // dd($address);
        $address = Address::create([
            'user_id' => Auth::user()->id,
            'name' => $request['name'],
            'surname' => $request['surname'],
            'tel' => $request['tel'],
            'address1' => $request['address1'],
            'address2' => $request['address2'],
            'county' => $request['county'],
            'district' => $request['district'],
            'city' => $request['city'],
            'zipcode' => $request['zipcode'],
            'country' => $request['country'],
            'status' => 0,
            'status_address' => $request['status'],

        ]);
        if ($address) {
            $data['status'] =  'true';
            $data['id'] = $address->id;
            if ($request['status'] == 2) {
                Address::where('id', '!=', $address->id)->where('user_id', Auth::user()->id)->update([
                    'status_address' => 0,
                ]);
            }
        }
        return $data;
    }
    public function editShopAddress(Request $request)
    {
        // dd($request['name_edit']);
        $addMore = $request->alley . " " . $request->street;
        $address = Address::where('id', $request['id'])->update([
            // 'user_id' => Auth::user()->id,
            'name' => $request['name_edit'],
            'surname' => $request['surname_edit'],
            'tel' => $request['tel_edit'],
            'address1' => $request['address1_edit'],
            'address2' => $request['address2_edit'],
            'county' => $request['county_edit'],
            'district' => $request['district_edit'],
            'city' => $request['city_edit'],
            'zipcode' => $request['zipcode_edit']
        ]);



        return redirect()->back();
    }

    public function setShopAddress(Request $request)
    {

        Address::where('id', $request['id'])->update([
            'status_address' => '2',
            'updated_at' => new DateTime(),
        ]);
        Address::where('id', '!=', $request['id'])->where('user_id', Auth::user()->id)->update([
            'status_address' => '0',
            'updated_at' => new DateTime(),
        ]);

        return redirect()->back();
    }

    public function setBackShopAddress(Request $request)
    {

        Address::where('id', $request['id'])->update([
            'status_address' => '0',
            'updated_at' => new DateTime(),
        ]);

        Address::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();

        return redirect()->back();
    }


    public function deleteShopAddress(Request $request)
    {
        // dd($request);

        Address::where('id', $request['id'])->delete();
        return redirect()->back();
    }
    // Address ShopSeller \\


    //addsellerbank//
    public function addbank(Request $request)
    {
        // dd(Auth::user()->id);
        // DB::table('shops')->where('user_id',Auth::user()->id)->insert([
        $values = DB::table('shops')->where('user_id', Auth::user()->id)
            ->update([
                'bank_code' => $request->bankcode,
                'bank_number' => $request->banknumber,
                'bank_name' => $request->bankname,
                'bank_category' => $request->bankclass,
            ]);
        // dd($values);
        return response()->json($request['content'], 200);
    }

    public function getbank(Request $request)
    {

        $values = DB::table('shops')
            ->where("user_id", Auth::user()->id)
            ->get();

        return $values;
    }
    public function editbank(Request $request)
    {
        //  dd($request);
        // $values = DB::table('shops')->where('user_id',Auth::user()->id)
        // ->update([
        //     'bank_code' => $request['bankcode'],
        //     'bank_number' => $request['banknumber'],
        //     'bank_name' => $request['bankname'],
        //     'bank_category' => $request['bankclass'],

        $values = DB::table('shops')->where('user_id', Auth::user()->id)
            ->update([
                'bank_code' => $request->bankcode,
                'bank_number' => $request->banknumber,
                'bank_name' => $request->bankname,
                'bank_category' => $request->bankclass,
            ]);
        // ]);
        dd($request);
        return response()->json($request['content'], 200);
    }
    public function deletebank(Request $request)
    {
        // dd(Auth::user()->id);
        // DB::table('shops')->where('user_id',Auth::user()->id)->insert([
        $values = DB::table('shops')->where('user_id', Auth::user()->id)
            ->update([
                'bank_code' => null,
                'bank_number' => null,
                'bank_name' => null,
                'bank_category' => null,
            ]);
        // dd($values);
        return redirect()->back();
    }

    public function addsellerbank()
    {

        return view('shop.addsellerbank');
    }

    public function addsellerbank2()
    {
        $data['bank'] = BankMaster::get();

        $user_bank = User::where('id', Auth::user()->id)->first();
        $shop_bank = Shops::where('user_id', Auth::user()->id)->first();

        if ($shop_bank->bank_number != null) {
            $BankMaster = BankMaster::where('name', $shop_bank->bank_code)->first();
            $logo = $BankMaster->logo;
        } else {
            $logo = '';
        }

        return view('shop.addsellerbank2', $data, compact('user_bank', 'shop_bank', 'logo')); //thiss
    }

    public function addbank2(Request $request)
    {
        // dd(Auth::user()->id);
        // DB::table('shops')->where('user_id',Auth::user()->id)->insert([
        $values = DB::table('shops')->where('user_id', Auth::user()->id)
            ->update([
                'bank_code' => $request->bank_code,
                'bank_number' => $request->bank_number,
                'bank_name' => $request->bank_name,
                'bank_category' => $request->bank_category,
            ]);
        // dd($values);
        return redirect()->back();
    }

    public function deletebank2(Request $request)
    {
        // dd(Auth::user()->id);
        // DB::table('shops')->where('user_id',Auth::user()->id)->insert([
        $values = DB::table('shops')->where('user_id', Auth::user()->id)
            ->update([
                'bank_code' => null,
                'bank_number' => null,
                'bank_name' => null,
                'bank_category' => null,
            ]);
        // dd($values);
        return redirect()->back();
    }



    //addsellerbank//enddddddd

    // shipping_note
    public function newShippingNote(Request $request)
    {
        // dd($request->all());
        // echo $request->shipping_note.' - '.$request->status.' - '.$request->id; exit;
        if ($request->status == '2' && $request->shipping_note != null && $request->shipping_note != '') {
            DB::table('invs')->where('id', $request->id)
                ->update([
                    'tracking_number' => $request->shipping_note,
                    'track_at' => date('Y-m-d H:i:s'),
                    'status' => 3,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
        } else {
            DB::table('invs')->where('id', $request->id)
                ->update([
                    'tracking_number' => $request->shipping_note,
                    'track_at' => date('Y-m-d H:i:s')
                ]);
        }
    }

    public function getShippingNote(Request $request)
    {
        $results = [];
        $results = DB::table('invs')
            ->where("shop_id", $request->shop_id)
            ->where("status", $request->status_id)
            ->get()->ToArray();

        return $results;
    }

    public function confirmProductUser(Request $request)
    {
        // dd($request->all());

        $shop_user = DB::table('shops')
            ->where('id', $request->shops_id)
            ->first();

        $invs = DB::table('invs')
            ->where('id', $request->invs_id)
            ->first();

        $balance = DB::table('balances')
            ->where('user_id', $shop_user->user_id)
            ->first();

        $ref_user = DB::table('referal_users')
            ->where('user_id', $shop_user->user_id)
            ->first();

        DB::table('invs')->where('id', $request->invs_id)
            ->update([
                'status' => 5
            ]);

        if ($invs->payment == "bank") {
            $payment =  "Banking";
        } elseif ($invs->payment == "mobilebanking") {
            $payment =  "QRCode";
        } elseif ($invs->payment == "cerdit") {
            $payment =  "Credit";
        } elseif ($invs->payment == "wallet") {
            $payment =  "MultiPay";
        } elseif ($invs->payment == "crypto") {
            $payment =  "Crypto";
        } else {
            $payment =  "Other";
        }

        if ($invs->uidmp != '' || $invs->uidmp != null) {
            if ($ref_user) {
                $branch_id = PseudoCryptController::unhash($ref_user->ref_code, 8);

                $branch_shop = DB::table('shops')
                    ->where('user_id', $branch_id)
                    ->first();

                $Gtotal = 0;
                $inv_detail = json_decode($invs->inv_products);

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
                if ($invs->gp_rate > 0) {
                    $Gtotal = $invs->shipping_cost + ($Gtotal * ((100 - $invs->gp_rate) / 100));
                } else {
                    $Gtotal = $invs->shipping_cost + $Gtotal;
                }

                // dd($Gtotal);
                $newCredit = $balance->seller_credit + $Gtotal;
                // dd($payment);

                $income = new branch_income;
                $income->inv_id = $invs->id;
                $income->total = $Gtotal;
                $income->bird_cost = $Gtotal * 0.07;
                $income->branch_cost = $Gtotal * 0.03;
                $income->branch_id = $branch_id;

                $income->save();

                $branch_balance = balance::where('user_id', $branch_id)->first();

                DB::table('balances')->where('user_id', $branch_shop->user_id)
                    ->update([
                        'seller_credit' => $branch_balance->seller_credit + ($Gtotal * 0.03)
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
                    'inv_id' => $request->invs_id,
                    'amount' => $Gtotal * 0.03,
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
                $inv_detail = json_decode($invs->inv_products);

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
                if ($invs->gp_rate > 0) {
                    $Gtotal = $invs->shipping_cost + ($Gtotal * ((100 - $invs->gp_rate) / 100));
                } else {
                    $Gtotal = $invs->shipping_cost + $Gtotal;
                }
                // dd($Gtotal);
                $newCredit = $balance->seller_credit + $Gtotal;
                // dd($payment);
                $income = new branch_income;
                $income->inv_id = $invs->id;
                $income->total = $Gtotal;
                $income->bird_cost = $Gtotal * ($invs->gp_rate / 100);

                $income->save();
            }
        } else {
            if ($ref_user) {
                $branch_id = PseudoCryptController::unhash($ref_user->ref_code, 8);

                $branch_shop = DB::table('shops')
                    ->where('user_id', $branch_id)
                    ->first();

                if ($invs->gp_rate > 0) {
                    $Gtotal = $invs->shipping_cost + ($invs->total * ((100 - $invs->gp_rate) / 100));
                } else {
                    $Gtotal = $invs->shipping_cost + $invs->total;
                }

                $newCredit = $balance->seller_credit + $Gtotal;
                // dd($payment);

                $income = new branch_income;
                $income->inv_id = $invs->id;
                $income->total = $invs->total;
                $income->bird_cost = $invs->total * 0.07;
                $income->branch_cost = $invs->total * 0.03;
                $income->branch_id = $branch_id;

                $income->save();

                $branch_balance = balance::where('user_id', $branch_id)->first();

                DB::table('balances')->where('user_id', $branch_shop->user_id)
                    ->update([
                        'seller_credit' => $branch_balance->seller_credit + ($invs->total * 0.03)
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
                    'inv_id' => $request->invs_id,
                    'amount' => $invs->total * 0.03,
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
                if ($invs->gp_rate > 0) {
                    $Gtotal = $invs->shipping_cost + ($invs->total * ((100 - $invs->gp_rate) / 100));
                } else {
                    $Gtotal = $invs->shipping_cost + $invs->total;
                }

                $newCredit = $balance->seller_credit + $Gtotal;
                // dd($payment);
                $income = new branch_income;
                $income->inv_id = $invs->id;
                $income->total = $invs->total;
                $income->bird_cost = $invs->total * 0.07;
                $income->branch_cost = $invs->total * 0.03;

                $income->save();
            }
        }
        $findwithdrow = withdrow::where('inv_id', $invs->id)
            ->where('user_id', $shop_user->user_id)
            ->where('shop_id', $invs->shop_id)
            ->first();
        if (!$findwithdrow) {
            if ($invs->payment == "wallet") {
                // dd($request->invs_id);
                $withdraw = withdrow::create([
                    'user_id' => $shop_user->user_id,
                    'shop_id' => $request->shops_id,
                    'inv_id' => $request->invs_id,
                    'amount' => $Gtotal,
                    'usdc' => $invs->usdc,
                    'type' => $payment,
                    'status' => 0,
                    'bank_code' => $shop_user->bank_code,
                    'bank_name' => $shop_user->bank_name,
                    'bank_category' => $shop_user->bank_category,
                    'bank_number' => strval($shop_user->bank_number),

                ]);
            } else {

                // if (!isset($shop_user->bank_code) || !isset($shop_user->bank_name) || !isset($shop_user->bank_category) || !isset($shop_user->bank_number)) {
                //     $withdraw = withdrow::create([
                //         'user_id' => $shop_user->user_id,
                //         'shop_id' => $request->shops_id,
                //         'inv_id' => $request->invs_id,
                //         'amount' => $Gtotal,
                //         'type' => $payment,
                //         'status' => 0,
                //         'bank_code' => $shop_user->bank_code,
                //         'bank_name' => $shop_user->bank_name,
                //         'bank_category' => $shop_user->bank_category,
                //         'bank_number' => strval($shop_user->bank_number),

                //     ]);
                // } else {
                $withdraw = withdrow::create([
                    'user_id' => $shop_user->user_id,
                    'shop_id' => $request->shops_id,
                    'inv_id' => $request->invs_id,
                    'amount' => $Gtotal,
                    'usdc' => $invs->usdc,
                    'type' => $payment,
                    'status' => 0,
                    'bank_code' => $shop_user->bank_code,
                    'bank_name' => $shop_user->bank_name,
                    'bank_category' => $shop_user->bank_category,
                    'bank_number' => strval($shop_user->bank_number),

                ]);
                // }
            }

            DB::table('balances')->where('user_id', $shop_user->user_id)
                ->update([
                    'seller_credit' => $newCredit
                ]);
        }

        foreach (json_decode($invs->inv_products) as $value) {
            // dd($value);
            if (isset($value->product_id)) {
                DB::table('product_s')->where('id', $value->product_id)
                    ->increment('sold_amt', $value->amount);
            }
        }
        if ($invs->uidmp) {
            $data_array = array(
                "inv_ref" => $invs->inv_ref,
                "inv_id" => $invs->id,
                "status" => 2,
                "domain" => 'birdfresh',
            );
            $make_call = $this->callAPI('POST', 'https://dev.shopteeniimp.com/api/v1/update_order_success', json_encode($data_array));
            $response = json_decode($make_call, true);
        }

        return 'true';
    }


    // END AUI



    // $sales_amount = sales_amount::create([
    //     'shop_id' => $request->shops_id,
    //     'invs_id' => $request->invs_id,
    //     'type' => $payment,
    //     'amount' => $Gtotal,
    //     'status' => "Withdrawable",
    // ]);

    // $sales_amount = new sales_amount();
    // $sales_amount->shop_id = $request->shops_id;
    // $sales_amount->invs_id = $request->invs_id;
    // $sales_amount->type = $payment;
    // $sales_amount->amount = $Gtotal;
    // $sales_amount->status = "Withdrawable";
    // $sales_amount->save();

    // DB::table('balances')->insert([
    //     'user_id' => $shop_user[0]->user_id,
    //     'seller_credit' =>  $request->total_price,
    //     'created_at' => new DateTime(),
    //     'updated_at' => new DateTime()
    // ]);
    // dd($sales_amount);

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

    public function changeStatusGoods(Request $request)
    {
        DB::table('product_s')->where('id', $request->product_id)
            ->update([
                'status_goods' => $request->status_goods
            ]);
    }
    public function changeStatusShop(Request $request)
    {
        DB::table('shops')->where('user_id', Auth::user()->id)
            ->update([
                'shop_sts' => $request->shop_sts
            ]);
    }

    public function changeReceiveGoods(Request $request)
    {
        DB::table('product_s')->where('id', $request->product_id)
            ->update([
                'receive_product' => $request->receive_product
            ]);
        DB::table('flash_sales')->where('id', $request->product_id)
            ->update([
                'receive_product' => $request->receive_product
            ]);
    }

    public function getStatusGoods(Request $request)
    {
        $res_product = DB::table('product_s')->where('shop_id', $request->shop_id)->get();
        return $res_product;
    }


    public function sendTrackingNumber(Request $request)
    {
        // dd($request->all());

        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        if ($request->status < 3) {
            DB::table('invs')->where(
                'inv_ref',
                $request['inv_ref']
            )->where('shop_id', $request['shop_id'])
                ->update([
                    'tracking_number' => $request['tracking_number2'],
                    'status' => 3
                ]);
        } else {
            DB::table('invs')->where(
                'inv_ref',
                $request['inv_ref']
            )->where('shop_id', $request['shop_id'])
                ->update([
                    'tracking_number' => $request['tracking_number2'],
                ]);
        }



        $inv_ref = invs::where('shop_id', $user_shops->id)->get();
        $basket_all =  invs::where('shop_id', $user_shops->id)->where('inv_ref', $request['inv_ref'])->get();
        // dd($basket_all);
        $inv_ref = invs::where('shop_id', $user_shops->id)->get();
        $shipping_details = shipping_details::where('shipde_id', $basket_all[0]->shipping_id)->select('shipde_price', 'shipty_id')->get();
        $shipping = shipping_type::where('shipty_id', $shipping_details[0]->shipty_id)->get();




        $product_product_id = [];
        $product_flash_id = [];
        $basket = [];
        $address = [];
        foreach ($basket_all as $bas) {
            // dd($bas->address);
            foreach ($bas->inv_products as $inv_product) {
                if ($basket) {
                    $status = true;
                    foreach ($basket as  $paymentkey => $value) {
                        if (($bas['product_id'] == $value['product_id']) &&
                            ($bas['dis1'] == $value['dis1']) &&
                            ($bas['dis2'] == $value['dis2'])
                        ) {
                            $basket[$paymentkey]['amount'] = intval($value['amount']) + intval($bas['amount']);
                            $status = false;
                        }
                    }
                    if ($status) {
                        array_push($basket, $inv_product);
                    }
                } else {
                    array_push($basket, $inv_product);
                }
            }
            //Loop for get Address like JSON
            foreach ($bas->address as $address_inv) {
                array_push($address, $address_inv);
            }
        }
        // dd($address);


        // Get email from buyer
        $emailUser = User::where('id', $basket_all[0]->user_id)->first();
        // $str = preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/', $emailUser->email);


        //Loop for Product_id for search in Product Table
        foreach ($basket_all as $value) {
            foreach ($value->inv_products as $value1) {
                if (isset($value1['type'])) {
                    if ($value1['type'] == 'flashsale') {
                        if (!in_array($value1['product_id'], $product_flash_id)) {
                            array_push($product_flash_id, $value1['product_id']);
                        }
                    }
                } else {
                    if (!in_array($value1['product_id'], $product_product_id)) {
                        array_push($product_product_id, $value1['product_id']);
                    }
                }
            }
        }
        $product = Product::whereIn('id', $product_product_id)->get();
        $product_flash = flash::whereIn('id', $product_flash_id)->get();
        // dd($request->all());

        // $track = invs::where('tracking_number', $request['tracking_number'])->first();
        $track = invs::where('inv_ref', $request['inv_ref'])->where('shop_id', $request['shop_id'])->where('status', 3)->first();
        // dd($track);

        return view('shop.sales-list-detail', compact('basket', 'basket_all', 'user_shops', 'inv_ref', 'shipping', 'shipping_details', 'product', 'product_flash', 'emailUser', 'address', 'track'));

        // return $track;
    }



    public function updateTrackingNumber(Request $request)
    {
        // dd($request->all());

        invs::where('inv_ref', $request['inv_ref'])->where('shop_id', $request['shop_id'])->where('status', 3)->update([
            'tracking_number' => $request['tracking_edit']
        ]);

        $new_track = invs::where('tracking_number', $request['tracking_edit'])->where('status', 3)->first();
        // dd($new_track->tracking_number);

        return $new_track;
    }

    public function seller_wallet(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        // $user_shops = withdrow::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // $user_shops = withdrow::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        $user_shop_bank = Shops::where('user_id', Auth::user()->id)->first();
        $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
            ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
            ->where('withdrows.shop_id', $user_shop_bank->id)
            ->where('withdrows.income_type', 'normal')
            ->orderBy('withdrows.status')->paginate(10);
        // echo '<pre>';
        // dd($withdraw);
        // echo '</pre>'; exit;
        if (count($withdraw) > 0) {
            $product_all_id = [];
            $product_flash_id = [];
            foreach ($withdraw as $wal_val) {
                $margin_total = 0;
                $invs = invs::where('id', $wal_val->inv_id)->first();
                if(isset($invs->uidmp) && $invs->uidmp != null && $invs->uidmp != ''){
                    $wal_val->uidmp = $invs->uidmp;
                }

                foreach ($invs->inv_products as $value) {
                    if (isset($value->type)) {
                        if ($value->type == 'flashsale') {
                            if (!in_array($value['product_id'], $product_flash_id)) {
                                array_push($product_flash_id, $value['product_id']);
                            }
                        }
                    } else {
                        if (!in_array($value['product_id'], $product_all_id)) {
                            array_push($product_all_id, $value['product_id']);
                        }
                    }

                    if(isset($invs->uidmp) && $invs->uidmp != null && $invs->uidmp != ''){
                        if (isset($value['margin']) || $value['margin'] != '' || $value['margin'] != null) {
                            $margin = intval($value['margin']);
                            $amount = intval($value['amount']);
                            // dd($margin);
                            $margin_total += ($margin * $amount);
                        } else {
                            $price = intval($value['price']);
                            $amount = intval($value['amount']);
                            // dd($margin);
                            $margin_total += ($price * $amount);
                        }
                    }
                }
                $wal_val->margin_total = $margin_total;
            }

            $product = Product::whereIn('id', $product_all_id)->get();
            $flash = flash::whereIn('id', $product_flash_id)->get();

            return view('shop.seller-wallet', compact('withdraw', 'user_shop_bank', 'product', 'flash', 'invs'));
        }

        return view('shop.seller-wallet', compact('withdraw', 'user_shop_bank'));
    }

    public function seller_recommend(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        // $user_shops = withdrow::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // $user_shops = withdrow::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        $user_shop_bank = Shops::where('user_id', Auth::user()->id)->first();
        $wallet = withdrow::where('shop_id', $user_shop_bank->id)->first();
        $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
            ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
            ->where('withdrows.shop_id', $user_shop_bank->id)
            ->where('withdrows.income_type', 'partner')
            ->orderBy('withdrows.status')->paginate(10);

        foreach ($withdraw as $value) {
            $shop_ref = Shops::where('id', $value->shop_id)->first();
            $value->shop_ref_name = $shop_ref->shop_name;
        }

        // dd($user_shop_bank);
        if (isset($wallet)) {
            $invs = invs::where('id', $wallet->inv_id)->get();
            $product_all_id = [];
            $product_flash_id = [];
            foreach ($invs as $item) {
                foreach ($item->inv_products as $value) {
                    if (isset($value->type)) {
                        if ($value->type == 'flashsale') {
                            if (!in_array($value['product_id'], $product_flash_id)) {
                                array_push($product_flash_id, $value['product_id']);
                            }
                        }
                    } else {
                        if (!in_array($value['product_id'], $product_all_id)) {
                            array_push($product_all_id, $value['product_id']);
                        }
                    }
                }
            }
            $product = Product::whereIn('id', $product_all_id)->get();
            $flash = flash::whereIn('id', $product_flash_id)->get();

            return view('shop.seller-recommend', compact('withdraw', 'user_shop_bank', 'product', 'flash', 'invs'));
        }

        return view('shop.seller-recommend', compact('withdraw', 'user_shop_bank'));
    }

    public function withdraw_wallet_search(Request $request)
    {
        // dd($request->all());
        $user_shop_bank = Shops::where('user_id', Auth::user()->id)->first();
        $wallet = withdrow::where('shop_id', $user_shop_bank->id)->first();

        if (isset($request->filter)) {
            if ($request->filter == 1) {
                $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                    ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                    ->where('withdrows.shop_id', $user_shop_bank->id)
                    ->where('type', 'MultiPay')
                    ->where('withdrows.created_at', 'LIKE', "%$request->date%")
                    ->orderBy('withdrows.status')->paginate(10);
            } else if ($request->filter == 2) {
                $date = substr($request->date, 0, 8);

                $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                    ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                    ->where('withdrows.shop_id', $user_shop_bank->id)
                    ->where('type', 'MultiPay')
                    ->where('withdrows.created_at', 'LIKE', "%$date%")
                    ->orderBy('withdrows.status')->paginate(10);
            } else if ($request->filter == 3) {
                $date = substr($request->date, 0, 5);

                $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                    ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                    ->where('withdrows.shop_id', $user_shop_bank->id)
                    ->where('type', 'MultiPay')
                    ->where('withdrows.created_at', 'LIKE', "%$date%")
                    ->orderBy('withdrows.status')->paginate(10);
            } else if ($request->filter == 4) {
                if (isset($request->date_start)) {
                    if (isset($request->date_end)) {
                        $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                            ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                            ->where('withdrows.shop_id', $user_shop_bank->id)
                            ->where('type', 'MultiPay')
                            ->where('withdrows.created_at', '>=', $request->date_start)
                            ->where('withdrows.created_at', '<=', $request->date_end . ' 23:59:59')
                            ->orderBy('withdrows.status')->paginate(10);
                    } else {
                        $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                            ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                            ->where('withdrows.shop_id', $user_shop_bank->id)
                            ->where('type', 'MultiPay')
                            ->where('withdrows.created_at', '>=', $request->date_start)
                            ->orderBy('withdrows.status')->paginate(10);
                    }
                } else {
                    $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                        ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                        ->where('withdrows.shop_id', $user_shop_bank->id)
                        ->where('type', 'MultiPay')
                        ->orderBy('withdrows.status')->paginate(10);
                }
            }
        } else {
            $withdraw = withdrow::leftJoin('invs', 'withdrows.inv_id', 'invs.id')
                ->select('*', 'withdrows.status', 'withdrows.id', 'withdrows.created_at')
                ->where('withdrows.shop_id', $user_shop_bank->id)
                ->where('type', 'MultiPay')
                ->orderBy('withdrows.status')->paginate(10);
        }

        if (isset($wallet)) {
            $invs = invs::where('id', $wallet->inv_id)->get();
            $product_all_id = [];
            $product_flash_id = [];
            foreach ($invs as $item) {
                foreach ($item->inv_products as $value) {
                    if (isset($value->type)) {
                        if ($value->type == 'flashsale') {
                            if (!in_array($value['product_id'], $product_flash_id)) {
                                array_push($product_flash_id, $value['product_id']);
                            }
                        }
                    } else {
                        if (!in_array($value['product_id'], $product_all_id)) {
                            array_push($product_all_id, $value['product_id']);
                        }
                    }
                }
            }
            $product = Product::whereIn('id', $product_all_id)->get();
            $flash = flash::whereIn('id', $product_flash_id)->get();

            return view('shop.seller-wallet', compact('withdraw', 'user_shop_bank', 'product', 'flash', 'invs'));
        }

        return view('shop.seller-wallet', compact('withdraw', 'user_shop_bank'));
    }

    public function getSalesStatistic(Request $request)
    {
        try {
            $year = isset($request->year) ? $request->year : null;
            $month = isset($request->month) ? $request->month : null;

            // $sales = invs::selectRaw('WEEK(created_at) AS Week, SUM(total + shipping_cost) AS Net')
            //     ->whereYear('created_at', $year)
            //     ->whereMonth('created_at', $month)
            //     ->groupBy('Week')
            //     ->get();

            $shops = Shops::where('user_id', Auth::user()->id)->pluck('id')->toArray();

            if (is_array($shops) && !count($shops)) {
                return response()->json(['data' => []]);
            }

            $weeks = [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0
            ];

            $sales = invs::selectRaw("CONCAT(MONTHNAME(created_at), ' week ', FLOOR(((DAY(created_at) - 1) / 7) + 1)) AS week, FLOOR(((DAY(created_at) - 1) / 7) + 1) AS weekNum,
                SUM(total + shipping_cost) AS net")
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->whereIn('shop_id', $shops)
                ->groupBy('week')
                ->orderBy("week")
                ->get();

            if (count($sales)) {
                foreach ($sales as $val) {
                    $weeks[intval($val->weekNum)] = floatval($val->net);
                }
            }

            return response()->json(['data' => $weeks]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['data' => []]);
        }
    }

    public function convertPriceToUSDC(Request $request)
    {
        // return response()->json(['data' => ['quote' => ['USDC' => ['price' => 1]]]]);
        try {
            $url = 'https://pro-api.coinmarketcap.com/v2/tools/price-conversion';
            $parameters = [
                'amount' => $request->price,
                'convert' => 'usdc',
                'symbol' => 'thb'
            ];

            $headers = [
                'Accepts: application/json',
                'X-CMC_PRO_API_KEY: ' . env('COIN_MARKET_CAP_API_KEY')
            ];
            $qs = http_build_query($parameters); // query string encode the parameters
            $request = "{$url}?{$qs}"; // create the request URL


            $curl = curl_init(); // Get cURL resource
            // Set cURL options
            curl_setopt_array($curl, array(
                CURLOPT_URL => $request,            // set the request URL
                CURLOPT_HTTPHEADER => $headers,     // set the headers
                CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
            ));

            $response = curl_exec($curl); // Send the request, save the response

            curl_close($curl); // Close request

            $response  = json_decode($response);

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['data' => ['quote' => ['USDC' => ['price' => 0]]]]);
        }
    }
}
