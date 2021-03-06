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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1/pay/'], function () {
    Route::post('subscription', 'PaymentController@basicPayment');
    Route::post('query/status', 'PaymentController@getStatusPayment');
    Route::get('records', 'PaymentController@payments');
});

Route::group(['prefix' => '/v1/test/'], function () {
    Route::get('connect', 'ConnectController@getConnection');
});