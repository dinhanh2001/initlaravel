@extends('admin.layout.app')
@section('title','Thêm công thức mới | Quản trị viên')
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
	<div class="main">
		<div class="breadcrumb">
			<a href="{{route('admin.index')}}">Trang chủ</a> 
			<a href="{{route('admin.recipe.index')}}">Quản lí công thức</a> 
			<a href="{{route('admin.recipe.create')}}">Thêm công thức</a> 
		</div>
		<div class="content">
			<div class="panel">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Thêm công thức mới</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box">
							
							<form action="{{route('admin.recipe.store')}}" enctype="multipart/form-data" method="POST">
								{{ method_field('POST') }}
                    			{{ csrf_field() }}
								<div class="form-group">
									<label for=""> Tiêu đề bài viết</label>
									<input class="form-control" placeholder="Nhập tiêu đề" type="text" name="recipes_title">
								</div>
								<div class="form-group">
									<label for=""> Mô tả ngắn</label>
									<input class="form-control" placeholder="Nhập mô tả ngắn" type="text" name="recipes_short_title">
								</div>
								<div class="form-group">
									<label for=""> Ảnh bài viết</label>
									<div class="upload-image">
					                    <img src="{{asset('assets/images/480x300.png')}}" alt="">
					                    <input name="recipes_image" type="file" id="picture">
					                </div>
								</div>
								<div class="form-group">
									<label for=""> Nội dung bài viết</label>
									<textarea name="recipes_content" id="editor1" rows="10" cols="80">
								        Nội dung bài viết
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
												<option value="1">Hoạt động</option>
												<option value="0">Ẩn</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Chọn thực phẩm</label>
											<select class="form-control" name="recipes_food_id">
												<option selected="" value="0">Chọn thực phẩm</option>
												@if($foods)
													@foreach($foods as $food)
														<option value="{{$food->id}}"> {{$food->food_name}}</option>
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