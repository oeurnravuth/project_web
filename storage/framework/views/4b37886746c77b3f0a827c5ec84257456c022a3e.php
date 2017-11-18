<?php if(count($errors->all()) > 0): ?>
    <div class="alert alert-danger fade in alert-dismissable text-center show-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"
           title="close">×</a>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <strong><?php echo e($error); ?></strong>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php if(Session::has('fail')): ?>
    <div class="alert alert-danger fade in alert-dismissable text-center show-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"
           title="close">×</a>
        <?php echo e(Session::get('fail')); ?>

    </div>
<?php endif; ?>