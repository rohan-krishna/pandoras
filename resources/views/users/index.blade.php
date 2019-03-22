@extends('master')

@section('content')

<div class="container-fluid">
    <h2 class="title">Welcome to User Management</h2>
    <p>Showing All Users in your Org: {{ auth()->user()->organisation->name }}</p>
    <hr>
    
    <a href="{{ route('userCreate') }}" class="btn btn-success btn-waves mb-2">Create New User</a>

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
                <td>
                    @if($user->status)
                        <span class="badge badge-success text-white">Active</span>
                    @else
                        <span class="badge badge-danger text-white">Inactive</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <div class="px-3">
                            <a href="{{ route('userEdit', ['user' => $user->id]) }}" class="btn btn-sm btn-info btn-waves">Edit</a>
                        </div>
                        <div class="px-3">
                            <a href="{{ route('userDelete',['user' => $user->id]) }}" class="btn btn-sm btn-danger btn-waves">Delete</a>                            
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

