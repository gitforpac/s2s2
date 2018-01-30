
<nav class="navbar navbar-expand-lg bg-white" id="pnav">
  <a class="navbar-brand" href="/"></a>
  <ul class="navbar-nav ml-auto">
    <li class="navbar-item">
      <a href="/adventures" class="nav-link">Adventures</a>
    </li>
    <li class="navbar-item">
<<<<<<< HEAD
      <a href="/theteam" class="nav-link">Crew Members</a>
=======
      <a href="/theteam" class="nav-link">Crew</a>
>>>>>>> a4ce248ead27467f2269962bd11d30a3c6fba5e6
    </li>
    <li class="navbar-item">
      <a href="/about-us" class="nav-link">About Us</a>
    </li>
    <li class="navbar-item">
      <a href="/contact-us" class="nav-link">Contact Us</a>
    </li>
    @if(Auth::guard('user')->check())
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/storage/user_avatars/{{Auth::guard('user')->user()->avatar}}" class="da">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
        
        <a class="dropdown-item" href="/user/{{Auth::guard('user')->id()}}"><i class="fa fa-qq"></i> &nbsp;View Profile</a>
        <a class="dropdown-item" href="/adventurer/{{Auth::guard('user')->id()}}/edit"><i class="fa fa-user"></i> &nbsp;Edit Profile</a>
         <a class="dropdown-item" href="/myadventures"><i class="fa fa-address-book" aria-hidden="true"></i> &nbsp;Booked Adventures</a>
        <a href="{{ route('logout') }}" class="dropdown-item" 
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
        </a>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
    </li>
     @else
     <li class="navbar-item">
      <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#register-form">Sign Up</a>
    </li>
    <li class="navbar-item">
      <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#login-form">Login In</a>
    </li>
    @endif
  </ul>
</nav>
