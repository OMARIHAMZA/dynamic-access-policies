@extends('layouts.app')

@section('content')


    <h3>Update user</h3>

    <form class="pt-4" action="/roles/update" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$role -> title}}">
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea rows="5" type="text" class="form-control" id="description" name="description"> {{$role -> description}} </textarea>
        </div>

        <input type="hidden" name="id" value="{{$role -> id}}">

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