@extends('layouts.app')
@section('styles')
    <style>
        .box-login {
            margin-top: 10%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row box-login">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Passowrd</div>
                    <div class="panel-body">
                        <form id="form-submit" class="form-horizontal" method="POST" action="{{ route('auth.change_password') }}">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                @include('admin.messages.errors')
                                @include('admin.messages.success')
                            </div>
                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label for="old_password" class="col-md-12">Old Password</label>
                                <div class="col-md-12">
                                    <input id="old_password" type="password" class="form-control" name="old_password" value="{{old('old_password')}}"
                                           required>
                                    @if ($errors->has('old_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new_password" class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input id="new_password" type="password" class="form-control" name="new_password" value="{{old('new_password')}}"
                                           required>
                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
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
@endsection


