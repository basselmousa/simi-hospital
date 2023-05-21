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
    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu metismenu">
                {{--       Start Auth Info --}}
                <br>
                <br>

                {{--        End --}}

                <li>
                    <a class="mm-active" href="{{ route('user.reports.index') }}">
                        <i class="metismenu-icon"></i>
                        <span class="menu-title">Reports</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="mm-active" href="{{ route('user.doctors.index') }}">
                        <i class="metismenu-icon"></i>
                        <span class="menu-title">Medical Doctors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="mm-active" href="{{ route('user.doctors.care') }}">
                        <i class="metismenu-icon"></i>
                        <span class="menu-title">Homeable Care</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="mm-active" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                       aria-controls="page-layouts">
                        <i class="metismenu-icon"></i>
                        <span class="menu-title">
                    Appointments</span>
                       <i class="metismenu-icon"></i>
                    </a>
                    <div class="collapse" id="page-layouts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item d-none d-lg-block"><a class="mm-active"
                                                                      href="{{ route('user.appointments.pending') }}">Pending
                                    Appointments</a></li>
                            <li class="nav-item d-none d-lg-block"><a class="mm-active"
                                                                      href="{{ route('user.appointments.home') }}">Home
                                    Medicine Appointments</a></li>
                            <li class="nav-item"><a class="mm-active" href="{{ route('user.appointments.clinic') }}">Clinic
                                    Appointments</a></li>
                            <li class="nav-item"><a class="mm-active" href="{{ route('user.appointments.care') }}">Home
                                    Care Appointments</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="mm-active" href="{{ route('user.profile.index') }}">
                        <i class="metismenu-icon"></i>
                        <span class="menu-title">Profile</span>

                    </a>

                </li>


            </ul>

        </div>
    </div>
</div>
