<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = shops::select('id', 'shop_name', 'shop_pic')->paginate(50);
        // ->map(function ($shop) {
        //     $shopPic = asset('img/no_image.png');

        //     if ($shop->shop_pic && file_exists(public_path("img/shop_profiles/{$shop->shop_pic}"))) {
        //         $shopPic = asset("img/shop_profiles/{$shop->shop_pic}");
        //     }

        //     return [
        //         'shopId' => $shop->id,
        //         'shopName' => $shop->shop_name,
        //         'shopPic' => $shopPic
        //     ];
        // });

        // if (isset($request->search)) {
        //     $product =  product::select('product_s.*', 'shops.shop_name')->selectRaw("JSON_EXTRACT(product_option, '$.stock') as stock")->leftJoin('shops', 'shops.id', 'product_s.shop_id')->orderBy('product_s.created_at', 'asc');
        //     foreach ($_GET as $key => $val) {
        //         if ($key == 'date_start' and $val != '') {
        //             $product = $product->where('start_date', '>=', $val);
        //         } elseif ($key == 'date_end' and $val != '') {
        //             $product = $product->where('end_date', '<=', $val);
        //         } elseif ($key == 'status' and $val != '') {
        //             if ($val == '2') {
        //             } else {
        //                 $product = $product->where('product_pin', $val);
        //             }
        //         } elseif ($key == 'p_name' and $val != '') {
        //             $product = $product->where('name', 'like', '%' . $val . '%');
        //         } elseif ($key == 'remain_start' and $val != '') {
        //             $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.stock')"), '>=', $val);
        //         } elseif ($key == 'remain_end' and $val != '') {
        //             $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.stock')"), '<=', $val);
        //         } elseif ($key == 'price_start' and $val != '') {
        //             $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.price')"), '>=', $val);
        //         } elseif ($key == 'price_end' and $val != '') {
        //             $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.price')"), '<=', $val);
        //         } elseif ($key == 's_name' and $val != '') {
        //             $product = $product->where('shop_name', 'like', '%' . $val . '%');
        //         } elseif ($key == 'chkIsPromoSearch' and $val == 'Y') {
        //             $product = $product->where('is_promo', '=', '' . $val . '');
        //         }
        //     }
        //     $product = $product->paginate(50);
        // } else {
        // $product =  Product::select('product_s.*', 'shops.shop_name')->leftJoin('shops', 'shops.id', 'product_s.shop_id')->orderBy('product_s.created_at', 'asc')->paginate(50);
        // }

        return view('dashboard.manage_shop', compact('shops'));
    }
}
