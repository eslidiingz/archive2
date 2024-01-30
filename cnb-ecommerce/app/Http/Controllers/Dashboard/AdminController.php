<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Address;
use DateTime;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Shops;
use App\Product;
use App\flash;
use App\Helpers;
use App\Kyc;
use App\invs;
use App\PreOrder;
use App\log;
use App\shipping;
use App\Category;
use App\SubCategory;
use App\shipping_details;
use App\BoxSize;
use App\withdrow;
use App\Setting;
use File;
use App\Http\Controllers\tools\PseudoCryptController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\HomeController as UserHC;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // count product
    public function coutInvs(Request $request)
    {
        $data = [];
        if (isset($request->dateStart) && $request->dateStart != "" && isset($request->dateEnd) && $request->dateEnd != "") {
            $from = date($request->dateStart);
            $to = date($request->dateEnd);
            $data['invs'] = invs::where('status', 2)->whereBetween('updated_at', [$from, $to])->groupBy('shop_id')->get();
            // dd($data['invs'] );
            $data['group'] = [];
            $data['group']['flashsale'] = [];
            $data['group']['product_s'] = [];
            foreach ($data['invs'] as $key => $value) {
                $data['invs'][$key]->order = invs::where('status', 2)->whereBetween('updated_at', [$from, $to])->where('shop_id', $value->shop_id)->get();
                foreach ($data['invs'][$key]->order as $order_key => $order_value) {
                    foreach ($order_value->inv_products as $inv_products_key => $inv_products_value) {
                        // dd($inv_products_value);
                        $id = $inv_products_value['product_id'];
                        $dis1 = $inv_products_value['dis1'];
                        $dis2 = $inv_products_value['dis2'];
                        // dd($id);
                        if (isset($inv_products_value['type']) && $inv_products_value['type'] == 'flashsale') {
                            if (isset($data['group']['flashsale'][$id]['data'][$dis1][$dis2])) {

                                $data['group']['flashsale'][$id]['data'][$dis1][$dis2]['amount'] +=  $inv_products_value['amount'];
                            } else {
                                $data['group']['flashsale'][$id]['data'][$dis1][$dis2] =  $inv_products_value;
                            }
                            $data['group']['flashsale'][$id]['product'] = flash::where('id', $id)->first();
                        } else {
                            if (isset($data['group']['product_s'][$id]['data'][$dis1][$dis2])) {

                                $data['group']['product_s'][$id]['data'][$dis1][$dis2]['amount'] +=  $inv_products_value['amount'];
                            } else {
                                $data['group']['product_s'][$id]['data'][$dis1][$dis2] =  $inv_products_value;
                            }
                            $data['group']['product_s'][$id]['product'] = Product::where('id', $id)->first();
                        }
                    }
                }
            }
            if (count($data['group']['flashsale']) > 0) {
                ksort($data['group']['flashsale']);
            }
            if (count($data['group']['product_s']) > 0) {
                ksort($data['group']['product_s']);
            }
        }
        // dd($data['group']);
        return view('countProduct', $data);
    }

    // flash //
    public function updatepromotionFixed(Request $request)
    {
        $data = [];
        if ($request->id) {
            $data['data'] = Product::where('id', $request->id)->first();
        }
        return view('mockup', $data);
    }
    public function updatepromotion(Request $request)
    {
        $time = new DateTime();
        $product = product::where('id', $request->id)->first();
        $product_old_id = $product->product_option;
        //   dd($product_old_id);
        foreach ($product_old_id['stock'] as $key => $value) {
            $product_old_id['stock'][$key] = $value - $request->amount[$key];
        }
        // echo "<pre>"; print_r($product_old_id['stock']); echo "</pre>";
        // echo "<pre>"; print_r($request->amount); echo "</pre>";
        // echo "<pre>"; print_r($product->product_option['stock']); echo "</pre>";

        // exit();

        $option = $product->product_option;
        // array_push($option, 'quantity' => $request->quantity);
        $option['amount'] = $request->amount;
        $option['discount'] = $product->product_option['price'];
        $option['stock'] = $request->amount;
        $option['price'] = $request->price;
        // dd($option);
        $time_period = "[" . implode(",", $request->time_period) . "]";
        // dd($time_period);
        // $time_period = json_encode($request->time_period);
        // dd($request->time_period);
        $flash = flash::insertGetId([
            'shop_id' => $product->shop_id,
            'name' => $product->name,
            'description' => $product->description,
            'category_id' => $product->category_id,
            'sub_category_id' => $product->sub_category_id,
            'brand_id' => null,
            'warranty_type' => null,
            'product_unit' => null,
            'product_weight' => $product->product_weight,
            'product_L' => $product->product_L,
            'product_W' => $product->product_W,
            'product_H' => $product->product_H,
            'product_option' => json_encode($option),
            'product_img' => json_encode($product->product_img),
            'created_at' => $time,
            'updated_at' => $time,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'product_old_id' => $request->id,
            'time_period' => $time_period,
            'product_pin' => 0,
            'type' => $request->type,
            'status' => 'enabled',
            'product_limit' => $request->limit,
        ]);

        if ($flash) {
            product::where('id', $request->id)->update([
                "product_option" => $product_old_id,
            ]);
            return "true";
        }

        return "false";
        // dd($product);
    }

    public function updatediscount(Request $request)
    {
        $product =  Product::find($request->id);
        $arrNew = $product->product_option;
        foreach ($request->discount2 as $key => $val) {
            $arrNew['stn'][$key] = $val;
        }

        Product::where('id', $request->id)->update([
            'product_option' => $arrNew,
        ]);


        return "true";
    }

    public function editpromotion(Request $request)
    {

        $date = date('Y-m-d');
        $flash = flash::where('end_date', '<', $date)->get();
        // dd($flash);
        foreach ($flash as $product) {
            // dd($product->product_option);
            $product_join = product::where('id', $product->product_old_id)->first();
            $option = $product_join->product_option;
            $flash_option = $product->product_option;
            foreach ($option['stock'] as $key => $value) {
                $option['stock'][$key] = $value + $flash_option['stock'][$key];
            }
            $temp = $product_join->product_option;
            $temp['stock'] =  $option['stock'];
            $product_join->product_option = $temp;
            $update = $product_join->save();
            //    dd($update);

            if ($product) {
                flash::where('id', $product->id)->update([
                    "status" => 'unenabled',
                ]);
                return "true";
            }
            return "false";
        }
    }



    public function deletedpromotion(Request $request)
    {

        $flash = flash::whereIn('id', $request->id)->get();
        // dd($flash);
        foreach ($flash as $product) {
            // dd($product->product_option);
            $product_join = product::where('id', $product->product_old_id)->first();
            $option = $product_join->product_option;
            $flash_option = $product->product_option;
            foreach ($option['stock'] as $key => $value) {
                $option['stock'][$key] = $value + $flash_option['stock'][$key];
            }
            $temp = $product_join->product_option;
            $temp['stock'] =  $option['stock'];
            $product_join->product_option = $temp;
            $update = $product_join->save();
            //    dd($update);

            if ($product) {
                $flash_del = flash::whereIn('id', $request->id)->delete();
                // dd($flash_del);
                return "true";
            }
            return "false";
        }
    }

    public function pinproduct(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            $flash[] = flash::where('id', $request->id[$i])->update([
                "product_pin" => '1',
            ]);
        }
        return 'true';
    }

    public function dispinproduct(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            $flash[] = flash::where('id', $request->id[$i])->update([
                "product_pin" => '0',
            ]);
        }
        return 'true';
    }

    public function productList(Request $request)
    {
        // dd($request);
        if (isset($request->search)) {
            $product =  product::select('product_s.*', 'shops.shop_name')->selectRaw("JSON_EXTRACT(product_option, '$.stock') as stock")->leftJoin('shops', 'shops.id', 'product_s.shop_id')->orderBy('product_s.created_at', 'asc');
            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    // dd($val);
                    $product = $product->where('start_date', '>=', $val);
                } elseif ($key == 'date_end' and $val != '') {
                    $product = $product->where('end_date', '<=', $val);
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '2') {
                    } else {
                        $product = $product->where('product_pin', $val);
                    }
                } elseif ($key == 'p_name' and $val != '') {
                    $product = $product->where('name', 'like', '%' . $val . '%');
                } elseif ($key == 'remain_start' and $val != '') {
                    $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.stock')"), '>=', $val);
                } elseif ($key == 'remain_end' and $val != '') {
                    $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.stock')"), '<=', $val);
                } elseif ($key == 'price_start' and $val != '') {
                    $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.price')"), '>=', $val);
                } elseif ($key == 'price_end' and $val != '') {
                    $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.price')"), '<=', $val);
                } elseif ($key == 's_name' and $val != '') {
                    $product = $product->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'chkIsPromoSearch' and $val == 'Y') {
                    $product = $product->where('is_promo', '=', '' . $val . '');
                }
            }
            
            // dd($product);
            // $product = $product->toSql();
        } else {
            $product =  product::select('product_s.*', 'shops.shop_name')->leftJoin('shops', 'shops.id', 'product_s.shop_id')->orderBy('product_s.created_at', 'asc');
        }
        if( $request['shop_id'] != '' ) {
            $product = $product->where('shop_id', $request['shop_id']);

            $user_shop = Shops::where('id', $request['shop_id'])->first();
            $_REQUEST['s_name'] = $user_shop->shop_name;
        }
        $product = $product->paginate(50);
        // dd($product);
        // $flash_s = flash::where('status', 'enabled')->orderBy('product_pin', 'desc')->get();
        // dd($flash_s);
        // dd($product);
        return view('dashboard.product_list', compact('product'));
    }
    public function newProduct(Request $request) {
        $user_shops = shops::Where('id', $request->shop_id)->first();
        // $other = Category::with('subcategorys')->where('category_name', '=', 'อาหาร')->orderBy('category_name', 'ASC')->get();
        $catogorys = Category::with('subcategorys')->where('category_name', '!=', 'อาหาร')->orderBy('category_name', 'ASC')->get();
        // $catogorys = $category1->push($other[0]);
        // $catogorys = Category::with('subcategorys')->get();

        $shipping_detail = [];
        $shipping_type = DB::table('shipping_type')
            ->whereRaw("find_in_set( shipping_type.shipty_id, (select ship_default from shippings where shippings.shop_id = ".$user_shops->id.") )")
            ->whereRaw("(case when ( shipping_type.shipty_id=4 OR shipping_type.shipty_id=5 OR shipping_type.shipty_id=6 ) then exists(select shipde_id from shipping_details where shipping_details.shop_id = ".$user_shops->id." AND shipde_price >0 AND shipping_details.shipty_id = shipping_type.shipty_id) else true end)")
            ->get();
        $shipping = shipping::where('shop_id', $user_shops->id)->first();
        if(isset($shipping->ship_name) && $shipping->ship_name != null && $shipping->ship_name != ''){
            $ship_name = json_decode($shipping->ship_name);
        }
        foreach($shipping_type as $key => $val){
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
            if($val->shipty_id >= 4 && $val->shipty_id <= 6){
                $shipping_type[$key]->ship_name = 'ผู้ขายจัดส่งเอง';
                if(isset($ship_name) && $ship_name[$val->shipty_id-4] != ''){
                    $shipping_type[$key]->ship_name = $ship_name[$val->shipty_id-4];
                }
            } else {
                $shipping_type[$key]->ship_name = $val->shipty_name;
            }
        }

        $a_box_size = BoxSize::where('is_active', 'Y')->orderBy('size_name','ASC')->get();

// dd($shipping_type);
        return view('dashboard.newProduct', compact('catogorys', 'user_shops', 'shipping_type', 'shipping_detail', 'a_box_size'));
    }
    public function check_shop($i_shop_id) {
        $user_shops = shops::Where('id', $i_shop_id)->first();

        if (!isset($user_shops)) {
            return redirect('/dashboard/manageUser/productList');
        }
    }
    public function addproduct(Request $data) {
        // dd($data->all());
        // dd($data->img_upload);
        $sum_stock = 0;
        $price_chk = false;
        $this->check_shop($data->shop_id);
        $user_shops = shops::Where('id', $data->shop_id)->first();

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

        $product->disc_nft = $data->txtNFTDiscount;

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

        return redirect('/dashboard/manageUser/productList?shop_id='.$data->shop_id);
    }

    public function addproduct_imgupload(Request $request) {
        //dd($request);
        $user_shops = shops::Where('id', $request->shop_id)->first();
        $file = request()->file('file');
        // $filename = str_replace(" ", "", microtime()) . $file->getClientOriginalName();
        $filename = str_replace(" ", "", microtime()) . "_" . $user_shops->id . "." . $file->getClientOriginalExtension();
        $path     = $request->file('file')->move(public_path('img/product/'), $filename);
        $photoURL = url('img/product/' . $filename);
        return response()->json(['uploaded' => $filename]);
    }


    public function addproduct_imgupload_delete(Request $request, $img)
    {
        if ($request->key != 'no_image.png') {
            $image_path = "img/product/" . $request->key;  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        return response()->json(['uploaded' => $request->all()]);
    }
    public function editproduct($id) {
        $product =  Product::findorfail($id);
        $user_shops = Shops::where('id', $product->shop_id)->first();

        // ------------------------------
        $catogorys = Category::with('subcategorys')->get();

        $shipping_detail = [];
        $shipping_type = DB::table('shipping_type')
            ->whereRaw("find_in_set( shipping_type.shipty_id, (select ship_default from shippings where shippings.shop_id = ".$user_shops->id.") )")
            ->whereRaw("(case when ( shipping_type.shipty_id=4 OR shipping_type.shipty_id=5 OR shipping_type.shipty_id=6 ) then exists(select shipde_id from shipping_details where shipping_details.shop_id = ".$user_shops->id." AND shipde_price >0 AND shipping_details.shipty_id = shipping_type.shipty_id) else true end)")
            ->get();

        $shipping = shipping::where('shop_id', $user_shops->id)->first();
        if(isset($shipping) && $shipping->ship_name != null && $shipping->ship_name != ''){
            $ship_name = json_decode($shipping->ship_name);
        }

        foreach($shipping_type as $key => $val){
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

        $a_box_size = BoxSize::where('is_active', 'Y')->orderBy('size_name','ASC')->get();

        // $product_catogorys = DB::table('category')->where("category_id", "=", $product->category_id)->get()->toArray();
        // $product_sub = DB::table('sub_category')->where("sub_category_id", "=", $product->sub_category_id)->get()->toArray();
        $category = Category::where("category_id", "=", $product->category_id)->get();
        $sub_category = SubCategory::where("sub_category_id", "=", $product->sub_category_id)->get();

        // dd($category[0]->category_name);
        return view('dashboard.editProduct',  compact('product', 'user_shops', 'catogorys', 'category', 'sub_category', 'shipping_type', 'shipping_detail', 'a_box_size'));
    }
    public function updateproduct(Request $data, $id) {
        $sum_stock = 0;
        $price_chk = false;
        $product =  Product::find($id);
        
        $category = SubCategory::find($data->category);
        
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

        $product->disc_nft = $data->txtNFTDiscount;

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

        return redirect('/dashboard/manageUser/productList?shop_id='.$data->shop_id);
    }

    public function deleteproduct(Request $data, $id) {
        $product = Product::where('id', $id)->first();
        $user_shops = Shops::where('id', $product->shop_id)->first();

        Product::where('id', $id)->update(['status_goods' => 3]);

        

        $o_inv = invs::where('shop_id', $user_shops->id)->where('status','=',0)->get();
        foreach ($o_inv as $k_inv => $v_inv) {
            $i_total = 0;
            $a_new_inv_product = array();
            foreach ($v_inv->inv_products as $k_product => $v_product) {
                if( $v_product['product_id'] == $id ) {
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

        return redirect()->back();
    }
    public function shopDetail($i_shop_id) {
        $user_shops = Shops::where('id', $i_shop_id)->first();
        // dd($this->user_shop());
        // $user_shops = shops::Where('user_id',Auth::user()->id)->first();
        // $this->check_shop();

        // return $category_all;
        // $category_all=(object)$category_all;
        return view('dashboard.editShop',  compact('user_shops'));
    }
    public function updateShopInfo(Request $data) {
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

        $shops = shops::Where('id', $data->shop_id)->first();
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

        // dd($user);
        $shops->save();

        return redirect('/dashboard/manageUser');
    }
    public function shopAddress($i_shop_id) {
        $user_shops = shops::Where('id', $i_shop_id)->first();

        $address = Address::where('user_id', $user_shops->user_id)
            ->orderBy('addresses.updated_at', 'DESC')->get();
        // dd($address);
        return view('dashboard.shopAddress')->with(["address" => $address, 'user_shops' => $user_shops]);
    }
    public function addShopAddress(Request $request) {
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
        $address = Address::Where('user_id', $request['user_id'])->get();
        // dd($address);
        $address = Address::create([
            'user_id' => $request['user_id'],
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
                Address::where('id', '!=', $address->id)->where('user_id', $request['user_id'])->update([
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
    public function setShopAddress(Request $request) {
        Address::where('id', $request['id'])->update([
            'status_address' => '2',
            'updated_at' => new DateTime(),
        ]);
        Address::where('id', '!=', $request['id'])->update([
            'status_address' => '0',
            'updated_at' => new DateTime(),
        ]);

        return redirect()->back();
    }

    public function setBackShopAddress(Request $request) {
        Address::where('id', $request['id'])->update([
            'status_address' => '0',
            'updated_at' => new DateTime(),
        ]);

        // Address::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();

        return redirect()->back();
    }

    public function deleteShopAddress(Request $request) {
        // dd($request);

        Address::where('id', $request['id'])->delete();
        return redirect()->back();
    }

    public function myproductban(Request $request)
    {
        $product = product::where('id', $request->id)->first();
        if ($product->status_goods == '99') {
            product::where('id', $request->id)->update([
                'status_goods' => '1',
                'note' => '',
                'updated_at' => new DateTime(),
            ]);
        } else {
            if ($request->note == '') {
                return "false";
            }
            product::where('id', $request->id)->update([
                'status_goods' => '99',
                'note' => $request->note,
                'updated_at' => new DateTime(),
            ]);
        }
        return "true";
    }

    public function set_promo_item(Request $request)
    {
        $product = product::where('id', $request->set_promo_product_id)->first();
        if ($product->is_promo == '' || $product->is_promo == 'N') {
            product::where('id', $request->set_promo_product_id)->update([
                'is_promo' => 'Y',
                'updated_at' => new DateTime(),
            ]);
        } else {
            product::where('id', $request->set_promo_product_id)->update([
                'is_promo' => 'N',
                'updated_at' => new DateTime(),
            ]);
        }
        return "true";
    }
    public function unset_promo_item(Request $request)
    {
        $product = product::where('id', $request->unset_promo_product_id)->first();
        if ($product->is_promo == 'Y') {
            product::where('id', $request->unset_promo_product_id)->update([
                'is_promo' => 'N',
                'updated_at' => new DateTime(),
            ]);
        } else {
            product::where('id', $request->unset_promo_product_id)->update([
                'is_promo' => 'Y',
                'updated_at' => new DateTime(),
            ]);
        }
        return "true";
    }

    // flash //

    public function product_ninebaht(Request $request)
    {

        // $product =  product::select('product_s.*', 'shops.shop_name')->leftJoin('shops', 'shops.id', 'product_s.shop_id')->orderBy('product_s.created_at', 'asc')->get();
        // dd($product);
        if (isset($request->search)) {
            $flash_s = flash::where('status', 'enabled')->orderBy('product_pin', 'desc');
            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    // dd($val);
                    $flash_s = $flash_s->where('start_date', '>=', $val);
                } elseif ($key == 'date_end' and $val != '') {
                    $flash_s = $flash_s->where('end_date', '<=', $val);
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '2') {
                    } else {
                        $flash_s = $flash_s->where('product_pin', $val);
                    }
                } elseif ($key == 'p_name' and $val != '') {
                    $flash_s = $flash_s->where('name', 'like', '%' . $val . '%');
                } elseif ($key == 'remain' and $val != '') {
                    $product = $flash_s->where(DB::raw("JSON_EXTRACT(product_option, '$.stock')"), 'like', '%' . $val . '%');
                } elseif ($key == 'amoung' and $val != '') {
                    $product = $flash_s->where(DB::raw("JSON_EXTRACT(product_option, '$.amount')"), 'like', '%' . $val . '%');
                } elseif ($key == 'price' and $val != '') {
                    $product = $flash_s->where(DB::raw("JSON_EXTRACT(product_option, '$.price')"), 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $flash_s = $flash_s->where('users.name', 'like', '%' . $val . '%');
                }
            }
            $flash_s = $flash_s->paginate(50);
        } else {
            $flash_s = flash::where('status', 'enabled')->orderBy('product_pin', 'desc')->paginate(50);
        }
        // dd($flash_s);
        return view('dashboard.nine_baht', compact('flash_s'));
    }



    public function getDataUser(Request $request)
    {
        if (isset($request->search)) {
            $user = User::with('Kyc')->orderBy('created_at', 'desc');
            foreach ($_GET as $key => $val) {
                if ($key == 'chkISShop' and $val != '') {
                    $user = $user->whereRaw('exists(select id from shops where shops.user_id=users.id)');
                } elseif ($key == 'date_start' and $val != '') {
                    $user = $user->where('created_at', '>=', $val. ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $user = $user->where('created_at', '<=', $val. ' 23:59:59');
                } elseif ($key == 'kyc_select' and $val != '') {
                    if ($val == 'wait') {
                        $user = $user->whereNull('shops.kyc_status');
                    } elseif ($val == 'approve' || $val == 'unapprove') {
                        $user = $user->where('shops.kyc_status', $val);
                    }
                } elseif ($key == 'sex' and $val != '') {
                    if ($val == '0') {
                    } else {
                        $user = $user->where('sex', $val);
                    }
                } elseif ($key == 'email' and $val != '') {
                    $user = $user->where('email', 'like', '%' . $val . '%');
                } elseif ($key == 'phone' and $val != '') {
                    $user = $user->where('phone', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    // dd($val);
                    $user = $user->where(DB::raw("CONCAT(name , ' ' , surname)"), 'like', '%' . $val . '%');
                    // $user = $user->select(DB::raw("CONCAT('name' , ' ' , 'surname') as con"));
                    // $user = $user->where('name', 'like', '%' . $val . '%');
                }
            }

            $user = $user->paginate(50);
            // dd($user[2]->kyc[0]->image_second);
        } else {
            $user = User::with('kyc')->orderBy('created_at', 'desc')->paginate(50);
        }

        foreach($user as $val_user){
            $user_shop = Shops::where('user_id', $val_user->id)->first();
            if($user_shop != null){
                $val_user->shop_name = $user_shop->shop_name;
                $val_user->shop_pic = $user_shop->shop_pic;
                $val_user->shop_id = $user_shop->id;
                $val_user->shop_sts = $user_shop->shop_sts;
            }

            if($val_user->sex == 'male'){
                $val_user->sex = 'ชาย';
            }else if($val_user->sex == 'female'){
                $val_user->sex = 'หญิง';
            }
            $s_origin_addr = ''; $s_shop_addr = [];
            $o_user_addr = Address::where('user_id', $val_user->id)->get();
            if( $o_user_addr ) {
                foreach ($o_user_addr as $key => $val) {
                    if($val->status_address == '2') {
                        $s_origin_addr = $val->address1.' '.$val->address2.' '.$val->county.' '.$val->district.' '.$val->city.' '.$val->zipcode.' '.$val->country;
                    } else {
                        $s_shop_addr[] = $val->address1.' '.$val->address2.' '.$val->county.' '.$val->district.' '.$val->city.' '.$val->zipcode.' '.$val->country;
                    }
                }
            }
            $val_user->origin_addr = $s_origin_addr;
            $val_user->shop_addr = $s_shop_addr;
        }
        // $approve = User::whereIn('kyc_status', [2, 3])->where('kyc_pic', '!=', 'user.svg')->orderBy('updated_at', 'desc')->get();
        //Admin Only\\
        // $admin = User::where('type', '0')->where('kyc_status', '1')->orderBy('updated_at', 'desc')->get();
        // dd($admin);
        // $Isadmin = User::where('type', '1')->orderBy('updated_at', 'desc')->get();
        // dd($Isadmin);
        //Admin Only\\
        // $ban = User::where('type', '=', '99')->orderBy('updated_at', 'desc')->get();
        // dd($ban);
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>'; exit;
        $data = ['user'];

        return view('dashboard.approve', compact($data));
    }
    public function newShop(Request $data) {
        $chk_shopname = Shops::where('shop_name', $data->shop_name)->get();
        if (count($chk_shopname) > 0) {
            return redirect()->back()->with('error', 'ชื่อร้านค้านี้ถูกใช้ไปแล้ว');
        }
        // PROFILE IMAGE WRITER
        if (isset($data['shop_pic'])) {
            if ($data['shop_pic'] != "default_shop.svg") {
                @unlink(public_path('/img/shop_profiles/default_shop.svg'));
            }
            // $image = $data['shop_pic'];
            $image = $data->file('shop_pic');
            $extension = $data['shop_pic']->getClientOriginalExtension();
            $shop_profile_name = 'shop_profile_' . time() . '.' . $extension;
            $image->move('img/shop_profiles/', $shop_profile_name);
            // Image::make($image)->save($location);
        } else {
            $shop_profile_name = $data['shop_pic'];
        }

        // dd($data);

        $data['shop_pic'] = $shop_profile_name;

        Shops::Create([
            'user_id' => $data['user_id'],
            'shop_name' => $data['shop_name'],
            'shop_pic' => $shop_profile_name,
            'description' => $data['description'],
            'shop_sts' => 'open',
            'kyc_status' => 'approve',
        ]);
        $shop = Shops::where('user_id', $data['user_id'])->first();

        User::where('id', $data['user_id'])->update([
            'ref_code' => PseudoCryptController::hash($data['user_id'], 8)
        ]);
        // dd($shop);
        shipping::Create([
            'shop_id' => $shop->id,
            'ship_default' => '2,3,7,8,9',
            'ship_price' => 0.00,
            'shipde_id' => 0,
            'shipty_id' => 0
        ]);

        Kyc::Create([
            'type_kyc' => '3',
            'status_first' => '2',
            'status_second' => '2',
            'status_third' => '2',
            'status_fourth' => '2',
            'status_fifth' => '2',
            'user_id' => $data['user_id'],
            'shop_id' => $shop->id
        ]);

        return redirect('/dashboard/manageUser');
    }
    public function setShopSts(Request $request) {
        Shops::where('id', $request['shop_id'])->update([
            'shop_sts' => $request['shop_sts']
        ]);
        return response()->json('success', 200);
    }

    public function btn_approve(Request $request)
    {
        // Approve Status 0 = Not Approve , 1 = Approved \\
        // ['0' => 'กรุณาใส่รูปภาพ', '1' => 'ตรวจสอบผ่านแล้ว', '2' => 'ทำการแก้ไขรูปภาพ', '3' => 'รอการตรวจสอบ'];
        // $kyc = new Kyc();
        // $kyc->status_second = 1;
        // $kyc->save();

        Kyc::where('user_id', $request['id'])->update([
            'status_second' => '1',
            'updated_at' => new DateTime(),
        ]);

        Shops::where('user_id', $request['id'])->update([
            'kyc_status' => 'approve',
            'updated_at' => new DateTime(),
        ]);

        User::where('id', $request['id'])->update([
            'kyc_status' => '1',
            'updated_at' => new DateTime(),
        ]);

        return redirect()->back();
    }
    // public function deletepic(Request $request)
    // {
    //     User::where('id', $request['id'])->update([
    //         // 'kyc_pic' => "kyc.png",
    //         'kyc_status' => "2",
    //         'kyc_remark' => $request['txtRemark']
    //     ]);
    //     return redirect()->back();
    // }

    public function deletepic(Request $request)
    {
        Kyc::where('user_id', $request['id'])->update([
            'status_second' => '3',
            'updated_at' => new DateTime(),
        ]);

        Shops::where('user_id', $request['id'])->update([
            'kyc_status' => null,
            'updated_at' => new DateTime(),
        ]);

        User::where('id', $request['id'])->update([
            'kyc_status' => "2",
            'kyc_remark' => $request['remark']
        ]);
        return redirect()->back();
    }

    public function BeAdmin(Request $request)
    {
        // Be Admin Status 0 = Not user , 1 = admin \\
        // dd($request);
        User::whereIn('id', $request['id'])->update([
            'type' => '1',
            'updated_at' => new DateTime(),
        ]);



        return redirect()->back();
    }
    public function retireAdmin(Request $request)
    {
        // dd($request);
        User::where('id', $request['id'])->update([
            'type' => '0',
            'updated_at' => new DateTime(),
        ]);
        return back();
    }






    public function BanUser(Request $request)
    {

        // Ban Status 0 = Not ban , Ban = 99 \\
        // dd($request);
        User::where('id', $request['id'])->update([
            'type' => '99',
            'updated_at' => new DateTime(),
        ]);

        return redirect()->back();
    }
    public function Unban(Request $request)
    {
        User::where('id', $request['id'])->update([
            'type' => '0',
            'updated_at' => new DateTime(),
        ]);
        return redirect()->back();
    }

    public function influencer()
    {
        ini_set('max_execution_time', 300);
        $shop = shops::select('shops.*', 'users.name', 'users.surname', 'users.phone', 'users.email')->leftJoin('users', 'shops.user_id', '=', 'users.id')->orderBy('shops.created_at', 'desc')->paginate(50);
        // dd($shop);
        return view('dashboard.influencer', compact('shop'));
    }
    public function search_data(Request $request)
    {
        ini_set('max_execution_time', 300);
        // dd($request);
        $shop = shops::select('shops.*', 'users.name', 'users.surname', 'users.phone', 'users.email')->leftJoin('users', 'shops.user_id', '=', 'users.id')->orderBy('created_at', 'desc');
        foreach ($_GET as $key => $val) {
            if ($key == 'start_date' and $val != '') {
                $shop = $shop->where('shops.created_at', '>=', $val . ' 00:00:00');
            } elseif ($key == 'end_date' and $val != '') {
                $shop = $shop->where('shops.created_at', '<=', $val . ' 23:59:59');
            } elseif ($key == 'Influencer' and $val != '') {
                $shop = $shop->where('Influencer', 'like', '%' . $val . '%');
            } elseif ($key == 'shop_name' and $val != '') {
                $shop = $shop->where('shop_name', 'like', '%' . $val . '%');
            } elseif ($key == 'shop_select' and $val != '' and $val != '0') {
                $shop = $shop->where('approve_shop', 'like', '%' . $val . '%');
            }
            // dd($_GET);
        }
        $shop = $shop->paginate(50)->appends(request()->query());
        // dd($shop);

        return view('dashboard.influencer', compact('shop'));
    }
    public function dont_Pesernal()
    {
        ini_set('max_execution_time', 300);
        $shop = shops::where('Influencer', null)->orderBy('created_at', 'desc')->paginate(50);
        // dd($not);
        return view('dashboard.influencer', compact('shop'));
    }

    public function updateInfluncer(Request $request)
    {
        // dd($request);
        ini_set('max_execution_time', 300);

        if (!isset($request['approve_shop'])) {
            return redirect()->back()->with('alert', 'กรุณาเลือกรายการที่จะทำการตรวจสอบ');
        }
        foreach ($request['approve_shop'] as $id) {
            shops::where('id', $id)->update([
                'approve_shop' => 1
            ]);
        }
        return redirect()->back();
    }

    public function killInfluncer(Request $request)
    {
        // dd($request);
        ini_set('max_execution_time', 300);
        if (!isset($request['approve_shop'])) {
            return redirect()->back()->with('alert', 'กรุณาเลือกรายการที่จะทำการตรวจสอบ');
        }

        foreach ($request['approve_shop'] as $id) {
            $shop_inv = invs::where('shop_id', $request->approve_shop)->get();
            if (count($shop_inv) > 0) {
                return redirect()->back()->with('alert', 'ไม่สามารถลบรายการที่มีการสั่งซื้อได้');
            }

            $shops_product = Product::where('shop_id', $id)->get();
            if (count($shops_product) > 0) {
                foreach ($shops_product as $val) {
                    Product::where('id', $val->id)->delete();
                }
            }

            $shops_flsh_product = flash::where('shop_id', $id)->get();
            if (count($shops_flsh_product) > 0) {
                foreach ($shops_flsh_product as $val) {
                    flash::where('id', $val->id)->delete();
                }
            }

            $shops_pre_product = PreOrder::where('shop_id', $id)->get();
            if (count($shops_pre_product) > 0) {
                foreach ($shops_pre_product as $val) {
                    PreOrder::where('id', $val->id)->delete();
                }
            }

            shops::where('id', $id)->delete();

            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $id,
                'type' => 'admin_delete_shop',
                'note' => 'ลบร้านค้า',
                'status' => '99',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->back();
    }

    public function banInfluncer(Request $request)
    {
        // dd($request);
        ini_set('max_execution_time', 300);
        if (!isset($request['approve_shop'])) {
            return redirect()->back()->with('alert', 'กรุณาเลือกรายการที่จะทำการตรวจสอบ');
        }
        foreach ($request['approve_shop'] as $id) {
            $shops_product = Product::where('shop_id', $id)->get();
            if (count($shops_product) > 0) {
                foreach ($shops_product as $val) {
                    Product::where('id', $val->id)->update([
                        'status_goods' => '99'
                    ]);
                }
            }

            $shops_flsh_product = flash::where('shop_id', $id)->get();
            if (count($shops_flsh_product) > 0) {
                foreach ($shops_flsh_product as $val) {
                    flash::where('id', $val->id)->update([
                        'status' => 'unenabled'
                    ]);
                }
            }

            $shops_pre_product = PreOrder::where('shop_id', $id)->get();
            if (count($shops_pre_product) > 0) {
                foreach ($shops_pre_product as $val) {
                    PreOrder::where('id', $val->id)->update([
                        'status_goods' => '99'
                    ]);
                }
            }

            shops::where('id', $id)->update([
                'approve_shop' => 'decline'
            ]);

            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $id,
                'type' => 'admin_ban_shop',
                'note' => 'Ban ร้านค้า',
                'status' => '99',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->back();
    }

    public function approveInfluncer(Request $request)
    {
        // dd($request->btn_choice);
        // dd($request);
        ini_set('max_execution_time', 300);
        if (!isset($request['approve_shop'])) {
            return redirect()->back()->with('alert', 'กรุณาเลือกรายการที่จะทำการตรวจสอบ');
        }
        if ($request->btn_choice == 'approve') {
            foreach ($request['approve_shop'] as $id) {

                $shops_product = Product::where('shop_id', $id)->get();
                if (count($shops_product) > 0) {
                    foreach ($shops_product as $val) {
                        Product::where('id', $val->id)->update([
                            'status_goods' => '1'
                        ]);
                    }
                }

                $shops_flsh_product = flash::where('shop_id', $id)->get();
                if (count($shops_flsh_product) > 0) {
                    foreach ($shops_flsh_product as $val) {
                        flash::where('id', $val->id)->update([
                            'status' => 'enabled'
                        ]);
                    }
                }

                $shops_pre_product = PreOrder::where('shop_id', $id)->get();
                if (count($shops_pre_product) > 0) {
                    foreach ($shops_pre_product as $val) {
                        PreOrder::where('id', $val->id)->update([
                            'status_goods' => '1'
                        ]);
                    }
                }
                // dd($id);
                shops::where('id', $id)->update([
                    'approve_shop' => $request->btn_choice
                ]);

                $lnwza = shops::where('id', $id)->get();
                // dd($lnwza);

                log::insert([
                    'user_id' => Auth::guard('admin')->user()->id,
                    'parent_id' => $id,
                    'type' => 'admin_ban_shop',
                    'note' => $request->btn_choice . ' ร้านค้า',
                    'status' => '1',
                    'ip' => UserHC::getUserIP(),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        } else {
            foreach ($request['approve_shop'] as $id) {
                $shops_product = Product::where('shop_id', $id)->get();
                if (count($shops_product) > 0) {
                    foreach ($shops_product as $val) {
                        Product::where('id', $val->id)->update([
                            'status_goods' => '99'
                        ]);
                    }
                }

                $shops_flsh_product = flash::where('shop_id', $id)->get();
                if (count($shops_flsh_product) > 0) {
                    foreach ($shops_flsh_product as $val) {
                        flash::where('id', $val->id)->update([
                            'status' => 'unenabled'
                        ]);
                    }
                }

                $shops_pre_product = PreOrder::where('shop_id', $id)->get();
                if (count($shops_pre_product) > 0) {
                    foreach ($shops_pre_product as $val) {
                        PreOrder::where('id', $val->id)->update([
                            'status_goods' => '99'
                        ]);
                    }
                }
                shops::where('id', $id)->update([
                    'approve_shop' => $request->btn_choice
                ]);

                log::insert([
                    'user_id' => Auth::guard('admin')->user()->id,
                    'parent_id' => $id,
                    'type' => 'admin_ban_shop',
                    'note' => $request->btn_choice . ' ร้านค้า',
                    'status' => '1',
                    'ip' => UserHC::getUserIP(),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
        return redirect()->back();
    }

    public function delbanInfluncer(Request $request)
    {
        // dd($request);
        ini_set('max_execution_time', 300);
        if (!isset($request['approve_shop'])) {
            return redirect()->back()->with('alert', 'กรุณาเลือกรายการที่จะทำการตรวจสอบ');
        }
        foreach ($request['approve_shop'] as $id) {
            $shops_product = Product::where('shop_id', $id)->get();
            if (count($shops_product) > 0) {
                foreach ($shops_product as $val) {
                    Product::where('id', $val->id)->update([
                        'status_goods' => '1'
                    ]);
                }
            }

            $shops_flsh_product = flash::where('shop_id', $id)->get();
            if (count($shops_flsh_product) > 0) {
                foreach ($shops_flsh_product as $val) {
                    flash::where('id', $val->id)->update([
                        'status' => 'enabled'
                    ]);
                }
            }

            $shops_pre_product = PreOrder::where('shop_id', $id)->get();
            if (count($shops_pre_product) > 0) {
                foreach ($shops_pre_product as $val) {
                    PreOrder::where('id', $val->id)->update([
                        'status_goods' => '1'
                    ]);
                }
            }

            shops::where('id', $id)->update([
                'approve_shop' => 'waiting'
            ]);

            log::insert([
                'user_id' => Auth::guard('admin')->user()->id,
                'parent_id' => $id,
                'type' => 'admin_waiting_shop',
                'note' => 'ปลด Ban ร้านค้า',
                'status' => '1',
                'ip' => UserHC::getUserIP(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->back();
    }

    public function shop_delete(Request $request)
    {
        return view('dashboard.kill_shop');
    }
    public function shop_delete_phone(Request $request)
    {
        // $shop = shops::orderBy('created_at', 'desc')->paginate(1000);
        $allphone = trim($request->phone);
        $arr_p = (explode("\r\n", $allphone));
        $arr2_p = implode(",", $arr_p);
        // $shop = Shops::leftJoin('users', 'shops.user_id', '=', 'users.id')->whereIn('users.phone', [$arr2_p])->get();
        $shop = Shops::select('shops.*')->leftJoin('users', 'shops.user_id', '=', 'users.id');
        foreach ($arr_p as $val) {
            $shop = $shop->orWhere('users.phone', $val);
        }
        $shop = $shop->paginate(1000);
        // dd($shop);
        return view('dashboard.influencer', compact('shop'));
    }
    public function getSalesStat(Request $request) {
        try {
            $year = isset($request->year) ? $request->year : null;
            $month = isset($request->month) ? $request->month : null;
            $shop = isset($request->shop) ? $request->shop : null;

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
                
                ->groupBy('week')
                ->orderBy("week");
            if( $shop != '' ) {
                $sales = $sales->where('shop_id', $shop);
            }
            $sales = $sales->get();

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

    public function getWithdrawStat(Request $request) {
        try {
            $prev_year = $year = isset($request->year) ? $request->year : null;
            $prev_month = $month = isset($request->month) ? $request->month : null;
            $shop = isset($request->shop) ? $request->shop : null;

            $response = [
                1 => 0,
                2 => 0
            ];

            if( $month == 1 ) {
                $prev_year -= 1;
                $prev_month = 12;
            } else {
                $prev_month = $month-1;
            }

            $withdraw = withdrow::selectRaw("SUM(CASE WHEN ( year(account_date)='".$prev_year."' AND month(account_date)='".$prev_month."' ) THEN amount ELSE 0 END) AS prev_month, SUM(CASE WHEN ( year(account_date)='".$year."' AND month(account_date)='".$month."' ) THEN amount ELSE 0 END) AS current_month");
            if( $shop != '' ) {
                $withdraw = $withdraw->where('shop_id', $shop);
            }
            $withdraw = $withdraw->first();

            $response[1] = $withdraw->prev_month;
            $response[2] = $withdraw->current_month;

            return response()->json(['data' => $response]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['data' => []]);
        }
    }
    public function editSetting(Request $request) {
        
        $o_setting = Setting::first();

        return view('dashboard/editSetting', compact('o_setting'));
    }
    public function updateSetting(Request $request) {
        $o_setting = Setting::first();

        $o_setting->gp_rate = $request->txtGPRate;
        $o_setting->account_day = $request->cboAccountDay;

        $o_setting->save();

        return 'true';
    }
}
