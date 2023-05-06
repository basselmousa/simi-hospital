<div class="app-sidebar sidebar-shadow">
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
    {{--    <div class="app-header__mobile-menu">--}}
    {{--        <div>--}}
    {{--            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">--}}
    {{--<span class="hamburger-box">--}}
    {{--<span class="hamburger-inner"></span>--}}
    {{--</span>--}}
    {{--            </button>--}}
    {{--        </div>--}}

{{--    <div class="app-header__menu">--}}
{{--            <span>--}}
{{--            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">--}}
{{--            <span class="btn-icon-wrapper">--}}
{{--            <i class="fa fa-ellipsis-v fa-w-6"></i>--}}
{{--            </span>--}}
{{--            </button>--}}
{{--            </span>--}}
{{--    </div>--}}
    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu metismenu">

                <br>
                <br>
                <li>
                    <a href="{{ route('dashboard.pharmacy.drugs.index') }}" class="mm-active">
                        <i class="metismenu-icon pe-7s-graph"></i>Drugs
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-way"></i>Rochetta
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.pharmacy.prescription.pending') }}" class="mm-active">
                                <i class="metismenu-icon"></i>Pending Rochetta
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.pharmacy.prescription.approved') }}">
                                <i class="metismenu-icon"></i>Approved Rochetta
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-way"></i>Settings
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.pharmacy.profile.profile') }}" class="mm-active">
                                <i class="metismenu-icon"></i>Profile
                            </a>
                        </li>

                    </ul>
                </li>
{{--                <li>--}}
{{--                    <a href="widgets-chart-boxes-3.html">--}}
{{--                        <i class="metismenu-icon pe-7s-ball"></i>Chart Boxes 3--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="widgets-profile-boxes.html">--}}
{{--                        <i class="metismenu-icon pe-7s-id"></i>Profile Boxes--}}
{{--                    </a>--}}
{{--                </li>--}}

            </ul>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 307px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 112px;"></div>
        </div>
    </div>
</div>





{{--<nav class="sidebar sidebar-offcanvas" id="sidebar">--}}
{{--    <ul class="nav">--}}
{{--       Start Auth Info --}}
{{--        <li class="nav-item nav-profile">--}}
{{--            <div class="nav-link">--}}
{{--                <div class="profile-image">--}}
{{--                    <img src="{{ asset('storage/'.auth('doctor')->user()->image) }}" alt="image"/>--}}
{{--                </div>--}}
{{--                <div class="profile-name">--}}
{{--                    <p class="name">--}}
{{--                        Welcome {{ auth('doctor')->user()->full_name }}--}}
{{--                    </p>--}}
{{--                    <p class="designation">--}}
{{--                        Doctor--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        End --}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('dashboard.doctor.reports.index') }}">--}}
{{--                <i class="fa fa-pencil-alt menu-icon"></i>--}}
{{--                <span class="menu-title">Reports</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">--}}
{{--                <i class="fa fa-clipboard-list menu-icon"></i>--}}
{{--                <span class="menu-title">--}}
{{--                    Appointments</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="page-layouts">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('dashboard.doctor.appointments.doctor-home') }}">Home Medicine Appointments</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.appointments.doctor-clinic') }}">Clinic Appointments</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.appointments.doctor-care') }}">Homeable Care Appointments</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item d-none d-lg-block">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">--}}
{{--                <i class="fa fa-cog menu-icon"></i>--}}
{{--                <span class="menu-title">Settings</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="sidebar-layouts">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.dates.index') }}">Dates</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.certificates.index') }}">Certificates</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.homeable.index') }}">Homeable Care</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.secretary.index') }}">Secretary</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}


{{--    </ul>--}}
{{--</nav>--}}
