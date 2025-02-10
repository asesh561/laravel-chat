<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('assets/css/font-style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" >
<link href="{{asset('assets/css/login.css')}}" rel="stylesheet" >
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap4.bundle.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<script src="{{asset('assets/js/pusher.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</head>
<body>
@yield('chatwrapper')
</body>
</html>