@extends('layouts.app')

@section('content')

    <style>
        i.jstree-icon.jstree-themeicon {
            background-image: url('');
        }
    </style>

    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4>Policy Details</h4>
        </div>
        <div class="card-body">
            <div class="form-group list-group-item-action">
                <label for="name" class="badge badge-pill badge-success">Name</label>
                <p id="name"> {{$policy->name}}</p>
            </div>

            <div class="form-group list-group-item-action">
                <label for="data_element" class="badge badge-pill badge-success">Data Element</label>
                <p id="data_element"> {{$policy->data_element}}</p>
            </div>

            <div class="form-group list-group-item-action">
                <label for="rules" class="badge badge-pill badge-success">Rules</label>
                <div id="rules"></div>
            </div>

            <div class="form-group list-group-item-action">
                <label for="emergency_rules" class="badge badge-pill badge-success">Emergency Rules</label>
                <div id="emergency_rules"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#rules').jstree({
                "core": {
                    "animation": 0,
                    "check_callback": true,
                    "themes": {"stripes": true},
                    'data': [
                        convertJSON2JSTreeJSON(<?= $policy->rules ?>)
                    ]
                },
                // "plugins": [
                //     "contextmenu"
                // ]
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
                // "plugins": [
                //     "contextmenu"
                // ]
            });
        })

    </script>
@stop
