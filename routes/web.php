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
	return redirect(route("home"));
});


Route::get ('/home', "Shelter@home") -> name("home");
Route::get ('/pets/{pet_cat?}', "Shelter@pets") -> name("pets");
Route::get ('/login', "Shelter@login") -> name("login");
Route::post('/login_act', "Shelter@login_act") -> name("login_act");
Route::get ('/register', "Shelter@register") -> name("register");
Route::post('/register_act', "Shelter@register_act") -> name("register_act");
Route::get ('/logout', "Shelter@logout") -> name("logout");
Route::get ('/adopt/{id}', "Shelter@adopt") -> name("adopt");
Route::get ('/adopted', "Shelter@adopted") -> name("adopted");