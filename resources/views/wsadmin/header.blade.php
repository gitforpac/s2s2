  <header class="main-header"  id="app">
    <!-- Logo -->
    <a href="index2.html" class="logo">
     
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>AC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">PAC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->

          <notification :notifications="{{Auth::guard('admin')->user()->notifications}}" :unreads="{{Auth::guard('admin')->user()->unreadNotifications}}" :userid="{{Auth::guard('admin')->user()->id}}"></notification>

          <!-- Tasks: style can be found in dropdown.less -->

         
          <!-- User Account: style can be found in dropdown.less -->
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/storage/crew_avatars/{{Auth::guard('admin')->user()->avatar}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{ route('logout') }}" class="dropdown-item" 
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" data-toggle="control-sidebar">Logout &nbsp;<i class="fa fa-gears"></i></a>
            <form id="logout-form" action="/admin/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </div>
    </nav>
      <notifications />
  </header>


