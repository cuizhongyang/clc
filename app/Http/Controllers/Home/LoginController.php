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
        if(!empty($user)){
            if(($user->status)==1){
                //判断密码
                if(Hash::check($password,$user->password)){
                    //存储session跳转页面
                    session()->set("user",$user);
                    return redirect("/");
                }else{
                    return back()->with("errors","密码错误！");
                }
            }else{
                return back()->with("errors","账号未激活！");
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
            'email' => 'required',
            'password' => 'required|between:6,18',
            'repassword' => 'required|between:6,18',
        ],[ 
            'email.required'=>'邮箱不能为空！',
            'password.required'=>'密码不能为空！',
            'password.between'=>'密码必须为6到18位！',
            'repassword.required'=>'重复密码不能为空！',
            'repassword.between'=>'重复密码必须为6到18位！',]);
        //判断重复密码
        if($request->input("password")!=$request->input("repassword")){
            return back()->with("errors","密码和重复密码不一致!");
        }
        //dd('123123');


        $data= $request->only("email");
        //注册唯一性判断
        if(Users::where('email',$data['email'])->first()){
            return back()->with('errors','该邮箱已被注册！');
        }
        $data['password'] = Hash::make($request->input('password'));
        $data['token'] = Hash::make($request->input('password'));
        $data['addtime'] = date("Y-m-d H:i:s",time());
        $id = Registered::insertGetId($data);
        if($id>0){
            Users::insertGetId($data);
            $user = Users::where("email",$data['email'])->first();
            \Mail::send('email.active', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, $user->email)->subject('激活clc商城账号!');
            });
            $info = " 注册成功！";
        }else{
            $info = " 注册失败！";
        }
        $user = Users::where("email",$data['email'])->first();
        if(($user->status) == 0){
            return redirect("home/login")->with('errors', '请去邮箱激活！');
        }
    }
    
    
    public function active(Request $request)
    {
      $user =   Users::find($request['id']);
      //dd($user->status);
      if($user->token  == $request['token']){
            // 如果验证成功，将用户的激活状态改为1
            $data = $user->toArray();
            $data['status'] = 1;
           $re =  $user->where('id',$data['id'])->update($data);
           if($re){
               return redirect('home/login')->with('errors','已激活，请登录！');
           }else{
               return '激活失败，请再次检查激活邮件';
           }
      }else{
          return '非法请求';
      }
    }
    //找回密码界面
    public function forget()
    {
        return view('home.register.forget');
    }

    public function doforget(Request $request)
    {
        $user = Users::where('email',$request->email)->first();
        if($user){
            \Mail::send('email.forget', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('找回密码!');
            });
        }else{
            echo "无效邮箱";
        }

    }

    //重置密码界面
    public function reset(Request $request)
    {
        //根据id 获取要重置密码的用户
        $user = Users::find($request->input('id'));
        //重置密码页面
        return view('home.register.reset',compact('user'));
    }

    //重置密码界面
    public function doreset(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|between:6,18',
            'repassword' => 'required|between:6,18',
        ],[ 
            'password.required'=>'密码不能为空！',
            'password.between'=>'密码必须为6到18位！',
            'repassword.required'=>'重复密码不能为空！',
            'repassword.between'=>'重复密码必须为6到18位！',]);
        //判断重复密码
        if($request->input("password")!=$request->input("repassword")){
            return back()->with("errors","密码和重复密码不一致!");
        }
        
        
        $input = $request->except('_token','repassword');
        $user = Users::find($input['id']);
        
        
        Hash::check($password,$input->password)
        
        
        $user_pass = \Crypt::encrypt($input['password']);
        $re =  $user->update(['password'=>$user_pass]);
        if($re){
            return redirect('/home/login');
        }else{
            echo "修改失败";
        }
    }
    
    //执行退出
    public function loginout(Request $request)
    {
       $request->session()->forget('user');
       return redirect("/");
    }
   
}   