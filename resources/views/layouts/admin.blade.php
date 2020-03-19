<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.themes.metricaladmin.style-css')
    @stack('style')
</head>
<body>
<div class="page-container">
    @include('layouts.themes.metricaladmin.left-sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="search-form">
                <form action="#" method="GET">
                    <div class="input-group">
                        <input class="form-control search-input" name="search" placeholder="Type something..." type="text"/>
                        <span class="input-group-btn">
                        <span id="close-search"><i class="ion-ios-close-empty"></i></span>
                        </span>
                    </div>
                </form>
            </div>
            <!--================================-->
            <!-- Page Header  Start -->
            <!--================================-->
            <nav class="navbar navbar-expand-lg">
                <ul class="list-inline list-unstyled mg-r-20">
                    <!-- Mobile Toggle and Logo -->
                    <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                    <!-- PC Toggle and Logo -->
                    <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                </ul>
                <!--================================-->
                <!-- Mega Menu Start -->
                <!--================================-->
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <!-- Features -->

                        <!-- Technology -->

                        <!-- Ecommerce -->

                    </ul>
                </div>
                <!--/ Mega Menu End-->
                <!--/ Brand and Logo End -->
                <!--================================-->
                <!-- Header Right Start -->
                <!--================================-->
                <div class="header-right pull-right">
                    <ul class="list-inline justify-content-end">

                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown">
                            <a  href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="select-profile">Hi, {{ Auth::user()->name }}!</span><img src="assets/images/avatar-placeholder.png" class="img-fluid wd-35 ht-35 rounded-circle" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                                <div class="user-profile-area">
                                    <div class="user-profile-heading">
                                        <div class="profile-thumbnail">
                                            <img src="https://via.placeholder.com/100x100" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="profile-text">
                                            <h6>{{ Auth::user()->name }}</h6>

                                        </div>
                                    </div>
                                    <a href="" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My profile</a>
                                    <a href="" class="dropdown-item"><i class="icon-settings" aria-hidden="true"></i> settings</a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon-power" aria-hidden="true"></i>   {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </li>
                        <!-- Profile Dropdown End -->
                        <!--================================-->
                        <!-- Setting Sidebar Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown hidden-xs">
                            <a class="settings-icon" id="settingSidebarTrigger" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings tx-16"></i>
                            </a>
                        </li>
                        <!--/ Setting Sidebar End -->
                    </ul>
                </div>
                <!--/ Header Right End -->
            </nav>
        </div>
        <div class="page-inner">

            <div id="main-wrapper">


                @yield('content')

            </div>
            @include('layouts.themes.metricaladmin.footer')
        </div>
    </div>


</div>
@include('layouts.themes.metricaladmin.script-js')
@stack('script')

</body>
</html>
