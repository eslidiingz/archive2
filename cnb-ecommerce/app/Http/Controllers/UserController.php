<?php

namespace App\Http\Controllers;

use App\Address;
use App\Province;
use App\flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\BankMaster;
use App\invs;
use App\Product;
use App\Category;
use App\SubCategory;
use App\PreOrder;
use App\BoxSize;
use App\shipping;
use App\shipping_details;
use App\shipping_type;
use App\Award;
use App\Http\Requests\updatePhone;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Intervention\Image\Facades\Image;

use App\Shops;
use Illuminate\Support\Facades\Hash;
use App\Wishlist;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    // public function login()
    // {
    //     if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    //         $user = Auth::user();
    //         $success['token'] =  $user->createToken('MyApp')->accessToken;
    //         return response()->json(['success' => $success], $this->successStatus);
    //     } else {
    //         return response()->json(['error' => 'Unauthorised'], 401);
    //     }
    // }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'string', 'max:255'],
    //         'surname' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
    //         'phone' => ['required', 'string', 'max:255'],
    //         'password' => ['required', 'string', 'min:8'],
    //         'user_type' => ['required', 'integer', 'max:3'],
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 401);
    //     }

    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('MyApp')->accessToken;
    //     $success['name'] =  $user->name;
    //     return response()->json(['success' => $success], $this->successStatus);
    // }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        try {
            // if (!Session::has('walletAddress') || !Session::get('walletAddress')) {
            //     return redirect(route('welcome'));
            // }

            // $userByWalletAddress = User::where('wallet_address', Session::get('walletAddress'))->first();

            // Auth::login($userByWalletAddress);

            $user = Auth::user();

            if (is_null($user->dateofbirth)) {
                $year = date("Y");
                $month = '01';
                $day = '01';
            } else {
                $yeahtest = explode('-', $user->dateofbirth);
                $year = $yeahtest[0];
                $month = $yeahtest[1];
                $day = $yeahtest[2];
            }

            $data['bank'] = BankMaster::get();
            return view('pages.profile.profile', $data, compact('user', 'year', 'month', 'day'));
        } catch (\Exception $e) {
            return redirect(route('welcome'));
        }
    }

    public function details2()
    {
        $user = Auth::user();
        return view('pages.profile.profile2', compact('user'));



        // $category =  Category::orderBy('category_name','ASC')->get();
        // return view('pages.profile', compact('category'));
    }

    public function details_change_pass()
    {
        if (!isset(Auth::user()->id)) {
            return redirect(route('welcome'));
        }
        $user = Auth::user();

        return view('pages.profile.change_pass', compact('user'));
        // $category =  Category::orderBy('category_name','ASC')->get();
        // return view('pages.profile', compact('category'));
    }

    // public function test()
    // {
    //     $user = University::all();
    //     return view('pages.profile.test', compact('user'));
    // }





    public function updateDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            //'surname' => 'required|string|max:255',
            //'email' => 'required|email|max:255',
            //'phone' => 'required|string|max:255',
            // 'sex'=> 'required|in:male,female,other',
            'user_pic' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10240'],
        ]);
        if ($validator->fails()) {
            // dd("not pass");
            return redirect(route('welcome'));
        }

        $user = User::Where('id', Auth::user()->id)->first();

        if (isset($request['user_pic'])) {
            if ($user->user_pic != "user.svg") {
                @unlink(public_path('/img/profile/') . $user->user_pic);
            }
            $image = $request->file('user_pic');
            $extension = $request['user_pic']->getClientOriginalExtension();
            $user_picture = 'profile_' . time() . '.' . $extension;
            $location = public_path('public/profile/') . $user_picture;
            // echo $location; exit;
            // Image::make($image)->resize(700, 350)->save($location);
            // Image::make($image)->save($location);
            $image->move('img/profile/', $user_picture);
            // $in['picture'] = $kyc_name;
        } else {
            $user_picture = $user->user_pic;
        }
        $space = "-";

        if (is_null($user->dateofbirth)) {
            $year = $request['dateofbirthYear'];
            $month = $request['dateofbirthMonth'];
            $day = $request['dateofbirthDay'];
        } else {
            $yeahtest = explode('-', $user->dateofbirth);
            $year = $yeahtest[0];
            $month = $yeahtest[1];
            $day = $yeahtest[2];
        }

        if (isset($request->dateofbirthYear)) {
            $doy = $request->dateofbirthYear;
        } else {
            $doy = $year;
        }

        if (isset($request->dateofbirthMonth)) {
            $dom = $request->dateofbirthMonth;
        } else {
            $dom = $month;
        }

        if (isset($request->dateofbirthDay)) {
            $dod = $request->dateofbirthDay;
        } else {
            $dod = $day;
        }
        $date = $doy . $space . $dom . $space . $dod;

        // // dd(intval($request->dateofbirthMonth));
        // if (intval($request->dateofbirthMonth) == 0) {
        //     // $Month = substr($request->dateofbirthMonth, 5, 2);
        //     $date = $request->dateofbirthYear . $space . substr($user->dateofbirth, 5, 2) . $space . $request->dateofbirthDay;
        //     // dd("if");
        //     // $dateofbirthMonth = substr($user->dateofbirth, 5, 2);
        //     // dd($date);
        // } else {
        //     // is_string($request->dateofbirthMonth)
        //     // dd(substr($user->dateofbirth, 5, 2));
        //     $date = $request->dateofbirthYear . $space . intval($request->dateofbirthMonth) . $space . $request->dateofbirthDay;
        // }


        // dd(substr($user->dateofbirth, 5, 2));


        $user->update(['name' => $request->name, 'surname' => $request->surname, 'sex' => $request->sex, 'dateofbirth' => $date]);
        // dd($user->sex);
        // $user->email = $request['email'];
        $user->user_pic = $user_picture;

        $user->save();
        if (
            (isset($request->bank) && $request->bank != '') &&
            (isset($request->bankCategory) && $request->bankCategory != '') &&
            (isset($request->bankName) && $request->bankName != '') &&
            (isset($request->bankNumber) && $request->bankNumber != '')
        ) {
            $user->bank_id = $request->bank;
            $user->bank_category = $request->bankCategory;
            $user->bank_name = $request->bankName;
            $user->bank_number = $request->bankNumber;
            $user->save();
        }
        return redirect()->back();
    }

    public function change_phone(updatePhone $request)
    {
        // dd($request->all());
        $check = User::where('phone', $request->p_change)->get();
        if (count($check) > 0) {
            return 'เบอร์โทรศัพท์นี้ถูกใช้งานแล้ว';
        } else {
            $update = User::where('id', Auth::user()->id)->update([
                'phone' => $request->p_change,
            ]);
        }

        if ($update) {
            // return redirect()->back();
            return 'true';
        } else {
            return 'เกิดข้อผิดพลาดบางอย่าง';
        }
    }


    public function change_pass(Request $request)
    {
        // dd($request->all());
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "รหัสผ่านไม่ตรงกับรหัสผ่านเก่า. กรุณาลองใหม่.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "รหัสผ่านเดิมและรหัสผ่านใหม่เหมือนกัน. กรุณาลองใหม่.");
        }

        if (strcmp($request->get('new-password'), $request->get('re-new-password')) != 0) {
            //Current new-pass and re-new-pass must same
            return redirect()->back()->with("error", "รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน. กรุณาลองใหม่.");
        }

        // $validatedData = $request->validate([
        //     'current-password' => 'required',
        //     'new-password' => 'required|string|min:8',
        // ]);
        //Change Password
        $user = Auth::user();

        $user->password = bcrypt($request->get('new-password'));
        $user->save();


        return redirect()->back()->with("success", "เปลี่ยนรหัสผ่านสำเร็จ !");
    }

    public function updateDetailsMobile(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            // 'sex'=> 'required|in:male,female,other',
            'user_pic' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10240'],

        ]);

        if ($validator->fails()) {
            // dd("not pass");
            return redirect(route('welcome'));
        }

        $user = User::Where('id', Auth::user()->id)->first();
        // dd($request);
        if (isset($request['user_pic'])) {

            if ($user->user_pic != "user.svg") {
                @unlink(public_path('/img/profile/') . $user->user_pic);
            }
            $image = $request['user_pic'];
            $extension = $request['user_pic']->getClientOriginalExtension();
            $user_picture = 'profile_' . time() . '.' . $extension;
            $location = public_path('/img/profile/') . $user_picture;
            Image::make($image)->save($location);
        } else {
            $user_picture = $user->user_pic;
        }
        $space = "-";
        $date = $request->dateofbirthYear . $space . $request->dateofbirthMonth . $space . $request->dateofbirthDay;
        // dd($date);
        $user->update(['name' => $request->name, 'surname' => $request->surname, 'email' => $request->email, 'sex' => $request->sex, 'dateofbirth' => $date]);
        // dd($user->sex);

        $user->user_pic = $user_picture;
        // dd($user);
        $user->save();
        return redirect()->back();
    }

    public function kyc_page()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pages.profile.KYC', compact('user'));
    }

    public function kycCheck(Request $request)
    {
        session(['alert' => 'alert']);
        session()->save();

        $user = User::Where('id', Auth::user()->id)->first();
        // dd($request);
        if (isset($request['kyc_pic1'])) {
            if ($user->kyc_pic1 != "kyc.png") {
                @unlink(public_path('/img/profile/kyc') . $user->kyc_pic1);
            }
            if ($request['kyc_pic1'] == null) {
                dd('not');
            }

            $image = $request['kyc_pic1'];
            $extension = $request['kyc_pic1']->getClientOriginalExtension();
            $user_picture1 = 'kyc1_' . time() . '.' . $extension;
            $location1 = public_path('/img/profile/kyc/') . $user_picture1;
            try {
                Image::make($image->getRealPath())->save($location1);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            $user_picture1 = $user->kyc_pic1;
        }

        if (isset($request['kyc_pic2'])) {
            if ($user->kyc_pic2 != "kyc.png") {
                @unlink(public_path('/img/profile/kyc') . $user->kyc_pic2);
            }
            if ($request['kyc_pic2'] == null) {
                dd('not');
            }

            $image = $request['kyc_pic2'];
            $extension = $request['kyc_pic2']->getClientOriginalExtension();
            $user_picture2 = 'kyc2_' . time() . '.' . $extension;
            $location2 = public_path('/img/profile/kyc/') . $user_picture2;
            try {
                Image::make($image->getRealPath())->save($location2);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            $user_picture2 = $user->kyc_pic2;
        }

        $user->kyc_status = '3';
        $user->kyc_pic1 = $user_picture1;
        $user->kyc_pic2 = $user_picture2;

        // dd(redirect()->back());
        $user->save();
        // dd($user_picture);
        // exit;
        return redirect()->back();
    }

    public function status_kyc(Request $request)
    {
        $status = User::where('id', Auth::user()->id)->first();
        // dd($status);

        return view('pages.profile.KYC', compact('status'));
    }

    public function my_sale()
    {
        $paymenttt = [];
        $arr = [];
        $invs = invs::where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->get();
        // dd($invs);
        foreach ($invs as $pay) {
            $shop_id = $pay->shop_id;
            $status = $pay->status;
            // $total = $pay->total;

            foreach ($pay->inv_products as $pay1) {

                $pay1['shop_id'] = $shop_id;
                $pay1['status'] = $status;
                // $pay1['total'] = $total;
                if ($paymenttt) {
                    $status = true;
                    foreach ($paymenttt as  $paymentttkay => $value) {
                        if (($pay1['product_id'] == $value['product_id']) &&
                            ($pay1['dis1'] == $value['dis1']) &&
                            ($pay1['dis2'] == $value['dis2'])
                        ) {
                            $paymenttt[$paymentttkay]['amount'] = intval($value['amount']) + intval($pay1['amount']);
                            $status = false;
                        }
                    }
                    if ($status) {
                        array_push($paymenttt, $pay1);
                        array_push($arr, $pay1['product_id']);
                    }
                } else {
                    array_push($arr, $pay1['product_id']);
                    array_push($paymenttt, $pay1);
                }
                // dd($paymenttt);
            }
        }
        // dd($paymenttt);



        $product = Product::whereIn('id', $arr)->get();
        // dd($product);
        // $shop_id = invs::where('user_id', Auth::user()->id)->select('shop_id','status')->groupBy('shop_id')->orderBy('shop_id', 'desc')->get();
        $shop_id = invs::where('user_id', Auth::user()->id)->select('shop_id', 'status')->orderBy('updated_at', 'DESC')->get();
        // dd($shop_id);


        return view('pages.profile.profile_my_sale', compact('invs', 'product', 'shop_id', 'paymenttt'));
    }



    public function wishList()
    {
        $price_array = [];
        // $wish = Wishlist::where('user_id', Auth::user()->id)->select('shop_id')->orderBy('updated_at', 'DESC')->get();
        // $wish = Wishlist::where('user_id', Auth::user()->id)->select('shop_id')->groupBy('shop_id')->orderBy('updated_at', 'DESC')->get();
        $wish = Wishlist::where('user_id', Auth::user()->id)->select('shop_id')->groupBy('shop_id')->orderBy('shop_id', 'desc')->get();


        // dd($wish);
        // dd($wish);
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        // dd($wishlist);
        foreach ($wishlist as $wishh) {
            // dd($wishh->details_wishlist);
            $Dis1 = $wishh->details_wishlist[0]['dis1'];
            $Dis2 = $wishh->details_wishlist[0]['dis2'];
            $product = Product::where('id', $wishh->product_id)->get();
            $key_dis1 = array_search($Dis1, $product[0]->product_option['dis1']);
            $key_dis2 = array_search($Dis2, $product[0]->product_option['dis2']);
            $lengthDis2 = count($product[0]->product_option['dis2']);
            $stock_key = $key_dis1 * $lengthDis2 + $key_dis2;
            $wishh['stock'] =  $product[0]->product_option['stock'][$stock_key];
        }

        // dd($price_array);
        // $price = Product::where('id',).
        // dd($wishlist);
        return view('pages.profile.profile_user_wishlist', compact('wish', 'wishlist'));
    }

    public function delete_wishlist($id)
    {
        $del = Wishlist::find($id);
        // dd($del);
        $del->delete();
        return redirect()->back();
    }

    public function AllwishlistToBasket(Request $request)
    {
        // dd($request);
        // $product_arr = [];
        foreach ($request['product_id'] as $key => $items) {
            // $product = [];
            // $product['product_id'] = $items;
            // $product['shop_id'] = $request['shop_id'][$key];
            // $product['dis1'] = $request['dis1'][$key];
            // $product['dis2'] = $request['dis2'][$key];
            // $product['amount'] = $request['amount'][$key];
            // $product['price'] = $request['price'][$key];
            // $product['option1'] = $request['option1'][$key];
            // $product['option2'] = $request['option2'][$key];

            if ($request->which_btn == 'ใส่ตะกร้า') {
                $time = new DateTime();
                $basket_allready =  invs::where('user_id', Auth::user()->id)->where('status', 0);
                // return ($basket_allready->get());
                if (count($basket_allready->get()) <= 0) {
                    // dd('if');
                    $inv_ref = $time->format('YmdHis') . Auth::user()->id;
                    $inv_products = ([
                        "product_id" =>   $items,
                        "option1" => $request['option1'][$key],
                        "option2" => $request['option2'][$key],
                        "dis1" =>  $request['dis1'][$key],
                        "dis2" => $request['dis2'][$key],
                        "price" => $request['price'][$key],
                        "amount" => $request['amount'][$key],
                    ]);
                    // dd($inv_products);

                    $sum =  $request['price'][$key] * $request['amount'][$key];
                    invs::create([
                        'inv_ref' => $inv_ref,
                        'user_id' => Auth::user()->id,
                        'shop_id' => $request['shop_id'][$key],
                        'inv_products' => [$inv_products],
                        // 'shipping_cost'=> null,
                        // 'payment'=> '',
                        // 'campaign_id'=> '',
                        // 'shipping_id'=> '',
                        'total' => $sum,
                        'note' => 'test',
                        // 'coupon_id'=>1,
                        'status' => 0,
                        // 'shipping_note'=>'test',
                        'created_at' => $time,
                        // 'updated_at'=> 'test'
                    ]);
                } else {
                    // dd($basket_allready->get());


                    $basket_allready_sameshop = $basket_allready->where('shop_id', $request['shop_id'][$key]);
                    // dd($basket_allready_sameshop);
                    if (count($basket_allready_sameshop->get()) <= 0) {
                        $basket_allready =  invs::where('user_id', Auth::user()->id)->where('status', 0);
                        $inv_products = ([
                            "product_id" =>   $items,
                            "option1" => $request['option1'][$key],
                            "option2" => $request['option2'][$key],
                            "dis1" =>  $request['dis1'][$key],
                            "dis2" => $request['dis2'][$key],
                            "price" => $request['price'][$key],
                            "amount" => $request['amount'][$key],
                        ]);
                        // dd(Auth::user()->id);

                        invs::create([
                            'inv_ref' =>  $basket_allready->get()[0]->inv_ref,
                            'user_id' => Auth::user()->id,
                            'shop_id' =>  $request['shop_id'][$key],
                            'inv_products' => [$inv_products],
                            'total' => $request['price'][$key] * $request['amount'][$key],
                            'note' => 'test',
                            // 'coupon_id'=>1,
                            'status' => 0,
                            // 'shipping_note'=>'test',
                            'created_at' => $time,
                            // 'updated_at'=> 'test'
                        ]);
                    } else {
                        // dd('else else');
                        // dd('else');
                        // $inv_ref = $basket_allready[0]->inv_ref;
                        $inv_products_update = $basket_allready_sameshop->get()[0]->inv_products;
                        // dd($basket_allready[0]->inv_products);
                        $total_update = $basket_allready_sameshop->get()[0]->total + ($request['price'][$key] * $request['amount'][$key]);
                        $inv_products = ([
                            "product_id" =>   $items,
                            "option1" => $request['option1'][$key],
                            "option2" => $request['option2'][$key],
                            "dis1" =>  $request['dis1'][$key],
                            "dis2" => $request['dis2'][$key],
                            "price" => $request['price'][$key],
                            "amount" => $request['amount'][$key],
                        ]);
                        // dd($inv_products_update);
                        array_push($inv_products_update, $inv_products);
                        $basket_allready_sameshop->update([
                            'inv_products' => $inv_products_update,
                            'total' =>  $total_update,
                            'updated_at' => $time
                        ]);
                    }
                }

                $del = Wishlist::find($request['id'][$key]);
                // dd($del);
                $del->delete();

                // dd($request);
                // return redirect()->back();
            } else {
                // return redirect()->back();
            }
        }
        return redirect()->back();
    }



    public function wishlistTobasket(Request $request, $id)
    {
        if ($request->which_btn == 'ใส่ตะกร้า') {
            $time = new DateTime();
            $basket_allready =  invs::where('user_id', Auth::user()->id)->where('status', 0);
            // return ($basket_allready->get());
            if (count($basket_allready->get()) <= 0) {
                // dd('if');
                $inv_ref = $time->format('YmdHis') . Auth::user()->id;
                $inv_products = ([
                    "product_id" => $request->product_id,
                    "option1" => $request->option1,
                    "option2" => $request->option2,
                    "dis1" => $request->dis1,
                    "dis2" => $request->dis2,
                    "price" => $request->price,
                    "amount" => $request->amount
                ]);
                // dd($inv_products);
                $sum = $request->price * $request->amount;
                invs::create([
                    'inv_ref' => $inv_ref,
                    'user_id' => Auth::user()->id,
                    'shop_id' => $request->shop_id,
                    'inv_products' => [$inv_products],
                    // 'shipping_cost'=> null,
                    // 'payment'=> '',
                    // 'campaign_id'=> '',
                    // 'shipping_id'=> '',
                    'total' => $sum,
                    'note' => 'test',
                    // 'coupon_id'=>1,
                    'status' => 0,
                    // 'shipping_note'=>'test',
                    'created_at' => $time,
                    // 'updated_at'=> 'test'
                ]);
            } else {
                // dd($basket_allready->get());
                $basket_allready_sameshop = $basket_allready->where('shop_id', $request->shop_id);
                if (count($basket_allready_sameshop->get()) <= 0) {
                    $basket_allready =  invs::where('user_id', Auth::user()->id)->where('status', 0);
                    $inv_products = ([
                        "product_id" => $request->product_id,
                        "option1" => $request->option1,
                        "option2" => $request->option2,
                        "dis1" => $request->dis1,
                        "dis2" => $request->dis2,
                        "price" => $request->price,
                        "amount" => $request->amount
                    ]);
                    // dd(Auth::user()->id);
                    invs::create([
                        'inv_ref' =>  $basket_allready->get()[0]->inv_ref,
                        'user_id' => Auth::user()->id,
                        'shop_id' => $request->shop_id,
                        'inv_products' => [$inv_products],
                        'total' => $request->price * $request->amount,
                        'note' => 'test',
                        // 'coupon_id'=>1,
                        'status' => 0,
                        // 'shipping_note'=>'test',
                        'created_at' => $time,
                        // 'updated_at'=> 'test'
                    ]);
                } else {
                    // dd('else else');
                    // dd('else');
                    // $inv_ref = $basket_allready[0]->inv_ref;
                    $inv_products_update = $basket_allready_sameshop->get()[0]->inv_products;
                    // dd($basket_allready[0]->inv_products);
                    $total_update = $basket_allready_sameshop->get()[0]->total + ($request->price * $request->amount);
                    $inv_products = ([
                        "product_id" => $request->product_id,
                        "option1" => $request->option1,
                        "option2" => $request->option2,
                        "dis1" => $request->dis1,
                        "dis2" => $request->dis2,
                        "price" => $request->price,
                        "amount" => $request->amount
                    ]);
                    // dd($inv_products_update);
                    array_push($inv_products_update, $inv_products);
                    $basket_allready_sameshop->update([
                        'inv_products' => $inv_products_update,
                        'total' =>  $total_update,
                        'updated_at' => $time
                    ]);
                }
            }

            $del = Wishlist::find($id);
            // dd($del);
            $del->delete();

            // dd($request);
            return redirect()->back();
        } else {
            return redirect()->back();
        }


        return view('pages.basket', compact('basket_all'));
    }






    public function purchase()
    {
        try {
            // if (!Session::has('walletAddress') || !Session::get('walletAddress')) {
            //     return redirect(route('welcome'));
            // }

            // $userByWalletAddress = User::where('wallet_address', Session::get('walletAddress'))->first();

            // Auth::login($userByWalletAddress);

            $product_product_id = [];
            $product_flash_id = [];
            $product_award_id = [];
            $product_pre_id = [];
            $basket_all =  invs::leftJoin('shipping_details','shipping_details.shipde_id','invs.shipping_id')
                ->leftJoin('shipping_type','shipping_type.shipty_id','shipping_details.shipty_id')
                ->where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')
                ->select('invs.*','shipping_type.shipty_name')
                ->get();
            $award = award::where('user_id', Auth::user()->id)->get();
            // dd($basket_all);
            foreach ($basket_all as $value) {
                foreach ($value->inv_products as $value1) {
                    if (isset($value1['type'])) {
                        if ($value1['type'] == 'flashsale') {
                            if (!in_array($value1['product_id'], $product_flash_id)) {
                                array_push($product_flash_id, $value1['product_id']);
                            }
                        } else if ($value1['type'] == 'pre_order') {
                            if (!in_array($value1['product_id'], $product_pre_id)) {
                                array_push($product_pre_id, $value1['product_id']);
                            }
                        }
                    }
                    if (!isset($value1['type'])) {
                        if (!in_array($value1['product_id'], $product_product_id)) {
                            array_push($product_product_id, $value1['product_id']);
                        }
                    }
                }
            }
            foreach ($award as $value) {
                if (!in_array($value['product_id'], $product_award_id)) {
                    array_push($product_award_id, $value['product_id']);
                }
            }

            $product_all = Product::whereIn('id', $product_product_id)->get();
            $product_flash = flash::whereIn('id', $product_flash_id)->get();

            $product_award = flash::whereIn('id', $product_award_id)->get();
            $product_pre = PreOrder::whereIn('id', $product_pre_id)->get();

            $data['user'] = User::select('bank_master.name as bank', 'bank_master.logo as bankLogo', 'users.bank_number as bankNumber', 'users.bank_name as bankName', 'users.bank_category as bankCategory')->leftJoin('bank_master', 'bank_master.id', 'users.bank_id')->where('users.id', Auth::user()->id)->first();

            return view('pages.profile.profile_my_sale', $data, compact('basket_all', 'product_all', 'product_flash', 'award', 'product_award', 'product_pre'));
        } catch (\Exception $e) {
            return redirect(route('welcome'));
        }
    }

    public function GFRegister(Request $request)
    {

        if (isset($request->femail)) {
            $fvalidator = Validator::make($request->all(), [
                'femail' => ['string', 'email', 'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+\.[com|co.th]{2,6}$/', 'max:255', 'unique:users,email']

            ]);

            if ($fvalidator->fails()) {

                $user = User::Where('id', Auth::user()->id)->first();
                // dd($newUser);
                // return Redirect::back()->withErrors($validation)->withInput();
                return view('auth.final-register', compact('user'))->withErrors($fvalidator->errors());
            }
            $user = User::Where('id', Auth::user()->id)->first();
            $user->email = $request->femail;
            $user->save();
        }

        // $validator = $this->validate($request, [
        $validator = Validator::make($request->all(), [
            'final_phone' => ['required', 'string', 'digits:10', 'unique:users,phone'],
            'final_password' => ['required', 'string', 'min:8', 'same:password_confirmation'],
            'i_accept' => ['accepted']
        ]);

        if ($validator->fails()) {

            $user = User::Where('id', Auth::user()->id)->first();
            // dd($newUser);
            // return Redirect::back()->withErrors($validation)->withInput();
            return view('auth.final-register', compact('user'))->withErrors($validator->errors());
        }

        $user = User::Where('id', Auth::user()->id)->first();
        // dd($user);
        $user->phone = $request->final_phone;
        $user->password = Hash::make($request->final_password);
        // dd($user);
        $user->save();
        if (session('fbCallback') != null && session('fbCallback') != '') {
            return redirect(session('fbCallback'));
        } else {
            return redirect('/');
        }
    }

    /*public function repurchase_not_use(Request $request)
    {
        // dd($request->all());

        // dd($payment);
        // $inv = invs::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)
        //     ->where('shop_id', $request->shop_id)->get();



        $payment = [];
        $pro_id_array = [];
        $sum = 0;
        $inv_shop = [];
        $a_shop = [];
        // dd($inv_ref);

        $a_inv_ref = explode('-', $request->inv_ref);
        if( sizeof( $a_inv_ref ) == 1 ) {
            $a_inv_ref[1] = null;
        }
        $invs = invs::where('user_id', Auth::user()->id)->where('inv_ref', $a_inv_ref[0])->when($a_inv_ref[1], function ($query, $ref_no) {
                    return $query->where('inv_no', $ref_no);
                })->get();

        $shop_id = [];
        // foreach ($request->products as $key => $value) {
        //     array_push($shop_id, $key);
        // }

        foreach ($invs as $inv) {
            if (!in_array($inv->shop_id, $inv_shop)) {
                array_push($inv_shop, $inv->shop_id);
                array_push($shop_id, $inv->shop_id);
            }
        }

        // $inv_ref = $invs[0]->inv_ref;

        $r_shop = Shops::whereIn('id', $inv_shop)->get();
        foreach ($r_shop as $k_shop => $v_shop) {
            $a_shop[$v_shop['id']] = $v_shop;
        }

        $inv_ref = $a_inv_ref[0];

        foreach ($invs as $pay) {
            $shop_id_pay = $pay->shop_id;

            foreach ($pay->inv_products as $key => $pay1) {
                $pay1['shop_id'] = $shop_id_pay;
                $pay1['shipty_id'] = $pay->shipty_id;
                //                 if ($payment) {
                //                     $status = true;
                //                     foreach ($payment as  $paymentkey => $value) {
                //                         if (($pay1['product_id'] == $value['product_id']) &&
                //                             ($pay1['dis1'] == $value['dis1']) &&
                //                             ($pay1['dis2'] == $value['dis2'])
                //                         ) {
                //                             $payment[$paymentkey]['amount'] = intval($value['amount']) + intval($pay1['amount']);
                //                             $status = false;
                if (isset($pay1['type'])) {
                    if ($pay1['type'] == 'flashsale') {
                        $data['product_all_flash_sale'] = flash::select('name', 'product_img')->where('id', $pay1['product_id'])->first();
                        $product_flash_sale = flash::select('product_option')->where('id', $pay1['product_id'])->first();

                        if ($payment) {

                            $status = true;
                            foreach ($payment as  $paymentkey => $value) {
                                if (($pay1['product_id'] == $value['product_id']) &&
                                    ($pay1['dis1'] == $value['dis1']) &&
                                    ($pay1['dis2'] == $value['dis2']) &&
                                    ($pay1['type'] == $value['type'])
                                ) {
                                    $payment[$paymentkey]['amount'] = intval($value['amount']) + intval($pay1['amount']);
                                    $status = false;
                                }
                                // dd($sum);

                            }
                            if ($status) {
                                // $pay1['name']
                                array_push($payment, $pay1);
                                array_push($pro_id_array, $pay1['product_id']);
                            }
                        } else {
                            array_push($pro_id_array, $pay1['product_id']);
                            array_push($payment, $pay1);
                        }
                        // dd($payment);
                    }
                } else {
                    if ($payment) {
                        $status = true;
                        foreach ($payment as  $paymentkey => $value) {
                            if (($pay1['product_id'] == $value['product_id']) &&
                                ($pay1['dis1'] == $value['dis1']) &&
                                ($pay1['dis2'] == $value['dis2'])
                            ) {
                                $payment[$paymentkey]['amount'] = intval($value['amount']) + intval($pay1['amount']);
                                $status = false;
                            }
                            // dd($sum);
                        }
                        if ($status) {
                            array_push($payment, $pay1);
                            array_push($pro_id_array, $pay1['product_id']);
                        }
                    } else {
                        array_push($pro_id_array, $pay1['product_id']);
                        array_push($payment, $pay1);
                    }
                }
            }
        }

        foreach ($shop_id as $shop_shippid => $shipp_id) {
            // dd($shipp_id);
            $shipid = shipping::where('shop_id', $shipp_id)->count();
            // dd($shipid);
            if (!$shipid) {
                // dd($shipid);
                shipping::create([
                    'shop_id' => $shipp_id,
                    'ship_default' => 2,
                    'ship_price' => 0.00,
                    'shipde_id' => 0,
                    'shipty_id' => 0,
                ]);
            }
        }





        // คำนวณค่าขนส่งพัสดุ
        $ship = shipping::where('shop_id', $request->shop_id)->get();
        $shipping = [];
        foreach ($ship as $key_ship => $shipp) {
            $shop_id1 = $shipp->shop_id;
            if ($shipp) {
                $shipping[$shop_id1] = explode(',', $ship[$key_ship]->ship_default);
            }
        }






        // Loop สำหรับเก็บ Product_id เพื่อจะไปค้นหาว่าเป็นสินค้าอะไร เช่น ชื่อสินค้า รูปภาพสินค้า
        $total_price = 0;
        $product_invs = [];
        $total_array = [];
        $amount = [];
        foreach ($invs as $inv) {
            foreach ($inv->inv_products as $id) {
                if (!in_array($id['product_id'], $product_invs)) {
                    array_push($product_invs, $id['product_id']);
                    // array_push($amount, $id['amount']);
                    $amount[$id['product_id']] = $id['amount'];
                }
            }

            // dd($inv->total);
            if (!in_array($inv->total, $total_array)) {
                array_push($total_array, $inv->total);
            }
            $total_price = array_sum($total_array);
        }

        $address_default = Address::where('user_id', Auth::user()->id)
                            ->whereRaw('id = (CASE WHEN is_last_ship = "Y" THEN id ELSE (CASE WHEN status = "1" THEN id ELSE null END) END)')
                            ->first();

        $address = Address::where('user_id', Auth::user()->id)->get();

        $weight = [];
        // dd($request->all());
        $product = [];
        $product_id = Product::whereIn('id', $product_invs)->select('id', 'name', 'product_img', 'product_weight', 'shop_id')->get();

        // AUI EDIT 20210810
        foreach ($product_id as $key => $val) {
            if( !isset( $val['product_img'][0] ) ) {
                $product_id[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }

        $flashsale = flash::whereIn('id', $product_invs)->select('id', 'name', 'product_img', 'type')->get();

        $product['product'] = $product_id;
        $product['flashsale'] = $flashsale;

        // dd($product);


        foreach ($product_id as $key_weight => $product_weight) {
            // dd($amount[$product_weight->id]);
            // dd($product_weight);

            $shop_weight = $product_weight->shop_id;
            $weight[$shop_weight][$key_weight] =  $product_weight->product_weight  * $amount[$product_weight->id];
        }
        // dd($weight);
        $total_weight = 0;
        foreach ($weight as $a_key => $a) {
            $total_weight = array_sum($a);
            $weight_shop[$a_key] = array_sum($a);
        }
        foreach ($payment as $pay_flash_sale) {
            // dd($pay_flash_sale['type']);
            $flash_sale = flash::where('id', $pay_flash_sale['product_id'])->where('type', $pay_flash_sale['type'])->get();
            // dd($flash_sale);


            foreach ($flash_sale as $key_weight_flash_sale => $product_weight_flash_sale) {
                // dd($product_weight);
                // dd($amount[$product_weight_flash_sale->id]);

                $shop_weight = $product_weight_flash_sale->shop_id;
                $weight[$shop_weight][$key_weight_flash_sale] =  $product_weight_flash_sale->product_weight  * $amount[$product_weight_flash_sale->id];
            }
            // dd($weight);
            $total_weight = 0;
            foreach ($weight as $a_key => $a) {
                $total_weight = array_sum($a);
                $weight_shop[$a_key] = array_sum($a);
            }
        }


        //////////////////shipping//////////////////

        foreach ($shop_id as $shop_shippid => $shipp_id) {
            // dd($shipp_id);
            $shipid = shipping::where('shop_id', $shipp_id)->first();
            // dd($shipid);
            if (!$shipid) {
                // dd($shipid);
                shipping::create([
                    'shop_id' => $shipp_id,
                    'ship_default' => 2,
                    'ship_price' => 0.00,
                    'shipde_id' => 0,
                    'shipty_id' => 0,
                ]);
            }
            if ($shipid->ship_default == null || $shipid->ship_default == '') {
                $update = shipping::where('ship_id', $shipid->ship_id);
                $update->update([
                    'ship_default' => 2,
                ]);
            }
        }

        $ship = shipping::whereIn('shop_id', $inv_shop)->get();
        $shipping = [];
        // dd($ship);
        // if ($ship->count() > 0) {
        foreach ($ship as $key_ship => $shipp) {
            $shop_id1 = $shipp->shop_id;
            if ($shipp) {
                $shipping[$shop_id1] = explode(',', $ship[$key_ship]->ship_default);
            }
        }

        // dd($shipping);
        // }
        // dd($shipping);
        // dd($weight);
        $ship_type = [];
        $ship_type_db = shipping_type::all();
        foreach ($ship_type_db as $kst => $vst) {
            $ship_type[$vst->shipty_id] = $vst;
        }
        foreach ($ship as $key_ship => $shipp) {
            $shipping[$shipp->shop_id]['ship_name'][1] = $ship_type[1]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][2] = $ship_type[2]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][3] = $ship_type[3]->shipty_name;
        }

        $a_ship_detail = [];
        $r_ship_detail = shipping_details::whereIn('shop_id', $shop_id)->whereIn('shipty_id', array(4,5,6) )
                        ->orWhere(function ($query) {
                            return $query->whereIn('shipty_id', array(1,2,3) )->where('shop_id', '=', 0);
                        })
                        ->get();
        foreach ($r_ship_detail as $k_ship_detail => $v_ship_detail) {
            $a_ship_detail[$v_ship_detail['shop_id']][$v_ship_detail['shipty_id']][] = $v_ship_detail;
        }

        $ship_detail = json_encode($a_ship_detail);
        // $weight_shop = json_encode($weight_shop);
        // dd($ship);

        // ส่วนเพิ่มจากการทำ autofill การจัดส่ง
        $result = [];
        $sort_id = sort($inv_shop);
        // dd($inv_shop);

        $a_province = array();
        $r_province = Province::get();
        if( $r_province ) {
            foreach ($r_province as $key => $val) {
                $a_province[$val->name_th] = $val->region_id;
            }
        }
        // echo '$inv_shop = <pre>';
        // print_r($inv_shop);
        // echo '</pre>'; exit;
        $a_central_prov_ids = array('กรุงเทพมหานคร','นครปฐม','นนทบุรี','สมุทรปราการ','สมุทรสาคร');
        foreach ($inv_shop as $key_def => $val_def) {
            $invs_auto = invs::where('user_id',  Auth::user()->id)->where('inv_ref', $request->inv_ref)->where('inv_no', $a_inv_ref[1])->where('shop_id', $val_def)->where('status', 1);

            $a_shop_addr = Address::where('status_address', '2')
                        ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$val_def.')')
                        ->first();
            // echo $a_shop_addr.' - '.$k_shop_id; exit;
            // echo $k_shop_id.' - '.$a_shop_addr->city.' - '.$address_default->city.'<hr>';
            $s_price_area = 'shipde_price';
            if( in_array($a_shop_addr->city, $a_central_prov_ids) && !in_array($address_default->city, $a_central_prov_ids) ) {
                // echo '1'; exit;
                $s_price_area = 'shipde_price_cross_area';
            } elseif( !in_array($a_shop_addr->city, $a_central_prov_ids) && in_array($address_default->city, $a_central_prov_ids) ) {
                $s_price_area = 'shipde_price_cross_area';
                // echo '2'; exit;
            } elseif( $a_province[$a_shop_addr->city] != $a_province[$address_default->city] ) {
                $s_price_area = 'shipde_price_cross_area';
                // echo '3'; exit;
            }
            // echo '$invs = <pre>';
            // print_r($invs);
            // echo '</pre>'; exit;
            // echo $shop_id; exit;
            if( $invs[0]->shipty_id < 4 ) {
                $i_size = sizeof( $a_ship_detail[0][$invs[0]->shipty_id] );
                $a_ship_detail_auto = $a_ship_detail[0][$invs[0]->shipty_id];
            } else {
                $i_size = sizeof( $a_ship_detail[$val_def][$invs[0]->shipty_id] );
                $a_ship_detail_auto = $a_ship_detail[$val_def][$invs[0]->shipty_id];
            }

            $i_total_weight = $invs[0]->total_weight;
            $i_total_ship_cost = 0;
            // dd($tw);
            // dd($maxp);
            //ฟังก์ชั่น คำนวน น้ำนหัก เมื่อปริมาณน้ำหนักมากกว่า max ของชนส่ง
            if ($i_total_weight > $a_ship_detail_auto[$i_size-1]['shipde_weight']) {

                $round = floor($i_total_weight / $a_ship_detail_auto[$i_size-1]['shipde_weight']);
                // dd($round);

                $i_total_ship_cost = $round * $a_ship_detail_auto[$i_size-1][$s_price_area];
                $i_total_weight = $i_total_weight - ($round * $a_ship_detail_auto[$i_size-1]['shipde_weight']);
            }
            // echo $tw.'<hr>';
            // echo '$a_ship_detail_auto = <pre>';
            // print_r($a_ship_detail_auto);
            // echo '</pre>';
            //ฟังก์ชั่นคำนวนค่าส่ง
            foreach ($a_ship_detail_auto as $ship_de) {

                if ($ship_de->shipde_weight >= $i_total_weight) {
                    $i_price = $ship_de[$s_price_area];

                    // if( $k_shop_id == $ship_de->shop_id ) {
                        $result[$val_def][$invs[0]->shipty_id] = new $ship_de;
                        // echo 'Auto >> '.$k_shop_id.' - '.$k_shipty_id.' - '.$ship_de->shop_id.' - '.$ship_de->shipty_id.' - '.$ship_de->shipde_weight.' - '.$i_total_weight.'<hr>';
                    // }
                    // echo '$ship_de = <pre>';
                    // print_r($ship_de);
                    // echo '</pre>';
                    break;
                }
            }

            $i_total_ship_cost += $i_price;
            // echo $i_total_ship_cost; exit;
            // $result = $i_total_ship_cost;
            //add ค่าส่ง to db
            // echo '$result - <pre>';
            // print_r($result);
            // echo '</pre>'; exit;
            $result[$val_def][$invs[0]->shipty_id]->shipde_price = number_format($i_total_ship_cost, 2, ".", "");
            $result[$val_def][$invs[0]->shipty_id]['s_price_area'] = $s_price_area;
            $result[$val_def][$invs[0]->shipty_id]['shop_city'] = $a_shop_addr->city;
            $result[$val_def][$invs[0]->shipty_id]['cust_city'] = $address_default->city;
            $result[$val_def][$invs[0]->shipty_id]['shipde_id'] = $ship_de->shipde_id;

            $invs_auto->update([
                'shipping_cost' => $i_total_ship_cost,
                'shipping_id' => $result[$val_def][$invs[0]->shipty_id]->shipde_id
            ]);

            // เพิีมค่าส่งในฟังก็ชั่น
            // $result[$val_def][$invs[0]->shipty_id]->shipde_price = number_format($tp, 2, ".", "");
            // $result[$val_def][$invs[0]->shipty_id]->shop_id = $val_def;
            // $weight_shop = json_encode($weight_shop);
            // dd($result);
        }
        // dd($result);
        // return redirect('checkout/bank/?inv_ref='. $request->inv_ref.'&address='.$address[0]->id);
        return view('pages.product-payment', compact('address', 'address_default', 'a_shop', 'invs', 'inv_ref', 'a_inv_ref', 'payment', 'flashsale', 'product', 'product_id', 'total_price', 'ship', 'shipping', 'ship_type', 'ship_detail', 'a_ship_detail_auto', 'weight', 'result'));
    }*/
    public function repurchase(Request $request) {
        // dd($request->all());

        $inv_ref = $request->inv_ref;
        $inv_no = $request->inv_no;

        $cookie = Cookie::get('link');
        if($cookie){
            $cookie_data = json_decode($cookie);
        }
        // dd($cookie);
        // $uid_controller = new uidmpController;
        // $uid_controller->set_uidmp($request->inv_ref);

        $shop_id = [$request->shop_id];
        $a_shop = $a_wh_product = $a_product = $a_inv_product = $a_shipty = [];
        
        $sum = 0;
        $a_plain_abc_range = range("A","Z");
        $s_max_abc = 'A';

        $s_new_max_abc = invs::where('inv_ref', $request->inv_ref)->where('inv_no', $request->inv_no)
            ->whereNotIn('shop_id', $shop_id)
            ->whereNotIn(DB::raw("JSON_UNQUOTE( JSON_EXTRACT(inv_products, '$[0].product_id') )"), $a_wh_product)
            ->max('inv_no');
            // ->max('inv_no'); // ข้อมูลตะกร้า (where 
        // dd($s_new_max_abc);
        if( isset($s_new_max_abc) && $s_new_max_abc != '' ) {
            $i_pos_abc = array_search($s_new_max_abc, $a_plain_abc_range);
            $s_max_abc = $a_plain_abc_range[$i_pos_abc+1];
        }

        // เริ่ม **(function index error กรณีไม่มี ข้อมูลในตะกร้า ให่ประกาศ $total = 0; เพิ่ม)
        // echo $request->inv_ref; exit;
        $old_invs = invs::where('inv_ref', $request->inv_ref)->where('inv_no', $request->inv_no)->whereIn('status', array('1','12','13'))->get(); // ข้อมูลตะกร้า (where เฉพาะร้านค้าจากสินค้าที่ลูกค้าเลือก)

        foreach ($old_invs as $k_inv => $v_inv) {
            // print_r($v_inv); exit;
            // array_push($shop_id, $v_inv['shop_id']);
            foreach ($v_inv->inv_products as $k_product => $v_product) {
                $a_inv_product[$v_inv['shop_id']][$v_product['product_id']] = $v_product;
                array_push($a_wh_product, $v_product['product_id']);
            }
        }
        $a_wh_product = array_unique($a_wh_product);

        $r_product = Product::whereIn('id', $a_wh_product)->whereNotNull('shipty_id')->get();
        foreach ($r_product as $k_product => $v_product) {
            $a_shipty[$v_product['shop_id']][$v_product['shipty_id']][] = $v_product['id'];
            $a_product[$v_product['id']] = $v_product;
        }

        $q_chk_addr = Address::where('user_id', Auth::user()->id)
                            ->where(function ($query) {
                                return $query->where('is_last_ship', '=', 'Y')->orWhere('status', '=', '1');
                            })->exists();
        if( $q_chk_addr ) {
            $o_user_addr = Address::where('user_id', Auth::user()->id)
                                ->where(function ($query) {
                                    return $query->where('is_last_ship', '=', 'Y')->orWhere('status', '=', '1');
                                })
                                ->orderBy('is_last_ship','desc')
                                ->first();
        } else {
            $o_user_addr = Address::where('user_id', Auth::user()->id)
                                ->orderBy('status','desc')
                                ->first();
        }

        $address = Address::where('user_id', Auth::user()->id)->get();

        $a_ship_detail = [];
        $r_ship_detail = shipping_details::orWhere(function ($query) use ($shop_id) {
                            return $query->whereIn('shop_id', $shop_id )->whereIn('shipty_id', array(4,5,6));
                        })
                        ->orWhere(function ($query) {
                            return $query->whereIn('shipty_id', array(1,2,3,7,8,9) )->where('shop_id', '=', 0);
                        })
                        ->orderBy('shipde_weight', 'ASC')
                        ->orderBy('shipde_dimen', 'ASC')
                        ->get();
        foreach ($r_ship_detail as $k_ship_detail => $v_ship_detail) {
            $a_ship_detail[$v_ship_detail['shop_id']][$v_ship_detail['shipty_id']][] = $v_ship_detail;
        }
// echo '<pre>';
// print_r($a_ship_detail);
// echo '</pre>'; exit;
        $ship_detail = json_encode($a_ship_detail);

        // echo '$a_shipty = <pre>';
        // print_r($a_inv_product);
        // print_r($request->amount);
        // print_r($a_shipty);
        // echo '</pre>'; exit;
        
        $abc_range = range($s_max_abc,"Z");
        $new_data = $weight = $a_dimen = $a_amt = $result = array();
        $k_tmp_shipty = $k_tmp_ship_product1 = '';

        $a_province = $a_central_prov = $a_north_prov = $a_en_prov = $a_south_prov = array();
        $r_province = Province::get();
        if( $r_province ) {
            foreach ($r_province as $key => $val) {
                $a_province[$val->name_th] = $val->region_id;
                if( $val->region_id == '1' ) {
                    $a_central_prov[] = $val->name_th;
                } elseif( $val->region_id == '4' ) {
                    $a_north_prov[] = $val->name_th;
                } elseif( $val->region_id == '2' ) {
                    $a_en_prov[] = $val->name_th;
                } elseif( $val->region_id == '3' ) {
                    $a_south_prov[] = $val->name_th;
                }
            }
        }

        $shippingPriceList = $a_shop_ship_weight = [];
        $i_inv_no = 1;
        foreach ($a_shipty as $k_shipty => $v_shipty) {
            foreach ($v_shipty as $k_ship_product1 => $v_ship_shop1) {
                $i_total_ship_cost = 0;
                foreach ($v_ship_shop1 as $k_ship_product => $v_ship_shop) {
                    // echo $k_ship_product.' - '.$v_ship_shop.'<hr>';
                    $sum = 0;
                    foreach ($old_invs as $k_inv => $v_inv) {
                        foreach ($v_inv->inv_products as $k_product => $v_product) {
                            if( $k_shipty == $v_inv['shop_id'] && $v_ship_shop == $v_product['product_id']) {
                                // echo $k_shipty.' - '.$v_inv['shop_id'].' - '.$v_ship_shop.' - '.$v_product['product_id'].' - '.$v_product['amount'].' - '.$v_product['price'].' - '.$k_ship_product1.' >> '.$k_tmp_shipty.' - '.$k_tmp_ship_product1.'<hr>';
                                
                                if( $k_tmp_shipty != $k_shipty || $k_tmp_ship_product1 != $k_ship_product1 ) {
                                    if($cookie){
                                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1] = [
                                            'inv_ref' => $v_inv->inv_ref,
                                            'shop_id' => $v_inv->shop_id,
                                            'inv_products' => [], // WAIT UPDATE
                                            'user_id' => Auth::user()->id,
                                            'shipping_cost' => 0.00, // WAIT UPDATE
                                            'payment' => 'bank',
                                            'campaign_id' => null,
                                            'shipping_id' => null, // WAIT UPDATE
                                            'total' => 0, // WAIT UPDATE
                                            'note' => '',
                                            'coupon_id' => null,
                                            'status' => 0,
                                            'shipping_note' => null,
                                            'updated_at' => new DateTime,
                                            'uidmp' => $cookie_data->uidmp,
                                        ]; // สร้างข้อมูลใหม่ไป insert
                                    }else{
                                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1] = [
                                            'inv_ref' => $v_inv->inv_ref,
                                            'shop_id' => $v_inv->shop_id,
                                            'inv_products' => [],
                                            'user_id' => Auth::user()->id,
                                            'shipping_cost' => 0.00,
                                            'payment' => 'bank',
                                            'campaign_id' => null,
                                            'shipping_id' => null,
                                            'total' => 0,
                                            'note' => '',
                                            'coupon_id' => null,
                                            'status' => 0,
                                            'shipping_note' => null,
                                            'updated_at' => new DateTime,
                                        ]; // สร้างข้อมูลใหม่ไป insert 
                                    }
                                }
                                $k_tmp_shipty = $k_shipty;
                                $k_tmp_ship_product1 = $k_ship_product1;
                                // echo '$new_data = <pre>';
                                // print_r($new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['inv_products']);
                                // echo '</pre>';
                                // echo $k_inv.' - '.$k_shipty.' == '.$k_ship_product.' - '.$k_product2.' == '.$k_ship_product1.' - '.$v_product['product_id'].' - '.$k_ship_product1.'<hr>';
                                
                                if( in_array($v_product['product_id'], $v_ship_shop1) ) {
                                    $val =  $a_inv_product[$v_inv['shop_id']][$v_product['product_id']];
                                    $amount = $a_inv_product[$v_inv['shop_id']][$v_product['product_id']]['amount'];

                                    $lengthDis = count($a_product[$v_product['product_id']]['product_option']['dis2']);
                                    $key_dis1 = array_search(0, $a_product[$v_product['product_id']]['product_option']['dis1']);
                                    $key_dis2 = array_search(0, $a_product[$v_product['product_id']]['product_option']['dis2']);
                                    $stock_key = $key_dis1 * $lengthDis + $key_dis2;
                                    $in_stock = $a_product[$v_product['product_id']]['product_option']['stock'][$stock_key];

                                    if( $amount > $in_stock ) {
                                        return redirect()->back()->withErrors(['msg' => 'ขออภัย สินค้าบางรายการมีจำนวนไม่เพียงพอ']);
                                    }

                                    $val['amount'] = $amount;
                                    $val['dimen'] = ( $a_product[$v_product['product_id']]['product_L'] + $a_product[$v_product['product_id']]['product_W'] + $a_product[$v_product['product_id']]['product_H'] );
                                    $val['weight'] = $a_product[$v_product['product_id']]['product_weight'];

                                    $o_shop_addr = Address::where('status_address', '2')
                                        ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$v_inv->shop_id.')')
                                        ->first();
                                    list($i_ship_price, $o_ship_de) = $this->calShipPrice( $v_product['product_id'], $amount, $val['weight'], $val['dimen'], $k_ship_product1, $o_shop_addr,  $o_user_addr, $a_ship_detail, $a_central_prov, $a_north_prov, $a_en_prov, $a_south_prov, $v_inv->shop_id);
                                    
                                    if(isset($shippingPriceList[$k_shipty][$k_ship_product1])){
                                        $shippingPriceList[$k_shipty][$k_ship_product1] += floatval($i_ship_price);
                                    }else{
                                        $shippingPriceList[$k_shipty][$k_ship_product1] = floatval($i_ship_price);
                                    }
                                    $val['ship_price'] = $i_ship_price;
                                    $i_total_ship_cost += $val['ship_price'];

                                    // echo '1. -> '.$k_inv.' - '.$k_shipty.' == '.$k_ship_product.' - '.$k_product2.' == '.$k_ship_product1.' - '.$v_product['product_id'].' - '.$k_ship_product1.' ship_price = '.$val['ship_price'].'<hr>';

                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['shipty_id'] = $a_product[$v_product['product_id']]['shipty_id'];
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['shipping_cost'] = $i_total_ship_cost;
                                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['shipping_id'] = $k_ship_product1;
                                    
                                    $result[$v_inv->shop_id][$k_ship_product1]['shop_city'] = $o_shop_addr->city;
                                    if( isset( $o_user_addr->city ) ) {
                                        $result[$v_inv->shop_id][$k_ship_product1]['cust_city'] = $o_user_addr->city;
                                    }
                                    if( $o_ship_de ) {
                                        $tempShippingDetail = clone $o_ship_de;
                                        $result[$v_inv->shop_id][$k_ship_product1] = $tempShippingDetail;
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_id'] = $o_ship_de->shipde_id;
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_price'] = number_format($i_total_ship_cost, 2, ".", "");
                                    } else {
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_id'] = 1904;
                                        $result[$v_inv->shop_id][$k_ship_product1]['shipde_price'] = 0;
                                    }
                                    if( !isset( $a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'] ) ) {
                                        $a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'] = 0;
                                    }
                                    $a_shop_ship_weight[$v_inv->shop_id][$k_ship_product1]['weight'] += $a_product[$v_ship_shop]['product_weight'];

                                    //เพิ่มข้อมูล product 1 ชิ้น ลงใน array
                                    array_push($new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['inv_products'], $val);
                                    // รวมราคาสินค้าทั้งหมด
                                    $sum += $val['amount'] * $val['price'];
                                }
                                // END
                            }
                        }
                        // $v_inv->delete();
                        
                    }
                    
                    // echo $k_shipty.'_'.$k_ship_product1.'<hr>';
                    if( !isset($new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['total']) ) {
                        $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['total'] = 0;
                    }
                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['total'] += $sum; //ใส่ราคาผลรวมของร้านค้า
                }
                $o_shop_addr = Address::where('status_address', '2')
                    ->whereRaw('user_id = (SELECT user_id FROM shops WHERE id = '.$v_inv->shop_id.')')
                    ->first();

                $a_shop_ship_weight[$k_shipty]['addr'] = $o_shop_addr->address1.' '.$o_shop_addr->address2.' '.$o_shop_addr->district.' '.$o_shop_addr->county.' '.$o_shop_addr->city.' '.$o_shop_addr->zipcode;
                $a_shop_ship_weight[$k_shipty]['tel'] = $o_shop_addr->tel;
                $a_shop_ship_weight[$k_shipty]['id'] = $o_shop_addr->id;

                $s_inv_ref2 = date('YYmmdd').$v_inv->shop_id.str_pad($i_inv_no, 2, "0", STR_PAD_LEFT);
                $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['inv_ref2'] = $s_inv_ref2;
                // invs::create( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1] );

                // WEIGHT
                if( !isset( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'] ) ) {
                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'] = 0;
                }
                if( !isset( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'] ) ) {
                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'] = 0;
                }
                if( !isset( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'] ) ) {
                    $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'] = 0;
                }
                // echo $k_shipty.'_'.$k_ship_product1.'<hr>';
                $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'] =  $a_product[$v_product['product_id']]['product_weight'];
                $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'] = ( $a_product[$v_product['product_id']]['product_L'] + $a_product[$v_product['product_id']]['product_W'] + $a_product[$v_product['product_id']]['product_H'] );
                $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'] = $amount;
// dd($new_data);
                // invs::create( $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1] );

                if( !isset( $weight[$k_shipty][$k_ship_product1] ) ) {
                    $weight[$k_shipty][$k_ship_product1] = 0;
                }
                if( !isset( $a_dimen[$k_shipty][$k_ship_product1] ) ) {
                    $a_dimen[$k_shipty][$k_ship_product1] = 0;
                }
                if( !isset( $a_amt[$k_shipty][$k_ship_product1] ) ) {
                    $a_amt[$k_shipty][$k_ship_product1] = 0;
                }
                // echo '2. -> $k_shipty = '.$k_shipty.' - $k_ship_product1 = '.$k_ship_product1.' product_id = '.$v_product['product_id'].'<hr>';
                $weight[$k_shipty][$k_ship_product1] += $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['weight'];
                $a_dimen[$k_shipty][$k_ship_product1] += $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['dimen'];
                $a_amt[$k_shipty][$k_ship_product1] += $new_data[$k_shipty.'_'.$k_ship_product1][$k_ship_product1]['amt'];

                $i_inv_no++;
            }
        }
        $weight_shop = json_encode( $weight );
        // echo '$weight = <pre>';
        // print_r($weight);
        // echo '</pre>'; exit;

        $payment = [];
        $sum = 0;
        $inv_shop = [];
        
        $invs = invs::where('user_id', Auth::user()->id)->where('inv_ref', $request->inv_ref)->where('inv_no', $request->inv_no)->whereIn('status', array('1','12','13'))->get();
        foreach ($invs as $inv) {
            if (!in_array($inv->shop_id, $inv_shop)) {
                array_push($inv_shop, $inv->shop_id);
            }
        }
        // dd($invs);
        $r_shop = shops::whereIn('id', $inv_shop)->get();
        foreach ($r_shop as $k_shop => $v_shop) {
            $a_shop[$v_shop['id']] = $v_shop;
        }
        // dd($shop);
        // $abc_range = range("A","Z");
        $abc_offset = 0;
        foreach ($invs as $pay) {
            // $pay->inv_no = $abc_range[$abc_offset];
            // $pay->save();
            // $abc_offset++;

            $shop_id_pay = $pay->shop_id;
// $i_loop = 1;
            foreach ($pay->inv_products as $key => $pay1) {
                // dd($pay1);
                $pay1['shop_id'] = $shop_id_pay;
                $pay1['shipty_id'] = $pay->shipty_id;

                    // echo print_r($payment).'<hr>';
                if ($payment) {
                    // echo $i_loop.'<hr>';
                    // dd($payment);
                    $status = true;
                    foreach ($payment as  $paymentkey => $value) {
                        // echo $value['product_id'];
                        if (($pay1['product_id'] == $value['product_id']) &&
                            ($pay1['dis1'] == $value['dis1']) &&
                            ($pay1['dis2'] == $value['dis2'])
                        ) {
                            $payment[$paymentkey]['amount'] = intval($value['amount']) + intval($pay1['amount']);
                            $status = false;
                        }
                        // dd($sum);

                    }
                    if ($status) {
                        array_push($payment, $pay1);
                    }
                } else {
                    array_push($payment, $pay1);
                }
            }
        }
        
        // Loop สำหรับเก็บ Product_id เพื่อจะไปค้นหาว่าเป็นสินค้าอะไร เช่น ชื่อสินค้า รูปภาพสินค้า
        // dd($invs);
        $total_price = 0;
        $product_invs = [];
        $total_array = [];
        $amount = [];
        foreach ($invs as $inv) {
            foreach ($inv->inv_products as $id) {
                if (!in_array($id['product_id'], $product_invs)) {
                    array_push($product_invs, $id['product_id']);
                    // array_push($amount, $id['amount']);
                    $amount[$id['product_id']] = $id['amount'];
                }
            }

            // dd($inv->total);
            if (!in_array($inv->total, $total_array)) {
                array_push($total_array, $inv->total);
            }
            $total_price = array_sum($total_array);
        }
        // dd($amount);

        $product = [];
        $product_id = $r_product;
        // AUI EDIT 20210810
        foreach ($product_id as $key => $val) {
            if( !isset( $val['product_img'][0] ) ) {
                $product_id[$key]['product_img'] = array('0' => '../no_image.png');
            }
        }
        $preOrder = PreOrder::whereIn('id', $product_invs)->select('id', 'name', 'product_img', 'product_weight', 'shop_id')->get();
        $flashsale = flash::whereIn('id', $product_invs)->select('id', 'name', 'product_img', 'type')->get();

        $product['product'] = $product_id;
        $product['flashsale'] = $flashsale;
        $product['preOrder'] = $preOrder;

        // echo '$inv_shop = <pre>';
        // print_r($inv_shop);
        // echo '</pre>'; exit;

        foreach ($shop_id as $shop_shippid => $shipp_id) {
            // dd($shipp_id);
            $shipid = shipping::where('shop_id', $shipp_id)->first();
            // dd($shipid);
            if (!$shipid) {
                // dd($shipid);
                shipping::create([
                    'shop_id' => $shipp_id,
                    'ship_default' => 1,
                    'ship_price' => 0.00,
                    'shipde_id' => 0,
                    'shipty_id' => 0,
                ]);
            }elseif($shipid->ship_default == null) {
                shipping::where('ship_id', $shipid->ship_id)->update([
                    'ship_default' => 1,
                ]);
            }
        }

        $ship = shipping::whereIn('shop_id', $inv_shop)->get();
        // dd($ship);
        // echo '<pre>';
        // print_r($ship);
        // echo '</pre>'; exit;
        $shipping = [];
        // dd($ship);
        // if ($ship->count() > 0) {
        foreach ($ship as $key_ship => $shipp) {
            $shop_id1 = $shipp->shop_id;
            if ($shipp) {
                $shipping[$shop_id1] = explode(',', $ship[$key_ship]->ship_default);
            }
            $ship_name = json_decode($shipp->ship_name);
            $shipping[$shop_id1]['ship_name'][4] = $shipping[$shop_id1]['ship_name'][5] = $shipping[$shop_id1]['ship_name'][6] = '';
            if( isset($ship_name[0]) ) {
                $shipping[$shop_id1]['ship_name'][4] = $ship_name[0];
            }
            if( isset($ship_name[1]) ) {
                $shipping[$shop_id1]['ship_name'][5] = $ship_name[1];
            }
            if( isset($ship_name[2]) ) {
                $shipping[$shop_id1]['ship_name'][6] = $ship_name[2];
            }
        }
        // dd($invs);
        // }
        // dd($shipping);
        // dd($weight);
        $ship_type = [];
        $ship_type_db = shipping_type::all();
        
        foreach ($ship_type_db as $kst => $vst) {
            $ship_type[$vst->shipty_id] = $vst;
        }
        foreach ($ship as $key_ship => $shipp) {
            $shipping[$shipp->shop_id]['ship_name'][1] = $ship_type[1]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][2] = $ship_type[2]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][3] = $ship_type[3]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][7] = $ship_type[7]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][8] = $ship_type[8]->shipty_name;
            $shipping[$shipp->shop_id]['ship_name'][9] = $ship_type[9]->shipty_name;
        }

        $sort_id = sort($inv_shop);
        // dd($weight);
        
        $a_province = $a_central_prov = $a_north_prov = $a_en_prov = $a_south_prov = array();
        $r_province = Province::get();
        if( $r_province ) {
            foreach ($r_province as $key => $val) {
                $a_province[$val->name_th] = $val->region_id;
                if( $val->region_id == '1' ) {
                    $a_central_prov[] = $val->name_th;
                } elseif( $val->region_id == '4' ) {
                    $a_north_prov[] = $val->name_th;
                } elseif( $val->region_id == '2' ) {
                    $a_en_prov[] = $val->name_th;
                } elseif( $val->region_id == '3' ) {
                    $a_south_prov[] = $val->name_th;
                }
            }
        }
        // exit;
        // echo '$result = <pre>';
        // print_r($result);
        // echo '</pre>'; exit;
        // dd($result);
        $category_all = [];
        $category = Category::get();
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id', $value->category_id)->count();
            if ($value->data_subdets != "[]") {
                $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                $value['data_subdets'] = $sub;
            } else {
                $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
            }
            array_push($category_all, json_decode($value));
        }
        $clear = Cookie::forget('link');
        // dd($invs);
        // return view('pages.product-payment', compact('address', 'address_default', 'shop', 'invs', 'inv_ref', 'payment', 'flashsale', 'product', 'product_id', 'total_price', 'ship', 'shipping', 'ship_type', 'ship_detail', 'ship_detail_weight', 'weight_shop', 'product_flash'));
        return response()->view('pages.product-payment', compact('address', 'o_user_addr', 'a_shop', 'invs', 'inv_ref', 'inv_no', 'payment', 'flashsale', 'product', 'product_id', 'total_price','category_all', 'ship', 'shipping', 'ship_type', 'ship_detail', 'weight', 'result', 'request', 'o_shop_addr','a_shop_ship_weight'))->withcookie($clear);
    }

    public function mappingBoxSizeByProductId($i_product_id)
    {
        $allBoxSizeOfProduct = 3;
        $mappedProductPackagingSize = [];

        $productPackagesInfo = Product::select(
            'box_size_id1',
            'box_size_id2',
            'box_size_id3',
            'box_pack_amt1',
            'box_pack_amt2',
            'box_pack_amt3'
        )->find($i_product_id);
        // dd($productPackagesInfo);
        if ($productPackagesInfo) {
            for ($i = 1; $i <= $allBoxSizeOfProduct; $i++) {
                if (isset($productPackagesInfo->{"box_size_id" . $i}) && !empty($productPackagesInfo->{"box_size_id" . $i})) {
                    $boxDimension = BoxSize::where('id', $productPackagesInfo->{"box_size_id" . $i})->sum('dimen');
                    $mappedProductPackagingSize[] = [
                        'boxSizeId' => $productPackagesInfo->{"box_size_id" . $i},
                        'dimension' => intval($boxDimension),
                        'amountLimit' => $productPackagesInfo->{"box_pack_amt" . $i},
                        'amount' => 0
                    ];
                }
            }
        }

        return $mappedProductPackagingSize;
    }

    public function getMatchPackaging($i_product_id, $amount = 1)
    {
        $amount = !empty($amount) ? intval($amount) : 1;
        $mappedBoxSize = $this->mappingBoxSizeByProductId($i_product_id);
        $packages = [];
        $limitAmountOrderbyIndex = [];

        if (count($mappedBoxSize) && $amount) {
            $balance = $amount;
            foreach ($mappedBoxSize as $boxSize) {
                if ($boxSize['amountLimit']) {
                    $limitAmountOrderbyIndex[] = $boxSize['amountLimit'];
                }
            }
            // dd($limitAmountOrderbyIndex);
            sort($limitAmountOrderbyIndex);

            if ($balance > 0) {
                while ($balance > 0) {
                    $loopLimit = count($limitAmountOrderbyIndex);
                    foreach ($limitAmountOrderbyIndex as $key => $limit) {
                        // echo '<hr>limit - '.$limit.' <= '.$balance.' - ';
                        if ($limit < $balance) {
                            // echo 'loopLimit: '.$loopLimit.' === '.$key.'<hr>';
                            if ($loopLimit === $key + 1) {
                                $newBalance = $limit - $balance;
                                // echo 'Limit: '.$limit.' <= '.$balance.' - ';
                                $balance = abs($newBalance);
                                // echo $newBalance.'<hr>';
                                $mappedBoxSize[$key]['amount'] = $limit;
                                $packages[] = $mappedBoxSize[$key];
                            } else {
                                continue;
                            }
                        } else {
                            // echo 'Else - '.$limit.' - '.$balance.'<hr>';
                            if ($limit == $balance) {
                                $mappedBoxSize[$key]['amount'] = $limit;
                            } else {
                                $mappedBoxSize[$key]['amount'] = $balance;
                            }

                            $packages[] = $mappedBoxSize[$key];
                            $balance = 0;
                            break;
                        }
                    }
                }
            }
        }

        return $packages;
    }

    public function calShipPrice( $i_product_id, $amount = 1, $i_weight, $i_dimen, $i_shipty_id, $o_shop_addr, $o_user_addr, $a_ship_detail, $a_central_prov, $a_north_prov, $a_en_prov, $a_south_prov, $i_shop_id) {
        $packages = $this->getMatchPackaging($i_product_id, $amount);
        // dd($a_ship_detail);
        $s_price_area = 'shipde_price';
        $a_vicinity_prov = array('กรุงเทพมหานคร','นครปฐม','นนทบุรี','ปทุมธานี','สมุทรปราการ','สมุทรสาคร');
        if( $i_shipty_id == '7' ) { // FLASH
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพฯและปริมณฑล ถึง เหนือ, กลาง, ใต้ และ ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_bkk_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ และ ปริมณฑล ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_bkk_to_bkk';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_shop_addr->city, $a_central_prov) && in_array($o_shop_addr->city, $a_central_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคกลาง ภายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_central_in_province';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_shop_addr->city, $a_central_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) && $o_shop_addr->city != $o_user_addr->city ) {
                    // ภาคกลาง ถึง เหนือ, กลาง, ใต้, ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_central_to_other_region';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_shop_addr->city, $a_central_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคกลาง ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_central_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && in_array($o_user_addr->city, $a_en_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคตะวันออกเฉียงเหนือ ภาายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_en_in_province';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && $o_shop_addr->city != $o_user_addr->city && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคตะวันออกเฉียงเหนือ ถึง เหนือ, กลาง, ใต้, ตะวันตกเฉียงเหนือ
                    $s_price_area = 'shipde_en_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคตะวันออกเฉียงเหนือ ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_en_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_south_prov) && in_array($o_user_addr->city, $a_south_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคใต้ ภายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_south_in_province';
                } elseif( in_array($o_shop_addr->city, $a_south_prov) && $o_shop_addr->city != $o_user_addr->city && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคใต้ ถึง เหนือ, กลาง, ใต้, ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_south_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_south_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคใต้ ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_south_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_north_prov) && in_array($o_user_addr->city, $a_north_prov) && $o_shop_addr->city == $o_user_addr->city ) {
                    // ภาคเหนือ ภายในจังหวัดเดียวกัน
                    $s_price_area = 'shipde_north_in_province';
                } elseif( in_array($o_shop_addr->city, $a_north_prov) && $o_shop_addr->city != $o_user_addr->city && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคเหนือ ถึง เหนือ, กลาง, ใต้, ตะวันออกเฉียงเหนือ
                    $s_price_area = 'shipde_north_to_other_region';
                } elseif( in_array($o_shop_addr->city, $a_north_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคเหนือ ถึง กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_north_to_bkk';
                } elseif( in_array($o_shop_addr->city, $a_en_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ภาคตะวันออกเฉียงเหนือ ถึง เหนือ, กลาง, ใต้, ตะวันตกเฉียงเหนือ
                    $s_price_area = 'shipde_en_to_other_region';
                }
            }
        } elseif( $i_shipty_id == '8' ) { // J&T
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price';
                } elseif( !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price_cross_area';
                }
            }
        } elseif( $i_shipty_id == '9' ) { // Best Express
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_bkk_to_vicinity';
                } elseif( $o_shop_addr->city == 'กรุงเทพมหานคร' && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ ถึงต่างจังหวัด
                    $s_price_area = 'shipde_bkk_to_other_region';
                } elseif( $o_shop_addr->city == $o_user_addr->city ) {
                    // ภายในจังหวัด
                    $s_price_area = 'shipde_within_province';
                } elseif( $o_shop_addr->city != 'กรุงเทพมหานคร' && $o_user_addr->city == 'กรุงเทพมหานคร' ) {
                    // ต่างจังหวัด ถึง กรุงเทพ
                    $s_price_area = 'shipde_province_to_bkk';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ต่างจังหวัด ถึง ต่างจังหวัด
                    $s_price_area = 'shipde_province_to_province';
                }
            }
        } elseif( $i_shipty_id == '4' || $i_shipty_id == '5' || $i_shipty_id == '6' ) { // Self Shipping
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ และ ปริมณฑล
                    $s_price_area = 'shipde_price';
                } elseif( in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // กรุงเทพ ถึงต่างจังหวัด
                    $s_price_area = 'shipde_price_cross_area';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ต่างจังหวัด ถึง กรุงเทพ
                    $s_price_area = 'shipde_price_cross_area';
                } elseif( !in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    // ต่างจังหวัด ถึง ต่างจังหวัด
                    $s_price_area = 'shipde_price_cross_area';
                } else {
                    $s_price_area = 'shipde_price';
                }
            }
        } else {
            if( isset( $o_user_addr->city ) ) {
                if( in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price';
                } elseif( in_array($o_shop_addr->city, $a_vicinity_prov) && !in_array($o_user_addr->city, $a_vicinity_prov) || !in_array($o_shop_addr->city, $a_vicinity_prov) && in_array($o_user_addr->city, $a_vicinity_prov) ) {
                    $s_price_area = 'shipde_price_cross_area';
                } elseif( $a_province[$o_shop_addr->city] != $a_province[$o_user_addr->city] ) {
                    $s_price_area = 'shipde_price_uptown';
                }
            }
        }
        // echo $s_price_area.' - '.$o_shop_addr->city.' - '.$o_user_addr->city.' - '.(!in_array($o_shop_addr->city, $a_vicinity_prov)).' && '.(in_array($o_shop_addr->city, $a_central_prov)).' && '.(in_array($o_user_addr->city, $a_vicinity_prov)).'<hr>';
        // exit;

        $a_ship_detail_auto = [];
        if( $i_shipty_id < 4 || $i_shipty_id > 6 ) {
            $i_size = sizeof( $a_ship_detail[0][$i_shipty_id] );
            $a_ship_detail_auto = $a_ship_detail[0][$i_shipty_id];
        } else {
            $i_size = sizeof( $a_ship_detail[$i_shop_id][$i_shipty_id] );
            $a_ship_detail_auto = $a_ship_detail[$i_shop_id][$i_shipty_id];
        }

        // dd($a_ship_detail_auto);
        //ฟังก์ชั่น คำนวน น้ำนหัก เมื่อปริมาณน้ำหนักมากกว่า max ของชนส่ง --
        if ($i_weight > $a_ship_detail_auto[$i_size-1]['shipde_weight'] && $i_dimen > $a_ship_detail_auto[$i_size-1]['shipde_dimen']) {

            $round = floor($i_weight / $a_ship_detail_auto[$i_size-1]['shipde_weight']);
            // echo '$round > '.$round; exit;

            $i_total_ship_cost = $round * $a_ship_detail_auto[$i_size-1][$s_price_area];
            $i_weight = $i_weight - ($round * $a_ship_detail_auto[$i_size-1]['shipde_weight']);
        }

        //ฟังก์ชั่นคำนวนค่าส่ง
        $i_price = 0;
        $o_ship_de = null;
        $i_start = 1;
        foreach($packages as $package){
            foreach($a_ship_detail_auto as $ship_de){
                if( $ship_de->shipty_id >=4 && $ship_de->shipty_id <= 6 ) {
                    $ship_de->shipde_dimen = 999;
                }
                // echo $ship_de->shipde_weight.' - '.$i_weight.' - '.$package['amount'].' Dimen= '.$ship_de->shipde_dimen.' - '.$package['dimension'].' == '.$ship_de[$s_price_area].' - '.$s_price_area.'<hr>';
                if( $i_start == 1 ) {
                    if( $ship_de->shipde_dimen < $package['dimension'] ) {
                        $i_price = $ship_de[$s_price_area];
                        $o_ship_de = $ship_de;
                        $i_start++;
                        break;
                    }
                }
                // echo $ship_de->shipde_weight.' - '.$i_weight.' - '.$package['amount'].' - '.$ship_de->shipde_dimen.' - '.$package['dimension'].' == '.$ship_de[$s_price_area].'<hr>';
                if($ship_de->shipde_weight >= ($i_weight * $package['amount']) && $ship_de->shipde_dimen >= $package['dimension']){
                    $i_price = $ship_de[$s_price_area];
                    $o_ship_de = $ship_de;
                    break;
                }
            }
        }
