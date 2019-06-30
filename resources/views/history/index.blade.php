@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4 class="card-title">{{$requests->count()}} Total access requests</h4>
        </div>
        <div class="card-body">
            <table class="table table-shopping data-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Requester</th>
                    <th>Data elements</th>
                    <th>Date</th>
                    <th>Is emergency</th>
                    <th>Is requested</th>
                    <th>Result</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $id => $request)
                    <tr>
                        <td>{{$id + 1}}</td>
                        <td>{{ $request->requester_name }}</td>
                        <td>{{ $request->external_tables }}</td>
                        <td>{{ $request->access_date }}</td>
                        <td>{{ $request->emergency ? 'true':'false' }}</td>
                        <td>{{ $request->requested ? 'true':'false' }}</td>
                        <td>{{ $request->result ? 'true':'false' }}</td>
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


