@section('header')
    <title>Laravel Issue Tracker</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="icon" href="{{ URL('/') }}/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel='stylesheet prefetch' href='https://unpkg.com/vue-material@latest/dist/vue-material.css'>
    <script src='https://unpkg.com/vue@latest'></script>
    <script src='https://unpkg.com/vue-material@latest'></script>

    {{ Html::script('js/vendor.js') }}
    {{ Html::script('js/app.js') }}
    {{-- Html::script('js/components.js') --}}

    {!! Html::style('css/vendor.css') !!}
    {{-- Html::style('css/app.css') --}}

    {{-- Html::style('css/extension.css') --}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-XSRF-TOKEN': $('meta[name=_token]').attr('content')}
        });
    </script>
@endsection