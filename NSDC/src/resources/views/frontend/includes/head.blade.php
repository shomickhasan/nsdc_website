<!-- =========================================================
* Project Name: Brac Otithi
* Content Managment System - Laravel | v1.0
==============================================================
* PHP Version : 8.2
* Laravel Version : 10 (https://laravel.com)
* Developed by :   Shomick Hasan.  (https://3-devs.com)

========================================================= -->

<head>
    <style>
        .header-lower {
           background: #242F6F !important;
        }

        .header-style-three .header-lower {
         padding-right: 0px;
         border-bottom: 0px solid rgba(255, 255, 255, 0.1);
        }

        button.btn.theme-btn.btn-style-two.text-center:hover {
         background-color: #F57A1C !important;
         }

        button.btn.theme-btn.btn-style-two.text-center {
        transition: background-color 0.3s ease !important;
        }

        .header_two {
            position: relative;
            margin: 0 auto !important;
        }

        /* Main Menu UL */
        .nav-outer .main-menu ul.navigation {
            display: flex;         /* Make menu horizontal */
            align-items: center;
            gap: 50px;             /* Space between each li */
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* Menu Links Styling */
        .nav-outer .main-menu ul.navigation li a {
            padding: 10px 0;
        }




    </style>

    @stack('css')
    <meta charset="utf-8">
    <title>@yield('ftitle')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('/')}}frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}frontend/css/style.css?v=38.6" rel="stylesheet">
    <link href="{{asset('/')}}frontend/css/professional-style.css?v=1.0" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ isset($site->fabicon_icon) && $site->fabicon_icon ? Storage::url($site->fabicon_icon) : asset('image/fev_icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ isset($site->fabicon_icon) && $site->fabicon_icon ? Storage::url($site->fabicon_icon) : asset('image/fev_icon.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1177331284046630');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1177331284046630&ev=PageView&noscript=1"
        />
    </noscript>
   @yield('meta_tag')
</head>
