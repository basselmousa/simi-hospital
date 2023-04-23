@extends('doctors.layouts.app')
@section('css')
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
@endsection
@section('content')

    @if(count($certificates) ==0)
        <div class="alert alert-warning" role="alert">
            You don't have any certificates yet. <br>
            Before uploading some certificates <br>
             * You are not allowed to make any thing <br>
             * And you will not appear in any search result <br>
            Sorry for that.
        </div>

    @endif

    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Certification Table</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-certificate">Add</button>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>

                                <th class="sortStyle"> Title <i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Take Date<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Certificate Image<i class="fa fa-angle-down"></i></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($certificates as $certificate)
                                <tr>
                                    <td>{{ $certificate->title }}</td>
                                    <td>{{ $certificate->take_date }}</td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#view-certificate-{{$certificate->id}}">View Image</button>
                                        <button class="btn btn-info" onclick="event.preventDefault();
                                        document.getElementById('delete-certificate-form-{{$certificate->id}}').submit();
                                        ">Delete Certificate</button>
                                        <form id="delete-certificate-form-{{$certificate->id}}" method="post" action="{{ route('dashboard.doctor.certificates.delete', $certificate->id) }}"  class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>

                                </tr>
                                       @section("modal")
                                           @include('doctors.certificates.view',['id' => $certificate->id, 'image' => $certificate->image])
                                       @endsection
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
    @include('doctors.certificates.add')
@endsection
@section('js')
{{--    <script src="{{asset('admin/js/file-upload.js')}}"></script>--}}
{{--    <script src="{{asset('admin/js/toastDemo.js')}}"></script>--}}
{{--    <script src="{{asset('admin/js/formpickers.js')}}"></script>--}}
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
