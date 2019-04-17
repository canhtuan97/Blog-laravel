<div class="row" style="background-color: #ffffff">
	<div id="MainMenu">
		<div class="list-group panel">
			<a href="#demo1" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Thông tin tài khoản</a>
			<div class="collapse" id="demo1">
				<a href="{{route('getUser')}}" class="list-group-item">Thông tin cá nhân</a>
				
				<a href="{{route('edit.password')}}" class="list-group-item">Thay đổi mật khẩu</a>
			</div>
		</div>
	</div>

	<hr>
	<div id="MainMenu">
		<div class="list-group panel">
			<a href="#demo2" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Bài viết</a>
				<div class="collapse" id="demo2">
				<a href="{{route('write')}}" class="list-group-item">Viết bài</a>
				<a href="{{route('write.question')}}" class="list-group-item">Đặt câu hỏi</a>
				<a href="{{route('managerpost')}}" class="list-group-item">Quản lí đăng</a>
				
			</div>
		</div>
	</div>
</div>