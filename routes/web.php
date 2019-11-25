<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get ('/', 'Blog@index' )    					 -> name("home"); 
Route::get ('/login/', 'Blog@login' )    			 -> name("login");
Route::post('/login/act.php', 'Blog@login_act')		 -> name("login_act");
Route::get ('/register/', 'Blog@register')	 		 -> name("register"); 
Route::post('/register/act.php', 'Blog@register_act')-> name("register_act"); 
Route::get ('/logout/', 'Blog@logout')				 -> name("logout");
Route::get ('/post/', 'Blog@post')					 -> name("post");
Route::post('/post/act.php', 'Blog@post_act')					 -> name("post_act");