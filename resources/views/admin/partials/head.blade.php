<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	<meta content="template language" name="keywords">
	<meta content="Native Theme" name="author">
	<meta content="Admin Template" name="description">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="{{asset('favicon.png')}}" rel="shortcut icon">
	<link href="apple-touch-icon.png" rel="apple-touch-icon">
	
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/animate/animate.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
	<script src="{{asset('assets/plugins/jquery/jquery-2.1.1.min.js')}}"></script>
	<script src="{{asset('assets/plugins/moment/min/moment.min.js')}}"></script>
	@yield('link')
	@yield('style')
</head>