@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <script type="text/javascript">
                    <?= 'let notifications = ' . json_encode($notifications); ?>

                let rendered;

                function renderNotifications(mode) {
                    rendered = [];
                    switch (mode) {
                        case 1: // ALL
                            rendered = notifications;
                            break;
                        case 2: // System notifications only
                            rendered = [{description: 'What?', action: '/'}];
                            break;
                        case 3: // Users notifications only
                            break;
                    }

                    $('#notifications-board').html("");
                    rendered.forEach(e => {
                        $('#notifications-board').append(`
                        <tr>
                            <td><div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" value="" checked><span class="form-check-sign"><span class="check"></span></span></label></div></td>
                            <td>${e.description}</td>
                        </tr>`);
                    });
                }
            </script>
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <button class="float-right btn btn-light btn-sm">
                        <i class="fa fa-trash-alt mr-2"></i> Clear
                    </button>
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Notifications:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" onclick="renderNotifications(1)">
                                        <i class="fa fa-angle-double-right"></i> All
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" onclick="renderNotifications(2)">
                                        <i class="fa fa-robot"></i> System
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" onclick="renderNotifications(3)">
                                        <i class="fa fa-user-tie"></i> Users
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody id="notifications-board"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Uncompleted Work</h4>
                    <p class="card-category">Here you will find the recently uncompleted work</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($works as $i => $work)
                            <tr>
                                <td>
                                    <a href="{{$work->href}}">{{$i + 1}}</a>
                                </td>
                                <td>
                                    {{$work->description}}
                                </td>
                                <td>
                                    <i class="fa fa-times-circle"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop