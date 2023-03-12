@extends('user.layout.app')
@section('title','Công thức nấu | Tư vấn bữa ăn gia đình')
@section('style')
    <style>
        .collapse{
            display: block !important;
        }
        .list-inline .list-inline li:first-child{
            display: none;
        }
    </style>
@endsection
@section('content')
	<!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{asset('user/img/bg-user/img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Công thức nấu ăn</h2>
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
    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">

                        <!-- Single Post Share Info -->
                        <div class="col-2 col-sm-1">
                            <div class="single-post-share-info mt-100">
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{asset($recipes->recipes_image?$recipes->recipes_image:'user/assets/images/tom.jpg')}}" alt="">
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
                                    <a href="#">
                                        <h2 class="post-headline">{{$recipes->recipes_title}}</h2>
                                    </a>
                                    <p>{{$recipes->short_title}}</p>
                                    {!! $recipes->recipes_content !!}
                                </div>
                            </div>

                            <!-- Tags Area -->
                            <div class="tags-area">
                                <a href="#">Tôm</a>
                                <a href="#">Rau củ</a>
                                <a href="#">Xào</a>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30"><span class="num_comment">{{sizeof($recipes->comments)}}</span> Bình luận</h4>
                                <ol class="lst_comment">
                                    @foreach($recipes->comments as $key => $comment)
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-author">
                                                    <img src="{{!empty($comment->author->customer_photo_address) ? asset($comment->author->customer_photo_address) : ($comment->author->customer_gender == 1 ? asset('user/img/blog-img/19.jpg') : asset('user/img/blog-img/18.jpg'))}}" alt="">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content">
                                                    <span class="comment-date text-muted">{{date("F j, Y, g:i a",strtotime($comment->created_at))}}</span>
                                                    @if($comment->isMine())
                                                        <span style="color:#fff">0</span>
                                                        <span><i class="fa fa-pencil" style="cursor: pointer;" onclick="editClick({{$key}})"></i></span>
                                                        <span style="color:#fff">|</span>
                                                        <span><i class="fa fa-trash" style="cursor: pointer;" onclick="deleteClick('{{route('user.comment.destroy',$comment)}}',{{$key}})"></i></span>
                                                    @endif
                                                    <h5>{{$comment->author->customer_name}}</h5>
                                                    <form style="margin:7px 0px;" action="{{route('user.comment.update',$comment)}}" onsubmit="return updateComment(this,{{$key}})">
                                                        {{csrf_field()}}
                                                        <p class="comment">{{strip_tags($comment->comment_content)}}</p>
                                                        <div class="showEdit" style="display: none">
                                                            <textarea class="form-control" name="comment_content" id="message" cols="30" rows="5" placeholder="Lời nhắn" required="">{{strip_tags($comment->comment_content)}}</textarea>
                                                            <div style="padding:5px 0px">
                                                                <button type="submit" class="active" style="background: #007bff;    min-width: 80px;
                                                                    height: 30px;
                                                                    border: 1px solid #ebebeb;
                                                                    line-height: 30px;
                                                                    font-size: 13px;
                                                                    text-align: center;
                                                                    color: #fff;
                                                                    display: inline-block;
                                                                    cursor: pointer;">Lưu</button>
                                                                <a href="javascript:void(0)" class="active" onclick="closeClick({{$key}})">Hủy</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>

                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Gửi bình luận</h4>
                                    <!-- Comment Form -->
                                    @if(Auth::guard('customer')->check())
                                    <form id="comment_store" action="{{route('user.comment.store')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" value="{{Auth::guard('customer')->user()->id}}" name="comment_customer_id">
                                            <input type="hidden" value="{{$recipes->id}}" name="comment_recipes_id">
                                            <textarea class="form-control" name="comment_content" class="comment_content" cols="30" rows="10" placeholder="Lời nhắn" required=""></textarea>
                                        </div>
                                        <button type="submit" class="btn contact-btn">Gửi bình luận</button>
                                    </form>
                                    @else
                                        <p>Vui lòng <a href="{{route('user.get.login')}}">Đăng nhập</a> để bình luận</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @include('user.partials.common')
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var imgs = $('.lazy');
        imgs.each(function(id,img){
            $('.lazy').eq(id).attr("src",$('.lazy').eq(id).attr('data-src'));
        });
        function editClick(id){
            $('p.comment').eq(parseInt(id)).hide();
            $('.showEdit').eq(parseInt(id)).show();
        }
        function closeClick(id){
            $('p.comment').eq(parseInt(id)).show();
            $('.showEdit').eq(parseInt(id)).hide();
        }
        function deleteClick(url,id){
            if(confirm('Bạn thực sự muốn xóa?')){
                var data = {
                    '_method':"DELETE",
                    '_token': '{{csrf_token()}}',
                }
                $.ajax({
                    url: url,
                    method:"POST",
                    headers: {
                        "Accept":"application/json",
                    },
                    data:data,
                    success:function(data){
                        $('.single_comment_area').eq(parseInt(id)).remove();
                        $('.num_comment').text(parseInt($('.num_comment').text())-1);
                    },
                    error:function(err){
                        alert("Có lỗi xảy ra");
                    }
                })
            }
        }
        function updateComment(self,id){
            data = $(self).serialize()  + "&_method=PUT";
            $.ajax({
                url: $(self).attr('action'),
                method:"POST",
                headers: {
                    "Accept":"application/json",
                },
                data:data,
                success:function(data){
                    $('p.comment').eq(parseInt(id)).html(data.data);
                    $('p.comment').eq(parseInt(id)).show();
                    $('.showEdit').eq(parseInt(id)).hide();
                },
                error:function(err){
                    alert("Có lỗi xảy ra");
                }
            })
            return false;   
        }
    </script>
@endsection