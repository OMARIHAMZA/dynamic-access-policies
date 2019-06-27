@extends('layouts.app')

@section('content')

    <h3>{{$policy -> name}}</h3>

    <h4>Data Element: {{\App\ExternalTable::find($policy -> data_element)["name"]}}</h4>

    <br>
    <div class="card-body">

        @include('layouts.policies.key_values', [

            'title' => 'Rules',
            'rules' => $policy -> rules,
            'view_only' => true

        ])

        <br>
        <br>
        @include('layouts.policies.key_values', [

            'title' => 'Emergency Rules',
            'rules' => $policy -> emergency_rules,
            'view_only' => true

        ])


    </div>

    <input type="hidden" name="rules" id="_rules" value="{{$policy -> rules}}">
    <input type="hidden" name="emergency_rules" id="_emergency_rules" value="{{$policy -> emergency_rules}}">
    <input type="hidden" name="data_element" id="_table_id" value="{{$policy->data_element}}">
    <input type="hidden" name="policy_id" value="{{$policy->policy_id}}">


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



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
                rules[currentRow.cells[1].innerText] = currentRow.cells[2].innerText;
            }


            let emergencyRules = {};
            // Get Rules
            let emergencyRulesTable = document.getElementById('EmergencyRules_table');
            for (let i = 1; i < emergencyRulesTable.rows.length; i++) {
                let currentRow = emergencyRulesTable.rows[i];
                emergencyRules[currentRow.cells[1].innerText] = currentRow.cells[2].innerText;
            }

            document.getElementById('_rules').value = JSON.stringify(rules);
            document.getElementById('_emergency_rules').value = JSON.stringify(emergencyRules);

        }


        {{--DON'T DELETE THIS FUCNTION, IT IS BEING USED BY THE KEYS_VALUES LAYOUT--}}
        function deleteRow(currentElement, title) {
            let parentRowIndex = currentElement.parentNode.parentNode.rowIndex;
            document.getElementById(`${title}_table`).deleteRow(parentRowIndex);
            parseRules();
        }

    </script>

@stop
