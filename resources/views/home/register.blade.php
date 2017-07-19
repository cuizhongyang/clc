<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="{{asset('style/css/amazeui.min.css')}}" />
		<link href="{{asset('style/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
        <link rel="icon" href="{{asset('style/images/favicon.ico')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('style/images/favicon.ico')}}" type="image/x-icon">
        
		<script src="{{asset('style/js/jquery.min.js')}}"></script>
		<script src="{{asset('style/js/amazeui.min.js')}}"></script>
	</head>
	<body>
		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="{{asset('style/images/logobig.png')}}" /></a>
		</div>
		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="{{asset('style/images/big.jpg')}}" /></div>
                <div class="login-box">
                    <div class="am-tabs" id="doc-my-tabs">
                        <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                            <li class="am-active"><a href="">邮箱注册</a></li>
                        </ul>
                        <div class="am-tabs-bd">
                        <div class="am-tab-panel am-active">
                            <form action="{{url('home/doregister')}}" method="post">
                                {{ csrf_field() }}
                                <div class="user-email">
                                    <label for="email" ><i class="am-icon-envelope-o"></i></label>
                                    <input type="email" name="email" placeholder="请输入邮箱账号">
                                </div>										
                                <div class="user-pass">
                                    <label for="password"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="password" id="password" placeholder="设置密码">
                                    
                                </div>										
                                <div class="user-pass">
                                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="repassword" id="repassword" placeholder="确认密码">
                                </div>	
                                
                                <div class="am-cf">
                                    <input type="submit" name="submit" value="注册" id="sub" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>
                                
                                    <span style="color:red;" id="passmsg"></span><br/>
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
                                    @if (session('err'))
                                        <div class="alert alert-success">
                                            <p style="color:red;">{{ session('err') }}</p>
                                        </div>
                                    @endif
                            </form>
                            
                            </div>
                        <hr>
                        <script>
                            $(function(){
                            $("#sub").click(function(){
                            
                                var pwd = $("input[name='password']").val();

                                var cpwd = $("input[name='repassword']").val();
                                if(pwd != cpwd){
                                    document.getElementById("passmsg").innerHTML="密码和重复密码不一致!";
                                    return false;
                                }
                            });
                        });
                        
                        </script>
						</div>
					</div>
				</div>
			</div>
        </div>
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
	</body>

</html>