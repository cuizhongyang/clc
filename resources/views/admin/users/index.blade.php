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
                  <h3 class="box-title"><i class="fa fa-th"></i> 会员信息管理</h3>
                  <!--搜索-->
                  <div class="box-tools">
                    <form action="{{url('admin/users')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="姓名"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>

                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>姓名</th>
                      <th>手机</th>
                      <th>头像</th>
                      <th>性别</th>
                      <th>年龄</th>
                      <th>邮箱</th>
                      <th>注册时间</th>
                      <th>状态</th>
                      <th style="width: 170px">操作</th>
                    </tr>
                    @foreach($list as $vo) 
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->phone }}</td>
                            <td><img style="width:50px;height:50px;" src="/{{ $vo->picname }} "/></td>
                            <td>
                                @if($vo->sex == 1)
                                    男
                                @elseif($vo->sex == 2)
                                    保密
                                @elseif($vo->sex == 0)
                                    女
                                @endif
                            </td>
                            <td>{{ $vo->age }}</td>
                            <td>{{ $vo->email }}</td>
                            <td>{{ $vo->addtime }}</td>
                            <td>{{ ($vo->status == 1)?"已封禁":"使用中" }}</td>
                            <td><!--<button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})"></button> -->
                               <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/users')}}/{{ $vo->id }}/edit'">更改状态</button>
                               </td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->appends($where)->render() !!}
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
           <!-- 在此处填充 -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveRole()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>
    
    @endsection