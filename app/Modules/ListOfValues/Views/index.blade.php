@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')
@extends('layouts.sidebar', ['sidebars' => []])

@section('content')

    <div class="col-md-12" id="listOfValues_app">
        <!-- List of value modal -->
        @include('listofvalues.views.modals.create')

        <module name="{{ trans('ListOfValues::lang.Label.Text.ListOfValues') }}" description="{!! trans('ListOfValues::lang.Info.Text.ListOfValuesDesc') !!}">

            <template slot="module-buttons">
                @include('listofvalues.views.buttons.commands')
            </template>

            <template slot="module-search-form">
                @include('layouts.modules.sections.search')
            </template>

            @include('listofvalues.views.lists.list', ['listofvalues' => $listofvalues])

        </module>
    </div>

    @include('listofvalues.views.javascript')

@endsection