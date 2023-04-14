@extends('layouts.app')
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Congratulation!</h5>
            {{ session('success') }}
        </div>

    @endif

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Nurses</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    @foreach($appoints as $appoint)

                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                            <div class="card bg-light d-flex flex-fill">

                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $appoint->nurse }}</b></h2>
                                            <p class="text-muted text-sm"><b>About: </b>
{{--                                                @foreach($doctor as $certificate)--}}
{{--                                                    {{  ! $loop->last ? $certificate->title . '/' : $certificate->title }}--}}
{{--                                                @endforeach--}}
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span>
                                                    Address: {{ $appoint->country }}, {{ $appoint->city }}, Building
                                                    Number {{ $appoint->building_number }}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                    Phone #: + 800 - 12 12 23 52
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset('storage/'.$appoint->image) }}"
                                                 alt="{{ $appoint->full_name . ' Avatar' }}"
                                                 class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">


                                        <a
                                            href="{{ route('user.doctors.show-appoint', $appoint->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Take Appoint
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $appoints->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
@endsection
