<div id="modal-{{$id}}" class="modal modal-xl" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Policy Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Name</span>
                            <span>{{ $policy['name'] }}</span>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Created By</span>
                            <span>{{\App\User::find($policy['creator_id'])->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
</div>