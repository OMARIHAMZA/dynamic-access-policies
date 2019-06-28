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
        .form-control {
            background-image: linear-gradient(to top, transparent 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px) !important;
        }

        .form-control:focus {
            border-color: transparent;
        }

        .form-control {
            overflow: hidden;
            font-size: 13px;
        }

        input {
            border-radius: 100px !important;
            padding: 10px 15px !important;
            width: 50% !important;
            border: 1px solid #D9D9D9 !important;
            outline: none !important;
            display: block !important;
            margin: 20px auto 20px auto !important;
        }

        button {
            border-radius: 100px !important;
            border: none !important;
            /*background: #719BE6 !important;*/
            width: 50% !important;
            padding: 10px !important;
            color: #FFFFFF !important;
            margin-top: 25px !important;
            /*box-shadow: 0 2px 10px -3px #719BE6 !important;*/
            display: block !important;
            margin: 55px auto 10px auto !important;
        }

        a {
            text-align: center !important;
            margin-top: 30px !important;
            /*color: #719BE6 !important;*/
            text-decoration: none !important;
            padding: 5px !important;
            display: inline-block !important;
        }

        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body class="">
<div class="wrapper">
    <div class="main-panel w-100">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper mx-auto">
                    <a class="logo" href="/">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid img-thumbnail">
                    </a>
                </div>
            </div>
        </nav>

        <div class="content" style="margin-top: 150px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-success">
                                <h4>{{ __('Login') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 mx-auto py-3">

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <input class="form-control"
                                                   name="email"
                                                   type="email"
                                                   value="{{ old('email', '') }}"
                                                   placeholder="{{ __('Email') }}"
                                                   autocomplete="off"
                                                   autofocus>

                                            <input class="form-control"
                                                   name="password"
                                                   type="password"
                                                   value="{{ old('password', '') }}"
                                                   placeholder="{{ __('Password') }}"
                                                   autocomplete="off"
                                                   autofocus>

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

                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-sign-in-alt"></i>
                                                {{ __('Login') }}
                                            </button>

                                            <div class="text-center">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link text-success"
                                                       href="{{ route('password.request') }}">
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
