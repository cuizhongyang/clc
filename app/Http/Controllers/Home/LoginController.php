<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Model\Users;
use App\Http\Model\Registered;
use Hash;

class LoginController extends Controller
{
   //加载登录模板
   public function login()
   {
       return view("home.login");
   }
   //执行登录
    public function doLogin(Request $request)
   {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|between:6,18',
        ],[ 'email.required' => '邮箱不能为空！',
            'password.required' => '密码不能为空！',
            'password.between' => '密码必须为6到18位！',]);
        //执行登陆判断
        $email = $request->input("email");
        $password = $request->input("password");
        //获取对应用户信息
        $user = Users::where("email",$email)->first();
        //dd($user->password);
        if(!empty($user)){
            //dd($user->password);
            //判断密码
            if(Hash::check($password,$user->password)){
                //dd($user->password);
                //存储session跳转页面
                session()->set("user",$user);
                return redirect("/");
                //echo "测试成功!";
            }else{
                return back()->with("errors","密码错误！");
            }
        }
        return back()->with("errors","账号不存在！");
   }
   
   //加载注册模板
   public function register()
   {
       return view("home.register");
   }
   //执行注册
   public function doregister(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|between:6,18',
            'repassword' => 'required|between:6,18',
        ],['password.required'=>'密码不能为空！',
            'password.between'=>'密码必须为6到18位！',
            'repassword.required'=>'重复密码不能为空！',
            'repassword.between'=>'重复密码必须为6到18位！',]);
        //判断重复密码
        if($request->input("password")!=$request->input("repassword")){
            return back()->with("errors","密码和重复密码不一致!");
        }
        //dd('123123');


        $data= $request->only("email");
        $data['password'] = Hash::make($request->input('password'));
        $data['addtime'] = date("Y-m-d H:i:s",time());
        //dd($data['addtime']);
        $id = Registered::insertGetId($data);
        if($id>0){
            Users::insertGetId($data);
            $info = " 注册成功！";
        }else{
            $info = " 注册失败！";
        }
        $user = Registered::where("email",$data['email'])->first();
        //dd($user);
        session()->set("user",$user);
        return redirect("/")->with('errors', $info);
    }
    
    //执行退出
    public function loginout(Request $request)
    {
       $request->session()->forget('user');
       //dd(session('user'));
       return redirect("/");
    }
   
}   