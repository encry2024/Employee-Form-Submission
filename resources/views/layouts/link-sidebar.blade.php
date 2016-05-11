<nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" style="background-color: #0091b7;">
    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-weight: 100px; font-size: 17px;">
        <br><br>
        <li class="nav-item {{ Request::route()->getName() == 'home' ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp; Dashboard</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'users' ? 'active' : '' }}"><a class="nav-link" href="{{ route('users') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; Users <span class="badge pull-right" style="font-size: 17px;">{{ count($users) }}</span></a></li>
        <li class="nav-item {{ Request::route()->getName() == 'campaigns' ? 'active' : '' }}"><a class="nav-link" href="{{ route('campaigns') }}"><span class="glyphicon glyphicon-flag"></span>&nbsp;&nbsp;&nbsp; Departments <span class="badge pull-right" style="font-size: 17px;">{{ count($campaigns) }}</span></a></li>
    </ul>
</nav>