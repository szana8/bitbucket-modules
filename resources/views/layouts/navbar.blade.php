@section('navbar')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand" href="#" style="width: 80px;">
                    <img src="{{ url('/') }}/img/laravel-logo-white.png" width="50px" style="position:absolute; margin-top:-5px;" />
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="top-menu-id">
                    <!-- Ide jön a menüt rekurzívan összeállító script -->
                    @if(!is_null($menu = Menu::get('navbarmenu')))
                        @include('layouts.multi_level_menu', array('items' => $menu->roots()))
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>

                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-question-sign"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('logout') }}">Logout <span class="sr-only">(current)</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
@endsection
