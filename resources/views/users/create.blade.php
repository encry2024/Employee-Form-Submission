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

                                <form class="form-horizontal" method="POST" action="{{ route('post_create') }}">
                                    {!! csrf_field() !!}

                                    <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                        <label for="InputEmployeeId" class="col-sm-2 col-xs-12 control-label">Employee ID</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="string" name="employee_id" class="form-control" id="InputEmployeeId">

                                            @if ($errors->has('employee_id'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('employee_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="inputName" class="col-sm-2 col-xs-12 control-label">Name</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="string" name="name" class="form-control" id="inputName">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="inputEmail" class="col-sm-2 col-xs-12 control-label">E-mail</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="email" name="email" class="form-control" id="inputEmail">

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="inputPassword3" class="col-sm-2 col-xs-12 control-label">Password</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="password" name="password" class="form-control" id="inputPassword3">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="inputConfirmPassword" class="col-sm-2 col-xs-12 control-label">Confirm Password</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword">

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> Create Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{--<br><br><br><br><br>
                        <div class="row">
                            <div class="alert alert-info" role="alert">
                                The <b>ACCOUNT TYPE</b> that will be created here will have an account type <b>DEV</b> tht stands for <b>Developer</b> and some of the functions of the admin side will be disabled.
                                However, You may request to the admin to give you an access for the admin side.
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop