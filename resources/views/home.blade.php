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

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h3>Pending Forms</h3>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="list-group">
                                            <div class="list-group-item bg-info form-title" style="background-color: #f0ad4e; color: white; border-color: #f0ad4e;">
                                            Leave Forms
                                            </div>
                                            @foreach($leaves as $leave)
                                                <a href="{{ route('show_leave', $leave->id) }}" class="list-group-item">
                                                    {{ $leave->leave_purpose }}
                                                    <br>
                                                    <span class="description">{{ $leave->form_user->user->name }}</span>
                                                    <span class="float-right description">{{ date('F d, Y', strtotime($leave->created_at)) }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="list-group">
                                            <div class="list-group-item form-title" style="background-color: #f0ad4e; color: white;">
                                            Change Schedules Forms
                                            </div>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                                            <a href="#" class="list-group-item">Morbi leo risus</a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                                            <a href="#" class="list-group-item">Vestibulum at eros</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="list-group">
                                            <div class="list-group-item form-title" style="background-color: #f0ad4e; color: white;">
                                            Overtime Forms
                                            </div>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                                            <a href="#" class="list-group-item">Morbi leo risus</a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                                            <a href="#" class="list-group-item">Vestibulum at eros</a>
                                        </div>
                                    </div>

                                    {{-- <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Submitted Form</th>
                                                    <th>Date Submitted</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                                <tbody>
                                                @foreach($pending_forms as $pending_form)
                                                <tr>
                                                    <th>{{ $pending_form->id }}</th>
                                                    <th>{{ $pending_form->form_user->user->name }}</th>
                                                    <th>{{ $pending_form->form_user->form->name }}</th>
                                                    <th>{{ date('F d, Y / h:i A', strtotime($pending_form->form_user->created_at)) }}</th>
                                                    <th><a href="{{ route('show_form', $pending_form->id) }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-repeat"></span></a></th>    
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </thead>
                                        </table> --}}
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
