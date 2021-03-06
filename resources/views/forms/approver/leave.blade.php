@extends('layouts.app')

@section('header')
@include('layouts.header')
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" style="background-color: #0091b7;">
                    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-weight: 100px; font-size: 17px;">
                        <br><br>
                        <li class="nav-item"><a class="nav-link" href="{{ route('approver_home') }}">
                                <span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                <div class="row">
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
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-bordered">
                            <thead>
                                <th>Approver</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($approver_list as $approvers)
                                @if($approvers->status == 'PENDING')
                                    <tr>
                                        <td>{{ $approvers->approver->user->name }}</td>
                                        <td class="label-warning" style="color: white;">
                                            <span class="glyphicon glyphicon-flag"></span>&nbsp;&nbsp;{{ $approvers->status }}</td>
                                    </tr>
                                @elseif($approvers->status == 'APPROVED')
                                    <tr>
                                        <td >{{ $approvers->approver->user->name }}</td>
                                        <td class="label-success" style="color: white;">
                                            <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ $approvers->status }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Leave Request Form</h2>
                            </div>

                            <form method="POST" action="{{ route('approve_leave') }}" id="leaveApproval">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <input type="hidden" value="1" name="form_id">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $form_user->id }}" name="form_user_id">

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input class="form-control" placeholder="Employee Name" value="{{ $form_user->user->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Employee Number</label>
                                                <input class="form-control" placeholder="Employee Number" value="{{ $form_user->user->employee_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Department/Campaign</label>
                                                <input class="form-control" placeholder="Department/Campaign" value="{{ $form_user->user->campaign->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Position</label>
                                                <input class="form-control" placeholder="Position" value="{{ $form_user->user->position }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <hr>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <h4>Leave (<i>please tick appropiate box</i>):</h4>
                                            <br>
                                            <div class="radio col-lg-push-2"><label>
                                                <input name="leave_option" value="Vacation Leave" type="radio"
                                                    {{ $leave->leave_purpose == "Vacation Leave" ? "checked" : "" }}
                                                disabled> Vacation</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                                <input name="leave_option" value="Sick Leave" type="radio"
                                                    {{ $leave->leave_purpose == "Sick Leave" ? "checked" : "" }}
                                                disabled> Sick</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                                <input name="leave_option" value="Paternity Leave" type="radio"
                                                    {{ $leave->leave_purpose == "Paternity Leave" ? "checked" : "" }}
                                                disabled>Paternity</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                                <input name="leave_option" value="Maternity Leave" type="radio"
                                                    {{ $leave->leave_purpose == "Maternity Leave" ? "checked" : "" }}
                                                disabled>Maternity</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                                <input name="leave_option" value="Authorized Absence" type="radio"
                                                    {{ $leave->leave_purpose == "Authorized Leave" ? "checked" : "" }}
                                                disabled>Authorized Absence</label></div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Date Filed</label>
                                                <input type="text" class="form-control" placeholder="Date Filed" name="date_filed" disabled
                                                   value="{{ date('F d, Y') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Dates Requested</label>
                                                <div class="input-group date-range input-daterange" id="datepicker">
                                                    <input type="text" class="form-control" name="start" id="start" value="{{ $leave->start_date }}"
                                                    disabled/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control" name="end" id="getDate" value="{{ $leave->end_date }}"
                                                    disabled/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Number of Days</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="total_days"
                                                   value="{{ date_diff(date_create($leave->start_date), date_create($leave->end_date))->format("%a") }}" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Reason For Leave</label>
                                                <input type="text" class="form-control" name="leave_reason" value="{{ $leave->reason }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmLeaveApproval">Approve Leave</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirmLeaveApproval">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #f0ad4e;"><span class="glyphicon glyphicon-alert"></span> Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to approve this LEAVE FORM?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Deny</button>
                <button type="button" class="btn btn-success" onclick="document.getElementById('leaveApproval').submit();">Approve</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            startDate: moment().add(1, 'd').format('MM/DD/YYYY'),
            format: 'M d, yyyy'
        });

        $("#getDate").change(function(){
            var start = document.getElementById('start').value;
            var end = document.getElementById('getDate').value;

            var a = moment(start);
            var b = moment(end);
            var diffDays = b.diff(a, 'days');

            console.log(diffDays);

            document.getElementById('total_days').value = diffDays;
        });
    });
</script>
@stop