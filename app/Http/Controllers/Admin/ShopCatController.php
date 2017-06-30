<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\ShopCat;

class ShopCatController extends Controller
{
    //浏览购物车
	public function index()
	{
		 //dd($_GET['name']);
        $param = array();
        if(!empty($_GET['uid'])){
            $list = ShopCat::where("uid","{$_GET['uid']}")->orderBy('uid','desc')->paginate(10);
            $param['uid']=$_GET['uid'];
        }else{
             $list = ShopCat::orderBy('uid','asc')->paginate(10);
        }
		return view("admin.shopcat.index",['list'=>$list,'param'=>$param]);
	}
}
