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

Route::group([
    "namespace" => "Auth",
    "prefix" => "auth"
], function () {
    Route::post('register','AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::group([
        "middleware" => ["auth:sanctum"]
    ], function () {
        Route::get('logout', 'AuthController@logout');
    });
});


Route::group([
    "namespace" => "Back",
    "prefix" => "back",
    "middleware" => ["auth:sanctum"]
], function () {
    Route::apiResource('products', 'ProductController');
});


Route::group([
    "namespace" => "Site",
    "prefix" => "site"
], function () {

    Route::get('cart/products', 'SiteController@cartProducts');
    Route::get('products', 'SiteController@products');
    Route::get('products/{product}', 'SiteController@product');

});