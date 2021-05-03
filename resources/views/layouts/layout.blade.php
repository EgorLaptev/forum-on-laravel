<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/png" sizes="60x60" rel="icon" href="{{ url('public/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('public/css/fontawesome/all.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/basic.css') }}">
    @yield('links')
    <title>@yield('title')</title>
</head>
<body>

@include('includes.header')

<main class="content">
    @yield('content')
</main>

@include('includes.footer')

<script src='{{ url('public/js/bootstrap/bootstrap.min.js') }}'></script>
@yield('scripts')

</body>
</html>
