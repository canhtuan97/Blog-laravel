<div class="row" style="background-color: #ffffff">
	<div id="MainMenu">
		<div class="list-group panel">
			<a href="#demo1" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Admin</a>
			<div class="collapse" id="demo1">
				<a href="{{route('admin.post.get')}}" class="list-group-item">Tất cả bài viết</a>
				
				<a href="{{route('admin.user.get')}}" class="list-group-item">Tất Cả User</a>
				<a href="{{route('mail')}}" class="list-group-item">Mail</a>
			</div>
		</div>
	</div>

	
	
</div>	