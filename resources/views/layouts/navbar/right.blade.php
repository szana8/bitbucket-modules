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