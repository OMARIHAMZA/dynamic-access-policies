@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <h4 class="card-title">Create New Permission</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="pt-4" action="/permissions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>

                        <div class="form-group pt-4">
                            <label for="description">Description</label>
                            <textarea id="description"
                                      rows="2"
                                      class="form-control pt-3"
                                      placeholder="Describe your permission here"
                                      name="description"> {{old('description')}}</textarea>
                        </div>

                        <div class="btn-group form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
