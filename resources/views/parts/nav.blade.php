<nav class="navbar navbar-default navbar-fixed-top" style="background: #b8c2cc">
	<div class="row">
	<div class="navbar-header col-md-1" >
	    <a class="navbar-brand" href="{{route('/')}}" id="t"><h3 style="margin-top: 0px"><strong style="color: black">Blog	</strong> </h3></a>
	</div>

	<div id="navbar" class="navbar-collapse collapse col-md-12">
		<ul class="nav navbar-nav" style="width: 1100px">
			<li><a href="" style="width: 10px"></a></li>
			<li><a href="{{route('/')}}" style="width: 150px ;color: black"><strong>Home</strong>  </a></li>
			<li><a href="{{route('list.post')}}" style="width: 150px ;color: black"><strong> Bài viết</strong></a></li>
			<li><a href="{{route('list.question')}}" style="width: 150px ;color: black"><strong> Câu hỏi</strong></a></li>

			<li><a href="#" style="width: 100px"></a></li>
			<div style="padding-top: 6px ;border-radius: 3px">
				<form  action="{{route('find')}}" method="post" class="form-inline my-2 my-lg-0" >
				{{ csrf_field() }}
					<input class="form-control mr-sm-2" type="search" name="key" placeholder="Search" aria-label="Search" style="width: 300px">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</ul>
		<ul class="nav navbar-nav ">
			@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}"><strong style="color: black">{{ __('Login') }}</strong></a>
			</li>
			<li class="nav-item">
			@if (Route::has('register'))
			<a class="nav-link" href="{{ route('register') }}"><strong style="color: black">{{ __('Register') }}</strong></a>
			@endif
			</li>
			@else
			<li class="dropdown" style="width: 160px"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<img src="{{asset('image/avata.jpg')}}" id="icon" alt="User Icon" style="width: 20px ;border-radius: 50%">
			<strong style="color: black">{{ Auth::user()->username }}</strong> <span class="caret"></span> </a>
			<ul class="dropdown-menu">
			<li><a href="{{route('getUser')}}" onclick="event.preventDefault();
			document.getElementById('info-User').submit();"> <strong style="color: black"> Thông tin</strong></a></li>
			<hr>
			<li><a href="#" onclick="event.preventDefault();
			document.getElementById('logout-form').submit();"><strong style="color: black">Logout</strong></a></li>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
			</form>
			<form id="info-User" action="{{route('getUser')}}" method="POST" style="display: none;">
			{{ csrf_field() }}
			</form>

			</ul>
			</li>


			@endguest
		</ul>
	</div>
	</div>
</nav>