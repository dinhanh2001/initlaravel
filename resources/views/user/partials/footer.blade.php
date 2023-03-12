
</div>
<!-- ****** Footer Social Icon Area End ****** -->

<!-- ****** Footer Menu Area Start ****** -->
<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-content">
                    <!-- Logo Area Start -->
                    <div class="footer-logo-area text-center">
                        <a href="{{route('user.index')}}" class="yummy-logo">Tư vấn bữa ăn gia đình</a>
                    </div>
                    <!-- Menu Area Start -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-footer-nav" aria-controls="yummyfood-footer-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-footer-nav">
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
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copy_right_text text-center">
                    <p>Thực hiện bởi nhóm 12 (Trần Tiến Lương, Ngô Thị Thùy Linh, Trần Đức Long) <i class="fa fa-heart-o" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
</footer>