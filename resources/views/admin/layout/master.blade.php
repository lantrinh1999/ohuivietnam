<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-type" content="Cache-Control:no-cache,max-age=0">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/iCheck.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/merge.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/_all-skins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/skin-linh.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/custom_layout_admin.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/plugins/sweet-alert/sweetalert.css')}}">

        <style>
            tr:hover .div-action {
                display: block;
                visibility: visible;
            }

            .dataTables_length {
                float: left;
            }

            .pull-right {
                margin-right: 5px;
            }

            .label-success {
                color: #fff;
                background-color: #28a745;
            }

            .label-secondary {
                color: #fff;
                background-color: #6c757d;
            }

            .label-danger {
                color: #fff;
                background-color: #d9534f;
            }

            .label-primary {
                color: #fff;
                background-color: #007bff;
            }

            input:read-only {
                background-color: white !important;
                color: #555;
            }

            input:read-only:hover {
                cursor: default;
            }

            .content-wrapper {
                min-height: 96vh !important;
            }

            html {
                min-height: 100vh !important;
            }

            body {
                min-height: 100vh !important;
            }

        </style>
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @yield('style')
    </head>
    <div id="fb-root"></div>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6"></script>

    <body class="hold-transition skin-linh sidebar-mini fixed">
        <div class="wrapper">
            @include('admin.layout.header')
            @include('admin.layout.sidebar')
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section style="" class="content-header">
                    <h1>
                        @yield('title')
                        <small> @yield('action') </small>
                    </h1>
                    @if (!empty(Request::segment(2)))
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                        @if (!empty(Request::segment(2)))
                        <li><a href="#"> @yield('title') </a></li>
                        @if (!empty(Request::segment(3)))
                        <li class="active"> @yield('action') </li>
                        @endif
                        @endif

                    </ol>
                    @endif

                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                {{-- <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.18
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
                reserved. --}}
            </footer>
        </div>

<script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/fastclick.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
        <script scr="https://adminlte.io/themes/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script scr="https://adminlte.io/themes/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script scr="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/plugins/repeater.js') }}"></script>
        @include('ckfinder::setup')
        {{-- <script type="text/javascript" src="{{ asset('/js/ckfinder/ckfinder.js')}}"></script> --}}
        <script>
            CKFinder.config({
                connectorPath: '/ckfinder/connector'
            });

        </script>

        @yield('js')
    </body>

</html>
