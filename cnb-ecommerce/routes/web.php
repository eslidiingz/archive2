<?php

use App\Http\Controllers\admin\KycUserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\shop\ShopController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Web3\Web3LoginController;
use App\Models\Market\Asset;
use App\Models\Market\Project;
use App\Product;
use Illuminate\Support\Facades\Route;
use App\User;
// use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;

if (env('APP_ENV') == 'production') {
    URL::forceScheme('https');
} else {
    URL::forceScheme('http');
}

//fixed old weight shipping
Route::get('/fixedNewShipping', 'shop\ShopController@fixedNewShipping');
Route::get('/fixedNewShipping1', 'shop\ShopController@fixedNewShipping1');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/pagination', 'TestController@index');
// Route::get('pagination/fetch_data', 'TestController@fetch_data');
Route::get('/updateWithdraw', 'uidmpController@update_withdraw');
Route::get('/updateShopRef', 'uidmpController@update_ref');
Route::post('/sendMail', 'ResetPasswordController@sendMail');
Route::post('/sendOtp', 'ResetPasswordController@getOtp');
Route::post('/verifyOtp', 'ResetPasswordController@verifyOtp');
Route::get('/reset-password', 'ResetPasswordController@reset_password');
Route::post('/update-password', 'ResetPasswordController@update_password');


// redirect( path: front )
//redirect()->route(path from name)
Route::any('/login2', 'Auth\Login2Controller@login2')->name('login2');

Route::get('/', 'WelcomeController@index')->name('welcome');

// Route::get('/', 'HomeController@index')->name('index');
Route::get('category', 'CategoryController@index');
Route::get('product/{id}', 'ProductController@index');
Route::get('flash-sale/{id}', 'ProductController@flash_sale');
Route::get('product-detail-preorder/{id}', 'Pre_OrderController@index');
Route::get('/pre_order', 'Pre_OrderController@showALLPreOrder');

Route::get('product_all', 'ProductController@product_all');
Route::get('shop-search-all', 'ProductController@shop_search_all');
Route::get('basket', 'BasketController@index')->middleware('auth');
Route::get('basket/add', 'BasketController@add')->name('basket');
Route::post('basket/delete', 'BasketController@delete');
Route::post('coupon/check', 'BasketController@chkCoupon');

Route::get('addToCart/{id}', 'BasketController@addToCart')->name('add.to.cart');


Route::get('product-barcode', function () {
    return view('pages.product-barcode');
});



Route::get('/product-payment', 'BasketController@bills');
Route::get('/product-payment/getshipping', 'BasketController@getShipping');
Route::post('/product-payment/visa', 'BasketController@product_paymentVISA');
Route::post('/payment/visa', 'BasketController@bank')->name('product-payment-visa');

// Route::post('basket/delete', 'BasketController@deleteProduct');
// Route::get('basket/delete/{inv_ref}/{index}/{shop_id}', 'BasketController@delete');
// Route::get('checkout', 'BasketController@checkout');
// Route::post('checkout', 'BasketController@bills');
// Route::post('/product-payment', 'BasketController@payment_transfer');


Route::get('checkout/bank', 'BasketController@bank')->middleware('checkstock');
Route::post('/bank/update', 'BasketController@bank_update')->name('bank-update');
Route::get('checkout/bank/credit/{inv_ref}', 'BasketController@credit')->middleware('checkstock');

Route::any('checkout/bank/mobilebanking/return', 'QRPaymentController@mobilebankingreturn');
Route::any('checkout/bank/mobilebanking/confirm', 'QRPaymentController@mobilebankingconfirm');
Route::get('checkout/bank/mobilebanking/{inv_ref}', 'QRPaymentController@mobilebanking')->middleware('checkstock');
Route::get('checkout/bank/mobilebanking/qrcode/{id}', 'QRPaymentController@mobilebankingqrcode')->name('mobilebankingqrcode');
Route::get('checkout/bank/mobilebanking/pullslip/{id}', 'QRPaymentController@mobilebankingpullslip')->name('mobilebankingpullslip');

// Route::get('checkout/bank/mobilebanking/{inv_ref}', 'BasketController@mobilebanking')->middleware('checkstock');
// Route::get('checkout/bank/mobilebanking/qrcode/{id}', 'BasketController@mobilebankingqrcode')->name('mobilebankingqrcode');

Route::get('checkout/bank/wallet/{inv_ref}', 'BasketController@walletpayment')->middleware('checkstock');
Route::get('t10wallet/{inv_ref}/success', 'T10walletController@success')->name('t10wallet.success');
Route::get('t10wallet/{inv_ref}/failed', 'T10walletController@failed')->name('t10wallet.failed');
Route::get('t10wallet/{t10wallet}', 'T10walletController@show')->name('t10wallet');
Route::get('profile', 'UserController@details');
Route::post('/profile/update', 'UserController@updateDetails');
Route::post('/profile/update/phone', 'UserController@change_phone');
Route::get('/profile_user_address', 'AddressController@Index_2');
Route::post('/profile/change_pass', 'UserController@change_pass');
Route::get('/GFregister', 'UserController@GFRegister')->name('GFregister');




