<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Medical Clinics </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('home/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('home/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('home/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('home/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medical Clinics - v4.7.1
    * Template URL: https://bootstrapmade.com/Medical Clinics-free-medical-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
{{--<div id="topbar" class="d-flex align-items-center fixed-top">--}}
{{--    <div class="container d-flex justify-content-between">--}}

{{--        <div class="d-none d-lg-flex social-links align-items-center">--}}
{{--            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>--}}
{{--            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>--}}
{{--            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>--}}
{{--            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="/">Medical Clinics</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About Us</a></li>

                <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                {{--                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>--}}
                {{--                    <ul>--}}
                {{--                        <li><a href="#">Drop Down 1</a></li>--}}
                {{--                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>--}}
                {{--                            <ul>--}}
                {{--                                <li><a href="#">Deep Drop Down 1</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 2</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 3</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 4</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 5</a></li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">Drop Down 2</a></li>--}}
                {{--                        <li><a href="#">Drop Down 3</a></li>--}}
                {{--                        <li><a href="#">Drop Down 4</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}




                {{--                @if (Route::has('login'))--}}

{{--                @auth("pharmacy")--}}

                    @if(\Illuminate\Support\Facades\Auth::guard("web")->check() /*== "web"*/)
                        <li>
                            <a href="{{ route('user.profile.index') }}"
                               class="nav-link scrollto text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        </li>
                    @elseif(\Illuminate\Support\Facades\Auth::guard("doctor")->check() /*== "doctor"*/)
                        <li>
                            <a href="{{ route('dashboard.doctor.profile.profile') }}"
                               class="nav-link scrollto text-sm text-gray-700 dark:text-gray-500 underline">Home
                            </a>
                        </li>
                    @elseif(\Illuminate\Support\Facades\Auth::guard("secretary")->check() /*== "secretary"*/)
                        <li>
                            <a href="{{ route('dashboard.appointments.clinic') }}"
                               class="nav-link scrollto text-sm text-gray-700 dark:text-gray-500 underline">Home
                            </a>
                        </li>
                    @elseif(\Illuminate\Support\Facades\Auth::guard("pharmacy")->check() /*== "pharmacy"*/)
                        <li>
                            <a href="{{ route('dashboard.pharmacy.profile.profile') }}"
                               class="nav-link scrollto text-sm text-gray-700 dark:text-gray-500 underline">Home
                            </a>
                        </li>
                    @elseif(\Illuminate\Support\Facades\Auth::guard("lab")->check() /*== "lab"*/)
                        <li>
                            <a href="{{ route('dashboard.labs.profile.profile') }}"
                               class="nav-link scrollto text-sm text-gray-700 dark:text-gray-500 underline">Home
                            </a>
                        </li>
                    @elseif(Illuminate\Support\Facades\Auth::guard("admin")->check() /*== "admin"*/)
                        <li>
                            <a href="{{ route('dashboard.admin.index') }}"
                               class="nav-link scrollto text-sm text-gray-700 dark:text-gray-500 underline">Home
                            </a>
                        </li>

                    @else
                        {{--                    <a href="{{ route('login') }}" class="appointment-btn scrollto">Log in</a>--}}
                        <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route("login") }}">Patient</a></li>

                                <li><a href="{{ route("doctors.showLoginForm") }}">Doctor</a></li>
                                <li><a href="{{ route("secretary.login") }}">Secretary</a></li>
                                <li><a href="{{ route("pharmacy.showLoginForm") }}">Pharmacy</a></li>
                                <li><a href="{{ route("labs.showLoginForm") }}">Lab</a></li>
                                <li><a href="{{ route("admins.showLoginForm") }}">Admin</a></li>
                            </ul>
                        </li>
                        {{--                    @if (Route::has('register'))--}}
                        {{--                        <a href="{{ route('register') }}" class="appointment-btn scrollto">Register</a>--}}
                        {{--                    @endif--}}
                    @endif
{{--                @endauth--}}

                {{--                @endif--}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        {{--        <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>--}}

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    {{--    <div class="container">--}}
    {{--        <h1>Welcome to Medical Clinics</h1>--}}
    {{--        <a href="#about" class="btn-get-started scrollto">Get Started</a>--}}
    {{--    </div>--}}
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3>Why Choose Medical Clinics?</h3>
                        <p>
                            Medical clinic It is a web application that represents a platform for collecting medical
                            clinics in one place according to the geographical area, which includes all medical
                            specialties and doctors. The application also allows booking advance appointments in the
                            clinic or through the home examination service.

                            In addition, it enables the auditor to save his medical information in a computerized way,
                            to know the doctors close to the area of residence, and to evaluate the doctors according to
                            his clinic through the auditors.

                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Book Appointments </h4>
                                    <p>Through the medical clinic or through the home visit.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Patient </h4>
                                    <p>Follow up on his medical file with the specialist doctor</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Doctor's</h4>
                                    <p>Know the patient's condition, diagnose it, and follow up on his file</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">

            <div class="row">
                <div
                    class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
                </div>

                <div
                    class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3>For one's pleasure is to shun the consequences of something</h3>
                    <p>There is a special section in the clinic that contains the specialized doctor and the secretary
                        so that when booking an appointment through the patient, the reservation arrives at the
                        secretariat and the practical secretary follows. As for the doctor, the doctor receives an
                        appointment, reviews the patient’s file, sets the appropriate diagnosis, sets the price, and
                        ends the appointment.</p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="count-box">
                        <i class="fas fa-user-md"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $all_doctors }}"
                              data-purecounter-duration="1" class="purecounter"></span>
                        <p>Doctors</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="fa fa-user-injured"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $all_patients }}"
                              data-purecounter-duration="1" class="purecounter"></span>
                        <p>Patients</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fas fa-location-arrow"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $all_appointments }}"
                              data-purecounter-duration="1" class="purecounter"></span>
                        <p>Number of patients treated</p>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Counts Section -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Top Rated Doctors</h2>
                <p>Fortunately he suffers great pains. The consequences of his avoidance had to do with some. May they
                    be the main game. Anyone whom anyone has any desire for. And no one who hinders receives them
                    otherwise. It is because he shuns the services which he's been in the advantage of.
                </p>
            </div>

            <div class="row">

                @foreach($doctors as $doctor)
                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('storage/'.$doctor->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>{{ $doctor->full_name }}</h4>
                                @foreach($doctor->certifications as $certificate)
                                    <span>{{ $certificate->title }}</span>

                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Doctors Section -->


</main><!-- End #main -->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('home/assets/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('home/assets/js/main.js')}}"></script>

</body>

</html>


