@extends('admin.layout.app')
@section('title','Thêm người dùng mới | Quản trị viên')
@section('link')
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
	<script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@endsection
@section('style')
	<style>
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
			<a href="{{route('admin.user.index')}}">Quản lí người dùng</a> 
			<a href="{{route('admin.user.create')}}">Thêm người dùng</a> 
		</div>
		<div class="content">
			<div class="panel">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Thêm người dùng</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box">
							
							<form action="{{route('admin.user.store')}}" method="POST">
								{{ method_field('POST') }}
                    			{{ csrf_field() }}
								<div class="form-group">
									<label for=""> Tên đầy đủ</label>
									<input class="form-control" placeholder="Nhập tên" type="text" name="user_name">
								</div>
								<div class="form-group">
									<label for=""> Địa chỉ email</label>
									<input class="form-control" placeholder="Nhập email" type="email" name="user_email">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Mật khẩu</label>
											<input class="form-control" placeholder="Nhập mật khẩu" type="password" name="user_password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Xác nhận lại mật khẩu</label>
											<input class="form-control" placeholder="Xác nhận lại mật khẩu" type="password" name="repassword">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Ngày sinh</label>
											<input class="single-daterange form-control" placeholder="Nhập ngày sinh" type="text" value="04/12/1997" name="user_date_of_birth">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Chiều cao</label>
											<input class="form-control" placeholder="Nhập chiều cao" type="number" name="user_height" step="0.5">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""> Cân nặng</label>
											<input class="form-control" placeholder="Nhập cân nặng" type="number" name="user_weight">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Mục tiêu hướng tới</label>
											<input class="form-control" placeholder="Nhập mục tiêu" type="text" value="" name="user_target">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Bệnh tình</label>
											<select class="form-control" name="user_disease_id">
												<option selected="true" value="1">Không có bệnh</option>
												@if($diseases)
													@foreach($diseases as $disease)
														<option value="{{$disease->id}}"> {{$disease->disease_name}}</option>
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
											<select class="form-control" name="user_status">
												<option selected="true" value="1">Hoạt động</option>
												<option value="0"> Ẩn</option>
											</select>
										</div>
									</div>
								</div>
								<label class="col-sm-4 control-label">Giới tính </br></label>
									<div class="col-sm-8">
										<label class="check-label"><input checked="" name="user_gender" type="radio" value="1">Nam</label>
										<label class="check-label"><input name="user_gender" type="radio" value="2">Nữ</label>
										</br>
									</div>
								<div class="form-group">
									<label for=""> Công việc hiện tại</label>
									<select class="form-control select2" multiple="true" name="user_job">
										<option selected="true" value="Sinh_vien">Sinh viên</option>
										<option value="Nhan_vien"> Nhân viên </option>
										<option value="Bac_si"> Bác sĩ</option>
										<option value="Ky_su"> Kỹ sư</option>
									</select>
								</div>
								<input type="hidden" name="user_permission_id" value="2">
								<div class="content-box-footer">
									<button class="btn btn-primary" type="submit">Lưu</button>
									<button class="btn btn-primary" type="submit"><a href="{{route('admin.user.index')}}">Hủy</a></button>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection('content')