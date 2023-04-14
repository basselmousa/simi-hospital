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
                    <h1>Nearest Doctors</h1>
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
                  @foreach($nearestDoctors as $nearest)
                        @if(count($nearest->dates) > 0)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                                <div class="card bg-light d-flex flex-fill">

                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $nearest->full_name }}</b></h2>
                                                <p class="text-muted text-sm"><b>About: </b>
                                                    @foreach($nearest->certifications as $certificate)
                                                        {{  ! $loop->last ? $certificate->title . ' /' : $certificate->title }}
                                                    @endforeach
                                                </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $nearest->country }}, {{ $nearest->city }}, Building Number {{ $nearest->building_number }}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ asset('storage/'.$nearest->image) }}" alt="{{ $nearest->full_name . ' Avatar' }}" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">

                                            <a
{{--                                                data-toggle="modal" data-target="#take-appoint-nearest-modal-{{$nearest->id}}"--}}
                                                    href="{{ route('user.doctors.showAppoint', $nearest->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Take Appoint
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $nearestDoctors->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Doctors</h1>
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
                    @foreach($doctors as $doctor)
                        @if(count($doctor->dates) > 0 )
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                                <div class="card bg-light d-flex flex-fill">

                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $doctor->full_name }}</b></h2>
                                                <p class="text-muted text-sm"><b>About: </b>
                                                    @foreach($doctor->certifications as $certificate)
                                                        {{  ! $loop->last ? $certificate->title . '/' : $certificate->title }}
                                                    @endforeach
                                                </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $doctor->country }}, {{ $doctor->city }}, Building Number {{ $doctor->building_number }}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ asset('storage/'.$doctor->image) }}" alt="{{ $doctor->full_name . ' Avatar' }}" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">


                                            <a
{{--                                                data-toggle="modal" data-target="#take-appoint-modal"--}}
                                                    href="{{ route('user.doctors.showAppoint', $doctor->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Take Appoint
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $doctors->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
@endsection
