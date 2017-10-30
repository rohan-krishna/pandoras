@extends('master')

@section('title','Create New User')

@section('content')
	
	<div class="ui container">
		<div class="ui segment blue">
			<h3>Create New User</h3>
			<hr>
			<form action="{{ route('storeUser') }}" class="ui form" method="post">
				{{ csrf_field() }}
				<div class="field">
					<label for="name">Name:</label>
					<input type="text" name="name" placeholder="Enter Name">
				</div>
				<div class="field">
					<label for="email">Email Address:</label>
					<input type="email" name="email" placeholder="john.doe@example.com">
				</div>
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" name="password" placeholder="Enter Password">
				</div>
				<div class="field">
					<label for="password_confirmation">Password Confirmation:</label>
					<input type="password" name="password_confirmation" placeholder="Confirm Password">
				</div>
				<div class="field">
					<label for="roles[]">Assign Role:</label>
					<select name="roles[]" class="ui dropdown" multiple="multiple">
						@foreach($roles as $role)
							<option value="{{ $role->name }}">{{ $role->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="field">
					<button type="submit" class="ui labeled icon green button">
						<i class="icon save"></i>
						Save
					</button>
				</div>
			</form>
		</div>
	</div>

@stop