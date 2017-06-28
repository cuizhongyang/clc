@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">管理信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 管理员信息管理</h3>
                  <!--搜索-->
                  <div class="box-tools">
                    <form action="{{url('admin/adminuser')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="姓名"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>

                  &nbsp; <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/users/create')}}'">发布信息</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>姓名</th>
                      <th>手机</th>
                      <th>角色</th>
                      <th>添加时间</th>
                      <th>最后修改时间</th>
                      <th style="width: 170px">操作</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->phone }}</td>
                            <td>{{ $vo->role }}</td>
                            <td>{{ $vo->created_at }}</td>
                            <td>{{ $vo->updated_at }}</td>
                            <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button> 
                               <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/users')}}/{{ $vo->id }}/edit'">编辑</button>
                               <button class="btn btn-xs btn-success" onclick="loadRole({{ $vo->id}},'{{ $vo->name}}')">分配角色</button></td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->appends($param)->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="/users/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           <!-- 此处填充 --->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveRole()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('/admin/adminuser')}}/"+id;
                    form.submit(); 
                }
              });
        }
        
        //加载角色信息
        function loadRole(uid,name){
            $("#exampleModalLabel").html(name+"的角色分配");
            $("#exampleModal").modal("show");
            $.ajax({
                url:"{{URL('admin/users/loadRole')}}/"+uid,
                type:"get",
                dataType:"html",
                async:true,
                success:function(data){
                  $("#exampleModal .modal-body").html(data);   
                },
             });
        }
        
        //保存角色信息
        function saveRole(){
            $.ajax({
                url:"{{URL('admin/users/saveRole')}}",
                type:"post",
                dataType:"html",
                data:$("#rolelistform").serialize() ,
                async:true,
                success:function(data){
                    $('#exampleModal').modal('hide');
                    Modal.alert({msg:data,title: ' 信息提示',btnok: '确定',btncl:'取消'});
                },
             });
             
        }
    </script>
    @endsection