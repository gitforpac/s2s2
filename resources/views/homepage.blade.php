<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Philippine Adventure Consultants</title>
    <link rel="stylesheet" type="text/css" href="/css/loaders.css">
    <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Kalam:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/snackbar.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-confirm.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <script type="text/javascript" src="/js/rl.js"></script>
        
</head>
<body>
  <div class="loader-overlay">
    <div class="ball-scale-ripple-multiple t">
      <div></div>
      <span class="load-text">Loading...</span>
    </div>
</div>
<div class="content-wrapper">
    <div class="v-header v-container">
     @include('inc.indexnav')
      <div class="full-screen">
        <video id="teaservid" src="/vids/teaser.mp4" autoplay="" muted loop=""></video>
        <div class="overlay">
        </div>
      </div>

      <div class="header-text">
        <h1 class="display-4 f">Adventure is worthwhile </h1>
        <marquee direction="left" width="100%" height="100%" id="background" behavior="alternate" style="border:solid">
          <marquee behavior="alternate">
            <h3>BOK NOW!!!!</h3>
          </marquee>
        </marquee>
        <audio id="hayaanmosila" autoplay loop>
        <source src="/audio/homepageaduio.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
      </audio>
      <script type="text/javascript">
        var i = 0;
        var vid = document.getElementById("hayaanmosila");
        vid.volume = 0.6;
function change() {
  var doc = document.getElementById("background");
  var color = ["pink", "blue", "red", "orange"];
  doc.style.backgroundColor = color[i];
  doc.style.borderColor = color[i-1];
  i = (i + 1) % color.length;
}
setInterval(change, 1000);
      </script>
        <p class="lead">Experience Cebu Like Never Before!</p>
        <a href="/adventures" class="explore">Explore</a>
      </div>
      <div class="overlay">
        </div>
    </div>

    <h5 class="featured-header text-center">Featured</h5>
    <p class="text-center">So, where to next?</p>
    <section class="container-fluid featured">
    <div class="prev"><i class="fa fa-angle-left"></i></div> 
    <div class="next"><i class="fa fa-angle-right"></i></div> 
    <div class="row f-items">
      @foreach($data as $p)
      @php
      $dur =   explode(" ", $p->duration);
      @endphp
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">{{$dur[0]}}</span>
                    <span class="dur">{{$dur[1]}}</span>
                  </div>
                  <a href="/adventure/{{$p->pid}}"> <img class="card-img-top" src="/storage/cover_images/{{$p->thumb_img}}"></a>
                  <div class="card-body">
                    <a href="/adventure/{{$p->pid}}"><h5 class="card-title adv-name">{{$p->name}}</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">{{$p->location}}</span> <br>
                    <i class="fa fa-tag"></i> {{number_format($p->price_per)}}
                  </div>
                </div>
              </div>
        </div>
        @endforeach
        <div class="col-md-4">
            <a href="/adventures" class="btn btn-info view-all">View All </a>
        </div>
        </div>
    </section>

    <div class="container-fluid">
    <header class="featured-header text-center"><h3 style="font-family: 'Source Sans Pro', sans-serif !important;">Go discover Cebu with us</h3></header><br>
    <div class="row" id="fp">   
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/3h.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Diving</h4>
            <a href="/adventures?type=diving" style="color:#fff;text-decoration: underline;"><h5>View Diving Adventures</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/2h.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Trekking</h4>
            <a href="/adventures?type=trekking" style="color:#fff;text-decoration: underline;"><h5>View Trekking Adventures</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/1h.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Falls</h4>
            <a href="/adventures?type=falls" style="color:#fff;text-decoration: underline;"><h5>View Falls Adventures</h5></a>        
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="fp">   
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/4h.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Canyoneering</h4>
            <a href="/adventures?type=canyoneering" style="color:#fff;text-decoration: underline;"><h5>View Canyoneering Adventures</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/5h.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Day Tours</h4>
            <a href="/adventures?type=day%20tour" style="color:#fff;text-decoration: underline;"><h5>View Day Tour Adventures</h5></a>     
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/6h.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Parasailing</h4>
            <a href="/adventures?type=parasailing" style="color:#fff;text-decoration: underline;"><h5>View Parasailing Adventures</h5></a>        
          </div>
        </div>
      </div>
    </div>
  </div>

    <h5 class="featured-header text-center">Why Book With Us?</h5><br>
    <section id="whyus">
      <div class="container">
        <div class="row">
          <div class="col-sm" style="padding-left: 0px;padding-right: 40px;margin-right: 10px;font-family: 'Source Sans Pro', sans-serif !important;">
            <h5>BEST PRICE AND VALUE</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </div>
          <div class="col-sm" style="font-family: 'Source Sans Pro', sans-serif !important;">
            <h5>WE VALUE SAFETY</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </div>
          <div class="col-sm" style="font-family: 'Source Sans Pro', sans-serif !important;">
            <h5>SUPERIOR CUSTOMER SERVICE</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container-fluid text-center as" style="font-family: 'Source Sans Pro', sans-serif !important;">
        <h3>Need help in your itinerary?</h3>
        <p>Email or call us to speak to one of our advisors who will help you with all of your holiday needs.</p>
        <p><strong>Office Hours:</strong> 8:00AM – 5PM (Monday-Saturday)</p>
        <p><strong>Mobile Sun:</strong> +63-933-855-6793 or +63-925-548-8687 (Viber)</p>
        <p><strong>Mobile Globe:</strong> +63-915-138-2988</p>
        <p><strong>Email us:</strong> info@pacadventures.com</p>
      </div>
    </section>
  @include('inc.registerform')
  @include('inc.loginform')
   @if(Auth::guard('admin')->check())
   <a href="/crew/dashboard" class="btn btd"><i class="fa fa-arrow-left" style="color: #fff;"></i> Back to Dashboard</a>
   @endif
  </div>
  @include('inc.footer')
  <script src="/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
<<<<<<< HEAD
=======
  <script src="/js/bootstrap.min.js"></script>
>>>>>>> b5ed1bd7c05c79bde7af43cdb049bb4f8fa3a8b8
  <script type="text/javascript" src="/js/snackbar.min.js"></script>
  <script type="text/javascript" src="/js/jquery.form.min.js"></script>
  <script type="text/javascript" src="/js/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="/js/l.js"></script>
  <script type="text/javascript" src="/js/jquery-ui.js"></script>
<<<<<<< HEAD
  <script src="/js/bootstrap.min.js"></script>
=======
>>>>>>> b5ed1bd7c05c79bde7af43cdb049bb4f8fa3a8b8
  <script type="text/javascript" src="/js/featured.js"></script>
</body>
</html>

