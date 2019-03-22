@extends('master')

@section('content')

<div class="container">
    <h3 class="title">Create New User - User Management</h3>
    <p>Add a new user to your organisation.</p>
    <hr>

    <form action="{{ route('userStore') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="name"><sup class="text-red">*</sup>Full Name: </label>
            <input type="text" class="form-control" name="name" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="email"><sup class="text-red">*</sup>Email Address: </label>
            <input type="email" class="form-control" name="email" placeholder="john.doe@example.com" required>
        </div>

        <div class="form-group">
            <label for="password"><sup class="text-red">*</sup>Password: </label>
            <input type="password" class="form-control" name="password" placeholder="please enter password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation"><sup class="text-red">*</sup>Password Confirmation: </label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="please confirm password" required>
        </div>

        <div class="form-group">
            <label for="status">User Status: </label>
            <select name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

@endsection