//--------- Contest ---------\\
Route::get('/contest', 'contest\ContestController@Index');
Route::post('/contest/edit', 'contest\ContestController@EditContest')->name('contest.edit');
//--------- Contest ----------\\

//---------------------------- Profile Start -----------------------------------\\

Route::get('/profile', 'UserController@details');
Route::get('/profile/wishlist', 'UserController@wishList');
Route::get('/profile/wishlist/delete/{id}', 'UserController@delete_wishlist');
Route::get('/profile/wishlist/Basket/{id}', 'UserController@wishlistTobasket');
Route::post('/profile/wishlist/AllwishToBasket', 'UserController@AllwishlistToBasket');




Route::post('/profile/updateWEB', 'UserController@updateDetails');
Route::post('/profile/updateMobile', 'UserController@updateDetailsMobile')->name('updateDetailsMobile');
Route::get('/profile/KYC', 'UserController@kyc_page');
Route::post('/profile/KYC/update', 'UserController@kycCheck');
Route::get('/change_pass', 'UserController@details_change_pass');
Route::get('/profile_my_sale', 'UserController@purchase')->name('profile_my_sale');
// Route::get('/profile_my_sale', 'UserController@my_sale');
// Route::get('/profile/KYC', 'UserController@my_sale');

Route::get('/profile_my_sale_detail/{inv_ref}', 'UserController@salesListDetail');


Route::get('/profile_wallet_t10', 'WalletController@show');

// Route::get('/profile_wallet_t10', function () {
//     return view('pages.profile.profile_wallet_t10');
// });


Route::any('/addwallet', function () {
    return view('pages.addwallet');
});


Route::post('/wallet/accept', 'WalletController@accept');
Route::get('add_wallet_qr_code', 'QRPaymentController@Walletmobilebanking');
Route::get('add_wallet_qr_code/qrcode/{id}', 'WalletController@mobilebankingqrcode')->name('walletqrcode');

Route::get('/add_wallet_bank', 'WalletController@getInv');
Route::post('/wallet/update', 'WalletController@walletupdate')->name('wallet-update');

Route::get('/regis_tempo', function () {
    return view('pages.regis_tempo');
});
Route::post('/buyWallet', 'WalletController@buyWallet');


Route::get('/error404', function () {
    return view('pages.error404');
});
//---------------------------- Profile Start -----------------------------------\\


//--------- address ----------\\
Route::get('address', 'AddressController@Index');
Route::post('address/add', 'AddressController@addAddress');
Route::post('address/change', 'AddressController@changeAddress');
Route::post('address/edit', 'AddressController@editAddress');
Route::get('address/delete', 'AddressController@delete');
Route::get('address/setDefualt', 'AddressController@setDefault');

//--------- address ----------\\


Route::get('profile/purchase', 'UserController@purchase');
Route::get('profile/cancel/{id}', 'InvCancelController@cancel');

//--------- my purchase ----------\\

Route::get('/product-payment-repurchase', 'UserController@repurchase');




Route::get('test', 'UserController@test');


Route::get('promotion', function () {
    return View::make('pages.promotion');
});



Route::get('contact', function () {
    return view('pages.contact');
});

Route::get('reset_otp', function () {
    return view('pages.reset_otp');
});




Route::get('login', function () {
    return View::make('auth/login')->name('login');
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified')->middleware('checkbalance');
Auth::routes(['verify' => true]);


Route::get('/shop', 'shop\ShopController@Index')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('shop');
Route::get('/shop/myproduct', 'shop\ShopController@myproduct')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('shop.myproduct');
Route::get('/shop/myproduct/new', 'shop\ShopController@newmyproduct')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('shop.new.myproduct');
Route::post('/shop/myproduct/new', 'shop\ShopController@addmyproduct')->name('shop.add.myproduct');
Route::post('/shop/myproduct/new/imgupload', 'shop\ShopController@addmyproduct_imgupload')->name('shop.add.myproduct.imgupload');
Route::post('/shop/myproduct/edit/imgupload/delete/{img}', 'shop\ShopController@addmyproduct_imgupload_delete')->name('shop.add.myproduct.imgupload.delete');
Route::get('/shop/myproduct/{id}', 'shop\ShopController@editmyproduct')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('edit.myproduct');
Route::delete('/shop/myproduct/{id}', 'shop\ShopController@deletemyproduct')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('delete.myproduct');
Route::put('/shop/myproduct/{id}', 'shop\ShopController@updatemyproduct')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('update.myproduct');
Route::put('/shop/myproduct/{id}/option/add', 'shop\ShopController@addoptionupdatemyproduct')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('update.option.add.myproduct');

Route::post('/shop/new', 'WelcomeController@NewShop')->middleware('checkbalance')->name('new-shopInfo');
Route::post('/shop/update', 'shop\ShopController@updateShopInfo')->name('updateShopInfo');
Route::get('/shop/sales-list', 'shop\ShopController@salesList')->middleware('auth')->middleware('checkshop')->middleware('checkbalance');
Route::get('shop/search_product', 'shop\ShopController@searchProduct');
Route::get('shop/search_list', 'shop\ShopController@searchList');
Route::get('/shop/sales-list/detail/{inv_ref}', 'shop\ShopController@salesListDetail');
Route::post('/shop/shipping-note', 'shop\ShopController@newShippingNote')->middleware('checkbalance')->name('newShippingNotes');
Route::get('/shop/get-shipping-note', 'shop\ShopController@getShippingNote')->middleware('checkbalance')->name('getShippingNotes');

Route::post('/shop/sendTrackingNumber', 'shop\ShopController@sendTrackingNumber')->name('updateTrackingNumber');
Route::post('/shop/updateTrackingNumber', 'shop\ShopController@updateTrackingNumber')->name('updateTrackingNumber');
Route::post('statusShop', 'shop\ShopController@changeStatusShop')->name('status-shop');

// preorder
Route::get('/shop/preorder', 'shop\preorderController@index');
Route::get('/shop/preorder/add', 'shop\preorderController@add');
Route::post('/shop/preorder/add', 'shop\preorderController@store');
Route::get('/shop/preorder/{id}', 'shop\preorderController@edit');
Route::post('/shop/preorder/edit/{id}', 'shop\preorderController@update');
// Route::get('/shop/preorder/delete/{id}', 'shop\preorderController@delete');
Route::delete('/shop/preorder/delete/{id}', 'shop\preorderController@delete');

//------------- Admin --------------\\
$folderAdmin = 'admin';
$folderOther = 'other';
$urlAdmin = 'dashboard';
Route::get($urlAdmin . '/login', $folderAdmin . '\AuthController@index');
Route::post($urlAdmin . '/login', $folderAdmin . '\AuthController@login');

Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/admin', $folderAdmin . '\UserController@index');
        Route::get('/admin/create', $folderAdmin . '\UserController@create');
        Route::post('/admin/create', $folderAdmin . '\UserController@store');
        Route::get('/admin/edit/{id}', $folderAdmin . '\UserController@edit');
        Route::post('/admin/edit', $folderAdmin . '\UserController@update');
        Route::get('/admin/delete', $folderAdmin . '\UserController@delete');
        Route::get('/export/user', 'export\userExportController@shop');
        Route::get('/resetpassword/user', $folderAdmin . '\UserController@resetPassword');
        Route::get('/resetpassword/user/cf', $folderAdmin . '\UserController@resetPasswordCf');
    });
});
Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/', $folderAdmin . '\HomeController@index');

        Route::get('/loginas', $folderAdmin . '\AuthController@loginas');
        Route::get('/logout', $folderAdmin . '\AuthController@logout');
        Route::get('/getInvs', 'Dashboard\AdminController@coutInvs');
        Route::get('/flash_sale/{id}/refund', $folderAdmin . '\RefundController@index');
        Route::get('/flash_sale/{id}/refund/test', $folderAdmin . '\RefundController@index2');
        Route::post('/flash_sale/{id}/refund', $folderAdmin . '\RefundController@refund');

        Route::get('/stat/sales', 'Dashboard\AdminController@getSalesStat');
        Route::get('/stat/withdraw', 'Dashboard\AdminController@getWithdrawStat');
        Route::get('/setting/edit', 'Dashboard\AdminController@editSetting');
        Route::post('/setting/update', 'Dashboard\AdminController@updateSetting')->name('dashboard.update.setting');

        // Manage Shop Routes
        Route::group(['prefix' => 'manageShop'], function () {
            Route::get('/', 'admin\ManageShopController@index');
        });

        //FlashSales\\
        Route::get('/flash_sale', 'Dashboard\AdminController@myproduct');
        Route::post('/flash_sale/banitem', 'Dashboard\AdminController@myproductban');
        Route::post('/flash_sale/set_promo_item', 'Dashboard\AdminController@set_promo_item');
        Route::post('/flash_sale/unset_promo_item', 'Dashboard\AdminController@unset_promo_item');
        Route::get('/nine_baht', 'Dashboard\AdminController@product_ninebaht');
        Route::post('/promotion', 'Dashboard\AdminController@updatepromotion');
        Route::post('/discount', 'Dashboard\AdminController@updatediscount');
        Route::get('/promotion/fixed', 'Dashboard\AdminController@updatepromotionFixed');
        Route::post('/pinproduct', 'Dashboard\AdminController@pinproduct');
        Route::post('/dispinproduct', 'Dashboard\AdminController@dispinproduct');
        Route::post('/editpromotion', 'Dashboard\AdminController@editpromotion');
        Route::post('/deletedpromotion', 'Dashboard\AdminController@deletedpromotion');

        //FlashSales\\
        Route::get('/MPSeller', 'Dashboard\MPSellerController@myproduct');
        Route::post('/mpdiscount', 'Dashboard\MPSellerController@mpupdatediscount');

        //query main page
        Route::get('/manageUser', 'Dashboard\AdminController@getDataUser');
        Route::post('/manageUser/shop/new', 'Dashboard\AdminController@newShop');
        Route::post('/manageUser/shop/', 'Dashboard\AdminController@NewShop');
        Route::get('/manageUser/shopAddress/{id}', 'Dashboard\AdminController@shopAddress');
        Route::post('/manageUser/shopAddress/new', 'Dashboard\AdminController@addShopAddress')->name('dashboard.add.shopAddress');
        Route::post('/manageUser/shopAddress/edit', 'Dashboard\AdminController@editShopAddress')->name('dashboard.edit.shopAddress');

        Route::get('/manageUser/delete', 'Dashboard\AdminController@deleteShopAddress');
        Route::get('/manageUser/setShopAddress', 'Dashboard\AdminController@setShopAddress');
        Route::get('/manageUser/setBackShopAddress', 'Dashboard\AdminController@setBackShopAddress');

        Route::get('/manageUser/productList', 'Dashboard\AdminController@productList');
        Route::get('/manageUser/productList/{id}', 'Dashboard\AdminController@productList');

        Route::post('/manageUser/setShopSts', 'Dashboard\AdminController@setShopSts');
        Route::get('/manageUser/shopDetail/{id}', 'Dashboard\AdminController@shopDetail');
        Route::post('/manageUser/shop/update', 'Dashboard\AdminController@updateShopInfo')->name('dashboard.edit.shop');

        Route::get('/manageUser/product/new', 'Dashboard\AdminController@newProduct');
        Route::post('/manageUser/product/new', 'Dashboard\AdminController@addProduct')->name('dashboard.add.product');
        Route::post('/manageUser/product/new/imgupload', 'Dashboard\AdminController@addproduct_imgupload')->name('dashboard.add.product.imgupload');
        Route::post('/manageUser/product/edit/imgupload/delete/{img}', 'Dashboard\AdminController@addproduct_imgupload_delete')->name('dashboard.add.product.imgupload.delete');
        Route::get('/manageUser/product/{id}', 'Dashboard\AdminController@editproduct')->name('edit.product');
        Route::delete('/manageUser/product/{id}', 'Dashboard\AdminController@deleteproduct')->name('delete.product');
        Route::put('/manageUser/product/{id}', 'Dashboard\AdminController@updateproduct')->name('update.product');

        //1. function button  //2.function query data
        Route::get('/manageUser/KYC/approve', 'Dashboard\AdminController@btn_approve');
        Route::post('/manageUser/KYC/delete', 'Dashboard\AdminController@deletepic');
        // Route::get('/manageUser/KYC', 'Dashboard\AdminController@page_approve');

        //1. function button  //2.function query data
        Route::post('/manageUser/BeAdmin', 'Dashboard\AdminController@BeAdmin');
        Route::get('/manageUser/beAdminPage', 'Dashboard\AdminController@page_admin')->name('admin_search');
        Route::get('/manageUser/RetireAdmin', 'Dashboard\AdminController@retireAdmin');

        //1. function button  //2.function query data
        Route::get('/manageUser/BanUser', 'Dashboard\AdminController@BanUser');
        Route::get('/manageUser/Ban', 'Dashboard\AdminController@page_ban');
        Route::get('/manageUser/UnBan', 'Dashboard\AdminController@Unban');


        // INVS BUY \\
        Route::get('/ReportOrder', 'Dashboard\INVSController@paymentData');
        Route::get('/Buy_Now', 'Dashboard\INVSController@buynow_data');
        Route::post('/check_submit', 'Dashboard\INVSController@Btn_chk_submit');
        Route::any('/get_pd_now', 'Dashboard\INVSController@get_pd_now');
        Route::any('/get_pd_check', 'Dashboard\INVSController@get_pd_check');


        // Order Cancellations \\

        Route::get('/orderCancel', 'Dashboard\OrderCancelController@orderCacelData');
        Route::get('/orderCancelCustomer', 'Dashboard\OrderCancelController@orderCacelDataCustomer');
        Route::get('/walletCancel', 'Dashboard\walletCancelController@walletCacelData');
        Route::any('/walletCancel_submit', 'Dashboard\walletCancelController@Btn_submit');
        // Order Cancellations \\

        // withdraw \\
        Route::get('/withdraw', 'Dashboard\PaymentController@withdraw');
        // withdraw \\

        // income
        Route::get('/income', 'Dashboard\IncomeController@income');

        //Report for Payment \\
        Route::get('/payment', 'Dashboard\PaymentController@transactionData');
        Route::any('/orderCancel_submit', 'Dashboard\OrderCancelController@Btn_submit');
        Route::any('check_inprocess', 'Dashboard\PaymentController@check_inprocess');

        Route::get('/payment/btnapprove', 'Dashboard\PaymentController@Btn_ApproveTransfer'); //Button for approve transfer come in
        Route::get('/payment/btnwalletapprove', 'Dashboard\PaymentController@Btn_Wallet_ApproveTransfer'); //Button for approve transfer come in
        Route::get('/payment/btncancelwallet', 'Dashboard\PaymentController@Btn_Wallet_Cancel'); //Button for approve transfer come in
        Route::post('/payment/btnapprovewithdrows', 'Dashboard\PaymentController@Btn_wallet_Approvewithdrows');
        Route::any('/payment/btncancelwithdrows', 'Dashboard\PaymentController@Btn_Cancelwithdrows');
        Route::any('/payment/chkwithdrows', 'Dashboard\PaymentController@Btn_Checkwithdrows');
        Route::any('/payment/btndeletetra_img', 'Dashboard\PaymentController@deletetransfer_img')->name('addnotedata'); //Button for delete transfer
        Route::get('/payment/paymentApprove', 'Dashboard\PaymentController@approveTransfer');
        Route::get('/payment/transacion', 'Dashboard\PaymentController@Transacion');
        Route::get('/payment/walletApprove', 'Dashboard\PaymentController@WalletTransfer');
        Route::get('/payment/paymentCancel', 'Dashboard\PaymentController@cancelTransfer');
        // Report for Payment \\
        Route::get('/cancelproduct', 'Dashboard\PaymentController@cancelproduct');

        //Influencer\\
        Route::get('/influencer', 'Dashboard\AdminController@Influencer');
        Route::get('/influencer/seacrh', 'Dashboard\AdminController@search_data');
        Route::get('/influencer/no-onePersernal', 'Dashboard\AdminController@dont_Pesernal');
        Route::post('/influencer/update', 'Dashboard\AdminController@updateInfluncer');
        Route::post('/influencer/ban', 'Dashboard\AdminController@banInfluncer');
        Route::post('/influencer/del_ban', 'Dashboard\AdminController@delbanInfluncer');
        Route::post('/influencer/approve_shop', 'Dashboard\AdminController@approveInfluncer');
        Route::post('/influencer/kill_shop', 'Dashboard\AdminController@killInfluncer');


        //Influencer\\

        //Excel\\
        Route::get('/inprogress_inv/excel', 'Dashboard\PaymentController@inprogessExport');
        Route::get('/wallet_approve/excel', 'Dashboard\PaymentController@WalletAppExport');
        Route::get('/transaction/excel', 'Dashboard\PaymentController@transactionExport');
        Route::get('/withdraw/excel', 'Dashboard\INVSController@WithdrawExport');
        Route::get('/approvepaymen/excel', 'Dashboard\INVSController@ApprovePaymenExport');
        Route::get('/invs_cancel_customer/excel', 'Dashboard\OrderCancelController@invsCancelCustomerExport');
        Route::get('/invs_cancel_shop/excel', 'Dashboard\OrderCancelController@invsCancelShopExport');


        //Kill Shop\\
        Route::get('/kill_shop', 'Dashboard\AdminController@shop_delete');
        Route::any('/del_all_phone', 'Dashboard\AdminController@shop_delete_phone');

        Route::get('/codeOpenShop', 'Dashboard\CodeOpenShopController@codeOpenShopData');
        Route::get('/codeOpenShop/create', 'Dashboard\CodeOpenShopController@create');
        Route::post('/codeOpenShop/store', 'Dashboard\CodeOpenShopController@store');
        Route::post('/codeOpenShop/store', 'Dashboard\CodeOpenShopController@store');
        Route::get('/codeOpenShopDetail/{id}', 'Dashboard\CodeOpenShopController@codeOpenShopDetail');
        Route::get('/codeOpenShop/excel/{id}', 'Dashboard\CodeOpenShopController@codeOpenShopExport');
    });
    Route::get('/export_excel/excel', 'Dashboard\PaymentController@excel');
    Route::get('pay', 'Dashboard\INVSController@paymentData');
    Route::get('sendANDvisit', 'Dashboard\INVSController@send_visitData');
    Route::get('recieve', 'Dashboard\INVSController@recieveData');
    Route::get('/modaladmin', function () {
        return view('dashboard.modaladmin');
    });
});
//------------- Admin --------------\\

