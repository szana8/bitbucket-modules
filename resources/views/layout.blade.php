<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        @yield('header')
    </head>

    <body>
        @yield('navbar')

        <div id="wrap">
            <div class="container-fluid clear-top ui-layout">
                @yield('sidebar')

                @yield('content')
            </div>
        </div>

    </body>


    @yield('footer')

</html>