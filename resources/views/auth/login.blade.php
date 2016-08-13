@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#dd4f14), to(#9b1f03)) no-repeat;">
        <div class="row" style="margin-bottom: -11rem;">
            <div class="col-md-7 center">
                <br><br><br><br>
                <p class="size-40 text-center" style="color: white; font-size: 35px;">NORTHSTAR SOLUTIONS INC</p>
                <br/>
                <div class="panel panel-default" style="-webkit-box-shadow: 0px 0px 9px 1px rgba(0,0,0,0.75);
                                                    -moz-box-shadow: 0px 0px 9px 1px rgba(0,0,0,0.75);
                                                    box-shadow: 0px 0px 9px 1px rgba(0,0,0,0.75); margin-top: 5rem;
                                                    margin-bottom: -2rem;">
                    <div class="panel-heading white-bg">
                        <span><img src="{!! URL::to('/') !!}/logo-nsi.png" style="margin-bottom: -3.5rem; margin-right: 1rem;"></span>
                        <span><label class="sgnin-lbl size-16">Sign in to</label></span>
                        <br>
                        <span><label class="size-24 nsi-lbl">Employee Form Submission</label></span>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <br>
                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="employee_id" value="{{ old('employee_id') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
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
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
