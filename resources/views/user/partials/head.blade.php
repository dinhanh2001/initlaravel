<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@if(trim($__env->yieldContent('meta_description')))
        @yield('meta_description')
    @else
        Không còn băn khoăn trước khi ra chợ nữa, lựa chọn bữa ăn hôm nay cùng với VNcooky
    @endif">
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('icon1.png')}}">
    <!-- Core Stylesheet -->
    <link href="{{asset('user/style.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="{{asset('user/css/responsive/responsive.css')}}" rel="stylesheet">
    @yield('link')
    @yield('style')
    <style>
        #box_chat{
            position: fixed;
            bottom: 0px;
            right: 0px;
            width: 350px;
            height: 400px;
            z-index: 999999;
            border-radius: 5px;
            border: 2px solid #1aae88;
            background: #fff;
        }
        #box_chat .header h3{
            text-align: center;
            padding:6px;
            margin:0px;
            color: #fff;
            background: #1aae88;
            cursor: pointer;
        }
        #box_main{
            position: relative;
            width: 100%;
            height: 100%;
        }
        #box_main .chat{
            position: absolute;
            bottom: 0px;
            width: 100%;
            right: 0px;
        }
        .chat input{
            width: 100%;
            font-size: 18px;
            border-top: 1px solid #c9d0da;
            border-left: none;
            border-right: none;
            border-bottom: none;
            white-space: pre;
            -webkit-rtl-ordering: logical;
            -webkit-appearance: textfield;
            background-color: white;
            padding:5px;
        }
        .messages{
            position: relative;
        }
        .messages p{
            border-radius: 4px;
            background: #f0ad4e;
            float:right;
            width: 60%;
            margin-top: 180px;
            margin-right: 10px;
            color: #fff;
            padding: 7px;
            cursor: pointer;
        }
        .messages .abc{
            width: 40px;
            height: 40px;
            float:right;
            margin-right: 10px;
            margin-top: -10px;
        }
    </style>
</head>