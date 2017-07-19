<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Users;
use App\Http\Model\Orders;
use App\Http\Model\Address;
use App\Http\Model\OrderDetail;
use App\Http\Model\GoodCommit;

class OrderController extends Controller
{
   public function index()
   {
       if(empty(session('user'))){
         return view("home.login");  
       }
       $id = session('user')->id;
       $list = Orders::where('uid',$id)->get()->toArray();
       if(empty($list)){
           return back()->with('err','暂未有订单！');
       }
       foreach ($list as $vo){
           $res1[] = OrderDetail::where([['guid',$vo['id']],['order_status',1]])->get()->toArray();
           
       }
       foreach ($list as $vo){
           $res0[] = OrderDetail::where([['guid',$vo['id']],['order_status',0]])->get()->toArray();
           
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
       //list[0,1,2,3,4,5]=[已评论,交易成功,交易失败,未付款,已付款,待收货]
       return view("home.order.order",['list0'=>$res0,'list1'=>$res1,'list2'=>$res2,'list3'=>$res3,'list4'=>$res4,'list5'=>$res5]);
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
   public function pay($id)
   {
       $list = OrderDetail::where('guid',$id)->get()->toArray();
       foreach ($list as $vo){
           $r = $vo['uid'];
           $x = $vo['number'];
           $y = $vo['price'];
           $n[] = $x*$y;
       };
       $z = array_sum($n);
       $res = Address::where('uid',$r)->get()->toArray();
       return view("home.order.pay",['list'=>$list,'res'=>$res,'z'=>$z]);
   }
   public function dopay($id)
   {
       //支付
        $m = OrderDetail::where('guid',$id)->update(['order_status' => 4]);
        Orders::where('id',$id)->update(['pay_status'=>2]);
        if(!empty($m)) {
        return redirect("home/order")->with('err','支付成功！');
         }
        return redirect("home/order")->with('err','支付失败！');
   }
   public function dogoods($id)
   {
       $m = OrderDetail::where('guid',$id)->update(['order_status' => 1]);
        if(!empty($m)) {
        return back()->with('err','已确认！');
         }
        return back()->with('err','确认收货失败！');
   }
   public function commit($id)
   {
       $m = OrderDetail::where('gid',$id)->first()->toArray();
       //dd($m);
       return view("home.order.commit",['list'=>$m]);
   }
   public function update(Request $request,$id)
   {
        $data = $request->except('_token');
        $data['uid'] = session('user')->id;
        $data['gid'] = $id;
        if(empty(session('user')->name)){
           $data['name'] = '匿名';
        }else{
            $data['name'] = session('user')->name;
        }
        $data['addtime'] = Date("Y-m-d H:i:s",time());
        $id = GoodCommit::insertGetId($data);
        OrderDetail::where('gid',$id)->update(['order_status' => 0]);
        if($id>0){
            $info = "评论成功！";
        }else{
            $info = "评论失败！";
        }
        return redirect("home/order")->with('err', $info);
   }
}
