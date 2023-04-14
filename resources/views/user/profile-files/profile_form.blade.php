<div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab-custom">
    <form action="{{ route('user.profile.update') }}" method="post" class="pt-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control form-control"
                           id="exampleInputUsername1"  placeholder="First Name" value="{{ old('firstname') ?? $names[0] }}">
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
                           id="exampleInputUsername1" placeholder="Father Name" value="{{ old('fathername') ?? $names[1] }}">

                </div>
                @error('fathername')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="familyname" class="form-control form-control"
                           id="exampleInputUsername1" placeholder="Family Name" value="{{ old('familyname') ?? $names[2] }}">
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
                           placeholder="Email" readonly value="{{ old('email') ?? $user->email}}">
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
                    <select class="form-control form-control-lg"  name="country"
                            id="exampleFormControlSelect2">
                        <option selected  value="Jordan">Jordan</option>

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
                            <option value="{{ $city }}" {{ (old('city') ?? $user->city) == $city ? 'selected' : ''   }}>{{ $city }}</option>
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
                        <option value="male" {{ (old('gender') ?? $user->gender ) == 'male' ? 'selected' : '' }} >Male</option>
                        <option value="female" {{ (old('gender') ?? $user->gender ) == 'female' ? 'selected' : '' }}>Female</option>

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
                           placeholder="SSN" value="{{ old('ssn') ?? $user->ssn }}">
                    @error('ssn')
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
                           placeholder="Phone Number" value="{{ old('phone_number') ?? $user->phone_number }}">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">

                    <input type="file" name="image" class="file-upload-default" >
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
            >Update
            </button>
        </div>

    </form>

</div>
