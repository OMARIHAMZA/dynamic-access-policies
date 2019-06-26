<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <a class="float-right btn btn-primary" title="New Item" data-toggle="modal"
           data-backdrop="static" data-keyboard="false" data-target="#kv_dialog_{{$title}}">
            <i class="fa fa-plus-circle text-light"></i>
        </a>
        <h4 class="card-title">{{$title}}</h4>

    </div>
    <div class="card-body">
        <table id="{{str_replace(' ', '', $title)}}_table" class="table" style="table-layout: fixed">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Key</th>
                <th>Values</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>

            <tbody id="{{str_replace(' ', '', $title)}}_table_body">

            {{--Content will be added by the key_values_dialog--}}

            </tbody>

        </table>
    </div>
</div>