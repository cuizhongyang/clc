<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Banner::paginate(8);
        //dd($list);
        return view("admin.banner.index",['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.banner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->only("title","picname","status");
        $data['addtime'] = date("Y-m-d H:i:s",time());
        //dd($data);
        $id = Banner::insertGetId($data);
        if($id>0){
            $info = " 信息添加成功！";
        }else{
            $info = "信息添加失败！";
        }
        return redirect("admin/banner")->with('err', $info);
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
        $list = Banner::where('id',$id)->get();
        return view("admin.banner.edit",['vo'=>$list]); 
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
        $data= $request->only("title","picname","status");
        $id = Banner::where("id",$id)->update($data);
        if($id>0){
            $info = " 信息修改成功！";
        }else{
            $info = "信息修改失败！";
        }
        return redirect("admin/banner")->with('err', $info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m =  Banner::where('id',$id)->delete();
        if($m>0){
            $info = "删除成功！";
        }else{
            $info = "删除失败！";
        }
        return redirect("/admin/banner")->with('err',$info);
    }
    //执行图片上传处理
    public function upload(Request $request)
    {
     
        $file = $request->file('file_upload');
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path = $file->move(public_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
            return  $filepath;
        }
    }
    
}
