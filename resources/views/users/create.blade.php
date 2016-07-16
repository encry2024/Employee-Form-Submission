@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.link-sidebar')

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                <br><br>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(Session::has('message'))
                        <div class="row">
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <a href="{{ route('users') }}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="page-header">
                                    <h3>Create User Account</h3>
                                </div>

                                <div class="col-lg-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('post_user') }}">
                                        {!! csrf_field() !!}
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <h4>Account Information</h4>
                                                <br>
                                                <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                    <label for="InputEmployeeId" class="col-sm-5 col-xs-12 control-label text-info">Employee ID:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input type="string" name="employee_id" class="form-control" id="InputEmployeeId">

                                                        @if ($errors->has('employee_id'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('employee_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="inputName" class="col-sm-5 col-xs-12 control-label text-info">Employee Name:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input type="string" name="name" class="form-control" id="inputName">

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="inputEmail" class="col-sm-5 col-xs-12 control-label text-info">E-mail:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input type="email" name="email" class="form-control" id="inputEmail">

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="inputPassword3" class="col-sm-5 col-xs-12 control-label text-info">Password:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input type="password" name="password" class="form-control" id="inputPassword3">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <label for="inputConfirmPassword" class="col-sm-5 col-xs-12 control-label text-info">Confirm Password:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword">

                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <h4>Work Information</h4>
                                                <br>

                                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                                    <label for="InputPosition" class="col-sm-5 col-xs-12 control-label text-info">Position:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input type="text" name="position" class="form-control" id="InputPosition">

                                                        @if ($errors->has('position'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('position') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <h4>Leave Settings</h4>
                                                <br>
                                                <div class="form-group">
                                                    <label for="InputVacationLeaveHrs" class="col-sm-5 col-xs-12 control-label text-info">Vacation Leave:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input placeholder="Hrs of Vacation Leave" type="string" name="vacation_leave" class="form-control" id="InputVacationLeaveHrs">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="InputSickLeaveHrs" class="col-sm-5 col-xs-12 control-label text-info">Sick Leave:</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <input placeholder="Hrs of Sick Leave" type="string" name="sick_leave" class="form-control" id="InputSickLeaveHrs">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> Create Account</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="row">
                            <div class="alert alert-info" role="alert">
                                All users that will be created by the admin will have <i>USER</i> role.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop