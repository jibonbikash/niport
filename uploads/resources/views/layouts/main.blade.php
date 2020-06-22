<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.themes.annex.style-css')
    @stack('style')
</head>
<body class="fixed-left">
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<div id="wrapper">
@include('layouts.themes.annex.left-sidebar')

    <div class="content-page">
        <div class="content">
            @include('layouts.themes.annex.top-bar')

            <div class="page-content-wrapper ">

                <div class="container-fluid">

{{--                    <div class="row">--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <div class="page-title-box">--}}
{{--                                <div class="btn-group float-right">--}}
{{--                                    <ol class="breadcrumb hide-phone p-0 m-0">--}}
{{--                                        <li class="breadcrumb-item"><a href="#">Annex</a></li>--}}
{{--                                        <li class="breadcrumb-item active">Dashboard</li>--}}
{{--                                    </ol>--}}
{{--                                </div>--}}
{{--                                <h4 class="page-title">Dashboard</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    @yield('content')

                </div><!-- container -->


            </div>

        </div>
        @include('layouts.themes.annex.footer')

    </div>

</div>

@include('layouts.themes.annex.script-js')
@stack('script')

</body>
</html>
