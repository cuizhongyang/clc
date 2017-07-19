@extends('home.base.base')
	@section('content')
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								@foreach($ba as $fba)
								<li><img style="width:1400px;height:450px;" src="{{asset($fba->picname) }}" /></a></li>
								@endforeach
							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="{{url('/')}}">首页</a></li>
								@foreach($alist as $o)
                                <li class="qc"><a href="{{url('/home/list/index1')}}/{{$o->id}}">{{$o->title}}</a></li>
                                @endforeach
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>					
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
										@foreach($cates as $v)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="{{asset('style/images/cake.png') }}"></i><a class="ml-22" title="点心">{{$v['name']}}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																@if(!empty($v['children']))
																	@foreach($v['children'] as $vo)
																	<dl class="dl-sort">
																		<dt><span title="">{{$vo['name']}}</span></dt>
																		@if(!empty($vo['children']))
																			@foreach($vo['children'] as $v1)
																			<dd><a title="" href="{{url('home/list/index2')}}/{{$v1['id']}}"><span>{{$v1['name']}}</span></a></dd>
																			@endforeach
																		@endif
																	</dl>
																	@endforeach
                                                                @endif																	
																</div>
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
										@endforeach	

											
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script>
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="{{asset('style/images/navsmall.jpg') }}" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="{{asset('style/images/huismall.jpg') }}" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="{{asset('style/images/mansmall.jpg') }}" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="{{asset('style/images/moneysmall.jpg') }}" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="{{asset('style/images/TJ2.jpg') }}"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="{{asset('style/images/TJ.jpg') }}"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="{{url('home/login')}}">
                                @if(session("user"))
									<img src="/{{ session('user')->picname }}">
                                @else
									<img src="{{asset('style/images/getAvatar.do.jpg') }}">
                                @endif
								</a>
								<em>
									<div class="menu-hd">
                                    @if(session("user"))
                                        <p>{{ session('user')->email }}，你好！<a href="{{url('home/loginout')}}" target="_top" class="h">退出</a></p>
                                    @else
                                        <div class="member-logout">
                                            <a class="am-btn-warning btn" href="{{url('home/login')}}">登录</a>
                                        </div>
                                    @endif
                                    </div>								
								</em>
							</div>
							
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="{{asset('style/images/advTip.jpg') }}"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script>
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">
						<!--今日推荐--> 
						<div class="am-g am-g-fixed recommendation">
							<div class="clock am-u-sm-3 ">
								<img src="{{asset('style/images/2016.png') }}"></img>
								<p>今日<br>推荐</p>
							</div>
							@foreach($glist as $k1)
							<div class="am-u-sm-4 am-u-lg-3 ">
								<div class="info ">
									<a href="{{url('home/detail')}}/{{$k1['id']}}/{{$k1['price']}}"><h3>{{$k1['title']}}</h3></a>
									<h4>{{$k1['price']}}</h4>
								</div>
								<div class="recommendationMain three">
									<img src="{{asset($k1['picname'])}}"></img>
								</div>
							</div>				
							@endforeach
						</div>
						
						<!--夏日惊喜-->
						<div id="f1">
							<div class="am-container ">
								<div class="shopTitle ">
									<h4>夏日惊喜</h4>
								</div>
							</div>
							
							<div class="am-g am-g-fixed floodFour">
							@foreach($kk1 as $k2)
								<div class="am-u-sm-3 am-u-md-2 text-three big">
									<div class="outer-con ">
										<a href="{{url('home/detail')}}/{{$k2['id']}}/{{$k2['price']-200}}"><div class="title ">
										{{$k2['title']}}
										</div></a>
										<div class="sub-title ">
										原价：{{$k2['price']}}
										</div>
										<div class="sub-title ">
										现价：{{($k2['price']-200)}}
										</div>
										<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
									</div>
									<div>
									<img src="{{asset($k2['picname'])}}" />
									</div>
								</div>
							@endforeach
							</div>
							<div class="clear "></div>  
						 </div>
						 
						 
						  <!--打折促销-->
						<div id="f1">
							<div class="am-container ">
								<div class="shopTitle ">
									<h4>打折促销</h4>
								</div>
							</div>
							
							<div class="am-g am-g-fixed floodFour">
							@foreach($kk2 as $k3)
								<div class="am-u-sm-3 am-u-md-2 text-three big">
									<div class="outer-con ">
										<a href="{{url('home/detail')}}/{{$k3['id']}}/{{floor($k3['price']*0.95)}}"><div class="title ">
										{{$k3['title']}}
										</div></a>
										<div class="sub-title ">
											原价：{{$k3['price']}}
										</div>
										<div class="sub-title ">
											促销：{{floor(($k3['price']*0.95))}}
										</div>
										<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
									</div>
										<img src="{{asset($k3['picname'])}}" />
								</div>
							@endforeach
							</div>
							<div class="clear "></div>  
						 </div>

				</div>
						
			</div>
				<div class="clear "></div>
			</div>
					
			
   
			@endsection