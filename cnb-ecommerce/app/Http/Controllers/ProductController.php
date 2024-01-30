<?php

namespace App\Http\Controllers;

use PA\ProvinceTh\Factory;

use Illuminate\Http\Request;
use App\Product;
use App\shipping;
use App\Category;
use App\SubCategory;
use App\rating;
use App\Address;
use App\Shops;
use App\User;
use App\flash;
use App\PreOrder;
use App\invs;
use App\Province;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Session;

use function GuzzleHttp\json_decode;

class ProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $product =  Product::where('id', $id)->first();
        if ($product) {
            // UPDATE View Count
            $locale = Session::get('locale');

            $i_cnt = $product->view_cnt + 1;
            Product::where('id', $id)->update(['view_cnt' => $i_cnt]);

            $category = Category::where('category_id', $product->category_id)->first();
            $sub = SubCategory::where('sub_category_id', $product->sub_category_id)->first();

            $category_all = [];
            $category_1 = Category::get();
            foreach ($category_1 as $key => $value) {
                $categoryCount = Product::where('category_id', $value->category_id)->count();
                if ($value->data_subdets != "[]") {
                    $sub_1 = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                    $value['data_subdets'] = $sub_1;
                } else {
                    $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
                }
                array_push($category_all, json_decode($value));
            }

            $starpercen = 0;
            $breadcrumb_item = array();
            if( $locale == 'en' ) {
                if ($category) {
                    array_push($breadcrumb_item, ['name' => $category->category_name_en, 'link' => '/product_all?category=' . $category->category_id]);
                }
                if ($sub) {
                    array_push($breadcrumb_item, ['name' => $sub->sub_category_name_en, 'link' => '/product_all?category=' . $category->category_id . '&sub=' . $sub->sub_category_id]);
                }
            } else {
                if ($category) {
                    array_push($breadcrumb_item, ['name' => $category->category_name, 'link' => '/product_all?category=' . $category->category_id]);
                }
                if ($sub) {
                    array_push($breadcrumb_item, ['name' => $sub->sub_category_name, 'link' => '/product_all?category=' . $category->category_id . '&sub=' . $sub->sub_category_id]);
                }
            }

            array_push($breadcrumb_item, ['name' => $product->name, 'link' => '#']);
            if ($product->status_goods == '99') {
                return view('pages.error404');
            }

            // AUI EDIT 20210810
            if( !isset( $product->product_img ) ) {
                $product->product_img = array('0' => '../no_image.png');
            }

            $rating = rating::where('product_id', $id)->get();
            if (count($rating) > 0) {
                $arr = [];
                foreach ($rating as $value) {
                    $inv = invs::where('id', $value->invs_id)->first();

                    foreach ($inv->inv_products as $item) {
                        if ($item['product_id'] == $value->product_id) {
                            if (!isset($item['type'])) {
                                array_push($arr, $value->id);
                            }
                        }
                    }
                }
                $rating_data = rating::whereIn('id', $arr)->orderBy('id', 'desc')->get();
                $user_arr = [];
                foreach ($rating_data as $item) {
                    if (!in_array($item->user_id, $user_arr)) {
                        array_push($user_arr, $item->user_id);
                    }
                }
                $inv_arr = [];
                foreach ($rating_data as $item) {
                    if (!in_array($item->invs_id, $inv_arr)) {
                        array_push($inv_arr, $item->invs_id);
                    }
                }
                $user_data = User::whereIn('id', $user_arr)->get();
                $inv_data = invs::whereIn('id', $inv_arr)->get();
                $rating_sum = rating::whereIn('id', $arr)->sum('rating');
                $rating_count = count($rating_data);
                if ($rating_sum > 0) {
                    $starpercen = ($rating_sum / ($rating_count * 5)) * 100;
                } else {
                    $starpercen = 0;
                }
                $a_shop = Shops::where('id', $product->shop_id)->first();
                $a_shop_addr = Address::where('status_address', '2')
                            ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$product->shop_id.')')
                            ->first();
                if( !isset( $a_shop_addr['city']) ) {
                    $a_shop_addr['city'] = false;
                }
                if ($request->uidmp) {
                    $cookie = cookie('link', json_encode(['uidmp' => $request->uidmp]), 120);
                    return response()->view('pages.product-detail', compact('product', 'breadcrumb_item', 'starpercen', 'rating_data', 'rating_count', 'user_data', 'inv_data', 'a_shop', 'a_shop_addr'))->cookie($cookie);
                } else {
                    return view('pages.product-detail', compact('product', 'breadcrumb_item', 'starpercen', 'rating_data', 'rating_count', 'user_data', 'inv_data', 'a_shop', 'a_shop_addr'));
                }
            }
            $a_shop = Shops::where('id', $product->shop_id)->first();
            $a_shop_addr = Address::where('status_address', '2')
                            ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$product->shop_id.')')
                            ->first();
            if( !isset( $a_shop_addr['city']) ) {
                $a_shop_addr['city'] = false;
            }

            // dd($a_shop_addr);
            if ($request->uidmp) {
                $cookie = cookie('link', json_encode(['uidmp' => $request->uidmp]), 120);
                return response()->view('pages.product-detail', compact('product', 'breadcrumb_item', 'starpercen','category_all', 'a_shop', 'a_shop_addr'))->cookie($cookie);
            } else {
                return view('pages.product-detail', compact('product', 'breadcrumb_item', 'starpercen','category_all', 'a_shop', 'a_shop_addr'));
            }
        }
        return view('pages.error404');
    }

    public function flash_sale($id)
    {
        $product =  flash::where('id', $id)
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))->get();

        if (count($product) != 0) {
            $category = Category::where('category_id', $product[0]->category_id)->get();
            $sub = SubCategory::where('sub_category_id', $product[0]->sub_category_id)->get();
            // $rating = rating::where('product_id', $id)->get();
            // $rating_count = rating::where('product_id', $id)->count();
            // $rating_sum = rating::where('product_id', $id)->sum('rating');
            $receive_status = Product::where('id', $product[0]->product_old_id)->get();
            // if ($rating_sum > 0) {
            //     $starpercen = ($rating_sum / ($rating_count * 5)) * 100;
            // } else {
            //     $starpercen = 0;
            // }
            $starpercen = 0;
            $breadcrumb_item = array();
            if (count($category) > 0) {
                array_push($breadcrumb_item, ['name' => $category[0]->category_name, 'link' => '/product_all?category=' . $category[0]->category_id]);
            }
            if (count($sub) > 0) {
                array_push($breadcrumb_item, ['name' => $sub[0]->sub_category_name, 'link' => '/product_all?category=' . $category[0]->category_id . '&sub=' . $sub[0]->sub_category_id]);
            }

            foreach ($product as $key => $value) {
                if (isset($value['receive_product'])) {
                    $product[$key]['receive_product'] = $receive_status[0]['receive_product'];
                } else {
                    $product[$key]['receive_product'] = null;
                }
            }
            if ($product[0]->status == 'unenabled') {
                return view('pages.error404');
            }

            $rating = rating::where('product_id', $id)->orderBy('id', 'desc')->get();
            if (count($rating) > 0) {
                $arr = [];
                foreach ($rating as $value) {
                    $inv = invs::where('id', $value->invs_id)->first();

                    foreach ($inv->inv_products as $item) {
                        if ($item['product_id'] == $value->product_id) {
                            if ($item['type'] == 'flashsale') {
                                array_push($arr, $value->id);
                            }
                        }
                    }
                }
                $rating_data = rating::whereIn('id', $arr)->get();
                $user_arr = [];
                foreach ($rating_data as $item) {
                    if (!in_array($item->user_id, $user_arr)) {
                        array_push($user_arr, $item->user_id);
                    }
                }
                $inv_arr = [];
                foreach ($rating_data as $item) {
                    if (!in_array($item->invs_id, $inv_arr)) {
                        array_push($inv_arr, $item->invs_id);
                    }
                }
                $user_data = User::whereIn('id', $user_arr)->get();
                $inv_data = invs::whereIn('id', $inv_arr)->get();
                $rating_sum = rating::whereIn('id', $arr)->sum('rating');
                $rating_count = count($rating_data);
                if ($rating_sum > 0) {
                    $starpercen = ($rating_sum / ($rating_count * 5)) * 100;
                } else {
                    $starpercen = 0;
                }

                // dd($product);
                return view('pages.product-detail', compact('product', 'breadcrumb_item', 'starpercen', 'receive_status', 'rating_data', 'rating_count', 'user_data', 'inv_data'));
            }
            return view('pages.product-detail', compact('product', 'breadcrumb_item', 'starpercen', 'receive_status'));
        }
        return view('pages.error404');
    }

    public function shop_search_all(Request $request)
    {
        $shop_search = Shops::where('shop_name', 'like', "%$request->search%")->orderBy('id', 'asc')->paginate(8);
        $shop_search->appends(['search' => $request->search]);
        return view('pages.shop_seach_all', ['shop_search' => $shop_search]);
    }

    public function product_all(Request $request)
    {
        try{
            if (!isset($request)) {
                $request = null;
            }

        $compact = ['product_all', 'subcategory_all', 'category_all', 'address_all', 'breadcrumb_item', 'shop_search', 'search_name', 'rating_group', 'province_th','province_en'];
        $locale = Session::get('locale');

        $a_selected_province = array_filter(explode(',', $request->province));

        $a_rating = array('5' => array(0 => 4.5, 1 => 6), '4' => array(0 => 3.5, 1 => 4.5), '3' => array(0 => 2.5, 1 => 3.5), '2' => array(0 => 1.5, 1 => 2.5), '1' => array(0 => 0.5, 1 => 1.5) );
        $a_wh_rating = array_filter(explode(',', $request->rating));

        $product_all = Product::query();
        $search_name = $request->search;
        $rating_group = rating::all();

        if (isset($request->barcode) && $request->barcode != null) {
            $product_all = $product_all->where('product_s.barcode', $request->barcode);
        }
        if (isset($request->category)) {
            $product_all = $product_all->where('product_s.category_id', $request->category);
            $subcategory_all = SubCategory::where('sub_category.category', $request->category)->orderBy('sub_category_name','asc')->get();
        }
        if (isset($request->province) && $request->province != null) {
            $product_all = $product_all->whereRaw('exists(select id from shops where shops.id=product_s.shop_id and shops.ated_province_id in ('. implode(',',$a_selected_province).') )');
        }
        // if (!isset($request->category)) {
            $category_all = Category::orderBy('category_name','asc')->get();
        $category_all_temp = [];
        foreach ($category_all as $item) {
            $productCount = Product::where('category_id', $item->category_id)->where('status_goods','1');
            //  $productCount = Product::selectRaw("*,CAST(REPLACE(JSON_EXTRACT(product_s.product_option, '$.price[0]'), '\"','') AS UNSIGNED) as PRICE")->where('category_id', $item->category_id)->where('status_goods','1')->get();
            // dd($productCount);
            $productCount = Product::join('shops','shops.id','=','product_s.shop_id')
                    ->where('category_id', $item->category_id)->where('product_s.status_goods', '1')
                    ->where('shops.shop_sts', 'open')->where('shops.kyc_status', 'approve')->whereNotNull('shops.bank_number')
                    ->whereRaw('exists(select id from addresses where addresses.user_id = shops.user_id and status_address=2)')
                    ->where(DB::raw("TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) "), '>', 0);
            if (isset($request->minPrice)) {
                $productCount = $productCount->whereRaw("CAST(REPLACE(JSON_EXTRACT(product_s.product_option, '$.price[0]'), '\"','') AS UNSIGNED) >= {floatval($request->minPrice)}");
            }
            if (isset($request->maxPrice)) {
                $productCount = $productCount->whereRaw("CAST(REPLACE(JSON_EXTRACT(product_s.product_option, '$.price[0]'), '\"','') AS UNSIGNED) <= {floatval($request->maxPrice)}");
            }
            // if (isset($request->rating)) {
            //     $productCount = $productCount->whereRAW("product_s.rating >= '".$a_rating[$request->rating][0]."' and product_s.rating <= '".$a_rating[$request->rating][1]."' ");
            // }
            if ( isset($request->isPromo) && $request->isPromo == 'Y') {
                $productCount = $productCount->where('product_s.is_promo', 'Y');
            }
            // if (isset($request->search) && $request->search != null) {
            //     $productCount = $productCount->where(function ($productCount) use ($request) {
            //         $productCount->where('product_s.name', 'like', '%' . $request->search . '%')
            //             ->orwhere('product_s.barcode', 'like', '%' . $request->search . '%');
            //     });
            // }
            // $categoryCount = $categoryCount->count();
            // if ($categoryCount > 0) {
                $item_all = $item;
                $item_all['data_subdets'] = [['sub_name'=>'','sub_id'=>'']];
                if($item->data_subdets!="[]"){
                    $other = SubCategory::where('category',$item->category_id)->where('sub_category_name','=','อื่นๆ')->select('sub_category_name as sub_name','sub_category_id as sub_id');
                    $sub = SubCategory::where('category',$item->category_id)->where('sub_category_name','!=','อื่นๆ')->
                            select('sub_category_name as sub_name','sub_category_id as sub_id')->orderBy('sub_category_name','ASC')->union($other)->get();
                    $item_all['data_subdets'] = $sub;
                }else{
                    $item_all['data_subdets'] = [['sub_name'=>'','sub_id'=>'']];
                }
                $item_all['productCount'] = $productCount->count();
                // $category_all_temp.push($item);
                array_push($category_all_temp, $item_all);
            // }
        }
        $subcategory_all_temp = [];
        if( isset($subcategory_all) ) {
            foreach ($subcategory_all as $item) {
                $productCount = Product::join('shops','shops.id','=','product_s.shop_id')
                    ->where('sub_category_id', $item->sub_category_id)->where('product_s.status_goods', '1')
                    ->where('shops.shop_sts', 'open')->where('shops.kyc_status', 'approve')->whereNotNull('shops.bank_number')
                    ->whereRaw('exists(select id from addresses where addresses.user_id = shops.user_id and status_address=2)')
                    ->where(DB::raw("TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) "), '>', 0);
                if (isset($request->minPrice)) {
                    $productCount = $productCount->whereRaw("CAST(REPLACE(JSON_EXTRACT(product_s.product_option, '$.price[0]'), '\"','') AS UNSIGNED) >= {floatval($request->minPrice)}");
                }
                if (isset($request->maxPrice)) {
                    $productCount = $productCount->whereRaw("CAST(REPLACE(JSON_EXTRACT(product_s.product_option, '$.price[0]'), '\"','') AS UNSIGNED) >= {floatval($request->minPrice)}");
                }
                if ( isset($request->isPromo) && $request->isPromo == 'Y') {
                    $productCount = $productCount->where('product_s.is_promo', 'Y');
                }
                if (isset($request->search) && $request->search != null) {
                    $productCount = $productCount->where(function ($productCount) use ($request) {
                        $productCount->where('product_s.name', 'like', '%' . $request->search . '%')
                            ->orwhere('product_s.barcode', 'like', '%' . $request->search . '%');
                    });;
                }
                $item_all = $item;
                $item_all['productCount'] = $productCount->count();
                array_push($subcategory_all_temp, $item_all);
            }
        }
        // echo '<pre>';
        // print_r($category_all_temp);
        // echo '</pre>'; exit;
        // $category_all = $category_all->toArray();
        // echo gettype($category_all).' - '.gettype($category_all_temp); exit;
        // dd($category_all_temp);
        $category_all = $category_all_temp;
        $subcategory_all = $subcategory_all_temp;
        // dd($category_all);
        // }
        if (isset($request->sub)) {
            $product_all = $product_all->where('product_s.sub_category_id', $request->sub);
        }
        if (isset($request->minPrice)) {
            $product_all = $product_all->whereRaw("JSON_EXTRACT(product_s.product_option, '$.price[0]') >= {$request->minPrice}");
        }
        if (isset($request->maxPrice)) {
            $product_all = $product_all->whereRaw("JSON_EXTRACT(product_s.product_option, '$.price[0]') >= {$request->minPrice}");
        }
        if (isset($request->rating)) {
            $a_wh_rating = explode(',', $request->rating);
            $product_all = $product_all->where(function ($product_all) use ($request,$a_wh_rating,$a_rating) {
                foreach ($a_wh_rating as $key => $val) {
                    $product_all = $product_all->orWhereRaw("product_s.rating >= '".$a_rating[$val][0]."' and product_s.rating <= '".$a_rating[$val][1]."' ");
                }
            });
        }
        if ( isset($request->isPromo) && $request->isPromo == 'Y') {
            $product_all = $product_all->where('product_s.is_promo', 'Y');
        }

        // dd($request);
        // dd($request->sortBy);

        $address_all = clone $product_all;
        // dd($address_all->Leftjoin('shops', 'shops.id', 'shop_id')->get());
        // if (count($address_all->get())!=0) {

        // dd($address_all->Leftjoin('shops', 'shops.id', 'product_s.shop_id')
        // ->Leftjoin('users','users.id','shops.user_id')
        //     ->Leftjoin('addresses', 'addresses.user_id','users.id')
        //     ->where('addresses.status_address',2)->select('city')->groupBy('addresses.city')->orderBy('addresses.city','DESC')
        // ->get());

        $address_all = $address_all->Leftjoin('shops', 'shops.id', 'product_s.shop_id')
            ->Leftjoin('users', 'users.id', 'shops.user_id')
            ->Leftjoin('addresses', 'addresses.user_id', 'users.id')
            ->select('city')->groupBy('addresses.city')->orderBy('addresses.city', 'DESC')
            ->get();
        // }
        if ($request->sortBy != 'undefined' && $request->sortBy != null) {
            if ($request->sortBy == 'ctime') {
                $product_all = $product_all->orderBy('product_s.created_at', 'DESC');
            } elseif ($request->sortBy == 'sales') {
                $product_all = $product_all->orderBy('product_s.sold_amt', 'DESC');
            } elseif ($request->sortBy == 'priceMore') {
                // $product_all = $product_all->orderByRaw("getMin(JSON_EXTRACT(product_s.product_option,'$.price','$'))+0 DESC");
                $product_all = $product_all->orderByRaw("(CASE WHEN TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) != 'null' AND TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') )>0 THEN CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) AS SIGNED ) ELSE CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) AS SIGNED ) END) DESC");
                // dd($product_all->toSql());
            } elseif ($request->sortBy == 'priceLess') {
                // $product_all = $product_all->orderByRaw("getMin(JSON_EXTRACT(product_s.product_option->'$.price','$'))+0 ASC");
                $product_all = $product_all->orderByRaw("(CASE WHEN TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) != 'null' AND TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') )>0 THEN CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price_special[0]') ) AS SIGNED ) ELSE CAST( TRIM( BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) AS SIGNED ) END) ASC");
            } else { // POP
                $product_all = $product_all->orderBy('product_s.view_cnt', 'DESC');
            }
        }

        if (isset($request->type)) {
            if ($request->type == 'option2') {
                $product_all = $product_all->Leftjoin('rating', 'rating.product_id', 'product_s.id')
                    ->groupBy('product_s.id')
                    ->where('rating.rating', '5');
            } elseif ($request->type == 'option1') {
            }
            // dd($product_all->get());
        }

        // $address_all = [];

        // dd(Shops::quproduct_sery()->where('products.id',1)->get());
        // dd($request->location);

        // dd($address_all);

        if (isset($request->location) and isset($request->transport)) {
            $transport = explode(',', $request->transport);
            $location = explode(',', $request->location);
            $product_all = $product_all->Leftjoin('shops', 'shops.id', 'shop_id')
                ->Leftjoin('users', 'users.id', 'user_id')
                ->Leftjoin('addresses', 'addresses.user_id', 'users.id')
                ->Leftjoin('shippings', 'shippings.shop_id', 'product_s.shop_id')
                ->select('product_s.id as id', 'product_s.product_img as product_img', 'product_s.name as name', 'product_s.product_option as product_option', 'product_s.status_goods as status_goods', 'shops.shop_name')
                ->Where(function ($query) use ($location) {
                    for ($i = 0; $i < count($location); $i++) {
                        $query->orwhere('addresses.city', 'like',  '%' . $location[$i] . '%');
                    }
                })
                ->Where(function ($query) use ($transport) {
                    for ($i = 0; $i < count($transport); $i++) {
                        $query->orwhere('shippings.ship_default', 'like',  '%' . $transport[$i] . '%');
                    }
                });
        }

        if (isset($request->transport) and !isset($request->location)) {

            // dd($request->all());
            $transport = explode(',', $request->transport);
            $product_all = $product_all->Leftjoin('shippings', 'shippings.shop_id', 'product_s.shop_id')
                ->select('product_s.id as id', 'product_s.product_img as product_img', 'product_s.name as name', 'product_s.product_option as product_option', 'product_s.status_goods as status_goods')
                ->Where(function ($query) use ($transport) {
                    for ($i = 0; $i < count($transport); $i++) {
                        $query->orwhere('shippings.ship_default', 'like',  '%' . $transport[$i] . '%');
                    }
                });
        }

        if ($request->product == 'otop') {
            ///////////////breadcrumb/////////////
            $breadcrumb_item = array(['name' => 'สินค้าโอทอป', 'link' => '/category']);
            //  if(count($category)>0){
            //      array_push($breadcrumb_item,['name'=>$category[0]->category_name,'link'=>'#']);
            //  }
            //////////////////////////////////////

            // $address_otop_city =  Factory::province();
            $address_otop_geography =  Factory::geography();
            // dd($address_otop_geography);
            unset($category_all);
            unset($subcategory_all);
            array_push($compact, 'address_otop_geography');
        } else {
            ///////////////breadcrumb/////////////
            if( $locale == 'en' ) {
                $category = Category::where('category_id', $request->category)->get();
                $breadcrumb_item = array(['name' => 'All categories', 'link' => '/category']);
                if (count($category) > 0) {
                    array_push($breadcrumb_item, ['name' => $category[0]->category_name, 'link' => '#']);
                }
            } else {
                $category = Category::where('category_id', $request->category)->get();
                $breadcrumb_item = array(['name' => 'หมวดหมู่ทั้งหมด', 'link' => '/category']);
                if (count($category) > 0) {
                    array_push($breadcrumb_item, ['name' => $category[0]->category_name, 'link' => '#']);
                }
            }
            //////////////////////////////////////
        }
        if (isset($request->search) && $request->search != null) {
            // $product_all = $product_all->Leftjoin('shops', 'product_s.shop_id', 'shops.id');
            $product_all = $product_all->where(function ($product_all) use ($request) {
                $product_all->orWhere('product_s.name', 'like', '%' . $request->search . '%');
                $product_all->orWhere('product_s.barcode', 'like', '%' . $request->search . '%');
                $product_all->orWhere('shops.shop_name', 'like', '%' . $request->search . '%');
            });
            $shop_search = Shops::where('shops.shop_name', 'like', "%$request->search%")->where('shops.approve_shop', '!=', 'decline')->orderBy('id', 'asc')->first();
        } else {
            $shop_search = '';
        }

        // $category_all = isset($category_all) ? $category_all : null;
        $subcategory_all = isset($subcategory_all) ? $subcategory_all : null;

        $product_all = $product_all->join('shops','shops.id','=','product_s.shop_id')
            ->where('status_goods', '=', '1')
            ->where('shops.shop_sts', 'open')->where('shops.kyc_status', 'approve')->whereNotNull('shops.bank_number')
            ->whereRaw('exists(select id from addresses where addresses.user_id = shops.user_id and status_address=2)')
            ->where(DB::raw("TRIM(BOTH '\"' FROM JSON_EXTRACT(product_s.product_option, '$.price[0]') ) "), '>', 0)
            ->select('product_s.*')
            // ->toSql();
            ->paginate(12);
        // echo $product_all; exit;
        $product_all->appends(['location' => $request->location]);
        $product_all->appends(['transport' => $request->transport]);
        $product_all->appends(['search' => $request->search]);
        $product_all->appends(['sortBy' => $request->sortBy]);
        $product_all->appends(['minPrice' => $request->minPrice]);
        $product_all->appends(['maxPrice' => $request->maxPrice]);
        $product_all->appends(['type' => $request->type]);

        // AUI EDIT 20210810
        foreach ($product_all as $key => $val) {
            if( !isset( $val['product_img'][0] ) ) {
                $product_all[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }

        $province_th = Province::orderBy('name_th','asc')->get();
        $province_en = Province::orderBy('name_en','asc')->get();

        // dd($province_en);

        if ($request->ajax()) {
            // dd($request->sortBy);
            return view('component.pagination_data', compact($compact, $request, 'a_wh_rating'));
        }

        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        return view('pages.product-all', compact($compact, 'request', 'a_wh_rating', 'locale', 'province_th', 'province_en', 'a_selected_province', 'minPrice', 'maxPrice'));

        }catch(\Exception $e){
            return response()->json([
                "status" => 500,
                "messageDesc" => $e->getMessage()
            ]);
        }
    }

    public function barcode(Request $request)
    {

        // dd($request->all());

        $data = [];
        $barcode_no = $request->barcode;



        $data['product'] = Product::where('barcode', $barcode_no)->where('status_goods', '1')->first();
        if ($data['product']) {
            $name = $data['product']->name;
            $near_name_pro = Product::where('name', 'like', "%$name%")->where('id', '!=', $data['product']->id)->get();
            $data['near_name_pro'] = $near_name_pro;

            $data['near_category_pro'] = Product::where('category_id', $data['product']->category_id)->where('id', '!=', $data['product']->id)->where('status_goods', '1')->get();
            $data['near_sub_category_pro'] = Product::where('sub_category_id', $data['product']->sub_category_id)->where('id', '!=', $data['product']->id)->where('status_goods', '1')->get();
        }


        $data['pre_order'] = PreOrder::where('barcode', $barcode_no)->where('status_goods', '1')->first();
        if ($data['pre_order']) {
            $name = $data['pre_order']->name;
            $near_name_pre = PreOrder::where('name', 'like', "%$name%")->where('id', '!=', $data['pre_order']->id)->where('status_goods', '1')->get();
            $data['near_name_pre'] = $near_name_pre;

            $data['near_category_pre'] = PreOrder::where('category_id', $data['pre_order']->category_id)->where('id', '!=', $data['pre_order']->id)->where('status_goods', '1')->get();
            $data['near_sub_category_pre'] = PreOrder::where('sub_category_id', $data['pre_order']->sub_category_id)->where('id', '!=', $data['pre_order']->id)->where('status_goods', '1')->get();
        }


        $rating_group = rating::all();
        $data['rating_group'] = $rating_group;

        // dd($data);

        return view('pages/product-barcode', $data);
    }
}
