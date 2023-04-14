<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor </title>

    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}"/>
    <style>
        .invalid-feedback {
            display: block !important;
        }
    </style>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-8 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo w-50 align-content-center">
                            <img src="{{ asset('admin/images/clinic-svgrepo-com.svg') }}" alt="logo">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form action="{{ route('doctors.submitRegisterForm') }}" method="post" class="pt-3"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="firstname" class="form-control form-control"
                                               id="exampleInputUsername1" placeholder="First Name"
                                               value="{{ old('firstname') }}">
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fathername" class="form-control form-control"
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
                                        <input type="text" name="familyname" class="form-control form-control"
                                               id="exampleInputUsername1" placeholder="Family Name"
                                               value="{{ old('familyname') }}">
                                        @error('familyname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                        <input type="password" name="password" class="form-control form-control"
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
                                <div class="col-md-6">
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
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }} >Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
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
                                        <input type="text" name="building_number" class="form-control form-control"
                                               id="exampleInputEmail1"
                                               placeholder="Building Number" value="{{ old('building_number') }}">
                                        @error('building_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" class="form-control form-control"
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

                                        <input type="file" name="image" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled=""
                                                   placeholder="Upload Profile Image">
                                            <span class="input-group-append">
                                              <button class="file-upload-browse btn btn-primary"
                                                      type="button">Upload</button>
                                            </span>
                                        </div>
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
                                Already have an account? <a href="{{ route('doctors.showLoginForm') }}"
                                                            class="text-primary">Login</a>
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
<script src="{{asset('admin/js/file-upload.js')}}"></script>

</body>


</html>
