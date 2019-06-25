@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <h4 class="card-title">Update Access Purpose</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="pt-4" action="/purposes/{{$purpose->id}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$purpose -> name}}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="purpose">Description</label>
                            <textarea rows="5" type="text" class="form-control" id="purpose"
                                      name="purpose"> {{$purpose -> purpose}} </textarea>
                        </div>

                        <input type="hidden" id="action_input" name="action" value="{{$purpose -> action}}">

                        <input type="hidden" name="creator_id" value="{{$user_id}}">

                        <div class="form-group">
                            <button id="action" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                {{$purpose->action}}
                            </button>
                            <div class="dropdown-menu form-group">
                                <span class="dropdown-item form-control"
                                      onclick=" document.getElementById('action').innerText = 'Create';
                                                document.getElementById('action_input').value = 'create'">Create</span>
                                <span class="dropdown-item form-control"
                                      onclick=" document.getElementById('action').innerText = 'Read';
                                                document.getElementById('action_input').value = 'read'">Read</span>
                                <span class="dropdown-item form-control"
                                      onclick=" document.getElementById('action').innerText = 'Update';
                                                document.getElementById('action_input').value = 'update'">Update</span>
                                <span class="dropdown-item form-control"
                                      onclick=" document.getElementById('action').innerText = 'Delete';
                                                document.getElementById('action_input').value = 'delete'">Delete</span>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="policies">Policies</label>
                            <div id="policies">
                                @include('layouts.multiselect', ['items' => $policies, 'key1' => 'name', 'name' => 'policies'])
                            </div>
                        </div>

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


@stop