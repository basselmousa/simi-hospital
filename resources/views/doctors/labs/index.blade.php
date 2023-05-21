@extends('doctors.layouts.app')
@section('css')
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
@endsection
@section('content')

    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Doctor Labs Table</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-certificate">Add</button>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>

                                <th class="sortStyle"> Lab Name <i class="fa fa-angle-down"></i></th>

                                <th class="sortStyle">Actions<i class="fa fa-angle-down"></i></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($labs as $lab)
                                <tr>
                                    <td>{{ $lab->lab->name }}</td>
                                    <td>
                                        <button class="btn btn-info" onclick="event.preventDefault();
                                        document.getElementById('delete-certificate-form-{{$lab->id}}').submit();
                                        ">Delete Lab</button>
                                        <form id="delete-certificate-form-{{$lab->id}}" method="post" action="{{ route('dashboard.doctor.labs.delete', $lab->id) }}"  class="d-none">
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
    @include('doctors.labs.add')
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
