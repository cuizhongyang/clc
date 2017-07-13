<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="{{asset('style/css/amazeui.css')}}" />
		<link href="{{asset('style/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
        <link rel="icon" href="{{asset('style/images/favicon.ico')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('style/images/favicon.ico')}}"" type="image/x-icon">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="{{asset('style/images/logobig.png')}}" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="{{asset('style/images/big.jpg')}}" /></div>
				<div class="login-box">

                    <h3 class="title">登录商城</h3>

                    <div class="clear"></div>
						
                    <div class="login-form">
                        <form action="{{url('home/dologin')}}" method="post">
                        {{csrf_field()}}
                           <div class="user-name">
                                <label for="user"><i class="am-icon-user"></i></label>
                                <input type="text" name="email" id="email" placeholder="邮箱">
                            </div>
                            <div class="user-pass">
                                <label for="password"><i class="am-icon-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="请输入密码">
                            </div>
                            </div> 
                            <div class="login-links">
                            <a href="{{url('/forget')}}" class="am-fr">忘记密码</a>
                           
                            </div>
                            <br/>
                            <div class="am-cf">
                                <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
                            </div>
                        </form>
                        <br/>
                            @if (count($errors) > 0)
                                <div class="mark">
                                    <ul style="color:red;list-style:none;">
                                        @if(is_object($errors))
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        @else
                                            <li>{{ session('errors') }}</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        <br/>
                   
				</div>
			</div>
		</div>
            <div class="footer ">
                <div class="footer-hd ">
                    <p>
                        <a href="# ">恒望科技</a>
                        <b>|</b>
                        <a href="# ">商城首页</a>
                        <b>|</b>
                        <a href="# ">支付宝</a>
                        <b>|</b>
                        <a href="# ">物流</a>
                    </p>
                </div>
                <div class="footer-bd ">
                    <p>
                        <a href="# ">关于恒望</a>
                        <a href="# ">合作伙伴</a>
                        <a href="# ">联系我们</a>
                        <a href="# ">网站地图</a>
                        <em>© 2015-2025 Hengwang.com 版权所有*<a href="#" target="_blank" title="">CLC商城</a> - Collect from <a href="#" title="" target="_blank">为你服务</a></em>
                    </p>
                </div>
            </div>
	</body>

</html>