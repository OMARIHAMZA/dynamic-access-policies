@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <h4 class="card-title">{{$logs->count()}} Total Emergency Accesses</h4>
        </div>
        <div class="card-body">
            <table class="table" style="table-layout: fixed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Requester Name</th>
                    <th>Data Elements</th>
                    <th>Date</th>
                </tr>
                </thead>

                <tbody>
                @foreach($logs as $index=>$log)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{\App\User::find($log->requester_id)->name}}</td>
                        <td>
                            <table>
                                @foreach(\App\ExternalTable::find(json_decode($log->external_tables, true)) as $external_table)

                                    <tr><td>{{$external_table['name']}}</td></tr>

                                @endforeach
                            </table>
                        </td>
                        <td>{{$log->access_date}}</td>

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