## ajax - chat ##

Route::post('post_message', 'Chatcontroller@create')->name('send-message');

//-----ระบบยกเลิก คำสั่งซื้อ-----\\
Route::get('profile/cancel/content/{id}', 'InvCancelController@getContent');
Route::get('profile/cancel/update/{id}', 'InvCancelController@updateContent');

Route::get('shop/cancel/content/{id}', 'shop\ShopCancelController@getContent');

//---------------------------\\

//-----ระบบยืนยัน คำสั่งซื้อ------\\
Route::post('confirmProduct', 'shop\ShopController@confirmProductUser')->name('confirm-product');
//---------------------------\\

//-----สถานะสินค้า----\\
Route::post('statusGoods', 'shop\ShopController@changeStatusGoods')->name('status-goods');
Route::post('receiveGoods', 'shop\ShopController@changeReceiveGoods')->name('receive-goods');
Route::get('GetstatusGoods', 'shop\ShopController@getStatusGoods')->name('get-status-goods');


## shipping ##
Route::get('/shop/shipping', 'shop\ShopController@shipping')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('shipping');
Route::post('/shop/shipping/update_selfShipping', 'shop\ShopController@update_selfShipping');
Route::post('/shop/modalshippingdetail', 'shop\ShopController@getShoppingType')->name('getshippingtype');
Route::post('/shop/shippingdetail', 'shop\ShopController@addShippingDetail')->name('addShippingDetail');
Route::post('/shop/shippingDetailPrice', 'shop\ShopController@addShippingPrice')->name('addShippingPrices');
Route::post('/shop/shippingCheckDetail', 'shop\ShopController@checkShippingDetail')->name('checkShippingDetails');
Route::get('/shop/shipping/detail', 'shop\ShopController@getShoppingDetail')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('get-shipping-details');
Route::post('/shop/shippingCheckDetailType', 'shop\ShopController@checkShippingType')->name('checkShippingTypes');





