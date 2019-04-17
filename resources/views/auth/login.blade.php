@extends('layouts.before-login')

@section('title', 'Login')

@section('mycss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
@endsection

@section('content')
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('image/avata.jpg') }}" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <div>
    <form action="{{route('login')}}" method="post">
        {{ csrf_field() }}
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
      <input type="password" id="password" class="fadeIn second" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    </div>

    <!-- Remind Passowrd -->
    
    <div id="formFooter">
      <a class="underlineHover" href="{{route('register')}}">Đăng kí?</a>
    </div>

  </div>
</div>
@endsection

@section('myjs')
    
@endsection
