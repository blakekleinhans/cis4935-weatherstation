<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CIS4935: The Weatherman - @yield('title')</title>

    <link href = {{ asset("css/bootstrap.min.css") }} rel="stylesheet" />
    <link href = {{ asset("css/dashboard.css") }} rel="stylesheet" />
</head>
<body>
@include('layouts.navbar')

<div id="container-fluid">
    <div class="row">
        @include('layouts.sidebar', ['sidebarOptionsMain' => $sidebarOptionsMain, 'sidebarOptionsSensors' => $sidebarOptionsSensors])
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
