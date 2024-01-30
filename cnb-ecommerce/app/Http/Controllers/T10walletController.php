<?php

namespace App\Http\Controllers;

use App\T10wallet;
use Illuminate\Http\Request;

class T10walletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t10 = T10wallet::all();
        return response()->json($t10);
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
     * @param  \App\T10wallet  $t10wallet
     * @return \Illuminate\Http\Response
     */
    public function show(T10wallet $t10wallet)
    {
        return view('new_ui.profile_wallet_t10', compact('t10wallet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\T10wallet  $t10wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(T10wallet $t10wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\T10wallet  $t10wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, T10wallet $t10wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\T10wallet  $t10wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(T10wallet $t10wallet)
    {
        //
    }

    public function success($inv_ref)
    {
        dd('success');
    }

    public function falied($inv_ref)
    {
        dd('failed');
    }
}
