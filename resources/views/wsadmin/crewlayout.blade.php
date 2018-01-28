<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>PAC - Manage</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/white/pace-theme-minimal.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" type="text/css" href="/css/lightgallery.css">
  <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="/css/jquery-confirm.css">
  <script type="text/javascript" src="/js/c-paceconfig.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <script type="text/javascript">
     window.Laravel = {'csrfToken': '{{csrf_token()}}'}
   </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('wsadmin.header')
  @include('wsadmin.navs')
  <div class="content-wrapper">
  @yield('content')
  </div>
  </div>
  <div class="modal fade" id="add_adventure_type">
    <div class="modal-dialog">
      <div class="modal-content" style="background: transparent;">
        <div class="modal-body">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
               <form role="form" id="add_adv_type" method="POST" action="/addadventuretype">
                  <!-- text input -->
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Adventure Type:</label>
                    <input type="text" name="adv_typee" class="form-control" placeholder="Adventure Type..." required="">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add">
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<script src="/js/jquery.js"></script>
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="/js/jquery-confirm.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.form.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
<script src="/js/dashboardv2.js"></script>
<script src="/js/app.js"></script>
<script src="/dist/js/demo.js"></script>
@yield('utils')
</body>
</html>