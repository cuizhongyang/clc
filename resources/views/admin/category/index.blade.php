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
            <li><a href="#">类别信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3><i class="fa fa-th"></i> 类别信息管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
               
              <br/>
                  <table class="table table-bordered">
                    <tr>
                      <th>类别id号</th>
                       <th>类别名称</th>
                      <th>父类别id号</th>
                      <th>路径</th>
                      <th style="width: 300px">操作</th>
                    </tr>
                    @foreach($clist as $v)
                    <tr>
                      <td>{{$v['id']}}</td>
                      <td>{{$v['name']}}</td>
                      <td>{{$v['pid']}}</td>
                      <td>{{$v['path']}}</td>
                      <td><button onclick="doDel({{$v['id']}})" class="btn btn-xs btn-danger">删除</button> 
                      <button onclick="window.location='{{URL('/admin/category')}}/{{ $v['id'] }}/edit'" class="btn btn-xs btn-primary">编辑</button>
                      <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/addchild')}}/{{$v['id']}}/{{$v['name']}}/{{$v['path']}}{{$v['id']}}'">添加子分类</button></td>
                    </tr>
                    @endforeach
                  
                   
                  </table>
                </div><!-- /.box-body -->
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           <!-- 此处填充 -->
          </div>
          
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg:'是否删除此类别？'}).on(function (e){
                if(e){
                    var form = document.getElementById("mydeleteform");
                    form.action = "{{URL('/admin/category')}}/"+id;
                    form.submit(); 
                }
            });
        }
        
    </script>
    @endsection