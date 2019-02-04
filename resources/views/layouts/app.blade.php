<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
   
@yield('content')

    <!-- Scripts -->
    <script src="{{ asset('global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/plugins/js.cookie.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

    <script src="{{ asset('global/scripts/app.min.js') }}"></script>
    <!-- <script src="{{ asset('js/login.js') }}"></script> -->

</body>
</html>
