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
      <form action="{{route('update.question')}}" method="post">
      {{ csrf_field() }}
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Chủ đề câu hỏi</div>
              <div class="col-md-10"><input type="text" class="form-control" id="tieude" name="tieude" placeholder="?????????????" value="{{$id->tieude}}"></div>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Tag</div>
              <div class="col-md-10">
                @foreach($tag as $key)
                <input type="radio" name="tag_id" value="{{$key->id}}">{{$key->nametag}}
                @endforeach
              </div>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Nội dung</div>
              <div class="col-md-10"> <textarea class="form-control" name="body" id="body" rows="3" style="height: 500px">{{$id->body}}</textarea></div>
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-2"><button type="submit" class="btn btn-info">Post</button></div>
            </div>
          </div>
        </div>
      </div>

      
      <input type="text" name="like" hidden="" value="{{$id->like}}">
      <input type="text" name="id" hidden="" value="{{$id->id}}">
      
      </form>
    </div>
  </div>
</div>
@endsection('content')