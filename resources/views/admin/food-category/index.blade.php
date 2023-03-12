@extends('admin.layout.app')
@section('title','Quản lý danh mục thực phẩm | Quản trị viên')
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
				<a href="{{route('admin.food-category.index')}}">Quản lý danh mục thực phẩm</a> 
			</div>
			<div class="content with-top-banner">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Quản lý danh mục thực phẩm</div>
				</div>
				<div class="panel">
					<div class="row">
						<div class="col-md-12">
							<div class="content-box">
								<div class="content-box-header">
									<div class="text-center">
										@if(session()->has('message'))
											<p class="text-center" style="color: blue;">{{session()->get('message')}}</p>
										@endif
									</div>
									<div class="row">
										<div class="col-md-12 sm-max form-inline justify-content">
											<button class="btn btn-primary sm-max" id="btn_new"><i class="fa fa-pencil"></i> <a href="{{route('admin.food-category.create')}}" style="color:#fff">Thêm danh mục mới</a></button>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th>Tên danh mục</th>
												<th class="text-center">Tóm tắt</th>
												<th class="text-center">Trạng thái</th>
												<th class="text-right">Ngày đăng</th>
												<th class="text-center">Điều khiển</th>
											</tr>
										</thead>
										<tbody>
										@if($recipes)
											@foreach($recipes as $id=>$recipe)
												<tr>
													<th class="text-center">{{$id+1}}</th>
													<td class="nowrap">{{$recipe->recipes_title}}</td>
													<td class="text-center">
														{{$recipe->recipes_short_title}}
													</td>
													<td class="text-center">
														{{$recipe->recipes_status == 1 ? "Hoạt động" : "Ẩn"}}
													</td>
													<td class="text-right">{{$recipe->created_at}}</td>
													<td class="text-center">
														<div class="button_i">
															<a href="{{route('admin.recipe.edit',$recipe)}}"><i class="fa fa-pencil"></i></a>
															<span style="color: #fff">0</span> <form style="display: inline" action="{{route('admin.recipe.destroy',$recipe)}}" method="POST" onsubmit="return destroySubmit()">
																{{ method_field('DELETE') }}
                    											{{ csrf_field() }}
																<button type="submit"><i class="fa fa-trash"></i></button>
															</form>
														</div>
													</td>
												</tr>
											@endforeach
										@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection('content')
@section('script')
	<script>
		function destroySubmit(){
			if(confirm("Bạn thực sự muốn xóa?")){
				return true;
			}else{
				return false;
			}
		}
	</script>
@endsection