<?php

namespace App\Http\Controllers\api\mp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;

class ProductController extends Controller
{
    public function getProduct(Request $request){
        $data['status'] = 200;
        // dd($request->all());
        try {
            // flashsale
            // $product =  flashsale
            
            // return response()->json($request);

            // other
            $product = Product::select('product_s.*','shops.shop_name')
            ->leftJoin('shops','shops.id','product_s.shop_id')
            ->whereIn('shops.approve_shop',['waiting', 'approve'])
            ->where('product_option->margin','not like','%null%')
            ->where('product_option->margin','not like','%"0"%')
            ->when($request->type, function($query) use($request){
                switch ($request->type) {
                    case "bestSale" :
                        // join invs
                        $query->orderBy('sold_amt', 'desc');
                    break;
                    case "new" :
                        // join invs
                        $query->orderBy('created_at', 'desc');
                    break;
                        // default
                }
            })
            ->when($request->search, function($query) use($request){
                $query->where('name','like',"%$request->search%")
                        ->orWhere('description','like',"%$request->search%");
            })
            ->when($request->category_id, function($query) use($request){
                $query->where('category_id', $request->category_id);
            })
            ->when($request->sub_category_id, function($query) use($request){
                $query->where('sub_category_id', $request->sub_category_id);
            })
            ->when($request->rating, function($query) use($request){
                $query->where('rating', $request->rating);
            })
            ->when($request->price_start, function($query) use($request){
                $query->where('product_option->price','>=',$request->price_start);
            })
            ->when($request->price_end, function($query) use($request){
                $query->where('product_option->price','<=',$request->price_end);
            })
            ->when($request->paginate&&$request->page,function($query) use($request){
                $query->offset($request->paginate*($request->page-1))->limit($request->paginate);
            })
            ->when($request->id, function($query) use($request){
                $query->where('product_s.id', $request->id);
            })
            ->get();
            // dd($product);
            // print_r($product); exit;
            if($product){
                $data['data'] = $product;
                $data['count'] = $product->count();
            }
        } catch (\Exception $e) {
            $data['status'] = 403;
            $data['message'] = $e->getMessage();
        }
        return response()->json($data);
    }
    public function getProductCategory(Request $request){
        $data['status'] = 200;
        // dd($request->all());
        try {
            $category = ProductCategory::when($request->id, function($query) use($request){
                                            $query->where('category_id', $request->id);
                                        })
                                        ->orderBy('category_name', 'asc')
                                        ->get();
            // print_r($product); exit;
            if($category){
                $data['data'] = $category;
                $data['count'] = $category->count();
            }
        } catch (\Exception $e) {
            $data['status'] = 403;
            $data['message'] = $e->getMessage();
        }
        return response()->json($data);
    }
    public function getProductSubCategory(Request $request){
        $data['status'] = 200;
        // dd($request->all());
        try {
            if( $request->category_id) {
                $sub_category = ProductSubCategory::orderBy('sub_category_name', 'asc')
                ->where('category_id', $request->category_id)
                ->get();
                // print_r($product); exit;
                if($sub_category){
                    $data['data'] = $sub_category;
                    $data['count'] = $sub_category->count();
                }
            } else {
                $data['status'] = 403;
                $data['message'] = $e->getMessage();
            }
        } catch (\Exception $e) {
            $data['status'] = 403;
            $data['message'] = $e->getMessage();
        }
        return response()->json($data);
    }
}
