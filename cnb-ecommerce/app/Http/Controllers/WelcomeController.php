<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Product;
use App\User;
use App\Shops;
use App\rating;
use App\flash;
use App\Http\Controllers\tools\PseudoCryptController;
use Auth;
use Image;
use Session;
use File;
use Hash;
use App\invs;
use App\PreOrder;
use App\Referal_users;
use App\shipping;
use App\SubCategory;
use App\CodeOpenShop;
use App\Province;
use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function index()
    {

        return Redirect::to('/product_all');

        // $category_all = [];
        // // $categories = Category::all();
        // // $categories = Category::all();
        // // $other = Category::where('category_name', 'อื่นๆ')->orderBy('category_name', 'ASC')->get();
        // // $category = Category::where('category_name', '!=', 'อื่นๆ')->orderBy('category_name', 'ASC')->get();
        // $category = Category::orderBy('category_id', 'ASC')->get();
        // $categories = $category;
        // // $category = $category1->push($other[0]);
        // $gift = Product::where('status_goods', '!=', '2')
        //     ->where('status_goods', '!=', '99')
        //     ->where('sub_category_id', '419')
        //     ->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
        //     // ->where(DB::raw("JSON_EXTRACT(product_option, '$.stock[0]')"), '>', 0)
        //     ->orderBy('created_at', 'ASC')
        //     ->take(20)
        //     ->get();
        // // dd($category);
        // // $product_all = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->orderBy('created_at', 'DESC')->take(60)->get();
        // $product_reborn = Product::leftJoin('shops', 'shops.id', '=', 'product_s.shop_id')
        //     // ->where('product_s.category_id', '=', '55')
        //     ->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
        //     ->where('status_goods', '!=', '2')->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')
        //     ->select('product_s.*', 'shops.shop_name')
        //     // ->orderBy('created_at', 'DESC')
        //     ->inRandomOrder()->take(60)->get();
        // // dd($product_reborn);
        // $product_all2 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->orderBy('created_at', 'DESC')->take(60)->get();
        // $product_all3 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->inRandomOrder()->take(60)->get();
        // foreach ($category as $key => $value) {
        //     $categoryCount = Product::where('category_id', $value->category_id)->count();
        //     // if ($categoryCount > 0) {
        //     if ($value->data_subdets != "[]") {
        //         // $subother = SubCategory::where('category', $value->category_id)->where('sub_category_name', '=', 'อาหาร')->select('sub_category_name as sub_name', 'sub_category_id as sub_id');
        //         // $sub = SubCategory::where('category', $value->category_id)->where('sub_category_name', '!=', 'อาหาร')->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->orderBy('sub_category_name', 'ASC')->union($subother)->get();
        //         $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
        //         $value['data_subdets'] = $sub;
        //     } else {
        //         $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
        //     }
        //     array_push($category_all, json_decode($value));
        //     // }
        // }
        // // dd($category_all);
        // $cat_01 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 55)->inRandomOrder()->take(10)->get();
        // // dd($cat_01);
        // $cat_02 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 59)->inRandomOrder()->take(10)->get();
        // $cat_03 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 60)->inRandomOrder()->take(10)->get();
        // $cat_04 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 61)->inRandomOrder()->take(10)->get();
        // $cat_05 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 62)->inRandomOrder()->take(10)->get();
        // $cat_06 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 63)->inRandomOrder()->take(10)->get();
        // // $cat_05 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 433)->inRandomOrder()->take(10)->get();

        // $rating_group = rating::all();

        // // dd($rating_group);
        // // $flash_all = [];
        // $time = 0;
        // // if(date('H:i')>)
        // $time_end = flash::select('end_date')
        //     ->where('start_date', '<=', date('Y-m-d'))
        //     ->where('end_date', '>=', date('Y-m-d'))
        //     ->orderBy('end_date')->first();
        // $flash_pin = flash::where('product_pin', 1)
        //     ->where('start_date', '<=', date('Y-m-d'))
        //     ->where('end_date', '>=', date('Y-m-d'))
        //     ->where('status', '!=', 'unenabled')
        //     ->orderBy('updated_at', 'desc')->take(5)->get();
        // $flash_normal = flash::where('product_pin', 0)
        //     ->where('start_date', '<=', date('Y-m-d'))
        //     ->where('end_date', '>=', date('Y-m-d'))
        //     ->where('status', '!=', 'unenabled')
        //     ->inRandomOrder()->take(5)->get();
        // foreach ($flash_pin as $key => $value) {
        //     $flash_pin[$key]->price = min($value->product_option['price']);
        //     $flash_pin[$key]->discount = max($value->product_option['discount']);
        //     $flash_pin[$key]->sale = array_sum($value->product_option['amount']) - array_sum($value->product_option['stock']);
        //     $flash_pin[$key]->percent = ($flash_pin[$key]->sale / array_sum($value->product_option['amount'])) * 100;
        // }
        // // dd($flash_normal);
        // foreach ($flash_normal as $key => $value) {
        //     $flash_normal[$key]->price = min($value->product_option['price']);
        //     $flash_normal[$key]->discount = max($value->product_option['discount']);
        //     $flash_normal[$key]->sale = array_sum($value->product_option['amount']) - array_sum($value->product_option['stock']);
        //     $flash_normal[$key]->percent = ($flash_normal[$key]->sale / array_sum($value->product_option['amount'])) * 100;
        // }
        // foreach ($gift as $key => $value) {
        //     $gift[$key]->price = min($value->product_option['price']);
        // }

        // // dd($flash_normal);
        // // array_push($flash_all,$data_pin);
        // // array_push($flash_all,$data_normal);

        // // dd($flash_all);
        // $pre_order1 = PreOrder::where('status_goods', 1)->limit(20)->get();
        // $month = [
        //     '01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.',
        //     '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.',
        //     '11' => 'พ.ย.', '12' => 'ธ.ค.'
        // ];

        // $datetime['datetime_range'] = [];
        // $datetime['pre_order'] = [];
        // $current_date = date("Y-m-d H:i");
        // // dd($current_date);
        // foreach ($pre_order1 as $pre_order) {
        //     foreach ($pre_order->preOrder_option as $keyprice => $pre_option) {
        //         foreach ($pre_option['datetime_range'] as $keydate => $date) {
        //             if ($current_date > $date['start_date'] && $current_date < $date['end_date']) {

        //                 array_push($datetime['pre_order'], $pre_order);
        //                 $datetime['product_img'] = $pre_order->product_img[0];
        //                 if ($pre_option['datetime_range'][$keyprice]['start_date'] >= $current_date || $pre_option['datetime_range'][$keyprice]['end_date'] <= $current_date) {
        //                     foreach ($date['price'] as $price_pre) {
        //                         $datetime['price'] = $price_pre;
        //                     }
        //                 }

        //                 array_push($datetime['datetime_range'], $pre_option['datetime_range'][$keydate]);
        //             }
        //         }
        //     }
        // }
        // $user_all = User::where('id', 5)->get();
        // // dd($pre_order);
        // // dd($flash_pin);
        // // dd($datetime);
        // // dd('lnwza');
        // // return $category_all;

        // $banner = Banner::orderBy('status', 'asc')->orderBy('updated_at', 'desc')->get();
        // // return view('pages.home');

        // return view('pages.home', $datetime, compact('categories', 'category_all', 'user_all', 'product_all2', 'product_all3', 'product_reborn', 'cat_01', 'cat_02', 'cat_03', 'cat_04', 'cat_05', 'cat_06', 'rating_group', 'flash_pin', 'flash_normal', 'time_end', 'gift', 'banner'));
        // return view('new_ui.product-new', compact('category_all','product_all','user_all'));
        // return ['category_all' => $category_all, 'product_all' => $product_all, 'user_all' => $user_all];
    }

    // public function flashSeller()
    // {
    //     $category_all = $this->index()['category_all'];
    //     $product_all = $this->index()['product_all'];
    //     $user_all = $this->index()['user_all'];

    //     return view('new_ui.flash-sale', compact('category_all', 'product_all', 'user_all'));
    // }
    // public function bestSeller()
    // {
    //     $category_all = $this->index()['category_all'];
    //     $product_all = $this->index()['product_all'];
    //     $user_all = $this->index()['user_all'];

    //     return view('new_ui.best-seller', compact('category_all', 'product_all', 'user_all'));
    // }
    // public function productNew()
    // {
    //     $category_all = $this->index()['category_all'];
    //     $product_all = $this->index()['product_all'];
    //     $user_all = $this->index()['user_all'];

    //     return view('new_ui.product-new', compact('category_all', 'product_all', 'user_all'));
    // }
    public function user_shop()
    {

        $user_shops = shops::Where('user_id', Auth::user()->id)->first();
        return $user_shops;
    }

    public function NewShop(Request $data)
    {
        $chk_shopname = Shops::where('shop_name', $data->shop_name)->get();
        if (count($chk_shopname) > 0) {
            return redirect('/')->with('error', 'ชื่อร้านค้านี้ถูกใช้ไปแล้ว');
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
            $location = public_path('affee_shop/img/shop_profiles/') . $shop_profile_name;
            // Image::make($image)->resize(700, 350)->save($location);
            $image->move('img/shop_profiles/', $shop_profile_name);
            // Image::make($image)->save($location);
            // $in['picture'] = $kyc_name;
        } else {
            $shop_profile_name = $data['shop_pic'];
        }

        // dd($data);

        $data['shop_pic'] = $shop_profile_name;

        $user_shops = $this->user_shop();

        if ($user_shops == null) //
        {
            Shops::Create([
                'user_id' => Auth::user()->id,
                'shop_name' => $data['shop_name'],
                'ated_province_id' => $data['ated_province_id'],
                'shop_pic' => $shop_profile_name,
                'description' => $data['description'],
            ]);
            $shop = Shops::where('user_id', Auth::user()->id)->first();

            User::where('id', Auth::user()->id)->update([
                'ref_code' => PseudoCryptController::hash(Auth::user()->id, 8)
            ]);
            // dd($shop);
            shipping::Create([
                'shop_id' => $shop->id,
                'ship_default' => '2,3,7,8,9',
                'ship_price' => 0.00,
                'shipde_id' => 0,
                'shipty_id' => 0
            ]);

            if ($data['partner'] != null && $data['partner'] != '') {
                $partner = Referal_users::where('user_id', Auth::user()->id)->first();
                if (isset($partner)) {
                    $partner->ref_code = $data['partner'];

                    $partner->save();
                } else {
                    $model = new Referal_users;

                    $model->user_id = Auth::user()->id;
                    $model->ref_code = $data['partner'];

                    $model->save();
                }
            }
        }

        return redirect(route('sellerShopUserDetail'));
    }

    public function cateProduct($type, $id)
    {
        $data['category_all'] = [];
        $data['i_category_id'] = $id;
        $category = Category::get();
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id', $value->category_id)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->count();
            if ($value->data_subdets != "[]") {
                $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                $value['data_subdets'] = $sub;
            } else {
                $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
            }
            array_push($data['category_all'], json_decode($value));
        }
        if ($type == 'category') {
            $data['data'] = Product::where('category_id', $id)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->inRandomOrder()->paginate(48);
            $cate = Category::select('category_name')->where('category_id', $id)->first();
            $data['cate_name'] = $cate->category_name;
            $data['rating_data'] = rating::all();
        } else if ($type == 'subcategory') {
            $data['data'] = Product::where('sub_category_id', $id)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->inRandomOrder()->paginate(48);
            $sub = SubCategory::select('sub_category_name', 'category')->where('sub_category_id', $id)->first();
            // dd($sub);
            $cate = Category::select('category_name')->where('category_id', $sub->category)->first();
            $data['cate_name'] = $cate->category_name . ' - ' . $sub->sub_category_name;
            $data['rating_data'] = rating::all();
        }
        // AUI EDIT 20210810
        foreach ($data['data'] as $key => $val) {
            if (!isset($val['product_img'][0])) {
                $data['data'][$key]['product_img'] = array('0' => '../no_image.png');
            }
        }

        // dd($data);
        return view('pages.product-category', $data);
    }
}
