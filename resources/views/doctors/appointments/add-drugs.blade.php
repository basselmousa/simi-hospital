<div class="modal fade" id="add-drugs-modal-{{$appoint->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Drugs </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-drug-form-{{$appoint->id}}" action="{{ route('dashboard.doctor.appointments.add-drug', $appoint->id) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="exampleInputUsername1">Drugs</label>
                        <select name="drug" class="form-control">
                            <option selected value="0" disabled>Select Drug</option>
                            @foreach($drugs as $drug)
                                <option value="{{$drug->id}}">{{ $drug->name }}</option>
                            @endforeach

                        </select>
                        @error('drug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Prescription</label>
                        <input class="form-control" type="text" name="times" placeholder="Enter Drug Take Time">
                        @error('times')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Prescription</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Enter Notes"></textarea>
                        @error('notes')
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
                        document.getElementById('add-drug-form-{{$appoint->id}}').submit();
                        "
                >Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
