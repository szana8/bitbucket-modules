@section('sidebar')
        <!-- sidebar -->
        <div class="sidebar-wrapper" aria-expanded="false">
            <div class="sidebar-inner">
                <div class="sidebar-body">
                    <header class="page-header">
                        <!-- put what you want here -->

                    </header>
                    <nav class="navgroup navgroup-vertical">
                        <div class="navgroup-inner">
                            @forelse($sidebars as $sidebar)
                                @if(isset($sidebar['heading']))
                                    <div class="nav-heading">
                                        <strong>{{ $sidebar['heading'] }}</strong>
                                    </div>
                                @endif

                                <!-- navigation links -->
                                <ul class="nav" id="{{ $sidebar['id'] }}">
                                    @foreach($sidebar['elements'] as $element)
                                            <li>
                                                <a href="{{ $element['url'] }}" id="{{ $element['id'] }}">
                                                    <i class="{{ $element['class'] }}"></i>
                                                    <span class="{{ $element['itemclass'] }}">{{ $element['item'] }}</span>
                                                </a>
                                            </li>
                                    @endforeach
                                </ul>
                            @empty

                            @endforelse
                        </div>
                    </nav>
                </div>
                <div class="sidebar-footer">
                    @if( ! empty($sidebars) )
                        <a class="sidebar-toggle" id="toggle">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    <!-- /.sidebar-wrapper -->
    <script>
        // Work in progress...

        //IIFE
        (function ()
        {

            // Toggle button
            var toggle = document.getElementById("toggle"),
                // Navbar element wrap
                collapse = document.querySelector(".sidebar-wrapper");

            // Add a click event
            if(toggle) {
                toggle.addEventListener("click", function () {

                    // get the aria-expanded value
                    var colValue = collapse.getAttribute("aria-expanded");

                    switch (colValue) {
                        case "true":
                            // turn expanded=false
                            collapse.setAttribute("aria-expanded", "false");

                            break;
                        case "false":
                            // turn expanded=true
                            collapse.setAttribute("aria-expanded", "true");
                            break;
                    }

                }, false);
            }
        })();

        //detect scroll event and add a class
        window.onscroll = function ()
        {
            var nav = document.getElementById("navbar");
            if(nav) {
                var navHeight = nav.offsetHeight;
            }
            var scrollVal = document.body.scrollTop;
            var sidebar = document.querySelector(".sidebar-wrapper");

            if (scrollVal === navHeight || scrollVal > navHeight) {
                sidebar.className += " is-stacked";
            } else {
                if (scrollVal === 0) {
                    sidebar.classList.remove("is-stacked");
                }
            }
        }
    </script>
@endsection