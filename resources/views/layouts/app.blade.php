<!doctype html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Apr 2023 10:25:34 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register Boxed - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset("admin/assets/css/main.d810cf0ae7f39f28f336.css")}}" rel="stylesheet">
    @yield('css')
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    {{--    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">--}}
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        @include('layouts.navbar')
    </div>
    <div class="app-main">
        @include('layouts.sidebar')

        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')

            </div>
        </div>
    </div>
    {{--        <div class="container-fluid page-body-wrapper">--}}


    {{--            @include('doctors.layouts.sidebar')--}}

    {{--        <div class="main-panel">--}}
    {{--            <div class="content-wrapper">--}}
    {{--               --}}
    {{--            </div>--}}


</div>

{{--    </div>--}}

</div>

<script type="text/javascript" src="{{asset("admin/assets/scripts/main.d810cf0ae7f39f28f336.js")}}"></script>

@yield('js')
@yield("modal-view")
@yield("modal")
</body>


</html>
