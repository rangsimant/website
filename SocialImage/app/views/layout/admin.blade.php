<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>SOCIAL IMAGE Administrator</title>
	<meta name="Rangimant Hanwongsa" content="Social Image">
  <link rel="shortcut icon" type="image/png" href="{{ asset('image/socialimage_logo.ico') }}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.4/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome-4.3.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-daterangepicker/daterangepicker-bs3.css') }}" />
  
	<link rel="stylesheet" type="text/css" href="{{ asset('css/social-image.css?v=1.0') }}">
</head>

<body cz-shortcut-listen="true">


  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/') }}">
	        <span style="color:rgb(0, 156, 176); font-weight: bold;">SOCIAL</span> 
	        <span style="color:black; font-weight: bold;">IMAGE</span>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Page</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
         
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>

	@yield('content')

</body>

<script src="{{ asset('jquery/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('bootstrap-daterangepicker/moment.timezone.js') }}"></script>
<script src="{{ asset('bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('js/init.js') }}"></script>
<script src="{{ asset('js/admin/tabs.js') }}"></script>
<script src="{{ asset('js/admin/daterange.js') }}"></script>



</html>