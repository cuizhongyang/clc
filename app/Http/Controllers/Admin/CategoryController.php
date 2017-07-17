<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //加载商品类别
	public function index(Request $request)
	{
        $list=Category::get()->toArray();
        $a = $this->get_attr($list,0);
        $clist = niubi($a);
        //dd($clist);
       foreach($clist as &$v){
            $m = substr_count($v['path'],","); //获取path中的逗号
            //生成缩进
            $v['name'] = str_repeat("&nbsp;",($m-1)*8).'|--'.$v['name'];
        }
       //dd($clist);
		return view('admin.category.index',['clist'=>$clist]);
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
        //路径判断添加
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



    //加载修改视图
    public function edit($id)
    {
        $list=Category::where('id',$id)->get();
        return view("admin.category.edit",['list'=>$list]);
    }

    public function update(Request $request,$id)
    {
       // dd(Input::all());
       $data['name'] = $request->input('name');
       $re = Category::where('id',$id)->update($data);
       //dd($re);
       if($re>0){
            $info = "修改成功！";
       }else{
            $info = "修改失败！";
       }
       return redirect("admin/category")->with('err',$info);
    }
    //加载添加子类页面
    public function addChild($pid,$name,$path)
    {
        $na = ltrim($name);
        return view("admin/category/create",['pid'=>$pid,'path'=>$path,'na'=>$na]);
        
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

    public function destroy($id)
    {
        //判断是否有子类
        $a=Category::where('pid',$id)->count();
        if($a>0){
            return back()->with('err',"禁止删除");
        }
        //执行删除
        Category::where('id',$id)->delete();
        return redirect('admin/category')->with('err',"删除成功!");
    } 

}