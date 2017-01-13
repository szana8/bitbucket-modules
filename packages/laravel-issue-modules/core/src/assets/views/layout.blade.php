<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="icon" href="{{ URL('/') }}/favicon.png">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @section('header')
        @show

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {'X-XSRF-TOKEN': $('meta[name=_token]').attr('content')}
            });
        </script>
    </head>

    <body>
        <h1>This is a test!</h1>
    </body>

    <footer class="footer">

    </footer>
</html>