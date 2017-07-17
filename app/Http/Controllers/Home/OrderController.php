<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Users;
use App\Http\Model\Orders;
use App\Http\Model\OrderDetail;

class OrderController extends Controller
{
   public function index()
   {
       if(empty(session('user'))){
         return view("home.login");  
       }
       $id = session('user')->id;
       $list = Orders::where('uid',$id)->get()->toArray();
       foreach ($list as $vo){
           $res1[] = OrderDetail::where([['guid',$vo['id']],['order_status',1]])->get()->toArray();
           
       }
       foreach ($list as $vo){
           $res2[] = OrderDetail::where([['guid',$vo['id']],['order_status',2]])->get()->toArray();
           
       }
       foreach ($list as $vo){
           $res3[] = OrderDetail::where([['guid',$vo['id']],['order_status',3]])->get()->toArray();
           
       }
       foreach ($list as $vo){
           $res4[] = OrderDetail::where([['guid',$vo['id']],['order_status',4]])->get()->toArray();
           
       }
       foreach ($list as $vo){
           $res5[] = OrderDetail::where([['guid',$vo['id']],['order_status',5]])->get()->toArray();
           
       }
       //list[1,2,3,4,5]=[交易成功,交易失败,未付款,已付款,待收货]
       return view("home.order.order",['list1'=>$res1,'list2'=>$res2,'list3'=>$res3,'list4'=>$res4,'list5'=>$res5]);
   }
    public function info()
   {
       return view("home.order.orderinfo");
   }
   public function dodel($id)
   {
       // 删除操作
        OrderDetail::where('guid',$id)->delete();
        $m =  Orders::where('id',$id)->first()->delete();
        // 判断返回结果
        if(!empty($m)) {
            return back()->with('err','删除成功！');
        }
        return back()->with('err','删除失败！');
   }
   public function dopay($id)
   {
       //支付 
        $m = OrderDetail::where('guid',$id)->update(['order_status' => 4]);
        if(!empty($m)) {
        return back()->with('err','支付成功！');
         }
        return back()->with('err','支付失败！');
   }
   public function dogoods($id)
   {
       $m = OrderDetail::where('guid',$id)->update(['order_status' => 1]);
        if(!empty($m)) {
        return back()->with('err','已确认！');
         }
        return back()->with('err','确认收货失败！');
   }
}
