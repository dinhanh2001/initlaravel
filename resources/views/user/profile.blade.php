@extends('user.layout.app')
@section('title','Trang cá nhân | Tư vấn bữa ăn gia đình')
@section('style')
    <link rel="stylesheet" href="{{asset('user/css/jquery/jquery-ui.css')}}">
    <style>
        .form-group{
            outline: 0;
            font-size: 12px;
            padding: 8px 15px;
            -webkit-box-shadow: none!important;
            -moz-box-shadow: none!important;
            -ms-box-shadow: none!important;
            -o-box-shadow: none!important;
            box-shadow: none!important;
        }
        .form-group{
            display: block;
            width: 100%;
            padding: .5rem .75rem;
            font-size: 1rem;
            line-height: 1.25;
            color: #464a4c;
            background-color: #fff;
            background-image: none;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: .25rem;
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s
        }
        span.required{
            color:red;
        }
        h4{
            color: brown;
        }
        .btn:hover{
            cursor: pointer;
        }
        .error{
            color: red;
        }
        .success{
            color: blue;
        }
        .message{
            padding:10px;
        }
        .upload-image input[type=file] {
            position: absolute;
            display: block;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .upload-image {
            position: relative;
            text-align: center;
            border: 1px dashed #d2d6de;
            border-radius: 10px;
            overflow: hidden;
            height: 300px;
        }
        .upload-image img{
            display: inline-block;
            max-height: 100%;
            vertical-align: middle;
        }
        button a{
            color: #fff;
            text-decoration: none;
        }
        button a:hover{
            color:#fff;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
	<!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{asset('user/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Quản lý thông tin cá nhân</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Trang cá nhân</li>
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
            <div class="wrapper">
                <div style="clear: both"></div>
                <div class="message">
                    @if(isset($error))
                        <p class="error">{{$error}}</p>
                    @endif
                    @if(session()->has('error'))
                        <p class="error">{{session()->get('error')}}</p>
                    @elseif(session()->has('success'))
                        <p class="success">{{session()->get('success')}}</p>
                    @endif
                </div>
                <div>
                    <h2>Quản lý trang cá nhân</h2>
                    <hr>
                </div>
                <div class="question">
                    <h4>Cập nhật thông tin</h4>
                	<form action="{{route('user.update.profile')}}" method="POST" id="frmUpdate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <label for=""><span class="required">*</span> Ảnh đại diện</label>
                                <div class="upload-image">
                                    <img src="{{!empty($user->customer_photo_address) ? asset($user->customer_photo_address) : ($user->customer_gender == 1 ? asset('user/img/blog-img/19.jpg') : asset('user/img/blog-img/18.jpg'))}}" alt="">
                                    <input class="form-group" type="file" name="customer_images" id="picture" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for=""><span class="required">*</span> Họ và tên</label>
                                <input class="form-group" type="text" name="customer_name" placeholder="Nhập họ và tên" value="{{$user->customer_name}}">
                            </div>
                            <div class="col-sm-6">
                                <label for=""><span class="required">*</span> Địa chỉ</label>
                                <input class="form-group" type="text" name="customer_address" placeholder="Nhập địa chỉ" value="{{$user->customer_address}}">
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for=""><span class="required">*</span> Ngày sinh</label>
                                <input class="single-daterange form-control" type="text" name="customer_date_of_birth" placeholder="Nhập ngày sinh" value="{{$user->customer_date_of_birth}}">
                            </div>
                            <div class="col-sm-6">
                                <label for=""><span class="required">*</span> Cân nặng (kg)</label>
                                <input class="form-group" type="number" name="customer_weight" step="0.5" placeholder="Nhập số cân nặng" value="{{$user->customer_weight}}" min="1">
                            </div>
                        </div>
                		<div class="row">
                            <div class="col-sm-6">
                                <label for=""><span class="required">*</span> Chiều cao (cm)</label>
                                <input class="form-group" type="text" name="customer_height" step="0.5" placeholder="Nhập số chiều cao" value="{{$user->customer_height}}" min="1">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Thể trạng</label>
                                <select class="form-group" name="customer_present" id="">
                                    <option value="1" {{$user->customer_present == 1 ? "selected" : ""}}>Béo</option>
                                    <option value="2" {{$user->customer_present == 2 ? "selected" : ""}}>Bình thường</option>
                                    <option value="3" {{$user->customer_present == 3 ? "selected" : ""}}>Gầy</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Mong muốn</label>
                                <select class="form-group" name="customer_target" id="">
                                    <option value="increase" {{$user->customer_target == "increase" ? "selected" : ""}}>Tăng cân</option>
                                    <option value="enough" {{$user->customer_target == "enough" ? "selected" : ""}}>Đủ</option>
                                    <option value="reduction" {{$user->customer_target == "reduction" ? "selected" : ""}}>Giảm cân</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Hoạt động</label>
                                <select class="form-group" name="customer_active" id="">
                                    <option value="1" {{$user->customer_active == 1 ? "selected" : ""}}>Ít hoặc không hoạt động</option>
                                    <option value="2" {{$user->customer_active == 2 ? "selected" : ""}}>Vận động nhé: 1-3 lần/tuần</option>
                                    <option value="3" {{$user->customer_active == 3 ? "selected" : ""}}>Vận động vừa phải: 3-5 lần/tuần</option>
                                    <option value="4" {{$user->customer_active == 4 ? "selected" : ""}}>Vận động nhiều: 6-7 lần/tuần</option>
                                    <option value="5" {{$user->customer_active == 5 ? "selected" : ""}}>Vận động nặng: >7 lần/tuần</option>
                                </select>
                            </div>
                        </div>
	                	<button type="submit" class="btn_question btn btn-primary">Lưu</button>
                	</form>
                </div>
                <hr>
                <div class="change-password">
                    <h4>Đổi mật khẩu</h4>
                    <form action="{{route('user.change-password')}}" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <label for=""><span class="required">*</span> Mật khẩu cũ</label>
                            <input class="form-group" type="password" name="old_password" placeholder="Mật khẩu cũ" value="">
                        </div>
                        <div>
                            <label for=""><span class="required">*</span> Mật khẩu mới</label>
                            <input class="form-group" type="password" name="password" placeholder="Mật khẩu mới" value="">
                        </div>
                        <div>
                            <label for=""><span class="required">*</span> Xác nhận mật khẩu</label>
                            <input class="form-group" type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" value="">
                        </div>
                        <div>
                            <button type="submit" class="btn_question btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Archive Area End ****** -->
@endsection
@section('script')
    <script src="{{asset('user/js/jquery/jquery-ui.js')}}"></script>
    <script src="{{asset('libs/jquery/jquery.validate.min.js')}}"></script>
    <script>
        $.validator.addMethod(
            "onlyText",
            function(value, element, regexp) {
                return this.optional(element) || !/[0-9-!$@#%^&*()_+|~=`{\}[\]:;'<>?,.\/\"\\]/.test(value);
            },
            "* Họ và tên không chính xác."
        );
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, '* Kích thước ảnh phải nhỏ hơn 3MB');
        $("#frmUpdate").validate({
            // Các điều kiện của các input
                rules: {
                    customer_name: {
                        required: true,
                        onlyText:true,
                        minlength: 6,
                        maxlength:50,
                    },
                    customer_images:{
                        filesize:3072000
                    },
                    customer_address:{
                        required:true
                    },
                    customer_date_of_birth:{
                        required:true,
                    },
                    customer_weight:{
                        required:true,
                    },
                    customer_height:{
                        required:true,
                    }
                },
                // Custom tin nhắn báo lỗi
                messages: {
                    customer_name:{
                        required: "* Cần nhập thông tin.",
                        minlength: jQuery.validator.format("* Ít nhất từ 6 ký tự."),
                        maxlength: jQuery.validator.format("* Chỉ dưới 100 ký tự"),
                    },
                    customer_address:{
                        required: "* Cần nhập thông tin.",
                    },
                    customer_date_of_birth:{
                        required: "* Cần nhập thông tin.",
                    },
                    customer_weight:{
                        required: "* Cần nhập thông tin.",
                    },
                    customer_height:{
                        required: "* Cần nhập thông tin.",
                    }
                }
          });
        $(".single-daterange").datepicker();
        $('#picture').change(function(e){
            console.log(this.files);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-image img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }else{
                $('.upload-image img').attr('src', '{{asset('assets/images/480x300.png')}}');
            }
        });
    </script>
@endsection