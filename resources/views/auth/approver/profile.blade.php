@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
                        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br><br>
                            <li class="nav-item {{ Request::route()->getName() == 'leave' ? 'active' : '' }}"><a class="nav-link" href="{{ route('leave') }}"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp; Leave Forms</a></li>
                            <li class="nav-item {{ Request::route()->getName() == 'change_schedule' ? 'active' : '' }}"><a class="nav-link" href="{{ route('change_schedule') }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Change Scheds</a></li>
                            <li class="nav-item {{ Request::route()->getName() == 'overtime' ? 'active' : '' }}"><a class="nav-link" href="{{ route('overtime') }}"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp; Overtime Forms</a></li>
                            <li class="nav-item {{ Request::route()->getName() == 'approver_home' ? 'active' : '' }}"><a class="nav-link" href="{{ route('approver_home') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <br><br>
                        @if(Session::has('message'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissable" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: white; border-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-radius: 0px 0px 0px 0px; font-size: 22px;">
                                            YOUR PROFILE
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form method="POST" action="{{ route('update_approver_info') }}" id="updateForm">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}

                                                <div class="form-group">
                                                    <label for="inputEmail">Email address</label>
                                                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}">
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="inputPassword">Password <i>(Changing password will log you out from the website)</i></label>
                                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputConfirmPassword">Confirm Password</label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="inputConfirmPassword" placeholder="Password" autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputRole">Role</label>
                                                    <input type="role" class="form-control" id="inputRole" placeholder="Employee's Role" value="{{ ucfirst(Auth::user()->type) }}" disabled>
                                                </div>
                                            </form>

                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#confirmationForUpdateForm">Update</button>

                                            <div class="row">
                                                <hr>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a type="button" class="btn btn-primary" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                        Change Schedule
                                                    </a>
                                                    <a type="button" class="btn btn-danger" aria-label="Left Align" href="{{ route('create_leave') }}">
                                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                                        Leave
                                                    </a>
                                                    <a type="button" class="btn btn-success" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                        Overtime
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="confirmationForUpdateForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color: #f0ad4e;"><span class="glyphicon glyphicon-alert"></span> Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update the following information?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('updateForm').submit();">Update my Information</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            $(".ui.dropdown").dropdown({
                allowAdditions: true,
            });
        });
    </script>
@endsection
