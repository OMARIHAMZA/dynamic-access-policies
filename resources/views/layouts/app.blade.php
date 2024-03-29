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
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Material+Icons"/>

    <!-- CSS Files -->
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet"/>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>

    <link href="{{ asset('css/jstree/themes/default/style.min.css') }}" rel="stylesheet"/>

    <script src="{{ asset('js/core/jquery.min.js') }}"></script>

    <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>

    <link href="{{asset('/css/tokenize2.min.css')}}" rel="stylesheet"/>

    <script src="{{asset('/js/tokenize2.min.js') }}"></script>

</head>
<body class="">

<div id="app">
    <div class="wrapper ">
        @include('layouts.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
        @include('layouts.navbar')
        <!-- End Navbar -->

            <div class="content" style="max-height: 90%;">
                <div class="container-fluid">
                    @yield('content')
                    {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </div>
</div>


<!-- Vue js -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{ asset('js/plugins/moment.min.js') }}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{ asset('js/plugins/sweetalert2.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/plugins/jquery.validate.min.js') }}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('js/plugins/jquery-jvectormap.js') }}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('js/plugins/arrive.min.js') }}"></script>
<!-- Chartist JS -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
{{-- JS Tree --}}
<script src="{{ asset('js/jstree.min.js')}}" type="text/javascript"></script>

<script>
    $('.custom-tokens').tokenize2({
        tokensAllowCustom: true,
        delimiter: [',', '-']
    });
</script>
<script>
    $(document).ready(function () {
        $().ready(function () {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function () {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function () {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function () {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function () {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
<script>
    const Notification = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    function makeNotification(notification) {
        Notification.fire({
            type: notification.icon,
            title: notification.message
        })
    }

    $.ajax('http://localhost:5555/alerts', {
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(i => makeNotification(i));
        }
    })
</script>
<script>
    function Modal(id, title = "", description = null, template = null, templateUrl = null, actions = [], doneMessage = 'done', size = 'md') {
        console.log('Modal ' + id + ' is used');

        $(id + ' #title').text(title);

        if (size === 'lg') {
            $(`${id} .modal-dialog`).removeClass('modal-sm');
            $(`${id} .modal-dialog`).addClass('modal-lg');
        } else if (size === 'sm') {
            $(`${id} .modal-dialog`).removeClass('modal-lg');
            $(`${id} .modal-dialog`).addClass('modal-sm');
        }

        if (templateUrl !== null) {
            console.log(`http://localhost:5555/${templateUrl}`);

            $(id + ' #content').load(`http://localhost:5555/${templateUrl}`);
        } else if (template !== null) {
            $(id + ' #content').html(template);
        } else {
            $(id + ' #content').text(description);
        }

        $(id + ' #footer').html('');
        actions.forEach(e => {
            if (e.button) {
                $(id + ' #footer').append('<button onclick="' + e.click + '" class="btn btn-dark">' + e.text + '</button>');

            } else {

                $(id + ' #footer').append('<a href="' + e.href + '" class="btn btn-dark">' + e.text + '</a>');
            }
        });

        $(id + ' #footer').append(`<button  id="done" type="button" class="btn btn-custom" data-dismiss="modal">${doneMessage}</button>`);

        $(id).modal('show');
    }
</script>
<script>
    function confirm(title, text, type, callback = function () {
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    }) {
        Swal.fire({
            position: 'top',
            title: title,
            text: text,
            type: type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                callback();
            }
        })
    }
</script>
<script>
    $('.data-table').DataTable();
</script>
<script>
    function convertJSON2JSTreeJSON(object) {
        let json = {
            'text': 'Rules',
            'state': {
                'opened': true,
                'selected': true
            },
            'children': []
        };

        for (const key in object) {
            if (object.hasOwnProperty(key)) {
                let obj = {
                    'text': key,
                    'state': {
                        'opened': true,
                        //'selected': true
                    },
                    'children': []
                };

                let value = object[key];
                value.forEach(v => {
                    obj.children.push({'text': v})
                });

                json.children.push(obj);
            }
        }

        return json;
    }

    function convertJSTreeJSON2JSON(object) {
        let json = {};

        L0 = object[0].children;

        for (let i = 0; i < L0.length; i++) {

            let L1 = L0[i].children;

            let values = [];
            for (let j = 0; j < L1.length; j++) {

                values.push(L1[j].text);
            }

            json[L0[i].text] = values;
        }
        return json;
    }
</script>
<script>
    function fillHiddenElement(HIDDEN, value1, DROPDOWN, value2) {

        document.getElementById(HIDDEN).value = value1;
        document.getElementById(DROPDOWN).innerText = value2;

    }
</script>
</body>

</html>
