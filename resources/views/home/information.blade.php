<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="{{asset('style/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/amazeui.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('style/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/infstyle.css')}}" rel="stylesheet" type="text/css">
		<script src="{{asset('style/js/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('style/js/jquery.js')}}" type="text/javascript"></script>
		<script src="{{asset('style/js/amazeui.js')}}" type="text/javascript"></script>
        <link rel="icon" href="{{asset('style/images/favicon.ico') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('style/images/favicon.ico') }}" type="image/x-icon">
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
									@if(session("user"))
                                        <p>{{ session('user')->email }}，你好！<a href="{{url('home/loginout')}}" target="_top" class="h">退出</a></p>
                                    @else
                                        <a href="{{url('home/login')}}" target="_top" class="h">亲，请登录</a>
                                        <a href="{{url('home/register')}}" target="_top">免费注册</a>
                                    @endif
								</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="{{url('home/center')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="{{asset('style/images/logobig.png')}}" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
                         <form class="am-form am-form-horizontal" id="art_form" action="{{url('home/center/update')}}/{{ session('user')->id }}" method="post">
                         <input type="hidden" name="art_thumb" id="art_thumb"  value="{{old('art_thumb')}}" >
                         {{csrf_field()}}
						<!--头像 -->
						<div class="user-infoPic">

							<div style="hight:500px;" class="filePic">
								<input style="height:100px;" type="file" name="file_upload" id="file_upload" value="" class="inputPic">
         <img style="height:100px;" id="img1" class="am-circle am-img-thumbnail" src="/{{ session('user')->picname }}" />
								<!--<img style="height:100px;" id="img1" class="am-circle am-img-thumbnail" src="{{env('QINIU_DOMAIN')}}{{session('user')->picname}}" />-->
							</div>
                            <script type="text/javascript">
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
                                    type: "POST",
                                    url: "/home/center/upload",
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

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>&nbsp;&nbsp;个人头像</b></div>
								
								<div class="u-safety">
									<p>
									  点击头像修改
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0"></i></span>
									</p>
								</div>
							</div>
						</div>
                        <center>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="color:red;">{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                        </center>
						<!--个人信息 -->
						<div class="info-main">
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" value="{{ session('user')->nickname }}" name="nickname" placeholder="昵称">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" value="{{ session('user')->name }}" name="name" placeholder="姓名">

									</div>
								</div>
                                <div class="am-form-group">
									<label for="user-age" class="am-form-label">年龄</label>
									<div class="am-form-content">
										<input type="text" value="{{ session('user')->age }}" name="age" placeholder="年龄">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" {{ ((session('user')->sex)==1)?"checked":"" }} data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" {{ ((session('user')->sex)==0)?"checked":"" }} data-am-ucheck> 女
										</label>
                                        <label class="am-radio-inline">
											<input type="radio" name="sex" value="2" {{ ((session('user')->sex)==2)?"checked":"" }} data-am-ucheck> 保密
										</label>
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" value="{{ session('user')->phone }}" name="phone" placeholder="电话" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">邮箱</label>
									<div class="am-form-content">
										<input id="user-email" value="{{ session('user')->email }}" readonly name="email" placeholder="邮箱" type="email">

									</div>
								</div>
								<div class="info-btn">
									<div class="am-btn am-btn-danger"><button type="submit" class="am-btn am-btn-danger" >保存修改</button></div>
								</div>

							</form>
                            
						</div>

					</div>

				</div>
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.css')}}moban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.css')}}moban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
				</div>
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="{{url('home/center')}}">个人中心</a>
					</li>
					<li class="person">
						<a href="{{url('home/center/information')}}">个人资料</a>
						<ul>
							<li class="active"> <a href="{{url('home/center/information')}}">个人信息</a></li>
							<li> <a href="{{url('home/address')}}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
            
	</body>

</html>