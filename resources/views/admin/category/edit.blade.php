@extends('admin.base')
@section('content')
<section class="content-header">
          <h1>
             商品分类管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">分类管理</a></li>
            <li class="active">分类修改</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
          <!-- right column -->
          <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></i> 修改分类</h3>
          </div><!-- /.box-header -->
        @foreach($list as $v)
        <form action="{{url('admin/category/update')}}/{{ $v->id }}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">类别名称：</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="name" id="inputPassword3" placeholder="类别名称" value="{{ $v->name }}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label"></label>
                <div class="col-sm-4">
                  <input type="submit" class="btn btn-primary btn-lg active" id="inputPassword3" placeholder="提交">
                </div>
              </div>
            </div>
        </form>
        </section>
        @endforeach
@endsection