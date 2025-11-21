<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Abstract CRM')</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/custome/supercrm.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/datepicker-bs5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap5.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />


    <style>
    .crm-invoice-box {
        width: 100%;
        margin: 0px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
    }

    .crm-header {
        display: flex;
        justify-content: space-between;
        border-bottom: 2px solid #ddd;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .crm-header .crm-header-left h1 {
        margin-bottom: 10px;
        font-size: 24px;
        color: #333;
    }

    .crm-header .crm-header-right h2 {
        font-size: 20px;
        color: #333;
        margin-bottom: 5px;
    }

    .crm-main .crm-client-details {
        margin-bottom: 20px;
    }

    .crm-main .crm-client-details h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #555;
    }

    .crm-invoice-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .crm-invoice-table th, .crm-invoice-table td {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    .crm-invoice-table th {
        background: #f5f5f5;
        color: #333;
        font-weight: bold;
    }

    .crm-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 20px;
        border-top: 2px solid #ddd;
        padding-top: 20px;
    }

    .crm-footer .crm-footer-left h3, .crm-footer .crm-footer-right h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .crm-footer .crm-footer-right p {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .crm-print-btn {
        display: block;
        width: 200px;
        margin: 30px auto;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .crm-print-btn:hover {
        background-color: #45a049;
    }

    @media print {
      
        body {
            visibility: hidden;
        }
        .crm-invoice-box {
            visibility: visible;
        }
        .crm-print-btn {
            display: none;
        }

        @page {
            margin: 0;
        }
        body, html {
            margin: 0;
            padding: 0;
        }
        .crm-invoice-box {
            margin: 0;
            width: 100%;
            box-shadow: none;
        }
    }

</style>

    
    @stack('styles')

  </head>
  <body>
    
    @include('partials.admin-sidebar')
    @include('partials.admin-header')

      @yield('content')

    @include('partials.admin-footer')

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