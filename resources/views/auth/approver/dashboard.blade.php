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
                                            <div class="list-group-item bg-info form-title" style="background-color: #f5f5f5; border-color: #ddd;">
                                            Leave Forms
                                            </div>
                                            @foreach($approvers as $approver)
                                                @foreach($approver->approver_forms as $pending_forms)
                                                <a href="{{ route('show_leave', $pending_forms->form_user->leave->id) }}" class="list-group-item">
                                                    {{ $pending_forms->form_user->leave->leave_purpose }}
                                                    <br>
                                                    <span class="description">{{ $pending_forms->form_user->user->name }}</span>
                                                    <span class="float-right description">{{ date('F d, Y', strtotime($pending_forms->form_user->leave->created_at)) }}</span>
                                                </a>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="list-group">
                                            <div class="list-group-item form-title" style="background-color: #f5f5f5; border-color: #ddd;">
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
                                            <div class="list-group-item form-title" style="background-color: #f5f5f5; border-color: #ddd;">
                                            Overtime Forms
                                            </div>
                                            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                                            <a href="#" class="list-group-item">Morbi leo risus</a>
                                            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                                            <a href="#" class="list-group-item">Vestibulum at eros</a>
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
