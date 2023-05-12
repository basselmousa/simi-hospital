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
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>

        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   class="p-0 btn">
{{--                                    isset(auth("admin")->user()->image)? "storage".auth("doctor")->user()->image : --}}
                                    <img width="42" class="rounded-circle"
                                         src="{{asset("admin/assets/images/avatars/1.jpg")}}"
                                         alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                 style="background-image: url({{ asset('admin/assets/images/dropdown-header/city3.jpg') }});"></div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <img width="42" class="rounded-circle"
                                                                 src="assets/images/avatars/1.jpg" alt="">
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div
                                                                class="widget-heading">{{ auth("admin")->user()->username }}</div>
                                                            <div class="widget-subheading opacity-8">
                                                                {{--                                                                Discription--}}
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <button
                                                                onclick=" event.preventDefault();
                                                                          document.getElementById('doctor-logout-form').submit();  "
                                                                class="btn-pill btn-shadow btn-shine btn btn-focus">
                                                                Logout
                                                            </button >
                                                            <form id="doctor-logout-form" class="d-none"
                                                                  action="{{ route('admins.logout') }}" method="post">
                                                                @csrf

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{--<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">--}}
{{--    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">--}}
{{--    </div>--}}
{{--    <div class="navbar-menu-wrapper d-flex align-items-stretch">--}}
{{--        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">--}}
{{--            <span class="fas fa-bars"></span>--}}
{{--        </button>--}}

{{--        <ul class="navbar-nav navbar-nav-right">--}}


{{--            <li class="nav-item nav-profile dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">--}}
{{--                    <img src="{{asset('storage/'.auth()->user()->image)}}" alt="profile"/>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">--}}
{{--                    <a href="{{ route('dashboard.doctor.profile.profile') }}" class="dropdown-item">--}}
{{--                        <i class="fas fa-cog text-primary"></i>--}}
{{--                        Profile--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                document.getElementById('doctor-logout-form').submit();--}}
{{--                       ">--}}
{{--                        <i class="fas fa-power-off text-primary"></i>--}}
{{--                        Logout--}}
{{--                    </a>--}}

{{--                    <form id="doctor-logout-form" class="d-none" action="{{ route('doctors.logout') }}" method="post">--}}
{{--                        @csrf--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--        </ul>--}}

{{--    </div>--}}
{{--</nav>--}}
