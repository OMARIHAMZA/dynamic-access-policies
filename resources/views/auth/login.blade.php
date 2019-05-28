<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Dynamic Medical Records Access Policies
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet"/>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>

    <style>
        .form-control, .is-focused {
            background-image: linear-gradient(to top, transparent 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px) !important;
        }

        .form-control:focus {
            border-color: #999;
        }

        .form-control {
            border: 2px solid #999;
            border-radius: 44px !important;
            overflow: hidden;
            padding: 0 8px !important;
            font-size: 13px;
        }
    </style>
</head>

<body class="">
<div class="wrapper">
    <div class="main-panel w-100">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper mx-auto">
                    <a class="navbar-brand brand-title" href="/">
                        <span>Dynamic</span>
                        <span>Medical</span>
                        <br>
                        <span>Records</span>
                        <span>Access</span>
                        <span>Policies</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-success">
                                {{--<div class="card-icon">--}}
                                {{----}}
                                {{--</div>--}}
                                <h4>{{ __('Login') }}</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7 mx-auto py-3">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group">
                                                <input class="form-control"
                                                       name="email"
                                                       type="email"
                                                       value="{{ old('email', '') }}"
                                                       placeholder="{{ __('Email') }}"
                                                       autocomplete="email"
                                                       autofocus>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control"
                                                       name="password"
                                                       type="password"
                                                       value="{{ old('password', '') }}"
                                                       placeholder="{{ __('Password') }}"
                                                       autocomplete="email"
                                                       autofocus>
                                            </div>

                                            @if ($errors->any())
                                                <div class="mt-5">
                                                    <div class="alert alert-danger py-1">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-sign-in-alt"></i>
                                                    {{ __('Login') }}
                                                </button>
                                            </div>

                                            <div class="text-center">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.min.js')}}"></script>
<script src="{{ asset('js/core/popper.min.js')}}"></script>
<script src="{{ asset('js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{ asset('js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{ asset('js/plugins/sweetalert2.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/plugins/jquery.validate.min.js')}}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{ asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('js/plugins/fullcalendar.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/plugins/nouislider.min.js')}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="{{ asset('js/core.js') }}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('js/plugins/arrive.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="{{ asset('js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.brand-title span').each(function (index) {
            setTimeout(function (children) {
                let child = $(children);
                child['movementToggle'] = false;
                setInterval(() => {
                    child.movementToggle = !child.movementToggle;
                    if (child.movementToggle) {
                        child.css('top', '1px');
                    } else {
                        child.css('top', '-1px');
                    }
                }, 500);
            }, index * 100, this)
        });
    });
</script>
</body>

</html>
