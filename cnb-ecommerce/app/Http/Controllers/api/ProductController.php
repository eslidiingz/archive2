<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function loadmore(Request $request)
    {

        // paginate,index
        $data['count'] = 0;
        if (isset($request->paginate) && isset($request->page)) {
            $data['product'] = Product::paginate($request->paginate);
            foreach ($data['product'] as $key => $value) {
                $data['product'][$key]->price = $value->product_option['price'][0];
            }
            $data['count'] = $data['product']->count();
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data['status'] = false;
        $data['message'] = 'unsuccess';
        $data['product'] = Product::select('product_s.id as id', 'product_s.product_img as product_img', 'product_s.name as name','product_s.product_option as product_option')
                                    ->Leftjoin('shops', 'shops.id', 'shop_id')
                                    ->Leftjoin('users', 'users.id', 'user_id')
                                    ->Leftjoin('addresses', 'addresses.user_id', 'users.id')
                                    ->Where(function ($query) use($request) {
                                        if(isset($request->province)&&$request->province!=''){
                                            $query->orwhere('addresses.city', 'like',  '%'.$request->province.'%');
                                        }
                                    })
                                    ->where('status_goods',1)
                                    ->limit(10)
                                    ->inRandomOrder()
                                    ->get();
        if($data['product']){
            $data['status'] = true;
            $data['message'] = 'success';
            $data['province'] = $request->province;
            $data['count'] = count($data['product']);
        }   
        return response()->json($data,200);
    }
}
