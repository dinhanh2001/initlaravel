@extends('admin.layout.app')
@section('title','Sửa công thức | Quản trị viên')
@section('link')
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
	<script src="{{asset('libs/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('style')
	<style>
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
		label.error{
			padding-top: 4px;
			color:red;
		}
	</style>
@endsection
@section('content')
	<div class="main">
		<div class="breadcrumb">
			<a href="{{route('admin.index')}}">Trang chủ</a> 
			<a href="{{route('admin.recipe.index')}}">Quản lí công thức</a> 
			<a href="{{route('admin.recipe.edit',$recipe)}}">Sửa công thức</a> 
		</div>
		<div class="content">
			<div class="panel">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Sửa công thức</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box">
							<form action="{{route('admin.recipe.update',$recipe)}}" id="frmUpdate" enctype="multipart/form-data" method="POST">
								{{ method_field('PUT') }}
                    			{{ csrf_field() }}
                    			<input type="hidden" name="recipes_user_id" value="{{Auth::id()}}">
								<div class="form-group">
									<label for=""> Tiêu đề bài viết</label>
									<input class="form-control" placeholder="Nhập tiêu đề" type="text" name="recipes_title" value="{{$recipe->recipes_title}}">
								</div>
								<div class="form-group">
									<label for=""> Mô tả ngắn</label>
									<input class="form-control" placeholder="Nhập mô tả ngắn" type="text" name="recipes_short_title" value="{{$recipe->recipes_short_title}}">
								</div>
								<div class="form-group">
									<label for=""> Ảnh bài viết</label>
									<div class="upload-image">
					                    <img src="{{$recipe->recipes_image == '' ? asset('assets/images/480x300.png') : asset($recipe->recipes_image)}}" alt="">
					                    <input name="recipes_image" type="file" id="picture" accept="image/*">
					                </div>
								</div>
								<div class="form-group">
									<label for=""> Nội dung bài viết</label>
									<textarea name="recipes_content" id="editor1" rows="10" cols="80">
								        {!! $recipe->recipes_content !!}
								    </textarea>
								    <script>
								        CKEDITOR.replace( 'editor1' );
								    </script>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Trạng thái</label>
											<select class="form-control" name="recipes_status">
												<option {{$recipe->recipes_status == 1 ? "selected" :""}} value="1">Hoạt động</option>
												<option {{$recipe->recipes_status == 0 ? "selected" :""}} value="0">Ẩn</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Chọn thực phẩm</label>
											<select class="form-control" name="recipes_food_id">
												@if($foods)
													@foreach($foods as $food)
														<option value="{{$food->id}}" {{$recipe->recipes_food_id == $food->id ? "selected" : ""}}> {{$food->food_name}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
								</div>
								<div class="content-box-footer">
									<button class="btn btn-primary" type="submit">Lưu</button>
									<button class="btn btn-primary" type="submit"><a href="{{route('admin.recipe.index')}}">Hủy</a></button>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection('content')
@section('script')
    <script src="{{asset('user/js/jquery/jquery-ui.js')}}"></script>
    <script src="{{asset('libs/jquery/jquery.validate.min.js')}}"></script>
    <script>
    	$.validator.addMethod(
		    "onlyText",
		    function(value, element, regexp) {
		        var check = false;
		        return this.optional(element) || !/[0-9-!$@#%^&*()_+|~=`{\}[\]:;'<>?,.\/\"\\]/.test(value);
		    },
		    "* Vui lòng chỉ nhập nội dung chữ."
		);
    	$.validator.addMethod('filesize', function (value, element, param) {
		    return this.optional(element) || (element.files[0].size <= param)
		}, '* Kích thước ảnh phải nhỏ hơn 3MB');
    	$("#frmUpdate").validate({
		// Các điều kiện của các input
			rules: {
				// Input có name=ename sẽ có những điều kiện như sau
				recipes_title: {
					required: true,
					onlyText: true,
					minlength: 6,
					maxlength: 150
				},
				recipes_short_title: {
					required: true,
					minlength: 6,
					maxlength: 250
				},
				recipes_content: {
					required: true,
				},
				recipes_food_id: {
					required: true,
					min:1
				},
				recipes_user_id: {
					required: true,
				},
		      	recipes_image:{
		      		filesize:3072000
		      	}
			},
			// Custom tin nhắn báo lỗi
		  	messages: {
				recipes_title:{
					required: "* Cần nhập đầy đủ thông tin.",
				  	minlength: jQuery.validator.format("* Ít nhất từ 6 ký tự."),
				  	maxlength: jQuery.validator.format("* Chỉ dưới 100 ký tự"),
	      		},
	      		recipes_short_title:{
					required: "* Cần nhập đầy đủ thông tin.",
				  	minlength: jQuery.validator.format("* Ít nhất từ 6 ký tự."),
				  	maxlength: jQuery.validator.format("* Chỉ dưới 100 ký tự"),
	      		},
	      		recipes_content:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		recipes_food_id:{
					required: "* Cần nhập đầy đủ thông tin.",
					min:"* Cần chọn một loại thực phẩm"
	      		},
	      		recipes_user_id:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		recipes_image:{
					required: "* Cần chọn hình ảnh.",
	      		}
			}
	  });
        $('#picture').change(function(e){
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