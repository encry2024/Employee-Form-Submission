<nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br><br>
        <li class="nav-item {{ Request::route()->getName() == 'approver_home' ? 'active' : '' }}"><a class="nav-link" href="{{ route('approver_home') }}"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp; Dashboard</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'leave' ? 'active' : '' }}"><a class="nav-link" href="{{ route('leave') }}"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp; Leave Forms</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'change_schedule' ? 'active' : '' }}"><a class="nav-link" href="{{ route('change_schedule') }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Change Scheds</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'overtime' ? 'active' : '' }}"><a class="nav-link" href="{{ route('overtime') }}"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp; Overtime Forms</a></li>
    </ul>
</nav>