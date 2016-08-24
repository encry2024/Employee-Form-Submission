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
                            <li class="nav-item"><a class="nav-link" href="{{ route('show_approver_profile', $user->id) }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;&nbsp; Back</a></li>
                        </ul>
                    </nav>

                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                        @if(Session::has('message'))
                            <br><br>
                            <div class="row">
                                <div class="alert alert-success" role="alert" style="margin-bottom: -2rem;">
                                    <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;{{ Session::get('message') }}
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-default" style="margin-top: 4rem;">
                                        <div class="panel-heading" style="background-color: white; border-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-radius: 0px 0px 0px 0px; font-size: 22px;">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                            EDIT {{ strtoupper($user->name) }} PROFILE
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-10 col-lg-push-1">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <form class="form-horizontal" action="{{ route('post_edit_approver', $user) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                    <div class="form-group ">
                                                        <label for="inputName" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name="name" id="inputName" placeholder="Approver Name" value="{{ $user->name }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email"
                                                                   value="{{ $user->email }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-12 col-lg-push-3">
                                                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;&nbsp;Update</button>
                                                        </div>
                                                    </div>
                                                </form>
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
    </script>
@stop