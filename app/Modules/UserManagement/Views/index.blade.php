@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <h3>{{ trans('UserManagement::lang.Label.Text.Users')}}</h3>

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
                    <table class="table" name="responsibility-lookup-table" id="responsibility-lookup-table-id">
                        <thead>
                        <tr>
                            <th>{{ trans('UserManagement::lang.Label.Text.UserName') }}</th>
                            <th>{{ trans('UserManagement::lang.Label.Text.FullName') }}</th>
                            <th>{{ trans('UserManagement::lang.Label.Text.Responsibilities') }}</th>
                            <th>{{ trans('UserManagement::lang.Label.Text.Operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profiles[0]->name }} <br/></td>
                                    <td></td>
                                    <td>
                                        <button id="edit-user-btn" type="button" class="btn btn-primary"
                                                data-user-id="{{$user->id}}">
                                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                            <b>{{ trans('UserManagement::lang.Label.Text.Edit') }}</b>
                                        </button>
                                        <button id="delete-user-btn" type="button" class="btn btn-danger"
                                                data-user-id="{{$user->id}}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            <b>{{ trans('UserManagement::lang.Label.Text.Delete') }}</b>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection