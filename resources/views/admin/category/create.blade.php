

 
@extends('admin.base')
    @section('content')
    <section class="content-header">
      <h1>
        类别添加表
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">类别信息</a></li>
        <li class="active">类别添加</li>
      </ol>
    </section>
    <section class="content">
          <div class="row">
            <div class="col-md-12">
    <!-- form start -->
    <div class="box">
    <div class="box-header with-border">
      <h3><i class="fa fa-th"></i> 类别信息添加</h3>
    </div>
    <form action="{{url('admin/category')}}" method="post" class="form-horizontal">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="pid" value="{{ isset($pid) ? $pid : '0' }}"/>
      <input type="hidden" name="path" value="{{ isset($path) ? $path : '0,' }}"/>
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">父类别名：</label>
          <div class="col-sm-4">
          <label for="inputEmail3" class="btn btn-primary">{{ isset($na) ? $na: '根类别' }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">类别名称：</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="类别名称" name="name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label"></label>
          <div class="col-sm-4">
            <input type="submit" class="btn btn-primary btn-lg active" id="inputPassword3" placeholder="提交">
            <input type="reset" class="btn btn-primary btn-lg active" id="inputPassword3" placeholder="重置">
          </div>
        </div>
      </div>
      </div>
      </div>><!-- /.box-body -->
    </form>
    </div>
@endsection 