<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;

class CategoryController extends Controller
{
    //加载商品类别
	public function index()
	{
		$list=Category::get();
		//dd($list);
		// $db=\DB::table('category');
		// $list=$db->get();
		//处理信息
        foreach($list as &$v){
            $m = substr_count($v->path,","); //获取path中的逗号
            //生成缩进
            $v->name = str_repeat("&nbsp;",($m-1)*8)."|--".$v->name;
        }
		return view('admin.category.index',['list'=>$list]);
	}

	//加载类别添加
	public function create()
	{
		$list=Category::get();
        return view("admin.category.create",['list'=>$list]);
	}

	//执行添加
	public function store(Request $request)
	{
		//获取要添加的数据
        $data['name'] = $request->input("name");
        $data['pid'] = $request->input("pid");
        //dd($data);
        if($data['pid']==0){
            $data['path']="0,";
        }else{
            $type = Category::where("id",$data['pid'])->first();
            $data['path'] = $type->path.$data['pid'].",";
        }
        //执行添加
        $id = Category::insertGetId($data);
        //判断
        if($id>0){
            $info = "类别信息添加成功！";
        }else{
            $info = "类别信息添加失败！";
        }
        
        return redirect("admin/category")->with("err",$info);
	}

	public function destroy($id)
	{
		return 233;
	}
}
