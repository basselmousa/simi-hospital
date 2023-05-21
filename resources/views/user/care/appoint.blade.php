@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Book At {{ $medicine->nurse }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="take-appoint-form-{{$medicine->id}}"
                  action="{{ route('user.doctors.appoint-care', $medicine->id) }}"
                  method="post">
                @csrf
                <div class="form-group">
                    <label>From Date</label>
                    <div id="datepicker-popup" class="input-group date datepicker">

                        <input type="date" name="date" class="form-control" placeholder="From Date">
                        {{--                        <span class="input-group-addon input-group-append border-left">--}}
                        {{--                                      <span class="far fa-calendar input-group-text"></span>--}}
                        {{--                                    </span>--}}
                    </div>
                    @error('date')

                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>To Date </label>
                    <div id="datepicker-popup-1" class="input-group date datepicker">

                        <input type="date" name="period" class="form-control" placeholder="To Date">
                        {{--                        <span class="input-group-addon input-group-append border-left">--}}
                        {{--                                      <span class="far fa-calendar input-group-text"></span>--}}
                        {{--                                    </span>--}}
                    </div>
                    @error('period')

                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>

        </div>
    </section>
@endsection
