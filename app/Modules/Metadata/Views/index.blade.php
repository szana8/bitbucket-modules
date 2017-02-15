@extends('layout')
@extends('layouts.header')
@extends('layouts.navbar')
@extends('layouts.footer')
@extends('layouts.sidebar', ['sidebars' => []])

@section('content')

    <div id="root">
        <modal id="new-modal">

        </modal>
        <button class="btn btn-primary" data-toggle="modal" data-target="#new-modal"></button>
    </div>

    <script>
        new Vue({
            el: '#root',
            components: {
                modal: modal
            },
        });
    </script>

@endsection