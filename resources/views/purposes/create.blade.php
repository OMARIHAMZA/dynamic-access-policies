@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <h4 class="card-title">Create New Access Purpose</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="pt-4" action="/purposes" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>

                        <div class="form-group pt-4">
                            <label for="purpose">Description</label>
                            <textarea id="purpose"
                                      rows="3"
                                      class="form-control pt-3"
                                      placeholder="Describe your purpose here"
                                      name="purpose"> {{old('purpose')}}</textarea>
                        </div>

                        <input type="hidden" name="creator_id" value="{{$user_id}}">

                        <input type="hidden" id="action_value" name="action" value="{{old('action')}}">
                        <div class="form-group pt-4">
                            {{--<label for="action">Action</label>--}}
                            <input id="action"
                                   type="button"
                                   name="action"
                                   class="btn btn-primary dropdown-toggle"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   title="action"
                                   value="Action">
                            <div class="dropdown-menu">
                                <span class="dropdown-item form-control"
                                      onclick="document.getElementById('action').value = 'create';
                                      document.getElementById('action_value').value = 'create';">Create</span>
                                <span class="dropdown-item form-control"
                                      onclick="document.getElementById('action').value = 'read';
                                      document.getElementById('action_value').value = 'read';">Read</span>
                                <span class="dropdown-item form-control"
                                      onclick="document.getElementById('action').value = 'write';
                                      document.getElementById('action_value').value = 'write';">Write</span>
                                <span class="dropdown-item form-control"
                                      onclick="document.getElementById('action').value = 'update';
                                      document.getElementById('action_value').value = 'update';">Update</span>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="policies">Policies</label>
                            <div id="policies">
                                @include('layouts.multiselect', ['items' => $policies, 'key1' => 'name', 'name' => 'policies'])
                            </div>
                        </div>

                        <div class="btn-group form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
<script>
    import VueMultiselect from "vue-multiselect/src/Multiselect";

    export default {
        components: {VueMultiselect}
    }
</script>