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


Route::resource('items_by_carts', ItemsByCartController::class);
Route::resource('carts', CartController::class);



Route::delete('erase_product_from_cart/{id_product}/{id_cart}', 'ItemsByCartController@erase_product_from_cart');

Route::post('do_checkout/{cart_id}', 'CartController@do_checkout');