// new_ui
Route::get('/welcomenew', function () {
    return view('new_ui.index');
});
Route::get('/categories', function () {
    return view('new_ui.categories');
});

//sub menu in index page\\
Route::get('/flash-sale', 'WelcomeControllerNew@flashSeller');
Route::get('/best-seller', 'WelcomeControllerNew@bestSeller');
Route::get('/product-new', 'WelcomeControllerNew@productNew');
Route::get('product/{type}/{id}', 'WelcomeController@cateProduct');

//Gift\\
Route::get('/gift', 'WelcomeControllerNew@giftdata');

// Show goods all in the shops\\
Route::get('/shop-user', 'shop\ShopController@goodsAllShops');
Route::get('/shop-user-details', 'shop\ShopController@detailsGoodsAllShops');
// Show goods all in the shops\\

//ShopSeller
Route::get('/shop/seller-product', 'shop\ShopController@myproduct');
Route::get('/shop/seller-address', 'shop\ShopController@ShopAddress');
Route::get('/shop/seller-shop-user-detail', 'shop\ShopController@sellerShopUserDetail')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('sellerShopUserDetail');
Route::any('/shop/seller-wallet', 'shop\ShopController@seller_wallet')->name('seller-wallet');
Route::get('/shop/search_seller', 'shop\ShopController@withdraw_wallet_search');

