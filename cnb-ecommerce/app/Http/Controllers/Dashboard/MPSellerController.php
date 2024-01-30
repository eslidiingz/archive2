<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Shops;

class MPSellerController extends Controller
{
    
    public function myproduct(Request $request)
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
                } elseif ($key == 'remain' and $val != '') {
                    $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.stock')"), 'like', '%' . $val . '%');
                } elseif ($key == 'price' and $val != '') {
                    $product = $product->where(DB::raw("JSON_EXTRACT(product_option, '$.price')"), 'like', '%' . $val . '%');
                } elseif ($key == 's_name' and $val != '') {
                    $product = $product->where('shop_name', 'like', '%' . $val . '%');
                }
            }
            $product = $product->paginate(50);
            // dd($product);
            // $product = $product->toSql();
        } else {
            $product =  product::select('product_s.*', 'shops.shop_name')->leftJoin('shops', 'shops.id', 'product_s.shop_id')->orderBy('product_s.created_at', 'asc')->paginate(50);
        }
        // dd($product);
        // $flash_s = flash::where('status', 'enabled')->orderBy('product_pin', 'desc')->get();
        // dd($flash_s);
        // dd($product);
        return view('dashboard.mpseller', compact('product'));
    }

    public function mpupdatediscount(Request $request)
    {
        $product =  Product::find($request->id);
        $arrNew = $product->product_option;
        foreach ($request->discount2 as $key => $val) {
            $arrNew['stn'][$key] = $val;
        }

        foreach ($request->margin2 as $key => $val) {
            $arrNew['margin'][$key] = $val;
        }

        Product::where('id', $request->id)->update([
            'product_option' => $arrNew,
        ]);


        return "true";
    }
}
