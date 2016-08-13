<nav class="navbar-fixed-top navbar-inverse" style="border-radius: 0px; border-bottom-style: solid; background-color: white; border-color: #cccccc;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="{{ URL::to('/') }}/logo-nsi.png" style="margin-top: -1.35rem;">
            </a>
            <a class="navbar-brand" href="#" style="font-size: 20px; color: #3d3d3d; margin-left: -2rem;">Employee Form Submission</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle header_link" style="color: black;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('approver_profile') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp; Settings</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp; Logs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
                <li><a href="#" class="header_link" style="color: black;"><span class="glyphicon glyphicon-info-sign"></span> Report an Issue</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>