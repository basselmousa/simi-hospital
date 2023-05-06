@extends('labs.layouts.app')
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

    @if(count($examinations) ==0)
        <div class="alert alert-warning" role="alert">
            You don't have any Medical Examination yet. <br>
            Before insert some Medical Examination tests <br>
            * You will not appear in any search result <br>
            Sorry for that.
        </div>

    @endif
@include("helpers.alerts")
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Medical Examinations Table</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-date">Add</button>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>

                                <th class="sortStyle">Lab Name <i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Test Name <i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Test Price<i class="fa fa-angle-down"></i></th>
{{--                                <th class="sortStyle">End Time<i class="fa fa-angle-down"></i></th>--}}
{{--                                <th class="sortStyle">Price<i class="fa fa-angle-down"></i></th>--}}
                                <th class="sortStyle">Actions<i class="fa fa-angle-down"></i></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($examinations as $examination)
                                <tr>
                                    <td>{{ $examination->lab->name }}</td>
                                    <td>{{ $examination->name }}</td>
                                    <td>{{ $examination->price }}</td>
{{--                                    <td>{{ $examination->end_time }}</td>--}}
{{--                                    <td>{{ $examination->price }}</td>--}}
                                    <td>
                                        <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                            document.getElementById('delete-appoint-form-{{$examination->id}}').submit();
                                            "><i class="fa fa-trash"></i></button>
                                        <form id="delete-appoint-form-{{$examination->id}}" method="post"
                                              action="{{ route('dashboard.doctor.dates.delete', $examination->id) }}"
                                              class="d-none">
                                            @method('DELETE')
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
@section("modal")

    @include('labs.examinations.add')
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
