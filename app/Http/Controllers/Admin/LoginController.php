<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Model\Users;
use App\Http\Model\Adminuser;
use App\Http\Model\Auth;
use App\Http\Model\Role;
use Hash;

class LoginController extends Controller
{
   //加载登录模板
   public function login()
   {
       return view("admin.login");
   }
   
   //执行用户登录
   public function doLogin(Request $request)
   {
        //执行验证码判断
        $mycode = $request->input("mycode");
        $yanzhengma = $request->session()->get('phrase');
        if($mycode !== $yanzhengma){
            return back()->with("msg","验证码错误！".$mycode.":".$yanzhengma);
        }
        
        //执行登陆判断
        $name = $request->input("name");
        $password = $request->input("password");
        //获取对应用户信息
        $user = Adminuser::where("name",$name)->first();
        //dd($user->password);
        if(!empty($user)){
            //判断密码
            if(Hash::check($password,$user->password)){  
                //存储session跳转页面
                session()->set("adminuser",$user);
                return redirect("admin");
                //echo "测试成功!";
            }
        }
        return back()->with("msg","账号或密码错误！");
   }
   
   //加载验证码
   public function getCode()
   {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        //$builder->build(4);
        //$builder->build($width = 100, $height = 40);
        
        \Session::set('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
   }
   
   //执行退出
   public function logout(Request $request)
   {
       $request->session()->forget('adminuser');
       //dd(session('adminuser'));
       return redirect("admin/login");
   }
}
