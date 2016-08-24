@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
                        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <br><br>
                            <li class="nav-item active"><a class="nav-link" href="{{ route('edit_user', $user->id) }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('show_approver_submitted_leaves', $user->id) }}"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;Leave <span class="badge pull-right" style="font-size: 14px;">{{ $getSubmittedLeaveCount->count() }}</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('edit_user', $user->id) }}"><span class="glyphicon glyphicon-transfer"></span>&nbsp;&nbsp;&nbsp; Change Scheds <span class="badge pull-right" style="font-size: 14px;">{{ $getSubmittedLeaveCount->count() }}</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('edit_user', $user->id) }}"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp; Overtime <span class="badge pull-right" style="font-size: 14px;">{{ $getSubmittedLeaveCount->count() }}</span></a></li>


                            <li class="nav-item"><a class="nav-link" href="{{ route('users') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>

                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        @if(Session::has('message'))
                            <br><br>
                            <div class="row">
                                <div class="alert alert-success" role="alert" style="margin-bottom: -2rem;">
                                    <span class="glyphicon glyphicon-ok"></span> {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-default" style="margin-top: 4rem;">
                                        <div class="panel-heading" style="background-color: white; border-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-radius: 0px 0px 0px 0px; font-size: 22px;">
                                            {{ $user->name }}
                                            <span class="pull-right" style="margin-top: -0.35rem;">
                                                <label style="font-size: 13px;" class="label label-success">ACTIVE</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <a class="btn btn-primary" href="{{ route('edit_approver', $user->id) }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Edit User</a>
                                        <a class="btn btn-danger" href="{{ route('edit_user', $user->id) }}"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp; Deactivate User</a>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: white;">
                                                <h2 class="panel-title">
                                                    <span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;&nbsp;List of Campaigns Handling</h2>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Campaign</th>
                                                        <th>Rank</th>
                                                        <th class="text-right">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($user->approver->approver_campaigns as $campaign_list)
                                                        <tr>
                                                            <td>{{ $campaign_list->campaign->name }}</td>
                                                            <td>{{ $campaign_list->rank }}</td>
                                                            <td><button class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#change_approver_rank"
                                                                        onclick="getApproverId({{ $campaign_list->approver->id, $campaign_list->rank }})">Change Rank</button></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: white;">
                                                <h2 class="panel-title">
                                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Account Information</h2>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group ">
                                                        <label for="inputEmployeeId" class="col-sm-2 control-label">Employee ID</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="inputEmployeeId" placeholder="Employee ID" disabled
                                                                   value="{{ $user->employee_id }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" disabled
                                                            value="{{ $user->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputRole" class="col-sm-2 control-label">User Role</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="inputRole" placeholder="User Role" disabled
                                                                   value="{{ strtoupper($user->type) }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: white;">
                                                <h2 class="panel-title">
                                                    <span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Employee Settings</h2>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputLeaveSettings" class="col-sm-2 control-label">Vacation Leave</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="inputEmployeeId" placeholder="Vacation Leave" disabled
                                                                   value="{{ $user->user_setting->vacation_leave }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputSickLeave" class="col-sm-2 control-label">Sick Leave</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="inputSickLeave" placeholder="Sick Leave" disabled
                                                                   value="{{ $user->user_setting->sick_leave }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="change_approver_rank">
        <form id="update_approver_rank" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('patch') }}

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Approver Rank</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
                            <label for="inputRank" class="col-sm-3 col-xs-12 control-label text-info">Rank</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="number" class="form-control" name="rank" id="rank">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </form>
    </div><!-- /.modal -->

    <script>
        function getApproverId(approver_id, rank) {
            var update_route = "{{ route('update_approver_rank', ":approver_id") }}";
            update_route = update_route.replace(':approver_id', approver_id);
            document.getElementById("update_approver_rank").action = update_route;
            document.getElementById("rank").val = rank;
        }
    </script>
@stop