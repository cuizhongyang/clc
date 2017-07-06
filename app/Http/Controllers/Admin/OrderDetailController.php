<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\OrderDetail;

class OrderDetailController extends Controller
{
    //浏览未付款订单
    public function index1()
    {
    	//根据订单号搜索
    	$param = array();
    	if(!empty($_GET['guid'])){
    		$list = OrderDetail::where(["guid"=>$_GET['guid'],'order_status'=>1])->orderBy('guid','asc')->paginate(5);
    		$param['guid'] = $_GET['guid'];
    	}else{
    		$list = Orderdetail::where('order_status','1')->orderBy('guid','asc')->paginate(5);
    	}
    	return view("admin.orderdetail.index1",['list'=>$list,'param'=>$param]);
    }

    //待发货订单
    public function index2()
    {
    	//根据订单号搜索
    	$param = array();
    	if(!empty($_GET['guid'])){
    		$list = OrderDetail::where(["guid"=>$_GET['guid'],'order_status'=>2])->orderBy('guid','asc')->paginate(5);
    		$param['guid'] = $_GET['guid'];
    	}else{
    		$list = Orderdetail::where('order_status','2')->orderBy('guid','asc')->paginate(5);
    	}
    	return view("admin.orderdetail.index2",['list'=>$list,'param'=>$param]);
    }

    //待收货订单
    public function index3()
    {
    	//根据订单号搜索
    	$param = array();
    	if(!empty($_GET['guid'])){
    		$list = OrderDetail::where(["guid"=>$_GET['guid'],'order_status'=>3])->orderBy('guid','asc')->paginate(5);
    		$param['guid'] = $_GET['guid'];
    	}else{
    		$list = Orderdetail::where('order_status','3')->orderBy('guid','asc')->paginate(5);
    	}
    	return view("admin.orderdetail.index3",['list'=>$list,'param'=>$param]);
    }

    //待评论订单
    public function index4()
    {
    	//根据订单号搜索
    	$param = array();
    	if(!empty($_GET['guid'])){
    		$list = OrderDetail::where(["guid"=>$_GET['guid'],'order_status'=>4])->orderBy('guid','asc')->paginate(5);
    		$param['guid'] = $_GET['guid'];
    	}else{
    		$list = Orderdetail::where('order_status','4')->orderBy('guid','asc')->paginate(5);
    	}
    	return view("admin.orderdetail.index4",['list'=>$list,'param'=>$param]);
    }
    public function change($id)
    {
    	$data['order_status'] = 3;
    	$me =  OrderDetail::where("id",$id)->update($data);
    	if($me>0){
    		$info = "发货成功！";
    	}else{
    		$info = "发货失败！";
    	}
    	return redirect("admin/orderdetail/index2")->with('err',$info);
    }
}
