@extends('doctors.layouts.app')
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Congratulation!</h5>
            {{ session('success') }}
        </div>

    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title">Appointments Table</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Appoint Date</th>
                    <th>Doctor Name</th>

                    <th>Appoint Time</th>
                    <th>Appoint Status</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($appoints as $appoint)
                    <tr>
                        <td>{{ $appoint->date }}</td>
                        <td>{{ $appoint->doctor->full_name }}</td>

                        <td>{{ $appoint->time }}</td>
                        <td>{{ $appoint->status }}</td>
                        <td>{{ $appoint->type }}</td>
                        <td>
                            <button class="btn btn-success rounded-circle"
                                    data-toggle="modal" data-target="#write-report-modal-{{$appoint->id}}"
                            >
                                <i class="fa fa-check"></i>
                            </button>
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


                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>

    </script>
    @foreach($errors->all() as $error)
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                text: '{{$error}}'
            });
        </script>
    @endforeach
@endsection
