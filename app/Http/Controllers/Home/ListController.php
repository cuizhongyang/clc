<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Banner;
use App\Http\Model\WebConfig;
use App\Http\Model\Category;
use App\Http\Model\Active;
use App\Http\Model\Active_goods;
use App\Http\Model\Goods;
use App\Http\Model\Link;
use App\Http\Model\Gooddetail;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ListController extends Controller
{
	//list页面入口
    public function index1($id)
	{
		$lst =Active_goods::where('active_id',$id)->get();
		foreach($lst as $v){
			$n[] = Goods::where('id',$v->goods_id)->get()->toArray();
		}
        //获取当前的分页数
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
		//实例化collect方法
        $collection = new Collection($n);
        //定义一下每页显示多少个数据
        $perPage = 8;
        //获取当前需要显示的数据列表
        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();
        //创建一个新的分页方法
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
		$paginatedSearchResults = $paginatedSearchResults->setPath("/home/list/index1/{$id}");
		//foreach()
		//dd($paginatedSearchResults);
		//导航栏
		$tlist = Active::get();
		//店主推荐
		$slit = Goods::get()->take(2);
		//dd($slit);
		return view("home.index.list",['alist'=>$paginatedSearchResults,'slit'=>$slit,'tlist'=>$tlist]);
	}
	
	public function index2($id)
	{
		
		//导航栏
		$tlist = Active::get();
		//店主推荐
		$slit = Goods::get()->take(2);
		$mm = Goods::where('cid',$id)->paginate(8)->toArray();
		//dd($mm['data']);
		foreach($mm['data'] as $n){	
			$nn[][] = $n;
		}
		//dd($nn);
		 $currentPage = LengthAwarePaginator::resolveCurrentPage();
		//实例化collect方法
        $collection = new Collection($nn);
        //定义一下每页显示多少个数据
        $perPage = 8;
        //获取当前需要显示的数据列表
        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();
        //创建一个新的分页方法
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
		$paginatedSearchResults = $paginatedSearchResults->setPath("/home/list/index1/{$id}");
		//dd($paginatedSearchResults);
		return  view("home.index.list1",['alist'=>$paginatedSearchResults,'slit'=>$slit,'tlist'=>$tlist]);
	}
	public function index3(Request $request)
	{
			//导航栏
			$tlist = Active::get();
			//店主推荐
			$slit = Goods::get()->take(2);
			//按品牌搜索
			$gl = Category::where('name','like',"%{$_GET['key']}%")->get();
			foreach($gl as $g1){
				$n1[] =Goods::where('cid',$g1->id)->get()->toArray();
			}
			//dd($n1);
			foreach($n1 as $v){
				foreach($v as $v1){
					$nn[][] = $v1;
				}
			}
			//dd($nn);
			$currentPage = LengthAwarePaginator::resolveCurrentPage();
			//实例化collect方法
			$collection = new Collection($nn);
			//定义一下每页显示多少个数据
			$perPage = 8;
			//获取当前需要显示的数据列表
			$currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();
			//创建一个新的分页方法
			$paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
			$paginatedSearchResults = $paginatedSearchResults->setPath("/home/list/index3?key={$_GET['key']}");
			//dd($paginatedSearchResults);
			return  view("home.index.list1",['alist'=>$paginatedSearchResults,'slit'=>$slit,'tlist'=>$tlist]);
			//dd($nn);
		
	}
	
	
	
	
	
	
	
	
	
	
}
