@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reappoint to {{ $appoint->user->full_name }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="take-appoint-form" action="{{  route('secretary.dashboard.re-appointments.reappoint-post',['appoint' => $appoint->id,'doctor' =>$appoint->doctor_id ,'user' => $appoint->user_id ,'type'=>$type] ) }}"
                  method="post" >
                @csrf
                <div class="form-group">
                    <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" name="date" class="form-control">
                        <span class="input-group-addon input-group-append border-left">
                                      <span class="far fa-calendar input-group-text"></span>
                                    </span>
                    </div>
                    @error('date')

                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="bootstrap-timepicker">
                    <div class="form-group">


{{--                        <div class="input-group date"  id="timepicker" data-target-input="nearest">--}}
{{--                            <input type="text" name="time" value="{{ old('time') }}" class="form-control datetimepicker-input" data-target="#timepicker" placeholder="Appoint Time">--}}
{{--                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">--}}
{{--                                <div class="input-group-text"><i class="far fa-clock"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="input-group date" id="timepicker-example" data-target-input="nearest">
                            <div class="input-group" data-target="#timepicker-example" data-toggle="datetimepicker">
                                <input type="text" name="time" value="{{ old('time') }}"  class="form-control datetimepicker-input" data-target="#timepicker-example">
                                <div class="input-group-addon input-group-append"><i class="far fa-clock input-group-text"></i></div>
                            </div>
                        </div>
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
                <div class="form-group">
                    <select name="type" class="custom-select">
                            <option value="{{ $type }}" {{ old('type')   == $type ? 'selected' : '' }} > {{$type}}</option>
                    </select>
                    @error('type')
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
