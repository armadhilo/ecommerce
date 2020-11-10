<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Inovasi Unesa">
    <meta name="keywords" content="Inovasi unesa">
    <meta name="author" content="INOVASIUNESA">
    <title>Inovasi Unesa</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/logo/logo-unesa.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/logo/logo-unesa.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/swiper.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/noui-slider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce-shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce-details.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        /* .horizontal-menu.navbar-floating:not(.blank-page) .app-content{
            padding-top: 0px !important;
        } */
        .horizontal-menu .horizontal-menu-wrapper{
            top: 0px;
        }
        .horizontal-menu.navbar-floating:not(.blank-page) .app-content{
            padding-top: 6.35rem;
        }
        
        @media screen and (max-width: 1200px) {
            div#nav_logo{
                display: none !important;
            }
        }

    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar ecommerce-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">
    @include('partial_horizontal.header')
    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('partial_horizontal.footer')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/wNumb.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-shop.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-details.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/number-input.js') }}"></script>
    <!-- END: Page JS-->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js')

</body>
<!-- END: Body-->

</html>