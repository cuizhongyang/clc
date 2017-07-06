<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\AdminUser;
use App\Http\Model\Role;
use App\Http\Model\User_role;
use Hash;

class AdminUserController extends Controller
{
    //浏览信息
    public function index(Request $request)
    {
        $where = array();
        if(!empty($_GET['name'])){
            $list = AdminUser::where("name","like","%{$_GET['name']}%")->paginate(6);
            $where['name']=$_GET['name'];
        }else{
            $list = AdminUser::paginate(6);
        }
        //$m = AdminUser::paginate(3);
        //dd($m);
        return view("admin.user.index",['list'=>$list,'where'=>$where]);

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
            'name' => 'required|between:2,18',
            'phone' => 'required|between:11,11',
            'password' => 'required|between:6,18',
        ],['name.required'=>'姓名不能为空',
            'name.between'=>'姓名必须为2到18位',
            'phone.required'=>'手机号不能为空',
            'phone.between'=>'手机号必须为11位',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码必须为6到18位',]);
        //判断重复密码
        if($request->input("password")!=$request->input("repassword")){
            return back()->with("err","密码和重复密码不一致!");
        }


        $data= $request->only("name","phone");
        $data['password'] = Hash::make($request->input('password'));
        $data['addtime'] = date("Y-m-d H:i:s",time());
        //dd($data['addtime']);
        $id = AdminUser::insertGetId($data);
        if($id>0){
            $info = " 用户添加成功！";
        }else{
            $info = "用户添加失败！";
        }
        return redirect("admin/adminuser")->with('err', $info);
        //$request->session()->forget('err');
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
           'name' => 'required|between:2,18',
            'phone' => 'required|between:11,11',
        ],['name.required'=>'姓名不能为空',
            'name.between'=>'姓名必须为2到18位',
            'phone.required'=>'手机号不能为空',
            'phone.between'=>'手机号必须为11位',]);
        $data= $request->only("name","phone");
        $data['updated_at'] = date("Y-m-d H:i:s",time());
        $id = AdminUser::where('id',$id)->update($data);
        if($id>0){
            $info = " 修改成功！";
        }else{
            $info = " 修改失败！";
        }
        
        return redirect("admin/adminuser")->with('err', $info);
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
    //为当前用户准备分配角色信息
    public function loadRole($uid=0)
    {
        //return '123123';die();
        //dd($uid);
       
        //获取所有角色信息
        //$rolelist = \DB::table("role")->get();
        $rolelist = Role::all();
        //dd($rolelist);
        //获取当前用户的角色id
         //\DB::table("user_role")->
        $rids =User_role::where('uid','=',$uid)->pluck("rid")->toArray();
        //dd($rids);
        
        //$rids = array('0' => 4 , '1' => 5 );
        //加载模板
        return view("admin.user.rolelist",["uid"=>$uid,"rolelist"=>$rolelist,"rids"=>$rids]);
    }
    
    public function saveRole(Request $request){
        $uid = $request->input("uid");
        //清除数据
        User_role::where("uid",$uid)->delete();
        
        $rids = $request->input("rids");
        if(!empty($rids)){
            //处理添加数据
            $data = [];
            foreach($rids as $v){
                $data[] = ["uid"=>$uid,"rid"=>$v];
            }
            //添加数据
            User_role::insert($data);
        }
        return "角色保存成功!";
    }
}
