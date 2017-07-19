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
//前台首页
Route::get('/',"Home\IndexController@index");
//前台列表
Route::get("/home/list/index1/{id}","Home\ListController@index1");
Route::get("/home/list/index2/{id}","Home\ListController@index2");
//前台详情
Route::get("/home/detail/{id}/{price}","Home\DetailController@index");
//加载验证码
Route::get('/home/getcode',"Home\LoginController@getCode"); 
//前台登录
Route::get('/home/login',"Home\LoginController@login");
//执行登录
Route::post('/home/dologin',"Home\LoginController@dologin");
//个人中心
Route::get('/home/center',"Home\CenterController@index");
//qq客服
Route::get('/home/qq',"Home\CenterController@qq");
//订单管理
Route::get('/home/order',"Home\OrderController@index");
//订单详情
Route::get('/home/orderinfo',"Home\OrderController@info");
//删除订单
Route::get('/home/doDel/{id}',"Home\OrderController@dodel");
//订单付款
Route::get('/home/Pay/{id}',"Home\OrderController@pay");
//实施付款
Route::get('/home/doPay/{id}',"Home\OrderController@dopay");
//确认收货
Route::get('/home/doGoods/{id}',"Home\OrderController@dogoods");
//商品评论
Route::get('/home/commit/{id}',"Home\OrderController@commit");
Route::post('/home/commit/update/{id}',"Home\OrderController@update");
//个人资料
Route::get('/home/center/information',"Home\CenterController@information");
//修改资料
Route::post('/home/center/update/{id}',"Home\CenterController@update");
//上传头像
Route::post('/home/center/upload',"Home\CenterController@upload");

//加载地址
Route::get('/home/address',"Home\AddressController@index");
//删除地址
Route::get('/home/address/{id}',"Home\AddressController@del");
//编辑地址
Route::get('/home/address/{id}/edit',"Home\AddressController@edit");
//改变默认地址
Route::get('/home/address/status/{id}',"Home\AddressController@status");
//执行修改地址
Route::post('/home/address/update/{id}',"Home\AddressController@doedit");
//添加地址
Route::post('/home/address/create',"Home\AddressController@create");
//加载购物车
Route::get('/home/shopcat',"Home\ShopcatController@add");



//执行退出
Route::get('/home/loginout',"Home\LoginController@loginout");

//前台注册
Route::get('/home/register',"Home\LoginController@register");
Route::post('/home/doregister',"Home\LoginController@doregister");
//激活邮箱
Route::get('/active',"Home\LoginController@active");
//找回密码
Route::get('/forget','Home\LoginController@forget');
//发送密码找回邮件
Route::post('/forget','Home\LoginController@doforget');
//重置密码界面
Route::get('/reset','Home\LoginController@reset');
//密码重置逻辑路由
Route::post('/reset','Home\LoginController@doreset');


Route::get('/admin/login',"Admin\LoginController@login"); //加载后台登录界面
Route::get('error',"Admin\IndexController@error"); //加载错误权限信息
Route::post('/admin/dologin',"Admin\LoginController@doLogin"); //执行后台登录
Route::get('/admin/logout',"Admin\LoginController@logout"); //执行退出
Route::get('/admin/getcode',"Admin\LoginController@getCode"); //加载验证码
Route::post('/admin/upload','Admin\BannerController@upload');//图片上传



//网站后台路由
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

	Route::get('',"Admin\IndexController@index");

	//购物车管理
	Route::get('shopcat','Admin\ShopCatController@index');
	//浏览订单
	Route::get('orders','Admin\OrdersController@index');
	//未付款订单
	Route::get('orderdetail/index1','Admin\OrderDetailController@index1');
	//待发货订单
	Route::get('orderdetail/index2','Admin\OrderDetailController@index2');
	//待收货订单
	Route::get('orderdetail/index3','Admin\OrderDetailController@index3');
	//待评论订单
	Route::get('orderdetail/index4','Admin\OrderDetailController@index4');
	//发货
	Route::get('orderdetail/change/{id}','Admin\OrderDetailController@change');
	//退货待审核
	Route::get('goodsreturn/index1','Admin\GoodsReturnController@index1');
	//退货审核成功
	Route::get('goodsreturn/index2','Admin\GoodsReturnController@index2');
	//退货审核失败
	Route::get('goodsreturn/index3','Admin\GoodsReturnController@index3');
	//退货退款成功
	Route::get('goodsreturn/index4','Admin\GoodsReturnController@index4');
	//退货审核
	Route::get('goodsreturn/check/{id}/{type}','Admin\GoodsReturnController@check');
	//轮播图管理
	Route::resource('banner','Admin\BannerController');
	//轮播图修改
	Route::post('doit/{id}',"Admin\BannerController@doit");
	//网站基础配置
	Route::resource('webconfig','Admin\WebConfigController');
	Route::post('doedit/{id}',"Admin\WebConfigController@doedit");
	// 友情链接管理
	Route::resource('link','Admin\LinkController');
	//活动管理
	Route::resource('active','Admin\ActiveController');
	//后台首页
	Route::resource('adminuser','Admin\AdminUserController');//用户管理
	Route::resource('users', 'Admin\UsersController');//会员管理
   	Route::resource('role', 'Admin\RoleController');//角色管理
   	Route::resource('auth', 'Admin\AuthController');//节点管理
    
   	Route::get('adminuser/loadRole/{uid}',"Admin\AdminUserController@loadRole");//获取角色

    Route::post('adminuser/saveRole',"Admin\AdminUserController@saveRole");//更改角色
    
    Route::get('role/loadAuth/{rid}',"Admin\RoleController@loadAuth");//节点
    //保存节点设置
    Route::post('role/saveAuth',"Admin\RoleController@saveAuth");

    //获取所有的商品
    Route::get('active/loadAuth/{id}',"Admin\ActiveController@loadAuth");
    //保存到商品
    Route::post('active/saveAuth',"Admin\ActiveController@saveAuth");

	//后台商品类别管理
	Route::resource('category','Admin\CategoryController'); 
	Route::post('category/update/{id}','Admin\CategoryController@update'); 
	//后台商品信息管理
	Route::resource('goods','Admin\GoodsController'); 
	Route::post('edgoods/{id}','Admin\GoodsController@edgoods');
	Route::get('gooddetail/add/{id}','Admin\GooddetailController@add');
	//添加子类
	Route::get('addchild/{pid}/{name}/{path}','Admin\CategoryController@addChild');
	//商品详情信息
	Route::resource('gooddetail','Admin\GooddetailController');
	Route::post('edgdetail/{id}','Admin\GooddetailController@edgdetail');
	//图片上传
	Route::post('upfile','Admin\GoodsController@upload');
});
