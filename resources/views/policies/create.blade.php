@extends('layouts.app')

@section('content')


    <h3>Create new Access Policy</h3>

    <form class="pt-4" action="/policies" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>


        <div class="form-group pt-4">
            <label for="description">Policy Description</label>
            <textarea rows="4" type="text" class="form-control" id="description"
                      name="description"> {{old('description')}}
            </textarea>
        </div>


        <input type="hidden" name="creator_id" value="{{$user_id}}">

        <div class="form-group mt-3">
            <label for="policies">Purposes</label>
            <div id="policies">
                @include('layouts.multiselect', ['items' => $purposes, 'key1' => 'name', 'name' => 'purposes'])
            </div>
        </div>

        {{--<h5 id="selected_purposes"></h5>--}}

        {{--<div class="btn-group form-group">--}}
        {{--<button id="action" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"--}}
        {{--aria-haspopup="true"--}}
        {{--aria-expanded="false">--}}
        {{--Select Access Purposes--}}
        {{--</button>--}}
        {{--<ul class="dropdown-menu">--}}

        {{--@foreach($purposes as $purpose)--}}

        {{--<li><a class="small" onclick="getCheckedBoxes('checkbox')" data-value="{{$purpose->id}}"--}}
        {{--tabIndex="-1"><input name="checkbox" type="checkbox"--}}
        {{--value="{{$purpose->id}}"/>&nbsp;{{$purpose->name}}--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--@endforeach--}}

        {{--</ul>--}}

        {{--</div>--}}


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

@stop

<script>

    // Pass the checkbox name to the function
    function getCheckedBoxes(chkboxName) {

        var checkboxes = document.getElementsByName("checkbox");
        var checkedIds = [];

        // loop over them all
        for (var i = 0; i < checkboxes.length; i++) {
            // And stick the checked ones onto an array...
            if (checkboxes[i].checked) {
                checkedIds += checkboxes[i].value;
            }
        }

        document.getElementById("selected_purposes").innerText = "(" + checkedIds.length + ") Selected Purposes";


        document.getElementById("purposes").value = "" + Array.from(checkedIds) + "";
        // Return the array if it is non-empty, or null
        return checkedIds;
    }

</script>