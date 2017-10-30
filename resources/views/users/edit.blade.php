@extends('master')

@section('title','Edit User Details')

@section('content')
	
	<div class="ui container">
		<h3>Edit {{ $user->name }}'s Details</h3>
		<hr>
		<form action="{{ route('updateUser',['user' => $user->id]) }}" class="ui form" method="post">
			{{ csrf_field() }}
			<div class="field">
				<label for="name">Name:</label>
				<input type="text" name="name" placeholder="Enter Name" value="{{ $user->name }}">
			</div>
			<div class="field">
				<label for="email">Email Address:</label>
				<input type="email" name="email" placeholder="john.doe@example.com" value="{{ $user->email }}" disabled>
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
						@if($user->roles->count() > 0)
							@php
								$userRole = $user->roles()->where("name",$role->name)->first();
							@endphp

							<option value="{{ $role->name }}" {{ $userRole ? ($userRole->name === $role->name ? "selected='selected'" : '') : "" }}>
								{{ $role->name }}
							</option>
						@else
							<option value="{{ $role->name }}">
								{{ $role->name }}
							</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="field">
				<button type="submit" class="ui labeled icon blue button">
					<i class="icon upload"></i>
					Update
				</button>
			</div>
		</form>
	</div>

@stop