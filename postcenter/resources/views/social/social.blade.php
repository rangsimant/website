@extends('layout.layout')

@section('content')
<input type="hidden" value="{{ url('/') }}" id="baseURL">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-facebook-official"></i> 
		facebook
			<span class="" data-toggle="tooltip" data-placement="bottom" title="On/Off All page.">
	        	<input {{ $status_check_all }} name="fb_status_check_all" id="fb_status_check_all" type="checkbox" data-toggle="toggle" data-size="mini" value="">
	        </span>
		</h3>
        </span>
		<div class="box-tools pull-right">
	        <a href="{{ $url_facebook_login }}" class="btn btn-box-tool" title="Reload"><i class="fa fa-refresh"></i></a>
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	      </div>
	</div>
	<div class="box-body">
		@if(isset($pages) && $pages)
		<div class="row">	
			@foreach($pages as $page)
			<div class="col-md-3 col-sm-6 col-xs-12">
			  <div class="info-box bg-facebook">
			    <span class="info-box-icon"><img src="{{ $page['url_image'] }}" width="90" height="90"></span>
			    <div class="info-box-content">
			      <span class="info-box-text">{{ $page['name'] }}</span>
			      	<span class="pull-right ">
				         	<a href="http://facebook.com/{{ $page['page_id'] }}" target="_blank" data-toggle="tooltip" data-placement="left" title="Link to {{ $page['name'] }}"><i class="fa fa-external-link"></i></a></span>
			      <span class="info-box-number">{{ $page['likes'] }}</span>
			      <div class="progress" data-toggle="tooltip" data-placement="bottom" title="{{ number_format(($page['likes']*100)/$page['total_likes'], 2) }}%">
			        <div class="progress-bar" style="width: {{ ($page['likes']*100)/$page['total_likes'] }}%"></div>
			      </div>
			      <span class="progress-description ">
			        {{ $page['category'] }}
			        <span class="pull-right" data-toggle="tooltip" data-placement="bottom" title="On/Off to use post to page.">
			        	<input name="fb_status" type="checkbox" {{ ($page['status'] == 'on')?'checked':'' }} data-toggle="toggle" data-size="mini" value="{{ $page['id'] }}">
			        </span>
			      </span>
			    </div><!-- /.info-box-content -->
			  </div><!-- /.info-box -->
			</div>
			@endforeach
		</div>
		@else
		<div class="col-lg-3 col-md-5 col-sm-12">
			<a href="{{ $url_facebook_login }}" class="btn btn-block btn-social btn-facebook">
	            <i class="fa fa-facebook"></i> Sign in with Facebook
	        </a>
		</div>
		@endif
	</div><!-- /.box-body -->
</div>

@endsection