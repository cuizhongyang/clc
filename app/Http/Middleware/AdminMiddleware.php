<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Model\Adminuser;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断后台用户是否没有登录
        if(!$request->session()->has('adminuser')){
            return redirect('admin/login');
            //die();
        }
            
        //判断是否是超级用户
        if(session("adminuser")->name=="admin"){
            return $next($request);
        }
        
        $roles =  Adminuser::find(session('adminuser')->id)->role()->get();
        $arr = [];
        foreach($roles as $k=>$v){
        $p =  $v->auth()->get();
        foreach($p as $m=>$n){
               $arr[] = $n->url;
           }
        }
       
        $res = array_unique($arr);
        $route =   \Route::current()->getActionName();
        //echo $route;
        //判断权限
        if(!in_array($route,$res)){
            return redirect('error');
        }
        return $next($request);
    }
   
}
