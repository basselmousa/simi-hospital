<div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab-custom">
    <form action="{{ route('dashboard.labs.profile.updateProfile') }}" method="post" class="pt-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control form-control"
                           id="exampleInputUsername1"  placeholder="Full Name" value="{{ old('name') ?? $pharmacy->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="address" class="form-control form-control"
                           id="exampleInputUsername1"  placeholder="Address" value="{{ old('address') ?? $pharmacy->address }}">
                    @error('address')
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
                           placeholder="Email" readonly value="{{ old('email') ?? $pharmacy->email}}">
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
                            <option value="{{ $city }}" {{ (old('city') ?? $pharmacy->city) == $city ? 'selected' : ''   }}>{{ $city }}</option>
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
                    <input type="text" name="building_number" class="form-control form-control"
                           id="exampleInputEmail1"
                           placeholder="Building Number" value="{{ old('building_number') ?? $pharmacy->building_number }}">
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
                           placeholder="Phone Number" value="{{ old('phone_number') ?? $pharmacy->phone_number }}">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="facility_no" class="form-control form-control"
                           id="exampleInputEmail1"
                           placeholder="Facility Number" value="{{ old('facility_no') ?? $pharmacy->facility_no }}">
                    @error('facility_no')
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
                           placeholder="Phone Number" value="{{ old('phone_number') ?? $pharmacy->phone_number }}">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">

                    <input type="file" name="logo" class="file-upload-default" >

                    @error('logo')
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
