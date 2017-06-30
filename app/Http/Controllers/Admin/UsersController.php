<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Users;
use App\Http\Model\Address;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   //浏览信息
    public function index(Request $request)
    {
        $where = array();
        if(!empty($_GET['name'])){
            $list = Users::where("name","like","%{$_GET['name']}%")->paginate(6);
            $where['name']=$_GET['name'];
        }else{
            $list = Users::paginate(6);
        }
        //$m = Users::paginate(3);
        //dd($m);
        return view("admin.users.index",['list'=>$list,'where'=>$where]);

    }

   
    public function create()
    {
        return view("admin.users.create");
    }

    
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
        //加载更改页面
        $list = Users::where('id',$id)->get();
        //dd($list);
       return view("admin.users.edit",['vo'=>$list]);
    }

    
    public function update(Request $request, $id)
    {
        $res['status'] = $request->input("status");
        //dd($res);
        
        $v = Users::where('id',$id)->update($res);
        //dd("$v");
        if($v){
            $info = " 修改成功！";
        }else{
            $info = "修改失败！";
        }
        
        return redirect("admin/users")->with('err', $info);
    }
    
    
}
