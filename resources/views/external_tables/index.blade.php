@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            {{--<a href="data_elements/create" class="float-right btn btn-success btn-sm" title="New Element">--}}
            {{--<i class="fa fa-plus-circle text-light"></i> Add element--}}
            {{--</a>--}}
            <button type="button"
                    rel="tooltip"
                    title="New Element"
                    class="float-right btn btn-success btn-sm"
                    onclick="Modal('#MODAL', 'New Data Element', null, null, 'templates/external_tables.create?user_id=true&role_name=true', [{text:'Add', button: true, click: '$(\'#form\').submit()'}], doneMessage = 'Back')">
                <i class="fa fa-plus-circle"></i> Add element
            </button>
            <h4 class="card-title">{{$tables->count()}} Total elements</h4>
        </div>
        <div class="card-body">
            <table class="table data-table">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    @if ($flag)
                        <th>Owner</th>
                    @endif
                    <th>Policy defined</th>
                    <th class="">&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tables as $index=>$table)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{$table['name']}}</td>
                        @if ($flag)
                            <td>{{$table['creator_name']}}</td>
                        @endif
                        <td>{{$table['policy_defined'] ? 'true' : 'false'}}</td>
                        <td class="td-actions text-right">
                            {{--<button type="button" class="btn btn-default"--}}
                            {{--title="Edit"--}}
                            {{--onclick="document.location.href = 'data_elements/{{$table['table_id']}}/edit'">--}}
                            {{--<i class="fa fa-pen"></i>--}}
                            {{--</button>--}}
                            <button type="button"
                                    rel="tooltip"
                                    class="btn btn-dark"
                                    onclick="Modal('#MODAL', 'Update Table Details', null, null, 'templates/external_tables.update?table=external_tables&PK=table_id&ID={{$table->table_id}}&role_name=true', [{text:'Save', button: true, click: '$(\'#form\').submit()'}], doneMessage = 'Cancel')">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button type="button"
                                    rel="tooltip"
                                    class="btn btn-dark"
                                    onclick="Modal('#MODAL', 'Delete Confirmation', 'Are you sure you want to delete element \'{{$table["name"]}}\'?', null, null, [{text:'Delete', href:'/data_elements/{{$table['table_id']}}/delete'}], doneMessage = 'Cancel')">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @include("layouts.dialog", ['id' => 'MODAL'])
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
