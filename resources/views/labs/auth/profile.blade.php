@extends('labs.layouts.app')
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

    <div class="page-header">
        <h3 class="page-title">
            Profile
        </h3>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{ asset('storage/'.$pharmacy->logo) }}" width="250" alt="profile"
                                     class="img-lg rounded-circle mb-3"/>

                            </div>


                            <div class="py-4">
                                <p class="clearfix">
                          <span class="float-left">
                            Phone Number
                          </span>
                                    <span class="float-right text-muted">
                            {{ $pharmacy->phone_number }}
                          </span>
                                </p>

                                <p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
                                    <span class="float-right text-muted">
                            {{ $pharmacy->email }}
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Building Number
                          </span>
                                    <span class="float-right text-muted">
                            {{ $pharmacy->building_number }}
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Country
                          </span>
                                    <span class="float-right text-muted">
                            {{ $pharmacy->country }}
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            City
                          </span>
                                    <span class="float-right text-muted">
                            {{ $pharmacy->city }}
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Address
                          </span>
                                    <span class="float-right text-muted">
                            {{ $pharmacy->address }}
                          </span>
                                </p>
                            </div>

                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>{{ $pharmacy->name }}</h3>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10 mx-auto">
                                            <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="pills-home-tab-custom"
                                                       data-toggle="pill" href="#pills-profile" role="tab"
                                                       aria-controls="pills-home" aria-selected="true">
                                                        Update Profile
                                                    </a>
                                                </li>


                                            </ul>
                                            <div class="tab-content tab-content-custom-pill"
                                                 id="pills-tabContent-custom">
                                                @include('labs.auth.profile-files.profile_form')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
    <script src="{{asset('admin/js/profile-demo.js')}}">

    </script>
    <script src="{{asset('admin/js/tabs.js')}}"></script>
{{--    <script src="{{asset('admin/js/alerts.js')}}"></script>--}}
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
        showSwal = function(type,url) {
            'use strict';
           if (type === 'view-certificate') {
                swal({
                    content: {
                        element: "img",
                        attributes: {
                            src: url,
                            alt: "Certificate image",
                            class: 'rounded mw-100'
                        },
                    },
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                    }
                })
            }
        }

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
