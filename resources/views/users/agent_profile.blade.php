@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" style="background-color: #565656;">
                        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-weight: 100px; font-size: 17px;">
                            <br><br>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('edit_user', $user->id) }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Edit User</a></li>
                            <li class="nav-item" style="background-color: #d9534f !important;"><a class="nav-link" href="{{ route('edit_user', $user->id) }}"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp; Deactivate User</a></li>
                        </ul>
                    </nav>

                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-header">
                                    <h2><span class="glyphicon glyphicon-user"></span> {{ $user->name }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>

                    </div>
                </div> <!-- row before layout -->
            </div> <!-- column before row before layout -->
        </div>
    </div>
@stop