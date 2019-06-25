@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <a href="{{$permission['id']}}/edit" class="float-right btn btn-light btn-sm"
               title="Edit">
                <i class="fa fa-pen text-primary"></i>
            </a>
            <h4 class="card-title">Permission Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover mt-2">
                <tr>
                    <th>Title</th>
                    <td>{{ $permission['title'] }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $permission['description'] }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop