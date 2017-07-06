<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Link;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $list = Link::get();
        //dd($list);
        return view("admin.link.index",['list'=>$list]);

    }
    //加载添加页面
    public function create()
    {
    	return view("admin.link.create");
    }
     //执行用户信息添加
    public function store(Request $request)
    {
        
        $data= $request->only("name","url");
        $data['addtime'] = date("Y-m-d H:i:s",time());
        $id = Link::insertGetId($data);
        if($id>0){
            $info = " 信息添加成功！";
        }else{
            $info = "信息添加失败！";
        }
        return redirect("admin/link")->with('err', $info);
    }
    //执行删除
    public function destroy(Request $request,$id)
    {
        $m =  Link::where('id',$id)->delete();
        if($m>0){
            $info = "删除成功！";
        }else{
            $info = "删除失败！";
        }
        return redirect("/admin/link")->with("err",$info);
    }
    //加载编辑页面
    public function edit($id)
    {
        //加载添加页面
        $list = Link::where('id',$id)->get();
       return view("admin.link.edit",['vo'=>$list]);
    }
    //执行修改
    public function update(Request $request, $id)
    {
        $data= $request->only("name","url");
        $id = Link::where('id',$id)->update($data);
        if($id>0){
            $info = " 信息修改成功！";
        }else{
            $info = "信息修改失败！";
        }
        
        return redirect("admin/link")->with('err', $info);
    }

}
