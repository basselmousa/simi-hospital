<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody Admin</title>

    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <link rel="shortcut icon" href="http://www.urbanui.com/" />
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
    @yield('css')
</head>
<body>
<div class="container-scroller">

    @include('secretary.dashboard.layouts.navbar')

    <div class="container-fluid page-body-wrapper">


      @include('secretary.dashboard.layouts.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
              @yield('content')
            </div>


        </div>

    </div>

</div>


<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>

<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>

<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/formpickers.js')}}"></script>
@yield('js')
</body>


</html>
