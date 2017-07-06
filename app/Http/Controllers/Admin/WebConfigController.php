<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\WebConfig;


class WebConfigController extends Controller
{
    public function index()
    {
        $list = WebConfig::paginate(8);
        //dd($list);
        return view("admin.webconfig.index",['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.webconfig.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->except("_token","file_upload");
        $data['addtime'] = date("Y-m-d H:i:s",time());
        $id = WebConfig::insertGetId($data);
        if($id>0){
            $info = " 信息添加成功！";
        }else{
            $info = "信息添加失败！";
        }
        return redirect("admin/webconfig")->with('err', $info);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = WebConfig::where('id',$id)->get();
        return view("admin.webconfig.edit",['vo'=>$list]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doedit(Request $request, $id)
    {
        $data= $request->except("_token","file_upload");
        $id = WebConfig::where("id",$id)->update($data);
        if($id>0){
            $info = " 信息修改成功！";
        }else{
            $info = "信息修改失败！";
        }
        return redirect("admin/webconfig")->with('err', $info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m =  WebConfig::where('id',$id)->delete();
        if($m>0){
            $info = "删除成功！";
        }else{
            $info = "删除失败！";
        }
        return redirect("/admin/webconfig")->with('err',$info);
    }
    
}
