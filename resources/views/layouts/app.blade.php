<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NSI :: Employee Form Submission</title>

    @yield('header')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/custom_css/nsi.css">

    <script src="{{ URL::to('/') }}/bootstrap-3.3.6-dist/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/bootstrap-datepicker/js/momentjs.js"></script>
</head>
<body id="app-layout">

    @yield('content')

    <style>
        body {
            font-family: 'Lato';
        }
    </style>

    <!-- JavaScripts -->
    <script src="{{ URL::to('/') }}/bootstrap-3.3.6-dist/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

</body>
</html>
