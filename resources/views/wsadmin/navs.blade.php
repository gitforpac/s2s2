<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/da.jpg" class="user-image" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('admin')->user()->name}}</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="/crew/dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
           <i class="fa fa-sticky-note-o"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/crew/manage"> Home Page</a></li>
            <li><a href="/crew/add"> Adventures Page</a></li>
            <li><a href="/crew/add"> About us Page</a></li>
            <li><a href="/crew/add"> Contact us Page</a></li>
            <li><a href="/crew/add"> The Crew Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
           <i class="fa fa-book"></i>
            <span>Manage Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/crew/manage"><i class="fa fa-table"></i> Packages and Bookings</a></li>
            <li><a href="/crew/add"><i class="fa fa-plus-circle"></i> Add Package</a></li>
            <li><a href="#" data-toggle="modal" data-target="#add_adventure_type"><i class="fa fa-plus-circle"></i> Add Adventure Type</a></li>
          </ul>
        </li>
        <li><a href="/manage-my-crew"><i class="fa fa-users" aria-hidden="true"></i> <span>Manage Crew Profiles</span></a></li>
        <li><a href="/crew/dashboard"><i class="fa fa-history" aria-hidden="true"></i> <span>Bookings History</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>