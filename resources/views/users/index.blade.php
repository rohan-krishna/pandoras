@extends('master')

@section('content')

<div class="container">
    <h2 class="title">Welcome to User Management</h2>
    <p>Showing All Users in your Org: {{ auth()->user()->organisation->name }}</p>
    <a href="#" class="btn btn-success btn-waves">Create New User</a>
    <hr>

    <table class="table table-dark table-bordered table-hover text-center">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td></td>
                <td>
                    <div class="d-flex justify-content-center">
                        <div class="px-3">
                            <a href="#" class="btn btn-sm btn-info btn-waves">Edit</a>
                        </div>
                        <div class="px-3">
                            <a href="#" class="btn btn-sm btn-danger btn-waves">Delete</a>                            
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

