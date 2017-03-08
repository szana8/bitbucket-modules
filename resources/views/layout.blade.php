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
<script>
    Vue.use(VueMaterial);

    window.app = new Vue({
        el: '#app',

        data: {
            stay_signed_in: true
        }
    });
</script>