@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="{{url('admin/orders')}}">退货管理</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 退货信息</h3>
                  <!--搜索-->
                  <div class="box-tools">
                    <form action="{{url('admin/goodsreturn/index1')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="order_detail_id" class="form-control input-sm pull-right" placeholder="订单详情编号"/>
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
                      <th>用户编号</th>
                      <th>货品编号</th>
                      <th>订单详情编号</th>
                      <th>数量</th>
                      <th>单价</th>
                      <th>退货原因</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th>操作</th>
                    </tr>
                  
                    @foreach($list as $vo) 
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->uid }}</td>
                            <td>{{ $vo->gid }}</td>
                            <td>{{ $vo->order_detail_id }}</td>
                            <td>{{ $vo->number }}</td>
                            <td>{{ $vo->money }}</td>
                            <td>{{ $vo->reason }}</td>
                            <td>
                                @if($vo->status == 1)
                                    待审核
                                @endif
                            </td>
                            <td>{{ $vo->addtime }}</td>
                            <td>
                              <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/goodsreturn/check')}}/{{ $vo->id }}/1'">审核成功</button>
                              <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/goodsreturn/check')}}/{{ $vo->id }}/2'">审核失败</button>
                               <!-- <button class="btn btn-xs btn-primary" href="{{URL('/admin/index2/orderdetail/change/')}}/{{$vo->id}}">试试</button> -->
                            </td>
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