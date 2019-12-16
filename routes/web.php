<?php

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

Route::get('/', function () {
	return redirect(route("main"));
});

Route::get ('/store', "Store@main") -> name("main");
Route::post('/store/login', "Store@login") -> name("login");
Route::get ('/store/logout', "Store@logout") -> name("logout");
Route::post('/store/register', "Store@register") -> name("register");

Route::get ("/store/about", "Store@about") -> name("about");

Route::get ("/store/shop_b/cart/add", "Store@cart_add") -> name("cart_add");
Route::get ("/store/shop_b/cart/wipe", "Store@cart_wipe") -> name("cart_wipe");
Route::get ("/store/shop_b/checkout", "Store@checkout") -> name("checkout");
Route::get ("/store/shop/{cat?}/{page?}", "Store@shop") -> name("shop");

Route::get ("/store/orders", "Store@orders") -> name("orders");
