@extends('doctors.layouts.app')
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


    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Homeable Care Table</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-medicine">Add</button>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>

                                <th class="sortStyle">Nurse Name <i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Gender<i class="fa fa-angle-down"></i></th>

                                <th class="sortStyle">Actions<i class="fa fa-angle-down"></i></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <td>{{ $medicine->nurse }}</td>
                                    <td>{{ $medicine->gender }}</td>

                                    <td>
                                        <button class="btn btn-info rounded-circle" data-toggle="modal" data-target="#view-medicine-{{$medicine->id}}"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                            document.getElementById('delete-homeable-form-{{$medicine->id}}').submit();
                                            "><i class="fa fa-trash"></i></button>
                                        <form id="delete-homeable-form-{{$medicine->id}}" method="post" action="{{ route('dashboard.doctor.homeable.delete', $medicine->id) }}"  class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>

                                </tr>
                                @include('doctors.homeable.view',['id' => $medicine->id, 'image' => $medicine->image])

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('doctors.homeable.add')


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
