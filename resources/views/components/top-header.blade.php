 <!-- [ Header Topbar ] start -->
 <header class="pc-header">
  <div class="m-header">
    <a href="#" class="b-brand">
      <!-- ========   change your logo hear   ============ -->
      <img src="./assets2/dist/logo.png" alt="" class="logo logo-lg" width="180px"/>
    </a>
    <!-- ======= Menu collapse Icon ===== -->
    <div class="pc-h-item">
      <a href="#" class="pc-head-link head-link-secondary m-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </div>
  </div>
  <div class="header-wrapper"> 
<!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <li class="pc-h-item header-mobile-collapse">
      <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
        role="button" aria-haspopup="false" aria-expanded="false">
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <i class="ti ti-search"></i>
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here..." />
          </div>
        </form>
      </div>
    </li>
    <li class="pc-h-item d-none d-md-inline-flex">
      <form class="header-search">
        <i class="ti ti-search icon-search"></i>
        <input type="search" class="form-control" placeholder="Search here..." />
        <button class="btn btn-light-secondary btn-search"><i class="ti ti-adjustments-horizontal"></i></button>
      </form>
    </li>
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
        role="button" aria-haspopup="false" aria-expanded="false">
        <i class="ti ti-bell"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item header-user-profile">
      <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
        role="button" aria-haspopup="false" aria-expanded="false">
        <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
        <span>
          <i class="ti ti-settings"></i>
        </span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <h4>Good Morning, <span class="small text-muted">{{auth()->user()->name}}</span></h4>
          <p class="text-muted">{{auth()->user()->role}}</p>
          <form class="header-search">
            <i class="ti ti-search icon-search"></i>
            <input type="search" class="form-control" placeholder="Search profile options" />
          </form>
          <hr />
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
        
            <a href="#" class="dropdown-item">
              <i class="ti ti-settings"></i>
              <span>Account Settings</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>Social Profile</span>
            </a>
            <a href="{{route('logout')}}" class="dropdown-item">
              <i class="ti ti-logout"></i>
              <span>Logout</span>
            </a>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div> </div>
</header>
<!-- [ Header ] end -->