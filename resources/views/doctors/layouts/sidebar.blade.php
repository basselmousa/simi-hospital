<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
{{--       Start Auth Info --}}
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{ asset('storage/'.auth('doctor')->user()->image) }}" alt="image"/>
                </div>
                <div class="profile-name">
                    <p class="name">
                        Welcome {{ auth('doctor')->user()->full_name }}
                    </p>
                    <p class="designation">
                        Doctor
                    </p>
                </div>
            </div>
        </li>
{{--        End --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.doctor.reports.index') }}">
                <i class="fa fa-pencil-alt menu-icon"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="fa fa-clipboard-list menu-icon"></i>
                <span class="menu-title">
                    Appointments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('dashboard.doctor.appointments.doctor-home') }}">Home Medicine Appointments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.appointments.doctor-clinic') }}">Clinic Appointments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.appointments.doctor-care') }}">Homeable Care Appointments</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="fa fa-cog menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.dates.index') }}">Dates</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.certificates.index') }}">Certificates</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.homeable.index') }}">Homeable Care</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.doctor.secretary.index') }}">Secretary</a></li>
                </ul>
            </div>
        </li>


    </ul>
</nav>
