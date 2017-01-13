@section('header')
    <title>Laravel Issue Tracker</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="icon" href="{{ URL('/') }}/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::script('js/app.js') !!}

    {!! Html::style('css/app.css') !!}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-XSRF-TOKEN': $('meta[name=_token]').attr('content')}
        });
    </script>
@endsection