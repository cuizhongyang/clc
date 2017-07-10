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

Route::get('/admin/login',"Admin\LoginController@login"); //加载后台登录界面
Route::post('/admin/dologin',"Admin\LoginController@doLogin"); //执行后台登录
Route::get('/admin/logout',"Admin\LoginController@logout"); //执行退出
Route::get('/admin/getcode',"Admin\LoginController@getCode"); //加载验证码
//网站后台路由
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

	Route::get('/',"Admin\IndexController@index");

	//后台用户管理
	Route::resource('adminuser','Admin\AdminUserController');

	//购物车管理
	Route::get('shopcat','Admin\ShopCatController@index');

	//后台首页
	Route::resource('adminuser','Admin\AdminUserController');//用户管理
	Route::resource('users', 'Admin\UsersController');//会员管理
   	Route::resource('role', 'Admin\RoleController');//角色管理
   	Route::resource('auth', 'Admin\AuthController');//节点管理
    
   	Route::get('adminuser/loadRole/{uid}',"Admin\AdminUserController@loadRole");//获取角色
	Route::post('adminuser/saveRole',"Admin\AdminUserController@saveRole");//更改角色

	Route::get('role/loadAuth/{rid}',"Admin\RoleController@loadAuth");//节点
	Route::post('role/saveAuth',"Admin\RoleController@saveAuth");

	//后台商品类别管理
	Route::resource('category','Admin\CategoryController'); 
	//后台商品信息管理
	Route::resource('goods','Admin\GoodsController'); 
	Route::post('edgoods/{id}','Admin\GoodsController@edgoods');
	//添加子类
	Route::get('addchild/{pid}/{name}/{path}','Admin\CategoryController@addChild');
	//商品详情信息
	Route::resource('gooddetail','Admin\GooddetailController');
	Route::post('edgdetail/{id}','Admin\GooddetailController@edgdetail');
	//图片上传
	Route::post('upfile','Admin\GoodsController@upload');
});
