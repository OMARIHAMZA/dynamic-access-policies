@extends('layouts.app')

@section('content')


    <h3>Create new Access Purpose</h3>

    <form class="pt-4" action="/purposes" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>


        <div class="form-group pt-4">
            <label for="purpose">Purpose Description</label>
            <textarea rows="4" type="text" class="form-control" id="purpose"
                      name="purpose"> {{old('purpose')}}
            </textarea>
        </div>


        <input type="hidden" id="action_input" name="action" value="{{old('action')}}">

        <input type="hidden" name="creator_id" value="{{$user_id}}">

        <div class="btn-group form-group">
            <button id="action" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu form-group">

                <span class="dropdown-item form-control"
                      onclick="document.getElementById('action').innerText = 'Create';
                      document.getElementById('action_input').value = 'create'">Create</span>
                <span class="dropdown-item form-control"
                      onclick="
                      document.getElementById('action').innerText = 'Read';
                      document.getElementById('action_input').value = 'read'">Read</span>
                <span class="dropdown-item form-control"
                      onclick="document.getElementById('action').innerText = 'Update';
                      document.getElementById('action_input').value = 'update'">Update</span>
                <span class="dropdown-item form-control"
                      onclick="document.getElementById('action').innerText = 'Delete';
                      document.getElementById('action_input').value = 'delete'">Delete</span>


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

@stop