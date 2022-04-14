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
// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
    Route::post('register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
    Route::post('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout'])->middleware('auth');
});

Route::resource('backoffice.promo-codes', 'PromoCodeController', ['only' => ['index', 'show', 'store']]);

Route::get('backoffice/promotion-codes', 'PromotionCodeContoller@index');
Route::get('backoffice/promotion-codes/{id}', 'PromotionCodeContoller@show');
Route::post('backoffice/promotion-codes', 'PromotionCodeContoller@store');

Route::group(['middleware' => 'auth'], function () {

    //User Wallet
    Route::resource('user.wallet', 'WalletController', ['only' => ['index', 'store', 'destroy']]);

    Route::post('assign-promotion', 'PromotionCodeContoller@assignPromotion');
});
