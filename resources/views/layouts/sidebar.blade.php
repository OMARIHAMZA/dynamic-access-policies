<div class="sidebar" data-color="purple" data-background-color="white" data-image="img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.linkedin.com/in/omarihamza/" class="simple-text logo-normal">
            DMRAP
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{request() -> is('home') ? 'active' : 'nav-item'}}">
                <a class="nav-link" href="/home">
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{request() -> is('users') ? 'active' : 'nav-item'}}">
                <a class="nav-link" href="/users">
                    <p>Users</p>
                </a>
            </li>
            <li class="{{request() -> is('roles') ? 'active' : 'nav-item'}}">
                <a class="nav-link" href="/roles">
                    <p>Roles</p>
                </a>
            </li>
            <li class="{{request() -> is('purposes') ? 'active' : 'nav-item'}}">
                <a class="nav-link" href="/purposes">
                    <p>Purposes</p>
                </a>
            </li>
        </ul>
    </div>
</div>