<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index-2.html"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="images/logo-mini.svg" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle"  onclick="event.preventDefault();
                                document.getElementById('secretary-logout-form').submit();
                       ">
                    <i class="fas fa-power-off text-primary"></i>
                    Logout
                </a>

                    <form id="secretary-logout-form" class="d-none" action="{{ route('secretary.logout') }}" method="post">
                        @csrf

                    </form>

            </li>

        </ul>

    </div>
</nav>
