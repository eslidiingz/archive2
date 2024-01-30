<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\inv_cancel;
use App\invs;
use Auth;
use DB;

use App\Http\Controllers\admin\HomeController as AdminHC;
use App\log;

class ShopCancelController extends Controller
{
    public function getContent(Request $request, $id)
    {
        DB::table('inv_cancels')
            ->where('inv_id', $id)
            ->delete();
        $cancel_inv = invs::where('id', $id)->first();
        // dd($request->all());
        $address = inv_cancel::create([
            'inv_id' => $id,
            'type' => $request['typeSelect'],
            'user_id' => $cancel_inv->user_id,
            'shop_id' => $cancel_inv->shop_id,
            'status' => 0,
            'shop_approve' => 1,
            'cancel_pic' => $request['pic'],
            'description' => $request['note'],
        ]);
        
        $update_invs = invs::where('id', $id)->update([
            'status' => 6,
            'cancel_by' => 'SHOP'
        ]);

        $cancel_inv->status = 6;
        $cancel_inv->cancel_by = 'SHOP';
        // dd($cancel_inv->status);
        $cancel_inv->save();


        //สร้าง log
        log::insert([
            'user_id' => Auth::user()->id,
            'parent_id' => $id,
            'type'=>'invs_cancel',
            'note'=> 'invs cancel by shops '.$cancel_inv->inv_ref,
            'ip'=> AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('/shop/sales-list');
    }}
