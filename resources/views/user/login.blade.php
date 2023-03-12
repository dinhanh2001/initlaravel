<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Đăng nhập/Đăng ký</title>
	<link rel="icon" href="{{asset('icon1.png')}}">
	<link href="{{asset('libs/bootstrap/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
	<script src="{{asset('libs/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{asset('user/js/jquery/jquery-2.2.4.min.js')}}"></script>
	<style>
		body {
		    padding-top: 90px;
		}
		.panel-login {
			border-color: #ccc;
			-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		}
		.panel-login>.panel-heading {
			color: #00415d;
			background-color: #fff;
			border-color: #fff;
			text-align:center;
		}
		.panel-login>.panel-heading a{
			text-decoration: none;
			color: #666;
			font-weight: bold;
			font-size: 15px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login>.panel-heading a.active{
			color: #029f5b;
			font-size: 18px;
		}
		.panel-login>.panel-heading hr{
			margin-top: 10px;
			margin-bottom: 0px;
			clear: both;
			border: 0;
			height: 1px;
			background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
			background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
		}
		.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
			height: 45px;
			border: 1px solid #ddd;
			font-size: 16px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login input:hover,
		.panel-login input:focus {
			outline:none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			border-color: #ccc;
		}
		.btn-login {
			background-color: #59B2E0;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #59B2E6;
		}
		.btn-login:hover,
		.btn-login:focus {
			color: #fff;
			background-color: #53A3CD;
			border-color: #53A3CD;
		}
		.forgot-password {
			text-decoration: underline;
			color: #888;
		}
		.forgot-password:hover,
		.forgot-password:focus {
			text-decoration: underline;
			color: #666;
		}

		.btn-register {
			background-color: #1CB94E;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #1CB94A;
		}
		.btn-register:hover,
		.btn-register:focus {
			color: #fff;
			background-color: #1CA347;
			border-color: #1CA347;
		}
		.error{
			color:red;
		}
		.login-social .col{
			text-align: center;
    		margin-top: 10px;
		}
		.login-social a:hover{
			text-decoration: none;
		}
		.login-social a{
		    background: blue;
		    padding: 10px;
		    color: #fff;
		    font-size: 16px;
		    border-radius: 4px;
		    border: none;
		}
	</style>
</head>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Đăng nhập</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Đăng ký</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="{{route('user.post.login')}}" method="post" role="form" style="display: block;">
                    				{{ csrf_field() }}
                    				@if(session()->has('error'))
										<label for="" class="error">{{session()->get('error') }}</label>
							        @endif
									<div class="form-group">
										@if($errors->has('email'))
											<label for="" class="error">{{ $errors->first('email') }}</label>
								        @endif
										<input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="Username" value="{{old('email')}}">
									</div>
									<div class="form-group">
										@if($errors->has('password'))
											<label for="" class="error">{{ $errors->first('password') }}</label>
								        @endif
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Ghi nhớ tài khoản</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Đăng nhập">
											</div>
										</div>
									</div>
									<div class="form-group login-social">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3 col">
												<a href="{{route('user.redirect.social',['social'=>'facebook'])}}">Đăng nhập bằng Facebook</a>
											</div>
										</div>
									</div>
									<div class="form-group login-social">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3 col">
												<a href="{{route('user.redirect.social',['social'=>'google'])}}" style="background: #de5246">Đăng nhập bằng Google</a>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" class="forgot-password">Quên tài khoản?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form action="" id="register-form" onsubmit="return registerSubmit()" style="display: none">
									<div class="form-group">
										<label for="" class="error customer_name"></label>
										<input type="text" name="customer_name" id="name" tabindex="1" class="form-control" placeholder="Họ và tên" value="">
									</div>
									<div class="form-group">
										<label for="" class="error customer_email"></label>
										<input type="email" name="customer_email" id="email" tabindex="1" class="form-control" placeholder="Địa chỉ email" value="">
									</div>
									<div class="form-group">
										<label for="" class="error customer_gender"></label>
										<select name="customer_gender" id="" class="form-control">
											<option value="">Giới tính</option>
											<option value="1">Nam</option>
											<option value="2">Nữ</option>
											<option value="3">Khác</option>
										</select>
									</div>
									<div class="form-group">
										<label for="" class="error customer_date_of_birth"></label>
										<input type="text" name="customer_date_of_birth" id="text" tabindex="1" class="form-control" placeholder="Ngày sinh vd: 13/01/2000" value="">
									</div>
									<div class="form-group">
										<label for="" class="error customer_password"></label>
										<input type="password" name="customer_password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
									</div>
									<div class="form-group">
										<label for="" class="error re_password"></label>
										<input type="password" name="re_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Xác nhận mật khẩu">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng ký ngay">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{asset('libs/jquery/jquery.validate.min.js')}}"></script>
	<script>
		if(window.location.href.indexOf('register') > 0){
			$("#login-form").hide();
	 		$("#register-form").show();
	 		$('#register-form-link').addClass('active');
			$('#login-form-link').removeClass('active');
		}
		$(function() {
			$("#login-form").validate({
			// Các điều kiện của các input
				rules: {
					email: {
						required: true,
						email: true,
					},
					password:{
						required:true
					}
				},
				// Custom tin nhắn báo lỗi
			  	messages: {
					email:{
						required: "* Cần nhập thông tin.",
					  	email: "* Vui lòng nhập email.",
		      		},
		      		password:{
						required: "* Cần nhập thông tin.",
		      		}
				}
		  });
		    $('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
		 		$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
		 		$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});

		});

		function registerSubmit(){
			$('.error').text('');
			var data = $('#register-form').serialize();
			$.ajax({
				url: '{{route('api.register')}}',
				method:"POST",
				headers: {
			        "Accept":"application/json",
			    },
			    data:data,
			    success:function(data){
			    	alert('Đăng ký thành công');
			    	window.location.reload(true);
			    },
			    error:function(err){
			    	var errors = err.responseJSON.errors;
			    	if(!!errors.customer_name){
			    		$('.customer_name').text(errors.customer_name);
			    	}
			    	if(!!errors.customer_email){
			    		$('.customer_email').text(errors.customer_email);
			    	}
			    	if(!!errors.customer_gender){
			    		$('.customer_gender').text(errors.customer_gender);
			    	}
			    	if(!!errors.customer_date_of_birth){
			    		$('.customer_date_of_birth').text(errors.customer_date_of_birth);
			    	}
			    	if(!!errors.customer_password){
			    		$('.customer_password').text(errors.customer_password);
			    	}
			    	if(!!errors.re_password){
			    		$('.re_password').text(errors.re_password);
			    	}

			    }
			})
			return false;	
		}
		function openNewWindow(url) {
			var params = [
				'height='+screen.height,
				'width='+screen.width,
				'scrollbars=yes',
				'status=yes',
				'location=yes'
			].join(',');
			var popup = window.open(url, 'popup_window', params); 
			popup.moveTo(0,0);
		}
	</script>
</body>
</html>