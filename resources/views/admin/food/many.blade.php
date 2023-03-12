@extends('admin.layout.app')
@section('title','Thêm thực phẩm mới | Quản trị viên')
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
			<a href="{{route('admin.food.index')}}">Quản lí thực phẩm</a> 
			<a href="{{route('admin.food.create')}}">Thêm thực phẩm</a> 
		</div>
		<div class="content">
			<div class="panel">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Thêm thực phẩm mới</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box">
							<form action="{{route('admin.food.storemany')}}" method="POST" enctype="multipart/form-data">
								{{ method_field('POST') }}
                    			{{ csrf_field() }}
								<div class="form-group">
									<label for=""> Chọn file excel</label>
									<input type="file" name="file" accept="">
								</div>
								<div class="content-box-footer">
									<button class="btn btn-primary" type="submit">Lưu</button>
									<button class="btn btn-primary" type="submit"><a href="{{route('admin.food.index')}}">Hủy</a></button>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection('content')