@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="{{url('admin/orders')}}">订单管理</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 订单信息总览</h3>
                  <!--搜索-->
                  <div class="box-tools">
                    <form action="{{url('admin/orderdetail/index1')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="gid" class="form-control input-sm pull-right" placeholder="订单编号"/>
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
                      <th>订单编号</th>
                      <th>用户编号</th>
                      <th>货品编号</th>
                      <th>货品名称</th>
                      <th>数量</th>
                      <th>单价</th>
                      <th>订单状态</th>
                      <th>退货状态</th>
                      <th>评论状态</th>
                      <th> 添加时间</th>
                    </tr>
                  
                    @foreach($list as $vo) 
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->guid }}</td>
                            <td>{{ $vo->uid }}</td>
                            <td>{{ $vo->gid }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->number }}</td>
                            <td>{{ $vo->price }}</td>
                            <td>
                                @if($vo->order_status == 3)
                                    待收货
                                @endif
                            </td>
                            <td>@if($vo->return_status ==1)不退货@endif</td>
                            <td>@if($vo->c_status ==1) 未评价 @endif</td>
                            <td>{{ $vo->addtime }}</td>
                            
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
    
   