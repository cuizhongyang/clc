<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Orders;
use App\Http\Model\OrderDetail;

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
	//查看订单详情
	public function detail($id)
	{
		$res = OrderDetail::where('guid',$id)->get()->toArray();
		//dd($res);
		return view("admin.orders.info",["res"=>$res]);
		
	}
}
