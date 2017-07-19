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
                    <form action="{{url('admin/orders')}}" method="get">
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
                      <th>用户编号</th>
                      <th>订单编号</th>
                      <th>收货地址</th>
                      <th>支付交易号</th>
                      <th>支付方式</th>
                      <th>支付状态</th>
                      <th>总金额</th>
                      <th> 添加时间</th>
                      <th>操作</th>
                    </tr>
                  
                    @foreach($list as $vo) 
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->uid }}</td>
                            <td>{{ $vo->gid }}</td>
                            <td>{{ $vo->address }}</td>
                            <td>{{ $vo->pay_transaction }}</td>
                            <td>{{ $vo->pay_type }}</td>
                            <td>
                              @if($vo->pay_status==1)
                                已付款 
                              @elseif($vo->pay_status==2)
                                未付款
                              @endif
                            </td>
                            <td>{{ $vo->total_amout }}</td>
                            <td>{{ $vo->addtime }}</td>
                            <td><!--<button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})"></button> -->
                               <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/order/detail')}}/{{ $vo->id }}'">查看详情</button>
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