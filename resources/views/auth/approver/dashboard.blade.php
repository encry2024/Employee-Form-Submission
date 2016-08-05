@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @include('layouts.approver-linksidebar')
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
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Leave Form
                                            @if($approvers->count() != 0)
                                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="tab-badge">{{ $approvers->count() }}</span>
                                            @endif
                                        </a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Change Schedule Form</a></li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Overtime Form</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <br><br>
                                        <div class="col-lg-12">
                                            @if($approvers->isEmpty())
                                            <div class="alert alert-danger alert-dismissable" role="alert">
                                                You have 0 pending leave form for approval
                                            </div>
                                            @elseif(!$approvers->isEmpty())
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead style="background-color: #f4f4f4;">
                                                    <th>Form ID</th>
                                                    <th>Submitted By</th>
                                                    <th>Leave Purpose</th>
                                                    <th>Form Status</th>
                                                    <th>Date Submitted</th>
                                                    <th>Action</th>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($approvers as $approver)
                                                    <tr>
                                                        <td>{{ $approver->form_user->leave->id }}</td>
                                                        <td>{{ $approver->form_user->user->name }}</td>
                                                        <td>{{ $approver->form_user->leave->leave_purpose }}</td>
                                                        <td><span class="label {{ $approver->status == 'PENDING' ? 'label-danger' : 'label-success' }}" style="font-size: 12px;">{{ $approver->status }}</span></td>
                                                        <td>{{ date('F d, Y', strtotime($approver->form_user->leave->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('approver_show_leave', $approver->form_user->leave->id) }}" class="btn btn-primary btn-sm">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
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
