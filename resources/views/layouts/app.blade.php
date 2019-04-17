<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/comment.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fSelect.css')}}">
    
    @yield('mycss')
  

</head>
<body>
  <!-- <div class="wrapper"> -->
    @include('parts.nav')
    
    <div>
        @yield('content')
    <!-- </div> -->
    </div>
    <br>
    @include('parts.header')
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="{{asset('js/fSelect.js')}}"></script> 

    @yield('myjs')
     <script>
    (function($) {
        $(function() {
            $('.test').fSelect();
        });
    })(jQuery);
    </script>
</body>
</html>
