<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        @yield('header')
    </head>

    @yield('navbar')

    <body>
        <main class="content">
            @yield('sidebar')

            <div class="content-wrapper">
                <div class="content-inner">
                    @yield('content')
                </div>
            </div>
        </main>

    </body>

    @yield('footer')

</html>