@extends('layouts.app')

@section('content')
    <table class="table" style="table-layout: fixed">

        <thead>
        <tr style="background: lightgray">
            <th class="text-center" style="fill: white">{{$roles->count()}} Total Roles</th>
            <td></td>
            <td></td>
            <th></th>
            <th></th>
            <td></td>
            <td align="right" class="pr-3 td-actions">
                <button type="button" rel="tooltip" class="btn btn-primary" style="font-size: medium"
                        onclick="document.location.href = 'roles/create'">
                    &nbsp;+&nbsp;
                </button>
            </td>
        </tr>

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

        @foreach($roles as $role)

            @include("layouts.dialog", [
                'id' => $role -> id,
                'title' => "Delete Confirmation",
                'body' => "Are you sure you want to delete role \"$role->title\"?",
                'href' => "/roles/delete/{$role -> id}"
             ])

            <tr>
                <td class="text-center">{{ $role -> id }}</td>
                <td>{{$role -> title}}</td>
                <td>{{$role -> description}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-success"
                            onclick="document.location.href = 'roles/{{$role->id}}'">
                        <i class="material-icons">edit</i>
                    </button>


                    <button type="button" rel="tooltip" class="btn btn-danger"
                            data-toggle="modal"
                            data-backdrop="static" data-keyboard="false" data-target="#modal{{$role->id}}">
                        <i class="material-icons">close</i>
                    </button>


                </td>
            </tr>


        @endforeach

        </tbody>


    </table>

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


