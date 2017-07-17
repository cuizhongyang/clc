<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Gooddetail;
use App\Http\Model\Active;
use App\Http\Model\Goods;
use App\Http\Model\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DetailController extends Controller
{
    public function index($id,$price)
	{
		//活动导航
		$alist = Active::get();
		//商品图
		$pic = Goods::where('id',$id)->first();
		//添加点击量
		$data[] = $pic->toArray();
		$m = $data[0]['click']+1;
		$data[0]['click'] = $m;
		foreach($data as $v){
			$mm = $v;
		}
		$c = Goods::where('id',$id)->update($mm);
		//商品图片
		$picname = $pic->picname;
		//商品详情数据
		$gg = Gooddetail::where('gid',$id)->first();
		//看了又看
		$good = Goods::where('id',$gg->gid)->first();
		$cate = Category::where('id',$good->cid)->first();
		$goods = Goods::where('cid',$cate->id)->take(2)->get()->toArray();
		$goodss = Goods::where('cid',$cate->id)->get()->toArray();
		//dd($goodss);
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		//实例化collect方法
        $collection = new Collection($goodss);
        //定义一下每页显示多少个数据
        $perPage = 8;
        //获取当前需要显示的数据列表
        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();
        //创建一个新的分页方法
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
		$paginatedSearchResults = $paginatedSearchResults->setPath("/home/detail/{$id}/{$price}");
		//商品详情配置
		$plist = Gooddetail::where('gid',$id)->first();
		//dd($plist);
		
		//商品评论
		$commit = \DB::table('goodcommit')->where('gid',$id)->paginate(10);
		//好评
		$num1 = \DB::table('goodcommit')->where('gid',$id)->where('grage',1)->get();
		$n1 = count($num1);
		//中评
		$num2 = \DB::table('goodcommit')->where('gid',$id)->where('grage',2)->get();
		$n2 = count($num2);
		//差评
		$num3 = \DB::table('goodcommit')->where('gid',$id)->where('grage',3)->get();
		$n3 = count($num3);
		//全部评论
		$num4 = \DB::table('goodcommit')->where('gid',$id)->get();
		$n4 = count($num4);
		return view("home.index.detail",['list'=>$gg,'price'=>$price,'alist'=>$alist,'picname'=>$picname,'goods'=>$goods,'goodss'=>$paginatedSearchResults,'glist'=>$plist,'commit'=>$commit,'n1'=>$n1,'n2'=>$n2,'n3'=>$n3,'n4'=>$n4]);
	}
}











