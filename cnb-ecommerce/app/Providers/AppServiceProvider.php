<?php

namespace App\Providers;

use App\Http\Controllers\admin\KycController;
use App\invs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\WalletController as WalletController;
use App\Http\Controllers\NotificationController as Noti;
use App\Kyc;
use App\Product;
use App\Province;
use App\inv_cancel;
use App\withdrow;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') == 'production') {
            URL::forceScheme('https');
        }else{
            URL::forceScheme('http');
        }
        // View::share(
        //     'sum_views',
        //     Product::avg('view_cnt'),
        //     'sum_solds',
        //     Product::avg('sold_amt'),
        // );

        view()->composer('*', function ($view) {
            $data['locale'] = Session::get('locale');

            if (Auth::check()) {
                $data['basket_badges'] = 0;
                $basket = invs::where('user_id', Auth::user()->id)->where('status', 0)->get();

                foreach ($basket as $key => $value) {
                    foreach ($value->inv_products as $inv_pro) {
                        $data['basket_badges'] = $data['basket_badges'] + $inv_pro['amount'];
                    }
                }
                if ($data['basket_badges'] == 0) {
                    $data['basket_badges'] = '';
                }
                $data['wallet'] = WalletController::getWallet();
                $data['notification'] = Noti::getNoti(10);

                $data['count1'] = invs::where('user_id', Auth::user()->id)
                    ->whereIn('status', [1, 12, 13, 21])
                    ->count();
                $data['count2'] = invs::where('user_id', Auth::user()->id)
                    ->where('status', 2)
                    ->count();
                $data['count34'] = invs::where('user_id', Auth::user()->id)
                    ->whereIn('status', [3, 4, 43])
                    ->count();
                $data['count5'] = invs::where('user_id', Auth::user()->id)
                ->whereIn('status', [5,52,53,54])
                ->count();
                // $data['sum_views'] = Product::avg('view_cnt');
                // $data['sum_solds'] = Product::avg('sold_amt');
                // dd($basket_badges);

                $data['kyc'] = Kyc::where('user_id', Auth::user()->id)->get();
            }
            if( Auth::guard('admin')->user() !== null ) {
                // COUNT ADMIN MENU TO DO
                if( Auth::guard('admin')->user()->type == 'superadmin' || Auth::guard('admin')->user()->type == 'admin' ) {
                    $data['i_kyc_count'] = Kyc::join('users', 'users.id', '=', 'kyc_m.user_id')->where('status_second','2')->count();

                    $i_report_order_cnt = 0;
                    $a_tmp_report_order = invs::with('logs')->whereNotIn('invs.status', ['1', '0', '12', '13', '21', '99'])->get();
                    foreach ($a_tmp_report_order as $key => $val) {
                        $a_log = $val->logs->first();
                        if( !$a_log || ($a_log && $a_log->status == '0') ) {
                            $i_report_order_cnt++;
                        }
                    }
                    $data['i_report_order_cnt'] = $i_report_order_cnt;

                    $data['i_cancel_by_shop_cnt'] = Inv_cancel::leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')->where('inv_cancels.status','=','0')->where('invs.cancel_by','=','SHOP')->count();

                    $data['i_cancel_by_cust_cnt'] = Inv_cancel::leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')->where('inv_cancels.status','=','0')->where('invs.cancel_by','=','CUSTOMER')->count();
                    $data['i_withdraw_payment_cnt'] = $user_withdraw = withdrow::where('withdrows.status','=','1')->count();
                    $data['i_approve_transfer_cnt'] = invs::whereIn('invs.payment', ['bank', 'mobilebanking', 'credit'])->where('status','=','12')->count();
                }
                $view->with($data);
            } else {
                $view->with($data);
            }
        });
        view()->composer('*', function ($view) {
            $data['sum_views'] = Product::avg('view_cnt');
            $data['sum_solds'] = Product::avg('sold_amt');

            $data['o_province'] = Province::orderBy('name_th','asc')->get();
            // dd($data['kyc']);
            $view->with($data);
        });
    }
}
