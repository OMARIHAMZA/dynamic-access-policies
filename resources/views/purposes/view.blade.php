@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <a href="{{$urpose['id']}}/edit" class="float-right btn btn-light btn-sm"
               title="Edit">
                <i class="fa fa-pen text-primary"></i>
            </a>
            <h4 class="card-title">Purpose Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-2">
                <tr>
                    <th>Name</th>
                    <td>{{ $purpose['name'] }}</td>
                </tr>
                <tr>
                    <th>Purpose</th>
                    <td>{{ $purpose['purpose'] }}</td>
                </tr>
                <tr>
                    <th>Action</th>
                    <td>{{$purpose['action']}}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{$purpose['creator_id']}}</td>
                </tr>
            </table>
        </div>
    </div>
@stop