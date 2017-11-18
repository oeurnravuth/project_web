@extends('admin.layouts.master')
@section('title','List Contents')
@section('header', 'Header')
@section('styles')
    <link rel="stylesheet" href="{{Helper::basePath()}}css/contents.css" type="text/css">
@endsection
@section('contents')
    <form action="{{route('admin.contents.list')}}" method="GET" id="form-submit">
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
                                       value="{{$search['name']}}">
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
                                {{Helper::setSettingInList([
                                        'add_new'=> 'admin.contents.get_add_new',
                                        'active'=> 'admin.contents.active_multi',
                                        'deactive'=> 'admin.contents.deactive_multi',
                                        'delete'=> 'admin.contents.delete_multi'
                                     ])
                                }}
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    {{Helper::setRecordPerPage($datas)}}
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
                                    @foreach($datas as $data)
                                        <tr class="{{$data->status == '1'?'':'list-deactive'}}">
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <th><input type="checkbox" class="checkbox-table-list"
                                                       data-id="{{$data->id}}"
                                                       value="{{$data->id}}"/></th>
                                            <td>
                                                <a href="{{Helper::basePath().$data->photo_url}}" data-lightbox="data_{{$data->id}}">
                                                    <img class="table-img img-thumbnail"
                                                         src="{{Helper::basePath().$data->photo_url}}"/>
                                                </a>
                                            </td>
                                            <td class="td-name">{{$data->name}}</td>
                                            <td>
                                                <input type="checkbox" class="checkbox-change-status"
                                                       value="{{$data->status}}"
                                                       {{($data->status == '1')? 'checked':''}}
                                                       data-url="{{route('admin.contents.status', ['id' => $data->id])}}"/>
                                            </td>
                                            <td>
                                                {{Helper::setButtonShow('admin.contents.show',['id' => $data->id])}}
                                                {{Helper::setButtonEdit('admin.contents.get_edit',['id' => $data->id])}}
                                                {{Helper::setButtonDelete('admin.contents.delete',['id' => $data->id])}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ Helper::setPagination($datas) }}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </form>
@endsection

@section('scripts')
    <script>


    </script>

@endsection
