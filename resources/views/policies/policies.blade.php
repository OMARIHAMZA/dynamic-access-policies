@extends('layouts.app')

@section('content')
    <table class="table" style="table-layout: fixed">

        <thead>
        <tr style="background: lightgray">
            <th class="text-center" style="fill: white">{{$policies->count()}} Total policies</th>
            <td></td>
            <td></td>
            <th></th>
            <th></th>
            <td></td>
            <td align="right" class="pr-3 td-actions">
                <button type="button" rel="tooltip" class="btn btn-primary" style="font-size: medium"
                        onclick="document.location.href = 'policies/create'">
                    &nbsp;+&nbsp;
                </button>
            </td>
        </tr>

        <tr>
            <th class="text-center">#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Purposes</th>
            <th>Created By</th>
            <th></th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>

        @foreach($policies as $policy)

            @include("layouts.dialog", [
                'id' => $policy -> id,
                'title' => "Delete Confirmation",
                'body' => "Are you sure you want to delete policy \"$policy->name\"?",
                'href' => "/policies/delete/{$policy -> id}"
             ])

            <tr>
                <td class="text-center">{{ $policy -> id }}</td>
                <td>{{$policy -> name}}</td>
                <td>{{$policy -> description}}</td>
                <td>
                    <table>
                        @foreach($policy -> purposes as $purpose)

                            <tr>
                                {{$purpose -> name}}<br>
                            </tr>

                        @endforeach
                    </table>
                </td>
                <td>{{$policy -> creator -> name}}</td>
                <td></td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-success"
                            onclick="document.location.href = 'policies/{{$policy->id}}'">
                        <i class="material-icons">edit</i>
                    </button>


                    <button type="button" rel="tooltip" class="btn btn-danger"
                            data-toggle="modal"
                            data-backdrop="static" data-keyboard="false" data-target="#modal{{$policy->id}}">
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


