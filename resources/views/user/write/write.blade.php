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
      <form action="{{route('write.post')}}" method="post">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleFormControlInput1">Tiêu đề</label>
          <input type="text" class="form-control" id="tieude" name="tieude" placeholder="Tiêu đề bài viết">
        </div>
        <div class="form-group">
          <select class="test" multiple="multiple" name="tagname[]">
            <optgroup label="Tag">
              @foreach($tag as $key)
              <option value="{{$key->nametag}}">{{$key->nametag}}</option>
              @endforeach
            </optgroup>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Nội dung</label>
          <textarea class="form-control" name="body" id="body" rows="3" style="height: 500px"></textarea>
        </div>
        <button type="submit" class="btn btn-info">Post</button>
        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden=""> 

        <input type="text" name="like" hidden="" value="0">
        <input type="text" name="kind" hidden="" value="1">
      </form>
    </div>
  </div>
</div>
@endsection('content')