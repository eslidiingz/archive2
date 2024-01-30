<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Shops;
use App\PreOrder;
use App\Category;
use App\SubCategory;

use App\Http\Requests\preorderRequest;
use App\Http\Requests\preorderUpdateRequest;

class preorderController extends Controller
{
    public function user_shop()
    {
        $user_shops = shops::Where('user_id', Auth::user()->id)->first();
        return $user_shops;
    }

    public function check_shop()
    {
        $user_shops = $this->user_shop();

        if (!isset($user_shops)) {
            return redirect('welcome');
        }
    }

    public function index(Request $request)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $this->check_shop();
        $user_shops = $this->user_shop();

        $product_pre = PreOrder::where('shop_id', $user_shops->id)->get();

        return view('shop.shop_pre_order', compact('product_pre'));
    }
    public function add(Request $request)
    {
        $other = Category::with('subcategorys')->where('category_name', '=', 'อื่นๆ')->orderBy('category_name', 'ASC')->get();
        $category1 = Category::with('subcategorys')->where('category_name', '!=', 'อื่นๆ')->orderBy('category_name', 'ASC')->get();
        $data['catogorys'] = $category1->push($other[0]);
        return view('shop.shop_pre_order_add', $data);
    }
    public function store(preorderRequest $request)
    {
        // dd($request->all());
        $data['status'] = 'false';
        try {
            $user_shops = $this->user_shop();
            $category = SubCategory::find($request->category);
            $PreOrder = new PreOrder;
            $PreOrder->shop_id = $user_shops->id;
            $PreOrder->name = $request->title;
            $PreOrder->description = $request->detail;
            $PreOrder->category_id = $category->category;
            $PreOrder->sub_category_id = $request->category;
            $PreOrder->preOrder_option = '';
            $PreOrder->product_img = $request->img_upload;
            $PreOrder->status_goods = 1;
            $PreOrder->barcode = $request->barcode;
            $temp = [];

            $temp[0]['sku'] = [null];
            $temp[0]['option1'] = $request->option1;
            $temp[0]['dis1'] = $request->dis1;
            $temp[0]['option2'] = $request->option2;
            $temp[0]['dis2'] = $request->dis2;
            $temp[0]['datetime_range'] = [];
            if (count($request->data) > 0) {
                foreach ($request->data as $key => $value) {
                    if (isset($value['price'])) {
                        // price
                        if ($value['price'] == '' && $value['stock']) {
                            break;
                        }
                        if (!isset($temp[0]['datetime_range'][$key - 1]['price'])) {
                            $temp[0]['datetime_range'][$key - 1]['price'] = [];
                        }
                        array_push($temp[0]['datetime_range'][$key - 1]['price'], $value['price']);
                        // stock + amount_limit
                        if (!isset($temp[0]['datetime_range'][$key - 1]['stock'])) {
                            $temp[0]['datetime_range'][$key - 1]['stock'] = [];
                            $temp[0]['datetime_range'][$key - 1]['amount_limit'] = [];
                        }
                        array_push($temp[0]['datetime_range'][$key - 1]['stock'], $value['stock']);
                        array_push($temp[0]['datetime_range'][$key - 1]['amount_limit'], $value['stock']);

                        // date
                        $temp[0]['datetime_range'][$key - 1]['end_date'] =  date('Y-m-d H:i:s', strtotime($value['end'] . '23:59:59'));
                        $temp[0]['datetime_range'][$key - 1]['start_date'] = date('Y-m-d H:i:s', strtotime($value['start'] . '00:00:00'));
                    } else {
                        foreach ($value as $key_value => $value_value) {
                            if ($key_value !== 'start' && $key_value !== 'end') {
                                if ($value_value != null) {
                                    foreach ($value_value as $key_key_value => $value_value_value) {
                                        $makekey = ($key_value * count($request->dis2)) + ($key_key_value);

                                        $temp[0]['datetime_range'][$key - 1]['price'][$makekey] = $value_value_value['price'];
                                        $temp[0]['datetime_range'][$key - 1]['stock'][$makekey] = $value_value_value['stock'];
                                        $temp[0]['datetime_range'][$key - 1]['amount_limit'][$makekey] = $value_value_value['stock'];
                                    }
                                } else {
                                    return $data;
                                }
                            } else {
                                $temp[0]['datetime_range'][$key - 1]['end_date'] =  date('Y-m-d H:i:s', strtotime($value['end'] . '23:59:59'));
                                $temp[0]['datetime_range'][$key - 1]['start_date'] = date('Y-m-d H:i:s', strtotime($value['start'] . '00:00:00'));
                            }
                        }
                    }
                    // $temp[0]['datetime_range']
                }
                $PreOrder->preOrder_option = $temp;
                // dd($temp);
                if ($PreOrder->save()) {
                    $data['status'] = 'true';
                }
            }
            return $data;
        } catch (Exception $e) {
            return $data;
        }
    }

    public function edit($id)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        $product =  PreOrder::findorfail($id);
        $user_shops = Shops::where('user_id', Auth::user()->id)->first();

        // ------------------------------
        $catogorys = Category::with('subcategorys')->get();

        // $product_catogorys = DB::table('category')->where("category_id", "=", $product->category_id)->get()->toArray();
        // $product_sub = DB::table('sub_category')->where("sub_category_id", "=", $product->sub_category_id)->get()->toArray();
        $category = Category::where("category_id", "=", $product->category_id)->get();
        $sub_category = SubCategory::where("sub_category_id", "=", $product->sub_category_id)->get();
        // dd($category[0]->category_name);
        return view('shop.shop_pre_order_edit',  compact('product', 'user_shops', 'catogorys', 'category', 'sub_category'));
    }

    public function update($id, preorderUpdateRequest $request)
    {
        $data['status'] = 'false';
        try {
            $category = SubCategory::find($request->category);
            $PreOrder = PreOrder::find($id);
            $PreOrder->name = $request->title;
            $PreOrder->description = $request->detail;
            $PreOrder->category_id = $category->category;
            $PreOrder->sub_category_id = $request->category;
            $PreOrder->preOrder_option = '';
            $PreOrder->product_img = $request->img_upload;
            $PreOrder->barcode = $request->barcode;
            $temp = [];
            if (isset($request->sku)) {
                $temp[0]['sku'] = $request->sku;
            } else {
                $temp[0]['sku'] = [null];
            }
            $temp[0]['option1'] = $request->option1;
            $temp[0]['dis1'] = $request->dis1;
            $temp[0]['option2'] = $request->option2;
            $temp[0]['dis2'] = $request->dis2;
            $temp[0]['datetime_range'] = $request->data;
            $PreOrder->preOrder_option = $temp;
            if ($PreOrder->save()) {
                $data['status'] = 'true';
            }
            return $data;
        } catch (Exception $e) {
            return $data;
        }
    }

    public function delete($id)
    {

        // 'status_goods' => '9' คือ ลบ จริงๆ ไม่นำกลับมาขายแล้ว แต่ยังมีข้อมูลอยู่ในฐานข้อมูลอยู่
        PreOrder::find($id)->update([
            'status_goods' => '9'
        ]);
        return "pass";

        // return redirect()->back();
    }
}
