<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/argon.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('sweetalert::alert')
    <div class="" id="app">
        @include('navbar')

        {{-- sidebar --}}
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="container-fluid py-4">
                    {{-- <h3 class="title">Aside</h3> --}}
                    {{-- <p>this is a side navigation bar</p> --}}
                    {{-- <hr> --}}

                    <ul class="nav flex-column nav-fill">
                        <li class="nav-item">
                            <a href="{{ route('userIndex') }}" class="nav-link">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('oauth') }}" class="nav-link">Oauth</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-10 col-sm-9">
                {{-- .content-wrapper --}}
                <main class="py-4 content-wrapper">
                    <div class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h3>Please fix the following errors: </h3>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @yield('content')
                </main>
            </div>
            <!-- /.col -->
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/argon.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Ready")

            // Waves.attach('.btn-waves', ['waves-button']);
            Waves.attach('.btn-waves', ['waves-float']);
            // Waves.attach('.float-button-light', ['waves-button', 'waves-float', 'waves-light']);
            Waves.init();
        })
    </script>
</body>
</html>
