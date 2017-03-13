@section('navbar')
    <div id="navbar_menu">
        <md-toolbar class="md-info">
            <md-button class="md-icon-button">
                <md-icon>menu</md-icon>
            </md-button>

            <md-menu v-for="item in navbar">
                <md-button md-menu-trigger v-text="item.title"></md-button>

                <md-menu-content>
                    <md-menu-item>Item 1</md-menu-item>
                    <md-menu-item>Item 2</md-menu-item>
                    <md-menu-item>Item 3</md-menu-item>
                </md-menu-content>

            </md-menu>

        </md-toolbar>
    </div>

    <script>
        new Vue({
            el: '#navbar_menu',

            data: {
                navbar: {!! Menu::get('navbarmenu')->items !!}
            }
        });
    </script>

@endsection
