@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <a href="permissions/create" class="float-right btn btn-success btn-sm" title="New Permission">
                <i class="fa fa-plus-circle text-light"></i> Add permission
            </a>
            <h4 class="card-title">{{$permissions->count()}} Total permissions</h4>
        </div>
        <div class="card-body">
            <table class="table data-table" style="table-layout: fixed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($permissions as $index=>$permission)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{$permission['title']}}</td>
                        <td>{{$permission['description']}}</td>
                        <td class="td-actions text-right">
                            <button type="button" class="btn btn-default"
                                    title="Show"
                                    onclick="document.location.href = 'permissions/{{$permission['permission_id']}}'">
                                <i class="fa fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-default"
                                    title="Edit"
                                    onclick="document.location.href = 'permissions/{{$permission['permission_id']}}/edit'">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button type="button"
                                    rel="tooltip"
                                    class="btn btn-dark"
                                    onclick="Modal('#delete', 'Delete Confirmation', 'Are you sure you want to delete permission \'{{$permission["title"]}}\'?', null, null, [{text:'Delete', href:'/permissions/{{$permission['permission_id']}}/delete'}], doneMessage = 'Cancel')">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @include("layouts.dialog", ['id' => 'delete'])
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


