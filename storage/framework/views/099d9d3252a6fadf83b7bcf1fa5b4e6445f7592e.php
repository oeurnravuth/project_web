<?php $__env->startSection('styles'); ?>
    <style>
        .box-login {
            margin-top: 10%;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row box-login">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Passowrd</div>
                    <div class="panel-body">
                        <form id="form-submit" class="form-horizontal" method="POST" action="<?php echo e(route('auth.change_password')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-md-12">
                                <?php echo $__env->make('admin.messages.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('admin.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('old_password') ? ' has-error' : ''); ?>">
                                <label for="old_password" class="col-md-12">Old Password</label>
                                <div class="col-md-12">
                                    <input id="old_password" type="password" class="form-control" name="old_password" value="<?php echo e(old('old_password')); ?>"
                                           required>
                                    <?php if($errors->has('old_password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('old_password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">
                                <label for="new_password" class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input id="new_password" type="password" class="form-control" name="new_password" value="<?php echo e(old('new_password')); ?>"
                                           required>
                                    <?php if($errors->has('new_password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('new_password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>