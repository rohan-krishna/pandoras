<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.semanticui.min.css" integrity="sha256-cWk5utlR8e51MrmYLtovUllID87EHp5XUjEHbm8dpAk=" crossorigin="anonymous" />
</head>
<body>
    <div id="app">

        @include('navigation')
        <div style="margin-top: 75px !important;">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js" integrity="sha256-qcV1wr+bn4NoBtxYqghmy1WIBvxeoe8vQlCowLG+cng=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.semanticui.min.js" integrity="sha256-Mep6Qdh0UI/hWFGeRSDWmuAElrKNTtQBak2hIWBMrxE=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/semantic.js') }}"></script>
    @stack('scripts')
</body>
</html>
