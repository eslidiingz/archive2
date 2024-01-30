<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\balance;
use App\invs_wallet;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Transactions;
use App\Mobilebanking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    public function __construct()
    {
    }

    public static function accept(Request $request)
    {
        // dd($request->all());
        $data = '';
        if (auth()->check() && $request->type == "accept") {
            $data = balance::where('user_id', auth()->user()->id)->update([
                'status' => 'appect'
            ]);
        }
        return $data;
    }
    public static function getWallet()
    {
        $data = '';
        if (auth()->check()) {
            $data = balance::where('user_id', auth()->user()->id)->first();
        }
        return $data;
    }

    public function buyWallet(Request $request)
    {

        // dd($request);
        try {

            // dd($request);
            $inv_ref = 'wallet' . date('YmdHis') . auth()->user()->id;
            $insert = invs_wallet::insertGetId([
                'user_id' => auth()->user()->id,
                'inv_ref' => $inv_ref,
                'payment' => $request->type,
                'total' => $request->wallet,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            if ($insert) {
                $data['inv'] = invs_wallet::where('id', $insert)->first();
                $total = number_format($request->wallet, 2, '', '');
                $data['trade_mony'] = $total;
                $user = user::where('id', auth()->user()->id)->first();
                $data['order_first_name'] = $user->name;
                $data['order_email'] = $user->email;
                $pay_type = 'PACA';
                $secure_key = env('TREEPAY_SECURE_KEY');
                $site_cd = env('TREEPAY_SITE_CD');
                $hash_string  = $pay_type . $inv_ref . $total . $site_cd . $secure_key . $user->id;
                $hash_data = hash('sha256', $hash_string);
                $data['pay_type'] = $pay_type;
                $data['site_cd'] = $site_cd;
                $data['hash_data'] = $hash_data;

                return response()->json($data);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
            // echo 'error insert';
        }
    }
    public function getInv(Request $request)
    {
        // dd($request);
        if ($request->inv_ref) {
            $data['inv'] = invs_wallet::where('inv_ref', $request->inv_ref)->first();
            $invs_wallet = invs_wallet::where('inv_ref', $request->inv_ref)->first();
            if ($data['inv']) {
                return view('pages.add_wallet_bank', $data, compact('invs_wallet'));
            }
        }
        return view('pages.error404');
    }

    public function walletupdate(Request $request)
    {
        $image = $request['bank_pic'];
        $extension = $request['bank_pic']->getClientOriginalExtension();
        $bank_script = 'bank_statement' . time() . '.' . $extension;
        $location = public_path('/img/bank_image/') . $bank_script;
        Image::make($image)->save($location);
        $transfer_slip = [
            // "name" => $request->name,
            // "tel" => $request->tel,
            // "amount_price" => $request->amount,
            "date_tranfer" => $request->date_tranfer,
            "time_tranfer" => $request->time_tranfer
        ];


        invs_wallet::where('inv_ref', $request->bank_ref)->update([
            'status' => 12,
            'updated_at' => new DateTime(),
            'transfer_img' => $bank_script,
            'transfer_slip' => $transfer_slip
        ]);

        return redirect("/profile_wallet_t10");
    }



    /////////////////////////////////////////////// qr code ///////////////////////////////////////////////
    public function getQrcode($amount, $note = null)
    {
        // dd(env('T10_APP_TOKEN'));
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('T10_APP_URL_PAYMENT_QRCODE'), [
            'headers' => $headers,
            'json' => [
                "token" => env('T10_APP_TOKEN'),
                "amount" => $amount,
                "note" => $note,
            ]
        ]);

        $http_status_code = $response->getStatusCode();
        $response->getHeaderLine('content-type');
        $response->getBody();
        $contents = json_decode($response->getBody());
        // dd($contents);
        return ($http_status_code == 200) ? $contents : '';
    }

    public function mobilebanking(Request $request)
    {
        // dd($request);
        $basket_all =  invs_wallet::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->first();
        $total = number_format($basket_all->total, 2, '.', '');



        $qrcode = $this->getQrcode($basket_all->total, 'shopteenii payment');
        // dd($headers);
        $mobilebanking = new Mobilebanking();
        $mobilebanking->rawQrCode = $qrcode->rawQrCode;
        $mobilebanking->invoice = $qrcode->invoice;
        $mobilebanking->inv_ref = $request->inv_ref;
        $mobilebanking->save();



        return redirect(route('walletqrcode', ['id' => $mobilebanking->id]));
    }

    public function mobilebankingqrcode($id)
    {

        $mobilebanking = Mobilebanking::where([
            'status' => 0,
            'id' => $id
        ])->get()->first();

        $basket_all =  invs_wallet::where('user_id', Auth::user()->id)->where('inv_ref', $mobilebanking->inv_ref)->first();

        $qr_time_full = date('d/m/Y H:i', strtotime('+48 hour +543 Year', strtotime($mobilebanking['updated_at'])));

        $qrtime = explode(" ", $qr_time_full);

        return view('pages.add_wallet_qr_code', compact('mobilebanking', 'basket_all', 'qrtime'));
    }


    /////////////////////////////////////////////// Wallet show ///////////////////////////////////////////////

    public function show()
    {

        $wallettrans = invs_wallet::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        $wallettrans2 = Transactions::where('user_id', Auth::user()->id)->where('type', 'like', 'wallet%')->orderBy('updated_at', 'desc')->get();
        // $wallet = Transactions::where('type', 'wallet topup')->orderBy('updated_at', 'desc')->get();
        // dd($wallettrans2);
        // dd($wallet);
        return view('pages.profile.profile_wallet_t10', compact('wallettrans', 'wallettrans2'));
    }

    public function connectWallet($wallet)
    {
        DB::beginTransaction();
        try {
            if (!$wallet || !Auth::check()) {
                return Redirect::back();
            }

            $user = User::select('id', 'wallet_address')->withCount('ShopS')->find(Auth::user()->id);

            if (isset($user->wallet_address)) {
                if (!$user->wallet_address) {
                    $user->wallet_address = strtolower(trim($wallet));
                    $user->save();
                } else {
                    if (strtolower(trim($wallet)) !== strtolower($user->wallet_address)) {
                        Session::forget('walletAddress');
                        return Redirect::back()->withErrors(['wallet_message' => 'Please connect another wallet']);
                    }
                }
            }

            Session::put('walletAddress', $wallet ? $wallet : null);
            Session::put('isSeller', isset($user->shop_s_count) && $user->shop_s_count ? true : false);

            DB::commit();
            return Redirect::back();
        } catch (\Exception $e) {
            Session::forget('walletAddress');
            DB::rollBack();
            return Redirect::back();
        }
    }
}
