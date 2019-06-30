@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <a href="users/create/" class="float-right btn btn-success btn-sm" title="Add user">
                <i class="fa fa-plus-circle text-light"></i> Add User
            </a>
            <h4 class="card-title">{{$users->count()}} Total users</h4>
        </div>
        <div class="card-body">
            <table class="table data-table" >
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($users as $index => $user)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role ?  $user -> role ->title : "null"}}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-dark"
                                    onclick="document.location.href = 'users/{{$user->id}}/'">
                                <i class="material-icons">edit</i>
                            </button>

                            <button type="button"
                                    rel="tooltip"
                                    class="btn btn-dark"
                                    onclick="Modal('#delete', 'Delete Confirmation', 'Are you sure you want to delete user {{$user->name}}?', null, null, [{text:'Delete', href:'/users/{{$user->id}}/delete'}], doneMessage = 'Cancel')">
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


