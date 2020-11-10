<?php
$menu = Request::segment(1);
?>
<!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0)"><i class="ficon feather icon-menu"></i></a></li>
                            </ul>
                            
                        </div>
                        <ul class="nav navbar-nav float-right">

                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                            
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{session('nama')}}</span><span class="user-status">Available</span></div><span><img class="round" src="{{ URL::asset('app-assets/images/logo/user-default.jpg') }}" alt="avatar" height="40" width="40"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('settings.edit_profile') }}"><i class="feather icon-user"></i> Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('settings.change_password') }}"><i class="feather icon-settings"></i> Change Password</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('login.logout')}}"><i class="feather icon-power"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <ul class="main-search-list-defaultlist-other-list d-none">
            <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                    <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
                </a></li>
        </ul>
    <!-- END: Header-->
    
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="javascript:void(0)">
                            <img src="{{ asset('app-assets/images/logo/logo-unesa.png') }}" style="width: 36px;">
                            <h2 class="brand-text mb-0">Inovasi Unesa</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <?php
                    if($menu == "users"){
                        ?>
                        <li class="nav-item"><a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
                        <li class=" navigation-header"><span>Apps</span></li>
                        <li class=" nav-item active"><a href="{{ route('users.index') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Users">Users</span></a></li>
                        <li class=" nav-item"><a href="{{ route('category.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Category">Category</span></a></li>
                        <li class=" nav-item"><a href="{{ route('product.index') }}"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Product">Product</span></a></li>
                        <li class=" nav-item"><a href="{{ route('slider.index') }}"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Product">Slider</span></a></li>
                        <?php
                    }else if($menu == "category"){
                        ?>
                        <li class="nav-item"><a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
                        <li class=" navigation-header"><span>Apps</span></li>
                        <li class=" nav-item"><a href="{{ route('users.index') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Users">Users</span></a></li>
                        <li class=" nav-item active"><a href="{{ route('category.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Category">Category</span></a></li>
                        <li class=" nav-item"><a href="{{ route('product.index') }}"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Product">Product</span></a></li>
                        <li class=" nav-item"><a href="{{ route('slider.index') }}"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Product">Slider</span></a></li>
                        <?php
                    }else if($menu == "product"){
                        ?>
                        <li class="nav-item"><a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
                        <li class=" navigation-header"><span>Apps</span></li>
                        <li class=" nav-item"><a href="{{ route('users.index') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Users">Users</span></a></li>
                        <li class=" nav-item"><a href="{{ route('category.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Category">Category</span></a></li>
                        <li class=" nav-item active"><a href="{{ route('product.index') }}"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Product">Product</span></a></li>
                        <li class=" nav-item"><a href="{{ route('slider.index') }}"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Product">Slider</span></a></li>
                        <?php
                    }else if($menu == "slider"){
                        ?>
                        <li class="nav-item"><a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
                        <li class=" navigation-header"><span>Apps</span></li>
                        <li class=" nav-item"><a href="{{ route('users.index') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Users">Users</span></a></li>
                        <li class=" nav-item"><a href="{{ route('category.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Category">Category</span></a></li>
                        <li class=" nav-item"><a href="{{ route('product.index') }}"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Product">Product</span></a></li>
                        <li class=" nav-item active"><a href="{{ route('slider.index') }}"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Product">Slider</span></a></li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item active"><a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
                        <li class=" navigation-header"><span>Apps</span></li>
                        <li class=" nav-item"><a href="{{ route('users.index') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Users">Users</span></a></li>
                        <li class=" nav-item"><a href="{{ route('category.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Category">Category</span></a></li>
                        <li class=" nav-item"><a href="{{ route('product.index') }}"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Product">Product</span></a></li>
                        <li class=" nav-item"><a href="{{ route('slider.index') }}"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Product">Slider</span></a></li>
                        <?php
                    }
                    ?>
                    

                </ul>
            </div>
        </div>
    <!-- END: Main Menu-->