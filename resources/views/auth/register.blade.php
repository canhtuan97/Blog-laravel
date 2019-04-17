@extends('layouts.before-login')

@section('title')
Register
@endsection

@section('mycss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
@endsection

@section('content')
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('image/avata.jpg') }}" id="icon" alt="User Icon" />
    </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Login Form -->
    <form action="{{route('register')}}" method="post">
     {{ csrf_field() }}
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
     <input id="password-confirm" type="password" class="fadeIn second" name="password_confirmation" placeholder="password-confirm" required>

      <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email">
      <input type="text" id="sdt" class="fadeIn third" name="sdt" placeholder="SĐT">
      
      <input type="hidden" name="access" value="2" >
      <input type="submit" class="fadeIn fourth" value="Đăng kí">
    </form>

   

  </div>
@endsection

@section('myjs')

@endsection