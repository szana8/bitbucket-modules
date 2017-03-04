@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <h1 class="page-header">{{ trans('UserManagement::lang.Label.Text.UserManagement') }} <small>{{ trans('UserManagement::lang.Label.Text.Dashboard') }}</small></h1>

            <div class="row">
                <div class="col-lg-3 col-md-6" title="{{ trans('UserManagement::lang.Label.Text.UserManagement') }}">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('UserManagement::lang.Label.Text.UserManagement') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" title="{{ trans('UserManagement::lang.Label.Text.GroupManagement') }}">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <i class="fa fa-5x fa-group"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('UserManagement::lang.Label.Text.GroupManagement') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" title="{{ trans('UserManagement::lang.Label.Text.RoleManagement') }}">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <i class="fa fa-5x fa-user-secret"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('UserManagement::lang.Label.Text.RoleManagement') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" title="{{ trans('UserManagement::lang.Label.Text.PermissionManagement') }}">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <i class="fa fa-5x fa-key"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('UserManagement::lang.Label.Text.PermissionManagement') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bs-callout bs-callout-info" role="alert">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        {{ trans('UserManagement::lang.Info.Text.UserManagementDesc')}}
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <button class="btn btn-primary" id="create-user-btn">{{ trans('Core.Label.text.Create') }}</button>

                    <div class="btn-group pull-right" role="group" aria-label="group1">
                        <button class="btn btn-default"><i
                                    class="glyphicon glyphicon-import"></i> {{ trans('Core.Label.text.Import') }}
                        </button>
                        <button class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-share"></i>&nbsp;</button>
                        <button class="btn btn-default"><i
                                    class="glyphicon glyphicon-export"></i> {{ trans('Core.Label.text.Export') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-8 col-md-4">
                    <form class="form-horizontal" name="search-form" id="search-form-id">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ trans('Core.Label.Text.Search')}}</label>
                            <div class="col-sm-9">
                                <input type="text" name="search" id="search-id" value="{!! Request::get('search') !!}"
                                       class="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" id="responsibility_lookup_table_div">
                    @include('usermanagement.views.lists.userlist')
                </div>
            </div>
        </div>
    </div>


@endsection