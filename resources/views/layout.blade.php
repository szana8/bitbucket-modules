<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        @yield('header')
    </head>

    <body>
        <div id="app">
            @yield('navbar')
            <md-layout>
                @yield('content')
            </md-layout>
        </div>
    </body>

</html>

@yield('contentjavascript')