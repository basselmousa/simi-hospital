<div class="modal fade" id="write-report-modal-{{$appoint->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Appointment Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="write-report-form-{{$appoint->id}}" action="{{ route('dashboard.doctor.appointments.write-report', $appoint->id) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Prescription</label>
                        <textarea class="form-control" name="prescription" rows="3" placeholder="Enter Prescription"></textarea>
                        @error('prescription')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Recommendation</label>
                        <textarea class="form-control" name="recommendation" rows="3" placeholder="Enter Recommendation"></textarea>
                        @error('recommendation')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Status</label>
                        <select name="status" class="form-control">

                            @foreach(\App\Http\AppointmentConfigs::$statuses as $status)
                                <option value="{{$status}}">{{ $status }}</option>
                            @endforeach

                        </select>
                        @error('status')
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
                                                        document.getElementById('write-report-form-{{$appoint->id}}').submit();
                                                        "
                >Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
