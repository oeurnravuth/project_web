@extends('admin.layouts.master')
@section('title','Contents|Add New')
@section('header', 'Header')
@section('styles')
    <link rel="stylesheet" href="{{Helper::basePath()}}css/contents.css" type="text/css">
@endsection
@section('contents')
    <form action="{{route('admin.users.post_add_new')}}" method="post" id="form-submit-add"
          enctype="multipart/form-data"
          class="form-horizontal form-label-left" data-parsley-validate="">
    {{ csrf_field() }}
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
                            <h2>Add New</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            @include('admin.messages.errors')
                            @include('admin.messages.success')

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" required {{old('name')}}
                                    name="name" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" class="form-control col-md-7 col-xs-12" required value="{{old('password')}}"
                                           name="password" placeholder="" type="password">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{route('admin.users.list')}}"><button type="button" class="btn btn-danger back-to-list">Cancel</button></a>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
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
@endsection

@section('scripts')
    <script src="{{Helper::basePath()}}js/add_new.js"></script>
@endsection
