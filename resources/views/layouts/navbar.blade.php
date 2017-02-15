@section('navbar')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                @include('layouts.navbar.header')
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="top-menu-id">
                    @if(!is_null($menu = Menu::get('navbarmenu')))
                        @include('layouts.navbar.multi_level_menu', array('items' => $menu->roots()))
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @include('layouts.navbar.right')
                </ul>
            </div>

        </div>
    </nav>
@endsection
