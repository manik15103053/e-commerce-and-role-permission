<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      
      <ul class="navbar-nav navbar-nav-right">
        
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
            {{-- <i class="typcn typcn-cog-outline mx-0"></i> --}}
            <img src="{{ asset('admin/images/faces/face1.jpg') }}" alt="" width="50px" class="rounded-circle">
            {{-- <span class="count"></span> --}}
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <a class="dropdown-item preview-item">
             
              <div class="preview-item-content flex-grow">
                <span class="preview-subject ellipsis font-weight-normal">Profile
                </span>
               
              </div>
            </a>
            <a class="dropdown-item preview-item">
             
              <div class="preview-item-content flex-grow">
                <span class="preview-subject ellipsis font-weight-normal">Setting
                </span>
               
              </div>
            </a>
            <a class="dropdown-item preview-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
             
              <div class="preview-item-content flex-grow">
                <span class="preview-subject ellipsis font-weight-normal">Logout
                </span>
               
              </div>
              <form action="{{ route('admin.logout') }}" id="logout-form" class="d-none" method="post">@csrf</form>
            </a>
            
            
          </div>
        </li>
        
      </ul>
      
    </div>
  </nav>