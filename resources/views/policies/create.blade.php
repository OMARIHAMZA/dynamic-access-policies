@extends('layouts.app')


@include('layouts.policies.key_values_dialog', [
    'title' => 'Rules'
])

@include('layouts.policies.key_values_dialog', [
    'title' => 'Emergency Rules'
])

@section('content')

    <h3>Create new Access Policy</h3>


    <form class="pt-4" action="/policies" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>


        <h4>Data Elements</h4>
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


        {{--

                    <table id="keys_table" class="table" cellspacing="5" cellpadding="0">
                        <tr>
                            <td>
                                <label for="key1">Key</label>
                                <input id="key1" title="Key" type="text"
                                       class="form-control" name="1">

                                <label for="values1">Values</label>
                                <select id="values1" class="roles-tokens custom-tokens form-control" style="width: 200px"
                                        name="1" multiple></select>

                                <script>$('.custom-tokens').tokenize2({
                                        tokensAllowCustom: true,
                                        delimiter: [',', '-']
                                    });</script>
                            </td>

                            <td>
                                <button type="button" class="btn btn-danger btn-fab"
                                        onclick="deleteRow(this)">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>

                    </table>
        --}}


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

    <script>

        

        {{--DON'T DELETE THIS FUCNTION, IT IS BEING USED BY THE KEYS_VALUES LAYOUT--}}
        function deleteRow(currentElement, title) {
            let parentRowIndex = currentElement.parentNode.parentNode.rowIndex;
            document.getElementById(`${title}_table`).deleteRow(parentRowIndex);
        }

    </script>

@stop
