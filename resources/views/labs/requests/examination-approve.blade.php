<div class="modal fade" id="add-date-{{$drug->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-3">Examination Value</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-certificate-form-{{$drug->id}}" action="{{ route('dashboard.labs.examination.approve',$drug->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername1">Value</label>
                        <input type="text" name="value" value="{{ old("value") }}" class="form-control" id="exampleInputUsername1" placeholder="Name">
                        @error('value')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Greater Value</label>
                        <input type="text" name="greaterValue" value="{{old("greaterValue")}}" class="form-control" id="exampleInputUsername1" placeholder="Title">
                        @error('greaterValue')
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
                            document.getElementById('add-certificate-form-{{$drug->id}}').submit();
                            ">Submit</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

