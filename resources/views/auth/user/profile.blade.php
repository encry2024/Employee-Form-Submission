@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @include('layouts.user-sidebar')
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-header">
                                    <h2><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }}
                                    <span class="pull-right"><a href="{{ route('edit_user_profile') }}" class="btn btn-primary">Edit Profile</a></span>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-info" role="alert">
                                       <span class="glyphicon glyphicon-info-sign"></span>
                                        {{ Auth::user()->name }}'s Personal Information

                                    </div>
                                </div>

                                <!-- Personal Information -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('post_user') }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                            <label for="InputEmployeeId" class="col-sm-4 col-xs-12 control-label text-info">Employee ID:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input type="string" name="employee_id" class="form-control" id="InputEmployeeId" readonly value="{{ Auth::user()->employee_id }}">

                                                @if ($errors->has('employee_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">E-mail:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{ Auth::user()->email }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('campaign_id') ? ' has-error' : '' }}">
                                            <label for="InputCampaign" class="col-sm-4 col-xs-12 control-label text-info">Campaign/Department:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input class="form-control" type="string" value="{{ Auth::user()->campaign->name }}" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Work Settings -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-info" role="alert">
                                       <span class="glyphicon glyphicon-cog"></span> Leave Settings
                                    </div>
                                    <form class="form-horizontal" method="POST" action="{{ route('post_user') }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="InputTotalLeaveHours" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Vacation Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input class="form-control" id="InputTotalLeaveHours" readonly value="{{ Auth::user()->user_setting->vacation_leave }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Sick Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->sick_leave }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Paternity Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->paternity_leave }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Maternity Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->maternity_leave }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Authorized Absence Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->authorized_absence }}" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Leave & OT form buttons -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-info" role="alert">
                                        <span class="glyphicon glyphicon-folder-close"></span> Leave & Overtime Forms
                                    </div>
                                    <a href="" class="btn btn-primary">File an Overtime Form</a>
                                    <a href="" class="btn btn-primary">File a Leave Form</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row before layout -->
            </div> <!-- column before row before layout -->
        </div> <!-- row before column before row before layout -->
    </div>

    <script>
        $(document).ready(function() {
            $(".ui.dropdown").dropdown({
                allowAdditions: true,
            });
        });
    </script>
@endsection
