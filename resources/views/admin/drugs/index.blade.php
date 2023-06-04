@extends('admin.layouts.app')
@section('css')
    <style>
        .invalid-feedback {
            display: block !important;
        }

        .select2, .select2-container, .select2-container--default {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')

    @include("helpers.alerts")
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Drugs Table</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-date">Add</button>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>
                                <th class="sortStyle">Name</th>
                                <th class="sortStyle">Price</th>
                                <th class="sortStyle">Created At</th>
                                <th class="sortStyle">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drugs as $drug)
                                <tr>
                                    <td>{{ $drug->name }}</td>
                                    <td>{{ $drug->price }}</td>
                                    <td>{{ \Carbon\Carbon::make($drug->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit-admin-{{$drug->id}}">Edit
                                        </button>
                                        @push("modals")
                                            @include("admin.drugs.edit",["admin" => $drug])
                                        @endpush
                                        <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                            document.getElementById('delete-appoint-form-{{$drug->id}}').submit();
                                            "><i class="fa fa-trash"></i></button>
                                        <form id="delete-appoint-form-{{$drug->id}}" method="post"
                                              action="{{ route('dashboard.admin.drugs.delete', $drug->id) }}"
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

    @include('admin.drugs.add')
@endsection

@section('js')
    <script src="{{asset('admin/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/js/toastDemo.js')}}"></script>
    <script src="{{asset('admin/js/formpickers.js')}}"></script>
    <script src="{{asset('admin/js/select2.js')}}"></script>
    <script>
        showInfoToast = function (message) {
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
