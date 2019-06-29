@extends('layouts.app')


@include('layouts.policies.key_values_dialog', [
    'title' => 'Rules'
])

@include('layouts.policies.key_values_dialog', [
    'title' => 'Emergency Rules'
])

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4>Create New Access Policy</h4>
        </div>
        <div class="card-body">
            <form class="pt-4" action="/policies" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>

                <div class="btn-group">
                    <button id="dataElementName" type="button" class="btn btn-primary">Data Element</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div id="data_element" class="dropdown-menu">
                        @foreach($external_tables as $external_table)
                            <a class="dropdown-item"
                               onclick="setSelection(`{{$external_table["table_id"]}}`,`{{$external_table["name"]}}`)">{{$external_table["name"]}}</a>
                        @endforeach
                    </div>
                </div>

                <br>
                <div class="card-body">

                    @include('layouts.policies.key_values', [

                        'title' => 'Rules'

                    ])

                    <br>
                    <br>
                    @include('layouts.policies.key_values', [

                        'title' => 'Emergency Rules'

                    ])


                </div>

                <input type="hidden" name="creator_id" value="{{$user_id}}">
                <input type="hidden" name="rules" id="_rules">
                <input type="hidden" name="emergency_rules" id="_emergency_rules">
                <input type="hidden" name="data_element" id="_table_id">


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
        function setSelection(id, name) {

            document.getElementById('_table_id').value = id;
            document.getElementById('dataElementName').innerText = name;

        }

        function parseRules() {

            let rules = {};
            // Get Rules
            let rulesTable = document.getElementById('Rules_table');
            for (let i = 1; i < rulesTable.rows.length; i++) {
                let currentRow = rulesTable.rows[i];
                rules[currentRow.cells[1].innerText] = '[' + currentRow.cells[2].innerText + ']';
            }


            let emergencyRules = {};
            // Get Rules
            let emergencyRulesTable = document.getElementById('EmergencyRules_table');
            for (let i = 1; i < emergencyRulesTable.rows.length; i++) {
                let currentRow = emergencyRulesTable.rows[i];
                emergencyRules[currentRow.cells[1].innerText] = '[' + currentRow.cells[2].innerText + ']';
            }

            document.getElementById('_rules').value = JSON.stringify(rules);
            document.getElementById('_emergency_rules').value = JSON.stringify(emergencyRules);

        }


        {{--DON'T DELETE THIS FUCNTION, IT IS BEING USED BY THE KEYS_VALUES LAYOUT--}}
        function deleteRow(currentElement, title) {
            let parentRowIndex = currentElement.parentNode.parentNode.rowIndex;
            document.getElementById(`${title}_table`).deleteRow(parentRowIndex);
        }
    </script>
@stop
