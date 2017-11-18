@extends('admin.layouts.master')
@section('title','Contents|Add New')
@section('header', 'Header')
@section('styles')
    <link rel="stylesheet" href="{{Helper::basePath()}}css/contents.css" type="text/css">
@endsection
@section('contents')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                <div class="count">{{$datas['content']}}</div>
                                <h3>Content</h3>
                                <p>In this month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('scripts')
    <script src="{{Helper::basePath()}}js/add_new.js"></script>
@endsection
