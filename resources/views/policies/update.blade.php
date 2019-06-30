@extends('layouts.app')

@section('content')
    <style>
        i.jstree-icon.jstree-themeicon {
            background-image: url("..");
        }

        label {
            font-size: 12px !important;
        }
    </style>

    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4>Update Access Policy</h4>
        </div>
        <div class="card-body">
            <form class="pt-4" action="/policies/{{$policy->policy_id}}/update" method="post"
                  id="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$policy -> name}}">
                </div>

                <div class="form-group">
                    <div>
                        Data Element
                    </div>

                    <div class="btn-group">
                        <button id="dataElementName" type="button"
                                class="btn btn-primary">{{\App\ExternalTable::find($policy -> data_element)["name"]}}</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div id="data_element" class="dropdown-menu">
                            @foreach($external_tables as $external_table)
                                <a class="dropdown-item"
                                   onclick="setSelection('_table_id', `{{$external_table["table_id"]}}`, 'dataElementName',`{{$external_table["name"]}}`)">{{$external_table["name"]}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="rules" class="">Rules</label>
                    <div id="rules"></div>
                </div>

                <div class="form-group">
                    <label for="emergency_rules" class="">Emergency Rules</label>
                    <div id="emergency_rules"></div>
                </div>

                <input type="hidden" name="rules" id="_rules" value="{{$policy -> rules}}">
                <input type="hidden" name="emergency_rules" id="_emergency_rules"
                       value="{{$policy -> emergency_rules}}">
                <input type="hidden" name="data_element" id="_table_id" value="{{$policy->data_element}}">
                <input type="hidden" name="creator_id" value="{{$user_id}}">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

    <script>
        function updateRulesValues() {
            $('#_rules').val(JSON.stringify(convertJSTreeJSON2JSON($('#rules').jstree(true).get_json())));

            $('#_emergency_rules').val(JSON.stringify(convertJSTreeJSON2JSON($('#emergency_rules').jstree(true).get_json())));
        }

        function setSelection(HIDDEN, value1, DROPDOWN, value2) {

            document.getElementById(HIDDEN).value = value1;
            document.getElementById(DROPDOWN).innerText = value2;

        }

        document.addEventListener('DOMContentLoaded', function () {
            $('#form').submit(function (event) {
                updateRulesValues();
                this.submit();
            });

            $('#rules').jstree({
                "core": {
                    "animation": 0,
                    "check_callback": true,
                    "themes": {"stripes": true},
                    'data': [
                        convertJSON2JSTreeJSON(<?= $policy->rules ?>)
                    ]
                },
                "plugins": [
                    "contextmenu"
                ]
            });

            $('#emergency_rules').jstree({
                "core": {
                    "animation": 0,
                    "check_callback": true,
                    "themes": {"stripes": true},
                    'data': [
                        convertJSON2JSTreeJSON(<?= $policy->emergency_rules ?>)
                    ]
                },
                "plugins": [
                    "contextmenu"
                ]
            });
        })
    </script>

@stop
