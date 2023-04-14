<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
{{--       Start Auth Info --}}
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-name">
                    <p class="name">
                        Welcome {{ auth()->user()->name }}
                    </p>
                    <p class="designation">
                        Secretary
                    </p>
                </div>
            </div>
        </li>
{{--        End --}}



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pending-appointments" aria-expanded="false" aria-controls="page-layouts">
                <i class="fa fa-clipboard-list menu-icon"></i>
                <span class="menu-title">
                    Pending Appointments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pending-appointments">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('secretary.dashboard.appointments.home-appointment') }}"> Home Medicine Appointments</a>


                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('secretary.dashboard.appointments.clinic') }}">Clinic Appointments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('secretary.dashboard.appointments.home-care') }}">Home Care Appointments</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#re-appoint" aria-expanded="false" aria-controls="page-layouts">
                <i class="fa fa-clipboard-list menu-icon"></i>
                <span class="menu-title">
                    Re-Appoint </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="re-appoint">
                <ul class="nav flex-column sub-menu">
                     <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('secretary.dashboard.re-appointments.home-appointment') }}">Home Medicine Appointments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('secretary.dashboard.re-appointments.clinic') }}">Clinic Appointments</a></li>

                </ul>
            </div>
        </li>
    </ul>
</nav>
