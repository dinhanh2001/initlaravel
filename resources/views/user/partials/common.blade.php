<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="blog-sidebar mt-5 mt-lg-0">
        <!-- Single Widget Area -->
        <div class="single-widget-area popular-post-widget">
            <div class="widget-title text-center">
                <h6>Công thức phổ biến</h6>
            </div>
            @foreach($commons as $key => $recipes)
            <!-- Single Popular Post -->
            <div class="single-populer-post d-flex">
                <img src="{{asset($recipes->recipes_image?$recipes->recipes_image:'user/img/sidebar-img/1.jpg')}}" alt="">
                <div class="post-content">
                    <a href="{{route('user.recipe.show',$recipes->recipes_id)}}">
                        <h6>{{$recipes->recipes_title}}</h6>
                    </a>
                    <p>{{date("F j, Y, g:i a",strtotime($recipes->created_at))}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Single Widget Area -->
        <div class="single-widget-area add-widget text-center">
            <div class="add-widget-area">
                <img src="{{asset('user/img/sidebar-img/6.jpg')}}" alt="">
                <div class="add-text">
                    <div class="yummy-table">
                        <div class="yummy-table-cell">
                            <h2>Khóa học nấu ăn</h2>
                            <p>Đăng ký học ngay!</p>
                            <a href="#" class="add-btn">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Widget Area -->
        <div class="single-widget-area newsletter-widget">
            <div class="widget-title text-center">
                <h6>Đăng ký</h6>
            </div>
            <p>Đăng ký với chúng tôi để nhận được những thông báo về thông tin cập nhật mới nhất,..</p>
            <div class="newsletter-form">
                <form action="#" method="post">
                    <input type="email" name="newsletter-email" id="email" placeholder="Email của bạn">
                    <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>