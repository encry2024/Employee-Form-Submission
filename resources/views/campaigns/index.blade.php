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
                                            DEPARTMENTS
                                            <a href="{{ route('create_campaign') }}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Create Campaign</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            @if(count($campaigns) == 0)
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="alert alert-danger" role="alert">
                                                        You have currently no registered campaigns to be viewed.
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Name</th>
                                                                <th>No. of Employee</th>
                                                                <th>No. of Approver</th>
                                                                <th class="text-right">Actions</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($campaigns as $campaign)
                                                                <tr>
                                                                    <td>{{ $campaign->id }}</td>
                                                                    <td>{{ $campaign->name }}</td>
                                                                    <td>{{ count($campaign->users) }}</td>
                                                                    <td>{{ count($campaign->approver_campaign) }}</td>
                                                                    <td class="col-lg-2">
                                                                        <a href="{{ route('show_campaign', $campaign->id) }}" class="btn btn-sm btn-primary float-right">Manage Campaign</a>
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
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- row before layout -->
            </div> <!-- column before row before layout -->
        </div>
    </div>
@stop