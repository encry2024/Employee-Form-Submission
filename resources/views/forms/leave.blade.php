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
                            <li class="nav-item"><a class="nav-link" href="{{ route('user_profile') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <br><br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Leave Request Form</h2>
                            </div>
                            <form>
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input class="form-control" placeholder="Employee Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Employee Number</label>
                                                <input class="form-control" placeholder="Employee Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Department/Campaign</label>
                                                <input class="form-control" placeholder="Department/Campaign">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Position</label>
                                                <input class="form-control" placeholder="Position">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <hr>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <h4>Reason for Leave (<i>please tick appropiate box</i>):</h4>
                                            <br>
                                            <div class="radio col-lg-push-2"><label><input name="leave_option" value="vacation_leave" type="radio"> Vacation</label></div>
                                            <div class="radio col-lg-push-2"><label><input name="leave_option" value="sick_leave" type="radio"> Sick</label></div>
                                            <div class="radio col-lg-push-2"><label><input name="leave_option" value="paternity_leave" type="radio">Paternity</label></div>
                                            <div class="radio col-lg-push-2"><label><input name="leave_option" value="maternity_leave" type="radio">Maternity</label></div>
                                            <div class="radio col-lg-push-2"><label><input name="leave_option" value="authorized_leave" type="radio">Authorized Absence</label></div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Date Filed</label>
                                                <input type="text" class="form-control" placeholder="Date Filed" name="date_filed" readonly value="{{ date('F d, Y') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Dates Requested</label>
                                                <div class="input-group date-range input-daterange" id="datepicker">
                                                    <input type="text" class="form-control" name="start" id="start"/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control" name="end" id="getDate"/>
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
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-default">Submit Leave Form</button>
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