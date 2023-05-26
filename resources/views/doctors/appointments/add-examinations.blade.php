<div class="modal fade" id="add-examination-modal-{{$appoint->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Examinations</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-examination-form-{{$appoint->id}}" action="{{ route('dashboard.doctor.appointments.add-examination', $appoint->id) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Examinations</label>
                        <select name="examination" class="form-control">
                            <option selected value="0" disabled>Select Examination</option>
                            @foreach($examinations as $examination)
                                <option value="{{$examination->id}}">{{ $examination->name }}</option>
                            @endforeach

                        </select>
                        @error('examination')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                        onclick="event.preventDefault();
                        document.getElementById('add-examination-form-{{$appoint->id}}').submit();
                        "
                >Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
