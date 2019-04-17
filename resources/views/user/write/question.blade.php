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
      <form action="{{route('question.post')}}" method="post">
      {{ csrf_field() }}
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Chủ đề câu hỏi</div>
              <div class="col-md-10"><input type="text" class="form-control" id="tieude" name="tieude" placeholder="?????????????"></div>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Tag</div>
              <div class="col-md-10">
                 <select class="test" multiple="multiple" name="tagname[]">
                    <optgroup label="Tag">
                      @foreach($tag as $key)
                      <option value="{{$key->nametag}}">{{$key->nametag}}</option>
                      @endforeach
                    </optgroup>
                </select>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Nội dung</div>
              <div class="col-md-10"> <textarea class="form-control" name="body" id="body" rows="3" style="height: 500px"></textarea></div>
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-2"><button type="submit" class="btn btn-info">Post</button></div>
            </div>
          </div>
        </div>
      </div>

      <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden="">
      <input type="text" name="like" hidden="" value="0">
      <input type="text" name="kind" hidden="" value="2">
      </form>
    </div>
  </div>
</div>
@endsection('content')