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

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-header">
                                    <h2><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h2>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Leave Form
                                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="tab-badge">{{ count($leaves) }}</span></a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Change Schedule Form</a></li>
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Overtime Form</a></li>
                                    </ul>

                                    <!-- Tab panes -->
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
