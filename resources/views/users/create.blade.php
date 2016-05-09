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
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <h4>Account Information</h4>
                                                <br>
                                                <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                    <label for="InputEmployeeId" class="col-sm-4 col-xs-12 control-label text-info">Employee ID:</label>
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
                                                    <label for="inputName" class="col-sm-4 col-xs-12 control-label text-info">Employee Name:</label>
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
                                                    <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">E-mail:</label>
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
                                                    <label for="inputPassword3" class="col-sm-4 col-xs-12 control-label text-info">Password:</label>
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
                                                    <label for="inputConfirmPassword" class="col-sm-4 col-xs-12 control-label text-info">Confirm Password:</label>
                                                    <div class="col-sm-6 col-xs-12">
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

                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <h4>Work Information</h4>
                                                <br>
                                                <div class="form-group{{ $errors->has('campaign_id') ? ' has-error' : '' }}">
                                                    <label for="InputCampaign" class="col-sm-4 col-xs-12 control-label text-info">Campaign/Department:</label>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <select name="campaign_id" class="form-control" id="InputCampaign">
                                                            @foreach($campaigns as $campaign)
                                                                <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('campaign_id'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('campaign_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
                                                    <label for="InputRank" class="col-sm-4 col-xs-12 control-label text-info">Approver Rank:</label>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <select name="rank" class="form-control" id="InputRank">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('rank') }}</strong>
                                                        </span>
                                                        @endif
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
                                All users that will be created by the admin will have <i>USER</i> type.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop