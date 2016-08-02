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
                                            @if($approverForms[0]->approver_forms_count != 0)
                                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="tab-badge">{{ $approverForms[0]->approver_forms_count }}</span>
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
                                                    @foreach($approverForms as $approverForm)
                                                        @foreach($approverForm->approver_forms as $leave_form)
                                                        <tr>
                                                            <td>{{ $leave_form->form_user->leave->id }}</td>
                                                            <td>{{ $leave_form->form_user->user->name }}</td>
                                                            <td>{{ $leave_form->form_user->leave->leave_purpose }}</td>
                                                            <td><span class="label {{ $leave_form->status == 'PENDING' ? 'label-danger' : 'label-success' }}" style="font-size: 12px;">{{ $leave_form->status }}</span></td>
                                                            <td>{{ date('F d, Y', strtotime($leave_form->form_user->leave->created_at)) }}</td>
                                                            <td>
                                                                <a href="{{ route('approver_show_leave', $leave_form->form_user->leave->id) }}" class="btn btn-primary btn-sm">View</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
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
