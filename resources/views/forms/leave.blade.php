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
                            <li class="nav-item"><a class="nav-link" href="{{ route('user_profile') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <br><br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Leave Request Form</h2>
                            </div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop