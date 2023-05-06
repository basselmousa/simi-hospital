<div class="modal fade" id="add-date" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-3">Add Date </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-certificate-form" action="{{ route('dashboard.doctor.dates.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Type</label>
                        <select name="type" class="form-control">

                            @foreach(\App\Http\AppointmentConfigs::$types as $type)
                                <option value="{{$type}}">{{ $type }}</option>
                            @endforeach

                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Day</label>
                       <div class="row">
                         <div class="col-12">
                             <select name="day[]" multiple="multiple" class="multiselect-dropdown form-control">
                                 @foreach(\App\Http\AppointmentConfigs::$days as $day)

                                     <option value="{{ $day }}">{{ $day }}</option>

                                 @endforeach

                             </select>
                         </div>
                       </div>
                        @error('day')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Start time</label>
                        <div class="input-group date" id="timepicker-example" data-target-input="nearest">
                            <div class="input-group" data-target="#timepicker-example" data-toggle="datetimepicker">
                                <input type="time" name="start_time" class="form-control datetimepicker-input" data-target="#timepicker-example">
                                <div class="input-group-addon input-group-append"><i class="far fa-clock input-group-text"></i></div>
                            </div>
                        </div>
                        @error('start_time')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">End time</label>
                        <div class="input-group date" id="timepicker-example-1" data-target-input="nearest">
                            <div class="input-group" data-target="#timepicker-example-1" data-toggle="datetimepicker">
                                <input type="time" name="end_time" class="form-control datetimepicker-input" data-target="#timepicker-example-1">
                                <div class="input-group-addon input-group-append"><i class="far fa-clock input-group-text"></i></div>
                            </div>
                        </div>
                        @error('end_time')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputUsername1" placeholder="Title">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"
                        onclick="event.preventDefault();
                            document.getElementById('add-certificate-form').submit();
                            ">Submit</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

