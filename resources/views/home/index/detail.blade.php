<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品页面</title>

		<link href="{{asset('style/css/admin.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('style/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('style/css/demo.css')}}" rel="stylesheet" type="text/css" />
		<link type="text/css" href="{{asset('style/css/optstyle.css')}}" rel="stylesheet" />
		<link type="text/css" href="{{asset('style/css/style.css')}}" rel="stylesheet" />
		
		<link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> 
		
		<script type="text/javascript" src="{{asset('style/js/jquery-1.7.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('style/js/quick_links.js')}}"></script>

		<script type="text/javascript" src="{{asset('style/js/amazeui.js')}}"></script>
		<script type="text/javascript" src="{{asset('style/js/jquery.imagezoom.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('style/js/jquery.flexslider.js')}}"></script>
		<script type="text/javascript" src="{{asset('style/js/list.js')}}"></script>

	</head>

	<body>


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
					<div class="menu-hd"><a id="mc-menu-hd" href="{{url('home/shopcat/index')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logoBig">
					<li><img style="width:200px;height:90px;margin-left:-180px;" src="{{asset(session('config')['logo']) }}" /></li>
				</div>
				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form action="{{url('home/list/index3')}}" method="get">
						<input id="searchInput" style="width:350px;" name="key" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="{{url('/')}}">首页</a></li>
								@foreach($alist as $o)
                                <li class="qc"><a href="{{url('/home/list/index1')}}/{{$o->id}}">{{$o->title}}</a></li>
                                @endforeach
							</ul>
						</div>
			</div>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="{{asset($picname)}}" title="pic" />
								</li>
								<li>
									<img src="{{asset($picname)}}" />
								</li>
								<li>
									<img src="{{asset($picname)}}" />
								</li>
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="{{asset($picname)}}"><img src="{{asset($picname)}}" alt="细节展示放大镜特效" rel="{{asset($picname)}}" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="{{asset($picname)}}" mid="{{asset($picname)}}" big="{{asset($picname)}}"></a>
									</div>
								</li>
								<li>
									<div class="tb-pic tb-s40">
										<a href="#"><img src="{{asset($picname)}}" mid="{{asset($picname)}}" big="{{asset($picname)}}"></a>
									</div>
								</li>
								<li>
									<div class="tb-pic tb-s40">
										<a href="#"><img src="{{asset($picname)}}" mid="{{asset($picname)}}" big="{{asset($picname)}}"></a>
									</div>
								</li>
							</ul>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">
						
						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>	
							{{$list->name}}
							</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price">{{$price}}</b>  </dd>                                 
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice">{{$list->price}}</b></dd>									
								</li>
								<div class="clear"></div>
							</div>

							
							
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="{{url('home/shopcat')}}" method="get">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">配置</div>
														<ul>
															<li class="sku-line">{{$list->cpu}}<i></i></li>
															<li class="sku-line">{{$list->ram}}<i></i></li>
															<li class="sku-line">{{$list->card}}<i></i></li>
															<li class="sku-line">{{$list->vcard}}<i></i></li>
														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title">包装</div>
														<ul>
															<li class="sku-line">坚固精美包装<i></i></li>
														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" type="button" onclick="sub()" value="-"></td>
															<input id="text_box" name="number" style="width:30px;" type="text" id="txt" value="1"/>
															<input id="add" class="am-btn am-btn-default" type="button" onclick="add()" value="+">
															<input type="hidden" value="{{$price}}" name="price"/>
															<input type="hidden" value="{{$list->id}}" name="id"/>
														</dd>

													</div>
													<script>
														function add(){
															var txt=document.getElementById("txt");
															var a=txt.value;
															a++;
															txt.value=a;
														}
														function sub(){
															var txt=document.getElementById("txt");
															var a=txt.value;
															if(a>1){
																a--;
																txt.value=a;
															}else{
																txt.value=1;
															}
															
														}
													</script>
													<div class="clear"></div>

													
												</div>
												
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<div class="gold-list">
										<p>购物即送十积分</p>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="{{url('/')}}"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<input type="submit" id="LikBasket" title="加入购物车" value="加入购物车">
								</div>
							</li>
						</div>

					</div>
					</form>
					<div class="clear"></div>

				</div>

				<!--优惠套装-->
				<div class="match">
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>看了又看</h2>        
					            </div>
						     	@foreach($goods as $g1)
							      <li class="first">
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="{{asset($g1['picname'])}}"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
									{{$g1['title']}}
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>{{$g1['price']}}</strong></div>
							      </li>
								 @endforeach	      
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">

										<span class="index-needs-dt-txt">宝贝详情</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">猜你喜欢</span></a>
								</li>
							</ul>

							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">
								
									<div class="J_Brand">

										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">
											<li title="">名称:&nbsp;{{$glist->name}}</li>
											<li title="">处理器:&nbsp;{{$glist->cpu}}</li>
											<li title="">屏幕:&nbsp;{{$glist->size}}</li>
											<li title="">显卡:&nbsp;{{$glist->vcard}}</li>
											<li title="">运存:&nbsp;{{$glist->ram}}</li>
											<li title="">内存:&nbsp;{{$glist->card}}</li>
											<li title="">价格:&nbsp;{{$glist->price}}</li>
											<li title="">上架时间：&nbsp;{{$glist->addtime}}</li>
										</ul>
										<div class="clear"></div>
									</div>

									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>
										<div class="twlistNews">
											<img src="{{asset($glist->picname)}}" />
											
										</div>
									</div>
									<div class="clear"></div>
								
								</div>

								<div class="am-tab-panel am-fade">
									
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num">({{$n4}})</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span>好评</span>
													<span class="tb-tbcr-num">({{$n1}})</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span>中评</span>
													<span class="tb-tbcr-num">({{$n2}})</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span>差评</span>
													<span class="tb-tbcr-num">({{$n3}})</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip">
									@foreach($commit as $mmit)
										<li class="am-comment">

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author">{{$mmit->name}}</a>
														<!-- 评论者 -->
														评论于
														<time datetime="">{{$mmit->addtime}}</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
														{{$mmit->content}}
														</div>
													</div>

												</div>
												<!-- 评论内容 -->
											</div>
										</li>
									@endforeach
									</ul>

									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										{!! $commit->render() !!}
									</ul>
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
										@foreach($goodss as $like)
											
											<li>
												<div class="i-pic limit">
													<img src="{{asset($like['picname'])}}" />
													<p>{{$like['title']}}
													<p class="price fl">
														<b>¥</b>
														<strong>{{$like['price']}}</strong>
													</p>
												</div>
											</li>
											
										@endforeach
										</ul>
									</div>
									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										{!! $goodss->render() !!}
									</ul>
									<div class="clear"></div>

								</div>

							</div>

						</div>

						<div class="clear"></div>

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
									<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!--菜单 -->
			<div class=tip>
				<div id="sidebar">
					<div id="wrap">
						<div id="prof" class="item">
							<a href="{{url('/home/center')}}">
								<span class="setting"></span>
							</a>
							

						</div>
						<div id="shopCart" class="item">
							<a href="#">
								<span class="message"></span>
							</a>
							<p>
								购物车
							</p>
							<p class="cart_num">0</p>
						</div>
						<div id="asset" class="item">
							<a href="#">
								<span class="view"></span>
							</a>
							<div class="mp_tooltip">
								我的资产
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="foot" class="item">
							<a href="#">
								<span class="zuji"></span>
							</a>
							<div class="mp_tooltip">
								我的足迹
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="brand" class="item">
							<a href="#">
								<span class="wdsc"><img src="../images/wdsc.png" /></span>
							</a>
							<div class="mp_tooltip">
								我的收藏
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="broadcast" class="item">
							<a href="#">
								<span class="chongzhi"><img src="../images/chongzhi.png" /></span>
							</a>
							<div class="mp_tooltip">
								我要充值
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div class="quick_toggle">
							<li class="qtitem">
								<a href="{{url('/home/qq')}}"><span class="kfzx"></span></a>
								<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
							</li>
							<!--二维码 -->
							<li class="qtitem">
								<a href="#none"><span class="mpbtn_qrcode"></span></a>
								<div class="mp_qrcode" style="display:none;"><img src="../images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
							</li>
							<li class="qtitem">
								<a href="#top" class="return_top"><span class="top"></span></a>
							</li>
						</div>

						<!--回到顶部 -->
						<div id="quick_links_pop" class="quick_links_pop hide"></div>

					</div>

				</div>
				<div id="prof-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						我
					</div>
				</div>
				<div id="shopCart-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						购物车
					</div>
				</div>
				<div id="asset-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						资产
					</div>

					<div class="ia-head-list">
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">优惠券</div>
						</a>
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">红包</div>
						</a>
						<a href="#" target="_blank" class="pl money">
							<div class="num">￥0</div>
							<div class="text">余额</div>
						</a>
					</div>

				</div>
				<div id="foot-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						足迹
					</div>
				</div>
				<div id="brand-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						收藏
					</div>
				</div>
				<div id="broadcast-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						充值
					</div>
				</div>
			</div>

	</body>

</html>