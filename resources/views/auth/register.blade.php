<!doctype html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Apr 2023 10:25:34 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register Boxed - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset("admin/assets/css/main.d810cf0ae7f39f28f336.css")}}" rel="stylesheet">
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-premium-dark" style="height: 120vh!important;">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title">
                                    <h4 class="mt-2">
                                        <div>Welcome,</div>
                                        <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                                    </h4>
                                </h5>
                                <div class="divider row"></div>
                                <div class="form-row">
                                    <form action="{{ route('register') }}" method="post" class="pt-3"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="firstname"
                                                           class="form-control form-control"
                                                           id="exampleInputUsername1" placeholder="First Name"
                                                           value="{{ old('firstname') }}">
                                                    @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <input type="text" name="fathername"
                                                           class="form-control form-control"
                                                           id="exampleInputUsername1" placeholder="Father Name"
                                                           value="{{ old('fathername') }}">


                                                    @error('fathername')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="familyname"
                                                           class="form-control form-control"
                                                           id="exampleInputUsername1" placeholder="Family Name"
                                                           value="{{ old('familyname') }}">
                                                    @error('familyname')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control form-control"
                                                           id="exampleInputEmail1"
                                                           placeholder="Email" value="{{ old('email') }}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password"
                                                           class="form-control form-control"
                                                           id="exampleInputPassword1" autocomplete="new-password"
                                                           placeholder="Password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation"
                                                           class="form-control form-control"
                                                           id="exampleInputPassword1" autocomplete="new-password"
                                                           placeholder="Confirm Password">

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control form-control-lg" name="country"
                                                            id="exampleFormControlSelect2">
                                                        <option selected value="Jordan">Jordan</option>

                                                    </select>
                                                    @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control form-control-lg" name="city"
                                                            id="exampleFormControlSelect2">
                                                        <option disabled selected>City</option>
                                                        @foreach(\App\Http\Cities::$cities as $city)
                                                            <option
                                                                value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control form-control-lg" name="gender"
                                                            id="exampleFormControlSelect2">
                                                        <option disabled selected>Gender</option>
                                                        <option
                                                            value="male" {{ old('gender') == 'male' ? 'selected' : '' }} >
                                                            Male
                                                        </option>
                                                        <option
                                                            value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                            Female
                                                        </option>

                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="ssn" class="form-control form-control"
                                                           id="exampleInputEmail1"
                                                           placeholder="SSN" value="{{ old('ssn') }}">
                                                    @error('ssn')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="phone_number"
                                                           class="form-control form-control"
                                                           id="exampleInputEmail1"
                                                           placeholder="Phone Number" value="{{ old('phone_number') }}">
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control form-control-lg" name="company"
                                                            id="exampleFormControlSelect2">
                                                        <option value="0" selected>Insurance Company</option>
                                                        @foreach($companies as $company)
                                                            <option
                                                                value="{{ $company->id }}" {{ old('company') == $company ? 'selected' : '' }}>{{ $company->name }}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('company')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <input type="file" name="image" class="file-upload-default">


                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-3">
                                            <button type="submit"
                                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            >SIGN UP
                                            </button>
                                        </div>
                                        <div class="text-center mt-4 font-weight-light">
                                            Already have an account? <a href="{{ route('login') }}"
                                                                        class="text-primary">Login</a>
                                        </div>
                                    </form>
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="position-relative form-group">--}}
{{--                                            <input name="email" id="exampleEmail" placeholder="Email here..."--}}
{{--                                                   type="email" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="position-relative form-group">--}}
{{--                                            <input name="text" id="exampleName" placeholder="Name here..." type="text"--}}
{{--                                                   class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="position-relative form-group">--}}
{{--                                            <input name="password" id="examplePassword" placeholder="Password here..."--}}
{{--                                                   type="password" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="position-relative form-group">--}}
{{--                                            <input name="passwordrep" id="examplePasswordRep"--}}
{{--                                                   placeholder="Repeat Password here..." type="password"--}}
{{--                                                   class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>


                            </div>

                        </div>
                    </div>
{{--                    <div class="text-center text-white opacity-8 mt-3">Copyright © ArchitectUI 2019</div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset("admin/assets/scripts/main.d810cf0ae7f39f28f336.js")}}"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Apr 2023 10:25:34 GMT -->
</html>
