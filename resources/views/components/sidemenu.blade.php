 <!-- [ Sidebar Menu ] start -->
 <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="#" target="_blank" class="b-brand">
        <!-- ========   Change your logo from here   ============ -->
        <img src="./assets2/dist/logo.png" alt="" class="logo logo-lg" width="180px"/>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Dashboard</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item">
          <a href="{{url('/dashboard')}}" class="pc-link"><span class="pc-micon"><i class="ti ti-dashboard"></i></span><span
              class="pc-mtext">Dashboard</span></a>
        </li>
        <li class="pc-item pc-caption">
          <label>Pages</label>
          <i class="ti ti-news"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-report-medical"></i></span><span
              class="pc-mtext">Medicine</span><span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" target="" href="{{route('categories.index')}}">Category List</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-file-invoice"></i></span><span
              class="pc-mtext">Invoice</span><span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" target="" href="{{route('invoices.index')}}">POS Invoice</a></li>
            <li class="pc-item"><a class="pc-link" target="" href="{{route('invoices.list')}}">Invoice List</a></li>
          </ul>
        </li>
      </ul>
      <!-- <div class="pc-navbar-card bg-primary rounded">
        <h4 class="text-white">Berry Pro</h4>
        <p class="text-white opacity-75">Checkout Berry pro features</p>
        <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/" target="_blank" class="btn btn-light text-primary">Pro</a>
      </div> -->
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->