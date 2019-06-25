@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <a href="users/create/" class="float-right btn btn-light btn-sm" title="Add user">
                <i class="fa fa-plus-circle text-primary"></i>
            </a>
            <h4 class="card-title">{{$users->count()}} Total users</h4>
        </div>
        <div class="card-body">
            <table class="table">
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

                    @include("layouts.dialog", [
                        'id' => $user -> id,
                        'title' => "Delete Confirmation",
                        'body' => "Are you sure you want to delete user \"$user->name\"?",
                        'href' => "/users/delete/{$user -> id}"
                     ])

                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>{{$user -> role ?  $user -> role ->title : "null"}}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success"
                                    onclick="document.location.href = 'users/{{$user->id}}'">
                                <i class="material-icons">edit</i>
                            </button>


                            <button type="button" rel="tooltip" class="btn btn-danger"
                                    data-toggle="modal"
                                    data-backdrop="static" data-keyboard="false" data-target="#modal{{$user->id}}">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


