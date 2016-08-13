@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

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
                                            USERS
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if(count($users) == 0)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-danger" role="alert">
                                        You have currently no registered developers right now
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-radius: 0px 0px 0px 0px;">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Employee ID</th>
                                                            <th>Name</th>
                                                            <th>Role</th>
                                                            <th>Email</th>
                                                            <th class="text-right">Actions</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($users as $user)
                                                            <tr>
                                                                <td>{{ $user->id }}</td>
                                                                <td>{{ $user->employee_id }}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ ucfirst($user->type) }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                @if($user->type == 'approver')
                                                                    <td>
                                                                        <a href="{{ route('show_approver_profile', $user->id) }}" class="btn btn-primary float-right">View Profile</a>
                                                                    </td>
                                                                @elseif($user->type == 'agent')
                                                                    <td>
                                                                        <a href="{{ route('show_agent_profile', $user->id) }}" class="btn btn-primary float-right">View Profile</a>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div> <!-- row before layout -->
            </div> <!-- column before row before layout -->
        </div>
    </div>
@stop