<?php $__env->startSection('title','Contents|Add New'); ?>
<?php $__env->startSection('header', 'Header'); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css')); ?>/contents.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css')); ?>/show.css" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <form action="<?php echo e(route('admin.contents.post_add_new')); ?>" method="post" id="form-submit-add"
          enctype="multipart/form-data"
          class="form-horizontal form-label-left" data-parsley-validate="">
    <?php echo e(csrf_field()); ?>

    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contents</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="title-view">Photo</div>
                                    <div class="wrap-image-upload">
                                        <img src="<?php echo e(asset('').$data->photo_url); ?>" class="img-thumbnail imageUploadPreview"/>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="title-view">Name</div>
                                    <div class="content-view">
                                        <?php echo e($data->name); ?>

                                    </div>

                                </div>
                            </div>
                            <div class="form-group text-right">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo e(route('admin.contents.list')); ?>"><button type="button" class="btn btn-danger back-to-list">Back</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /page content -->
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>