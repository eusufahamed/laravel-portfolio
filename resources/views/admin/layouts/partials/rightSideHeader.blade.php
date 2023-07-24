<div class="rightside-header">
  <div class="header-middle"></div>
  <!--SEARCH HEADERBOX-->
  <div class="header-section" id="search-headerbox">
    <input type="text" name="search" id="search" placeholder="Search...">
    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
    <div class="header-separator"></div>
  </div>

  <!--USER HEADERBOX -->
  @if(auth()->user())
  <div class="header-section" id="user-headerbox">
    <div class="user-header-wrap">
      <div class="user-info">
        <span class="user-name">{{ auth()->user()->name }}</span>
      </div>
    </div>
  </div>
  @endif
  <div class="header-separator"></div>

  <!--Log out -->
  <div class="header-section">
    <a data-toggle="tooltip" data-placement="left" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fa fa-sign-out log-out" aria-hidden="true"></i>
    </a>

    <form id="logout-form" action="{{ route('customLogoutPath') }}" method="post">
      @csrf
    </form>
  </div>
</div>
