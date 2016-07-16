@extends('layouts.app')

@section('header')
    <nav class="navbar-fixed-top navbar-inverse" style="border-radius: 0px;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white;">Employee Form Submission</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 main">
                <br><br><br><br><br><br>

                <div class="alert alert-info" role="alert">
                    Welcome to NSI :: Employee Form Submission Login Page
                </div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input type="string" class="form-control" name="employee_id" value="{{ old('employee_id') }}">

                            @if ($errors->has('employee_id'))
                                <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('employee_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span> Login
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
