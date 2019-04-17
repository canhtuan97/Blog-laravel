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
      @include('parts.left-admin')
    </div>
    <div class="col-md-9">
      @foreach($posts as $tt)
      <form action="{{route('admin.post.delete')}}" method="post">
        {{ csrf_field() }}
      <div class="panel-group">
      <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-2"><img src="{{ asset('image/avata.jpg') }}" alt="User Icon" style="width: 50px" /></div>
              <a href="{{route('admin.details.post',['id'=>$tt->id])}}">
              <div class="col-md-10"><?php echo "<h3>".$tt->tieude."</h3>"; ?></div>
              </a>
            </div>
          </div>
          
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">Tác giả</div>
              <div class="col-md-10">{{$tt->user->username}}</div>
            </div>
          
          
            <div class="row">
              <div class="col-md-2">Ngày đăng</div>
              <div class="col-md-10">{{$tt->created_at}}</div>
            </div>
          
          
            <div class="row">
              <div class="col-md-2">Tag</div>
              <div class="col-md-10">{{$tt->nametag}}</div>
            </div>
          
         
          <div class="row">
            <div class="col-md-2"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
            <div class="col-md-10">{{$tt->like}}</div>
          </div>
        
        
          <div class="row">
            <div class="col-md-2">Thể loại</div>
            <div class="col-md-10">{{$tt->kind->name}}</div>
          </div>
       
         
          
          <div class="row">
            <input type="text" name="id" value="{{$tt->id}}" hidden="">
            <div class="col-md-10"><button type="submit" name="action" class="btn btn-info">Delete</button></div>
          </div>
        </div>
         
      </div>
    </div>
   </form>
@endforeach
  {!! $posts ->links()!!}
    </div>
</div>
</div>
@endsection('content')