<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;

use Closure;

class CheckStock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->all());
        $a_inv_no = explode(',', $request->inv_no);
        // echo sizeof($a_inv_no); exit;
        if( sizeof($a_inv_no) == 1 ) {
            $results = DB::table('invs')->where('inv_ref', $request->inv_ref)->when($request->inv_no, function ($query, $ref_no) {
                    return $query->where('inv_no', $ref_no);
                })->get();
        } else {
            $results = DB::table('invs')->where('inv_ref', $request->inv_ref )->when($a_inv_no, function ($query, $ref_no) {
                    return $query->whereIn('inv_no', $ref_no);
                })->get();
        }
        
        // dd($results);
        // dd($results);
        foreach ($results as $index => $result) {
            // dd($result);
            $inv                        = json_decode($result->inv_products);
            // dd($inv);
            foreach ($inv as $indexs => $item) {
                $product_id                 = $inv[$indexs]->product_id;
                // dd($product_id);
                $database = "product_s";
                if ($inv[$indexs]->type == 'flashsale') {
                    $database = "flash_sales";
                }
                if ($inv[$indexs]->type == 'pre_order') {
                    $database = "pre_order";
                }



                if ($database == 'pre_order') {
                    $datas[$indexs]  = DB::table($database)
                        ->where('id', $product_id)
                        ->select('id', 'preOrder_option')->get();
                    $datas[$indexs][0]->option1  = $inv[$indexs]->option1;
                    $datas[$indexs][0]->option2  = $inv[$indexs]->option2;
                    $datas[$indexs][0]->dis1     = $inv[$indexs]->dis1;
                    $datas[$indexs][0]->dis2     = $inv[$indexs]->dis2;
                    $datas[$indexs][0]->amount   = $inv[$indexs]->amount;
                    $datas[$indexs][0]->start_date   = $inv[$indexs]->start_date;
                    $datas[$indexs][0]->end_date   = $inv[$indexs]->end_date;

                    // $datas[$indexs][0]->stock    = dd($inv[$indexs]->stock_key);
                } else {

                    $datas[$indexs]  = DB::table($database)
                        ->where('id', $product_id)
                        ->select('id', 'product_option')->get();

                    // dd($datas[$index]);

                    $datas[$indexs][0]->option1  = $inv[$indexs]->option1;
                    $datas[$indexs][0]->option2  = $inv[$indexs]->option2;
                    $datas[$indexs][0]->dis1     = $inv[$indexs]->dis1;
                    $datas[$indexs][0]->dis2     = $inv[$indexs]->dis2;
                    $datas[$indexs][0]->amount   = $inv[$indexs]->amount;
                    $datas[$indexs][0]->stock_key   = $inv[$indexs]->stock_key;
                }
            }
        }

        foreach ($datas as $datas_index => $data) {
            if (isset($inv[$datas_index]->type) && $inv[$datas_index]->type == 'pre_order') {
                // dd($data);

                $datetime = json_decode($data[0]->preOrder_option)[0]->datetime_range;
                $arr_dis1 = json_decode($data[0]->preOrder_option)[0]->dis1;
                $arr_dis2 = json_decode($data[0]->preOrder_option)[0]->dis2;
                $lengthDis2 = count($arr_dis2);
                $key_dis1 = array_search($data[0]->dis1, $arr_dis1);
                $key_dis2 = array_search($data[0]->dis2, $arr_dis2);
                $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;

                $key_date = array_keys(array_column($datetime, 'start_date'), $data[0]->start_date);
                $stock = $datetime[$key_date[0]]->stock[$stock_key];

                $amount = $data[0]->amount;
                $total_amount = $stock - $amount;
                if ($total_amount < 0) {
                    return redirect()->back()->withErrors(['msg', 'สินค้าไม่เพียงพอต่อคำสั่งซื้อ']);
                }

                // if ($start_date == $start_date_db && $end_date == $end_date_db) {
                //     if ($total_amount > $amount_limite_db) {
                //         return redirect()->back()->withErrors(['msg', 'สินค้าไม่เพียงพอต่อคำสั่งซื้อ']);
                //     }
                // }
                return $next($request);
            } else {
                return $next($request);
                // foreach ($datas as $datas_index => $data) {
                    // dd($data);
                    $stock_key = $data[0]->stock_key;
                    $stock = json_decode($data[0]->product_option)->stock[$stock_key];
                    // if ($data[0]->option1 == null && $data[0]->option2 == null && $data[0]->dis1 == null && $data[0]->dis2 == null) {
                    //     $stock = json_decode($data[0]->product_option)->stock[0];
                    //     dd($stock);
                    // } else {
                    //     if ($data[0]->option1 != null) {
                    //         $stock = json_decode($data[0]->product_option)->stock[0];
                    //         dd($stock);
                    //     } else if ($data[0]->option2 != null) {
                    //         $stock = json_decode($data[0]->product_option)->stock[1];
                    //     } else if ($data[0]->dis1 != null) {
                    //         $stock = json_decode($data[0]->product_option)->stock[0];
                    //     } else if ($data[0]->dis2 != null) {
                    //         $stock = json_decode($data[0]->product_option)->stock[1];
                    //     }
                    // }
                    if ($data[0]->amount > $stock) {
                        return redirect()->back()->withErrors(['msg', 'เกิดข้อผิดพลาดบางอย่าง ไม่สามารถจ่ายเงินได้']);
                    }
                // }
            }
        }

        return $next($request);
    }
}
