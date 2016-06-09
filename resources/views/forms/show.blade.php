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
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <br><br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">{{ $leave->form_user->form->name }}</h2>
                            </div>
                            <form>
                                <input type="hidden" value="1" name="form_id">
                                <input type="hidden" value="{{ $leave->form_user->user->id }}" name="user_id">

                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Approvers:</label>
                                            <br>
                                            @foreach($approver_form as $approvers)
                                                @if($approvers->status == 'pending')
                                                    <span class="label label-danger">{{ $approvers->approver->user->name }}</span>
                                                @elseif($approvers->status == 'confirmed')
                                                    <span class="label label-success">{{ $approvers->approver->user->name }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row">
                                        <hr>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input class="form-control" placeholder="Employee Name" value="{{ $leave->form_user->user->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Employee Number</label>
                                                <input class="form-control" placeholder="Employee Number" value="{{ $leave->form_user->user->employee_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Department/Campaign</label>
                                                <input class="form-control" placeholder="Department/Campaign" value="{{ $leave->form_user->user->campaign->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Position</label>
                                                <input class="form-control" placeholder="Position" value="{{ $leave->form_user->user->position }}" readonly>
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
                                            {{ $leave->leave_purpose == 'Vacation Leave' ? 'checked' : '' }} disabled> Vacation</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                            <input name="leave_option" value="Sick Leave" type="radio"
                                            {{ $leave->leave_purpose == 'Sick Leave' ? 'checked' : '' }} disabled> Sick</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                            <input name="leave_option" value="Paternity Leave" type="radio"
                                            {{ $leave->leave_purpose == 'Paternity Leave' ? 'checked' : '' }} disabled>Paternity</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                            <input name="leave_option" value="Maternity Leave" type="radio"
                                            {{ $leave->leave_purpose == 'Maternity Leave' ? 'checked' : '' }} disabled>Maternity</label></div>
                                            <div class="radio col-lg-push-2"><label>
                                            <input name="leave_option" value="Authorized Absence" type="radio"
                                            {{ $leave->leave_purpose == 'Authorized Absence' ? 'checked' : '' }} disabled>Authorized Absence</label></div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Date Filed</label>
                                                <input type="text" class="form-control" placeholder="Date Filed" name="date_filed" readonly value="{{ date('F d, Y', strtotime($leave->form_user->created_at)) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Dates Requested</label>
                                                <div class="input-group date-range input-daterange" id="datepicker">
                                                    <input type="text" class="form-control" name="start" id="start" value="{{ $leave->start_date }}" disabled/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control" name="end" id="getDate" value="{{ $leave->end_date }}" disabled/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Number of Days</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="total_days" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Reason For Leave</label>
                                                <input type="text" class="form-control" name="leave_reason" value="{{ $leave->reason }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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