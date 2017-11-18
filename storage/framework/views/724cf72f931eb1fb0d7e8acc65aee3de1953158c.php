<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(Helper::basePath()); ?>css/app.css" rel="stylesheet">
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
<div id="app">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- jQuery -->
<script src="<?php echo e(Helper::basePath()); ?>plugins/vendors/jquery/dist/jquery.min.js"></script>
<!-- Scripts -->
<script src="<?php echo e(Helper::basePath()); ?>js/app.js"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
