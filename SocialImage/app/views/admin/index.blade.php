@extends('layout.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>ADD NEW PAGE</h3>
				<div role="tabpanel">

					<div class="bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#facebook" aria-controls="home" role="tab" data-toggle="tab">
								<img src="{{ asset('image/facebook.png') }}" width="20">
									Facebook
								</a>
							</li>
							<li role="presentation">
								<a href="#instagram" aria-controls="profile" role="tab" data-toggle="tab">
								<img src="{{ asset('image/instagram.png') }}" width="20">
									Instagram
								</a>
							</li>
							<li role="presentation">
								<a href="#twitter" aria-controls="messages" role="tab" data-toggle="tab">
								<img src="{{ asset('image/twitter.png') }}" width="20">
									Twitter
								</a>
							</li>
						</ul>

				  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="facebook">
							<p class="example">
								Example : https://www.facebook.com/<span>samsungthailand</span>?fref=ts | <span>Name = "samsungthailand"</span>
							</p>
							<p class="example">
								Example : https://www.facebook.com/<span>118133614869896</span>?fref=ts | <span>ID = "118133614869896"</span>
							</p>
							{{ Form::open(array('id' => 'facebook_page', 'url' => 'newAccount', 'autocomplete' => 'off')) }}
							
							<div class="">
								<div class="form-group">
									<label>SUBJECT :</label>
									<div class="input-group">
										<select class="form-control input-md select-subject" id="subject" required>
											<option value="">--Please select subject--</option>
										 	@foreach($subjects as $subject)
								          		<option value="{{ $subject->subject_name }}">{{ ucfirst($subject->subject_name) }}</option>
								        	@endforeach
								        </select>
									</div>
								</div>
							</div>
							@if(Session::get('message'))
								<div class="bs-example-bg-classes">
									<p class="bg-danger">{{ Session::get('message') }}</p>
									<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
							@endif

							@if(Session::get('success'))
								<div class="bs-example-bg-classes">
									<p class="alert alert-success">{{ Session::get('success') }}</p>
								</div>
							@endif
							<input type="hidden" id="subject" name="subject" value="">
							<div class="group">
								<div class="form-inline">
									<div class="form-group">
										<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-facebook"></i></div>
											<input type="text" class="form-control account" id="account" name="account[]" placeholder="ID or Name" required>
										</div>
									</div>

									<div class="form-group">
										<label class="sr-only" for="datetime">Amount (in dollars)</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control since" id="since" name="since[]" placeholder="YYYY-MM-DD" required>
										</div>
									</div>
								</div>
							</div>
							<div style="margin-top:5px;">
								<button id="addAccount" type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
							{{ Form::close() }}
							</div>
							<div role="tabpanel" class="tab-pane" id="instagram">
								<form class="form-inline" autocomplete="off">
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-instagram"></i></div>
											<input type="text" class="form-control" id="exampleInputAmount" placeholder="Username">
										</div>
									</div>

									<div class="form-group">
										<label class="sr-only" for="datetime"></label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input type="text" class="form-control" id="ig_datetime" name="ig_datetime" placeholder="YYYY-MM-DD">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Add</button>
								</form>
							</div>
							<div role="tabpanel" class="tab-pane" id="twitter">coming soon ...</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<h3 id="page_txt">PAGE </h3>
				<p id="total_page"></p>
				<table class="table table-bordered" id="page_list">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Social ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Channel</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						{{-- get from Ajax --}}
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
@stop