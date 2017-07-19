<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人中心</title>

		<link href="{{asset('style/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/amazeui.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/systyle.css')}}" rel="stylesheet" type="text/css">
        
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
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="">
											@if(session("user"))
                                                <img src="/{{ session('user')->picname }}">
                                            @else
                                                <img src="{{asset('style/images/getAvatar.do.jpg') }}">
                                            @endif
										</a>
										<em class="s-name"><p>
                                            @if(session("user"))
                                                <p>{{ session('user')->nickname }}</p>
                                            @else
                                                小叮当
                                            @endif</p><span class="vip1">
                                        </em>
										<div class="s-prestige am-btn am-round">
											</span>会员福利</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href=""><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="{{url('home/address')}}" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
								<div class="m-userproperty">
									<div class="s-bar">
										<i class="s-icon"></i>个人资产
									</div>
									<p class="m-bonus">
										<a href="">
											<i><img src="{{asset('style/images/bonus.png')}}"/></i>
											<span class="m-title">红包</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-coupon">
										<a href="">
											<i><img src="{{asset('style/images/coupon.png')}}"/></i>
											<span class="m-title">优惠券</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-bill">
										<a href="">
											<i><img src="{{asset('style/images/wallet.png')}}"/></i>
											<span class="m-title">钱包</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-big">
										<a href="">
											<i><img src="{{asset('style/images/day-to.png')}}"/></i>
											<span class="m-title">签到有礼</span>
										</a>
									</p>
									<p class="m-big">
										<a href="">
											<i><img src="{{asset('style/images/72h.png')}}"/></i>
											<span class="m-title">72小时发货</span>
										</a>
									</p>
								</div>
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="{{url('/home/order')}}">全部订单</a>
								</div>
								<ul>
									<li><a href="{{url('/home/order')}}"><i><img src="{{asset('style/images/pay.png')}}"/></i><span>待付款</span></a></li>
									<li><a href="{{url('/home/order')}}"><i><img src="{{asset('style/images/send.png')}}"/></i><span>待发货<em class="m-num">1</em></span></a></li>
									<li><a href="{{url('/home/order')}}"><i><img src="{{asset('style/images/receive.png')}}"/></i><span>待收货</span></a></li>
									<li><a href="{{url('/home/order')}}"><i><img src="{{asset('style/images/comment.png')}}"/></i><span>待评价<em class="m-num">3</em></span></a></li>
									<li><a href="{{url('/home/order')}}"><i><img src="{{asset('style/images/refund.png')}}"/></i><span>退换货</span></a></li>
								</ul>
							</div>
							<!--九宫格-->
							
							<!--物流 -->
							<div class="m-logistics">

								

							</div>

							<!--收藏夹 -->
							

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								<a class="i-setting-trigger s-icon" href="#"></a>
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em>19</em>
									<span>星期三</span>
									<span>2017.07</span>
								</div>
							</div>
						</div>
						<!--新品 -->
						

					</div>
				</div>
                
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">CLC商城</a>
							<b>|</b>
							<a href="{{url('/')}}">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于CLC</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有*<a href="#" target="_blank" title="">CLC商城</a> - Collect from <a href="#" title="" target="_blank">为你服务</a></em>
						</p>
					</div>
				</div>

			</div>
                @if (session('err'))
                    <div class="alert alert-success">
                        <script type="text/javascript">
                        layer.alert('{{ session('err') }}', {icon: 6});
                        </script>
                    </div>
                @endif
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
		<!--引导 -->
		<div class="navCir">
			<li><a href=""><i class="am-icon-home "></i>首页</a></li>
			<li><a href=""><i class="am-icon-list"></i>分类</a></li>
			<li><a href=""><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li class="active"><a href=""><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>