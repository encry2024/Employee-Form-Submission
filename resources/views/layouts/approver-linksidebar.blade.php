<nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" style="background-color: #0091b7;">
    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-weight: 100px; font-size: 17px;">
        <br><br>
        <li class="nav-item {{ Request::route()->getName() == 'approver_home' ? 'active' : '' }}"><a class="nav-link" href="{{ route('approver_home') }}"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp; Dashboard</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'approver_profile' ? 'active' : '' }}"><a class="nav-link" href="{{ route('approver_profile') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; Profile</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'leave' ? 'active' : '' }}"><a class="nav-link" href="{{ route('leave') }}"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp; Leaves</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'change_schedule' ? 'active' : '' }}"><a class="nav-link" href="{{ route('change_schedule') }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Change Schedules</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'overtime' ? 'active' : '' }}"><a class="nav-link" href="{{ route('overtime') }}"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp; Overtime</a></li>
    </ul>
</nav>