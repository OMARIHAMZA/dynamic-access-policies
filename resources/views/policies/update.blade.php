@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <h4 class="card-title">Update Policy Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="pt-4" action="/policies/update" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$policy -> name}}">
                        </div>


                        <div class="form-group pt-4">
                            <label for="description">Policy Description</label>
                            <textarea rows="3" type="text" class="form-control" id="description"
                                      name="description"> {{$policy -> description}}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="policies">Policies</label>
                            <div id="policies">
                                @include('layouts.multiselect', ['items' => $purposes, 'key1' => 'name', 'name' => 'purposes'])
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
