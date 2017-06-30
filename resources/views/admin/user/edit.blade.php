@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			       后台用户信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">后台用户管理</a></li>
            <li class="active">修改用户信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改用户信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @foreach($vo as $k)
                <form action="{{url('admin/adminuser')}}/{{ $k['id'] }}" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">姓名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" value="{{ $k['name'] }}" class="form-control" id="inputEmail3" placeholder="姓名">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">手机号：</label>
                      <div class="col-sm-4">
                        <input type="text" value="{{ $k['phone'] }}" name="phone" class="form-control" id="inputEmail3" placeholder="手机号">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">角色：</label>
                      <div class="col-sm-4">
                        <select name="role" class="form-control" id="inputEmail3">
                          <option value="{{ $k['role'] }}"><option>
                        <select>
                      </div>
                    </div>
                     
                 
                  <div class="box-footer">
          				    <div class="col-sm-offset-2 col-sm-1">
          						  <button type="submit" class="btn btn-primary">修改</button>
                      </div>
          					<div class="col-sm-1">
          						<button type="submit" class="btn btn-primary">重置</button>
          					</div>
                  </div><!-- /.box-footer -->
                </form>
                @endforeach
        				<div class="row">
                  <div class="col-sm-12">&nbsp;</div>
                </div>
              </div><!-- /.box -->
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
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    @endsection