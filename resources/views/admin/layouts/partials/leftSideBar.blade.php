<div class="left-sidebar">
  <div class="left-sidebar-header">
    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
      <span></span>
    </div>
  </div>

  <div id="left-nav" class="nano">
    <div class="nano-content">
      <nav>
        <ul class="nav nav-left-lines" id="main-nav">
          <!--HOME-->
          <li class="{{ Request::routeIs('adminView') ? 'active-item':'' }}"><a href="{{ route('adminView') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
          <!--CATEGORIES-->
          <li class="has-child-item close-item {{ request()->is('admin/category/*') ? 'open-item':'' }}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span></a>
            <ul class="nav child-nav level-1">
              <li class="{{ Request::routeIs('categoryListsView') ? 'active-item':'' }}"><a href="{{ route('categoryListsView') }}">Category Lists</a></li>
              <li class="{{ Request::routeIs('addCategory') ? 'active-item':'' }}"><a href="{{ route('addCategory') }}">Add Category</a></li>
            </ul>
          </li>
          <!--SERVICES-->
          <li class="has-child-item close-item {{ request()->is('admin/service/*') ? 'open-item':'' }}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Services</span></a>
            <ul class="nav child-nav level-1">
              <li class="{{ Request::routeIs('serviceLists') ? 'active-item':'' }}"><a href="{{ route('serviceLists') }}">Service Lists</a></li>
              <li class="{{ Request::routeIs('addService') ? 'active-item':'' }}"><a href="{{ route('addService') }}">Add Service</a></li>
            </ul>
          </li>
          <!--CLIENTS-->
          <li class="has-child-item close-item {{ request()->is('admin/client/*') ? 'open-item':'' }}">
            <a><i class="fa fa-list" aria-hidden="true"></i><span>Clients</span></a>
            <ul class="nav child-nav level-1">
              <li class="{{ Request::routeIs('clientLists') ? 'active-item':'' }}"><a href="{{ route('clientLists') }}">Client Lists</a></li>
              <li class="{{ Request::routeIs('addClient') ? 'active-item':'' }}"><a href="{{ route('addClient') }}">Add Client</a></li>
            </ul>
          </li>
          <!--PROJECTS-->
          <li class="has-child-item close-item {{ request()->is('admin/project/*') ? 'open-item':'' }}">
            <a><i class="fa fa-tasks" aria-hidden="true"></i><span>Project</span></a>
            <ul class="nav child-nav level-1">
              <li class="{{ Request::routeIs('projectLists') ? 'active-item':'' }}"><a href="{{ route('projectLists') }}">Project Lists</a></li>
              <li class="{{ Request::routeIs('addProject') ? 'active-item':'' }}"><a href="{{ route('addProject') }}">Add Project</a></li>
            </ul>
          </li>
          <!--TEAMS-->
          <li class="has-child-item close-item {{ request()->is('admin/team/*') ? 'open-item':'' }}">
            <a><i class="fa fa-users" aria-hidden="true"></i><span>Team</span></a>
            <ul class="nav child-nav level-1">
              <li class="{{ Request::routeIs('teamLists') ? 'active-item':'' }}"><a href="{{ route('teamLists') }}">Member Lists</a></li>
              <li class="{{ Request::routeIs('addTeam') ? 'active-item':'' }}"><a href="{{ route('addTeam') }}">Add Member</a></li>
              <li class="has-child-item close-item {{ request()->is('admin/team/skill/*') ? 'open-item active-item':'' }}">
                <a>Member Skill</a>
                <ul class="nav child-nav level-2">
                  <li class="{{ Request::routeIs('skillLists') ? 'active-item':'' }}"><a href="{{ route('skillLists') }}">All Skills</a></li>
                  <li class="{{ Request::routeIs('addSkill') ? 'active-item':'' }}"><a href="{{ route('addSkill') }}">Add Skill</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <!--PAGES-->
          <li class="has-child-item close-item {{ request()->is('admin/pages/*') ? 'open-item':'' }}">
            <a><i class="fa fa-files-o" aria-hidden="true"></i><span>Manage Pages</span></a>
            <ul class="nav child-nav level-1">
              <li class="has-child-item close-item {{ request()->is('admin/pages/contact/*') ? 'open-item active-item':'' }}">
                <a>Contact</a>
                <ul class="nav child-nav level-2">
                  <li class="{{ Request::routeIs('adminContactView') ? 'active-item':'' }}"><a href="{{ route('adminContactView') }}">Contact Info</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
