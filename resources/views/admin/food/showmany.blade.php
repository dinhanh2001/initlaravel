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
				<a href="{{route('admin.food.createmany')}}">Thêm nhiều thực phẩm</a> 
			</div>
			<div class="content with-top-banner">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Thêm nhiều thực phẩm</div>
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
								</div>
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th>Tên thực phẩm</th>
												<th class="text-center">Energy</th>
												<th class="text-center">Protein</th>
												<th class="text-center">Lipid</th>
												<th class="text-center">Glucid</th>
												<th class="text-center">Category</th>
												<th class="text-center">Giá</th>
											</tr>
										</thead>
										<tbody>
										@if($ws)
							                @for($i = 2 ; $i < $ws->getHighestRow() ; $i++)
							                    <tr>
													<th class="text-center">{{$i-1}}</th>
													<td class="nowrap">{{$ws->getCell('B'.$i)->getValue()}}</td>
													<td class="text-center">
														{{$ws->getCell('C'.$i)->getValue()}}
													</td>
													<td class="text-center">
														{{$ws->getCell('D'.$i)->getValue()}}
													</td>
													<td class="text-center">
														{{$ws->getCell('E'.$i)->getValue()}}
													</td>
													<td class="text-center">
														{{$ws->getCell('F'.$i)->getValue()}}
													</td>
													<td class="text-center">
														{{$ws->getCell('G'.$i)->getValue() == 1 ? 'Chất đạm': ($ws->getCell('G'.$i)->getValue() == 2 ? 'Chất béo' : 'Chất xơ')}}
													</td>
													<td class="text-center">
														{{$ws->getCell('H'.$i)->getValue()}}
													</td>
												</tr>
							                @endfor
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