Route::get('/shop/seller-recommend', 'shop\ShopController@seller_recommend');
Route::post('/shop/seller-recommend/withdraw', 'WithdrowController@withdraw_recommend');

//withDraw
Route::post('/shop/seller-shop-user-detail/withdraw', 'WithdrowController@withDraw')->name('submitWithDraw')->middleware('auth');
Route::get('/shop/seller-shop-user-detail/withdraw/check', 'WithdrowController@getUserBank')->name('getWithDraw')->middleware('auth');

//Function about AddresSeller\\
Route::post('/seller-address/add', 'shop\ShopController@addShopAddress');
Route::post('/seller-address/edit', 'shop\ShopController@editShopAddress');
Route::get('/seller-address/delete', 'shop\ShopController@deleteShopAddress');
Route::get('/seller-address/setAddressSeller', 'shop\ShopController@setShopAddress');
Route::get('/seller-address/setBackAddressSeller', 'shop\ShopController@setBackShopAddress');





//Function about AddresSeller\\

//Function bank seller//
// Route::get('/shop/addsellerbank', 'shop\ShopController@addsellerbank')->middleware('auth')->middleware('checkshop')->middleware('checkbalance')->name('addsellerbank');
Route::any('/shop/addsellerbank', 'shop\ShopController@addsellerbank2')->name('addsellerbank'); //this
Route::post('/shop/addbank', 'shop\ShopController@addbank')->name('addbankdata');
Route::post('/shop/addbank2', 'shop\ShopController@addbank2');
Route::get('/shop/getbank', 'shop\ShopController@getbank')->name('getbankdata');
Route::post('/shop/editbank', 'shop\ShopController@editbank')->name('editbankdata');
Route::get('/shop/deletebank', 'shop\ShopController@deletebank')->name('deletebankdata');
Route::get('/shop/deletebank2', 'shop\ShopController@deletebank2');

//ShopWithdraw
Route::get('/shop/withdraw', 'shop\ShopController@ShopWithdraw')->name('withdraw');

//ShopSeller





//Notification
Route::get('/profile_user_notification', function () {
    return view('new_ui.profile_user_notification');
});













//bank
Route::get('/buy-mobilebanking', function () {
    return view('new_ui.user-buy-mobilebanking');
});
Route::get('/buy-mobilebanking2', function () {
    return view('new_ui.user2-buy-mobilebanking');
});
// Route::get('/product-detail', function () {
//     return view('new_ui.product-detail');
// });
Route::get('/product-list', function () {
    return view('new_ui.product-list');
});
Route::get('/seller-index', function () {
    return view('new_ui.seller-index');
});

Route::get('/seller-detail', function () {
    return view('new_ui.seller-detail');
});
Route::get('/seller-add-product', function () {
    return view('new_ui.seller-add-product');
});
Route::get('/seller-bank', function () {
    return view('new_ui.seller-bank');
});
// Route::get('/seller-detail-shop', function () {
//     return view('new_ui.seller-detail-shop');
// });
Route::get('/seller-proflie', function () {
    return view('new_ui.seller-proflie');
});
// Route::get('/seller-address', function () {
//     return view('new_ui.seller-address');
// });
Route::get('/seller-shipping', function () {
    return view('new_ui.seller-shipping');
});

