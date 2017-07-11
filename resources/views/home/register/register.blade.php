@extends('layouts.admin')
@section('title', '后台登录页')
@section('content')
	<div class="login_box">
		<h1>Blog</h1>
		<h2>邮箱注册</h2>
		<div class="form">
			@if (session('error'))
				<p style="color:red">	{{ session('error') }}</p>
			@endif

			<form action="{{url('register')}}" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_email" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="password" name="user_conpass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>

					<li>
						<input type="submit" value="立即注册"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
		</div>
	</div>



@endsection