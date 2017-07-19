@extends('home.base.base')
	@section('content')
			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					
					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="clear"></div>
							<div class="bundle-main">
						@foreach( $carts as $cart)
								<ul class="item-content clearfix">
								
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" class="J_MakePoint" data-point="tbcart.8.12"><img style="width:50px;height:50px;" src="{{asset($cart->options['size'])}}"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$cart->name}}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props">
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">￥{{$cart->price}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													
													<input id="text_box" name="number" style="width:30px;border:" type="text" id="txt" value="{{$cart->qty}}"/>
													
												</div>
											</div>
										</div>
									</li>
									
									<li class="td td-op">
									
                                            <a href="/home/shopcat/del/{{$cart->rowId}}"> <button type="button" class="btn btn-danger">
                                                    <span class="fa fa-remove"></span> 移除
                                                </button></a>
                                  
                                        </td>
									</li>
								</ul>
							@endforeach
							</div>
						</div>
					</tr>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						
					</div>
					<div class="float-bar-right">
                        <div class="amount-sum">
                             <a href="/"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> 继续购物
                            </button></a>
                        
                        </div>
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount"></em><span class="txt"> {{$count}}件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">{{$total}}</em></strong>
						</div>
						<div class="btn-area">
							<a href="/home/shopcat/doit" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>提交订单</span></a>
						</div>
					</div>

				</div>

			@endsection