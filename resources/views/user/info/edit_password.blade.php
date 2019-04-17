
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
      @include('parts.left-menu')
    </div>
    <div class="col-md-9">
    @if(isset($status))
    {{$status}}
    @endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('user.edit-password')}}" method="post">
  {{ csrf_field() }}
   <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2">PassWord Old</div>
            <div class="col-md-10"><input type="text" class="form-control" id="passwordold" name="passwordold" placeholder="Nhập password cũ của bạn"></div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2">PassWord New</div>
            <div class="col-md-10"><input type="text" class="form-control" id="passwordnew" name="passwordnew" placeholder="Nhập password mới của bạn"></div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2">Repeat Password</div>
            <div class="col-md-10"><input type="text" class="form-control" id="passwordnew_confirmation" name="passwordnew_confirmation" placeholder="Nhập lại password mới của bạn"></div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2"><button type="submit" class="btn btn-info">Update</button></div>
            
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>

</div>


@endsection('content')