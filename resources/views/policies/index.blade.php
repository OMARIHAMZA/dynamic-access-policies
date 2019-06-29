@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <a href="policies/create" class="float-right btn btn-success btn-sm" title="create new policy">
                <i class="fa fa-plus-circle mr-2"></i> Add policy
            </a>
            <h4>{{$policies->count()}} Total policies</h4>
        </div>
        <div class="card-body">
            <table class="table" style="table-layout: fixed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($policies as $index => $policy)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{$policy->name}}</td>
                        <td>{{$policy->creator()->first()->name}}</td>
                        <td class="td-actions text-right">

                            <button type="button" rel="tooltip" class="btn btn-info"
                                    onclick="document.location.href = '/policies/{{$policy->policy_id}}'">
                                <i class="material-icons">remove_red_eye</i>
                            </button>

                            <button type="button" rel="tooltip" class="btn btn-success"
                                    onclick="document.location.href = '/policies/{{$policy->policy_id}}/edit'">
                                <i class="material-icons">edit</i>
                            </button>

                            <button type="button"
                                    rel="tooltip"
                                    class="btn btn-danger"
                                    onclick="Modal('#delete', 'Delete Confirmation', 'Are you sure you want to delete user {{$policy->name}}?', null, null, [{text:'Delete', href:'/policies/{{$policy->policy_id}}/delete'}], doneMessage = 'Cancel')">
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


