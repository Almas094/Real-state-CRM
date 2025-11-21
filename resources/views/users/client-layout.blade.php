<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Clients : Abstract CRM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Abstract CRM">
    <meta name="keywords" content="Abstract CRM">
    <meta name="author" content="Abstract CRM">
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custome/partials.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custome/masters.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custome/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custome/formvalidation.css') }}" />
    

    @stack('styles')
  </head>
  <body>
    
    @include('partials.client-sidebar')
    @include('partials.client-header')


    @yield('content')


    @include('partials.client-footer')
    @include('partials.client-settings-panel')

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('assets/js/custome/partials.js') }}"></script>
    <script src="{{ asset('assets/js/custome/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/custome/formvalidation.js') }}"></script>
    
    @stack('scripts')
  </body>
</html>