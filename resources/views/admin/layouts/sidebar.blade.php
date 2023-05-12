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
                    <a href="{{ route('dashboard.admin.admins.index') }}" class="mm-active">
                        <i class="metismenu-icon pe-7s-graph"></i>Admins
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.admin.drugs.index') }}" class="mm-active">
                        <i class="metismenu-icon pe-7s-graph"></i>Drugs
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.admin.company.index') }}" class="mm-active">
                        <i class="metismenu-icon pe-7s-graph"></i>Insurance Companies
                    </a>
                </li>

{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="metismenu-icon pe-7s-way"></i>Doctors--}}
{{--                    </a>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.doctor.appointments.doctor-home') }}" class="mm-active">--}}
{{--                                <i class="metismenu-icon"></i>Pending Doctors--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.doctor.appointments.doctor-clinic') }}">--}}
{{--                                <i class="metismenu-icon"></i>Active Doctors--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="metismenu-icon pe-7s-way"></i>Pharmacies--}}
{{--                    </a>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.doctor.appointments.doctor-home') }}" class="mm-active">--}}
{{--                                <i class="metismenu-icon"></i>Pending Pharmacies--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.doctor.appointments.doctor-clinic') }}">--}}
{{--                                <i class="metismenu-icon"></i>Active Pharmacies--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        --}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="metismenu-icon pe-7s-way"></i>Labs--}}
{{--                    </a>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.doctor.appointments.doctor-home') }}" class="mm-active">--}}
{{--                                <i class="metismenu-icon"></i>Pending Labs--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.doctor.appointments.doctor-clinic') }}">--}}
{{--                                <i class="metismenu-icon"></i>Active Labs--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        --}}
{{--                    </ul>--}}
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
