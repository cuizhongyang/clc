<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Shopcat;
use App\Http\Model\Goods;
use App\Http\Model\Orders;
use App\Http\Model\OrderDetail;
use App\Http\Model\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Cart;

class ShopcatController extends Controller
{
	public function add(Request $request)
	{
		if (!$request->session()->has('user')) {
	 	 	return view('home.login');
	 	 }
	 	$gid = $_GET['id'];
	 	$uid = session('user')->id;
	 	$price = $_GET['price'];
	 	$number =  $_GET['number'];
	 	$lis = Goods::where('id',$gid)->first();
	 	//$list = array('uid'=>session('user')->id,'gid'=>$gid,'name'=>$lis->title,'number'=>$number,'price'=>$price,'picname'=>$lis->picname);
	 	//dd($list);
	 	$picname = $lis->picname;
       Cart::add($gid,$lis->title,$number,$price,['size'=>$picname]);
	 	return redirect('home/shopcat/cart');
       
	 	
	 }

	 public function cart()
	 {
	 	
	 	$carts = Cart::content();
	 	//dd($carts);
        //总额 不含税
        $total = Cart::subtotal();
        //购物车商品数量
        $count = Cart::count();

        return view('home.shopcat.cart',['carts'=>$carts,'total'=>$total,'count'=>$count]);
	 }

	 public function index(Request $request)
	 {
	 	if (!$request->session()->has('user')) {
	 	 	return view('home.login');
	 	 }
	 	$data = Cart::content()->toArray();
	 	//dd($data);
	 	foreach($data as $v){
	 		$gid[] = $v['id'];
	 	}
	 	$carts = Cart::content();
	 	//$gid = $data['gid'];
	 	//dd($gid);
        //总额 不含税
        $total = Cart::subtotal();
        //购物车商品数量
        $count = Cart::count();
       // dd($count);
        return view('home.shopcat.cart',['carts'=>$carts,'total'=>$total,'count'=>$count]);
	 }

	 public function del($rowId)
	 {
	 	//dd($rowId);
        Cart::remove($rowId);
        return redirect('home/shopcat/index');
	 } 

	 public function doit()
	 {
	 	$res = Address::where('uid',session('user')->id)->where('status',1)->first();
	 	if($res==null){
	 		$list['address'] = '请添加地址';
	 	}else{
	 		$list['address'] = $res->address;
	 	}
	 	$goodid = Cart::content()->toArray();
	 	//dd($goodid);
	 	foreach($goodid as $k){
	 		$id = $k['id'];
	 		$name = $k['name'];
	 		$price = $k['price'];
	 		$picname = $k['options']['size'];

	 	}
	 	$data = Cart::content()->toArray();
	 	$list['uid'] = session('user')->id;
	 	$list['gid'] = 0;
	 	
	 	$list['total_amout'] = Cart::subtotal();
	 	$list['addtime'] = date('Y-m-d H:i:s',time());
	 	$m = Orders::insertGetId($list);
	 	
		$tlist['uid'] = session('user')->id;
		$tlist['gid'] = $id;
		$tlist['order_status'] = 3;
		$tlist['name'] = $name;
		$tlist['number'] = Cart::count();
		$tlist['price'] = $price;
		$tlist['return_status'] = 1;
		$tlist['c_status'] = 0;
		$tlist['picname'] = $picname;
		$tlist['addtime'] =  date('Y-m-d H:i:s',time());
	 	
	 	$dlist = OrderDetail::insertGetId($tlist);

		if($dlist>0){
	 		Cart::destroy();
	 	}
	 	return redirect('/home/order')->with('err','请在订单管理结算');
	}
	
}