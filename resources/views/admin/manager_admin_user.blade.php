@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container" style="height: 450px">
  <br>
  <div class="row">
    <div class="col-md-3">
      @include('parts.left-admin')
    </div>
    <div class="col-md-9">
    <table class="table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>SĐT</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $key)
      <form action="{{route('admin.user.delete')}}" method="post">
        {{ csrf_field() }}
      <tr>
        <input type="text" name="id" value="{{$key->id}}" hidden="">
        <td>{{$key->username}}</td>
        
        <td>{{$key->email}}</td>
        <td>{{$key->sdt}}</td>
        <td><button type="submit" name="action" class="btn btn-info" value="delete">Delete</button></td>
        
      </tr>
      </form>
      @endforeach
     
    </tbody>
  </table>
    </div>
</div>
</div>
@endsection('content')