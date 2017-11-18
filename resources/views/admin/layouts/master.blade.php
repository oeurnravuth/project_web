<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{Helper::basePath()}}plugins/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{Helper::basePath()}}plugins/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{Helper::basePath()}}plugins/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{Helper::basePath()}}plugins/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{Helper::basePath()}}plugins/build/css/custom.min.css" rel="stylesheet">

    <link href="{{Helper::basePath()}}plugins/vendors/lightbox/lightbox.min.css" rel="stylesheet">

    <link href="{{asset('css')}}/default.css" type="text/css" rel="stylesheet">

    <link href="{{asset('')}}css/form_element.css" rel="stylesheet">

    @yield('styles')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

    @include('admin.includes.navigation')

    @include('admin.includes.header')

    @yield('contents')

    <!-- footer content -->
    @include('admin.includes.footer')
    <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{Helper::basePath()}}plugins/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{Helper::basePath()}}plugins/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{Helper::basePath()}}plugins/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{Helper::basePath()}}plugins/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="{{Helper::basePath()}}plugins/vendors/iCheck/icheck.min.js"></script>

<script src="{{Helper::basePath()}}plugins/vendors/parsley/parsley.min.js"></script>

<script src="{{Helper::basePath()}}plugins/vendors/lightbox/lightbox.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{Helper::basePath()}}plugins/build/js/custom.min.js"></script>

<script>
    var basePath = "{{Helper::basePath()}}";
    var imagePath = basePath + 'photos/statics/upload.png';
</script>

<script src="{{Helper::basePath()}}js/default.js"></script>
@yield('scripts')
</body>
</html>