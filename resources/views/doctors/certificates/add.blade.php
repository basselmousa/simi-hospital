<div class="modal fade" id="add-certificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Certificate </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-certificate-form" action="{{ route('dashboard.doctor.certificates.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Certificate Image</label>
                        <input type="file" name="image" class="file-upload-default" >
{{--                        <div class="input-group col-xs-12">--}}
{{--                            <input type="text" class="form-control file-upload-info" disabled=""--}}
{{--                                   placeholder="Upload Profile Image">--}}
{{--                            <span class="input-group-append">--}}
{{--                                  <button class="file-upload-browse btn btn-primary"--}}
{{--                                          type="button">Upload</button>--}}
{{--                                </span>--}}
{{--                        </div>--}}
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Take Date</label>
                        <div id="datepicker-popup" class="input-group date datepicker">
                            <input type="date" name="take_date" class="form-control">
                            <span class="input-group-addon input-group-append border-left">
                                      <span class="far fa-calendar input-group-text"></span>
                                    </span>
                        </div>
                        @error('take_date')
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

