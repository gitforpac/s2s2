<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Rasec</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Admin</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li><a href="/superadmin/dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#">
           <i class="fa fa-gift"></i>
            <span>Manage Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/superadmin/manage"><i class="fa fa-table"></i> Packages and Bookings</a></li>
            <li><a href="/superadmin/add"><i class="fa fa-plus-circle"></i> Add Package</a></li>
            <li><a href="#" data-toggle="modal" data-target="#add_adventure_type"><i class="fa fa-plus-circle"></i> Add Adventure Type</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
           <i class="fa fa-gears"></i>
            <span>Manage Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/superadmin/manageadventurer"><i class="fa fa-qq"></i> Adventurer</a></li>
            <li><a href="/superadmin/managecrew"><i class="fa fa-group"></i> Crew</a></li>
            <li><a href="/superadmin/manageadmin"><i class="fa fa-user-secret"></i> Superadmin</a></li>
          </ul>
        </li>

        <li><a href="/superadmin/dashboard"><i class="fa fa-history" aria-hidden="true"></i> <span>Bookings History</span></a></li>
        <li><a href="/superadmin/changepassword"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>