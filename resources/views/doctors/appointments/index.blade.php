@extends('doctors.layouts.app')
@section('content')

@include("helpers.alerts")
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="card-title">Appointments Table</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Appoint Date</th>
                    <th>User Name</th>

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
                        <td>{{ \Illuminate\Support\Facades\Crypt::decrypt($appoint->user->full_name) }}</td>

                        <td>{{ $appoint->time }}</td>
                        <td>{{ $appoint->status }}</td>
                        <td>{{ $appoint->type }}</td>
                        <td>
                            <button class="btn btn-success rounded-circle"
                                    data-toggle="modal" data-target="#write-report-modal-{{$appoint->id}}"
                            >
                                Write Report
                            </button>
                            @push("modals")
                                @include("doctors.appointments.write-report",["appoint" => $appoint])
                            @endpush
                            <button class="btn btn-info rounded-circle"
                                    data-toggle="modal" data-target="#add-drugs-modal-{{$appoint->id}}"
                            >
                                Add Drugs
                            </button>
                            @push("modals")
                                @include("doctors.appointments.add-drugs",["appoint" => $appoint])
                            @endpush
                            <button class="btn btn-info rounded-circle"
                                    data-toggle="modal" data-target="#add-examination-modal-{{$appoint->id}}"
                            >
                                Add Examination
                            </button>
                            @push("modals")
                                @include("doctors.appointments.add-examinations",["appoint" => $appoint])
                            @endpush
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
