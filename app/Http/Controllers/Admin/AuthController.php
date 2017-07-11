<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Auth;

class AuthController extends CommonController
{
    //分页浏览信息
    public function index(Request $request)
    {
        
        //判断并封装搜索条件
        $where = array();
        if(!empty($_GET['name'])){
            $list = Auth::where("name","like","%{$_GET['name']}%")->paginate(6);
            $where['name']=$_GET['name'];
        }else{
            $list = Auth::paginate(6);
        }
        return view("admin.auth.index",["list"=>$list,"where"=>$where]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        //return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.auth.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|between:2,18',
        ],['name.required' => '节点名不能为空！',
        'name.between' => '节点名必须为2到18位！']);
       
        //获取指定的部分数据
        $data = $request->only("name","method","url");
        
        $id = Auth::insertGetId($data);
        
        if($id>0){
            return redirect('admin/auth')->with("err","添加成功!");
        }else{
           return back()->with("err","添加失败!");
        }
    }
    
    //执行删除
    public function destroy($id)
    {
        Auth::where("id",$id)->delete();

        return redirect('admin/auth')->with("err","删除成功!");
    }
    
    //加载修改表单
    public function edit($id)
    {
        $auth = Auth::where("id",$id)->first(); //获取要编辑的信息
        //dd($auth);
        return view("admin.auth.edit",["vo"=>$auth]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        //表单验证
         $this->validate($request, [
            'name' => 'required|between:2,18',
        ],['name.required' => '节点名不能为空！',
        'name.between' => '节点名必须为2到18位！']);
        
        $data = $request->only("name","method","url");
        //$data['updated_at'] = time();
        $id = Auth::where("id",$id)->update($data);
        
        if($id>0){
            return redirect("admin/auth")->with("err","修改成功!");
             
        }else{
            return back()->with("err","修改失败!");
        }
        
    }
}
