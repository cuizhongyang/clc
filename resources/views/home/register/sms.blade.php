@extends('layouts.admin')
@section('title', '后台登录页')
@section('content')
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			@if (session('error'))
				<p style="color:red">	{{ session('error') }}</p>
			@endif

			<form action="{{url('admin/dologin')}}" method="post" onsubmit="return false;">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_phone" id="user_phone" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<button onclick="sendCode()">发送手机验证码</button>

					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
		</div>
	</div>

        <script type="text/javascript">
//            layer.alert('aaaaa');
            function sendCode(){
				var phone = $('#user_phone').val();
                $.post("{{url('/sendcode')}}",{'_token':"{{csrf_token()}}",'phone':phone},function(data){
//                    console.log(data);
                    if(data.status == '0'){
                        layer.alert('验证码发送成功');
					}else{
                        layer.alert('验证码发送失败');
					}

                });
            }
	</script>

@endsection