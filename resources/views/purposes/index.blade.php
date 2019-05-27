@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <a href="purposes/create/" class="float-right btn btn-light btn-sm" title="Create new purpose">
                <i class="fa fa-plus-circle text-primary"></i>
            </a>
            <h4 class="card-title">{{$purposes->count()}} Total purposes</h4>
        </div>
        <div class="card-body">
            <table class="table" style="table-layout: fixed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                    <th>Created By</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($purposes as $index=>$purpose)

                    @include("layouts.dialog", [
                        'id' => $purpose -> id,
                        'title' => "Delete Confirmation",
                        'body' => "Are you sure you want to delete purpose \"$purpose->name\"?",
                        'href' => "/purposes/{$purpose -> id}/delete/"
                     ])

                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{$purpose -> name}}</td>
                        <td>{{$purpose -> purpose}}</td>
                        <td>{{$purpose -> action}}</td>
                        <td>{{$purpose -> creator -> name}}</td>
                        <td class="td-actions text-right">
                            <button type="button" class="btn btn-default"
                                    title="Show"
                                    onclick="document.location.href = 'purposes/{{$purpose->id}}'">
                                <i class="fa fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-default"
                                    title="Edit"
                                    onclick="document.location.href = 'purposes/{{$purpose->id}}/edit'">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-default"
                                    title="Delete"
                                    data-toggle="modal"
                                    data-backdrop="static" data-keyboard="false" data-target="#modal{{$purpose->id}}">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
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
@stop


