<?php

namespace App\Http\Controllers;

use App\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class RatingController extends Controller
{
    public function addRating(Request $request)
    {
        // dd($request->all());
        // array_push($res_productId, $request->product_id);
        $request->validate(
            [
                'rating' => 'required',
            ], 
            [
                'rating.required' => 'ให้คะแนนไม่สำเร็จ! กรุณาระบุคะแนนสินค้า',
            ]
          );

        $res_productId = [];
        $invs_id = intval($request->invs_id);
        $invs_product_id = intval($request->product_id);

        $rating_peview_data = DB::table('invs')
            ->select('rating_peview')
            ->where('id', $invs_id)->first();

        if (empty($rating_peview_data->rating_peview)) {

            $rating_peview = DB::table('invs')
                ->where('id', $invs_id)->first();

            $product_all = DB::table('product_s')
                ->where('id', $invs_product_id)->first();

            $product_flash = DB::table('flash_sales')
                ->where('id', $invs_product_id)->first();

            $rating_product = json_decode($rating_peview->inv_products);

            foreach ($rating_product as $value) {
                if (!isset($value->type)) {
                    if ($product_all->id == $value->product_id) {
                        array_push($res_productId, $request->product_id);
                    }
                } else if ($value->type == 'flashsale') {
                    if ($product_flash->id == $value->product_id) {
                        array_push($res_productId, $request->product_id);
                    }
                }
            }

            $rating = new rating();
            $rating->invs_id = $request->invs_id;
            $rating->product_id = $request->product_id;
            $rating->shop_id = $request->shop_id;
            $rating->user_id = $request->user_id;
            $rating->rating = $request->rating;
            $rating->comment = $request->comment;
            $rating->date = $request->date;
            $rating->status = $request->status;

            if ($request->img_upload != null) {
                $img_upload = json_encode($request->img_upload);
                $rating->picture = $img_upload;
            }

            $rating->save();

            DB::table('invs')
                ->where('id', $invs_id)
                ->update(['rating_peview' => $res_productId[0]]);
        } else {

            $bef_product = explode(',', $rating_peview_data->rating_peview);
            foreach ($bef_product as $value) {
                array_push($res_productId, $value);
            }

            $rating_peview = DB::table('invs')
                ->where('id', $invs_id)->first();

            $product_all = DB::table('product_s')
                ->where('id', $invs_product_id)->first();

            $product_flash = DB::table('flash_sales')
                ->where('id', $invs_product_id)->first();

            $rating_product = json_decode($rating_peview->inv_products);

            foreach ($rating_product as $value) {
                if (!isset($value->type)) {
                    if ($product_all->id == $value->product_id) {
                        array_push($res_productId, $request->product_id);
                    }
                } else if ($value->type == 'flashsale') {
                    if ($product_flash->id == $value->product_id) {
                        array_push($res_productId, $request->product_id);
                    }
                }
            }

            $res_peview = implode(',', $res_productId);
            // dd($res_peview);

            $rating = new rating();
            $rating->invs_id = $request->invs_id;
            $rating->product_id = $request->product_id;
            $rating->shop_id = $request->shop_id;
            $rating->user_id = $request->user_id;
            $rating->rating = $request->rating;
            $rating->comment = $request->comment;
            $rating->date = $request->date;
            $rating->status = $request->status;

            if ($request->img_upload != null) {
                $img_upload = json_encode($request->img_upload);
                $rating->picture = $img_upload;
            }

            $rating->save();
            

            DB::table('invs')
                ->where('id', $invs_id)
                ->update(['rating_peview' => $res_peview]);
        }
        
        return redirect('/profile_my_sale');
    }

    public function addRating_imgupload(Request $request)
    {
        //dd($request);
        // $user_shops = shops::Where('user_id', Auth::user()->id)->first();
        $file = request()->file('file');
        // $filename = str_replace(" ", "", microtime()) . $file->getClientOriginalName();
        if($file){
            $filename = str_replace(" ", "", microtime()) . "_" . Auth::user()->id . "." . $file->getClientOriginalExtension();
            $path     = $request->file('file')->move(public_path('img/rating/'), $filename);
            $photoURL = url('img/rating/' . $filename);
            return response()->json(['uploaded' => $filename]);
        }
        return response()->json(['uploaded' => null]);
    }

    public function confirmProductUser(Request $request)
    {
        // dd("sdsd");
        $shop_user = DB::table('shops')
            ->where("shops_id", $request->shops_id)
            ->get();

        DB::table('invs')->where('id', $request->invs_id)
            ->update([
                'status' => 5
            ]);

        DB::table('balances')->insert([
            'user_id' => $shop_user->user_id,
            'seller_credit' =>  $request->total_price,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        return redirect('/profile_my_sale');
    }
}
