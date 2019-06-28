<div class="sidebar" data-color="green" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            DMRAP
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @foreach(\App\Utils\Navigations::getNavigations() as $nav)
                <li class="{{strpos(request()->fullUrl(), $nav) ? 'active' : 'nav-item'}}">
                    <a class="nav-link" href="/{{$nav}}">
                        <p>{{$nav}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>