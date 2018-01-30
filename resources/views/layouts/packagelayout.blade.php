<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @if(isset($title))
            {{$title}}
            @endif
            @if(isset($pagedata['title']))
            {{$pagedata['title']}}
            @endif
        </title>
        <!-- Fonts -->
        <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/lightgallery.css">
        <link rel="stylesheet" type="text/css" href="/css/animate.css">
        <link rel="stylesheet" type="text/css" href="/css/datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="/css/jquery-confirm.css">
        <link rel="stylesheet" type="text/css" href="/css/loaders.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
        <link rel="stylesheet" type="text/css" href="/css/snackbar.min.css">
        <script type="text/javascript" src="/js/rl.js"></script>
</head>
    <body>
    <div class="loader-overlay"><div class="ball-scale-ripple-multiple t"><div></div><span class="load-text">Loading...</span></div></div>
    <div class="content-wrapper">
    <div class="ftft">
    @include('inc.navbar')  
    {{ Breadcrumbs::render('adventures') }}
    <div class="container-fluid">
      <div class="row filter">
      <div class="col-2">
        <div class="select-icon"><i class="fa fa-bandcamp"></i></div>
         <select name="adventure-difficulty" class="reg-select2" id="adventure-difficulty">
          <option value="" disabled selected>Difficulty</option>
          <option value="all">All</option>
          <option value="easy">Easy</option>
          <option value="medium">Moderate</option>
          <option value="hard">Hard</option>
          <option value="extreme">Extreme</option>
        </select>
      </div>
      <div class="col-2">
        <div class="select-icon"><i class="fa fa-bicycle"></i></div>
         <select name="adventure-type" class="reg-select2" id="adventure-type">
          <option value disabled selected>Adventure Type</option>
          <option value="all">All</option>
          <option value="trekking">Trekking</option>
          <option value="day tour">Day Tours</option>
          <option value="canyoneering">Canyoneering</option>
          <option value="scuba diving">Scuba Diving</option>
          <option value="island hopping">Island Hopping</option>
          <option value="whale watching">Whale Watching</option>
          <option value="falls">Falls</option>
          <option value="beach">Beach</option>
        </select>
      </div>
      <div class="col-2">
        <div class="form-icon"><i class="fa fa-calendar-minus-o"></i></div>
        <input type="text" name="text" class="form-control" id="adventure-date" placeholder="Available Date" data-toggle="datepicker"/>
      </div>
  </div>
</div>
</div>
    @yield('content')
    @include('inc.registerform')
    @include('inc.loginform')
    </div>
    @if(Auth::guard('admin')->check())
      <a href="/crew/dashboard" class="btn btd"><i class="fa fa-arrow-left" style="color: #fff;"></i> Back to Dashboard</a>
   @endif
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/js/infobubble.js"></script>
    <script type="text/javascript" src="/js/oop/app.js"></script>
    <script type="text/javascript" src="/js/l.js"></script>
    <script type="text/javascript" src="/js/snackbar.min.js"></script>
    @yield('utils')  
    </body>
</html>
