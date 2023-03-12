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
							
							<form action="{{route('admin.food.store')}}" id="frmStore" method="POST">
								{{ method_field('POST') }}
                    			{{ csrf_field() }}
								<div class="form-group">
									<label for=""> Tên thực phẩm</label>
									<input class="form-control" placeholder="Nhập tên thực phẩm" type="text" name="food_name">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Năng lượng (energy)</label>
											<input class="form-control" placeholder="Nhập năng lượng" type="number" name="food_energy" step="0.1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chất dinh dưỡng (protein)</label>
											<input class="form-control" placeholder="Nhập chất dinh dưỡng" type="number" name="food_protein" step="0.1">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chất béo (lipid)</label>
											<input class="form-control" placeholder="Nhập năng lượng" type="number" name="food_lipid" step="0.1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chất xơ (glucid)</label>
											<input class="form-control" placeholder="Nhập chất béo" type="number" name="food_glucid" step="0.1">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for=""> Giá thành</label>
									<input class="form-control" placeholder="Nhập giá thành" type="number" name="food_price">
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Chọn thể loại</label>
											<select class="form-control" name="food_food_category_id">
												<option selected="" value="0">Chọn thể loại</option>
												@if($foodcategories)
													@foreach($foodcategories as $category)
														<option value="{{$category->id}}"> {{$category->food_category_name}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Trạng thái</label>
											<select class="form-control" name="food_status">
												<option value="1">Hoạt động</option>
												<option value="0">Ẩn</option>
											</select>
										</div>
									</div>
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
@section('script')
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
    	$("#frmStore").validate({
		// Các điều kiện của các input
			rules: {
				// Input có name=ename sẽ có những điều kiện như sau
				food_name: {
					required: true,
					onlyText: true,
					minlength: 2,
					maxlength: 30
				},
				food_energy: {
					required: true,
				},
				food_protein: {
					required: true,
				},
				food_lipid: {
					required: true,
				},
				food_glucid: {
					required: true,
				},
		      	food_price:{
		      		required:true,
		      	},
		      	food_food_category_id:{
					min:1
		      	}
			},
			// Custom tin nhắn báo lỗi
		  	messages: {
				food_name:{
					required: "* Cần nhập đầy đủ thông tin.",
				  	minlength: jQuery.validator.format("* Ít nhất từ 6 ký tự."),
				  	maxlength: jQuery.validator.format("* Chỉ dưới 100 ký tự"),
	      		},
	      		food_energy:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		food_protein:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		food_lipid:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		food_glucid:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		food_price:{
					required: "* Cần nhập đầy đủ thông tin.",
	      		},
	      		food_food_category_id:{
					min:"* Cần chọn loại thực phẩm"
	      		}
			}
	  });
    </script>
@endsection