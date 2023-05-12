@extends('admin.layouts.app')
@section('css')
    <style>
        .invalid-feedback{
            display: block !important;
        }
        .select2, .select2-container, .select2-container--default  {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')

    @include("helpers.alerts")
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Admins Table</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-date">Add</button>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead style="scroll-behavior: smooth">
                            <tr>
                                <th class="sortStyle">Name</th>
                                <th class="sortStyle">Username</th>
                                <th class="sortStyle">Coverage Ratio</th>
                                <th class="sortStyle">Email</th>
                                <th class="sortStyle">Facility Number</th>
                                <th class="sortStyle">Country</th>
                                <th class="sortStyle">Address</th>
                                <th class="sortStyle">Building Number</th>
                                <th class="sortStyle">Phone Number</th>
                                <th class="sortStyle">Actions</th>
                            </tr>
                            </thead>
                            <tbody style="scroll-behavior: smooth">
                            @foreach($companies as $admin)
                                <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->coverage_ratio }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->facility_no }}</td>
                                    <td>{{ $admin->country }}</td>
                                    <td>{{ $admin->address }}</td>
                                    <td>{{ $admin->building_number }}</td>
                                    <td>{{ $admin->phone_number }}</td>
                                     <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit-admin-{{$admin->id}}">Edit</button>
                                        @section("modal-view")
                                            @include("admin.insurance-companies.edit",["admin" => $admin])
                                            @endsection
                                        <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                            document.getElementById('delete-appoint-form-{{$admin->id}}').submit();
                                            "><i class="fa fa-trash"></i></button>
                                        <form id="delete-appoint-form-{{$admin->id}}" method="post"
                                              action="{{ route('dashboard.admin.company.delete', $admin->id) }}"
                                              class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>

                                </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section("modal")

    @include('admin.insurance-companies.add')
@endsection

@section('js')
    <script src="{{asset('admin/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/js/toastDemo.js')}}"></script>
    <script src="{{asset('admin/js/formpickers.js')}}"></script>
    <script src="{{asset('admin/js/select2.js')}}"></script>
    <script>
        showInfoToast = function(message) {
            'use strict';
            resetToastPosition();
            $.toast({
                heading: 'Warning',
                text: message,
                showHideTransition: 'slide',
                icon: 'warning',
                loaderBg: '#57c7d4',
                position: 'top-right'
            })
        };
    </script>
    @if(!$errors->isEmpty())
        @foreach($errors->all() as $error)
            <script>
                showInfoToast('{{ $error }}');
            </script>
            {{--            <button type="button" class="btn btn-info btn-fw" onload="" >Info</button>--}}
        @endforeach

    @endif
@endsection
