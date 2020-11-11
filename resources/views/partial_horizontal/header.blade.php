<?php
$menu = Request::segment(1);
?>
<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="javascript:void(0)">
                        <img src="{{ asset('app-assets/images/logo/logo-unesa.png') }}" style="width: 36px;">
                        <h2 class="brand-text mb-0">Inovasi Unesa</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <?php
                if($menu == "about_us"){
                ?>
                    <li class="dropdown nav-item"><a class="nav-link" href="{{ route('main_product.index') }}"><i class="feather icon-home"></i><span data-i18n="Home">Home</span></a>
                    </li>
                    <li class="dropdown nav-item active"><a class="nav-link" href="{{ route('about_us.index') }}"><i class="fa fa-building-o"></i><span data-i18n="AboutUs">About Us</span></a>
                    </li>
                    <li class="dropdown nav-item"><a class="nav-link" href="{{ route('about_us.contact_us') }}"><i class="feather icon-phone"></i><span data-i18n="ContactUs">Contact Us</span></a>
                    </li>
                <?php
                } else if($menu == "contact_us"){
                ?>
                    <li class="dropdown nav-item"><a class="nav-link" href="{{ route('main_product.index') }}"><i class="feather icon-home"></i><span data-i18n="Home">Home</span></a>
                    </li>
                    <li class="dropdown nav-item"><a class="nav-link" href="{{ route('about_us.index') }}"><i class="fa fa-building-o"></i><span data-i18n="AboutUs">About Us</span></a>
                    </li>
                    <li class="dropdown nav-item active"><a class="nav-link" href="{{ route('about_us.contact_us') }}"><i class="feather icon-phone"></i><span data-i18n="ContactUs">Contact Us</span></a>
                    </li>
                <?php
                } else{
                ?>
                    <li class="dropdown nav-item active"><a class="nav-link" href="{{ route('main_product.index') }}"><i class="feather icon-home"></i><span data-i18n="Home">Home</span></a>
                    </li>
                    <li class="dropdown nav-item"><a class="nav-link" href="{{ route('about_us.index') }}"><i class="fa fa-building-o"></i><span data-i18n="AboutUs">About Us</span></a>
                    </li>
                    <li class="dropdown nav-item"><a class="nav-link" href="{{ route('about_us.contact_us') }}"><i class="feather icon-phone"></i><span data-i18n="ContactUs">Contact Us</span></a>
                    </li>
                <?php
                } 
                ?>
            </ul>
        </div>

        <div class="nav navbar-nav float-right" style="width: 300px;" id="nav_logo">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 text-right">
                        <img src="{{ asset('app-assets/images/logo/logo-unesa.png') }}" style="width: 36px;">
                    </div>
                    <div class="col-md-8 p-0">
                        <h4 class="brand-text mb-0" style="color: #3f9ce8; font-weight: 600; padding-top: 8px;">Inovasi Unesa</h4>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Main Menu-->