@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
<br>
	<div class="row">
	<div class="col-md-3">
	@include('parts.left-menu')
	</div>
	<div class="col-md-9">
		@foreach($post as $key)
		<form action="{{route('delete.edit')}}" method="post">
		{{ csrf_field() }}
			<input type="hidden" name="id"   value="{{$key->id}}"> 
			<input type="hidden" name="kind_id"   value="{{$key->kind_id}}"> 
			<input type="hidden" name="user_id"   value="{{Auth::user()->id}}"> 
			<div class="panel-group">
				<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-2">Tiêu đề</div>
						<div class="col-md-10">{{$key->tieude}}</div>
					</div>

				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">Tag</div>
						<div class="col-md-10">{{$key->tagname}}</div>
					</div>
					<div class="row">
						<div class="col-md-2"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
						<div class="col-md-10">{{$key->like}}</div>
					</div>
					<div class="row">
						<div class="col-md-2">Loại đăng</div>

						<div class="col-md-10">{{$key->kind->name}}</div>
					</div>
					<div class="row">
						<div class="col-md-2"><button type="submit" class="btn btn-info" name="action" value="edit">Edit</button></div>
						<div class="col-md-10"><button type="submit" name="action" class="btn btn-info" value="delete">Delete</button></div>
					</div>
				</div>
				</div>
			</div>
		</form>

		@endforeach

		</div>
	</div>
</div>
@endsection('content')