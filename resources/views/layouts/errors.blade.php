<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{Helper::basePath()}}plugins/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{Helper::basePath()}}plugins/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{Helper::basePath()}}plugins/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{Helper::basePath()}}plugins/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @yield('contents')
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

<!-- Custom Theme Scripts -->
<script src="{{Helper::basePath()}}plugins/build/js/custom.min.js"></script>
</body>
</html>