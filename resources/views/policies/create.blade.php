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
            <div class="row">
                <div class="col-8">
                    <form class="pt-4" action="/policies" method="post" id="form">
                        {{csrf_field()}}

                        <div class="row pb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{old('name')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if (isset($external_users))
                                <div class="col-3">
                                    <div>
                                        <label for="external_user">External User</label>
                                    </div>

                                    <div class="btn-group">
                                        <button id="external_user" type="button" class="btn btn-primary">None</button>

                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div id="data_element" class="dropdown-menu">
                                            @foreach($external_users as $user)
                                                <a class="dropdown-item"
                                                   onclick="setSelection('_creator_id', `{{$user->id}}`, 'external_user',`{{$user->name}}`)">{{$user->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-3">
                                <div>
                                    <label for="external_user">Data Element</label>
                                </div>

                                <div class="btn-group">
                                    <button id="dataElementName"
                                            type="button" class="btn btn-primary">None
                                    </button>
                                    <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
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
                        </div>

                        <div class="mt-5">
                            @include('layouts.policies.key_values', [

                                'title' => 'Rules'

                            ])
                        </div>

                        <div class="mt-5">
                            @include('layouts.policies.key_values', [

                               'title' => 'Emergency Rules'

                           ])
                        </div>

                        <input type="hidden" name="creator_id" id="_creator_id"
                               @if(!isset($external_users)) value="{{$user_id}}" @endif>
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
        </div>
    </div>

    <script>
        function setSelection(HIDDEN, value1, DROPDOWN, value2) {

            document.getElementById(HIDDEN).value = value1;
            document.getElementById(DROPDOWN).innerText = value2;

        }

        function prepareRules() {

            // Prepare Rules
            let rules = {};
            $('#Rules_table > tbody > tr').each(function () {

                let td = $(this).children('td');

                rules[td[1].innerText] = td[2].innerText.split(",");
            });

            console.log('rules', rules);


            // Get Emergency Rules
            let emergencyRules = {};

            $('#EmergencyRules_table > tbody > tr').each(function () {

                let td = $(this).children('td');

                emergencyRules[td[1].innerText] = td[2].innerText.split(",");
            });

            document.getElementById('_rules').value = JSON.stringify(rules);
            document.getElementById('_emergency_rules').value = JSON.stringify(emergencyRules);

            console.log('emergencyRules', emergencyRules);
        }

        document.addEventListener('DOMContentLoaded', function () {
            $('#form').submit(function (event) {

                event.preventDefault();

                prepareRules();

                this.submit();
            })
        });


        {{--DON'T DELETE THIS FUCNTION, IT IS BEING USED BY THE KEYS_VALUES LAYOUT--}}
        function deleteRow(currentElement, title) {
            let parentRowIndex = currentElement.parentNode.parentNode.rowIndex;
            document.getElementById(`${title}_table`).deleteRow(parentRowIndex);
        }
    </script>
@stop
