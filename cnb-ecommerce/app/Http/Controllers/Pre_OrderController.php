<?php

namespace App\Http\Controllers;


use App\Category;
use App\PreOrder;
use App\rating;
use App\shops;
use App\invs;
use App\User;
use App\SubCategory;
use Illuminate\Http\Request;

class Pre_OrderController extends Controller
{
    public function index($id)
    {

        $pre_array['datetime_range'] = [];
        $current_time = date('Y-m-d H:i');

        $pre = PreOrder::where('id', $id)->get();
        foreach ($pre as $pre) {
            foreach ($pre->preOrder_option as $pre_details) {
                foreach ($pre_details['datetime_range'] as $date_range) {

                    if ($current_time == $date_range['start_date'] || $current_time >= $date_range['start_date'] && $current_time <= $date_range['end_date']) {
                        array_push($pre_array['datetime_range'], $date_range);
                    }
                }
            }
        }
        $starpercen = 0;
        $shop_id = shops::where('id', $pre->shop_id)->get();

        if(count($pre_array['datetime_range']) > 0){

            $rating = rating::where('product_id', $id)->get();
            if(count($rating) > 0){
                $arr = [];
                foreach($rating as $value){
                    $inv = invs::where('id', $value->invs_id)->first();

                    foreach($inv->inv_products as $item){
                        if($item['product_id'] == $value->product_id){
                            if(!isset($item['type'])){
                                array_push($arr, $value->id);
                            }
                        }
                    }
                }
                $rating_data = rating::whereIn('id', $arr)->orderBy('id', 'desc')->get();
                $user_arr = [];
                foreach($rating_data as $item){
                    if(!in_array($item->user_id, $user_arr)){
                    array_push($user_arr, $item->user_id);
                    }
                }
                $inv_arr = [];
                foreach($rating_data as $item){
                    if(!in_array($item->invs_id, $inv_arr)){
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
                return view("pages.product-detail-preorder", $pre_array, compact('pre', 'shop_id', 'starpercen', 'rating_data', 'rating_count', 'user_data', 'inv_data'));
            }
            else{
                return view("pages.product-detail-preorder", $pre_array, compact('pre', 'shop_id', 'starpercen'));
            }
            return view('pages.error404');
        }
    }



    public function showALLPreOrder()
    {

        $pre_order1 = PreOrder::where('status_goods', 1)->get();
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

        return view('pages.pre_order', $datetime);
    }
}
