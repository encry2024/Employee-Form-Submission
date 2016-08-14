@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
                        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <br><br>
                            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="{{ route('add_employee', $department->id) }}"><span class="glyphicon glyphicon-pushpin"></span>&nbsp;&nbsp;&nbsp; Add Employee</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('campaigns') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">


                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: white; border-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-radius: 0px 0px 0px 0px; font-size: 22px;">
                                            {{ $department->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ $department->name }}'s Members</th>
                                                            <th>Position</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($department->users as $user)
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->position }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="bg-default">
                                                        <tr>
                                                            <th class="bg-default">{{ $department->name }}'s Approver</th>
                                                            <th class="bg-default">Approver Rank</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($department->approver_campaign as $approver_campaign)
                                                            <tr>
                                                                <td>{{ $approver_campaign->approver->user->name }}</td>
                                                                <td>{{ $approver_campaign->rank }}</td>
                                                            </tr>
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
                </div>
            </div>
        </div>
    </div>

    <script>
        function getApproverId(approver_id, rank) {
            var update_route = "{{ route('update_approver_rank', ":approver_id") }}";
                update_route = update_route.replace(':approver_id', approver_id);
            document.getElementById("update_approver_rank").action = update_route;
            document.getElementById("rank").val = rank;
        }

        $(document).ready(function() {
            $('#user_dropdown').selectize({
                valueField: 'id',
                labelField: 'name',
                searchField: 'name',
                placeholder: '-- Search Employee --',
                create: false,
                onItemAdd: function(value) {
                    document.getElementById('approver').value = value;
                },
                render: {
                    option: function(item, escape) {
                        return '<div>' +
                                '<span class="title">' +
                                '<span class="name">' + item.icon + '<b>' +escape(item.name) + '</b>'+ '</span>' +
                                '</span>' +
                                '<br>' +
                                '<span class="description"><i>' + escape(item.role) + '</i></span>' +
                                '</div>';
                    }
                },
                load: function(query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: "{{ URL::to('/') }}/department/{{ $department->id }}/get_users/" + query,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            dev_name: query,
                        },
                        error: function() {
                            console.log("failed");
                        },
                        success: function(res) {
                            console.log(res);
                            callback(res);
                        }
                    });
                }
            });
        });
    </script>
@stop