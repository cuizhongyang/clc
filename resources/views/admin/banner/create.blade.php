@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			        轮播图管理
          </h1>
          <script src="{{asset('myadmin/dist/js/jquery-1.8.3.min.js')}}" type="text/javascript"></script>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="{{ url("admin/banner") }}">轮播图管理</a></li>
            <li class="active">添加轮播图</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加轮播图</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/banner')}}" method="post" enctype="multipart/form-data" id="art_form" class="form-horizontal">
                  {{csrf_field()}}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">标题：</label>
                      <div class="col-sm-4">
                        <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="标题">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-4">
                        <!-- <input type="file" name="picname" class="form-control" id="inputEmail3" placeholder="密码"> -->
                        
                        <input type="text" name="picname" id="art_thumb"  value="" >
                        <input type="file" name="file_upload" id="file_upload" value="">
                       <p><img src="" alt="" id="img1" style="width:100px" hidden></p>


                        <script>
                            $(function () {
                                $("#file_upload").change(function () {
                                    $('img1').show();
                                    uploadImage();
                                });
                            });



                            function uploadImage() {
//                            判断是否有选择上传文件
                                var imgPath = $("#file_upload").val();
                                if (imgPath == "") {
                                    alert("请选择上传图片！");
                                    return;
                                }
                                //判断上传文件的后缀名
                                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                if (strExtension != 'jpg' && strExtension != 'gif'
                                    && strExtension != 'png' && strExtension != 'bmp') {
                                    alert("请选择图片文件");
                                    return;
                                }
                                var formData = new FormData($('#art_form')[0]);
                                $.ajax({
                                    type: "post",
                                    url: "/admin/upload",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
                                        $('#img1').attr('src','/'+data);
                                        $('#img1').show();
                                        $('#art_thumb').val(data);


                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                            }

                        </script>

                   
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">状态：</label>
                      <div class="col-sm-4">
                        <select name="status" class="form-control">
                            <option value="1">启用</option>
                            <option value="2">禁用</option>
                        </select>
                      </div>
                    </div>
                     
                     
                 
                  <div class="box-footer">
          				    <div class="col-sm-offset-2 col-sm-1">
          						  <button type="submit" class="btn btn-primary">添加</button>
                      </div>
          					<div class="col-sm-1">
          						<button type="reset" class="btn btn-primary">重置</button>
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