<?php $__env->startSection('title','List Contents'); ?>
<?php $__env->startSection('header', 'Header'); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css')); ?>/default.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css')); ?>/contents.css" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
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
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
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
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="http://127.0.0.1:8181/admin/users/add">
                                                <i class="fa fa-plus"></i>Add New
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-activate-all"
                                               data-url="http://127.0.0.1:8181/admin/users/activeList/1">
                                                <i class="fa fa-check"></i>Activate Selected Record
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-activate-all"
                                               data-url="http://127.0.0.1:8181/admin/users/activeList/0">
                                                <i class="fa fa-times"></i>Deactivate Selected Record
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="btn-delete-list-menu"
                                               data-url="http://127.0.0.1:8181/admin/users/deleteList">
                                                <i class="fa fa-trash-o"></i>Delete Selected Record
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class=""><i class="fa fa-question"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select class="myselect-dropdown">
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select> Record Per Page
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox"/></th>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th><input type="checkbox"/></th>
                                    <th scope="row">1</th>
                                    <td><img class="table-img"
                                             src="http://geeksnation.org/wp-content/uploads/2016/10/Beautiful-Girl.jpg"/>
                                    </td>
                                    <td>Otto</td>
                                    <td>
                                        <input type="checkbox" class="checkbox"/>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> </a>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th><input type="checkbox"/></th>
                                    <th scope="row">1</th>
                                    <td><img class="table-img"
                                             src="http://geeksnation.org/wp-content/uploads/2016/10/Beautiful-Girl.jpg"/>
                                    </td>
                                    <td>Otto</td>
                                    <td>
                                        <input type="checkbox" class="checkbox"/>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> </a>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>