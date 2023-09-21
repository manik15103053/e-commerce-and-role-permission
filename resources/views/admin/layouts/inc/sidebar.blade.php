<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.home') }}">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <div class="badge badge-danger">new</div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.create') }}">Create User</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.index') }}">All User</a></li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Role</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.create') }}">Create Role</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.index') }}">All Role</a></li>
            
          </ul>
        </div>
      </li>
      

    </ul>
  </nav>