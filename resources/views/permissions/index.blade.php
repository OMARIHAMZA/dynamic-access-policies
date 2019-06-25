@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <a href="permissions/create" class="float-right btn btn-primary btn-sm" title="New Permission">
                <i class="fa fa-plus-circle text-light"></i>
            </a>
            <h4 class="card-title">{{$permissions->count()}} Total purposes</h4>
        </div>
        <div class="card-body">
            <table class="table" style="table-layout: fixed">
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
                    @include("layouts.dialog", [
                        'id' => $permission['id'],
                        'title' => "Delete Confirmation",
                        'body' => "Are you sure you want to delete permission \"" . $permission['title'] . "\"?",
                        'href' => "/permissions/{$permission['id']}/delete/"
                     ])
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{$permission['title']}}</td>
                        <td>{{$permission['description']}}</td>
                        <td class="td-actions text-right">
                            <button type="button" class="btn btn-default"
                                    title="Show"
                                    onclick="document.location.href = 'permissions/{{$permission['id']}}'">
                                <i class="fa fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-default"
                                    title="Edit"
                                    onclick="document.location.href = 'permissions/{{$permission['id']}}/edit'">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-default"
                                    title="Delete"
                                    data-toggle="modal"
                                    data-backdrop="static" data-keyboard="false"
                                    data-target="#modal{{$permission['id']}}">
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


