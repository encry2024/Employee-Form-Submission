@extends('layouts.app')

@section('content')
<a href="{{route('user_home')}}">Return to Homepage</a>

<h1 class="text-danger">Unauthorized Access to Admin Page!</h1>
@stop