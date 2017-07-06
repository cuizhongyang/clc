<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\GoodsReturn;

class GoodsReturnController extends Controller
{
    //退货待审核
    public function index1()
    {
    	$param = array();
    	if(!empty($_GET['order_detail_id'])){
    		$list = GoodsReturn::where(["order_detail_id"=>$_GET['order_detail_id'],'status'=>1])->orderBy('order_detail_id','asc')->paginate(5);
    		$param['order_detail_id'] = $_GET['order_detail_id'];
    	}else{
    		$list = GoodsReturn::where('status','1')->orderBy('order_detail_id','asc')->paginate(5);
    	}
    	return view("admin.goodsreturn.index1",['list'=>$list,'param'=>$param]);
    }

    //审核退货
    public function check($id,$type)
    {
    	//return $id."+".$type;die();
    	if($type==1){
    		$data['status'] = 2;
    		$me =  GoodsReturn::where("id",$id)->update($data);
    		if($me>0){
    			$info = "审核通过！";
    		}
    	}else{
    		$data['status'] = 3;
    		$me =  GoodsReturn::where("id",$id)->update($data);
    		if($me>0){
    			$info = "审核不通过！";
    		}
    	}
    	return redirect("admin/goodsreturn/index1")->with('err',$info);
    }
    //显示退货审核成功
    public function index2()
    {
    	$param = array();
    	if(!empty($_GET['order_detail_id'])){
    		$list = GoodsReturn::where(["order_detail_id"=>$_GET['order_detail_id'],'status'=>2])->orderBy('order_detail_id','asc')->paginate(5);
    		$param['order_detail_id'] = $_GET['order_detail_id'];
    	}else{
    		$list = GoodsReturn::where('status','2')->orderBy('order_detail_id','asc')->paginate(5);
    	}
    	return view("admin.goodsreturn.index2",['list'=>$list,'param'=>$param]);
    }
    //显示退货审核失败
    public function index3()
    {
    	$param = array();
    	if(!empty($_GET['order_detail_id'])){
    		$list = GoodsReturn::where(["order_detail_id"=>$_GET['order_detail_id'],'status'=>3])->orderBy('order_detail_id','asc')->paginate(5);
    		$param['order_detail_id'] = $_GET['order_detail_id'];
    	}else{
    		$list = GoodsReturn::where('status','3')->orderBy('order_detail_id','asc')->paginate(5);
    	}
    	return view("admin.goodsreturn.index3",['list'=>$list,'param'=>$param]);
    }
    //退款成功
    public function index4()
    {
    	$param = array();
    	if(!empty($_GET['order_detail_id'])){
    		$list = GoodsReturn::where(["order_detail_id"=>$_GET['order_detail_id'],'status'=>4])->orderBy('order_detail_id','asc')->paginate(5);
    		$param['order_detail_id'] = $_GET['order_detail_id'];
    	}else{
    		$list = GoodsReturn::where('status','4')->orderBy('order_detail_id','asc')->paginate(5);
    	}
    	return view("admin.goodsreturn.index4",['list'=>$list,'param'=>$param]);
    }

}
