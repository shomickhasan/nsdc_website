<!-- =========================================================
* Multibussines Soluation (MBS) - Larave | v1.0
==============================================================
* PHP Version : 8.1
* Laravel Version : 10 (https://laravel.com)
* Created by: 3DEVs IT Ltd.
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright 3DEVs IT LTD.  (https://3-devs.com)

========================================================= -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="3DEVs it LTD">
    <meta name="keywords" content="3Devs it LTD">
    <meta name="author" content="3DEVs it LTD">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}image/favicon.png">
    <link rel="apple-touch-icon" href="{{asset('/')}}image/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}image/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    @if(app()->getLocale() == 'bn')
        <link rel="stylesheet" href="{{ asset('fonts/Nikosh.ttf') }}">
    @else
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    @endif
   

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/swiper/swiper.css" />

    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/select2/select2.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/css/pages/cards-advance.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="{{asset('/')}}custom/css/icon.css" />

    <!-- Custom CSS -->
    @stack('css')

    <!-- Helpers -->
    <style>
       #loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh; /* Full viewport height */
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Ensure it appears above other content */
    }

    .spinner-border {
        width: 4rem !important;
        height: 4rem !important;
    }
    </style>
    <script src="{{asset('/')}}app-assets/vendor/js/helpers.js"></script>
    <script src="{{asset('/')}}app-assets/js/config.js"></script>
</head>