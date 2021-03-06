@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')
@extends('layouts.sidebar', ['sidebars' => []])

@section('content')

    <div class="col-md-12" id="metadata_app">
        <!-- Metadata form -->
        @include('metadata.views.modals.create')

        <module name="{{ trans('Metadata::lang.Label.Text.Metadata') }}" description="{!! trans('Metadata::lang.Info.Text.MetadataDesc') !!}">

            <template slot="module-buttons">
                @include('metadata.views.commands.commands')
            </template>

            <template slot="module-search-form">
                @include('layouts.modules.sections.search')
            </template>

            @include('metadata.views.lists.metadata')

        </module>
    </div>

    @include('metadata.views.javascript', ['list' => json_encode($list)])

@endsection