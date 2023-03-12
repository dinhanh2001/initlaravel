@extends('admin.layout.app')
@section('title','Quản lý thực phẩm | Quản trị viên')
@section('style')
	<style>
		.main{
			font-size: 17px;
		}
		.button_i i{
			cursor: pointer;
			color: #000;
		}
		.button_i i:hover{
			transform: scale(1.2);
		}
	</style>
@endsection('style')
@section('content')
		<div class="main">
			<div class="breadcrumb">
				<a href="{{route('admin.index')}}">Trang chủ</a> 
				<a href="{{route('admin.food.index')}}">Quản lý thực phẩm</a> 
			</div>
			<div class="content with-top-banner">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Quản lý thực phẩm</div>
				</div>
				<div class="panel">
					<div class="row">
						<div class="col-md-12">
							<div class="content-box">
								<div class="content-box-header">
									<form action="" method="GET">
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for=""> Tìm theo tên</label>
													<input class="form-control" placeholder="Tìm kiếm theo tên" type="text" name="name">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for=""> Tìm theo loại</label>
													<select class="form-control" name="category">
														<option selected="true" value="">Chọn thể loại</option>
														@foreach($foodcategories as $category)
														<option value="{{$category->id}}">{{$category->food_category_name}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<button class="btn btn-primary sm-max" style="bottom: 0;position: absolute;margin-bottom: 1rem;" type="submit">Tìm kiếm</button>
											</div>
										</div>
									</form>
									<div class="text-center">
										@if(session()->has('message'))
											<p class="text-center" style="color: blue;padding: 5px 0">{{session()->get('message')}}</p>
										@endif
									</div>
									<div class="row">
										<div class="col-md-3 sm-max form-inline justify-content">
											<button class="btn btn-primary sm-max" id="btn_new"><i class="fa fa-pencil"></i> <a href="{{route('admin.food.create')}}" style="color:#fff">Thêm thực phẩm mới</a></button>
										</div>
										<div class="col-md-3 sm-max form-inline justify-content">
											<button class="btn btn-primary sm-max" id="btn_new"><i class="fa fa-pencil"></i> <a href="{{route('admin.food.createmany')}}" style="color:#fff">Thêm nhiều thực phẩm mới</a></button>
										</div>
									</div>
								</div>
								<form action="{{route('admin.food.deletemany')}}" method="POST" onsubmit="return deleteSubmit()" id="form1">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-3">
											<button class="btn btn-primary sm-max" type="submit"><i class="fa fa-trash"></i> Xóa</button>
										</div>
									</div>
									<div class="row">
										<p style="height: 5px;"></p>
									</div>
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th class="text-center">
														<input type="checkbox" onclick="checkAll(this)">
													</th>
													<th class="text-center">#</th>
													<th>Tên thực phẩm</th>
													<th class="text-center">Năng lượng</th>
													<th class="text-center">Giá</th>
													<th class="text-center">Trạng thái</th>
													<th class="text-center">Điều khiển</th>
												</tr>
											</thead>
											<tbody>
											@if($foods)
												@foreach($foods as $id=>$food)
													<tr>
														<th class="text-center">
															<input type="checkbox" class="ckbFood" name="ckb[]" value="{{$food->id}}">
														</th>
														<th class="text-center">{{(($foods->currentPage() - 1 ) * $foods->perPage()) + ($id+1)}}</th>
														<td class="nowrap">{{$food->food_name}}</td>
														<td class="text-center">
															{{$food->food_energy}}
														</td>
														<td class="text-center">
															{{$food->food_price}}
														</td>
														<td class="text-center">
															{{$food->food_status == 1 ? "Hoạt động" : "Ẩn"}}
														</td>
														<td class="text-center">
															<div class="button_i">
																<a href="{{route('admin.food.edit',$food)}}"><i class="fa fa-pencil"></i></a>
																<span style="color: #fff">0</span>
																<a href="javascript:void(0)" onclick="destroy('{{route('admin.food.destroy',$food)}}')"><i class="fa fa-trash"></i></a>
															</div>
														</td>
													</tr>
												@endforeach
											@endif
											</tbody>
										</table>
										<div style="margin-top: 10px;text-align: right;float:right">
											{{$foods->links('vendor.paginate.paginate', ['paginator' => $foods])}}
										</div>
										<div style="clear:both"></div>
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
	<script>
		function destroy(url){
			if(deleteSubmit()){
				$.ajax({
					url:url,
					method: "POST",
					data:{
						_token: '{{ csrf_token() }}',
						_method: 'DELETE'
					},
					success:function(res){
						alert('Xóa thực phẩm thành công');
						window.location.reload(true);
					},
					error:function(err){
						alert('Có lỗi xảy ra rồi');
					}
				})


			}
		}
		function deleteSubmit(){
			if(confirm("Bạn thực sự muốn xóa?")){
				return true;
			}else{
				return false;
			}	
		}
		function checkAll(e){
			console.log($(e).prop( "checked" ));
			if($(e).prop( "checked" )){
				$('.ckbFood').prop("checked",true);
			}else{
				$('.ckbFood').prop("checked",false);
			}
		}
	</script>
@endsection