<?php

namespace App\Http\Controllers;

use App\flash;
use App\PreOrder;
use App\Product;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function barcode(Request $request){

        $data = [];
        $barcode = $request->barcode;
        $data['product'] = Product::where('barcode',$barcode)->where('status_goods', '1')->get();
        $data['pre_order'] = PreOrder::where('barcode',$barcode)->where('status_goods', '1')->get();

        // dd($data['product']);
        return $data;

    }
}
