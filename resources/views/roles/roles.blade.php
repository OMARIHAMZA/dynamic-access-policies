@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <a href="roles/create/" class="float-right btn btn-success btn-sm" title="Add user">
                <i class="fa fa-plus-circle text-light"></i> Add Role
            </a>
            <h4 class="card-title">{{$roles->count()}} Total Roles</h4>
        </div>
        <div class="card-body">
            <table class="table" style="table-layout: fixed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Role Title</th>
                    <th>Role Description</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $index => $role)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{$role -> title}}</td>
                        <td>{{$role -> description}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-dark"
                                    onclick="document.location.href = 'roles/{{$role->id}}'">
                                <i class="material-icons">edit</i>
                            </button>

                            <button type="button"
                                    rel="tooltip"
                                    class="btn btn-dark"
                                    onclick="Modal('#delete', 'Delete Confirmation', 'Are you sure you want to delete role \'{{$role->title}}\'?', null, null, [{text:'Delete', href:'/roles/delete/{{$role->id}}'}], doneMessage = 'Cancel')">
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
@stop


