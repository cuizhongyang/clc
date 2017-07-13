<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Users;
use App\Http\Model\Address;

class AddressController extends Controller
{
    //加载地址至视图
    public function index()
    {
        $id = session('user')->id;
        $name = session('user')->name;
        $address = Address::where('uid',$id)->get();
        return view("home.address.address",['address'=>$address,$name]);
    }
    public function show($id)
    {
        // return '123123';
    }
    public function del($id)
    {
        // 删除操作
        $m =  Address::where('id',$id)->first()->delete();
        // 判断返回结果
        if(!empty($m)) {
            return back()->with('err','删除成功！');
        }
        return back()->with('err','删除失败！');
    }
    public function edit($id)
    {
        // 获取单挑数据
        $result = Address::where('id',$id)->get();;
        if(empty($result)) {
            $result = [];
        }
        return view('home.address.edit',['list' => $result]);
    }
    //修改地址
    public function doedit(Request $request,$id)
    {
        $this->validate($request, [
           'name' => 'required|between:2,18',
            'phone' => 'required|between:11,11',
            'address' => 'required|between:8,24'
        ],['name.required'=>'姓名不能为空',
            'name.between'=>'姓名必须为2到18位',
            'phone.required'=>'手机号不能为空',
            'phone.between'=>'手机号必须为11位',
            'address.required'=>'地址不能为空',
            'address.between'=>'地址必须为8到24位',
            ]);
        $data = $request->except('_token');
        //dd($data);
        // 设置默认
        if(count($data) == 1) {
           $this->address->update(['user_id'=>\Session::get('user')->user_id],['status'=>1]);
       }
        // 修改操作
        $result = Address::where('id',$id)->update($data);
        //dd($result);
        // 判断返回结果
        if(!empty($result)) {
            // 成功
            return redirect('home/address')->with('err','修改成功！');
        }else{
        // 失败
        return back()->with('err','修改失败！');
        }
    }
    public function create(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|between:2,18',
            'phone' => 'required|between:11,11',
            'address' => 'required|between:8,24'
        ],['name.required'=>'姓名不能为空',
            'name.between'=>'姓名必须为2到18位',
            'phone.required'=>'手机号不能为空',
            'phone.between'=>'手机号必须为11位',
            'address.required'=>'地址不能为空',
            'address.between'=>'地址必须为8到24位',
            ]);
        
        $data= $request->only("uid","name","phone","address");
        $data['addtime'] = date("Y-m-d H:i:s",time());
         
        $id = Address::insertGetId($data);
        if($id>0){
           return redirect('home/address')->with('err','添加成功！'); 
        }else{
        // 失败
        return back()->with('err','添加失败！');
        }
    }
}
