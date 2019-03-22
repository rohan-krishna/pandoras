@extends('master')

@section('content')
    <div class="container">
        <h3>Oauth</h3>
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@endsection