// echo $i_price; exit;
        $i_price = $i_price ? $i_price : 0;

        // dd(array($i_price, $o_ship_de));
        return array($i_price, $o_ship_de);
        // return $i_price;
    }

    public function salesListDetail($inv_ref)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('/');
        }
        // $this->check_shop();
        // dd($this->check_shop());
        // $user_shops = $this->user_shop();
        // dd($inv_ref);
        $a_inv_ref = explode('-', $inv_ref);
        if (sizeof($a_inv_ref) == 1) {
            $a_inv_ref[1] = null;
        }
        $basket_all =  invs::leftJoin('inv_cancels', 'inv_cancels.inv_id', '=', 'invs.id')
            ->where('inv_ref', $a_inv_ref[0])->when($a_inv_ref[1], function ($query, $ref_no) {
                return $query->where('inv_no', $ref_no);
            })
            ->select('invs.*', 'inv_cancels.description')
            ->get();
        // dd($basket_all);
        // $invref = invs::where('shop_id', $user_shops->id)->get();
        if (!isset($basket_all[0]->shipping_id) && $basket_all[0]->shipping_id == null) {
            $shipping_details = "";
            $checkLogis = "";
        } else {
            $shipping_details = shipping_details::where('shipde_id', $basket_all[0]->shipping_id)->select('shipde_price', 'shipty_id')->get();
            $checkLogis = shipping_type::where('shipty_id', $shipping_details[0]->shipty_id)->first();
        }

        $product_product_id = [];
        $product_flash_id = [];
        $basket = [];
        $address = [];
        foreach ($basket_all as $bas) {
            // dd($bas);
            foreach ($bas->inv_products as $inv_product) {

                if ($basket) {
                    $status = true;

                    foreach ($basket as  $paymentkey => $value) {
                        if (($bas['product_id'] == $value['product_id']) &&
                            ($bas['dis1'] == $value['dis1']) &&
                            ($bas['dis2'] == $value['dis2'])
                        ) {
                            $basket[$paymentkey]['amount'] = intval($value['amount']) + intval($bas['amount']);
                            $status = false;
                        }
                    }
                    if ($status) {
                        array_push($basket, $inv_product);
                    }
                } else {
                    array_push($basket, $inv_product);
                }
            }
            //Loop for get Address like JSON
            if ($bas->address != null) {
                foreach ($bas->address as $address_inv) {
                    array_push($address, $address_inv);
                }
            } else {
                array_push($address, 'ไม่มีที่อยู่');
            }
        }
        // dd($address);


        // Get email from buyer
        $emailUser = User::where('id', $basket_all[0]->user_id)->first();
        // $str = preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/', $emailUser->email);


        //Loop for Product_id for search in Product Table
        foreach ($basket_all as $value) {
            foreach ($value->inv_products as $value1) {

                if (isset($value1['type'])) {
                    if ($value1['type'] == 'flashsale') {
                        if (!in_array($value1['product_id'], $product_flash_id)) {
                            array_push($product_flash_id, $value1['product_id']);
                        }
                    }
                } else {
                    if (!in_array($value1['product_id'], $product_product_id)) {
                        array_push($product_product_id, $value1['product_id']);
                    }
                }
                // if ($value1['type'] == null) {
                //     if (!in_array($value1['product_id'], $product_product_id)) {
                //         array_push($product_product_id, $value1['product_id']);
                //     }
                // }
                // if ($value1['type'] == 'flashsale') {
                //     if (!in_array($value1['product_id'], $product_flash_id)) {
                //         array_push($product_flash_id, $value1['product_id']);
                //     }
                // }
            }
        }
        $product = Product::whereIn('id', $product_product_id)->get();
        $product_flash = flash::whereIn('id', $product_flash_id)->get();

        $track = invs::where('inv_ref', $basket_all[0]['inv_ref'])->where('shop_id', $basket_all[0]['shop_id'])->first();



        return view('pages.profile.profile_my_sale_detail', compact('checkLogis', 'basket', 'basket_all', 'shipping_details', 'product', 'product_flash', 'emailUser', 'address', 'track'));
    }
}
