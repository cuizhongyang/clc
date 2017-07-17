@extends('home.base.listbase')
	@section('content')
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="{{url('/')}}">首页</a></li>
								@foreach($tlist as $o)
                                <li class="qc"><a href="{{url('/home/list/index1')}}/{{$o->id}}">{{$o->title}}</a></li>
                                @endforeach
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			

					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								<span class="font-pale">相关搜索：</span>
								<a title="坚果" href="#">坚果</a>
								<a title="瓜子" href="#">瓜子</a>
								<a title="鸡腿" href="#">豆干</a>

							</div>
							
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
									<li class="big"><a title="评价" href="#">评价为主</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									@foreach($alist as $list)
									@foreach($list as $kk)
									<li>
										<div class="i-pic limit">
											<img src="{{asset($kk['picname'])}}">											
											<a href="{{url('home/detail')}}/{{$kk['id']}}/{{floor($kk['price']*0.95)}}"><p class="title fl">{{$kk['title']}}</p></a>
											<p class="title fl"><strong>原价：{{$kk['price']}}</strong></p>
											<p class="price fl">
												<b>现价：</b>
												<b>¥</b>
												<strong>{{floor($kk['price']*0.95)}}</strong>
											</p>
											<p class="number fl">
												销量<span>1110</span>
											</p>
										</div>
									</li>
									@endforeach
									@endforeach
									
									
									
								
								</ul>
							</div>
							<div class="search-side">

								<div class="side-title">
									店主推荐
								</div>
							@foreach($slit as $sl)
								<li>
									<div class="i-pic check">
										<img src="{{asset($sl['picname'])}}" />
										<p class="check-title">{{$sl->title}}</p>
										<p class="price fl">
											<b>¥</b>
											<strong>{{$sl->price}}</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
							@endforeach
							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right">
								{!! $alist->render() !!}
							</ul>

						</div>
					</div>
@endsection