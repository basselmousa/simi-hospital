<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
{{--       Start Auth Info --}}
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="image"/>
                </div>
                <div class="profile-name">
                    <p class="name">
                        Welcome {{ auth()->user()->full_name }}
                    </p>
                    <p class="designation">
                        Patient
                    </p>
                </div>
            </div>
        </li>
{{--        End --}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.reports.index') }}">
                <i class="fa fa-pencil-alt menu-icon"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.doctors.index') }}">
                <i class="fa fa-pencil-alt menu-icon"></i>
                <span class="menu-title">Medical Doctors</span>
            </a>
        </li>   <li class="nav-item">
            <a class="nav-link" href="{{ route('user.doctors.care') }}">
                <i class="fa fa-pencil-alt menu-icon"></i>
                <span class="menu-title">Homeable Care</span>
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
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('user.appointments.pending') }}">Pending Appointments</a></li>
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('user.appointments.home') }}">Home Medicine Appointments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('user.appointments.clinic') }}">Clinic Appointments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('user.appointments.care') }}">Home Care Appointments</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link"  href="{{ route('user.profile.index') }}">
                <i class="fa fa-cog menu-icon"></i>
                <span class="menu-title">Profile</span>

            </a>

        </li>


    </ul>
</nav>
