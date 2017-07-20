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
    return view('instruction');
});
Route::get('notValid',function(){
	return view('notValid');
});
Route::get('token',function(){
	return csrf_token();
});

Route::resource("carts","cartCtrl");
Route::resource("sliders","sliderCtrl");
Route::resource("products","productsCtrl");
Route::resource("categories","categoryCtrl");

Route::group(['middleware'=>'cekApi'],function(){
	
});