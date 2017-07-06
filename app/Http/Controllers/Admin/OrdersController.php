<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Orders;

class OrdersController extends Controller
{
    //浏览订单
    public function index()
    {
    	//根据订单号搜索
    	$param = array();
    	if(!empty($_GET['gid'])){
    		$list = Orders::where("gid","{$_GET['gid']}")->orderBy('pay_status','asc')->paginate(5);
    		$param['gid'] = $_GET['gid'];
    	}else{
    		$list = Orders::orderBy('pay_status','asc')->paginate(5);
    	}
    	return view("admin.orders.index",['list'=>$list,'param'=>$param]);
    }
}
