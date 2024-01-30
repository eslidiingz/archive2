<?php

namespace App\Http\Controllers\export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Excel;
use App\Exports\ExportUsers;




class userExportController extends Controller
{

    public function shop()
    {
        return Excel::download(new ExportUsers, 'shop_shopteenii.xlsx');
    }
}
