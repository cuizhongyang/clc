@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			商品信息管理
          </h1>
          <script type="text/javascript" src="{{asset('myadmin\dist\js\jquery-1.8.3.min.js')}}"></script>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">商品信息管理</a></li>
            <li class="active">添加商品信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加商品信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/goods')}}" method="post" id="art_form" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">类别：</label>
                      <div class="col-sm-4">
                        <select name="cid" class="form-control">
                          @foreach($lis as $v)
                              <option value="{{ $v['id'] }}">{{$v['name']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">商品名称：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="商品名称" name="title">
                      </div>
                    </div>  

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商品图片：</label>
                      <div class="col-sm-4">
                      <input type="text" hidden name="picname" id="art_thumb"  value="" >
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
                                    url: "/admin/upfile",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
                                        $('#img1').attr('src',"/"+data);
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
                      <label for="inputPassword3" class="col-sm-2 control-label">单价：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="单价" name="price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态：</label>
                      <div class="col-sm-4" style="margin-top:7px;">
                        <input type="radio"  name="status" value="0" checked />新上架  &nbsp; &nbsp; 
                        <input type="radio"  name="status" value="1" />正在热销  &nbsp; &nbsp;
                        <input type="radio"  name="status" value="2" />缺货
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
    				    <div class="col-sm-offset-2 col-sm-1">
    						<button type="submit" class="btn btn-primary">添加</button>
                </div>
      					<div class="col-sm-1">
      						<button type="reset" class="btn btn-primary">重置</button>
      					</div>
                      </div><!-- /.box-footer -->
                    </form>
    				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
                  </div><!-- /.box -->
       
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    @endsection