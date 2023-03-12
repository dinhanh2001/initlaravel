<!DOCTYPE html>
<html>
	<head>
		<title>Đăng nhập | Quản trị</title>
		<meta charset="utf-8">
		<meta content="ie=edge" http-equiv="x-ua-compatible">
		<meta content="template language" name="keywords">
		<meta content="Native Theme" name="author">
		<meta content="Admin Template" name="description">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link href="favicon.png" rel="shortcut icon">
		<link href="apple-touch-icon.png" rel="apple-touch-icon">
		
		<link rel="stylesheet" href="{{asset('adminas/assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('adminas/assets/plugins/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('adminas/assets/plugins/animate/animate.css')}}">
		<link rel="stylesheet" href="{{asset('adminas/assets/css/main.css')}}"/>

		<script src="{{asset('adminas/assets/plugins/jquery/jquery-2.1.1.min.js')}}"></script>
	</head>
	<body>
		<div class="auth-wrapper">
			<div class="auth-header">
				<div class="auth-title">Quản trị viên</div>
				<div class="auth-subtitle">Tư vấn bữa ăn gia đình</div>
				<div class="auth-label">Đăng nhập</div>
			</div>
			<div class="auth-body">
				@if(session()->has('error'))
					<p style="color:red;text-align: center;padding:5px">{{session()->get('error')}}</p>
				@endif
				<form action="{{route('admin.post.login')}}" method="POST">
					{{ method_field('POST') }}
                    {{ csrf_field() }}
					<div class="auth-content">
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" name="email" placeholder="Enter email" type="email" value="{{old('email')}}">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" name="password" placeholder="Enter password" type="password">
						</div>
					</div>
					<div class="auth-footer sm-text-center">
						<div class="pull-left auth-link sm-max sm-mgtop-20">
							<label class="check-label"><input type="checkbox" name="remember"> Ghi nhớ</label>
							<div class="devider"></div>
							<a href="#" onclick="alert('Đang xây dựng')">Quên mật khẩu?</a>
						</div>
						<button class="pull-right btn btn-primary sm-max" type="submit">Đăng nhập</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>