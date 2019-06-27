<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
       @if (!isset($view_only))
            <a class="float-right btn btn-primary" title="New Item" data-toggle="modal"
               data-backdrop="static" data-keyboard="false" data-target="#kv_dialog_{{$title}}">
                <i class="fa fa-plus-circle text-light"></i>
            </a>
       @endif
        <h4 class="card-title">{{$title}}</h4>

    </div>
    <div class="card-body">
        <table id="{{str_replace(' ', '', $title)}}_table" class="table" style="table-layout: fixed">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Key</th>
                <th>Values</th>
                @if (!isset($view_only))
                    <th class="text-right">Actions</th>
                @endif
            </tr>
            </thead>

            <tbody id="{{str_replace(' ', '', $title)}}_table_body">

            @if (isset($rules))
                <?php $i = 0 ?>
                @foreach(json_decode($rules, true) as $key => $values)

                    <tr>
                        <td class="text-center">{{++$i}}</td>
                        <td>{{$key}}</td>
                        <td>{{$values}}</td>
                        @if (!isset($view_only))
                            <td class="text-right">
                                <button type="button" class="btn btn-danger btn-fab"
                                        onclick="deleteRow(this, '{{str_replace(' ', '', $title)}}')">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        @endif

                    </tr>

                @endforeach
            @endif

            {{--Content will be added by the key_values_dialog--}}

            </tbody>

        </table>
    </div>
</div>