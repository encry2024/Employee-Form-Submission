@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @include('layouts.link-sidebar')
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: white; border-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-radius: 0px 0px 0px 0px; font-size: 22px;">
                                            DASHBOARD
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" style="border-bottom: none;" role="tablist">
                                        <li role="presentation" style="margin-bottom:
                                        0px !important;" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Leaves
                                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="tab-badge">{{ count($leaves) }}</span></a></li>
                                        <li role="presentation" style="margin-bottom:
                                        0px !important;"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Schedule Form</a></li>
                                        <li role="presentation" style="margin-bottom:
                                        0px !important;"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Overtime</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="panel panel-default" style="margin-top: -0.2rem; box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                                        <div class="panel-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="home">
                                                    <br><br>
                                                    <div class="col-lg-12">

                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead style="background-color: #f4f4f4;">
                                                                    <th>Form ID</th>
                                                                    <th>Submitted By</th>
                                                                    <th>Leave Purpose</th>
                                                                    <th>Status</th>
                                                                    <th>Date Submitted</th>
                                                                    <th>Action</th>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($leaves as $leave)
                                                                    <tr>
                                                                        <td>{{ $leave->id }}</td>
                                                                        <td>{{ $leave->form_user->user->name }}</td>
                                                                        <td>{{ $leave->leave_purpose }}</td>
                                                                        <td><span class="label {{ $leave->status == 'PENDING' ? 'label-danger' : 'label-success' }} " style="font-size: 12px;">{{ $leave->status }}</span></td>
                                                                        <td>{{ date('F d, Y', strtotime($leave->created_at)) }}</td>
                                                                        <td>
                                                                            <a href="{{ route('show_leave', $leave->id) }}" class="btn btn-primary btn-sm">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
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
