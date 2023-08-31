<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/backend/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/backend/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}" />
    <!-- NProgress -->
    <link href="{{ asset('assets/backend/css/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/backend/css/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/backend/css/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ asset('assets/backend/css/pnotify/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/pnotify/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/pnotify/pnotify.nonblock.css') }}" rel="stylesheet">

    <!-- DataTable CSS -->
    <link href="{{ asset('assets/backend/css/datatable/datatables.net-bs/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/datatable/datatables.net-responsive-bs/responsive.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/backend/css/custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/backend/css/backend.style.css') }}" rel="stylesheet">

    <style>
        label.error {
            color: red;
            font-size: 12px;
            margin-top: 8px;
        }
    </style>
    <!-- jQuery -->
    <script src="{{ asset('assets/backend/js/jquery/jquery.min.js') }}"></script>

    <!-- Validator JS -->
    <script src="{{ asset('assets/backend/js/validator/multifield.js') }}"></script>
    <script src="{{ asset('assets/backend/js/validator/validator.js') }}"></script>

</head>
@include('admin.layouts.partial.sidebar')
@include('admin.layouts.partial.topnav')
