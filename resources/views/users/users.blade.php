@extends('layouts.app')

@section('content')
    <table class="table">

        <thead>
        <tr style="background: lightgray">
            <th class="text-center" style="fill: white">{{$users->count()}} Total users</th>
            <td></td>
            <td></td></th>
            <td></td>
            <td align="right" class="pr-3 td-actions">
                <button type="button" rel="tooltip" class="btn btn-primary" style="font-size: medium" onclick="document.location.href = 'users/create'">
                    &nbsp;+&nbsp;
                </button>
            </td>
        </tr>

        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>

        @foreach($users as $user)

            @include("layouts.dialog", [
                'title' => "Delete Confirmation",
                'body' => "Are you sure you want to delete user \"$user->name\"?",
                'user_id' => $user -> id
             ])

            <tr>
                <td class="text-center">{{ $user -> id }}</td>
                <td>{{$user -> name}}</td>
                <td>{{$user -> email}}</td>
                <td>{{$user -> role -> title}}</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal"
                            data-backdrop="static" data-keyboard="false" data-target="#modal{{$user->id}}">
                        <i class="material-icons">edit</i>
                    </button>


                    <button type="button" rel="tooltip" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">
                        <i class="material-icons">close</i>
                    </button>


                </td>
            </tr>


        @endforeach

        </tbody>


    </table>


@stop


