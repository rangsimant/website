@extends('layout.layout')


@section('content')
<div class="row">
	<div class="col-lg-4">
		<div class="box" style="height:100%">
			<div class="box-header with-border">
				<h3 class="box-title">Social Page</h3>
				<div class="box-tools pull-right">

				</div>
			</div>
			<div class="box-body no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
          </div><!-- /.btn-group -->
          <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <div class="pull-right">
            <div class="btn-group">
              <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
              <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div><!-- /.btn-group -->
          </div><!-- /.pull-right -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
            	@foreach($pages as $page)
              <tr class="subject_page">
                <td><input type="checkbox" name="checked_page[]" value="{{ $page['page_id'] }}"/></td>
                <td class="mailbox-name">{{ $page['name'] }}</td>
                <td class="mailbox-subject">{{ $page['category'] }}</td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">{{ $page['likes'] }}</td>
              </tr>
            	@endforeach
            </tbody>
          </table><!-- /.table -->
        </div><!-- /.mail-box-messages -->
      </div>
		</div>
	</div>
  <div class="col-lg-8">
    @include('feed')
  </div>
</div>

@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('js/annotation.js') }}"></script>
@endsection