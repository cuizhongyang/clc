@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			角色信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">信息管理</a></li>
            <li class="active">编辑信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 编辑活动信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @foreach($list as $vo)
                <form class="form-horizontal" action="{{URL('admin/active')}}/{{ $vo->id }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
                      <div class="col-sm-4">
                        <input type="text" name="title" class="form-control" value="{{ $vo->title }}">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动描述</label>
                      <div class="col-sm-4">
                        <input type="text" name="content"  value="{{ $vo->content }}" class="form-control" placeholder="活动描述">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动规则</label>
                      <div class="col-sm-4">
                        <input type="text" name="rule"  value="{{ $vo->rule }}" class="form-control" placeholder="活动规则">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">状态</label>
                      <div class="col-sm-4">
                        <select name="status" class="form-control">
                            <option value="1" {{ ($vo->status)==1?"selected":"" }}>启用</option>
                            <option  value="2" {{ ($vo->status)==2?"selected":"" }}>停止</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
        				    <div class="col-sm-offset-2 col-sm-1">
        						<button type="submit" class="btn btn-primary">保存</button>
                  </div>
        					<div class="col-sm-1">
        						<button type="reset" class="btn btn-primary">重置</button>
        					</div>
                  </div><!-- /.box-footer -->
                </form>
                @endforeach
        				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
        				<div class="row"><div class="col-sm-12">
                <br/>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                </div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
  