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
                            <span class="font-weight-bold">Purpose</span>
                            <span>{{ $policy['description'] }}</span>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Created By</span>
                            <span>{{$policy['creator_id']}}</span>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Related purposes</span>
                            <div class="list-group" style="max-height: 500px; overflow-y: auto;">
                                @foreach($policy->purposes()->get() as $purpose)
                                    <div class="list-group-item list-group-item-action">
                                        <span>{{ $purpose['name'] }}</span> <i class="fa fa-chevron-left"></i>
                                    </div>
                                @endforeach
                            </div>
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