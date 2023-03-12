@extends('admin.layout.app')
@section('title','Quản lý câu hỏi | Quản trị viên')
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
				<a href="{{route('admin.question.index')}}">Quản lý câu hỏi</a> 
			</div>
			<div class="content with-top-banner">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Quản lý câu hỏi</div>
				</div>
				<div class="panel">
					<div class="row">
						<div class="col-md-12">
							<div class="content-box">
								<form action="{{route('admin.question.deletemany')}}" method="POST" onsubmit="return deleteSubmit()">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<div class="content-box-header">
										<div class="text-center">
											@if(session()->has('message'))
												<p class="text-center" style="color: blue;">{{session()->get('message')}}</p>
											@endif
										</div>
										<div class="row">
											<div class="col-md-12 sm-max form-inline justify-content">
												<button class="btn btn-primary sm-max" id="btn_new"><i class="fa fa-pencil"></i> <a href="{{route('admin.question.create')}}" style="color:#fff">Thêm câu hỏi mới</a></button>
											</div>
										</div>
										<div class="row">
											<p style="height: 5px;"></p>
										</div>
										<div class="row">
											<div class="col-md-3">
												<button class="btn btn-primary sm-max" type="submit"><i class="fa fa-trash"></i> Xóa</button>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th class="text-center">
														<input type="checkbox" onclick="checkAll(this)">
													</th>
													<th class="text-center">#</th>
													<th>Tác giả</th>
													<th class="text-center">Nội dung</th>
													<th class="text-center">Số bình luận</th>
													<th class="text-center">Ngày tạo</th>
													<th class="text-center">Điều khiển</th>
												</tr>
											</thead>
											<tbody>
											@if($questions)
												@foreach($questions as $id=>$question)
													<tr>
														<th class="text-center">
															<input type="checkbox" class="ckbQuestion" name="ckb[]" value="{{$question->id}}">
														</th>
														<th class="text-center">{{(($questions->currentPage() - 1 ) * $questions->perPage()) + ($id+1)}}</th>
														<td class="nowrap">{{$question->auth->user_name}}</td>
														<td class="text-center" width="30%">
															{{ str_limit($question->question_content, $limit = 40, $end = '...') }}
														</td>
														<td class="text-center">
															{{sizeof($question->answer)}}
														</td>
														<td class="text-center">
															{{$question->created_at}}
														</td>
														<td class="text-center">
															<div class="button_i">
																<a href="{{route('admin.question.edit',$question)}}"><i class="fa fa-pencil"></i></a>
																<span style="color: #fff">0</span>
																<a href="javascript:void(0)" onclick="destroy('{{route('admin.question.destroy',$question)}}')"><i class="fa fa-trash"></i></a>
															</div>
														</td>
													</tr>
												@endforeach
											@endif
											</tbody>
										</table>
										<div style="margin-top: 10px;text-align: right;float:right">
											{{$questions->links('vendor.paginate.paginate', ['paginator' => $questions])}}
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
						alert('Xóa câu hỏi thành công');
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
				$('.ckbQuestion').prop("checked",true);
			}else{
				$('.ckbQuestion').prop("checked",false);
			}
		}
	</script>
@endsection