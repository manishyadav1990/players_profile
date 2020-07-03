<!doctype html>
<html>
 
<head>
 
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
 
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8"> @yield('content') </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
 
</html>