@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">商品信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 商品信息管理</h3>
                  <div class="box-tools">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="{{url('admin/goods')}}" method="get" class="form-inline">
                  <div class="form-group">
                      <label for="exampleInputName2"></label>
                      <input type="text" name="title" class="form-control" id="exampleInputName2" placeholder="商品名称">
                  </div>
                  <button type="submit" class="btn btn-default">搜索</button>
              </form>
              <br/>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">ID</th>
                      <th>类别</th>
                      <th>商品名称</th>
                      <th>商品图片</th>
                      <th>单价</th>
                      <th>状态</th>
                      <th>发布时间</th>
                      <th>点击量</th>
                      <th style="width:200px">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->cid}}</td>
                      <td>{{$v->title}}</td>
                      <td><img style="width:50px;height:50px;" src="{{asset($v->picname)}}"></td>
                      <td>{{$v->price}}</td>
                      <td>
                          @if($v->status == 0)
                              新上货
                          @elseif($v->status == 1)
                              正在出售
                          @elseif($v->status == 2)
                              缺货
                          @endif
                      </td>
                      <td>{{$v->addtime}}</td>
                      <td>{{$v->click}}</td>
                      <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button> 
                      <button onclick="window.location='{{url('admin/goods')}}/{{$v->id}}/edit'" class="btn btn-xs btn-primary">编辑</button>
                      <button class="btn btn-xs btn-success" onclick="window.location='{{url('admin/gooddetail/add')}}/{{$v->id}}'">添加详情</button>
                      </td>
                    </tr>
                    @endforeach  
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->appends($title)->render() !!}
                </div>
              </div><!-- /.box -->   
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    @endsection
    
    
    @section("myscript")
      <script type="text/javascript">
            function doDel(id){
                if(confirm('确定要删除吗？')){
                    $("#mydeleteform").attr("action","{{url('admin/goods')}}/"+id).submit(); 
                }
            }
      </script>
    @endsection