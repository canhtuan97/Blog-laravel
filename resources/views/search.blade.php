@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
  <br>
  <div class="row">
@if(isset($post))
@foreach($post as $tt)

      <div class="panel-group">
      <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-2"><img src="{{ asset('image/avata.jpg') }}" alt="User Icon" style="width: 50px" /></div>
              <a href="{{route('show.details.post',['id'=>$tt->id])}}">
              <div class="col-md-10"><?php echo "<h3>".$tt['tieude']."</h3>"; ?></div>
              
              </a>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Tác giả</div>
              <div class="col-md-10">{{$tt->user->username}}</div>
            </div>
            <div class="row">
              <div class="col-md-2">Tag</div>
              <div class="col-md-10">{{$tt->tagname}}</div>
            </div>
      
       
          <div class="row">
            <div class="col-md-2"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
            <div class="col-md-10">{{$tt->like}}</div>
          </div>
        </div>
         
      </div>
    </div>
    
@endforeach
{!! $post -> links() !!}
@endif

</div>
@endsection('content')