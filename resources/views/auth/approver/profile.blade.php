@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @include('layouts.approver-linksidebar')
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
                            <div class="col-lg-12">
                                <div class="page-header">
                                    <h2>{{ Auth::user()->name }} Profile</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a type="button" class="btn btn-primary" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Change Schedule
                                </a>
                                <a type="button" class="btn btn-danger" aria-label="Left Align">
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
