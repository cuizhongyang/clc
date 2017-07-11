<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>网站后台管理</title>
    <!-- 告诉浏览器响应屏幕宽度 -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="{{asset('myadmin/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="{{asset('myadmin/bootstrap/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{asset('myadmin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('myadmin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('myadmin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('myadmin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('myadmin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('myadmin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{asset('myadmin/bootstrap/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('myadmin/bootstrap/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- 对于侧边栏迷你50x50像素迷你标志 -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- 正常状态和移动设备标识 -->
          <span class="logo-lg">网站后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">切换导航</span>
          </a> 
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('myadmin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{ session('adminuser')->name }}</p>

              <a href="{{url('admin/logout')}}"><i class="fa fa-circle text-success"></i>退出</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">主导航</li>
           	<li class="active treeview">
              <a href="#">
                <i class="fa fa-gittip"></i><span>用户管理</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{URL('admin/users')}}"><i class="fa fa-youtube-play"></i> 前台会员管理</a></li>
                <li class="active"><a href="{{URL('admin/adminuser')}}"><i class="fa fa-youtube-play"></i> 后台用户管理</a></li>
                <li class="active treeview">
                <a href="#"> <i class="fa fa-youtube-play"></i> <span> 用户权限管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li class="active"><a href="{{URL('admin/role')}}"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                <li class="active"><a href="{{URL('admin/auth')}}"><i class="fa fa-circle-o"></i> 节点管理</a></li>
                 </ul>
                </li>
              </ul>
            </li>
            
            <li class="active treeview">
            <a href="#">
                <i class="fa fa-gittip"></i> <span> 类别信息管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			  <li class="active"><a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i> 浏览类别</a></li>
                <li class="active"><a href="{{url('admin/category/create')}}"><i class="fa fa-circle-o"></i> 添加类别</a></li>
              </ul>
	         </li>
           <li class="active treeview">
              <a href="#">
                <i class="fa fa-gittip"></i> <span> 商品信息管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('admin/goods')}}"><i class="fa fa-circle-o"></i> 浏览商品</a></li>
                <li><a href="{{url('admin/goods/create')}}"><i class="fa fa-circle-o"></i> 添加商品</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-gittip"></i> <span> 商品详情管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('admin/gooddetail')}}"><i class="fa fa-circle-o"></i> 浏览详情</a></li>
                <li><a href="{{url('admin/gooddetail/create')}}"><i class="fa fa-circle-o"></i> 添加详情商品</a></li>
              </ul>
            </li>
                <!-- 订单总览 -->
                <li class="active"><a href="{{url('admin/orders')}}"><i class="fa fa-circle-o"></i> 订单管理</a></li>
                <!-- 订单详情开始 -->
                <li class="active treeview">
                  <a href="#">
                     <i class="fa fa-gittip"></i> <span> 订单详情</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="active"><a href="{{url('admin/orderdetail/index1')}}"><i class="fa fa-circle-o"></i>未付款订单 </a></li>
                     <li class="active"><a href="{{url('admin/orderdetail/index2')}}"><i class="fa fa-circle-o"></i>待发货订单 </a></li>
                     <li class="active"><a href="{{url('admin/orderdetail/index3')}}"><i class="fa fa-circle-o"></i>待收货订单 </a></li>
                     <li class="active"><a href="{{url('admin/orderdetail/index4')}}"><i class="fa fa-circle-o"></i>待评价订单 </a></li>
                  </ul>
                </li> 
                <!-- 订单详情结束 -->
                <!-- 退货详情 -->
                <li class="active treeview">
                  <a href="#">
                     <i class="fa fa-gittip"></i> <span> 退货详情</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="active"><a href="{{url('admin/goodsreturn/index1')}}"><i class="fa fa-circle-o"></i>待审核 </a></li>
                     <li class="active"><a href="{{url('admin/goodsreturn/index2')}}"><i class="fa fa-circle-o"></i>审核成功 </a></li>
                     <li class="active"><a href="{{url('admin/goodsreturn/index3')}}"><i class="fa fa-circle-o"></i>审核失败 </a></li>
                     <li class="active"><a href="{{url('admin/goodsreturn/index4')}}"><i class="fa fa-circle-o"></i>退款成功 </a></li>
                  </ul>
                </li> 
                <!-- 退货详情结束 -->
	          </li> 
	          <li class="active treeview">
              <a href="{{ url("admin/shopcat") }}">
                <i class="fa fa-gittip"></i> <span> 购物车管理</span>
              </a>
	          </li>
            <!-- 网站配置 -->
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-gittip"></i><span>网站配置</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{URL('admin/webconfig')}}"><i class="fa fa-youtube-play"></i> 基础设置</a></li>
                <li class="active"><a href="{{URL('admin/banner')}}"><i class="fa fa-youtube-play"></i> 轮播图管理</a></li>                
                <li class="active"><a href="{{URL('admin/link')}}"><i class="fa fa-youtube-play"></i> 友情链接管理</a></li>
                <li class="active"><a href="{{URL('admin/active')}}"><i class="fa fa-youtube-play"></i> 活动管理</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          @section('content')
            这是页面主内容区。
          @show
      </div><!-- /.content-wrapper -->
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>版本</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed 工作室</a>.</strong> 保留所有权利.
      </footer>
      
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
    
    <!-- xdl-model提示框模板 -->
    <div id="xdl-alert" class="modal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h5 class="modal-title"><i class="fa fa-exclamation-circle"></i> [Title]</h5>
          </div>
          <div class="modal-body small">
            <p>[Message]</p>
          </div>
          <div class="modal-footer" >
            <button type="button" class="btn btn-primary ok" data-dismiss="modal">[BtnOk]</button>
            <button type="button" class="btn btn-default cancel" data-dismiss="modal">[BtnCancel]</button>
          </div>
        </div>
      </div>
    </div>
    <!-- xdl-model-end -->
    
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('myadmin/bootstrap/js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('myadmin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>  
        {{--    
    <!-- Morris.js charts -->
    <script src="{{asset('myadmin/bootstrap/js/raphael-min.js')}}"></script>
    <script src="{{asset('myadmin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        --}}
    <!-- Sparkline -->
    <script src="{{asset('myadmin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('myadmin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('myadmin/bootstrap/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('myadmin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('myadmin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='{{asset('myadmin/plugins/fastclick/fastclick.min.js')}}'></script>
    <!-- AdminLTE App -->
    <script src="{{asset('myadmin/dist/js/app.min.js')}}" type="text/javascript"></script>    
        {{--
    <!-- AdminLTE 仪表板演示（这只是用于演示目的） -->
    <script src="{{asset('myadmin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>
    --}}
    <!-- XDL-model-提示框 -->
    <script src="{{asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script> 
    <!-- AdminLTE 用于演示目的 -->
    <script src="{{asset('myadmin/dist/js/demo.js')}}" type="text/javascript"></script>
    
    
    @if(session("err"))
        <script type="text/javascript">
            Modal.alert({msg: "{{session('err')}}",title: ' 信息提示',btnok: '确定',btncl:'取消'});
        </script>
    @endif
    
    @yield('myscript')
    
   

  </body>
</html>
