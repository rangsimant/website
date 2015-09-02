<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>SOCIAL IMAGE</title>
	<meta name="Rangimant Hanwongsa" content="Social Image">
  	<link rel="shortcut icon" type="image/png" href="{{ asset('image/socialimage_logo.ico') }}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.4/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome-4.3.0/css/font-awesome.min.css') }}">
  
	<link rel="stylesheet" type="text/css" href="{{ asset('css/social-image.css?v=1.0') }}">

  	<link rel="stylesheet" type="text/css" href="{{ asset('css/users.css?v=1.0') }}">
</head>

<body cz-shortcut-listen="true">
<div class="container">
  <!-- Static navbar -->
    @yield('content')
</div>

</body>

<script src="{{ asset('jquery/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('jscroll/jquery-ias.min.js') }}"></script>


<script src="{{ asset('js/init.js') }}"></script>

</html>