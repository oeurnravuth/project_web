<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo e(Helper::basePath()); ?>plugins/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(Helper::basePath()); ?>plugins/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(Helper::basePath()); ?>plugins/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo e(Helper::basePath()); ?>plugins/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo e(Helper::basePath()); ?>plugins/build/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo e(Helper::basePath()); ?>plugins/vendors/lightbox/lightbox.min.css" rel="stylesheet">

    <link href="<?php echo e(asset('css')); ?>/default.css" type="text/css" rel="stylesheet">

    <link href="<?php echo e(asset('')); ?>css/form_element.css" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

    <?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('contents'); ?>

    <!-- footer content -->
    <?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/iCheck/icheck.min.js"></script>

<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/parsley/parsley.min.js"></script>

<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/lightbox/lightbox.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/build/js/custom.min.js"></script>

<script>
    var basePath = "<?php echo e(Helper::basePath()); ?>";
    var imagePath = basePath + 'photos/statics/upload.png';
</script>

<script src="<?php echo e(Helper::basePath()); ?>js/default.js"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>