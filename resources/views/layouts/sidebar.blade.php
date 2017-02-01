@section('sidebar')
    <div class="wrapper">
        <div class="row row-offcanvas row-offcanvas-left">
            <!-- sidebar -->
            <div class="column col-sm-3 col-xs-1 sidebar-offcanvas" id="sidebar">
                <ul class="nav" id="menu">
                    <li><a href="#"><i class="fa fa-list-alt"></i> <span class="collapse in hidden-xs">Link 1</span></a></li>
                    <li><a href="#"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Stories</span></a></li>
                    <li><a href="#"><i class="fa fa-paperclip"></i> <span class="collapse in hidden-xs">Saved</span></a></li>
                    <li><a href="#"><i class="fa fa-refresh"></i> <span class="collapse in hidden-xs">Refresh</span></a></li>
                    <li>
                        <a href="#" data-target="#item1" data-toggle="collapse"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Menu <span class="caret"></span></span></a>
                        <ul class="nav nav-stacked collapse left-submenu" id="item1">
                            <li><a href="google.com">View One</a></li>
                            <li><a href="gmail.com">View Two</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-target="#item2" data-toggle="collapse"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Menu <span class="caret"></span></span></a>
                        <ul class="nav nav-stacked collapse" id="item2">
                            <li><a href="#">View One</a></li>
                            <li><a href="#">View Two</a></li>
                            <li><a href="#">View Three</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Link</span></a></li>
                </ul>
            </div>
            <!-- /sidebar -->

            <!-- main right col -->
            <div class="column col-sm-9 col-xs-11" id="main">
                <p><a href="#" data-toggle="offcanvas"><i class="fa fa-navicon fa-2x"></i></a></p>
                <p>
                    Main content...
                </p>
            </div>
            <!-- /main -->
        </div>


        <script>
            /* off-canvas sidebar toggle */
            $('[data-toggle=offcanvas]').click(function() {
                $('.row-offcanvas').toggleClass('active');
                $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
            });
        </script>
@endsection