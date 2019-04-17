@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
         <h3>Bài viết </h3>
        <br>

      @foreach($posts as $key)
       
      
      <div class="panel-group">
      <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-2"><img src="{{ asset('image/avata.jpg') }}" alt="User Icon" style="width: 50px ;border-radius: 50%" /></div>
              <a href="{{route('show.details.post',['key'=>$key['id']])}}">
              <div class="col-md-10"><?php echo "<h3>".$key['tieude']."</h3>"; ?></div>
            </a>
            </div>
          </div>
          
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Tác giả</div>
              <div class="col-md-10">{{$key->user->username}}</div>
            </div>
          
         
            <div class="row">
              <div class="col-md-2">Tag</div>
              <div class="col-md-10"><a href="#" onclick="event.preventDefault();
                                    document.getElementById('tagname').submit();"><strong style="color: black">{{$key->tagname}}</strong></a></li>
                                    <form id="tagname" action="{{ route('timkiem') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden"  name="tagname" value="{{$key->tagname}}">
                                    </form>
                                    </a></div>
            </div>
          
       
          <div class="row">
            <div class="col-md-2"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
            <div class="col-md-10">{{$key->like}}</div>
          </div>
        </div>
         
      </div>
    </div>
    

        @endforeach
         
</div>
@endsection('content')