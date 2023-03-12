<aside class="side-nav">
	<div class="side-notification">
		<div class="notification-icon">
			<i class="fa fa-envelope-open"></i>
		</div>
		<div class="notification-icon">
			<i class="fa fa-bell"></i>
			<div class="notification-wrapper animated bounceInUp">
				<div class="notification-header">Thông báo</div>
				<div class="notification-body">
					<a class="notification-list" href="#">
						<div class="notification-image">
							<img alt="pongo" src="{{asset('assets/images/asparagus.jpg')}}">
						</div>
						<div class="notification-content">
							<div class="notification-text"><strong>Lương</strong> gửi một email</div>
							<div class="notification-time">1 phút trước</div>
						</div>
					</a>
				</div>
				<div class="notification-footer">
					<a href="#">Xem tất cả thông báo</a>
				</div>
			</div>
		</div>
	</div>
	<div class="user-side-profile">
		<div class="user-image">
			<div class="user-on"></div>
			<img alt="pongo" src="{{asset('assets/images/profile.png')}}">
		</div>
		<div class="clear">
			<div class="user-name">Trần Lương</div>
			<div class="user-group">Quản trị viên</div>
			<ul class="user-side-menu animated bounceInUp">
				<li><a href="#">Thông tin</a></li>
				<li><a href="#">Chỉnh sửa trang cá nhân</a></li>
				<li><a href="#">Thay đổi mật khẩu</a></li>
				<li><a href="{{route('admin.get.logout')}}">Đăng xuất</a></li>
			</ul>
		</div>
	</div>
	<div class="main-menu-title">Danh mục</div>
	<div class="main-menu">
		<ul>
			<li class="{{Route::current()->named('*.user.*')?"active":"" }}">
				<a href="#">
					<i class="fa fa-user"></i> 
					<span>Quản lí người dùng</span>
				</a>
				<ul>
					<li><a href="{{route('admin.user.index')}}">Danh sách người dùng</a></li>
					<li><a href="{{route('admin.user.create')}}">Thêm người dùng</a></li>
				</ul>
			</li>
			<li class="{{Route::current()->named('*.food.*')?"active":"" }}">
				<a href="#">
					<i class="fa fa-cutlery"></i> 
					<span>Quản lí thực phẩm</span>
				</a>
				<ul>
					<li><a href="{{route('admin.food.index')}}">Danh sách thực phẩm</a></li>
					<li><a href="{{route('admin.food.create')}}">Thêm thực phẩm</a></li>
				</ul>
			</li>
			<li class="{{Route::current()->named('*.recipe.*')?"active":"" }}">
				<a href="#">
					<i class="fa fa-book"></i> 
					<span>Quản lí công thức</span>
				</a>
				<ul>
					<li><a href="{{route('admin.recipe.index')}}">Danh sách công thức</a></li>
					<li><a href="{{route('admin.recipe.create')}}">Thêm công thức</a></li>
				</ul>
			</li>
			<li class="{{Route::current()->named('*.question.*')?"active":"" }}">
				<a href="#">
					<i class="fa fa-question"></i> 
					<span>Quản lí câu hỏi</span>
				</a>
				<ul>
					<li><a href="{{route('admin.question.index')}}">Danh sách câu hỏi</a></li>
					<li><a href="{{route('admin.question.create')}}">Thêm câu hỏi</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-area-chart"></i> 
					<span>Thống kê</span>
				</a>
				<ul>
					<li><a href="#">Thống kê câu hỏi</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="main-menu-title">Customs &copy; Nhóm 12</div>
</aside>