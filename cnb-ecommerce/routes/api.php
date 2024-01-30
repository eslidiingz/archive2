<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1'], function () {
    Route::post('t10wallet/callback', 'api\v1\T10walletController@callback');
    Route::get('/', function () {
        return response()->json('test !', 200);
    });

    Route::post('/topup/bank/scb/callback', 'api\v1\topup\ScbController@callback');
});

Route::get('v1/updateinvsstatus', 'Dashboard\INVSController@autoPpdateInvsStatus');
Route::get('v1/test_updateinvsstatus', 'Dashboard\INVSController@test_autoPpdateInvsStatus');
Route::post('/checkout/credit/2c2p/return', 'TwoCTwoPController@Response2c2pCredit');

Route::post('/v1/invs/paymentQrCodeCallback', 'QRPaymentController@mobilebankingreturn');
Route::post('/v1/invs/paymentCreditDebitCallback', 'TwoCTwoPController@Response2c2pCredit');

Route::get('getproduct', 'api\ProductController@loadmore');

Route::get('t1/login', 'TestLoging@index');


// api get product use in korat and nonthaburi
Route::get('get_product', 'api\ProductController@store');


Route::group(['prefix' => 'mp','middleware' => 'apiKeyMiddleware'], function () {
  $folderMP = 'api\mp\\';
  Route::get('/', $folderMP.'ProductController@getProduct');
  Route::get('get_product_category', $folderMP.'ProductController@getProductCategory');
  Route::get('get_product_subcategory', $folderMP.'ProductController@getProductSubCategory');
  Route::get('/invs/update_invs', $folderMP.'InvsController@updateInvs');
});
