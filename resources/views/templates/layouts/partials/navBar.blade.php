<!-- Header -->
<nav class="header row auto-hide-header page-transition">
  <div class="header-inner">
    <div class="logo col-xs-10 col-md-2">
      <a href="{{ route('homeView') }}">
        <img src="{{ asset('images/logo/eusuf-(1).svg') }}" alt="">
      </a>
    </div>
    <div class="col-xs-2 col-md-10 visible-xs"><a href ="#" class="nav-trigger"><span><em aria-hidden="true"></em>Menu</span></a></div>
    <!-- Menu -->
    <div class="menu col-sm-8 col-md-10" id="menu">
      <ul>
        <li><a href="{{ route('homeView') }}">Home</a></li>
        <li><a href="{{ route('aboutView') }}">about</a></li>
        <li><a href="{{ route('projectsView') }}">Projects</a></li>
        <!-- <li><a href="#">Blog</a></li> -->
        <li><a href="{{ route('contactView') }}">contact</a></li>
      </ul>
    </div>
    <!-- Menu -->
  </div>
</nav>
<!-- /Header -->
