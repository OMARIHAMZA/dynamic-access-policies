<div class="row" style="max-height: 500px !important; overflow-y: auto;">
    <div class="col-12">
        <div class="list-group">
            @foreach($items as $item)
                <div class="list-group-item list-group-item-action">
                    <div class="float-right form-check d-flex justify-content-center align-items-center">
                        <label class="form-check-label">
                            <input class="form-check-input"
                                   type="checkbox"
                                   @if ($item['selected']) checked="checked" @endif
                                   name="{{$name}}[]"
                                   value="{{$item['id']}}">
                            <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                        </label>
                    </div>
                    <span>{{$item[$key1]}}</span>

                </div>
            @endforeach
        </div>
    </div>
</div>