// Route::get('/product-payment', function () {
//     return view('new_ui.product-payment');
// });
//Route::get('/profile_chang_pass', function () {
//    return view('new_ui.profile_chang_pass');
//});
Route::get('/profile_coupon', function () {
    return view('new_ui.profile_coupon');
});
Route::get('/profile_my_sale_demo', function () {
    return view('new_ui.profile_my_sale_demo');
});
// Route::get('/profile_my_sale_detail', function () {
//     return view('new_ui.profile_my_sale_detail');
// });
Route::get('/profile_paymen_method', function () {
    return view('new_ui.profile_paymen_method');
});
Route::get('/profile_tmp', function () {
    return view('new_ui.profile_tmp');
});
// Route::get('/profile_user_address', function () {
//     return view('new_ui.profile_user_address');
// });
// Route::get('/profile_wallet_t10', function () {
//     return view('new_ui.profile_wallet_t10');
// });
Route::get('/profile_user_notification', function () {
    return view('new_ui.profile_user_notification');
});
Route::get('/profile_user_notification2', function () {
    return view('new_ui.profile_user_notification2');
});
Route::get('/profile_user_notification3', function () {
    return view('new_ui.profile_user_notification3');
});
Route::get('/seller-return-product', function () {
    return view('new_ui.seller-return-product');
});
Route::get('/seller-income', function () {
    return view('new_ui.seller-income');
});
// Route::get('/seller-wallet', function () {
//     return view('shop.seller-wallet');
// });
Route::get('/seller-review', function () {
    return view('new_ui.seller-review');
});
Route::get('/seller-category', function () {
    return view('new_ui.seller-category');
});
Route::get('/compare', function () {
    return view('new_ui.compare');
});

Route::get('/seller-bank', function () {
    return view('new_ui.seller-bank');
});

// Route::get('/pre_order', function () {
//     return view('new_ui.pre_order');
// });
// Route::get('/gift', function () {
//     return view('new_ui.gift');
// });
// Route::get('/product-detail-preorder', function () {
//     return view('new_ui.product-detail-preorder');
// });
// Route::get('/shop_pre_order_add', function () {
//     return view('new_ui.shop_pre_order_add');
// });
// Route::get('/shop_pre_order_detail', function () {
//     return view('new_ui.shop_pre_order_detail');
// });


Route::any('login/google', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/callback/google', 'Auth\LoginController@GhandleProviderCallback');
// Route::any('callback/google', function(){
//     try {
//         $user = Socialite::driver('google')->user();
//         dd($user->email);
//     } catch (\Exception $e) {
//         return redirect('/');
//     }
// });
Route::any('login/facebook', function () {
    // Session::set('fbCallback', str_replace(url('/'), '', url()->previous()));
    session(['fbCallback' => str_replace(url('/'), '', url()->previous())]);
    session()->save();
    // dd();
    return Socialite::driver('facebook')->redirect();
});

Route::get('/callback/facebook', 'Auth\LoginController@FhandleProviderCallback');
// Route::any('/callback/facebook', function () {
//     try {
//         $user = Socialite::driver('facebook')->user();
//         dd($user);
//     } catch (\Exception $e) {
//         return redirect('/');
//     }
// });


//rating

Route::post('rating', 'RatingController@addRating');
Route::post('rating/imgupload', 'RatingController@addRating_imgupload')->name('rating.imgupload');


//Treepay
Route::post('/checkout/credit/return', 'TreepayPaymentgatewayController@ResponseTreepayCredit');

//2C2P
Route::get('checkout/bank/2c2pcredit/{inv_ref}', 'TwoCTwoPController@credit')->middleware('checkstock');
Route::any('/checkout/credit/2c2p/return', 'TwoCTwoPController@Response2c2pCredit');
Route::post('/buyWallettctp', 'TwoCTwoPController@buyWallettctp');



//Don't touch it!!!
//-------------------------------- New Function For Basket ------------------------------\\
Route::get('product_detail', 'BasketController2@product_detail');
//-------------------------------- New Function For Basket ------------------------------\\
//Don't touch it!!!
Route::get('product_detail/{id}', 'ProductController@index');



Route::get('test/login', 'TestLoging@index')->name('testlogin');

Route::get('/barcode', function () {
    return view('barcode2');
});
Route::post('/bar/search', 'BarcodeController@barcode');
// Route::get('product');
Route::any('/product/barcode', 'ProductController@barcode');

Route::get('/migrate_stn', 'migrateSTNController@index');

Route::get('blogs', 'NewsController@index')->name('blogs');
Route::get('blogs/detail/{id}', 'NewsController@indexDetail')->name('blogs');
Route::get('blogs/categories/{id}', 'NewsController@indexCategories')->name('blogs');

Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/news', $folderAdmin . '\NewsController@index');
        Route::get('/news/create', $folderAdmin . '\NewsController@create');
        Route::post('/news/create', $folderAdmin . '\NewsController@store');
        Route::get('/news/edit/{id}', $folderAdmin . '\NewsController@edit');
        Route::post('/news/edit', $folderAdmin . '\NewsController@update');
        Route::post('/news/destroy', $folderAdmin . '\NewsController@destroy')->name('destroy');
    });
});

Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/news-categories', $folderAdmin . '\NewsCategoryController@index');
        Route::get('/news-categories/create', $folderAdmin . '\NewsCategoryController@create');
        Route::post('/news-categories/create', $folderAdmin . '\NewsCategoryController@store');
        Route::get('/news-categories/edit/{id}', $folderAdmin . '\NewsCategoryController@edit');
        Route::post('/news-categories/edit', $folderAdmin . '\NewsCategoryController@update');
        Route::post('/news-categories/destroy', $folderAdmin . '\NewsCategoryController@destroy')->name('destroy');
    });
});

Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/banner', $folderAdmin . '\BannerController@index');
        Route::get('/banner/create', $folderAdmin . '\BannerController@create');
        Route::post('/banner/create', $folderAdmin . '\BannerController@store');
        Route::get('/banner/edit/{id}', $folderAdmin . '\BannerController@edit');
        Route::post('/banner/edit', $folderAdmin . '\BannerController@update');
        Route::post('/banner/destroy', $folderAdmin . '\BannerController@destroy')->name('destroy');
    });
});

Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/kyc', $folderAdmin . '\KycController@index');
        Route::get('/kyc/create', $folderAdmin . '\KycController@create');
        Route::post('/kyc/create', $folderAdmin . '\KycController@store');
        Route::get('/kyc/edit/{id}', $folderAdmin . '\KycController@edit');
        Route::post('/kyc/edit', $folderAdmin . '\KycController@update');
        Route::post('/kyc/destroy', $folderAdmin . '\KycController@destroy')->name('destroy');
    });
});

Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/pack-type', $folderAdmin . '\ProductController@pack_type');
        Route::get('/pack-type/create', $folderAdmin . '\ProductController@pack_type_create');
        Route::post('/pack-type/create', $folderAdmin . '\ProductController@pack_type_store');
        Route::get('/pack-type/edit/{id}', $folderAdmin . '\ProductController@pack_type_edit');
        Route::post('/pack-type/edit', $folderAdmin . '\ProductController@pack_type_update');
        Route::post('/pack-type/destroy', $folderAdmin . '\ProductController@pack_type_destroy')->name('pack_type_destroy');
    });
});
Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/drug-type', $folderAdmin . '\ProductController@drug_type');
        Route::get('/drug-type/create', $folderAdmin . '\ProductController@drug_type_create');
        Route::post('/drug-type/create', $folderAdmin . '\ProductController@drug_type_store');
        Route::get('/drug-type/edit/{id}', $folderAdmin . '\ProductController@drug_type_edit');
        Route::post('/drug-type/edit', $folderAdmin . '\ProductController@drug_type_update');
        Route::post('/drug-type/destroy', $folderAdmin . '\ProductController@drug_type_destroy')->name('drug_type_destroy');
    });
});
Route::group(['middleware' => 'admin'], function () use ($folderAdmin, $urlAdmin) {
    Route::group(['prefix' => $urlAdmin], function () use ($folderAdmin) {
        Route::get('/drug-target', $folderAdmin . '\ProductController@drug_target');
        Route::get('/drug-target/create', $folderAdmin . '\ProductController@drug_target_create');
        Route::post('/drug-target/create', $folderAdmin . '\ProductController@drug_target_store');
        Route::get('/drug-target/edit/{id}', $folderAdmin . '\ProductController@drug_target_edit');
        Route::post('/drug-target/edit', $folderAdmin . '\ProductController@drug_target_update');
        Route::post('/drug-target/destroy', $folderAdmin . '\ProductController@drug_target_destroy')->name('drug_target_destroy');
    });
});

