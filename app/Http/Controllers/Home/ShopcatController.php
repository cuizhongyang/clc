<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Shopcat;
use App\Http\Model\Goods;
use Illuminate\Support\Facades\Session;

class ShopcatController extends Controller
{
	public function add(Request $request)
	{
		if (!$request->session()->has('user')) {
		 	return view('home.login');
		 }elseif(Shopcat::where('id',$request->input('id'))->first()){
			$lis = Shopcat::where('id',$id)->first();
			//dd($lis);
			$list=Shopcat::insert($lis);
			return view('home.shopcat.index',['list'=>$list]);
		 }
	}
}