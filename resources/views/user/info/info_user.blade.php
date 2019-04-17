
@extends('layouts.app')

@section('title', 'User Infor')

@section('mycss')

@endsection

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
    <img src="{{asset('image/avata.jpg')}}" id="icon" alt="User Icon" />
        <hr>
         <form action="{{route('update')}}" method="POST" >
          {{ csrf_field() }}
        <div class="form-group">
          <label for="user">Tên tài khoản:</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" placeholder="{{ Auth::user()->username }}">
        </div>
        <hr>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}">
        </div>
        <hr>
       <div class="form-group">
          <label for="sdt">Số điện thoại</label>
          <input type="text" class="form-control" id="sdt" name="sdt" value="{{ Auth::user()->sdt }}" placeholder="{{ Auth::user()->sdt }}">
        </div>
        <hr>
         <button type="submit" class="btn btn-info">Update</button>
        </form>
  </div>

</div>
@endsection

@section('myjs')

@endsection