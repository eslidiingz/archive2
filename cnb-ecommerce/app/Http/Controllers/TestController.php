<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxPagination(Request $request)
    {
        $data = Product::paginate(5);

        if ($request->ajax()) {
            return view('pagination_data', compact('data'));
        }

        return view('pagination',compact('data'));
    }
}