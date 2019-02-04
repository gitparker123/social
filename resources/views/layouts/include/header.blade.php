@extends('layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">

    <link href="{{ asset('global/plugins/socicon/socicon.css') }}" rel="stylesheet">
    <link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/css/plugins.min.css') }}" rel="stylesheet">

    <link href="{{ asset('metronic/demo/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('/demo/media/img/logo/favicon.ico') }}" />

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection