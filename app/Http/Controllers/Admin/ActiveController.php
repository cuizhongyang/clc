<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Active;

class ActiveController extends Controller
{
	//活动浏览
    public function index(Request $request)
    {
    	$where = array();
        if(!empty($_GET['title'])){
            $list = Active::where("title","like","%{$_GET['title']}%")->paginate(6);
            $where['title']=$_GET['title'];
        }else{
            $list = Active::paginate(6);
        }
    	return view("admin.active.index",['list'=>$list,'where'=>$where]);
    }
    //加载添加活动页面
    public function create()
    {
    	return view("admin.active.add");
    }

    //执行添加
    public function store(Request $request)
    {

        $data= $request->except("_token");
        $data['addtime'] = date("Y-m-d H:i:s",time());
        //dd($data);
        $id = Active::insertGetId($data);
        if($id>0){
            $info = " 活动添加成功！";
            return redirect("admin/active")->with('err', $info);
        }else{
            $info = "活动添加失败！";
            return back()->with('err', $info);
        } 
    }
    //执行删除
     public function destroy(Request $request,$id)
    {
        $m =  Active::where('id',$id)->delete();
        //dd($m);
        if($m>0){
            $info = "删除成功！";
        }else{
            $info = "删除失败！";
        }
         $request->session()->flash('err', $info);
        return redirect("/admin/active");
    }

    //加载编辑页
    public function edit($id)
    {
        //加载添加页面
        $list = Active::where('id',$id)->get();
       // dd($list);
       return view("admin.active.edit",['list'=>$list]);
    }
    //执行修改
    public function update(Request $request, $id)
    {
        $data= $request->except("_token","_method");
        $id = Active::where('id',$id)->update($data);
        if($id>0){
            $info = " 修改成功！";
        }else{
            $info = " 修改失败！";
        }
        
        return redirect("admin/active")->with('err', $info);
    }

     //为当前活动准备参加的商品
    public function loadAuth($id=0)
    {
        //dd('123123');
        //获取所有节点信息
        $list = Auth::get();
        //dd($list);
        //$authlist = \DB::table("auth")->get();
        // foreach($list as $authlist){
            
        // }
        //dd($authlist);
        //获取当前角色的节点id
        $aids = Relate::where("rid",$rid)->pluck("aid")->toArray();
        //$rids =User_role::where('uid','=',$uid)->pluck("rid")->toArray();
        // dd($aids);
        //加载模板
        return view("admin.role.authlist",["rid"=>$rid,"authlist"=>$list,"aids"=>$aids]);
    }
   
}
