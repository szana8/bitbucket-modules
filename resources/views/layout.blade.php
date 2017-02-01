<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        @yield('header')
    </head>

    <body>
        @yield('navbar')

        <div class="container-fluid">
            @yield('sidebar')

            @yield('content')
        </div>

    </body>

    <footer class="footer">
        {{-- @yield('footer') --}}
    </footer>
</html>