@extends('master')

@section('content')

<div class="container">
    <h3 class="title">Edit User Details - User Management</h3>
    <p>You're currently editing: {{ $user->name }} ({{ $user->email }})</p>
    <hr>

    <form action="{{ route('userUpdate', ['user' => $user->id]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name"><sup class="text-red">*</sup>Full Name: </label>
            <input type="text" class="form-control" name="name" placeholder="John Doe" required value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email"><sup class="text-red">*</sup>Email Address: </label>
            <input type="email" class="form-control" name="email" placeholder="john.doe@example.com" required value={{ $user->email }} disabled>
        </div>

        <div class="form-group">
            <label for="status">User Status: </label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $user->status ? "selected" : "" }}>Active</option>
                <option value="0" {{ !$user->status ? "selected" : "" }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

@endsection

