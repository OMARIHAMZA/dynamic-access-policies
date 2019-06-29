@if (Auth::user()->role_id == 2)
    @include("layouts.integration")
@endif

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top border-bottom">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="/"
               style="font-family: 'Matura MT Script Capitals',serif;font-weight: 900;font-size: 12pt">
                Dynamic Medical Records Access Policies
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        @auth


            <div class="collapse navbar-collapse justify-content-end">
                {{--<form class="navbar-form">--}}
                {{--<div class="input-group no-border">--}}
                {{--<input type="text" value="" class="form-control" placeholder="Search...">--}}
                {{--<button type="submit" class="btn btn-white btn-round btn-just-icon">--}}
                {{--<i class="material-icons">search</i>--}}
                {{--<div class="ripple-container"></div>--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--</form>--}}
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <button class="dropdown-item w-100 mx-0 cursor-pointer"
                                    onclick="document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt mr-2"></i> Logout
                            </button>

                            @if (Auth::user()->role_id == 2)
                                <button type="button" class="dropdown-item w-100 mx-0 cursor-pointer"
                                        title="Integrate"
                                        data-toggle="modal"
                                        data-backdrop="static" data-keyboard="false" data-target="#integration_modal">
                                    Integrate
                                </button>
                            @endif

                            <form method="post" action="/logout" id="logout-form">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>

