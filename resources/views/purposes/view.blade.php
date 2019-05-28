@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <a href="{{$purpose['id']}}/edit" class="float-right btn btn-light btn-sm"
               title="Edit">
                <i class="fa fa-pen text-primary"></i>
            </a>
            <h4 class="card-title">Purpose Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover mt-2">
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
                    <td>{{$creator_name}}</td>
                </tr>
                <tr>
                    <th>Policies</th>
                    <td class="border-left">
                        <div class="list-group">
                            @foreach ($policies as $policy)
                                <div class="list-group-item list-group-item-action border-bottom">{{$policy->name}}</div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop