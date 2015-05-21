@extends('layout.admin')

@section('content')
	<div class="container">
		<h3>CHOOSE SUBJECT</h3>
		<div class="form-inline">
			<div class="form-group">
				<label>SUBJECT :</label>
				<div class="input-group">
					<select class="form-control input-md select-subject">
						<option value="">--Please select subject--</option>
					 	@foreach($subjects as $subject)
			          		<option value="{{ $subject->subject_name }}">{{ ucfirst($subject->subject_name) }}</option>
			        	@endforeach
			        </select>
				</div>
		        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>
			</div>
		</div>

		<br>
		<h3>ADD NEW PAGE</h3>
		<div role="tabpanel">

			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
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
						<form class="form-inline">
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-facebook"></i></div>
									<input type="text" class="form-control" id="exampleInputAmount" placeholder="ID or Name">
								</div>
							</div>

							<div class="form-group">
								<label class="sr-only" for="datetime">Amount (in dollars)</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									<input type="text" class="form-control" id="datetime" placeholder="YYYY-MM-DD">
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Add</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane" id="instagram">instagram</div>
					<div role="tabpanel" class="tab-pane" id="twitter">coming soon ...</div>
				</div>
			</div>
		</div>

		<h3>PAGE </h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Channel</td>
					<td>Status</td>
				</tr>
			</thead>
		</table>
	</div>
@stop