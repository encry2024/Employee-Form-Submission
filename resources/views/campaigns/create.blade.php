@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.link-sidebar')

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                <br><br>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(Session::has('message'))
                        <div class="row">
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <a href="{{ route('campaigns') }}" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="page-header">
                                    <h3>Create Campaign/Department</h3>
                                </div>

                                <div class="col-lg-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('post_campaign') }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="InputCampaignName" class="col-sm-2 col-xs-12 control-label text-info">Campaign/Department:</label>
                                            <div class="col-sm-4 col-xs-12">
                                                <input type="string" name="name" class="form-control" id="InputCampaignName">

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> Create Campaign</button>
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
@stop