<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Gooddetail;
use App\Http\Model\Goods;
use Illuminate\Support\Facades\Input;

class GooddetailController extends Controller
{
    //加载浏览
    public function index(Request $request)
    {
        $where=array();
        //模糊搜索，分页
        if($request->has("name")){
            $name=$request->input('name');
            $list=Gooddetail::where('name',"like","%{$name}%")->paginate(5);
            $where['name']=$name;
        }else{
        
        $list=Gooddetail::paginate(5);
        }
        return view('admin.gooddetail.index',['list'=>$list,'name'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //加载添加页面
    public function add($id)
    {
        $lis=Goods::where("id",$id)->get();
        return view('admin.gooddetail.create',['lis'=>$lis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加
    public function store(Request $request)
    {
        //dd(Input::all());
        //获取要添加的数据
        $a=$request->except('_token','file_upload');
        $a['addtime'] = date("Y-m-d H:i:s",time());
        $id=Gooddetail::insert($a);

        return redirect('admin/gooddetail')->with('err','添加成功');
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
    //加载修改视图
    public function edit($id)
    {
       $list = Gooddetail::where("id",$id)->first();
        //将类别id转为类别名称
        $name = Goods::where('id',$list->gid)->value('title');
        return view('admin.gooddetail.edit',["v"=>$list,'title'=>$name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //执行修改
    public function edgdetail(Request $request, $id)
    {
        //dd(Input::all());
        $input=$request->except('_token',"file_upload");

        $re=Gooddetail::where('id',$id)->update($input);
        if($re>0){
            $info= "修改成功!";
        }else{
            $info= "修改失败!";
        }
        return redirect('admin/gooddetail')->with($info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //执行删除
    public function destroy($id)
    {
        $re=Gooddetail::where('id',$id)->delete();
        return redirect('admin/gooddetail')->with('err','删除成功');
    }
}
