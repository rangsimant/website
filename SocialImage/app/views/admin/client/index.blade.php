@extends('layout.admin')

@section('content')
	<div class="container">
		<a href="{{ URL::to('admin/client/create') }}" class="btn btn-primary">New Client</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Created at</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at }}</td>
						<td>
							<a href="{{ URL::to('admin/client/'.$user->id.'/edit') }}" class="btn btn-warning">edit</a>
						</td>
					</tr>
					@endforeach()
				</tbody>
			</table>
		</div>
	</div>
@stop