// Route::get('/shop/kyc', function () {
//     return view('shop.kyc');
// });
Route::get('/shop/kyc', 'admin\KycUserController@index');
Route::get('/shop/kyc/create', 'admin\KycUserController@create');
Route::post('/shop/kyc/create', 'admin\KycUserController@store');
Route::get('/shop/kyc/edit', 'admin\KycUserController@edit');
Route::post('/shop/kyc/edit', 'admin\KycUserController@update');
Route::post('/shop/kyc/destroy', 'admin\KycUserController@destroy')->name('destroy');

Route::get('other/about', [OtherController::class, 'indexAbout']);
Route::get('other/affiliate-program', [OtherController::class, 'indexAffiliateProgram']);
Route::get('other/policy', [OtherController::class, 'indexPolicy']);
Route::get('other/terms-conditions', [OtherController::class, 'indexTermsConditions']);
Route::get('other/safety', [OtherController::class, 'indexSafety']);
Route::get('other/contact', [OtherController::class, 'indexContact']);
Route::get('other/helper', [OtherController::class, 'indexHelper']);
Route::get('other/order', [OtherController::class, 'indexOrder']);
Route::get('other/shipping', [OtherController::class, 'indexShipping']);
Route::get('other/return-refund', [OtherController::class, 'indexReturnRefund']);
Route::get('other/foreign-policy', [OtherController::class, 'indexForeignPolicy']);

Route::get('/connectWallet/{wallet}/clearWalletSession', [Web3LoginController::class, 'clearWalletSession']);
Route::get('/web3-login-message', [Web3LoginController::class, 'message']);
Route::post('/web3-login-verify', [Web3LoginController::class, 'verify']);
Route::get('/connectWallet/{wallet}', [WalletController::class, 'connectWallet']);

Route::post('/invoices/updateStatus', [BasketController::class, 'updateInvoiceStatus']);

Route::get('/seller/statistics/sales', [ShopController::class, 'getSalesStatistic']);

Route::get('/getAssets', function () {
    return Asset::where('wallet_address', Session::get('walletAddress'))->count();
});

Route::post('/convertPrice',[ShopController::class, 'convertPriceToUSDC']);

Route::get(
    'change/{locale}',
    function ($locale) {
        Session::put('locale', $locale);
        return Redirect::back();
    }
);
