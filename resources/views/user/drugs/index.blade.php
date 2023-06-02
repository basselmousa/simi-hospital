@extends('layouts.app')
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
                <h4 class="card-title">Drugs Table</h4>
                <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                        <table id="sortable-table-1" class="table">
                            <thead>
                            <tr>
                                <th class="sortStyle">Doctor Name <i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Pharmacy Name<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Drug Name<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Drug Price<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Times<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Note<i class="fa fa-angle-down"></i></th>
                                <th class="sortStyle">Taken When<i class="fa fa-angle-down"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drugs as $drug)
                                <tr>
                                    <td>{{ $drug->doctor->full_name }}</td>
                                    <td>{{ $drug->pharmacy->name }}</td>
                                    <td>{{ $drug->drug->name }}</td>
                                    <td>{{ $drug->drug->price }}</td>
                                    <td>{{ $drug->times }}</td>
                                    <td>{{ $drug->note }}</td>
                                    <td>{{ \Carbon\Carbon::make($drug->updated_at) }}</td>
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
