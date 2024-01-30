<?php

namespace App\Http\Controllers\Dashboard;

use App\invs;
use App\Http\Controllers\Controller;
use App\Shops as shops;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function income(Request $request)
    {
        if (isset($request->search)) {
            // dd($request);
            $income = invs::leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
                ->whereIn('invs.status', ['5', '52', '53'])
                ->select('invs.*', 'shops.shop_name')
                ->orderBy('invs.created_at', 'desc');
            
            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $income = $income->where('invs.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $income = $income->where('invs.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'inv_ref' and $val != '') {
                    $income = $income->where('inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'amount_start' and $val != '') {
                    $income = $income->where('invs.total', '>=', $val);
                } elseif ($key == 'amount_end' and $val != '') {
                    $income = $income->where('invs.total', '<=', $val);
                }
            }
            $income = $income->paginate(50)->appends(request()->query());
        } else {
            $income = invs::leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
                ->whereIn('invs.status', ['5', '52', '53'])
                ->select('invs.*', 'shops.shop_name')
                ->orderBy('invs.created_at', 'desc')
                ->paginate(50);
        }
        $o_setting = Setting::first();
        return view('dashboard.income', compact('income','o_setting'));
    }
}
