@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4 class="card-title">Update Data Element</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="pt-4" action="/data_elements/{{$table['table_id']}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$table['name']}}">
                        </div>

                        <input type='hidden' name='creator_id' value='{{$table['creator_id']}}'/>

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
