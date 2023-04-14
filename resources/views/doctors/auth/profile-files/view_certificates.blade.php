<div class="tab-pane fade" id="pills-certificates" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
    @foreach($doctorCertificates as $certificate)
        <div class="media {{ $loop->iteration != $loop->last ? ' border-bottom': '' }}">
            <img class="mr-3 w-25 rounded" src="{{ asset('storage/'.$certificate->image) }}" alt="sample image" onclick="showSwal('view-certificate','{{ asset('storage/'.$certificate->image) }}')">
            <div class="media-body">
                <span class="text-right">{{ $certificate->title }}</span>

            </div>
        </div>
    @endforeach

</div>
