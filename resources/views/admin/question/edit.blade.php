@extends('admin.layout.app')
@section('title','Sửa câu hỏi | Quản trị viên')
@section('link')
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
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
			<a href="{{route('admin.question.index')}}">Quản lý câu hỏi</a> 
			<a href="{{route('admin.question.edit',$question)}}">Sửa câu hỏi</a> 
		</div>
		<div class="content">
			<div class="panel">
				<div class="content-header no-mg-top">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Sửa câu hỏi</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box">
							
							<form action="{{route('admin.question.update',$question)}}" method="POST">
								{{ method_field('PUT') }}
                    			{{ csrf_field() }}
								<div class="form-group">
									<label for=""> Nội dung câu hỏi</label>
									<textarea class="form-control" name="question_content" id="" cols="30" rows="30">{{$question->question_content}}</textarea>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""> Trạng thái</label>
											<select class="form-control" name="question_status">
												<option value="1" {{$question->question_status == 1 ? "selected" : ""}}>Hoạt động</option>
												<option value="0" {{$question->question_status == 0 ? "selected" : ""}}>Ẩn</option>
											</select>
										</div>
									</div>
								</div>
								<input type="hidden" name="question_user_id" value="{{Auth::id()}}">
								<div class="content-box-footer">
									<button class="btn btn-primary" type="submit">Lưu</button>
									<button class="btn btn-primary" type="submit"><a href="{{route('admin.question.index')}}">Hủy</a></button>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection('content')