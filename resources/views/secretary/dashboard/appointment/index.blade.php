@extends('secretary.dashboard.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="card-title">{{ $type }} Appointments Table</h3>
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
                            <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                document.getElementById('delete-appoint-form-{{$appoint->id}}').submit();
                                "><i class="fa fa-trash"></i></button>
                            <form id="delete-appoint-form-{{$appoint->id}}" method="post"
                                  action="{{ route('user.appointments.delete', $appoint->id) }}"
                                  class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                            <button data-toggle="modal" data-target="#add-certificate-modal-{{$appoint->id}}"
                                    class="btn btn-primary ">
                                <i class="fa fa-plus"></i>
                                Change Appointment Status
                            </button>

                          @section("modal")
                                <div class="modal fade" id="add-certificate-modal-{{$appoint->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Change Appointment Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="add-certificate-form-{{$appoint->id}}" action="{{ route('secretary.dashboard.appointments.change-status', $appoint->id) }}"
                                                      method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
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
                                                        document.getElementById('add-certificate-form-{{$appoint->id}}').submit();
                                                        "
                                                >Save changes
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            @endsection
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
