@extends('admin.layouts.master')
@section('title','Contents|Edit')
@section('header', 'Header')
@section('styles')
    <link rel="stylesheet" href="{{asset('css')}}/contents.css" type="text/css">
@endsection
@section('contents')
    <form action="{{route('admin.contents.post_edit',['id'=>$data->id])}}" method="post" id="form-submit-edit"
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
                            <h2>Edit</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @include('admin.messages.errors')
                            @include('admin.messages.success')
                            <input type="hidden" name="id"/>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Photo
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="wrap-image-upload">
                                        <input type="file" id="" accept="image/*"
                                               name="photo_url"
                                               onchange="loadImagePath(event,this)"
                                               class="input-file-upload"/>
                                        <div class="clearfix"></div>
                                        <img src="{{Helper::basePath().$data->photo_url}}" class="img-thumbnail imageUploadPreview"/>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="textarea" required
                                                  rows="6" name="name"
                                                  class="form-control col-md-7 col-xs-12">{{empty(old('name'))?$data->name:old('name')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{route('admin.contents.list')}}"><button type="button" class="btn btn-danger back-to-list">Cancel</button></a>
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
    <script>

    </script>
@endsection
