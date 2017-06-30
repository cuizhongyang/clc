<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\AdminUser;
use Hash;

class AdminUserController extends Controller
{
    //浏览信息
    public function index(Request $request)
    {
        //dd($_GET['name']);
        $param = array();
        if(!empty($_GET['name'])){
            $m = AdminUser::where("name","like","%{$_GET['name']}%")->paginate(6);
            $param['name']=$_GET['name'];
        }else{
             $m = AdminUser::paginate(6);
        }

        //$m = AdminUser::paginate(6);
        //dd($m);
        return view("admin.user.index",['list'=>$m,'param'=>$param]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "ok";
      return view("admin.user.create");
    }

    //执行用户信息添加
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:16',
            //'email' => 'required|email',
            'phone' => 'required|max:11|min:8',
            'password' => 'required|max:20|min:6',
        ]);
        //判断重复密码
        if($request->input("password")!=$request->input("repassword")){
            return back()->with("err","密码和重复密码不一致!");
        }


        $data= $request->only("name","phone");
        $data['password'] = Hash::make($request->input('password'));
        $data['created_at'] = date("Y-m-d H:i:s",time());
        //dd($data['created_at']);
        $id = AdminUser::insertGetId($data);
        if($id>0){
            $info = " 信息添加成功！";
        }else{
            $info = "信息添加失败！";
        }
        $request->session()->flash('err', $info);
        return redirect("admin/adminuser");

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
        //加载添加页面
        $list = AdminUser::where('id',$id)->get();

       return view("admin.user.edit",['vo'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|max:16',
            'phone' => 'required|max:11|min:8',
        ]);
        $data= $request->only("name","phone");
        $data['updated_at'] = date("Y-m-d H:i:s",time());
        //dd($data['created_at']);
        $id = AdminUser::where('id',$id)->update($data);
        if($id>0){
            $info = " 信息修改成功！";
        }else{
            $info = "信息修改失败！";
        }
        $request->session()->flash('err', $info);
        return redirect("admin/adminuser");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $m =  AdminUser::where('id',$id)->delete();
        //dd($m);
        if($m>0){
            $info = "删除成功！";
        }else{
            $info = "删除失败！";
        }
         $request->session()->flash('err', $info);
        return redirect("/admin/adminuser");
    }
}
