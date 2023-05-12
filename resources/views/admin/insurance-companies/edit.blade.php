<div class="modal fade" id="edit-admin-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-3">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-admin-form-{{$admin->id}}" action="{{ route('dashboard.admin.company.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" value="{{old("name") ?? $admin->name}}" name="name" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" value="{{ old("username") ?? $admin->username }}" disabled name="username" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="email" name="email" value="{{ old("email") ?? $admin->email }}" disabled class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Facility Number</label>
                            <input type="text" name="facility_no" value="{{ old("facility_no") ?? $admin->facility_no }}" disabled class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('facility_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Coverage Ratio</label>
                            <input type="text" name="coverage_ratio" value="{{ old("coverage_ratio") ?? $admin->coverage_ratio }}" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('coverage_ratio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
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
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Address</label>
                            <input type="text" name="address" value="{{ old("address") ?? $admin->address }}" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Building Number</label>
                            <input type="text" name="building_number" value="{{ old("building_number") ?? $admin->building_number }}" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('building_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="exampleInputUsername1">Phone Number</label>
                            <input type="text" name="phone_number" value="{{ old("phone_number") ?? $admin->phone_number }}" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6 col-md-6">
                            <label>Logo</label>
                            <input type="file" name="logo" class="file-upload-default">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>




                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"
                        onclick="event.preventDefault();
                            document.getElementById('edit-admin-form-{{$admin->id}}').submit();
                            ">Submit</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

