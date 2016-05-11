@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" style="background-color: #0091b7;">
                        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-weight: 100px; font-size: 17px;">
                            <br><br>
                            <li class="nav-item"><a class="nav-link" href="{{ route('user_profile') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-header">
                                    <h2><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }}
                                        <span class="pull-right"><button onclick="document.updateProfile.submit();" class="btn btn-primary">Edit Profile</button></span>
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
                                <form class="form-horizontal" method="POST" action="{{ route('post_update_user') }}" name="updateProfile">
                                    <!-- Personal Information -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="campaign_id" value="{{ Auth::user()->campaign_id }}">

                                        <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                            <label for="InputEmployeeId" class="col-sm-4 col-xs-12 control-label text-info">Employee ID:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input type="string" name="employee_id" class="form-control" id="InputEmployeeId" value="{{ Auth::user()->employee_id }}" readonly>

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
                                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('campaign_id') ? ' has-error' : '' }}">
                                            <label for="InputCampaign" class="col-sm-4 col-xs-12 control-label text-info">Campaign/Department:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <select name="campaign" id="" class="form-control">
                                                    @foreach($campaigns as $campaign)
                                                        <option value="{{ $campaign->id }}"
                                                        {{ $campaign->id == Auth::user()->campaign_id ? 'selected' : '' }}
                                                        >{{ $campaign->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- Work Settings -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="alert alert-info" role="alert">
                                            <span class="glyphicon glyphicon-cog"></span> Work Settings
                                        </div>
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="InputTotalLeaveHours" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Vacation Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input name="vacation_leave" class="form-control" id="InputTotalLeaveHours" value="{{ Auth::user()->user_setting->vacation_leave }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Sick Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input name="sick_leave" class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->sick_leave }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Paternity Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input name="paternity_leave" class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->paternity_leave }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Maternity Leave Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input name="maternity_leave" class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->maternity_leave }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-4 col-xs-12 control-label text-info">Total hrs of Authorized Absence Remaining:</label>
                                            <div class="col-sm-6 col-xs-12">
                                                <input name="authorized_absence" class="form-control" id="inputEmail" value="{{ Auth::user()->user_setting->authorized_absence }}">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
