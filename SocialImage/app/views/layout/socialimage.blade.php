<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>SOCIAL IMAGE</title>
	<meta name="Rangimant Hanwongsa" content="Social Image">
  <link rel="shortcut icon" type="image/png" href="{{ asset('image/socialimage_logo.ico') }}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.4/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome-4.3.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-daterangepicker/daterangepicker-bs3.css') }}" />
  
	<link rel="stylesheet" type="text/css" href="{{ asset('css/social-image.css?v=1.0') }}">
</head>

<body cz-shortcut-listen="true">
<div class="loading"></div>
<div class="loading-bg"></div>
<div class="nodata"><span>NO DATA !</span></div>
<input type="hidden" value="{{ URL::to('/') }}" id="baseURL">

@if(Request::is('facebook'))
  <input type="hidden" value="facebook" id="channel">
@elseif(Request::is('instagram'))
  <input type="hidden" value="instagram" id="channel">
@else
  <input type="hidden" value="" id="channel">
@endif

<div class="container">
  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
	        <span style="color:rgb(0, 156, 176); font-weight: bold;">SOCIAL</span> 
	        <span style="color:black; font-weight: bold;">IMAGE</span>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="{{ (Request::is('/'))?'active':''; }}">
            <a href="{{ URL::to('/') }}">
              <img src="{{ asset('image/socialimage_logo.ico') }}" width="20px">
              <span>All Social</span>
            </a>
          </li>
          <li class="{{ (Request::is('facebook'))?'active':''; }}">
            <a href="{{ URL::to('facebook') }}">
              <img src="{{ asset('image/facebook.png') }}" width="20px">
              <span>Facebook</span>
            </a>
          </li>
          <li class="{{ (Request::is('instagram'))?'active':''; }}">
            <a href="{{ URL::to('instagram') }}">
              <img src="{{ asset('image/instagram.png') }}" width="20px">
              <span>Instagram</span>
            </a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Acer <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            @foreach($subjects as $subject)
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ ucfirst($subject->subject_name) }}</a></li>
             @endforeach
            </ul>
          </li>
          <li>
          	<div id="reportrange" class="pull-right daterange">
		    	<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
		    	<span></span> <b class="caret"></b>
			</div>
		  </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
</div>

	@yield('content')

</body>

<script src="{{ asset('jquery/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('bootstrap-daterangepicker/moment.timezone.js') }}"></script>
<script src="{{ asset('bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('jscroll/jquery-ias.min.js') }}"></script>


<script src="{{ asset('js/init.js') }}"></script>
<script src="{{ asset('js/daterange.js') }}"></script>
<script src="{{ asset('js/onload.js') }}"></script>
<script src="{{ asset('js/subject.js') }}"></script>
<script src="{{ asset('js/scroll.js') }}"></script>

</html>