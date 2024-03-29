@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4 class="card-title">Edit role details</h4>
        </div>
        <div class="card-body">
            <form class="pt-4" action="/roles/{{$role->role_id}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$role -> title}}">
                </div>

                <div class="form-group mt-3">
                    <label for="description">Description</label>
                    <textarea rows="5" type="text" class="form-control" id="description"
                              name="description"> {{$role -> description}} </textarea>
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
@stop