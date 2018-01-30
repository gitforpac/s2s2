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
            @elseif(isset($pagedata['title']))
            {{$pagedata['title']}}
            @endif
        </title>
        <!-- Fonts -->
        <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/lightgallery.css">
        <link rel="stylesheet" type="text/css" href="/css/animate.css">
        <link rel="stylesheet" type="text/css" href="/css/datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="/css/jquery-confirm.css">
        <link rel="stylesheet" type="text/css" href="/css/loaders.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
        <link rel="stylesheet" type="text/css" href="/css/snackbar.min.css">
        <script type="text/javascript" src="/js/paceconfig.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
        <script type="text/javascript" src="/js/rl.js"></script>
    </head>
    <body>
    <div class="loader-overlay"><div class="ball-scale-ripple-multiple t"><div></div><span class="load-text">Loading...</span></div></div>
    <div class="content-wrapper">
    @include('inc.navbar')  
    @yield('breadcrumbs')
    @yield('content')
    @include('inc.footer')
    @include('inc.registerform')
    @include('inc.loginform')
    </div>
<<<<<<< HEAD
    
=======
    @if(Auth::guard('admin')->check())
    <a href="/crew/dashboard" class="btn btd"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
    @endif
>>>>>>> a4ce248ead27467f2269962bd11d30a3c6fba5e6
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/snackbar.min.js"></script>
    <script type="text/javascript" src="/js/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/js/infobubble.js"></script>
    <script type="text/javascript" src="/js/oop/app.js"></script>
    <script type="text/javascript" src="/js/l.js"></script>
    @yield('utils')  
    </body>
</html>
