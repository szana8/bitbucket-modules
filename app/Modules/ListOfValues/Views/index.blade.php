@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')
@extends('layouts.sidebar', ['sidebars' => []])

@section('content')

    <div id="listOfValues_app">

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