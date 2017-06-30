
    <!-- form start -->
    <div class="box">
    <form action="{{url('admin/category')}}" method="post" id="myaddform" class="form-horizontal">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="pid" value="0"/>
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">父类别名：</label>
          <div class="col-sm-4">
            <select name="pid" class="btn btn-default dropdown-toggle">
                @foreach($list as $v)
                  <option value="0" class="btn btn-primary">根类别</option>
                  <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
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
          </div>
        </div>
      </div><!-- /.box-body -->
    </form>
    </div>
