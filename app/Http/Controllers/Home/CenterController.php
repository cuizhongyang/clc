<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Users;
use App\Http\Model\Address;

class CenterController extends Controller
{
    //加载后台首页
    public function index()
    {
        if(session('user')){
        return view("home.center");
        }else{
            return redirect("home/login")->with('errors', '请先登录！');
        }
    }
    public function information()
    {
       
        return view("home.information");
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'between:2,18',
           'nickname' => 'between:2,18',
            'phone' => 'between:11,11',
        ],['name.between'=>'姓名必须为2到18位',
            'nickname.between'=>'昵称必须为2到18位',
            'phone.between'=>'手机号必须为11位',]);
        $data= $request->only("name","age","sex","nickname","phone");
        if($request->get("art_thumb")){
            $data['picname'] = $request->get("art_thumb");
        }
        if(!$data['name']){
            $data['name'] = null;
        }
        if(!$data['age']){
            $data['age'] = null;
        }
        if(!$data['nickname']){
            $data['nickname'] = null;
        }
        if(!$data['phone']){
            $data['phone'] = null;
        }
        
        $res = Users::where('id',$id)->update($data);
        $user = Users::where("id",$id)->first();
        session()->forget('user');
        session()->set("user",$user);
        if($res>0){
            $info = " 修改成功！";
        }else{
            $info = " 修改失败！";
        }
        
        return redirect("home/center/information")->with('err', $info);
    }
     public function upload(Request $request)
    {
        //dd($id);
        $file = $request->file('file_upload');
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path = $file->move(public_path().'/uploads',$newName);
            
             //$disk = \Storage::disk('qiniu');
             //$disk->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));
            
            $filepath = 'uploads/'.$newName;
            return  $filepath;
        }
    }
    public function address()
    {
        $id = session('user')->id;
        $name = session('user')->name;
        $address = Address::where('uid',$id)->get();
        //dd($address);
        return view("home.address",['address'=>$address,$name]);
    }
    public function qq()
    {
        return view("home.qq");
    }
}
