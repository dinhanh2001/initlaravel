<!-- Preloader Start -->
<div id="preloader">
    <div class="yummy-load"></div>
</div>

<!-- Background Pattern Swither -->
<div id="pattern-switcher">
    Dùng ảnh nền
</div>
<div id="patter-close">
    <i class="fa fa-times" aria-hidden="true"></i>
</div>

<!-- ****** Top Header Area Start ****** -->
<div class="top_header_area">
    <div class="container">
        <div class="row">
            <div class="col-5 col-sm-6">
                <!--  Top Social bar start -->
                <div class="top_social_bar">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                </div>
            </div>
            <!--  Login Register Area -->
            <div class="col-7 col-sm-6">
                <div class="signup-search-area d-flex align-items-center justify-content-end">
                    <div class="login_register_area d-flex" style="z-index: 999999">
                        @if(!Auth::guard('customer')->check())
                            <div class="login">
                                <a href="{{route('user.get.login')}}">Đăng nhập</a>
                            </div>
                            <div class="register">
                                <a href="{{route('user.get.login')}}">Đăng ký</a>
                            </div>
                        @else
                            <div style="padding:0px 6px">
                                <a href="{{route('user.profile')}}"><span>{{Auth::guard('customer')->user()->customer_name}},</span></a>
                            </div>
                            <div class="register" style="color:red">
                                <a href="{{route('user.get.logout')}}" style="color: red"> Đăng xuất</a>
                            </div>
                        @endif
                    </div>
                    <!-- Search Button Area -->
                    <div class="search_button">
                        <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <!-- Search Form -->
                    <div class="search-hidden-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search-anything" placeholder="Search Anything...">
                            <input type="submit" value="" class="d-none">
                            <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Top Header Area End ****** -->

<!-- ****** Header Area Start ****** -->
<header class="header_area">
    <div class="container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-12">
                <div class="logo_area text-center">
                    <a href="{{route('user.index')}}" class="yummy-logo">Tư vấn bữa ăn gia đình</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <!-- Menu Area Start -->
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                        <ul class="navbar-nav" id="yummy-nav">
                            <li class="nav-item {{Route::current()->named('user.index') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('user.index')}}">Trang chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown {{Route::current()->named('user.menu') ? 'active' : ''}}">
                                 <a class="nav-link" href="{{route('user.menu')}}">Thực đơn hôm nay</a>
                            </li>
                            <li class="nav-item {{Route::current()->named('user.recipe') || Route::current()->named('user.recipe.show') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('user.recipe')}}">Công thức</a>
                            </li>
                            <li class="nav-item {{Route::current()->named('user.profile') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('user.profile')}}">Trang cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Câu hỏi tư vấn</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>