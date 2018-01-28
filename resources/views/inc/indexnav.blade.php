<nav class="navbar navbar-expand-lg home-nav" id="hnav">
  <a class="navbar-brand brand" href="/">PAC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <i class="fa fa-bars" aria-hidden="true" style="color: #fff;font-size: 30px;cursor: pointer;"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item nav-margin">
        <a class="nav-link" href="/adventures">ADVENTURES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://viajeracebuana.wordpress.com/">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/theteam">CREW</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about-us">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact-us">CONTACT</a>
      </li>
      @if(Auth::guard('user')->check())
     <li class="nav-item dropdown" style="position: absolute;right: 20px;top: 0px;">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/storage/user_avatars/{{Auth::guard('user')->user()->avatar}}" class="da" style="width: 50px;height: 50px;border: 1px solid #fff;">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
        <a class="dropdown-item" href="/adventurer/{{Auth::guard('user')->id()}}/edit" style="color:rgba(0,0,0,0.6) !important;"><i class="fa fa-user"></i> &nbsp;Edit Profile</a>
         <a class="dropdown-item" href="/myadventures" style="color: rgba(0,0,0,0.6) !important;"><i class="fa fa-address-book" aria-hidden="true"></i> &nbsp;Booked Adventures</a>
        <a href="{{ route('logout') }}" class="dropdown-item" style="color: rgba(0,0,0,0.6) !important;"
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
      <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#register-form">SIGNUP</a>
      </li>
      <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#login-form">SIGNIN</a>
      </li>
    @endif
    </ul>
  </div>
</nav>