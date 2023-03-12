@extends('user.layout.app')
@section('title','Trang chủ | Tư vấn bữa ăn gia đình')
@section('content')
	<!-- ****** Welcome Area End ****** -->
	
	<!-- ****** Categories Area Start ****** -->
	<section class="categories_area clearfix" id="about">
	    <div class="container">
	        <div class="row">
	            <div class="col-12 col-md-6 col-lg-4">
	                <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
	                    <img src="{{asset('user/img/catagory-img/1.jpg')}}" alt="">
	                    <div class="catagory-title">
	                        <a href="#">
	                            <h5>Thức ăn</h5>
	                        </a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-6 col-lg-4">
	                <div class="single_catagory wow fadeInUp" data-wow-delay=".6s">
	                    <img src="{{asset('user/img/catagory-img/2.jpg')}}" alt="">
	                    <div class="catagory-title">
	                        <a href="{{route('user.recipe')}}">
	                            <h5>Nấu ăn</h5>
	                        </a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-6 col-lg-4">
	                <div class="single_catagory wow fadeInUp" data-wow-delay=".9s">
	                    <img src="{{asset('user/img/catagory-img/3.jpg')}}" alt="">
	                    <div class="catagory-title">
	                        <a href="#">
	                            <h5>Trình bày món ăn</h5>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- ****** Categories Area End ****** -->

	<!-- ****** Blog Area Start ****** -->
	<section class="blog_area section_padding_0_80">
	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-12 col-lg-8">
	                <div class="row">
						
						@foreach($recipess as $key => $recipes)
							@if($key == 0)
								<!-- Single Post -->
			                    <div class="col-12">
			                        <div class="single-post wow fadeInUp" data-wow-delay=".2s">
			                            <!-- Post Thumb -->
			                            <div class="post-thumb">
			                                <img src="{{asset($recipes->recipes_image?$recipes->recipes_image:'user/img/blog-img/1.jpg')}}" alt="">
			                            </div>
			                            <!-- Post Content -->
			                            <div class="post-content">
			                                <div class="post-meta d-flex">
			                                    <div class="post-author-date-area d-flex">
			                                        <!-- Post Author -->
			                                        <div class="post-author">
			                                            <a href="#">{{$recipes->author->user_name}}</a>
			                                        </div>
			                                        <!-- Post Date -->
			                                        <div class="post-date">
			                                            <a href="#">{{date("F j, Y, g:i a",strtotime($recipes->created_at))}}</a>
			                                        </div>
			                                    </div>
			                                    <!-- Post Comment & Share Area -->
			                                    <div class="post-comment-share-area d-flex">
			                                        <!-- Post Comments -->
			                                        <div class="post-comments">
			                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{sizeof($recipes->comments)}}</a></a>
			                                        </div>
			                                    </div>
			                                </div>
			                                <a href="{{route('user.recipe.show',$recipes->recipes_id)}}">
			                                    <h2 class="post-headline">{{$recipes->recipes_title}}</h2>
			                                </a>
			                                <p>{{$recipes->recipes_short_title}}</p>
			                                <a href="{{route('user.recipe.show',$recipes->recipes_id)}}" class="read-more">Xem chi tiết..</a>
			                            </div>
			                        </div>
			                    </div>
							@elseif($key < 5)
								<div class="col-12 col-md-6">
			                        <div class="single-post wow fadeInUp" data-wow-delay=".4s">
			                            <!-- Post Thumb -->
			                            <div class="post-thumb">
			                                <img src="{{asset($recipes->recipes_image?$recipes->recipes_image:'user/img/blog-img/2.jpg')}}" alt="">
			                            </div>
			                            <!-- Post Content -->
			                            <div class="post-content">
			                                <div class="post-meta d-flex">
			                                    <div class="post-author-date-area d-flex">
			                                        <!-- Post Author -->
			                                        <div class="post-author">
			                                            <a href="#">{{$recipes->author->user_name}}</a>
			                                        </div>
			                                        <!-- Post Date -->
			                                        <div class="post-date">
			                                            <a href="#">{{date("F j, Y",strtotime($recipes->created_at))}}</a>
			                                        </div>
			                                    </div>
			                                    <!-- Post Comment & Share Area -->
			                                    <div class="post-comment-share-area d-flex">
			                                        <!-- Post Comments -->
			                                        <div class="post-comments">
			                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{sizeof($recipes->comments)}}</a>
			                                        </div>
			                                    </div>
			                                </div>
			                                <a href="{{route('user.recipe.show',$recipes->recipes_id)}}">
			                                    <h4 class="post-headline">{{$recipes->recipes_title}}</h4>
			                                </a>
			                            </div>
			                        </div>
			                    </div>
	                   		@else
	                   			<div class="col-12">
			                        <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
			                            <!-- Post Thumb -->
			                            <div class="post-thumb">
			                                <img src="{{asset($recipes->recipes_image?$recipes->recipes_image:'user/img/blog-img/6.jpg')}}" alt="">
			                            </div>
			                            <!-- Post Content -->
			                            <div class="post-content">
			                                <div class="post-meta d-flex">
			                                    <div class="post-author-date-area d-flex">
			                                        <!-- Post Author -->
			                                        <div class="post-author">
			                                            <a href="#">{{$recipes->author->user_name}}</a>
			                                        </div>
			                                        <!-- Post Date -->
			                                        <div class="post-date">
			                                            <a href="#">{{date("F j, Y",strtotime($recipes->created_at))}}</a>
			                                        </div>
			                                    </div>
			                                    <!-- Post Comment & Share Area -->
			                                    <div class="post-comment-share-area d-flex">
			                                        <!-- Post Comments -->
			                                        <div class="post-comments">
			                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{sizeof($recipes->comments)}}</a>
			                                        </div>
			                                    </div>
			                                </div>
			                                <a href="{{route('user.recipe.show',$recipes->recipes_id)}}">
			                                    <h4 class="post-headline">{{$recipes->recipes_title}}</h4>
			                                </a>
			                                <p>{{$recipes->recipes_short_title}}</p>
			                                <a href="{{route('user.recipe.show',$recipes->recipes_id)}}" class="read-more">Xem chi tiết</a>
			                            </div>
			                        </div>
			                    </div>
	                   		@endif
						@endforeach
	                </div>
	            </div>
 
	            <!-- ****** Blog Sidebar ****** -->
	            @include('user.partials.common')
	        </div>
	    </div>
	</section>
@endsection
