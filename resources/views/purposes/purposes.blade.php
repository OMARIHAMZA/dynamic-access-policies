@extends('layouts.app')

@section('content')
    <table class="table" style="table-layout: fixed">

        <thead>
        <tr style="background: lightgray">
            <th class="text-center" style="fill: white">{{$purposes->count()}} Total Purposes</th>
            <td></td>
            <td></td>
            <th></th>
            <th></th>
            <td></td>
            <td align="right" class="pr-3 td-actions">
                <button type="button" rel="tooltip" class="btn btn-primary" style="font-size: medium"
                        onclick="document.location.href = 'purposes/create'">
                    &nbsp;+&nbsp;
                </button>
            </td>
        </tr>

        <tr>
            <th class="text-center">#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
            <th>Created By</th>
            <th></th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>

        @foreach($purposes as $purpose)

            @include("layouts.dialog", [
                'id' => $purpose -> id,
                'title' => "Delete Confirmation",
                'body' => "Are you sure you want to delete purpose \"$purpose->name\"?",
                'href' => "/purposes/delete/{$purpose -> id}"
             ])

            <tr>
                <td class="text-center">{{ $purpose -> id }}</td>
                <td>{{$purpose -> name}}</td>
                <td>{{$purpose -> purpose}}</td>
                <td>{{$purpose -> action}}</td>
                <td>{{$purpose -> creator -> name}}</td>
                <td></td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-success"
                            onclick="document.location.href = 'purposes/{{$purpose->id}}'">
                        <i class="material-icons">edit</i>
                    </button>


                    <button type="button" rel="tooltip" class="btn btn-danger"
                            data-toggle="modal"
                            data-backdrop="static" data-keyboard="false" data-target="#modal{{$purpose->id}}">
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


