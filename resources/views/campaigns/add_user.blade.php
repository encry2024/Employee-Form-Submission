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
                            <li class="nav-item"><a class="nav-link" href="{{ route('show_campaign', $department->id) }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-header">
                                    <h2><span class="glyphicon glyphicon-user"></span> Add Employee
                                        <button class="btn btn-success pull-right" onclick="document.add_user.submit();"><span class="glyphicon glyphicon-plus-sign"></span> Assign Users</button>
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
                                    <form action="{{ route('post_add_user', $department->id) }}" name="add_user" method="POST">
                                        {{ csrf_field() }}

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Employee ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th class="text-right">Employee's Role</th>
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
                                                            <label class="radio-inline pull-right">
                                                                <input type="radio" name="user_role-{{ $user->id }}" id="inlineCheckbox1" value="agent-{{ $user->id }}" > Agent
                                                            </label>
                                                            <label class="radio-inline pull-right">
                                                                <input type="radio" name="user_role-{{ $user->id }}" id="inlineCheckbox2" value="approver-{{ $user->id }}"> Approver &nbsp;&nbsp;&nbsp;
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </div>
                </div> <!-- row before layout -->
            </div> <!-- column before row before layout -->
        </div>
    </div>
@stop