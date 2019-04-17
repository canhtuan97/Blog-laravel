<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
   	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('image/avata.jpg') }}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="{{route('register')}}" method="post">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email">
      <input type="text" id="sdt" class="fadeIn third" name="sdt" placeholder="SĐT">
      <input type="hid" id="sdt" class="fadeIn third" name="sdt" placeholder="SĐT">
      <input type="submit" class="fadeIn fourth" value="Đăng kí">
    </form>

   

  </div>
</div>
</body>
</html>