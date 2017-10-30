@extends('master')

@section('title','Listing All Users =::= User Management')

@section('content')
	<div class="ui container">
		<div class="ui segment blue">
			
			<h2 class="ui header">
				<i class="users icon"></i>
			  	<div class="content">
			    	Users Database
			    	<div class="sub header">Listing All Users</div>
			  	</div>
			</h2>

			<div class="ui horizontal divider">
				<a href="{{ url('users/create') }}" class="ui circular green button">
					<i class="icon plus"></i> Create New User
				</a>
			</div>
			<table class="ui table green celled padded" id="usersDataTable"> 
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Roles</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $loop->index+1 }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@foreach($user->roles as $role)
									<div class="ui label">{{ $role->name }}</div>
								@endforeach
							</td>
							<td>
								<a href="{{ url('users/impersonate/'.$user->id) }}" class="ui button black">
									Impersonate User
								</a>
								<a href="{{ url('users/edit/'.$user->id) }}" class="ui button blue">Edit User</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>
	@push('scripts')
	<script>
		$(document).ready(function() {
			$('#usersDataTable').DataTable();
		})
	</script>
	@endpush
@stop