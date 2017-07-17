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

class IndexController extends Controller
{
    //加载前台首页
    public function index()       
    {
		//轮播图
		$ba = Banner::get();
		//网站配置
		$a = WebConfig::get()->toArray()[0];
		\Session()->set('config',$a);
		//导航
		$cate = Category::get()->toArray();
		$cates = $this->get_attr($cate,0);
		//活动导航
		$alist = Active::get();
		//商城活动商品
			$kk = Active::find(1)->Goods->take(3)->toArray();
			$k1 = Active::find(2)->Goods->take(5)->toArray();
			$k2 = Active::find(3)->Goods->take(5)->toArray();
			//dd($kk);
		//友情链接
		$link = Link::get()->toArray();
		\Session()->set('link',$link);
		//dd(session('link'));
    	return view("home.index.index",['ba'=>$ba,'cates'=>$cates,'alist'=>$alist,'glist'=>$kk,'kk1'=>$k1,'kk2'=>$k2]);
    }
	
	//无限分类树
    public function get_attr($a,$pid){  
        $tree = array();   
        foreach($a as $v){  
            if($v['pid'] == $pid){                    
                $v['children'] = $this->get_attr($a,$v['id']);  
                if($v['children'] == null){  
                    unset($v['children']);              
                }  
                $tree[] = $v;                           
            }  
        }  
            return $tree;                                 
    }
}
