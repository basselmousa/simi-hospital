@extends('pharmacy.layouts.app')
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
                <h4 class="card-title">Prescription Table</h4>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>

                                <th class="sortStyle">Drug Name <i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Drug Price<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Drug Times<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Drug Notes<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Patient Name<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Actions<i class="fa fa-angle-down"></i></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drugsRequests as $drug)
                                <tr>
                                    <td>{{ $drug->drug->name }}</td>
                                    <td>{{ $drug->drug->price }}</td>
                                    <td>{{ $drug->times }}</td>
                                    <td>{{ $drug->note }}</td>
                                    <td>{{ $drug->user->full_name }}</td>
                                    <td>
                                        <button class="btn btn-success rounded-circle" onclick="event.preventDefault();
                                            document.getElementById('delete-appoint-form-{{$drug->id}}').submit();
                                            ">Sell</button>
                                        <form id="delete-appoint-form-{{$drug->id}}" method="post"
                                              action="{{ route('dashboard.pharmacy.prescription.action', $drug->id) }}"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                {{--                                @include('doctors.certificates.view',['id' => $certificate->id, 'image' => $certificate->image])--}}

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
