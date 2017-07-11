<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Role;
use App\Http\Model\Auth;
use App\Http\Model\Relate;

class RoleController extends CommonController
{
    //分页浏览信息
    public function index(Request $request)
    {
        //dd('123123');
        //$db = \DB::table("role");

        //判断并封装搜索条件
        $where = [];
        if(!empty($_GET['name'])){
            $list = Role::where("name","like","%{$_GET['name']}%")->paginate(6);
            $where['name']=$_GET['name'];
        }else{
            $list = Role::paginate(6);
        }
       
        
        //$list = Role::paginate(3); //获取所有信息
        //dd($where);
        return view("admin.role.index",["list"=>$list,"where"=>$where]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        //return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.role.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|between:2,18',
        ],['name.required' => '角色不能为空！',
        'name.between'=>'角色名必须为2到18位！',]);
       
        //获取指定的部分数据
        $data = $request->only("name");
        $data['addtime'] = date("Y-m-d H:i:s",time());
        $data['updated_at'] = null;
        $id = Role::insertGetId($data);
        
        if($id>0){
            return redirect('admin/role')->with('err', '添加成功！');;
        }else{
           return back()->with("err","添加失败!");
        }
    }
    
    //执行删除
    public function destroy($id)
    {
        Role::where("id",$id)->delete();

        return redirect('admin/role')->with('err', '已删除！');;
    }
    
    //加载修改表单
    public function edit($id)
    {
        $role = Role::where("id",$id)->first(); //获取要编辑的信息
        return view("admin.role.edit",["vo"=>$role]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|between:2,18',
        ],['name.required' => '角色不能为空！',
        'name.between' => '角色名必须为2到18位！']);
        $data = $request->only("name");
        $data['updated_at'] = date("Y-m-d H:i:s",time());
        $id = Role::where("id",$id)->update($data);
        
        if($id>0){
            return redirect('admin/role')->with('err', '修改成功！');
        }else{
            return back()->with("err","修改失败!");
        }
        
    }
    
    //为当前角色准备分配节点信息
    public function loadAuth($rid=0)
    {
       
        //获取所有节点信息
        $list = Auth::get();
        
        //获取当前角色的节点id
        $aids = Relate::where("role_id",$rid)->pluck("auth_id")->toArray();
        
        //加载模板
        return view("admin.role.authlist",["rid"=>$rid,"authlist"=>$list,"aids"=>$aids]);
    }
    
    public function saveAuth(Request $request){
        $rid = $request->input("rid");
        //清除数据
        Relate::where("role_id",$rid)->delete();
        
        $aids = $request->input("aids");
        if(!empty($aids)){
            //处理添加数据
            $data = [];
            foreach($aids as $v){
                $data[] = ["role_id"=>$rid,"auth_id"=>$v];
            }
            //添加数据
            Relate::insert($data);
        }
        return "节点保存成功!";
    }
}
