  @extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
 
  	<!--  -->
  	@if (isset($id)) 
  		<div class="row">
  			<div class="col-md-2"></div>
  			
  			<div class="col-md-8">
  				
  				<h1>{{$id->tieude}}</h1>
  			</div>
  			<div class="col-md-2"></div>
  			
  		</div>
  		<br>
  		<hr>
  		<div class="row">
  			{{$id->body}}
  		</div>
  		<br>
  		<hr>
  		<div class="row">
  			<div class="col-md-8">
  				
  			</div>
        <div class="col-md-2">Tác giả:{{$id->user->username}}</div>
  			<div class="col-md-2">
          <form action="{{route('like')}}" method="post">
             {{ csrf_field() }}
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> {{$id->like}}</span></button>
            <input type="text" name="id" value="{{$id->id}}" hidden="" >
            <input type="text" name="like" value="{{$id->like}}" hidden=""  >
          </form>
        </div>
  		</div>
      <div class="row">
       Liên quan: {{$id->tagname}}
      </div>
  		<br>

  		<div>

  			@if(Auth::guest())
  			<a href="{{route('login')}}">
				    <div class="form-group">
				      <label for="comment">Comment:</label>
				      <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
				    </div>
				    <button type="submit" class="btn btn-primary">Submit</button>
			 </a>
  			@else
 			<div class="row">
  				<form action="{{route('add.comment',['id'=>$id->id])}}" method="post">
  					{{ csrf_field() }}
				    <div class="form-group">
				      <label for="body">Comment:</label>
				      <textarea class="form-control" rows="5" id="body" name="body"></textarea>
				    </div>
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden="" >
				    <input type="text" name="post_id" value="{{ $id->id }}" hidden="" >
				    
				    <button type="submit" class="btn btn-primary">Submit</button>
			  	</form>
  			</div>
  			@endif
  		</div>

  		<br>
  		<hr>
  		<div class="row">
  			<h3>Các bình luận liên quan</h3>
  			<br>
  			@foreach($comments as $cm)
  			<div class="row">
        <div class="col-sm-12">
        </div>
        </div>  
        <div class="row">
        <div class="col-sm-1">
            <div class="thumbnail">
                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </div><!-- /thumbnail -->
        </div><!-- /col-sm-1 -->
        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>{{$cm->user->username}}</strong> <span class="text-muted">{{$cm->created_at}}</span>
                </div>
                <div class="panel-body">
                      {{$cm->body}}
                </div>
            </div>
        </div>


        </div>
        <br>  

  			@endforeach
  			
  		</div>
  	@endif
  	
   
  
</div>

@endsection('content')