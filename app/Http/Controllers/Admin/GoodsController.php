<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Goods;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;


class GoodsController extends Controller
{
    //执行上传
    public function upload()
        {
            $file = Input::file('file_upload');
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;//新文件名
                $path = $file->move(public_path().'/uploads',$newName);//上传路径
                $filepath = 'uploads/'.$newName;
                return  $filepath;
            }
        }

    //浏览信息
    public function index(Request $request)
    {
        $where=array();
        //模糊搜索，分页
        if($request->has("title")){
            $title=$request->input('title');
            $list=Goods::where('title',"like","%{$title}%")->paginate(5);
            $where['title']=$title;
        }else{
        $list=Goods::paginate(5);
        }
        //将类别id转为类别名称
        foreach($list as &$v){
            $name = Category::where('id',$v->cid)->value('name');
            $v->cid = $name;
        }
        //dd($list);
        return view('admin.Goods.index',['list'=>$list,'title'=>$where]);
    }


    //加载添加页面
    public function create()
    {
        $lis=Category::get()->toArray();
        $b = $this->get_attr($lis,0);
        $clist = niubi($b);
        //dd($clist);
        foreach($clist as &$v){
            $m = substr_count($v['path'],","); //获取path中的逗号
            //生成缩进
            $v['name'] = str_repeat("&nbsp;",($m-1)*8).'|--'.$v['name'];
        }
        //dd($clist);
        return view('admin.goods.create',['lis'=>$clist]);
    }


    //执行添加
    public function store(Request $request)
    {
        //dd(Input::all());
        $a=$request->except('_token','file_upload');
       //dd($a);
        $a['addtime'] = date("Y-m-d H:i:s",time());
        //$a['price']=0;
        $id=Goods::insert($a);
        return redirect('admin/goods')->with('err','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //获取要编辑的信息
    public function edit($id)
    {
        $list = Goods::where("id",$id)->first();
        //将类别id转为类别名称
        $name = Category::where('id',$list->cid)->value('name');
        return view("admin.goods.edit",["v"=>$list,'name'=>$name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //执行修改
    public function edgoods(Request $request, $id)
    {
        //dd(Input::all());
        $input=$request->except('_token','_method','file_upload');
        $re=Goods::where('id',$id)->update($input);
        if($re){
            $info= "修改成功!";
        }else{
            $info= "修改失败!";
        }
        return redirect('admin/goods')->with($info);
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
        $re=Goods::where('id',$id)->delete();
        return redirect('admin/goods')->with('err','删除成功');
    }



    //无限分类树
    public function get_attr($a,$pid){  
        $tree = array();   
        foreach($a as $v){  
            if($v['pid'] == $pid){                    
                $v['children'] = $this->get_attr($a,$v['id']);  
                if($v['children'] == null){  
                    unset($v['children']);              
                }  
                $tree[] = $v;                           
            }  
        }  
            return $tree;                                 
    }
}
