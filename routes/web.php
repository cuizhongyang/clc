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
    return view('welcome');
});

//网站后台路由
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

	Route::get('/',"Admin\IndexController@index");
	//后台用户管理
	Route::resource('adminuser','Admin\AdminUserController');
	//后台商品类别管理
	Route::resource('category','Admin\CategoryController'); 
	//后台商品信息管理
	Route::resource('goods','Admin\GoodsController'); 
});
