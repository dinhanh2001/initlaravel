@extends('admin.layout.app')
@section('title','Sửa thực phẩm | Quản trị viên')
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
			<a href="{{route('admin.food.edit',$food)}}">Sửa thực phẩm</a> 
		</div>
		<div class="content">
			<div class="panel">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Sửa thực phẩm</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box">
							
							<form action="{{route('admin.food.update',$food)}}" method="POST">
								{{ method_field('PUT') }}
                    			{{ csrf_field() }}
								<div class="form-group">
									<label for=""> Tên thực phẩm</label>
									<input class="form-control" placeholder="Nhập tiêu đề" type="text" name="food_name" value="{{$food->food_name}}">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Năng lượng (energy)</label>
											<input class="form-control" placeholder="Nhập năng lượng" type="number" name="food_energy" value="{{$food->food_energy}}" step="0.1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chất dinh dưỡng (protein)</label>
											<input class="form-control" placeholder="Nhập chất dinh dưỡng" type="number" name="food_protein" value="{{$food->food_protein}}" step="0.1">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chất béo (lipid)</label>
											<input class="form-control" placeholder="Nhập năng lượng" type="number" name="food_lipid" value="{{$food->food_lipid}}" step="0.1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chất xơ (glucid)</label>
											<input class="form-control" placeholder="Nhập chất béo" type="number" name="food_glucid" value="{{$food->food_glucid}}" step="0.1">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for=""> Giá thành</label>
									<input class="form-control" placeholder="Nhập giá thành" type="text" name="food_price" value="{{$food->food_price}}">
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Chọn thể loại</label>
											<select class="form-control" name="food_food_category_id">
												<option value="0">Chọn thể loại</option>
												@if($foodcategories)
													@foreach($foodcategories as $category)
														<option value="{{$category->id}}" {{$food->food_food_category_id == $category->id ? "selected" : ""}}> {{$category->food_category_name}}</option>
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
												<option value="1" {{$food->food_status == 1 ? "selected" : ""}}>Hoạt động</option>
												<option value="0" {{$food->food_status == 0 ? "selected" : ""}}>Ẩn</option>
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