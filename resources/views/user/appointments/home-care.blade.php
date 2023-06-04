@extends('layouts.app')
@section('content')

    @include("helpers.alerts")
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title">Homeable Care Appointments Table</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Appoint Date</th>
                    <th>Nurse Name</th>
                    <th>Doctor Name</th>
                    <th>Period</th>
                    <th>Appoint Status</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($appoints as $appoint)
                    <tr>
                        <td>{{ $appoint->date }}</td>
                        <td>{{ $appoint->medicine->nurse }}</td>
                        <td>{{ $appoint->medicine->doctor->full_name }}</td>
                        <td>{{ $appoint->period }}</td>
                        <td>{{ $appoint->status }}</td>
                        <td>{{ $appoint->price ?? 'Not defined' }}</td>
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
                             @if($appoint->status == 'Waiting-For-User-Acceptance')
                                <button class="btn btn-success " onclick="event.preventDefault();
                                    document.getElementById('accept-appoint-form-{{$appoint->id}}').submit();
                                    "><i class="fa fa-trash"></i> Accept Appoint</button>
                                <form id="accept-appoint-form-{{$appoint->id}}" method="post"
                                      action="{{ route('user.appointments.care.accept', $appoint->id) }}"
                                      class="d-none">
                                    @method('PUT')
                                    @csrf
                                </form>
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
