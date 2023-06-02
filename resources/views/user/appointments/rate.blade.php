{{--@prepend("modals")--}}


<div class="modal fade" id="add-certificate-modal-{{$appoint->id}}"
     style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rate Appointment</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-certificate-form-{{$appoint->id}}"
                      action="{{ route('user.rate', $appoint->doctor_id) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="br-wrapper br-theme-css-stars">
                        <select id="css-stars" style="display: none;" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
{{--                        <div class="br-widget">--}}
{{--                            <a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current">--}}

{{--                            </a>--}}
{{--                            <a href="#" data-rating-value="2" data-rating-text="2" class="">--}}

{{--                            </a>--}}
{{--                            <a href="#" data-rating-value="3" data-rating-text="3" class="">--}}

{{--                            </a>--}}
{{--                            <a href="#" data-rating-value="4" data-rating-text="4" class="">--}}

{{--                            </a>--}}
{{--                            <a href="#" data-rating-value="5" data-rating-text="5" class="">--}}

{{--                            </a>--}}
{{--                            <div class="br-current-rating">1</div>--}}
{{--                        </div>--}}
                    </div>

{{--                    <div class="br-wrapper br-theme-bars-square">--}}
{{--                        <select class="example-square" name="rating"--}}
{{--                                autocomplete="off">--}}
{{--                            <option value="1" selected>1</option>--}}
{{--                            <option value="2">2</option>--}}
{{--                            <option value="3">3</option>--}}
{{--                            <option value="4">4</option>--}}
{{--                            <option value="5">5</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    @error('rating')
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                    @enderror
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary"
                        onclick="event.preventDefault();
                                                            document.getElementById('add-certificate-form-{{$appoint->id}}').submit();
                                                            "
                >Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{--@endprepend--}}
