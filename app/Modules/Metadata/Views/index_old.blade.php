@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')
@extends('layouts.sidebar', ['sidebars' => []])

@section('content')

    <div class="col-md-12" id="metadata-main">
        <!-- Metadata form -->
        @include('metadata.views.modal')

        <div class="row">
            <h3><img style="position: relative;margin-top: -10px" src="{{ URL::to('/') }}/img/metadata.png" height="60px"> {{ trans('Metadata::lang.Label.Text.Metadata')}}</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="bs-callout bs-callout-info" role="alert">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        {!! trans('Metadata::lang.Info.Text.MetadataDesc') !!}
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <button class="btn btn-primary" id="create-metadata-btn" data-toggle="modal" data-target="#new-metadata-modal">{{ trans('Core.Label.text.Create') }}</button>

                    <div class="btn-group pull-right" role="group" aria-label="group1">
                        <button class="btn btn-default"><i class="glyphicon glyphicon-import"></i> {{ trans('Core.Label.text.Import') }}</button>
                        <button class="btn btn-default"><i class="glyphicon glyphicon-export"></i> {{ trans('Core.Label.text.Export') }}
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
                                <input type="text" name="search" id="search-id" value="{!! Request::get('search') !!}" class="form-control"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" id="metadata_table_div">
                    <table class="table" name="metadata-table" id="metadata-table-id">
                        <thead>
                        <tr>
                            <th>{{ trans('Metadata::lang.Label.Text.Type') }}</th>
                            <th>{{ trans('Metadata::lang.Label.Text.Key') }}</th>
                            <th>{{ trans('Metadata::lang.Label.Text.Value') }}</th>
                            <th>{{ trans('Metadata::lang.Label.Text.Description') }}</th>
                            <th>{{ trans('Metadata::lang.Label.Text.Enabled') }}</th>
                            <th>{{ trans('Metadata::lang.Label.Text.Operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($metadatas->data as $metadata)
                            <tr>
                                <td>{{$metadata->type}}</td>
                                <td>{{$metadata->key}}</td>
                                <td>{{$metadata->value}}</td>
                                <td>{{$metadata->description}}</td>
                                <td>{{$metadata->enabled}}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <a onclick='editMetadata("{{$metadata->id}}");'>{{ trans('Core.Label.text.Edit') }}</a>
                                        </li>
                                        <li>
                                            <a onclick='deleteMetadata("{{$metadata->id}}");'>{{ trans('Core.Label.text.Delete') }}</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="8">{!! $metadatas->pagination !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('metadata.views.javascript')

@endsection