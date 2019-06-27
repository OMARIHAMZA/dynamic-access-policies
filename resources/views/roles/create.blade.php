@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4 class="card-title">Create new role</h4>
        </div>
        <div class="card-body">
            <form class="pt-4" action="/roles" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="description">Description</label>
                    <textarea type="text" rows="5" class="form-control" id="description" name="description"
                              value="{{old('description')}}"></textarea>
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