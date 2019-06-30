{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="card">--}}
{{--<div class="card-header card-header-tabs card-header-success">--}}
{{--<h4 class="card-title">Update Data Element</h4>--}}
{{--</div>--}}
{{--<div class="card-body">--}}
<div class="row">
    <div class="col-12">
        <form class="pt-4" action="/data_elements/{{$rows[0]->table_id}}" method="post" id="form">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$rows[0]->name}}">
            </div>

            @if ($data['role_name'] == 'admin')
                <div class="form-group">
                    <div>
                        <label for="external_system">External System</label>
                    </div>

                    <div class="btn-group btn-group-sm">
                        <button id="external_system" type="button"
                                class="btn btn-primary">{{\App\User::find($rows[0]->creator_id)->name }}</button>

                        <button type="button"
                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div id="data_element" class="dropdown-menu">
                            <?php
                            $users = \App\User::where([
                                'role_id' => \App\Role::where('title', 'user')->first()->role_id
                            ])->get();
                            ?>
                            @foreach($users as $user)
                                <a class="dropdown-item"
                                   onclick="fillHiddenElement('creator_id', `{{$user->id}}`, 'external_system',`{{$user->name}}`)">{{$user->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <input type='hidden' id="creator_id" name='creator_id' value='{{$rows[0]->creator_id}}'/>

            {{--<div class="btn-group form-group">--}}
            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
            {{--</div>--}}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
{{--</div>--}}
{{--</div>--}}
{{--@stop--}}
