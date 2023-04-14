<div class="modal fade" id="add-medicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-3">Add Medicine Nurse </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-certificate-form" action="{{ route('dashboard.doctor.homeable.add') }}" method="post" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group">
                            <input type="text" name="nurse" class="form-control form-control"
                                   id="exampleInputUsername1" placeholder="Nurse Name"
                                   value="{{ old('nurse') }}">
                            @error('nurse')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


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

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"
                        onclick="event.preventDefault();
                            document.getElementById('add-certificate-form').submit();
                            ">Submit</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

