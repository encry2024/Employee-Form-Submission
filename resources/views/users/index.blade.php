@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                @include('layouts.link-sidebar')
                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="page-header">
                                <h2><span class="glyphicon glyphicon-user"></span> Users
                                    <a href="{{ route('create_user') }}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Create Account</a>
                                </h2>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Employee ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->employee_id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div> <!-- row before layout -->
        </div> <!-- column before row before layout -->
    </div>
@stop