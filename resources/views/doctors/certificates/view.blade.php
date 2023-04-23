<div class="modal fade" id="view-certificate-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-3">View Certificate </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img width="500" src="{{ asset('storage/'.$image) }}" alt="cert">
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

