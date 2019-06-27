@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-success">
            <h4 class="card-title">Create New User</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form class="pt-4 form" action="/users" method="post" autocomplete="off">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-success" id="name" name="name"
                                   value="{{old('name')}}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>

                        <input class="form-control" id="hidden_id" name="role_id" type="hidden">

                        <div class="btn-group form-group">
                            <button id="role" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                User Role
                            </button>
                            <div class="dropdown-menu form-group">

                                @foreach($roles as $role)

                                    <option id="role_id" class="dropdown-item form-control" name="role_id"
                                            value="{{$role -> id}}"
                                            onclick="document.getElementById('role').innerText = '{{$role -> title}}';
                                                    document.getElementById('hidden_id').value = '{{$role -> id}}'">{{$role -> title}}</option>

                                @endforeach

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop