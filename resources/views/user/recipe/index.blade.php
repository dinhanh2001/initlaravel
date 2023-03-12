@extends('user.layout.app')
@section('title','Công thức | Tư vấn bữa ăn gia đình')
@section('content')
	<!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{asset('user/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Danh sách công thức</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Công thức</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area section_padding_80">
        <div class="container">
            <div class="row">

                @foreach($recipess as $key => $recipes)
                <!-- Single Post -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
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
                                        <a href="#">{{date("F j, Y",strtotime($recipes->created_at))}}</a>
                                    </div>
                                </div>
                                <!-- Post Comment & Share Area -->
                                <div class="post-comment-share-area d-flex">
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
                @endforeach
                <div class="col-12">
                    <div class="pagination-area d-sm-flex mt-15">
                        <nav aria-label="#">
                            {{$recipess->links('vendor.paginate.paginate', ['paginator' => $recipess])}}
                        </nav>
                        <div class="page-status">
                            <p>Từ {{(($recipess->currentPage() - 1 ) * $recipess->perPage())+1}} đến {{(($recipess->currentPage() - 1 ) * $recipess->perPage())+sizeof($recipess)}} trong tổng {{$recipess->total()}} công thức</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ****** Archive Area End ****** -->
@endsection