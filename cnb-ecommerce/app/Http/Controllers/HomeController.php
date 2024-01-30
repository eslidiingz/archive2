<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Category;
use App\SubCategory;
use App\Product;
use App\User;
use App\rating;
use App\flash;
use App\PreOrder;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category_all = [];
        $categories = Category::all();
        // $other = Category::where('category_name', 'อื่นๆ')->orderBy('category_name', 'ASC')->get();
        // $category = Category::where('category_name', '!=', 'อื่นๆ')->orderBy('category_name', 'ASC')->get();
        $category = Category::orderBy('category_id', 'ASC')->get();
        // $category = $category1->push($other[0]);
        $gift = Product::where('status_goods', '!=', '2')
            ->where('status_goods', '!=', '99')
            ->where('sub_category_id', '419')
            ->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
            // ->where(DB::raw("JSON_EXTRACT(product_option, '$.stock[0]')"), '>', 0)
            ->orderBy('created_at', 'ASC')
            ->take(20)
            ->get();
        // dd($category);
        // $product_all = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->orderBy('created_at', 'DESC')->take(60)->get();
        $product_reborn = Product::leftJoin('shops', 'shops.id', '=', 'product_s.shop_id')
                        // ->where('product_s.category_id', '=', '55')
                        ->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
                        ->where('status_goods', '!=', '2')->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')
                        ->select('product_s.*', 'shops.shop_name')
                        // ->orderBy('created_at', 'DESC')
                        ->inRandomOrder()->take(60)->get();
        $product_all2 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->orderBy('created_at', 'DESC')->take(60)->get();
        $product_all3 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->inRandomOrder()->take(60)->get();
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id', $value->category_id)->count();
            // if ($categoryCount > 0) {
                if ($value->data_subdets != "[]") {
                    // $subother = SubCategory::where('category', $value->category_id)->where('sub_category_name', '=', 'อาหาร')->select('sub_category_name as sub_name', 'sub_category_id as sub_id');
                    // $sub = SubCategory::where('category', $value->category_id)->where('sub_category_name', '!=', 'อาหาร')->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->orderBy('sub_category_name', 'ASC')->union($subother)->get();
                    $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                    $value['data_subdets'] = $sub;
                } else {
                    $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
                }
                array_push($category_all, json_decode($value));
            // }
        }
        // dd($category_all);
        $cat_01 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 55)->inRandomOrder()->take(10)->get();
        // dd($cat_01);
        $cat_02 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 59)->inRandomOrder()->take(10)->get();
        $cat_03 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 60)->inRandomOrder()->take(10)->get();
        $cat_04 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 61)->inRandomOrder()->take(10)->get();
        $cat_05 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 62)->inRandomOrder()->take(10)->get();
        // $cat_05 = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->where('category_id', 433)->inRandomOrder()->take(10)->get();

        $rating_group = rating::all();

        // dd($rating_group);
        // $flash_all = [];
        $time = 0;
        // if(date('H:i')>)
        $time_end = flash::select('end_date')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->orderBy('end_date')->first();
        $flash_pin = flash::where('product_pin', 1)
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', '!=', 'unenabled')
            ->orderBy('updated_at', 'desc')->take(5)->get();
        $flash_normal = flash::where('product_pin', 0)
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', '!=', 'unenabled')
            ->inRandomOrder()->take(5)->get();
        foreach ($flash_pin as $key => $value) {
            $flash_pin[$key]->price = min($value->product_option['price']);
            $flash_pin[$key]->discount = max($value->product_option['discount']);
            $flash_pin[$key]->sale = array_sum($value->product_option['amount']) - array_sum($value->product_option['stock']);
            $flash_pin[$key]->percent = ($flash_pin[$key]->sale / array_sum($value->product_option['amount'])) * 100;
        }
        // dd($flash_normal);
        foreach ($flash_normal as $key => $value) {
            $flash_normal[$key]->price = min($value->product_option['price']);
            $flash_normal[$key]->discount = max($value->product_option['discount']);
            $flash_normal[$key]->sale = array_sum($value->product_option['amount']) - array_sum($value->product_option['stock']);
            $flash_normal[$key]->percent = ($flash_normal[$key]->sale / array_sum($value->product_option['amount'])) * 100;
        }
        foreach ($gift as $key => $value) {
            $gift[$key]->price = min($value->product_option['price']);
        }

        // dd($flash_normal);
        // array_push($flash_all,$data_pin);
        // array_push($flash_all,$data_normal);

        // dd($flash_all);
        $pre_order1 = PreOrder::where('status_goods', 1)->limit(20)->get();
        $month = [
            '01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.',
            '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.',
            '11' => 'พ.ย.', '12' => 'ธ.ค.'
        ];

        $datetime['datetime_range'] = [];
        $datetime['pre_order'] = [];
        $current_date = date("Y-m-d H:i");
        // dd($current_date);
        foreach ($pre_order1 as $pre_order) {
            foreach ($pre_order->preOrder_option as $keyprice => $pre_option) {
                foreach ($pre_option['datetime_range'] as $keydate => $date) {
                    if ($current_date > $date['start_date'] && $current_date < $date['end_date']) {

                        array_push($datetime['pre_order'], $pre_order);
                        $datetime['product_img'] = $pre_order->product_img[0];
                        if ($pre_option['datetime_range'][$keyprice]['start_date'] >= $current_date || $pre_option['datetime_range'][$keyprice]['end_date'] <= $current_date) {
                            foreach ($date['price'] as $price_pre) {
                                $datetime['price'] = $price_pre;
                            }
                        }

                        array_push($datetime['datetime_range'], $pre_option['datetime_range'][$keydate]);
                    }
                }
            }
        }
        $user_all = User::where('id', 5)->get();
        // dd($pre_order);
        // dd($flash_pin);
        // dd($datetime);
        // dd('lnwza');
        // return $category_all;

        $banner = Banner::orderBy('status', 'desc');
        return view('pages.home', $datetime, compact('categories','category_all', 'user_all', 'product_all2', 'product_all3', 'product_reborn', 'cat_01', 'cat_02', 'cat_03', 'cat_04', 'cat_05', 'rating_group', 'flash_pin', 'flash_normal', 'time_end', 'gift','banner'));
        // return view('new_ui.product-new', compact('category_all','product_all','user_all'));
        // return ['category_all' => $category_all, 'product_all' => $product_all, 'user_all' => $user_all];
    }
}
