<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href=""> Dynamic Medical Records Access Policies</a>
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
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Mike John responded to your email</a>
                            <a class="dropdown-item" href="#">You have 5 new tasks</a>
                            <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                            <a class="dropdown-item" href="#">Another Notification</a>
                            <a class="dropdown-item" href="#">Another One</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <button class="dropdown-item w-100 mx-0 cursor-pointer"
                                    onclick="document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i> Logout
                            </button>
                            <form method="post" action="logout" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>