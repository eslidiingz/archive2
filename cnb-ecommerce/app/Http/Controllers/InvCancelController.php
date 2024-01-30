<?php

namespace App\Http\Controllers;

use App\inv_cancel;
use Illuminate\Http\Request;
use App\invs;
use Auth;
use DB;
use Intervention\Image\Facades\Image;

use App\Http\Controllers\admin\HomeController as AdminHC;
use App\log;

class InvCancelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inv_cancel  $inv_cancel
     * @return \Illuminate\Http\Response
     */
    public function show(inv_cancel $inv_cancel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inv_cancel  $inv_cancel
     * @return \Illuminate\Http\Response
     */
    public function edit(inv_cancel $inv_cancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inv_cancel  $inv_cancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inv_cancel $inv_cancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inv_cancel  $inv_cancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(inv_cancel $inv_cancel)
    {
        //
    }

    public function cancel($id)
    {
        // DB::table('inv_cancels')
        // ->where('inv_id', $user_shops->id)
        // ->where('shipty_id', $dataAdd->shipty_id)
        // ->delete();
        //
        $cancel_inv = invs::where('id', $id)->first();
        // dd($cancel_inv);
        // dd($cancel_inv->status);
        $ninvs = $cancel_inv->inv_ref ."C";
        $cancel_inv->status = 99;
        $cancel_inv->cancel_by = 'CUSTOMER';
        $cancel_inv->inv_ref = $ninvs;
        // dd($cancel_inv->status);
        $cancel_inv->save();

        inv_cancel::insert([
            'inv_id' => $id,
            'type' => 99,
            'user_id' => Auth::user()->id,
            'shop_id' => $cancel_inv->shop_id,
            'status' => 0,
            'user_approve' => 1,
            'description' => 'ลูกค้าขอยกเลิก ยังไม่โอนเงิน',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        
        log::insert([
            'user_id' => $cancel_inv->user_id,
            'parent_id' => $id,
            'type'=>'invs_cancel',
            'note'=> 'invs cancel by user '.$cancel_inv->inv_ref,
            'ip'=> AdminHC::getUserIP(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/profile_my_sale');
    }

    public function getContent(Request $request, $id)
    {
        DB::table('inv_cancels')
            ->where('inv_id', $id)
            ->delete();
        $cancel_inv = invs::where('id', $id)->first();
        if (isset($request['pic'])) {

            $image = $request['pic'];
            $extension = $request['pic']->getClientOriginalExtension();
            $picture = 'cancel_' . time() . '.' . $extension;
            //$location = public_path('/img/inv_cancel/') . $user_picture;
            $location = 'img/inv_cancel/' . $picture;
            //Image::make($image)->save($location);
            $path = public_path('img/inv_cancel/' . $picture);
            Image::make($image->getRealPath())->save($path);
        }
        $address = inv_cancel::create([
            'inv_id' => $id,
            'type' => $request['typeSelect'],
            'user_id' => Auth::user()->id,
            'shop_id' => $cancel_inv->shop_id,
            'status' => 0,
            'user_approve' => 1,
            'cancel_pic' => $request['pic'],
            'description' => $request['note'],
        ]);

        $cancel_inv->status = 6;
        $cancel_inv->cancel_by = 'CUSTOMER';
        // dd($cancel_inv->status);
        $cancel_inv->save();

        return redirect('/profile_my_sale');
    }
    public function updateContent(Request $request, $id)
    {
        if (isset($request['pic'])) {
            $case = inv_cancel::Where('id', $id)->first();
            if (!isset($case->cancel_pic)) {
                @unlink(public_path('/img/inv_cancel/') . $case->cancel_pic);
            }
            $image = $request['pic'];
            $extension = $request['pic']->getClientOriginalExtension();
            $picture = 'cancel_' . time() . '.' . $extension;
            //$location = public_path('/img/inv_cancel/') . $user_picture;
            $location = 'img/inv_cancel/' . $picture;
            //Image::make($image)->save($location);
            $path = public_path('img/inv_cancel/' . $picture);
            Image::make($image->getRealPath())->save($path);
        }
        // dd($request['typeSelect']);
        $address = inv_cancel::where('inv_id', $id)->update([
            'type' => $request['typeSelect'],
            'cancel_pic' => $request['pic'],
            'description' => $request['note'],

        ]);

        return redirect('profile\purchase');
    }
}
