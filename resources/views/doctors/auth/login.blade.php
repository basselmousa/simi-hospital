<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Dashboard</title>

    <link rel="stylesheet" href="{{asset("admin/vendors/iconfonts/font-awesome/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("admin/vendors/css/vendor.bundle.base.css")}}">
    <link rel="stylesheet" href="{{asset("admin/vendors/css/vendor.bundle.addons.css")}}">

    <link rel="stylesheet" href="{{asset("admin/css/style.css")}}">

    <link rel="shortcut icon" href="{{asset("admin/images/favicon.png")}}" />
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="{{ asset('admin/images/clinic-svgrepo-com.svg') }}" alt="logo">
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3" method="post" action="{{ route('doctors.submitLoginForm') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg"
                                       value="{{ old('email') }}"
                                       id="exampleInputEmail1" placeholder="Username">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
{{--                                <div class="form-check">--}}
{{--                                    <label class="form-check-label text-muted">--}}
{{--                                        <input type="checkbox" class="form-check-input">--}}
{{--                                        Keep me signed in--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="auth-link text-black">Forgot password?</a>--}}
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{ route('doctors.showRegisterForm') }}" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>

<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>

</body>


</html>
