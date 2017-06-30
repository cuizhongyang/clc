@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">购物车信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 购物车信息管理</h3>
                  <!--搜索-->
                  <div class="box-tools">
                    <form action="{{url('admin/shopcat')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="uid" class="form-control input-sm pull-right" placeholder="用户编号"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>

                  &nbsp; <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/shopcat')}}'">浏览信息</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>用户编号</th>
                      <th>货品编号</th>
                      <th>货品名称</th>
                      <th>数量</th>
                      <th>单价</th>
                      <th>添加时间</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->uid }}</td>
                            <td>{{ $vo->gid }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->number }}</td>
                            <td>{{ $vo->price }}</td>
                            <td>{{ $vo->addtime }}</td>
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
    
    