<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单管理</title>

		<link href="{{asset('style/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/amazeui.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('style/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('style/css/orstyle.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('style/css/addstyle.css')}}" rel="stylesheet" type="text/css">
		<script src="{{asset('style/js/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('style/layer/layer.js')}}" type="text/javascript"></script>
		<script src="{{asset('style/js/jquery.min.js')}}"></script>
		<script src="{{asset('style/js/amazeui.js')}}"></script>

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
									<a href="#" target="_top" class="h">亲，请登录</a>
									<a href="#" target="_top">免费注册</a>
								</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
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

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<script type="text/javascript">
											function doDel(id){
                                                layer.confirm('确定删除吗？', {
                                                  btn: ['确定','取消'] //按钮
                                                },function(index){
                                                    layer.close(index);
                                                    location.href=("{{ url('/home/doDel') }}/"+id);
                                                },function(){
                                                 
                                                });
                                            }
                                            function doPay(id){
                                                layer.confirm('确定付款吗？', {
                                                  btn: ['确定','取消'] //按钮
                                                },function(index){
                                                    layer.close(index);
                                                    location.href=("{{ url('/home/doPay') }}/"+id);
                                                },function(){
                                                 
                                                });
                                            }
                                            function doSend(id){
                                                layer.alert('已为您催促卖家，谢谢！', {icon: 6});
                                            }
                                            function doGoods(id){
                                               layer.confirm('是否已收到货物？', {
                                                  btn: ['收到','暂未'] //按钮
                                                },function(index){
                                                    layer.close(index);
                                                    location.href=("{{ url('/home/doGoods') }}/"+id);
                                                },function(){
                                                 
                                                });
                                            }
                                            function commit(id){
                                                layer.open({
                                                    type: 1,
                                                    skin: 'layui-layer-rim', //加上边框
                                                    area: ['420px', '240px'], //宽高
                                                    content: '<form action="commit/id" method="post"><input type="hidden" name="_token" value="{{ csrf_token() }}"><p>评论：</p><textarea name="commit" cols="55" rows="8"></textarea><button style="width: 100px;height: 30px;font-size: 18px;font-family: 微软雅黑;letter-spacing: 8px;border-radius: 5px;border: 1px solid #2576A8;padding-left: 12px;" type="submit">提交</button></form>'
                                                });
                                            }
                                             
											</script>
                                            @if (session('err'))
                                                <div class="alert alert-success">
                                                    <script type="text/javascript">
                                                    layer.alert('{{ session('err') }}', {icon: 6});
                                                    </script>
                                                </div>
                                            @endif
                                             <!-- 交易成功 -->
                                            @foreach ($list1 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doDel({{$vo['guid']}})">
                                                                @endforeach
                                                                删除订单</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
                                            <!-- 交易失败 -->
                                            @foreach ($list2 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">交易失败</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doDel({{$vo['guid']}})">
                                                                @endforeach
                                                                删除订单</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>    
                                            @endif
                                            @endforeach
                                             <!-- 未付款 -->
                                            @foreach ($list3 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">等待付款</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doPay({{$vo['guid']}})">
                                                                @endforeach
                                                                一键付款</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
											
                                             <!-- 交易成功 -->
                                            @foreach ($list4 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	 <a href="">退款</a>
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">未发货</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doSend({{$vo['guid']}})">
                                                                @endforeach
                                                                提醒发货</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
                                             <!-- 交易成功 -->
                                            @foreach ($list5 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	 <a href="">退款/退货</a>
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doGoods({{$vo['guid']}})">
                                                                @endforeach
                                                                确认收货</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
											</div>

									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<!-- 未付款 -->
                                            @foreach ($list3 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">等待付款</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doPay({{$vo['guid']}})">
                                                                @endforeach
                                                                一键付款</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
										</div>

									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											@foreach ($list4 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	 <a href="">退款</a>
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">未发货</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doSend({{$vo['guid']}})">
                                                                @endforeach
                                                                提醒发货</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
										</div>
									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											@foreach ($list5 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    @foreach ($v as $vo)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
                                                                    <a href="">退款/退货</a>
																</div>
															</li>
                                                            
														</ul>
                                                       @endforeach 
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="doGoods({{$vo['guid']}})">
                                                                @endforeach
                                                                确认收货</a>
                                                                </div>
															</li>
														</div>
													</div>
                                                     
												</div>
											</div>
                                            @endif
                                            @endforeach
										</div>
									</div>
								</div>

								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<!--不同状态的订单	-->
										 @foreach ($list1 as $v)
                                            @if (!empty($v))      
											<div class="order-status5">
												<div class="order-title">
                                                
													<!--    <em>店铺：小桔灯</em>-->
												</div>
                                                @foreach ($v as $vo)
												<div class="order-content">
                                                
													<div class="order-left">
                                                   
                                                    
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img style="width:100px;height:100px;" src="/{{$vo['picname']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vo['name']}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<p>{{$vo['price']}}</p>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><p>{{$vo['number']}}</p>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
                                                            
														</ul>
                                                       
                                                       
                                                    </div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：￥：XXX
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
                                                                    <p class="Mystatus">买家已收货</p>
																	<p class="order-info"><a href="/home/orderinfo">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
                                                                @foreach($v as $vo)
                                                                    <a href="javascript:void(0);" onclick="commit({{$vo['guid']}})">
                                                                @endforeach
                                                                我要评论</a>
                                                                </div>
															</li>
														</div>
													</div>
												</div>
                                                 @endforeach 
											</div>
                                            @endif
                                            @endforeach
										</div>
									</div>

								</div>
							</div>

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
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li class="active"><a href="order.html">订单管理</a></li>
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