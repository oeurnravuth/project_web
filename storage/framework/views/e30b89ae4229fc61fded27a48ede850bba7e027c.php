<?php if(Session::has('success')): ?>
    <div class="alert alert-success fade in alert-dismissable text-center show-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"
           title="close">×</a>
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>