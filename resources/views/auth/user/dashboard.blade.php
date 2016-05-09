@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @include('layouts.user-sidebar')
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
                                <div style="border-radius: 0px;" class="btn btn-sm btn-warning active">All</div>
                                <a href="#" style="border-radius: 0px;" class="btn btn-sm btn-warning">Pending</a>
                                <a href="#" style="border-radius: 0px;" class="btn btn-sm btn-warning">Completed</a>
                                <a href="#" style="border-radius: 0px;" class="btn btn-sm btn-warning">Delayed</a>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-12 col-md-16 col-sm-12 col-xs-12">
                                <div class="alert alert-danger" role="alert">
                                    There are no pending forms so far...
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
