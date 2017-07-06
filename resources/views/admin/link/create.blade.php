@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			       友情链接管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="{{url("admin/link")}}">友情链接管理</a></li>
            <li class="active">添加友情链接</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加友情链接</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/link')}}" method="post" class="form-horizontal">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">链接名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="例如：百度">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">链接地址：</label>
                      <div class="col-sm-4">
                        <input type="text" name="url" class="form-control" id="inputEmail3" placeholder="例如：http://www.baidu.com">
                      </div>
                    </div>
                     
                     
                 
                  <div class="box-footer">
          				    <div class="col-sm-offset-2 col-sm-1">
          						  <button type="submit" class="btn btn-primary">添加</button>
                      </div>
          					<div class="col-sm-1">
          						<button type="submit" class="btn btn-primary">重置</button>
          					</div>
                  </div><!-- /.box-footer -->
                </form>
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