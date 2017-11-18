<?php $__env->startSection('title','List Contents'); ?>
<?php $__env->startSection('header', 'Header'); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(Helper::basePath()); ?>css/contents.css" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <form action="<?php echo e(route('admin.contents.list')); ?>" method="GET" id="form-submit">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contents</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." name="name"
                                       value="<?php echo e($search['name']); ?>">
                                <span class="input-group-btn">
                      <button type="submit" class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Contents</h2>
                                <?php echo e(Helper::setSettingInList([
                                        'add_new'=> 'admin.contents.get_add_new',
                                        'active'=> 'admin.contents.active_multi',
                                        'deactive'=> 'admin.contents.deactive_multi',
                                        'delete'=> 'admin.contents.delete_multi'
                                     ])); ?>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <?php echo e(Helper::setRecordPerPage($datas)); ?>

                                </div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox" id="checkbox-select-all" data-checked="false"/></th>
                                        <th>Photo</th>
                                        <th class="th-name">Name</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($data->status == '1'?'':'list-deactive'); ?>">
                                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                                            <th><input type="checkbox" class="checkbox-table-list"
                                                       data-id="<?php echo e($data->id); ?>"
                                                       value="<?php echo e($data->id); ?>"/></th>
                                            <td>
                                                <a href="<?php echo e(Helper::basePath().$data->photo_url); ?>" data-lightbox="data_<?php echo e($data->id); ?>">
                                                    <img class="table-img img-thumbnail"
                                                         src="<?php echo e(Helper::basePath().$data->photo_url); ?>"/>
                                                </a>
                                            </td>
                                            <td class="td-name"><?php echo e($data->name); ?></td>
                                            <td>
                                                <input type="checkbox" class="checkbox-change-status"
                                                       value="<?php echo e($data->status); ?>"
                                                       <?php echo e(($data->status == '1')? 'checked':''); ?>

                                                       data-url="<?php echo e(route('admin.contents.status', ['id' => $data->id])); ?>"/>
                                            </td>
                                            <td>
                                                <?php echo e(Helper::setButtonShow('admin.contents.show',['id' => $data->id])); ?>

                                                <?php echo e(Helper::setButtonEdit('admin.contents.get_edit',['id' => $data->id])); ?>

                                                <?php echo e(Helper::setButtonDelete('admin.contents.delete',['id' => $data->id])); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e(Helper::setPagination($datas)); ?>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>