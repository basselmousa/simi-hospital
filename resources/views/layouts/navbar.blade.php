<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
   </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{asset('storage/'.auth()->user()->image)}}" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a href="{{ route('user.profile.index') }}" class="dropdown-item">
                        <i class="fas fa-cog text-primary"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                       onclick="event.preventDefault();
                                document.getElementById('doctor-logout-form').submit();
                       ">
                        <i class="fas fa-power-off text-primary"></i>
                        Logout
                    </a>

                    <form id="doctor-logout-form" class="d-none" action="{{ route('logout') }}" method="post">
                        @csrf

                    </form>
                </div>
            </li>

        </ul>

    </div>
</nav>
