@extends('layouts.app')

@section('content')

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
<link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">

<link href="{{ asset('global/plugins/socicon/socicon.css') }}" rel="stylesheet">
<link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet">
<link href="{{ asset('global/css/plugins.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<body class="reset_password">
    <div class="content">
        <h2 class="bold text-center">Reset your password</h2><br>
        <form class="login-form" action="{{ route('password.request') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <div class="form-group form-md-line-input form-md-floating-label has-info">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}">
                <label for="email">Email</label>
            </div>
            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <div class="form-group form-md-line-input form-md-floating-label has-info">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                <label for="password">Password</label>
            </div>
            <div class="form-group form-md-line-input form-md-floating-label has-info">
                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation">
                <label for="password-confirm">Password Confirm</label>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg mt-ladda-btn ladda-button btn-circle btn-block">Reset Password</button>
            </div>
        </form>
        <div class="text-center register-link"><h4>Back to <a href="{{ route('login') }}" class="text-success"><strong>Login!</strong></a></h4></div>
    </div>
@endsection
