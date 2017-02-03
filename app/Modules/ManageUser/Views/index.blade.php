@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')
@extends('layouts.sidebar', ['sidebars' => $sidebars])

@section('content')
    <div id="ModalContainerID">

    </div>

    <div class="container-fluid">
        <div class="row">
            <h3><img style="position: relative;margin-top: -10px"
                     src="{{ URL::to('/') }}/image/user_icon.png"
                     height="60px"> {{ trans('ManageUser::lang.Label.Text.ManageUser')}}</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="bs-callout bs-callout-info" role="alert">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        {{ trans('ManageUser::lang.Info.Text.ManageUserDesc')}}
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <button class="btn btn-primary" id="create-user-btn">{{ trans('Core.Label.text.Create') }}</button>
                    <button class="btn btn-default">{{ trans('Core.Label.text.WaitingForApproval') }}</button>

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
                                       class="form-control"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" id="responsibility_lookup_table_div">
                    <table class="table" name="responsibility-lookup-table" id="responsibility-lookup-table-id">
                        <thead>
                        <tr>
                            <th>{{ trans('ManageUser::lang.Label.Text.UserName') }}</th>
                            <th>{{ trans('ManageUser::lang.Label.Text.FullName') }}</th>
                            <th>{{ trans('ManageUser::lang.Label.Text.Responsibilities') }}</th>
                            <th>{{ trans('ManageUser::lang.Label.Text.Operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection