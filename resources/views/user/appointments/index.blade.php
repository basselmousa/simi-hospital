@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="card-title">{{ $type ?? '' }} Appointments Table</h3>
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

                            @if($appoint->status == 'Done')
                                <button data-toggle="modal" data-target="#add-certificate-modal-{{$appoint->id}}"
                                        class="btn btn-primary ">
                                    <i class="fa fa-plus"></i>
                                    Rate
                                </button>
                            @endif


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
    <script src="{{asset('admin/js/form-addons.js')}}"></script>
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

@push("modals")
    @foreach($appoints as $appoint)
        @if($appoint->status == 'Done')
            @include("user.appointments.rate",["appoint" => $appoint])
        @endif

    @endforeach
@endpush
