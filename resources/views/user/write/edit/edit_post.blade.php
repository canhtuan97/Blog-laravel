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


 <form action="{{route('update.post')}}" method="post">  
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Tiêu đề</label>
    <input type="text" class="form-control" id="tieude" name="tieude" placeholder="Tiêu đề bài viết" value="{{$id->tieude}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tag</label>
     @foreach($tag as $key)
             <input type="radio" name="tag_id" value="{{$key->id}}">{{$key->nametag}}
      @endforeach
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Nội dung</label>
    <textarea class="form-control" name="body" id="body" rows="3" style="height: 500px">{{$id->body}}</textarea>
  </div>
  <button type="submit" class="btn btn-info">Post</button>
  <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden="">

  <input type="text" name="like" hidden="" value="{{$id->like}}">
  <input type="text" name="kind_id" hidden="" value="1">
  <input type="text" name="id" hidden="" value="{{$id->id}}">
</form>
</div>
</div>
</div>
@endsection('content')