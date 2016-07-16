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
                            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="{{ route('add_users', $department->id) }}"><span class="glyphicon glyphicon-pushpin"></span>&nbsp;&nbsp;&nbsp; Assign Users</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('campaigns') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>
                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        <br><br>
                        @if(Session::has('message'))
                            <div class="row">
                                <div class="alert alert-success" role="alert">
                                    <span class="glyphicon glyphicon-ok"></span> {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-header">
                                    <h2><span class="glyphicon glyphicon-flag"></span> {{ $department->name }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-default">
                                            <tr>
                                                <th class="bg-default">{{ $department->name }}'s Approver</th>
                                                <th class="bg-default">Approver Rank</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($department->approver_campaign as $approver_campaign)
                                                <tr>
                                                    <td>{{ $approver_campaign->approver->user->name }}</td>
                                                    <td>{{ $approver_campaign->rank }}</td>
                                                    <td><button class="btn btn-default btn-sm" data-toggle="modal" data-target="#change_approver_rank"
                                                        onclick="getApproverId({{ $approver_campaign->approver->id, $approver_campaign->rank }})">Update Rank</button></td>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="change_approver_rank">
        <form id="update_approver_rank" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('patch') }}

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Approver Rank</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
                            <label for="inputRank" class="col-sm-3 col-xs-12 control-label text-info">Rank</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="number" class="form-control" name="rank" id="rank">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </form>
    </div><!-- /.modal -->

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