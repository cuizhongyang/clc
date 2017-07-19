<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>发表评论</title>
        <link href="{{asset('style/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/amazeui.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/systyle.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('style/css/appstyle.css')}}" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="{{asset('style/js/jquery-1.7.2.min.js')}}"></script>
		<script src="{{asset('style/js/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('style/layer/layer.js')}}" type="text/javascript"></script>
        <script src="{{asset('style/js/jquery.min.js')}}"></script>
		<script src="{{asset('style/js/amazeui.js')}}"></script>
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
								<div class="menu-hd"><a href="{{url('/')}}" target="_top" class="h">商城首页</a></div>
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
								<li><img style="width:200px;height:90px;" src="{{asset(session('config')['logo']) }}" /></li>
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
								<li class="index"><a href="{{url('/')}}">首页</a></li>
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

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>
                        <form action="{{url('/home/commit/update')}}/{{$list['gid']}}" method="post">
                        {{ csrf_field() }}
						<div class="comment-main">
							<div class="comment-list">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="{{asset($list['picname'])}}" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="#">
											<p class="item-basic-info">{{$list['name']}}</p>
										</a>
									</div>
									<div class="item-info">
										<div class="info-little">
											<span>颜色：洛阳牡丹</span>
											<span>包装：裸装</span>
										</div>
										<div class="item-price">
											价格：<strong>{{$list['price']}}元</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea name="content" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
								</div>
								<div class="item-opinion">
                                <li><i class="op1"></i><input type="radio" name="grage" value="1">好评</li>
                                <li><i class="op2"></i><input type="radio" name="grage" value="2">中评</li>
                                <li><i class="op3"></i><input type="radio" name="grage" value="3">差评</li>
								</div>
							</div>							
                            <div class="info-btn">
                                <div class="am-btn am-btn-danger"><button type="submit" class="am-btn am-btn-danger">发表评论</button></div>
                            </div>	
                        </form>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $(".comment-list .item-opinion li").click(function() {	
                                        $(this).prevAll().children('i').removeClass("active");
                                        $(this).nextAll().children('i').removeClass("active");
                                        $(this).children('i').addClass("active");
                                        
                                    });
                             })
                            </script>					
					
												
							
						</div>

					</div>

				</div>
				<!--底部-->
				<div class="footer ">
                <div class="footer-hd ">
                    <p>
                        <a href="">CLC商城</a>
                        <b>|</b>
                        <a href="{{url('/')}}">商城首页</a>
                        <b>|</b>
                        <a href="# ">支付宝</a>
                        <b>|</b>
                        <a href="# ">物流</a>
                    </p>
                </div>
                <div class="footer-bd ">
                    <p>
                        <a href="# ">关于CLC</a>
                        <a href="# ">合作伙伴</a>
                        <a href="# ">联系我们</a>
                        <a href="# ">网站地图</a>
                        <em>© 2015-2025 Hengwang.com 版权所有*<a href="#" target="_blank" title="">CLC商城</a> - Collect from <a href="#" title="" target="_blank">为你服务</a></em>
                    </p>
                </div>
            </div>
			</div>

			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="{{url('home/center')}}">个人中心</a>
					</li>
					<li class="person">
						<a href="{{url('home/center/information')}}">个人资料</a>
						<ul>
							<li> <a href="{{url('home/center/information')}}">个人信息</a></li>
							<li> <a href="{{url('home/address')}}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="{{url('/home/order')}}">订单管理</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="">我的资产</a>
						<ul>
							<li> <a href="">优惠券 </a></li>
							<li> <a href="">红包</a></li>
							<li> <a href="">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="">我的小窝</a>
						<ul>
							<li> <a href="">收藏</a></li>
							<li> <a href="">足迹</a></li>
							<li> <a href="">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>