<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">MAGNATE.V.L</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/home" class="d-block">{{Auth::User()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @can('view management')
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/users" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/roles" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Permissions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/settings" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Settings</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        @can('view operations')
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-hammer"></i>
            <p>
              Operations
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/deliveries" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Deliveries</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/activities" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Activities</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        @can('view servicecall')
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-phone-alt"></i>
            <p>
              Service Calls
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/tickets" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Tickets</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        @can('view pettycash')
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-dollar-sign"></i>
            <p>
              Petty Cash
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/petty" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Requests</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        @can('view allowances')
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
            <p>
            Allowances
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/allowance" class="nav-link">
                <i class="fa fa-link nav-icon fa-1x"></i>
                <p>Requests</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        <li class="nav-header">SESSION</li>
        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="nav-icon fa fa-lock"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>