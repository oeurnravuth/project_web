<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{Helper::basePath()}}css/app.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- jQuery -->
<script src="{{Helper::basePath()}}plugins/vendors/jquery/dist/jquery.min.js"></script>
<!-- Scripts -->
<script src="{{Helper::basePath()}}js/app.js"></script>
@yield('scripts')
</body>
</html>
